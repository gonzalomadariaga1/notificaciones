<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Proyectos_notificaciones;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function marcar_leida($proyectos_notificaciones_id){

        $mytime = Carbon::now();
        $fecha_now = $mytime->toDateTimeString();

        $proyectos_notificaciones = Proyectos_notificaciones::findOrFail($proyectos_notificaciones_id);
        $proyectos_notificaciones->fecha_lectura = $fecha_now;
        $proyectos_notificaciones->leido = 1;
        $updated = $proyectos_notificaciones->update();

        if ($updated) {
            # code...
            return 1;
        } else {
            # code...
            return 0;
        }
    }
}
