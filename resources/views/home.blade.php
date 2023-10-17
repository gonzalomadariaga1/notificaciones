@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            Accesos directos
        </div>
    </div>
    <div class="card-body">
        <div class="row row-cards">

            @can('admin-notificaciones-show')
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                                    <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                                    <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
                                  </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                            <a href="{{route('admin.notificaciones.create')}}"> Crear notificaciones </a> 
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endcan
            @can('admin-role-show')
                <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-green text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-factory-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 21h18"></path>
                                    <path d="M5 21v-12l5 4v-4l5 4h4"></path>
                                    <path d="M19 21v-8l-1.436 -9.574a.5 .5 0 0 0 -.495 -.426h-1.145a.5 .5 0 0 0 -.494 .418l-1.43 8.582"></path>
                                    <path d="M9 17h1"></path>
                                    <path d="M14 17h1"></path>
                                  </svg>                        
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                <a href="{{route('admin.proyectos.create')}}"> Crear proyecto </a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            @endcan
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-red text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-exclamation-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M12 9v4"></path>
                            <path d="M12 16v.01"></path>
                         </svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-report"> Reportar error </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
