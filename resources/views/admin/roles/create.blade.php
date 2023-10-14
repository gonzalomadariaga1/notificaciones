@php
    $ruta = '.roles.';
    $name_section = 'Roles';
    $name_singular_m = 'Rol';
    $name_singular = 'rol';
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

                <div class="row row-cards">
          
                    <div class="col-sm-6 col-md-6">
                      <div class="mb-3">
                        <label class="form-label required">Nombre del rol</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del rol" value="{{ old('name') }}" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="mb-3">
                        <label class="form-label required">Descripción del rol</label>
                        <input type="text" name="description" class="form-control" id="name" placeholder="Descripción del rol" value="{{ old('description') }}" >
                      </div>
                    </div>
                    
                </div>

                {{-- Card para asignacion de permisos --}}
        <div class="card ">
            <div class="card-header">
              <div class="row">
                <div class="col-12">
                    <h4>Asignar permisos al rol</h4> <br>
  
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="switch-all">
                      <label class="form-check-label" for="switch-all">Asignar todos los permisos</label>
                    </div>
                </div>
              </div>
            </div>
            
            <div class="card-body">        
              <div class="row row-cols-4">
  
                @foreach ($permissions as $key => $item)
                
              
                <div class="col col-xs-12 mb-1" style="min-width: 280px;">
                  <div class="card w-100 mb-1">
                    <div class="card-header">
                      <div class="row">
                        <div class="col">
                          <h5>
                            {{$key}}
                          </h5>
                        </div>
                        
                      </div>
                      <div class="card-actions">
                        <div class="col">
                          <div class="float-end">
                            <div class="form-check form-switch">
                              <input type="checkbox" class="form-check-input switch-permission" role="switch" id="switch-{!! str_replace(' ', '', $key) !!}" >
                              <label class="form-check-label" for="switch-{!! str_replace(' ', '', $key) !!}"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      @foreach ($item as $permiso)
  
                      <div class="custom-control custom-checkbox ">
                        <input type="checkbox" class="custom-control-input all-permiso permiso-{!! str_replace(' ', '', $permiso->group_name) !!}" id="permiso_{{$permiso->id}}" value="{{$permiso->id}}" name="permiso[]">
                        <label class="custom-control-label " for="permiso_{{$permiso->id}}">{{$permiso->description}}</label>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
  
                
                    
                @endforeach
  
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
                    <input class="btn btn-success submit-prevent-button" type="submit" value="Crear">
                  </div>
                </div>
            </div>
            
        </form>
    </div>
</div>

@endsection
@section('code_js')
<script>
    $(document).ready(function() {

        var permisos = @json($group_names_roles);
        //console.log("permisosss",permisos);

        $('#switch-all').on("click", function(){
        let prueba = document.getElementsByClassName('switch-permission');
        let flag = 0 ;
        for (let i = 0; i < prueba.length; i++) {
            const element = prueba[i];
            //console.log(element);
            if( element.checked == false){
            flag = 1 ;
            }       
        }
        if (flag == 1) {
            $('.switch-permission').prop('checked', true);
            $('.all-permiso').prop('checked', true);
        }else{
            $('.switch-permission').prop('checked', false);
            $('.all-permiso').prop('checked', false);
        }
        });

        permisos.forEach(element => {

            $(`#switch-${element}`).on("click", function(){
                if ($(this).is(":checked")) {
                    $(`.permiso-${element}`).prop('checked', true);
                }else{
                    $(`.permiso-${element}`).prop('checked', false);
                }
            });

            $(`.permiso-${element}`).on("click", function(){
                let prueba = document.getElementsByClassName(`permiso-${element}`);
                let flag = 0 ;
                for (let i = 0; i < prueba.length; i++) {
                    const element = prueba[i];
                    if( element.checked == true){
                    flag = 1 ;
                    }       
                }
                if (flag == 1) {
                    $(`#switch-${element}`).prop('checked', true);
                }else{
                    $(`#switch-${element}`).prop('checked', false);
                }
            });
            
        });
    });
      
  </script>
    
@endsection