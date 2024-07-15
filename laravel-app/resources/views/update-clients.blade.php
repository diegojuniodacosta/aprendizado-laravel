@extends('layouts.app')

@section('content')
    <div class="custom text-center mt-5">
        <h1>Editar Clientes</h1>
        <br>
        <form action="{{ route('clients.update', ['client' => $client]) }}" method="POST">
            @csrf
            @method('PUT')
            <label> Id <br>
                <input type="text" name="id" id="id" value="{{ $client }}" required>
            </label>
            <br><br>
            <label> Nome <br>
                <input type="text" name="name" id="name" value="{{ $name }}" required>
            </label>
            <br><br>
            <label> Email <br>
                <input type="text" name="email" id="email" value="{{ $email }}" required>
            </label>
            <br><br>
            <label> Telefone <br>
                <input type="text" name="phone" id="phone" value="{{ $phone }}">
            </label>
            <br><br>
            <button type="submit" class="btn-primary btn-secondary">
                Editar
            </button>
        </form>
    </div>
@endsection
