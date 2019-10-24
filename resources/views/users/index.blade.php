@extends('layouts.class')
@section('content')
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table Example</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Empresa</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>Cidade</th>
                            <th>Tipo</th>      
                            <th>Status</th>
                            <th>Opção</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->company}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->telefone}}</td>
                            <td>{{$user->cel_fone}}</td>
                            <td>{{$user->city}}</td>
                            <td> 
                                @if($user->type == 'Admin' )
                                <span class="text-success">Admin</span>
                                @elseif ($user->type == 'Franquiado')
                                <span class="text-danger">Franquiado</span>
                                @elseif ($user->type == 'Revendedor')
                                <span class="text-warning">Revendedor</span>
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
                            <a href="{{route('user.edit',['id'=>$user->id]) }}" ><em class="fa fa-fw fa-eye"></em> Editar</a>
                            </td>
                        </tr>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div class="card-footer small text-muted">Updated yesterday at 11:59 PM
</div>
<p class="small text-center text-muted my-5">
    <em>More table examples coming soon...</em>
</p>
@stop