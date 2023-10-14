<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    //
    const PERMISSIONS = [
        'create' => 'admin-user-create',
        'show' => 'admin-user-show',
        'edit' => 'admin-user-edit',
    ];

    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['create'])->only(['create', 'store']);
        $this->middleware('permission:'.self::PERMISSIONS['show'])->only(['index', 'show']);
        $this->middleware('permission:'.self::PERMISSIONS['edit'])->only(['edit', 'update']);
    }

    public function index()
    {
        $users = User::orderBy('id','asc')->get();

        return view('admin.users.index' , ['users' => $users]);
    }

    public function create()
    {
        return view ('admin.users.create');
    }

    public function edit($id)
    {

        $usuario = User::findOrFail($id);

        
        return view("admin.users.edit",[
            "usuario"=>$usuario,
            'roles' => Role::orderBy('id')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|between:8,255|confirmed',
            'password_confirmation' => 'required',
        ]);
        //$verrespuesta = $request->all();
        //dd($verrespuesta);

        $usuarios = new User;

        $usuarios->name = $request->get('name');
        $usuarios->email = $request->get('email');
        $usuarios->password = Hash::make($request->password);
        $usuarios->save();

        toast('El usuario se ha creado correctamente.','success')->timerProgressBar();
        return redirect()->route('admin.users.index');
    }

    public function update_name_email(Request $request, $id){
        $usuarios = User::findOrFail($id);

        $usuarios->name = $request->get('name');
        $usuarios->email = $request->get('email');


        $usuarios->update();

        toast('El usuario se ha actualizado correctamente.','success')->timerProgressBar();
        return redirect()->back();
    }

    public function update_permiso(Request $request, $id)
    {
        
        $usuarios = User::findOrFail($id);
        $usuarios->roles()->sync($request->get('permiso'));
        toast('El usuario se ha actualizado correctamente.','success')->timerProgressBar();
        return redirect()->back();
    }

    public function unable_user($id)
    {
        $usuarios = User::findOrFail($id);
        $usuarios->estado = 0;
        $usuarios->update();
        toast('El usuario se ha inhabilitado correctamente.','success')->timerProgressBar();
        return redirect()->back();
    }

    public function enable_user($id)
    {
        $usuarios = User::findOrFail($id);
        $usuarios->estado = 1;
        $usuarios->update();
        toast('El usuario se ha habilitado correctamente.','success')->timerProgressBar();
        return redirect()->back();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', [
            'user' => $user->load('roles','permissions')
        ]);
    }
}
