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
        $r->validate([
            'name' => 'required|string',
            'descricao' => 'string|nullable'
        ]);

        $user = Auth::user();

        $dados = $r->only('name', 'descricao');
        $dados['user_id'] = $user->id; // Incluindo o ID do usuário na array $dados
        if ($dados['descricao'] == null) {
            $dados['descricao'] = ' ';
        }
        $dados['name'] = strtolower($dados['name']);
        $dados['name'] = ucwords($dados['name']);

        $categoria = Categoria::create($dados);
        return redirect(route('add'));
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
        $user_id =Auth::user()->id;
        $categorias = Categoria::where('user_id',$user_id)->get();
        return view('gerenciar_categoria')->with('categorias',$categorias);
    }
}
