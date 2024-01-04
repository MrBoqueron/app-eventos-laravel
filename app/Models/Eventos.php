<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Eventos extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'hora',
        'lugar',
        'imagen',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
