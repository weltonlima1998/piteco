<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DespesaFixa extends Model
{
    use HasFactory;

    protected $table = "despesas_fixas";

    protected $fillable = [
        'categoria_id',
        'user_id',
        'valor',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }public function user(){
        return $this->belongsTo(User::class);
    }
}
