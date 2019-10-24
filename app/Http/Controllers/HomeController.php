<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function update(Request $request, $id)
     {
         $users = User::findOrFail($id);
         $users->name         = request('name');
         $users->email        = request('email');
         $users->password     = bcrypt($request->post('password'));
         $users->status       = 1;
         $users->type         = request('type');
         $users->company      = request('company');
         $users->telefone     = request('telefone');
         $users->cel_fone     = request('cel_fone');
         $users->street       = request('cpf');
         $users->street       = request('street');
         $users->n_street     = request('n_street');
         $users->neighborhood = request('neighborhood');
         $users->city         = request('city');
         $users->country      = request('country');
         $users->observation  = request('observation');
         $users->save();
         return redirect()->route('home');
     }










}
