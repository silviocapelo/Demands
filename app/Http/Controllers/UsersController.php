<?php

namespace App\Http\Controllers;
use DB;
use App\User;


use Illuminate\Http\Request;

class UsersController extends Controller
{
//     //-----------Visualização de clientes cadastrados-----------
//     public function index()
//     {
//         $users = DB::table('users')->get();
//         return view('users.index',compact('users'));

//     }


//     public function create()
//     {

//         return view('users.new');
   
//      }
    
//      //------------Cadastro de usuario -----------------------------
//      public function store(Request $request)
//     {  
//         $users = new User;
//         $users->name         = request('name');
//         $users->email        = request('email');
//         $users->password     = bcrypt($request->post('password'));
//         $users->status       = 1;
//         $users->type         = request('type');
//         $users->company      = request('company');
//         $users->telefone     = request('telefone');
//         $users->cel_fone     = request('cel_fone');
//         $users->cpf          = request('cpf');
//         $users->street       = request('street');
//         $users->n_street     = request('n_street');
//         $users->neighborhood = request('neighborhood');
//         $users->city         = request('city');
//         $users->country      = request('country');
//         $users->observation  = request('observation');
//         $users->save();
//         return redirect()->route('user');
//     }


//     public function edit($id)
//     {
//         $users = User::find($id);
//         //dd($users);
//         return view('users.edit', compact('users'));
//     }
 
//  public function update(Request $request, $id)
//      {
//          $users = User::findOrFail($id);
//          $users->name         = request('name');
//          $users->email        = request('email');
//          $users->password     = bcrypt($request->post('password'));
//          $users->status       = 1;
//          $users->type         = request('type');
//          $users->company      = request('company');
//          $users->telefone     = request('telefone');
//          $users->cel_fone     = request('cel_fone');
//          $users->street       = request('cpf');
//          $users->street       = request('street');
//          $users->n_street     = request('n_street');
//          $users->neighborhood = request('neighborhood');
//          $users->city         = request('city');
//          $users->country      = request('country');
//          $users->observation  = request('observation');
//          $users->save();
//          return redirect()->route('user');
    //  }








}
