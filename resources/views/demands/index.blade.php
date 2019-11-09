@extends('layouts.class')
@section('content')
<!-- DataTables Example -->
    <div class="card mb-3 tablecolor">
    <div class="card-header tablecolor ">
        <i class="fas fa-table"></i> Demandas
    </div>
        <div class=" card-body">
            <div class="table-responsive tablecolor">
                <table id="example"  class="table table-bordered table-hover datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Solicitante</th>
                            <th>Atribuido:</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>Email</th> 
                            <th>Cidade</th>    
                            <th>Criação</th>
                            <th>Prazo</th>
                            <th>Via/Solicitação</th>
                            <th>Status</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($demands as $demand)
                            <tr>
                                <td>{{$demand->demand_id}}</td>
                                <td>{{$demand->description}}</td>
                                <td>{{$demand->solicitante}}</td>
                                <td>{{$demand->user->name}}</td>
                                <td>{{$demand->telefone}}</td>
                                <td>{{$demand->celular}}</td>
                                <td>{{$demand->email}}</td>
                                <td>{{$demand->cidade}}</td>
                                <td>{{$demand->created_at->timezone('America/Sao_Paulo')->format('d/m/Y')}}</td>
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
                                    <div align="center">
                                    <a href="{{ route('cadastro.edit',['id'=>$demand->id]) }}">
                                        <em class="fa fa-fw fa-eye"></em></a></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop