@extends('layouts.class')
@section('content')
<form action="{{route('user.store')}}"  method="POST">
    @csrf
    <div class="card mb-4">
        <div class="card-header">   
            <i class="fas fa-table"></i>Cadastro Usuário</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Nome</label>
                        <input type="text" name="name" class="form-control" id="ImputName" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Empresa</label>
                        <input type="text" name="company" class="form-control" id="imputCompany" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Rua</label>
                        <input type="text" name="street" class="form-control" id="inputstreet" placeholder="">
                    </div>
                    <div class="form-group col-md-2" placeholder="Número">
                        <label for="">Número</label>
                        <input type="text" name="n_street" class="form-control" id="imputNstreet" placeholder="">
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Bairro</label>
                    <input type="text" name="neighborhood" class="form-control" id="imputNeighborhood">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Cidade</label>
                    <input type="text" name="city" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Estado</label>
                    <input type="text" name="country" class="form-control" id="inputCountry">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="input" class="control-label">Telefone</label>
                    <input type="text" name="telefone" data-mask="(00)0000-0000" class="form-control" id="inputFone" placeholder="" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="input"  class="control-label">Celular</label>
                    <input type="text" name="cel_fone" data-mask="(00)00000-0000" class="form-control" id="inputCel" placeholder="" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">CPF</label>
                    <input type="text" name="cpf"  data-mask="000.000.000-00"  class="form-control" id="inputCPF">
                </div>
                <div class="form-group col-md-3">
                    <label for="Type" class="control-label">{{ __('Tipo') }}</label>
                    <select name="type" id="type" class=" form-control select2" required><br /> 
                        <option value="" selected>Selecione um Tipo</option>
                        <option value="Admin">Admin</option>
                        <option value="Franquiado">Franquiado</option>
                        <option value="Revendedor">Revendedor</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <style>
                    textarea.foo{
                        height: 100px; resize: none;
                        -webkit-box-sizing: border-box;
                        -moz-box-sizing: border-box;
                        box-sizing: border-box;
                        width: 100%;
                    }
                </style>
                <label for="texto" class="col-form-label text-md-right">{{ __('Observação') }}</label>
                <textarea name=observation  class="form-control foo" onkeyup="limite_textarea(this.value)" id="texto" maxlength="2500" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>
    <div class="card-footer small text-muted"></div>
</div>
@stop