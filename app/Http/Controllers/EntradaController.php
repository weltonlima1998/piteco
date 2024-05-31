<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\DespesaFixa;
use App\Models\Entrada;
use App\Models\Saida;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Decimal;

class EntradaController extends Controller
{
    public function add(Request $r)
    {
        $user_id = Auth::id();


        $categorias = Categoria::where('user_id', $user_id)->get();
        return view('adicionar', ['categorias' => $categorias]);
    }

    public function add_action(Request $r)
    {
        $r->validate([
            'categoria_id' => 'integer|exists:categorias,id|required',
            'valor' => 'required'
        ]);
        $r['valor'] = $this->reais($r['valor']);
        echo $r->valor;

        $user_id = Auth::id();
        try {
            $categoria = Categoria::findOrfail($r->categoria_id);

            $dados = $r->only('categoria_id', 'valor');
            $dados['user_id'] = $user_id;
            if ($categoria->trans == 0) {
                $saida = Saida::create($dados);
                if ($r->fixa) {
                    $fixa = DespesaFixa::create($dados);
                }
                return redirect(route('add'))->with('mensagem', true);
            } elseif ($categoria->trans == 1) {
                $entrada = Entrada::create($dados);
            }
            return redirect(route('add'))->with('mensagem', true);
        } catch (\Exception $e) {
            return redirect()->route('add')->with('error', 'Erro ao adicionar ação financeira.');
        }
    }
    public function reais($r)
    {
        $entrada = $r;

        // Remover o "R$" e qualquer espaço em branco
        $entradaSemR = str_replace(['R$', ' '], '', $entrada);

        // Remover qualquer caractere não numérico, exceto a vírgula
        $numeroFormatado = preg_replace('/[^0-9,]/', '', $entradaSemR);

        // Substituir a vírgula por um ponto para obter um número decimal válido
        $numeroFormatado = str_replace(',', '.', $numeroFormatado);

        // Converter a string em um número float
        $numeroFloat = floatval($numeroFormatado);

        // Converter o número float em um objeto Decimal
        $numero = floatval($numeroFloat);

        return $numero;
    }
    public function extrado(Request $r)
    {
        $mes = Carbon::now()->month;
        $user_id = Auth::user()->id;

        $entradas = Entrada::where('user_id', $user_id)
            ->whereMonth('created_at', '=', $mes)
            ->get()
            ->map(function ($entrada) {
                $entrada['tipo'] = 'entrada';
                $entrada['dia'] = Carbon::parse($entrada['created_at'])->format('d');
                return $entrada;
            });

        $saidas = Saida::where('user_id', $user_id)
            ->whereMonth('created_at', '=', $mes)
            ->get()
            ->map(function ($saida) {
                $saida['tipo'] = 'saida';
                $saida['dia'] = Carbon::parse($saida['created_at'])->format('d');
                return $saida;
            });
        Carbon::setLocale('pt');
        $mes = Carbon::now()->translatedFormat('F');
        $registros = $saidas->concat($entradas);
        $registros = $registros->sortByDesc('created_at');
        return view('extrado', compact('registros', 'mes'));
    }
    public function editar(Request $r)
    {
        echo "Editar";
    }
    public function excluir(Request $r)
    {
        $id = $r->id;
        $tipo = $r->tipo;
        if ($this->validarId($id, $tipo)) {
            if ($tipo == 'saida') {
                $saida = Saida::find($id);
                $saida = $saida->delete();
                return redirect(route('extrado'))->with('mensagem', true);
            } else {
                $entrada = Entrada::find($id);
                $entrada = $entrada->delete();
                return redirect(route('extrado'))->with('mensagem', true);
            }
        } else {
            return redirect(route('home'));
        }
    }
    public function validarId($id, $tipo)
    {
        $user_id = Auth::id();
        $verifica = false;
        if ($tipo == 'saida') {
            $verifica = Saida::where('id', $id)
                ->where('user_id', $user_id)
                ->exists();
        } else {
            $verifica = Entrada::where('id', $id)
                ->where('user_id', $user_id)
                ->exists();
        }
        return $verifica;
    }
    public function inserirDespesasFixas()
    {
        $user_id = Auth::id();
        $despesas = DespesaFixa::where('user_id', $user_id)->get();
        try {
            DB::beginTransaction();
            foreach ($despesas as $d) {
                // Extrair os atributos do modelo DespesaFixa
            $attributes = $d->attributesToArray();
            // Adicionar o user_id ao array de atributos
            $attributes['user_id'] = $user_id;
            // Criar uma nova instância de Saida e passar os atributos para create()
            $saida = Saida::create($attributes);
            }
            DB::commit();
            return "Despesas criadas com sucesso!";
        } catch (\Exception $e) {
            DB::rollBack();
            return "Ocorreu um erro ao criar as despesas: " . $e->getMessage();
        }
    }
}
