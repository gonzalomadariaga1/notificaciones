@php
    $ruta = '.proyectos.';
    $name_section = 'Proyectos';
    $name_singular_m = 'Proyecto';
    $name_singular = 'proyecto';
    $third_li = true;
    $type_section = 'Crear';
    $card_actions = false;
@endphp
@extends('layouts.app')
@section('title', $name_section)
@section('content')
<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
        <form class="card" method="POST" action="{{route('admin'.$ruta.'store')}}" enctype="multipart/form-data" class="submit-prevent-form">
          {{ csrf_field() }}
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

                <div class="mb-3">
                  <label class="form-label required">Nombre</label>
                  <div>
                    <input type="text" name="nombre" class="form-control"  placeholder="Nombres del proyecto" value="{{ old('nombre') }}" >
                  </div>
                </div>
        
                <div class="mb-3">
                  <label class="form-label required">URL</label>
                  <div>
                    <input type="text" name="url" class="form-control" value="https://...">
                  </div>
                </div>

            </div>

            <div class="card-footer align-items-center">
                <div class="d-flex justify-content-between">
                  <div class="text-start">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Volver</a>
                  </div>
          
                  <div class="text-end">
                    <input class="btn btn-success submit-prevent-button" type="submit" value="Crear">
                  </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection