<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    //
    const PERMISSIONS = [
        'create' => 'admin-role-create',
        'show' => 'admin-role-show',
        'edit' => 'admin-role-edit',
        'delete' => 'admin-role-delete',
    ];

    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['create'])->only(['create', 'store']);
        $this->middleware('permission:'.self::PERMISSIONS['show'])->only(['index', 'show']);
        $this->middleware('permission:'.self::PERMISSIONS['edit'])->only(['edit', 'update']);
        $this->middleware('permission:'.self::PERMISSIONS['delete'])->only('destroy');
    }
    
    public function index()
    {
        $rows = Role::orderBy('name')->paginate();

        return view('admin.roles.index', [
            'rows' => $rows,
        ]);
    }

    public function create()
    {

        $permisos = DB::table('permissions')
        ->select('id','name','group_name','description')
        ->get();

        $permisosgroup = array_group_by($permisos->toArray(),'group_name');
        $group_names_roles = array_keys($permisosgroup);

        

        return view('admin.roles.create', [
            'row' => new Role(),
            'permissions' => $permisosgroup,
            'group_names_roles' => $group_names_roles

        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            
        ]);
        
        $row = new Role;
        $row->name = $request->get('name');
        $row->description = $request->get('description');

        $get_permiso = $request->get('permiso');

        if( is_null($get_permiso) == true){
            toast('No es posible crear un rol sin permisos.','error')->timerProgressBar();
            return redirect()->route('admin.roles.create');
        }else{

            
            $row->save();
            $row->permissions()->sync($request->get('permiso'));

            toast('El rol se ha creado correctamente.','success')->timerProgressBar();
            return redirect()->route('admin.roles.index');

        }

        

    }

    public function show(Role $role)
    {
        $permisosgroup = array_group_by($role->load('permissions')->permissions->toArray(),'group_name');
        //dd($permisosgroup );

        return view('admin.roles.show', [
            'row' => $role->load('permissions'),
            'row_user' => $role->load('users'),
            'permisosgroup' => $permisosgroup

        ]);
    }

    public function edit(Role $role)
    {
        $permisos = DB::table('permissions')
        ->select('id','name','group_name','description')
        ->get();

        $permisosgroup = array_group_by($permisos->toArray(),'group_name');
        $group_names_roles = array_keys($permisosgroup);

        

        return view('admin.roles.edit', [
            'row' => $role,
            'permissions' => $permisosgroup,
            'group_names_roles' => $group_names_roles
        ]);
    }

    public function update(Request $request, Role $role)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            
        ]);

        $get_permiso = $request->get('permiso');
        

        if( is_null($get_permiso) == true){
            toast('No es posible actualizar un rol sin permisos.','error')->timerProgressBar();
            return redirect()->route('admin.roles.edit',$role->id);
        }else{

            
            $role->update($request->all());
            $role->permissions()->sync($request->get('permiso'));

            toast('El rol se ha actualizado correctamente.','success')->timerProgressBar();
            return redirect()->route('admin.roles.index');
        }

        

    }

    public function destroy(Role $role)
    {
        $role->delete();


        toast('El rol se ha eliminado correctamente.','success')->timerProgressBar();
        return redirect()->route('admin.roles.index');
    }
}
