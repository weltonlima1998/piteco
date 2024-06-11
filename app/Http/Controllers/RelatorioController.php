<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use App\Models\Entrada;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        Carbon::setLocale('pt_BR');
        $dataAtual = Carbon::now()->format('Y-m');
        $saida = $this->top(Saida::class, $dataAtual, $userId);

        $meses = $this->getMesesFormatados($userId);

        return view('relatorio', ['saidas' => $saida, 'meses' => $meses]);
    }

    public function show($data)
    {
        $userId = Auth::id();
        $saida = $this->top(Saida::class, $data, $userId);
        $entrada = $this->top(Entrada::class, $data, $userId);
        return view('relatorio_mes', ['saidas' => $saida, 'entradas' => $entrada]);
    }

    private function top($model, $data, $userId)
    {
        list($ano, $mes) = explode('-', $data);

        $top =  $model::select(
            'categoria_id',
            $model::raw('SUM(valor) as valor_total'),
            $model::raw('COUNT(*) as total_itens')
        )
            ->where('user_id', $userId)
            ->whereYear('created_at', $ano)
            ->whereMonth('created_at', $mes)
            ->groupBy('categoria_id')
            ->orderBy('valor_total', 'desc')
            ->get();
        return $top;
    }

    private function getMesesFormatados($userId)
    {
        $entradas = $this->getDistinctMonths(Entrada::class, $userId);
        $saidas = $this->getDistinctMonths(Saida::class, $userId);

        $meses = array_unique(array_merge($entradas, $saidas));
        sort($meses);

        $mesesFormatados = [];
        foreach ($meses as $mes) {
            $carbonMes = Carbon::createFromFormat('Y-m', $mes);
            $mesesFormatados[] = [
                'original' => $mes,
                'formatado' => $carbonMes->translatedFormat('F \\d\\e Y')
            ];
        }

        return $mesesFormatados;
    }

    private function getDistinctMonths($model, $userId)
    {
        return $model::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
            ->where('user_id', $userId)
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function ($entry) {
                return $entry->year . '-' . str_pad($entry->month, 2, '0', STR_PAD_LEFT);
            })
            ->toArray();
    }
}
