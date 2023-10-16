@php
    $ruta = '.proyectos.';
    $name_section = 'Proyectos';
    $name_singular_m = 'Proyecto';
    $name_singular = 'proyecto';
    $third_li = true;
    $type_section = 'Editar';
    $card_actions = false;
@endphp
@extends('layouts.app')
@section('title', $name_section)
@section('content')
<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      <form class="card" method="POST" action="{{route('admin'.$ruta.'update' , $proyecto->id)}}" enctype="multipart/form-data" class="submit-prevent-form">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
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

            <div class="row row-cards">
      
                <div class="col-sm-6 col-md-6">
                  <div class="mb-3">
                    <label class="form-label required">Nombre del proyecto</label>
                    <input type="text" name="nombre" class="form-control"  value=" {{ $proyecto->nombre }}"  >
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="mb-3">
                    <label class="form-label required">URL del proyecto</label>
                    <input type="text" name="url" class="form-control"  value=" {{ $proyecto->url }}" >
                  </div>
                </div>
                
            </div>


        </div>

        <div class="card-footer align-items-center">
            <div class="d-flex justify-content-between">
              <div class="text-start">
                <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Volver</a>
              </div>
      
              <div class="text-end">
                <input class="btn btn-success submit-prevent-button" type="submit" value="Actualizar">
              </div>
            </div>
        </div>
        
    </form>
        
    </div>
</div>

@endsection