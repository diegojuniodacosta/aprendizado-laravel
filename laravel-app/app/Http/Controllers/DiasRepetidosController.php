<?php

namespace App\Http\Controllers;

use App\Models\Repositories\DiasRepetidosRepository;
use Illuminate\Http\Request;

class DiasRepetidosController extends Controller
{
    protected DiasRepetidosRepository $diasRepetidosRepository;

    public function __construct(DiasRepetidosRepository $diasRepetidosRepository)
    {
        $this->diasRepetidosRepository = $diasRepetidosRepository;

    }

    public function index()
    {
        return view('consultar-dias-repetidos');
    }

    public function show(Request $request)
    {
        $dataInicial = $request->input('data_inicial');
        $dataFinal = $request->input('data_final');
        $nomeColaborador = $request->input('nome_colaborador');

        $diasRepetidos = $this->diasRepetidosRepository
            ->getDayRepeated($dataInicial, $dataFinal, $nomeColaborador);

        return view('resultado-da-consulta', ['diasRepetidos' => $diasRepetidos]);
    }

    public function destroy($id)
    {
        $dayExcluded = $this->diasRepetidosRepository->deleteDay($id);

        if ($dayExcluded){
            return redirect()->back()->with('success', 'Registro excluído com sucesso.');
        }
        return redirect()->back()->with('error', 'Registro não foi excluído');
    }
}
