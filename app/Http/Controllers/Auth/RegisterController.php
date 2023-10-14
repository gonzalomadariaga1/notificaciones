<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $userCount = User::count();

        if ($userCount == 0 ) {
            # code...
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $role = Role::create([
                'name' => 'Superadmin',
                'description' => 'Control total del sistema',
                'guard_name' => 'web',
            ]);

            $user->assignRole($role);

            $permiso1 = Permission::create([
                'name' => 'admin-user-create',
                'group_name' => 'Usuarios',
                'description' => 'Creación de usuarios'
            ]);
            $permiso2 = Permission::create([
                'name' => 'admin-user-show',
                'group_name' => 'Usuarios',
                'description' => 'Listado y detalle de usuarios'
            ]);
            $permiso3 = Permission::create([
                'name' => 'admin-user-edit',
                'group_name' => 'Usuarios',
                'description' => 'Edición de usuarios'
            ]);
            $permiso4 = Permission::create([
                'name' => 'admin-role-create',
                'group_name' => 'Roles',
                'description' => 'Creación de roles'
            ]);
            $permiso5 = Permission::create([
                'name' => 'admin-role-show',
                'group_name' => 'Roles',
                'description' => 'Listado y detalle de roles'
            ]);
            $permiso6 = Permission::create([
                'name' => 'admin-role-edit',
                'group_name' => 'Roles',
                'description' => 'Edición de rol'
            ]);
            $permiso7 = Permission::create([
                'name' => 'admin-role-delete',
                'group_name' => 'Roles',
                'description' => 'Eliminación de roles'
            ]);

            $role->givePermissionTo([$permiso1,$permiso2,$permiso3,$permiso4,$permiso5,$permiso6,$permiso7]);

            return $user;
        } else {
            # code...
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
        
        
        

        
    }
}
