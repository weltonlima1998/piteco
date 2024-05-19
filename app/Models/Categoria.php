<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;
use app\Models\Saida;
use app\Models\Entrada;

class Categoria extends Model
{
    use HasFactory;
    protected $table = "categorias";

    protected $fillable = [
        'name',
        'descricao',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function saida()
    {
        return $this->hasMany(Saida::class);
    }
    public function entrada()
    {
        return $this->hasMany(Entrada::class);
    }
}
