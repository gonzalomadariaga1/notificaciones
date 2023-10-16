<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Proyecto;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Proyectos_notificaciones;

class NotificacionesController extends Controller
{
    const PERMISSIONS = [
        'create' => 'admin-notificaciones-create',
        'show' => 'admin-notificaciones-show',
        'edit' => 'admin-notificaciones-edit',
        'delete' => 'admin-notificaciones-delete',
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:'.self::PERMISSIONS['create'])->only(['create', 'store']);
        $this->middleware('permission:'.self::PERMISSIONS['show'])->only(['index', 'show']);
        $this->middleware('permission:'.self::PERMISSIONS['edit'])->only(['edit', 'update']);
        $this->middleware('permission:'.self::PERMISSIONS['delete'])->only('destroy');
    }

    public function index()
    {
        $notificaciones = Notificacion::with('proyectos')->orderBy('id','asc')->get();
        $notificaciones_sin_proyectos = Notificacion::orderBy('id','asc')->get();


        $estados = ['Borrador','Publicada','Programada','Oculta'];

        return view('admin.notificaciones.index' , compact('notificaciones','estados'));
    }

    public function create()
    {
        $proyectos = Proyecto::orderBy('id','asc')->where('estado',1)->get();
        $usuario = Auth::user()->first();

        return view ('admin.notificaciones.create',compact('proyectos','usuario'));
    }

    public function edit($id)
    {

        $proyecto_notif = Proyectos_notificaciones::findOrFail($id);
        $notificacion = Notificacion::findOrFail($proyecto_notif->notificacion_id);
        $usuario = User::findOrFail($notificacion->user_id);
        $proyecto = Proyecto::findOrFail($proyecto_notif->proyecto_id);
        $proyectos = Proyecto::all();
        $estados = ['Borrador','Publicada','Programada','Oculta'];

        return view("admin.notificaciones.edit", compact('proyecto_notif','notificacion','usuario','proyecto','estados','proyectos'));
    }

    public function show($id)
    {
        $proyecto_notif = Proyectos_notificaciones::findOrFail($id);
        $notificacion = Notificacion::findOrFail($proyecto_notif->notificacion_id);
        $usuario = User::findOrFail($notificacion->user_id);
        $proyecto = Proyecto::findOrFail($proyecto_notif->proyecto_id);
        //dd($id);

        //dd($proyecto,$notificacion);

        return view('admin.notificaciones.show', compact('proyecto_notif','notificacion','usuario','proyecto'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'titulo' => 'required|max:25',
            'resumen' => 'required|max:25',
            'contenido' => 'required',
            'fecha' => 'required',
            'estado' => 'required',
            'proyectos' => 'required'
        ]);
        //$verrespuesta = $request->all();
        //dd($verrespuesta);

        $notificacion = new Notificacion;

        $notificacion->titulo = $request->get('titulo');
        $notificacion->resumen = $request->get('resumen');
        $notificacion->contenido = $request->get('contenido');
        $notificacion->fecha = $request->get('fecha');
        $notificacion->user_id = $request->get('user_id');
        $notificacion->save();

        foreach ($request->get('proyectos') as $key => $value) {
            # code...
            $notificacion->proyectos()->attach($value,['estado' => $request->get('estado'), 'importancia' => $request->get('importancia')]);
        }

        toast('La notificación se ha creado correctamente.','success')->timerProgressBar();
        return redirect()->route('admin.notificaciones.index');
    }

    public function update(Request $request,$id)
    {
        //dd($request->all(),);
        $request->validate([
            'titulo' => 'required|max:255',
            'resumen' => 'required',
            'contenido' => 'required',
            'estado' => 'required',
            'proyectos' => 'required',
            'importancia' => 'required'
        ]);

        $proyecto_notif = Proyectos_notificaciones::findOrFail($id);
        $notificacion = Notificacion::findOrFail($proyecto_notif->notificacion_id);

        $proyecto_notif->estado = $request->get('estado');
        $proyecto_notif->importancia = $request->get('importancia');
        $proyecto_notif->proyecto_id = $request->get('proyectos');
        $proyecto_notif->update();

        $notificacion->titulo = $request->get('titulo');
        $notificacion->resumen = $request->get('resumen');
        $notificacion->contenido = $request->get('contenido');
        $notificacion->update();


        toast('La notificación se ha actualizado correctamente.','success')->timerProgressBar();
        return redirect()->route('admin.notificaciones.index');
    }
    

    public function unable_proyecto($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->estado = 0;
        $proyecto->update();
        toast('El proyecto se ha inhabilitado correctamente.','success')->timerProgressBar();
        return redirect()->back();
    }

    public function enable_proyecto($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->estado = 1;
        $proyecto->update();
        toast('El proyecto se ha habilitado correctamente.','success')->timerProgressBar();
        return redirect()->back();
    }

    public function change_estado($option_selected,$id_notificacion){

        $p_n = Proyectos_notificaciones::findOrFail($id_notificacion);
        $p_n->estado = $option_selected;
        $updated = $p_n->update();
        if ($updated) {
            # code...
            return 1;
        } else {
            # code...
            return 0;
        }
        
    }
}