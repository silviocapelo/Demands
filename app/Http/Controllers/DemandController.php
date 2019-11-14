<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
//use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Auth;
use Mail;
use Redirect;

class DemandController extends Controller
{
    public function index(User $users ,Demand $demand){
        
        //---Validação para níveis de usúarios --------------
        if(Auth::user()->type == 'admin'){
            $demands = $demand->all();

            return view('demands.index',compact('demands'));

        }elseif(Auth::user()->type == 'user'){
            $demands = $demand->all();

            $demands = $demand->where('user_id',auth()->user()->id)->get();

            return view('demands.index',compact('demands'));

        }

    }

    //-----------Visualizar-tela de cadastro-------------

    public function create()
    {
        $users = User::get();
        return view('demands.new',compact('users'));
    }

    //--------Cadastrar------------------------------------

    public function store(Request $request)
    {    
       
        $demands = new Demand();
        if(Auth::user()->type == 'admin'){
            $demands->demand_id         = request('demand_id');
            $demands->solicitante       = request('solicitante');
            $demands->cidade            = request('cidade');
            $demands->email             = request('email');
            $demands->telefone          = request('telefone');
            $demands->celular           = request('celular');
            $demands->user_id           = request('selectemail');
            $demands->description       = request('description');
            $demands->outcome           = request('outcome');
            $demands->rout_of_request   = request('rout_of_request');
            $demands->solution_term     = request('solution_term');
            $demands->status = 1;
        }else{
            $demands->user_id           = Auth::user()->id;
            $demands->demand_id         = request('demand_id');
            $demands->solicitante       = request('solicitante');
            $demands->cidade            = request('cidade');
            $demands->email             = request('email');
            $demands->telefone          = request('telefone');
            $demands->celular           = request('celular');
            $demands->description       = request('description');
            $demands->outcome           = request('outcome');
            $demands->rout_of_request   = request('rout_of_request');
            $demands->solution_term     = request('solution_term');
            $demands->status = 1;
        }
        $demands->save();
        return redirect()->route('cadastro');
    }

    //----------Visualizar tela de Edição----------------

    public function edit($id)
    {  
        $users = User::get();
        if(Auth::user()->type == 'admin'){
            $demand = Demand::find($id);
            return view('demands.edit', compact('demand','users'));
        }else{

            $demand = Demand::find($id);
            $this->authorize('editDemand',$demand);//Autorização de segurança
            if(Gate::denies('editDemand',$demand))
            abort(403,'Erro');
            return view('demands.edit', compact('demand','users'));
        }
    }

    //------------Tela de Edição------------------------------

    public function update(Request $request, $id)
    {
        $demands = Demand::findOrFail($id);
   
        if(Auth::user()->type == 'admin'){

        $demands->user_id     = $request->post('selectemail');    
        $demands->description = $request->description;
        $demands->status          = $request->status;
        $demands->demand_id       = $request->demand_id;
        $demands->rout_of_request = $request->rout_of_request;
        $demands->solution_term   = $request->solution_term;
        $demands->solicitante     = $request->solicitante ;
        $demands->cidade          = $request->cidade;
        $demands->email           = $request->email;
        $demands->telefone        = $request->telefone;
        $demands->celular         = $request->celular;
        }
        $demands->outcome         = $request->outcome;
        $demands->save();

        return redirect()->route('cadastro')->with('message', 'Product updated successfully!') ;

}
     
     
        //-----------Envio de Email---------------------------------------------------------------------

       public function sendEmail($id){

        $demands = Demand::find($id);
        $users = User::where('type', 'admin')->get();
      
       
        Mail::send('mails.emailDemands',['demands'=> $demands,'users'=>$users],function($m) use ($users){
        
            $m->from('gestao2019brasil@gmail.com','ADM');
            $m->subject('Demanda finalizada');

               
                foreach ($users as $user) {
                    $m->to($user->email);
                }
            
        });
        return redirect()->route('cadastro') ;

        }






}
