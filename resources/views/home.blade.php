@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>      
                <th>Empresa</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Cidade</th>
                <th>Status</th>
                <th>Opção</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td>{{$user->company}}</td>
                    <td>{{$user->telefone}}</td>
                    <td>{{$user->cel_fone}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->status}}</td>
                    <td></td>
                <tr>
            @endforeach
        </tbody>
    </table>
@stop
