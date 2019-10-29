@extends('layouts.class')
@section('content')
<form method="POST" action="{{route('usuario.update',['id'=> $users->id])}}" class="form-validate ">
    <div class="box-body ">
        @csrf
        <div class="card mb-4">
            <div class="card-header  ">   
                <i class=" fas fa-table tablecolor"></i> Cadastro Usuário</div>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Type" class="col-form-label text-md-right">{{ __('Tipo') }}</label>
                        <select name="type"  id="type" class=" form-control select2" required>
                            @if($users->type == 'admin')
                            <option value="admin" selected>Admin</option>
                            <option value="user">Usuário</option>
                            @elseif($users->type == 'user')
                            <option value="user" selected>Usuário</option>
                            <option value="admin">Admin</option>
                            @else
                            @endif
                        </select>
                        @if ($errors->has('type'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Atualizar</button>
                        <a href="{{route('usuario')}}" class="btn btn-outline-info">Voltar</a>
                        @if($users->id == auth()->user()->id)
                        @else
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-success {{ $users->status == 1 ? 'active' : ''}}">
                                <input type="radio" name="status" value="1"
                                autocomplete="off" {{ $users->status == 1 ? 'checked' : ''}}> Ativo
                            </label>
                            <label class="btn btn-outline-danger {{ $users->status == 0 ? 'active' : ''}}">
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