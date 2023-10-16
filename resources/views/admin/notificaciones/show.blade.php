@php
    $ruta = '.notificaciones.';
    $name_section = 'Notificaciones';
    $name_singular_m = 'Notificacion';
    $name_singular = 'notificacion';
    $third_li = true;
    $type_section = 'Ver';
    $card_actions = false;
@endphp
@extends('layouts.app')
@section('title', $name_section)
@section('content')
<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      <div class="card">
        @include('components.card.card-header.card-header',[
                                                            'name_singular_m' => $name_singular_m,
                                                            'ruta'=> $ruta,
                                                            'name_section' => $name_section,
                                                            'name_singular' => $name_singular,
                                                            'third_li' => $third_li,
                                                            'type_section' => $type_section,
                                                            'card_actions' => $card_actions

                                                          ])

        <div class="card-body">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Información de la notificación</h3>
              </div>
              <div class="card-body">
                <div class="datagrid">
                  <div class="datagrid-item">
                    <div class="datagrid-title">Titulo</div>
                    <div class="datagrid-content">{{$notificacion->titulo}}</div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Autor</div>
                    <div class="datagrid-content"> {{$usuario->name}} </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Fecha de creación</div>
                    <div class="datagrid-content">{{ Carbon\Carbon::parse($notificacion->fecha)->format('d-m-Y H:i') }}</div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Estado</div>
                    <div class="datagrid-content">{{$proyecto_notif->estado}}</div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Importancia</div>
                    <div class="datagrid-content">
                      @if ($proyecto_notif->importancia == 1)
                        <span class="badge bg-warning">Importante</span>
                      @else
                        <span class="badge bg-blue-lt">N/A</span>
                      @endif
                    </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Lectura</div>
                    <div class="datagrid-content">
                      @if ($proyecto_notif->leido == 1)
                        Leído el {{ Carbon\Carbon::parse($proyecto_notif->fecha_lectura)->format('d-m-Y H:i') }}
                      @else
                        <span class="badge bg-blue-lt">No leído</span>
                      @endif
                    </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Proyecto</div>
                    <div class="datagrid-content">
                      {{$proyecto->nombre}}
                    </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Resumen</div>
                    <div class="datagrid-content">
                      {{$notificacion->resumen}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Contenido de la notificación</h3>
              </div>
              <div class="card-body">
                {!! $notificacion->contenido !!}
              </div>
            </div>

        </div>

        <div class="card-footer align-items-center">
          <div class="d-flex justify-content-between">
            <div class="text-start">
              <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Volver</a>
            </div>

          </div>
        </div>
      </div>
        
    </div>
</div>

@endsection