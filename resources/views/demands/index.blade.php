@extends('layouts.class')
@section('content')
<!-- DataTables Example -->

<div class="card mb-3 tablecolor">
    <div class="card-header tablecolor ">
        <i class="fas fa-table"></i>
        Data Table Example</div>
        
        <div class=" card-body">
            <div class="table-responsive tablecolor">
                <table class="table tablecolor table-bordered datatable-tauflow" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Solicitante</th>
                            <th>Atribuido para:</th>
                            <th>Descrição</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>Email</th> 
                            <th>cidade</th>    
                            <th>Criação</th>
                            <th>Prazo</th>
                            <th>Via de Solicitação</th>
                            <th>Status</th>
                            <th>Opção</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($demands as $demand)
                        <tr>
                            <td>{{$demand->id}}</td>
                            <td>{{$demand->solicitante}}</td>
                            <td>{{$demand->user->name}}</td>
                            <td>{{$demand->description}}</td>
                            <td>{{$demand->telefone}}</td>
                            <td>{{$demand->celular}}</td>
                            <td>{{$demand->email}}</td>
                            <td>{{$demand->cidade}}</td>
                            <td>{{$demand->created_at->timezone('America/Sao_Paulo')->format('d-m-Y')}}</td>
                            <td>{{date('d/m/Y', strtotime($demand->solution_term))}}</td>
                            <td>{{$demand->rout_of_request}}</td>
                            <td>
                                @if($demand->status == 1 )
                                <span class="text-success">Aberto</span>
                                @else
                                <span class="text-danger">Fechado</span>
                                @endif
                            </td>
                            <td class="options">
                                <a href="{{ route('cadastro.edit',['id'=>$demand->id]) }}">
                                    <em class="fa fa-fw fa-eye"></em> Visualizar</a>
                                </td>
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
</div>



<script>
    render: function ( data, type, row ) {
    return data.length > 10 ?
        data.substr( 0, 10 ) +'…' :
        data;
}
$('#datatable-tauflow').DataTable( {
    columnDefs: [ {
        targets: 0,
        render: $.fn.dataTable.render.ellipsis()
    } ]
} );
        </script>

    
    @stop