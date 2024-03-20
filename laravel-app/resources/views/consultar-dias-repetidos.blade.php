@extends('layouts.app')

@section('content')

@endsection

<div class="custom text-center mt-5">
    <h1>Consultar Dias Repetidos</h1>
    <br>
    <form action="/dias-repetidos" method="GET">
        <label> Data Inicial <br>
            <input type="date" name="data_inicial" required>
        </label>
        <br><br>
        <label> Data Final <br>
            <input type="date" name="data_final" required>
        </label>
        <br><br>
        <label> Nome Colaborador <br>
            <input type="text" name="nome_colaborador">
        </label>
        <br><br>
        <button type="submit" class="btn btn-primary">
            Consultar
        </button>
    </form>
</div>
