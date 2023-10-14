@php
    $ruta = '.users.';
    $name_section = 'Usuarios';
    $name_singular_m = 'Usuario';
    $name_singular = 'usuario';
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
                  <label class="form-label required">Nombre completo</label>
                  <div>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombres y apellidos..." value="{{ old('name') }}" >
                  </div>
                </div>
        
                <div class="mb-3">
                  <label class="form-label required">Email</label>
                  <div>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}">
                  </div>
                </div>
        
                <div class="mb-3">
                  <label class="form-label required">Contraseña</label>
                  <div>
                    <input type="password" class="form-control" placeholder="Password" name="password" minlength="8">
                    <small class="form-hint">
                      Debe contener entre 8 y 20 caracteres.
                    </small>
                  </div>
                </div>
        
                <div class="mb-3">
                  <label class="form-label required">Confirme contraseña</label>
                  <div>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Repita la contraseña" id="password_confirmation">          
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