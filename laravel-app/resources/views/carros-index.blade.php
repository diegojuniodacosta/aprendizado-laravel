@extends('layouts.app')

@if(session('success'))
    <div class="message-balloon animate__animated animate__slideInRight">
        {{ session('success') }}
    </div>
@endif

@section('content')
    <style>
        .table-container {
            width: 80%;
            margin: 0 auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #f2f2f2;
        }

        .table td {
            text-align: center;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

    </style>

    <div class="table-container custom text-center mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('carros.create') }}" class="btn btn-success mb-3">
                Novo Carro
            </a>
        </div>
        <h1 class="mb-4">Lista de Carros</h1>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Cor</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carros as $carro)
                <tr>
                    <td>{{ $carro->marca }}</td>
                    <td>{{ $carro->modelo }}</td>
                    <td>{{ $carro->ano_fabricacao }}</td>
                    <td>{{ $carro->cor }}</td>
                    <td>{{ $carro->preco }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('carros.edit', $carro->id) }}"
                               class="btn btn-primary btn-sm">
                                Editar
                            </a>
                            <form action="{{ route('carros.destroy', $carro->id) }}"
                                  method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
