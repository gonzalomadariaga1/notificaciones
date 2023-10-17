<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Models\Proyectos_notificaciones;
use App\Traits\ConsumeApiNotificaciones;

class MenuContentProvider extends ServiceProvider
{
    use ConsumeApiNotificaciones;
    public $notificaciones;
    public $notif_no_leidas;
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {

        $method = 'GET';
        $uri= '1';

        $this->notificaciones = $this->makeRequest($method,$uri);

        // $client = new Client();
        // $headers = [
        //     'Accept'        => 'application/json', 
        //     'Authorization' => 'Bearer ' . '1|RldBimYO63bHxHDFm6vWX25ZvynOgbnGgwS3KOv9ec50235d', 
        // ];

        // try {
        //     $response = $client->request('GET', 'https://notificaciones.pspsiche.com/api/notificaciones/1', [
        //         'headers' => $headers,
        //     ]);

        //     $body = $response->getBody()->getContents();
        //     $data = json_decode($body);
        //     $this->notificaciones = $data;
        
        // } catch (Exception $e) {
        //     // Maneja cualquier excepción que ocurra durante la solicitud
        //     echo 'Error: ' . $e->getMessage();
        // }

        // $this->notif_no_leidas = Proyectos_notificaciones::where('leido',0)->where('estado','Publicada')->where('proyecto_id',$this->id_proyecto)->count();


        // $this->notificaciones = DB::table('proyectos_notificaciones')
        //                 ->join('notificaciones','proyectos_notificaciones.notificacion_id','=','notificaciones.id')
        //                 ->join('users','notificaciones.user_id','=','users.id')
        //                 ->join('proyectos','proyectos_notificaciones.proyecto_id','=','proyectos.id')
        //                 ->where('proyectos_notificaciones.proyecto_id','=',$this->id_proyecto)
        //                 ->where('proyectos_notificaciones.estado','=','Publicada')
        //                 ->select(
        //                             'proyectos_notificaciones.id as proyectos_notificaciones_id',
        //                             'proyectos_notificaciones.estado as proyectos_notificaciones_estado',
        //                             'proyectos_notificaciones.leido',
        //                             'proyectos_notificaciones.importancia',
        //                             'proyectos_notificaciones.fecha_lectura',
        //                             'notificaciones.id as notificacion_id',
        //                             'notificaciones.titulo',
        //                             'notificaciones.resumen',
        //                             'notificaciones.contenido',
        //                             DB::raw('DATE_FORMAT(notificaciones.fecha, "%d-%b-%Y %H:%i") as fecha'),
        //                             'users.id as user_id',
        //                             'users.name'
        //                 )
        //                 ->get();


        view()->composer('layouts.app', function($view) {
            $view->with(['notificaciones' => $this->notificaciones]);
        });
    }
}
