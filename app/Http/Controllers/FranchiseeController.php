<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Franchisee;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;


class FranchiseeController extends Controller
{
    
    public function index()
    {
        
        $franchisees = DB::table('franchisees')->get();
      
        return view('franchisees.index',compact('franchisees'));

    }
    //-----------Visualização de formuário de cadastro----------

    public function create()
    {
        $users = User::get();
        return view('franchisees.new', compact('users'));

     }

     //------------Cadastro de franquia-----------------------------
     public function store(Request $request)
    {   
        $franchisees = new Franchisee;
        $franchisees->user_id = Auth::user()->id;
        $franchisees->name         = request('name');
        $franchisees->email        = request('email');
        $franchisees->telefone     = request('telefone');
        $franchisees->status       = 1;
        $franchisees->company      = request('company');
        $franchisees->cell_fone    = request('cell_fone');
        $franchisees->cnpj         = request('cnpj');
        $franchisees->street       = request('street');
        $franchisees->number       = request('number');
        $franchisees->neighborhood = request('neighborhood');
        $franchisees->city         = request('city');
        $franchisees->country      = request('country');
        $franchisees->observation  = request('observation');
        $franchisees->userfrach    = request('userfrach');
        $franchisees->save();
        return redirect()->route('franchisee');
    }

    //----------Visualizar tela de Edição----------------

    public function edit($id)
    {
        if(Auth::user()->type == 'admin'){
            $demand = Demand::find($id);
            return view('demands.edit', compact('demand'));
        }elseif(Auth::user()->type == '2'){

            $franchisee = Franchisee::find($id);
            $this->authorize('editDemand',$demand);//Autorização de segurança
            if(Gate::denies('editDemand',$demand))
            abort(403,'Erro');
            return view('franchisees.edit', compact('franchisee'));
        }
    }

    //------------Tela de Edição------------------------------

    public function update(Request $request, $id)
    {
        $franchisees = Franchisee::findOrFail($id);
        $franchisees->user_id = Auth::user()->id;
        $franchisees->name         = $request->name;
        $franchisees->email        = $request->email;
        $franchisees->status       = 1;
        $franchisees->company      = $request->company;
        $franchisees->telefone     = $request->telefone;
        $franchisees->cell_fone    = $request->cell_fone;
        $franchisees->cnpj         = $request->cnpj;
        $franchisees->street       = $request->street;
        $franchisees->number       = $request->number;
        $franchisees->neighborhood = $request->neighbohood;
        $franchisees->city         = $request->city;
        $franchisees->country      = $request->country;
        $franchisees->observation  = $request->observation;
        $franchisees->userfrach    = $request->userfrach;
        $franchisees->save();
        return redirect()->route('franchisee')->with('message', 'Product updated successfully!') ;

    }
    function teste(){
        return view('teste');
    }




}
