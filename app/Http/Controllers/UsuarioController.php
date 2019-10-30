<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;

class UsersController extends Controller
{
    public function index(User $users,Demand $demand){
        
         if(Auth::user()->type == 'admin'){
            $users = DB::table('users')->get();
            
            return view('userstable.index',compact('users'));
      
          }elseif(Auth::user()->type == 'user'){
      
            $demands = $demand->all();
            $demands = $demand->where('user_id',auth()->user()->id)->get();
            return view('demands.index',compact('demands'));
      
          }

     }
  
     //-----------Visualizar-tela de cadastro-------------
  
      public function create(Demand $demand)
      {
            
            if(Auth::user()->type == 'admin'){
                
                return view('userstable.new');

           }elseif(Auth::user()->type == 'user'){

                $demands = $demand->all();
                $demands = $demand->where('user_id',auth()->user()->id)->get();
                return view('demands.index',compact('demands'));    
           };
        
           
      }
  
     //--------Cadastrar------------------------------------
  
     public function store(Request $request)
     {
         $request->validate([
         'email' => 'required|unique:users',
         ]);

        if(Auth::user()->type == 'admin'){
            $users = new User();
            $users->name       = request('name');
            $users->email      = request('email');
            $users->telefone   = request('telefone');
            $users->status     = 1;
            $users->type       = request('type');
            $users->password   = bcrypt($request->post('password'));
            $users->save();
            return redirect()->route('usuario');
        }else{
            
        }
         
     }
  
     //----------Visualizar tela de Edição----------------
  
     public function edit($id)
     {
         $users = User::find($id);
        //  dd($users);
         return view('userstable.edit', compact('users'));
     }
  
  
  //------------Tela de Edição------------------------------
    
  public function update(Request $request, $id)
      {
          $users = User::findOrFail($id);
          $users->name          = $request->name;
          $users->email         = $request->email;
          $users->telefone      = $request->telefone;
          if($id != auth()->user()->id){
            $users->status        = $request->status;
          }
          $users->type          = $request->type;
          $users->save();
          return redirect()->route('usuario')->with('message', 'Product updated successfully!') ;
  
      }
}
