@php
    $ruta = '.roles.';
    $name_section = 'Roles';
    $name_singular_m = 'Rol';
    $name_singular = 'rol';
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
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>                     
                      </thead>
                      <tbody>
                          @foreach ($rows as $row)
                          <tr>
                              <td><a href="{{ route('admin'.$ruta.'show', $row->id) }}">{{ $row->name }}</a></td>
                              <td>{{ $row->description }}</td>
                              <td>
                                <a href="{{route('admin'.$ruta.'show',$row)}}" class="btn btn-primary btn-sm mb-1"  data-bs-toggle="tooltip" data-bs-placement="top" title="Ver más"><i class="bi bi-eye-fill"></i></a>
                                <a href="{{route('admin'.$ruta.'edit',$row)}}" class="btn btn-primary btn-sm mb-1"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="bi bi-pencil-square"></i></a>
                                @if ($row->id != 1)
                                  <span data-bs-toggle="modal" data-bs-target="#deleteModal" data-usuid="{{$row['id']}}">
                                    <a href="#" class="btn btn-danger btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                      <i class="bi bi-x-lg"></i>
                                    </a>
                                  </span>
                                @endif
                                
                            </td>
                          </tr>
                          @endforeach
                      
                      </tbody>
                  </table>
                </div>
              </div>
        </div>
    </div>
</div>
@include('includes.modal-delete')
@endsection

@section('code_js')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var usu_id = button.data('usuid')
      
      var url = '{{ route("admin.roles.destroy", ":id") }}';
      url = url.replace(':id', usu_id);

      
      
      var modal = $(this)
      // modal.find('.modal-footer #role_id').val(role_id)
      modal.find('form').attr('action',url);
  })
</script>
    
@endsection