<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Proyectos_notificaciones;

class ApiNotificacionesController extends Controller
{
    //

    public function index(){

        $notificaciones = DB::table('proyectos_notificaciones')
            ->join('notificaciones','proyectos_notificaciones.notificacion_id','=','notificaciones.id')
            ->join('users','notificaciones.user_id','=','users.id')
            ->join('proyectos','proyectos_notificaciones.proyecto_id','=','proyectos.id')
            ->where('proyectos_notificaciones.estado','=','Publicada')
            ->select(
                        'proyectos_notificaciones.id as proyectos_notificaciones_id',
                        'proyectos_notificaciones.estado as proyectos_notificaciones_estado',
                        'proyectos_notificaciones.leido',
                        'proyectos_notificaciones.importancia',
                        'proyectos_notificaciones.fecha_lectura',
                        'notificaciones.id as notificacion_id',
                        'notificaciones.titulo',
                        'notificaciones.resumen',
                        'notificaciones.contenido',
                        DB::raw('DATE_FORMAT(notificaciones.fecha, "%d-%b-%Y %H:%i") as fecha'),
                        'users.id as user_id',
                        'users.name'
            )
        ->get();
        
        return response()->json($notificaciones);
    }

    public function show($id_proyecto){
        $notificaciones = DB::table('proyectos_notificaciones')
            ->join('notificaciones','proyectos_notificaciones.notificacion_id','=','notificaciones.id')
            ->join('users','notificaciones.user_id','=','users.id')
            ->join('proyectos','proyectos_notificaciones.proyecto_id','=','proyectos.id')
            ->where('proyectos_notificaciones.proyecto_id','=',$id_proyecto)
            ->where('proyectos_notificaciones.estado','=','Publicada')
            ->select(
                        'proyectos_notificaciones.id as proyectos_notificaciones_id',
                        'proyectos_notificaciones.estado as proyectos_notificaciones_estado',
                        'proyectos_notificaciones.leido',
                        'proyectos_notificaciones.importancia',
                        'proyectos_notificaciones.fecha_lectura',
                        'notificaciones.id as notificacion_id',
                        'notificaciones.titulo',
                        'notificaciones.resumen',
                        'notificaciones.contenido',
                        DB::raw('DATE_FORMAT(notificaciones.fecha, "%d-%b-%Y %H:%i") as fecha'),
                        'users.id as user_id',
                        'users.name'
            )
        ->get();
        
        return response()->json(['status' => true , 'data' => $notificaciones]);
    }

    public function update($proyectos_notificaciones_id){

        $mytime = Carbon::now();
        $fecha_now = $mytime->toDateTimeString();

        $proyectos_notificaciones = Proyectos_notificaciones::findOrFail($proyectos_notificaciones_id);
        $proyectos_notificaciones->fecha_lectura = $fecha_now;
        $proyectos_notificaciones->leido = 1;
        $updated = $proyectos_notificaciones->update();

        if ($updated) {
            # code...
            return response()->json([
                'status' => true,
                'message' => 'Notificación leída',
            ],200);
        } else {
            # code...
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar notificación.',
            ],400);
        }
    }


}
