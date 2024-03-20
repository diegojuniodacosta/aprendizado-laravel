@extends('layouts.app')

@section('content')

@endsection

<div class="row justify-content-center mt-2">
    <div class="col-auto text-center">
        <h1>Resultado da Consulta</h1>
        <br>
        @if ($diasRepetidos->isEmpty())
            <p>Nenhum dia repetido encontrado no intervalo de datas fornecido.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Colaborador</th>
                    <th>Justificativa</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($diasRepetidos as $dia)
                    <tr>
                        <td>{{ $dia->id }}</td>
                        <td>{{ $dia->data }}</td>
                        <td>{{ $dia->nome }}</td>
                        <td>{{ $dia->descricao }}</td>
                        <td>
                            <form action="{{ route('diasdeletados.destroy', ['id' => $dia->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <a href="/consultar-dias-repetidos">
            <button class="btn btn-primary">
                Voltar
            </button>
        </a>
    </div>
</div>
