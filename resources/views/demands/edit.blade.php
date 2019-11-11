@extends('layouts.class')
@section('content')
    <form action="{{route('cadastro.update', $demand->id)}}"method="POST">
        @csrf
        <div class="card mb-4">
            <div class="card-header">   
                <i class="fas fa-table"></i> Editar
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <!--------->
                    <!--------->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="NDemanda" class="col-form-label text-md-right">{{ __('Número') }}</label>
                            <input id="N_demand" type="text" class="form-control" name="demand_id" value="{{$demand->demand_id}}" placeholdermanda="" required>
                            @if ($errors->has('demand_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('demand_id') }}</strong>
                            </span>
                            @endif 
                        </div>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-4">
                        <label for="Type" class="col-form-label text-md-right">{{ ('Atribuido para:') }}</label>
                        <select type="text" name="selectemail" id="name-name" class="form-control name " required><br/> 
                            <option value="">Selecione</option>
                            @foreach ($users as $user)
                                @if($demand->user_id == $user->id)
                                    <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                @else
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cnpj" class="col-form-label text-md-right">{{ __('Via de solicitação') }}</label>
                            <input id="cnpj" type="text" class="form-control cpf_cnpj" name="rout_of_request" value="{{$demand->rout_of_request}}" required>
                            @if ($errors->has('rout_of_request'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('rout_of_request') }}</strong>
                            </span>
                            @endif 
                        </div>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="resolution" class="col-form-label text-md-right">{{ ('Prazo para resolução') }}</label>
                            <input id="resolution" type="date" class="form-control" name="solution_term" value="{{$demand->solution_term}}" placeholder="" required>
                            @if ($errors->has('solution_term'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('solution_term') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cnpj" class="col-form-label text-md-right">{{ __('Solicitante') }}</label>
                            <input id="cnpj" type="text" class="form-control" value="{{$demand->solicitante}}" name="solicitante" placeholder="" required>
                            @if ($errors->has('solicitante'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('solicitante') }}</strong>
                            </span>
                            @endif 
                        </div>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="teledone" class="col-form-label text-md-right">{{ __('Telefone') }}</label>
                            <input id="impitTelefone" type="text" name="telefone" value="{{$demand->telefone}} "data-mask="(00) 0000-0000" maxlength="14" class="form-control">
                            @if ($errors->has('telefone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telefone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="teledone" class="col-form-label text-md-right">{{ __('Celular') }}</label>
                            <input id="impitTelefone" type="text" name="celular" value="{{$demand->celular}}"  data-mask="(00) 00000-0000" maxlength="14" class="form-control">
                            @if ($errors->has('celular'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('celular') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>    
                    <!--------->
                    <!--------->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <input id="email" type="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$demand->email}}" placeholder="E-mail" required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Email já cadastrado</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cnpj" class="col-form-label text-md-right">{{ __('Cidade') }}</label>
                            <input id="city" type="text" class="form-control cpf_cnpj" name="cidade" value="{{$demand->cidade}}" placeholder="" required>
                            @if ($errors->has('cidade'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                            @endif 
                        </div>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-12">
                        <div class="form-group">
                            <style>
                                textarea.foo{
                                    resize:none;
                                }
                            </style>
                            <label for="texto" class="col-form-label text-md-right">{{ __('Descrição da solicitação') }}</label>
                            <textarea name=description class="form-control foo" onkeyup="limite_textarea(this.value)" id="textarea" maxlength="2500" required>{{$demand->description}}</textarea>
                            <span id="count">2500</span> Restantes <br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">   
                            <style>
                                textarea.foo{
                                    height: 150px; resize: none;
                                    -webkit-box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    box-sizing: border-box;
                                    width: 100%; 
                                }
                            </style>
                            <label for="texto" class="col-form-label text-md-right">{{ __('Desfecho da demanda') }}</label>
                            <textarea name=outcome  class="form-control foo" onkeyup="limite_textarea(this.value)" id="textarea1" maxlength="2500">{{$demand->outcome}}</textarea>
                            <span id="count1">2500</span> Restantes <br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            @if (auth()->user()->type == 'user')
                            <a style="margin-left:"  href="{{route('email',['id'=>$demand->id])}}" class="btn btn-outline-danger">Finalizar</a>
                            @endif
                                  
                            @if ($demand->status == '0' && auth()->user()->type == 'user') 
                                <a style="margin-left:1%"  href="{{route('cadastro')}}" class="btn btn-outline-info">Voltar</a>                   
                            @else
                                <button type="submit" class="btn btn-outline-primary">Atualizar</button>
                                <a href="{{route('cadastro')}}" class="btn btn-outline-info">Voltar</a>
                            @endif
                            @if(auth()->user()->type == 'admin')
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-success {{ $demand->status == 1 ? 'active' : ''}}">
                                        <input type="radio" name="status" value="1"
                                        autocomplete="off" {{$demand->status == 1 ? 'checked' : ''}}> Aberto
                                    </label>
                                    <label class="btn btn-outline-danger {{$demand->status == 0 ? 'active' : ''}}">
                                        <input type="radio" name="status" value="0"
                                        autocomplete="off" {{$demand->status == 0 ? 'checked' : ''}}> Fechado
                                    </label>
                                </div>
                             @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.getElementById('textarea').onkeyup = function () {

            document.getElementById('count').innerHTML = "" + (2500 - this.value.length);

        };
        document.getElementById('textarea1').onkeyup = function () {
            
            document.getElementById('count1').innerHTML = "" + (2500 - this.value.length);

        };
    </script>
@stop
