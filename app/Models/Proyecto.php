<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasApiTokens, HasFactory;
    
    protected $table='proyectos';
    protected $primaryKey='id';

    protected $fillable = [
        'estado',
        'nombre',
        'url',
        'tkn'
    ];

    public function notificaciones(){
        return $this->belongsToMany('App\Models\Notificacion','proyectos_notificaciones','proyecto_id','notificacion_id')->withPivot('id','estado','leido','importancia');
    }
}
