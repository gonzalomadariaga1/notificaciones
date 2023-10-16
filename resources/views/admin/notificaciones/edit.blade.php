@php
    $ruta = '.notificaciones.';
    $name_section = 'Notificaciones';
    $name_singular_m = 'Notificacion';
    $name_singular = 'notificacion';
    $third_li = true;
    $type_section = 'Editar';
    $card_actions = false;
@endphp
@extends('layouts.app')
@section('title', $name_section)
@section('content')
<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      <form class="card" method="POST" action="{{route('admin'.$ruta.'update' , $proyecto_notif->id)}}" enctype="multipart/form-data" class="submit-prevent-form">
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Información de la notificación</h3>
            </div>
            <div class="card-body">
              <div class="datagrid">
                <div class="datagrid-item">
                  <div class="datagrid-title">Titulo</div>
                  <div class="datagrid-content">
                    <input type="text" name="titulo" placeholder="Ingrese título de la notificación..." maxlength="25"  class="form-control"   value="{{$notificacion->titulo}}" > 
                  </div>
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
                  <div class="datagrid-content">
                    <select name="estado" class="selectpicker" data-width="100%" data-container="body">
                      @foreach ($estados as $estado)
                        
                        @if($estado == $proyecto_notif->estado)
                            <option value="{{$estado}}" selected> {{ $estado}} </option>
                        @elseif($estado != $proyecto_notif->estado)
                            <option value="{{$estado}}" > {{ $estado}} </option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Importancia</div>
                  <div class="datagrid-content">
                    @if ($proyecto_notif->importancia == 1)
                      <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" name="importancia" id="btn-radio-basic-1" autocomplete="off" value="0" >
                        <label for="btn-radio-basic-1" type="button"  class="btn">No</label>
                        <input type="radio" class="btn-check" name="importancia" id="btn-radio-basic-2" value="1" autocomplete="off" checked>
                        <label for="btn-radio-basic-2" type="button" class="btn">Si</label>
                      </div>
                    @else
                    <div class="btn-group w-100" role="group">
                      <input type="radio" class="btn-check" name="importancia" id="btn-radio-basic-1" autocomplete="off" value="0" checked>
                      <label for="btn-radio-basic-1" type="button"  class="btn">No</label>
                      <input type="radio" class="btn-check" name="importancia" id="btn-radio-basic-2" value="1" autocomplete="off" >
                      <label for="btn-radio-basic-2" type="button" class="btn">Si</label>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="datagrid-item">
                  <div class="datagrid-title">Lectura</div>
                  <div class="datagrid-content mt-2">
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
                    <select  name="proyectos" class="selectpicker" data-width="100%" data-container="body">
                      @foreach ($proyectos as $pr)
                        
                        @if($pr->id == $proyecto->id)
                            <option value="{{$pr->id}}" selected> {{ $pr->nombre}} </option>
                        @elseif($pr->id != $proyecto->id)
                            <option value="{{$pr->id}}" > {{ $pr->nombre }} </option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="datagrid">
                <div class="datagrid-item">
                  <div class="datagrid-title">Resumen</div>
                  <div class="datagrid-content">
                    <input type="text" name="resumen" placeholder="Ingrese resumen de la notificación..." maxlength="25"  class="form-control"   value="{{$notificacion->resumen}}" > 
                    
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
              <textarea name="contenido" id="mytextarea">{!! $notificacion->contenido !!}</textarea>
              
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
@section('code_js')
<script>
  tinymce.init({
    selector: '#mytextarea',
    language: 'es_MX',
    plugins: [
      'a11ychecker', 'advcode', 'advlist', 'anchor', 'autolink', 'codesample', 'fullscreen', 'help',
      'image', 'editimage', 'tinydrive', 'lists', 'link', 'media', 'powerpaste', 'preview',
      'searchreplace', 'table', 'template', 'tinymcespellchecker', 'visualblocks', 'wordcount'
    ],
    menubar: 'file | edit | view | insert | format',
    toolbar: 'undo redo | styles | fontselect | bold italic underline | forecolor | alignleft aligncenter alignright | bullist numlist | link ',
    default_link_target: '_blank',
  });
</script>
@endsection