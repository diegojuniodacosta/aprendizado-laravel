@extends('layouts.app')

@if(session('success'))
    <div class="message-balloon animate__animated animate__slideInRight">
        {{ session('success') }}
    </div>
@endif

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Criar Novo Carro</h1>

        <form action="{{ route('carros.store') }}" method="POST">
            @csrf
            <br>
            <div class="form-group text-center">
                <label for="marca">Marca</label>
                <input type="text" class="form-control w-50 mx-auto" id="marca" name="marca"
                placeholder="Digite a Marca">
            </div>

            <div class="form-group text-center">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control w-50 mx-auto" id="modelo" name="modelo"
                placeholder="Digite o Modelo">
            </div>

            <div class="form-group text-center">
                <label for="ano_fabricacao">Ano Fabricação</label>
                <input type="number" class="form-control w-50 mx-auto"
                       id="ano_fabricacao"
                       name="ano_fabricacao"
                placeholder="Digite o Ano">
            </div>

            <div class="form-group text-center">
                <label for="cor">Cor</label>
                <input type="text" class="form-control w-50 mx-auto" id="cor" name="cor"
                placeholder="Digite a Cor">
            </div>

            <div class="form-group text-center">
                <label for="preco">Preço</label>
                <input type="text" class="form-control w-50 mx-auto"
                       id="preco" name="preco"
                placeholder="Digite o Preço">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
                <button type="reset" class="btn btn-secondary">
                    Limpar
                </button>
                <button class="btn btn-danger">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
@endsection
