
@extends('layouts.class')
@section('content')
<form action="{{route ('cadastro.store')}}"  method="POST">
    @csrf
    <div class="card mb-4 ">
        <div class="card-header ">   
            <i class="fas fa-table colorlabel"></i> Cadastro de Franquias</div>
            <div class="card-body">
                <div class="form-group row colorlabel">
                    <!--------->
                    <!--------->
                    <div class="col-md-4">
                        <label for="Type" class="col-form-label  text-md-right">{{ ('Atribuido para:') }}</label>
                        <select type="text" name="selectemail" id="name-name" class="form-control name " required><br/> 
                            @if(auth()->user()->type == 'admin')  
                            <option value="" selected>Selecione</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                            @else {
                                <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                            }
                            @endif
                        </select>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cnpj" class="col-form-label text-md-right">{{ __('Via de solicitação') }}</label>
                            <input id="cnpj" type="text" class="form-control" name="rout_of_request" placeholder="" required>
                            @if ($errors->has('rout_of_request'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('rout_of_request') }}</strong>
                            </span>
                            @endif 
                        </div>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="resolution" class="col-form-label text-md-right">{{ ('Prazo para resolução') }}</label>
                            <input id="resolution" type="date"  class="form-control" name="solution_term" placeholder="" required>
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
                            <input id="cnpj" type="text" class="form-control " name="solicitante" placeholder="" required>
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
                            <input id="impitTelefone" type="text" name="telefone"  data-mask="(00)0000-0000" maxlength="14" class="form-control">
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
                            <input id="impitTelefone" type="text" name="celular"  data-mask="(00)00000-0000" maxlength="14" class="form-control">
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
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" placeholder="E-mail" required>
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
                            <label for="cit" class="col-form-label text-md-right">{{ __('Cidade') }}</label>
                            <input id="city" type="text" class="form-control cpf_cnpj" name="cidade" placeholder="" required>
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
                            <textarea name=description class="form-control foo" onkeyup="limite_textarea(this.value)" id="texto" maxlength="2500" required></textarea>
                            <span id="cont">2500</span> Restantes <br>
                        </div>
                    </div>
                    <!--------->
                    <!--------->
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
                            <textarea name=outcome  class="form-control foo" onkeyup="limite_textarea(this.value)" id="texto" maxlength="2500"></textarea>
                            <span id="cont">2500</span> Restantes <br>
                        </div>
                    </div>
                    <!--------->
                    <!--------->
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                        <a href="{{route('cadastro')}}"  class="btn btn-outline-info">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="card-footer small text-muted"></div>
</div>
@stop
