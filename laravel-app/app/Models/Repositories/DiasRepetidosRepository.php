<?php

namespace App\Models\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class DiasRepetidosRepository extends Model
{
    use HasFactory;

    public function getDayRepeated($dataInicial, $dataFinal, string|null $nomeColaborador)
    {
        return DB::table('dias_repetidos')
            ->select('dias_repetidos.id', 'dias_repetidos.data', 'colaboradores.nome')
            ->join('colaboradores', 'dias_repetidos.colaborador_id', '=', 'colaboradores.id')
            ->whereBetween('dias_repetidos.data', [$dataInicial, $dataFinal])
            ->when($nomeColaborador !== null, function ($query) use ($nomeColaborador) {
                return $query->where('colaboradores.nome', $nomeColaborador);
            })
            ->whereIn('dias_repetidos.data', function ($query) {
                $query->select('data')
                    ->from('dias_repetidos')
                    ->groupBy('data')
                    ->havingRaw('COUNT(*) >= 2');
            })
            ->orderBy('dias_repetidos.data')
            ->get();

    }

    public function deleteDay($id)
    {
        return DB::table('dias_repetidos')->where('id', $id)->delete();
    }
}
