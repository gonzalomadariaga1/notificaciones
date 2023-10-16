<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;
    protected $table='notificaciones';
    protected $primaryKey='id';

    protected $fillable = [
        'titulo',
        'resumen',
        'contenido',
        'fecha',
        'user_id'
    ];

    public function proyectos(){
        return $this->belongsToMany('App\Models\Proyecto','proyectos_notificaciones','notificacion_id','proyecto_id')->withPivot('id','estado','leido','importancia');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User' , 'user_id');
    }
}
