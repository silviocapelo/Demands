@extends('layouts.class')
@section('content')
<!-- DataTables Example -->
<div class="card mb-4">
    <div class="card-header ">   
        <i class="fas fa-table"></i>Cadastro Usuário</div>
        <div class="card-body">
            <div class="form-row">
                <div class="table-responsive ">
                    <table class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Tipo</th>
                                <th>status</th>
                                <th>Visualizar</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telefone}}</td>
                                <td>
                                    @if($user->type == 'admin' )
                                    <span class="text-success">Admin</span>
                                    @else
                                    <span class="text-warning">Usuário</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->status == 1 )
                                    <span class="text-success">Ativo</span>
                                    @else
                                    <span class="text-danger">Inativo</span>
                                    @endif
                                </td>
                                <td class="options">
                                    <a href="{{route('usuario.edit',['id'=>$user->id]) }}" ><em class="fa fa-fw fa-eye"></em> Visualizar</a>
                                </td>
                            </tr>
                            @endforeach       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer small text-muted"></div>
</div>
</div>
</div>
</div>
@stop