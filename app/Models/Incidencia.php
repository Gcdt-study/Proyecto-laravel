<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'aula_id',
        'dispositivo_id',
        'titulo',
        'descripcion',
        'estado',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profesor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


