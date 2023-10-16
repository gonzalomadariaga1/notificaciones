@php
    $ruta = '.notificaciones.';
    $name_section = 'Notificaciones';
    $name_singular_m = 'Notificacion';
    $name_singular = 'notificacion';
    $third_li = false;
    $type_section = '';
    $card_actions = true;
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
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
            <table id="tblarticulos" class="table table-striped table-bordered  table-hover" >
                <thead>
                  <th>Id Notif</th>
                  <th>Id</th>
                  <th>Titulo</th>
                  <th>Importancia</th>
                  <th>Lectura</th>
                  <th>Estado</th>
                  <th>Proyecto(s)</th>
                  <th>Acciones</th>
                </thead>
                <tbody id="tbody">
                    @foreach ($notificaciones as $notificacion)

                        
                          @foreach ($notificacion->proyectos as $noti)
                          <tr>
                            <td> <p>{{ $notificacion->id }}</p> </td>
                            <td class="row-index"> <p>{{ $noti->pivot->id }}</p> </td>
                            <td>{{ $notificacion['titulo'] }}</td>

                              @if ($noti->pivot->importancia == 1)
                              <td> <span class="badge bg-warning">Importante</span></td>
                              @else
                              <td> <span class="badge bg-blue-lt">N/A</span></td>
                              @endif

                              @if ($noti->pivot->leido == 1)
                                <td><span class="badge bg-success">Leído</span></td>
                                @else
                                <td><span class="badge bg-secondary">No Leído</span></td>
                              @endif

                              <td>
                                <select id="select_estado" class="selectpicker" data-width="100%" data-container="body">
                                  @foreach ($estados as $estado)
                                    
                                    @if($estado == $noti->pivot->estado)
                                        <option value="{{$estado}}" selected> {{ $estado}} </option>
                                    @elseif($estado != $noti->pivot->estado)
                                        <option value="{{$estado}}" > {{ $estado}} </option>
                                    @endif
                                  @endforeach
                                </select>
                              </td>

                              <td>
                                <span class="badge bg-secondary">{{$noti->nombre}}</span>
                                
                              </td>

                              <td>
                                <a href="{{route('admin'.$ruta.'show',$noti->pivot->id)}}" class="btn btn-primary btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver más"><i class="bi bi-eye-fill"></i></a>
                                <a href="{{route('admin'.$ruta.'edit',$noti->pivot->id)}}" class="btn btn-primary btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" ><i class="bi bi-pencil-square"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        

                         
                        
                        

                        
                    @endforeach
                
                </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    
  
    
    
</div>
@endsection
@section('code_js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {

      $('#tbody').on('change', '.selectpicker', function () {
        var child = $(this).closest('tr');
        var option_selected = $(this).find('option:selected').val();

        child.each(function () {
          var idx = $(this).children('.row-index').children('p');

          id_notificacion = idx[0].innerHTML
          console.log("idx",id_notificacion);
          console.log("option",option_selected);

          jQuery.ajax({
              url: '/notificaciones/'+option_selected+'/'+id_notificacion+'/change_estado',
              type: "GET",
              dataType: "json",
              error:function(e){
                console.log("error",e)
              },
              success:function(respuesta)
              {
                if (respuesta == 1 ) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Cambio de estado exitoso',
                      timer: 1200,
                      timerProgressBar: true,
                      toast: 'center',
                      showConfirmButton: false
                    }).then((result) => {
                      console.log("dismiss",result)
                      if (result.dismiss === 'timer') {
                        window.location.replace("{{ route('admin.notificaciones.index') }}");
                      }
                  });
                } else {
                  Swal.fire('Error', respuesta)
                  Swal.hideLoading()
                }

                
              }   
            });
          
        });

        



      });
    });
  </script>
@endsection


