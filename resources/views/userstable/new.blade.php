@extends('layouts.class')
@section('content')
    <form method="POST" action="{{route('usuario.store')}}" class="form-validate">
        <div class="box-body ">
            @csrf
            <div class="card mb-4">
                <div class="card-header">   
                    <i class="fas fa-table"></i> Cadastrar
                </div>
                <div class="card-body ">
                    <div class="form-row ">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="name" class="col-form-label text-md-right">{{ __('Nome') }}</label>
                                <input id="description" type="description" class=" form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="name" placeholder="Nome" required>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="teledone" class="col-form-label text-md-right">{{ __('Celular') }}</label>
                                <input id="impitTelefone" type="text" name="telefone"  data-mask="(00)00000-0000" maxlength="14" class="form-control">
                                @if ($errors->has('telefone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Type" class="col-form-label text-md-right">{{ __('Tipo') }}</label>
                                <select name="type" id="type" class=" form-control select2" required><br />
                                    <option value="" selected>Selecione um Tipo</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">Usuário</option>
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
                                <label for="password" class="col-form-label text-md-right">{{ __('Senha') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" placeholder="Senha" required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                                <a href="{{route('usuario')}}" class="btn btn-outline-info">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop