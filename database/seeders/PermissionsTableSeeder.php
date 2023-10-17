<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\NotificacionesController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /**
         * Admin / Proyectos
         */
        Permission::updateOrCreate(['name' => ProyectosController::PERMISSIONS['create']], [
            'group_name' => 'Proyectos',
            'description' => 'Creación de proyectos'
        ]);
        Permission::updateOrCreate(['name' => ProyectosController::PERMISSIONS['show']], [
            'group_name' => 'Proyectos',
            'description' => 'Listado y detalle de proyectos'
        ]);
        Permission::updateOrCreate(['name' => ProyectosController::PERMISSIONS['edit']], [
            'group_name' => 'Proyectos',
            'description' => 'Edición de proyectos'
        ]);
        Permission::updateOrCreate(['name' => ProyectosController::PERMISSIONS['delete']], [
            'group_name' => 'Proyectos',
            'description' => 'Eliminación de proyectos'
        ]);

        /**
         * Admin / Notificaciones
         */
        Permission::updateOrCreate(['name' => NotificacionesController::PERMISSIONS['create']], [
            'group_name' => 'Notificaciones',
            'description' => 'Creación de notificaciones'
        ]);
        Permission::updateOrCreate(['name' => NotificacionesController::PERMISSIONS['show']], [
            'group_name' => 'Notificaciones',
            'description' => 'Listado y detalle de notificaciones'
        ]);
        Permission::updateOrCreate(['name' => NotificacionesController::PERMISSIONS['edit']], [
            'group_name' => 'Notificaciones',
            'description' => 'Edición de notificaciones'
        ]);
        Permission::updateOrCreate(['name' => NotificacionesController::PERMISSIONS['delete']], [
            'group_name' => 'Notificaciones',
            'description' => 'Eliminación de notificaciones'
        ]);
    }
}
