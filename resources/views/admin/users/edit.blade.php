@php
    $ruta = '.users.';
    $name_section = 'Usuarios';
    $name_singular_m = 'Usuario';
    $name_singular = 'usuario';
    $third_li = true;
    $type_section = 'Editar';
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

          {{-- CARD NOMBRE Y EMAIL --}}
            <form class="card" method="POST" action="{{route('admin'.$ruta.'update_name_email' , $usuario->id)}}" enctype="multipart/form-data" class="submit-prevent-form">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}

              <div class="card-header">
                <div>
                  <h3 class="card-title">
                    Nombre - Email
                  </h3>
  
                </div>
              </div>

              <div class="card-body">
      
                <div class="mb-3">
                  <label class="form-label required">Nombre completo</label>
                  <div>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombres y apellidos..." value=" {{ $usuario->name }}" >
                  </div>
                </div>
        
                <div class="mb-3">
                  <label class="form-label required">Email</label>
                  <div>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value=" {{ $usuario->email }} ">
                  </div>
                </div>
        
              </div>

              <div class="card-footer align-items-center text-end">  
                <div class="text-end">
                  <input class="btn btn-success submit-prevent-button" type="submit" value="Actualizar Nombre - Email">
                </div>         
              </div>

            </form>
          {{-- FIN CARD NOMBRE Y EMAIL --}}
          <br>
          {{-- CARD PASSWORD --}}
            <form class="card" method="POST" action="{{route('admin'.$ruta.'update_pass' , $usuario->id)}}" enctype="multipart/form-data" class="submit-prevent-form">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="card-header">
                <div>
                  <h3 class="card-title">
                    Contraseña
                  </h3>
  
                </div>
              </div>

              <div class="card-body">
      
                <div class="mb-3">
                  <label class="form-label required">Contraseña</label>
                  <div>
                    <input type="password" class="form-control" placeholder="Password" name="password" minlength="8">
                    <small class="form-hint">
                      Debe contener entre 8 y 20 caractéres.
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
              
              <div class="card-footer align-items-center text-end">  
                <div class="text-end">
                  <input class="btn btn-success submit-prevent-button" type="submit" value="Actualizar contraseña">
                </div>         
              </div>

            </form>
          {{-- FIN CARD PASSWORD --}}
          <br>
          {{-- CARD ROLES --}}
            <form class="card" method="POST" action="{{route('admin'.$ruta.'update_permiso' , $usuario->id)}}" enctype="multipart/form-data" class="submit-prevent-form">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="card-header">
                <div>
                  <h3 class="card-title">
                    Roles
                  </h3>
  
                </div>
              </div>

              <div class="card-body">        
                <div class="row">
                 {{-- Checkboxes  --}}
                    <div class="form-group">
                      @if (count($roles) > 0 )
                        <select name="permiso[]" class="selectpicker" title="Seleccione roles..." data-live-search="true" data-width="50%" multiple>
                          @foreach ($roles as $permiso)
                            <option value="{{$permiso->id}}" {{$usuario->hasRole($permiso->id) ? 'selected' : ''}}> {{$permiso->name}} </option>
                          @endforeach
                        </select>

                      @else
                        <p>El sistema aún no tiene roles creados.</p>
                      @endif
                      
                    </div>
                </div>
              </div>
              
              <div class="card-footer align-items-center text-end">  
                <div class="text-end">
                  @if (count($roles) > 0 )
                    <input class="btn btn-success submit-prevent-button" type="submit" value="Asignar rol(es)">
                  @else
                    
                  @endif
                  
                </div>         
              </div>
            </form>
          {{-- FIN CARD ROLES --}}
        </div>

        
      </div>
        
    </div>
</div>

@endsection