@php
    $ruta = '.notificaciones.';
    $name_section = 'Notificaciones';
    $name_singular_m = 'Notificacion';
    $name_singular = 'notificacion';
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

                <div class="col-md-4 col-xs-12">
                  <div class="mb-3">
                    <label class="form-label">Ingresada por</label>
                    <div>
                      <input class="form-control"  value="{{$usuario->name}}" disabled> 
                      <input type="hidden" name="user_id" value="{{$usuario->id}}" >
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-xs-12">
                  <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <div>
                      <select name="estado" class="selectpicker" title="Seleccione estado de la notificación..." data-width="100%">
                        <option value="Publicada">Publicada</option>
                        <option value="Oculta">Oculta</option>
                        <option value="Borrador" selected>Borrador</option>
                        <option value="Programada">Programada</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-1 col-xs-12"></div>
                <div class="col-md-2 col-xs-12">

                  <div class="mb-3">
                    <label class="form-label required">¿Es importante?</label>
                    <div class="btn-group w-100" role="group">
                      <input type="radio" class="btn-check" name="importancia" id="btn-radio-basic-1" autocomplete="off" value="0" checked>
                      <label for="btn-radio-basic-1" type="button"  class="btn">No</label>
                      <input type="radio" class="btn-check" name="importancia" id="btn-radio-basic-2" value="1" autocomplete="off">
                      <label for="btn-radio-basic-2" type="button" class="btn">Si</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-1 col-xs-12"></div>

              </div>

              <div class="row row-cards">

                <div class="col-md-4 col-xs-12">
                  <div class="mb-3">
                    <label class="form-label required">Título</label>
                    <div>
                      <input type="text" name="titulo" placeholder="Ingrese título de la notificación..." maxlength="25"  class="form-control"   value="{{ old('titulo') }}" > 
                    </div>
                  </div>
                </div>

                <div class="col-md-8 col-xs-12">
                  <div class="mb-3">
                    <label class="form-label required">Resumen</label>
                    <div>
                      <input type="text" name="resumen" placeholder="Ingrese resumen de la notificación..." maxlength="25"  class="form-control"   value="{{ old('resumen') }}" > 
                    </div>
                  </div>
                </div>

              </div>

              <div class="row row-cards">

                <div class="col-md-12 col-xs-12">
                  <div class="mb-3">
                    <label class="form-label required">Contenido</label>
                    <div>
                      <textarea name="contenido" id="mytextarea">Hello, World!</textarea>                    
                    </div>
                  </div>
                </div>

              </div>

              <div class="row row-cards">

                <div class="col-md-4 col-xs-12">
                  <div class="mb-3">
                    <label class="form-label required">Fecha</label>
                    <div>
                      <input type="datetime-local" name="fecha"   class="form-control"   value="{{ old('fecha') }}" > 
                    </div>
                  </div>
                </div>

              </div>

              <div class="row row-cards">

                <div class="col-md-4 col-xs-12">
                  <div class="mb-3">
                    <label class="form-label required">Notificación guiada para:</label>
                    <div>
                      <select name="proyectos[]" class="selectpicker" title="Seleccione proyectos..." data-width="100%" multiple>
                        @foreach ($proyectos as $proyecto)
                          <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                
                

              </div>

              <div class="row row-cards">
 
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