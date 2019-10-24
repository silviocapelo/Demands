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
                            <th>Status</th>
                            <th>Opção</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($franchisees as $franchisee)
                        <tr>
                            <td>{{$franchisee->name}}</td>
                            <td>{{$franchisee->company}}</td>
                            <td>{{$franchisee->email}}</td>
                            <td>{{$franchisee->telefone}}</td>
                            <td>{{$franchisee->cell_fone}}</td>
                            <td>{{$franchisee->city}}</td>
                            <td>
                                @if($franchisee->status == 1 )
                                <span class="text-success">Ativo</span>
                                @else
                                <span class="text-danger">Inativo</span>
                                @endif  
                            </td>
                            <td class="options">
                                <a href="{{ route('franchisee.edit',['id'=>$franchisee->id]) }} ><em class="fa fa-fw fa-eye"></em> Editar</a>
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