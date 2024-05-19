<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class LoginController extends Controller
{
    public function login(Request $r)
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('login');
    }
    public function cadastro(Request $r)
    {
        return view('cadastro');
    }
    public function login_action(Request $r)
    {
        $r->validate([
            'email_login' => 'required|email',
            'password_login' => 'required|min:6'
        ]);
        $r['password'] = $r['password_login'];
        $r['email'] = $r['email_login'];
        $dados = $r->only('email', 'password');
        if (Auth::attempt($dados)) {
            return redirect(route('home'));
        } else {
            return redirect(route('login'));
        }
    }

    public function cadastro_action(Request $r)
    {
        $r->validate([
            'name' => 'required|min:6|regex:/\s/',
            'email' => 'email|required|unique:users|max:255',
            'password' => 'required|min:6|confirmed'
        ]);
        $dados = $r->only('name', 'email', 'password');
        $dados['name'] = strtolower($dados['name']);
        $dados['name'] = $this->maiusculas($dados['name']);
        $user = User::create($dados);
        return redirect(route('login'));
    }
    public function logout_action(Request $r)
    {
        Auth::logout();
        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect(route('login'));
    }
    public function home(Request $r)
    {
        return view('home');
    }
    public function perfil(Request $r)
    {
        if (Auth::check()) {
            $dados['user'] = Auth::user();
            return view('perfil', $dados);
        } else {
            return redirect(route('login'));
        }
    }
    public function perfil_action(Request $r)
    {
        if ($r->isMethod('post')) {
            $user = Auth::user();
            $r->validate([
                'name' => 'required|string|max:255|regex:/\s/',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:6|confirmed',
            ]);
            $r['name'] = $this->maiusculas($r->name);
            $user->name = $r->name;
            $user->email = $r->email;

            if ($r->filled('password')) {
                $user->password = bcrypt($r->password);
            }

            $user->save();
            return redirect(route('perfil'));
        } else {
            return redirect(route('perfil'));
        }

    }
    public function maiusculas($letra)
    {
        $letra = strtolower($letra);
        $letra = ucwords($letra);
        return $letra;
    }
    
}
