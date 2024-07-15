@extends('layouts.app')

@section('content')

@endsection

<div class="custom text-center mt-5">
    <h1>Cadastrar Clientes</h1>
    <br>
    <form action="/clients" method="POST">
        @csrf
        <label> Nome Cliente <br>
            <input type="text" name="name" id="name"  value="eee" required>
        </label>
        <br><br>
        <label> Email <br>
            <input type="text" name="email" id="email" value="eeeee" required>
        </label>
        <br><br>
        <label> Telefone <br>
            <input type="text" name="phone" id="phone" value="898898">
        </label>
        <br><br>
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </form>
    <form action="{{ route('clients.destroy', $clientId) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-primary btn-dark">
            Deletar
        </button>
    </form>
    <form action="{{ route('clients.update', $clientId) }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit" class="btn-primary btn-secondary">
            Editar
        </button>
    </form>
</div>
