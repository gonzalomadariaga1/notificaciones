@php
    $ruta = '.proyectos.';
    $name_section = 'Proyectos';
    $name_singular_m = 'Proyecto';
    $name_singular = 'proyecto';
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
                <h3 class="card-title">Información del proyecto</h3>
              </div>
              <div class="card-body">
                <div class="datagrid">
                  <div class="datagrid-item">
                    <div class="datagrid-title">Nombre</div>
                    <div class="datagrid-content">{{$proyecto->nombre}}</div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">URL</div>
                    <div class="datagrid-content"> <a href="{{$proyecto->url}}" target="_blank" rel="noopener noreferrer"> {{$proyecto->url}} </a> </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Fecha de creación</div>
                    <div class="datagrid-content">{{ Carbon\Carbon::parse($proyecto->created_at)->format('d-m-Y H:i') }}</div>
                  </div>
                </div>
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