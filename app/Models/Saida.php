<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria; // Corrigido o namespace para 'App\Models'
use App\Models\User; 

class Saida extends Model
{
    use HasFactory;

    protected $table = 'saidas';

    protected $fillable = [
        'categoria_id',
        'user_id',
        'valor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
