<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Saida;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

class homeController extends Controller
{
    public function home(Request $r)
    {
        $user_id = Auth::user()->id;
        $mes = Carbon::now()->month;

        $entrada = Entrada::where('user_id', $user_id)
            ->whereMonth('created_at', $mes)
            ->sum('valor');

        $saida = Saida::where('user_id', $user_id)
            ->whereMonth('created_at', $mes)
            ->sum('valor');
        if ($entrada != 0) {
            $porcentagem = ($saida / $entrada) * 100;
            $porcentagem = round($porcentagem);
        } else {
            $porcentagem = 0;
        }

        $data = Carbon::now()->formatLocalized('%d de %b');

        return view('home', ['entrada' => $entrada, 'saida' => $saida, 'data' => $data, 'porcentagem' => $porcentagem]);
       
    }
}
