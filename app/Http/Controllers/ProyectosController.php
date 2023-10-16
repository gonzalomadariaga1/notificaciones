<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProyectosController extends Controller
{
    const PERMISSIONS = [
        'create' => 'admin-proyectos-create',
        'show' => 'admin-proyectos-show',
        'edit' => 'admin-proyectos-edit',
        'delete' => 'admin-proyectos-delete',
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
        $proyectos = Proyecto::orderBy('id','asc')->get();

        return view('admin.proyectos.index' , compact('proyectos'));
    }

    public function create()
    {
        return view ('admin.proyectos.create');
    }

    public function edit($id)
    {

        $proyecto = Proyecto::findOrFail($id);

        
        return view("admin.proyectos.edit", compact('proyecto'));
    }

    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        return view('admin.proyectos.show', compact('proyecto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'url' => 'required|max:255'
        ]);
        //$verrespuesta = $request->all();
        //dd($verrespuesta);

        $proyecto = new Proyecto;

        $proyecto->nombre = $request->get('nombre');
        $proyecto->url = $request->get('url');
        $proyecto->save();
        $token = $proyecto->createToken('API TOKEN')->plainTextToken;

        $set_token = Proyecto::findOrFail($proyecto->id);
        $set_token->tkn = $token;
        $set_token->update();

        toast('El proyecto se ha creado correctamente.','success')->timerProgressBar();
        return redirect()->route('admin.proyectos.index');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'url' => 'required|max:255'
        ]);

        $proyecto = Proyecto::findOrFail($id);

        $proyecto->nombre = $request->get('nombre');
        $proyecto->url = $request->get('url');


        $proyecto->update();

        toast('El proyecto se ha actualizado correctamente.','success')->timerProgressBar();
        return redirect()->route('admin.proyectos.index');
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
}
