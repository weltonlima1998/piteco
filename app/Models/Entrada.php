<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Categoria;

class Entrada extends Model
{
    use HasFactory;
    protected $table = "entradas";
    protected $fillable = [
        'categoria_id',
        'user_id',
        'valor',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
