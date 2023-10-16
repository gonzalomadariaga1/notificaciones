<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos_notificaciones extends Model
{
    use HasFactory;
    protected $table='proyectos_notificaciones';
    protected $primaryKey='id';
    public $timestamps = false;

    protected $fillable = [
        'estado',
        'leido',
        'importancia',
        'fecha_lectura',
        'proyecto_id',
        'notificacion_id'
    ];
}
