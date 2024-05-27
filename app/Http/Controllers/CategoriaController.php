<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function categoria(Request $r)
    {
        return view('categoria');
    }

    public function categoria_action(Request $r)
    {
        // Validação dos dados da requisição
        $r->validate([
            'name' => 'required|string|min:3|max:35',
        ]);

        // Obter o ID do usuário autenticado
        $user = Auth::user()->id;

        // Preparar os dados para a nova Categoria
        $dados['user_id'] = $user;
        $dados['name'] = $r->name;

        // Definir o valor para o campo 'trans' baseado no estado do checkbox 'fluxo'
        $dados['trans'] = $r->has('fluxo') ? 1 : 0;

        // Criar e salvar a nova Categoria
        $categoria = Categoria::create($dados);

        // Redirecionar para a rota 'add'
        return redirect(route('categoria'))->with('mensagem', true);
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
        $numero = floatval($numeroFormatado);

        return $numero;
    }
    public function gerenciar(Request $r)
    {
        $user_id = Auth::user()->id;
        $categorias = Categoria::where('user_id', $user_id)->get();
        return view('gerenciar_categoria')->with('categorias', $categorias);
    }
}
