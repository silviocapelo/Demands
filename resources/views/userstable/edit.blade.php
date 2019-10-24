@extends('layouts.class')
@section('content')
<form method="POST" action="{{route('usuario.store')}}" class="form-validate ">
    <div class="box-body ">
        @csrf
        <div class="card mb-4">
            <div class="card-header  ">   
                <i class=" fas fa-table tablecolor"></i>Cadastro Usuário</div>
                <div class="card-body">
                    <div class="form-group row ">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="name" class="col-form-label text-md-right">{{ __('Nome') }}</label>
                                <input id="description" type="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="name" value="{{$users->name}}" placeholder="Nome" required>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="telefone" class="col-form-label text-md-right">{{ __('Celular') }}</label>
                                <input id="telefone" type="text" data-mask="(00)0000-00000" class="form-control" name="telefone"  value="{{$users->telefone}}">
                                @if ($errors->has('telefone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{$users->email}}"  placeholder="E-mail" required>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="Type" class="col-form-label text-md-right">{{ __('Tipo') }}</label>
                        <select name="type"  id="type" class=" form-control select2" required><br />
                            <option value="{{$users->type}}" selected>Selecione um Tipo</option>
                            <option value="1">Admin</option>
                            <option value="2">Usuário</option>
                        </select>
                        @if ($errors->has('type'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('Senha') }}</label>
                        <input id="email" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{$users->password}}" placeholder="Senha" required>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="{{route('usuario')}}" class="btn btn-info">Voltar</a>
                        @if($users->id == auth()->user()->id)
                        @else
                        <div class="btn" data-toggle="buttons"> <!--Ativar e inativar-->
                            <label class="btn btn-success {{ $users->status == 1 ? 'active' : ''}}">
                                <input type="radio" name="status" value="1"
                                autocomplete="off" {{ $users->status == 1 ? 'checked' : ''}}> Ativo
                            </label>
                            <label class="btn btn-danger {{ $users->status == 0 ? 'active' : ''}}">
                                <input type="radio" name="status" value="0"
                                autocomplete="off" {{ $users->status == 0 ? 'checked' : ''}}> Inativo
                            </label>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
</form>
<div class="card-footer small text-muted"></div>
</div>

<script>
    // Material Select Initialization
    $(document).ready(function() {
        $('.form-control').materialSelect();
    });
</script>
@stop