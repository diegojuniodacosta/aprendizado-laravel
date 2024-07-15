@extends('layouts.app')

@if(session('success'))
    <div class="message-balloon animate__animated animate__slideInRight">
        {{ session('success') }}
    </div>
@endif

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Editar Carro</h1>

        <form action="{{ route('carros.update', $carro->id) }}" method="POST">
            @csrf
            @method('PUT')
            <br>
            <div class="form-group text-center">
                <label for="marca">Marca</label>
                <input type="text" class="form-control w-50 mx-auto" id="marca" name="marca"
                       value="{{ $carro->marca }}">
            </div>

            <div class="form-group text-center">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control w-50 mx-auto" id="modelo"
                       name="modelo" value="{{ $carro->modelo }}">
            </div>

            <div class="form-group text-center">
                <label for="ano">Ano</label>
                <input type="number" class="form-control w-50 mx-auto" id="ano" name="ano"
                       value="{{ $carro->ano_fabricacao }}">
            </div>

            <div class="form-group text-center">
                <label for="cor">Cor</label>
                <input type="text" class="form-control w-50 mx-auto" id="cor" name="cor"
                       value="{{ $carro->cor }}">
            </div>

            <div class="form-group text-center">
                 <label for="preco">Preço</label>
                <input type="text" class="form-control w-50 mx-auto" id="preco" name="preco"
                       value="{{ $carro->preco }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </form>
    </div>
@endsection
