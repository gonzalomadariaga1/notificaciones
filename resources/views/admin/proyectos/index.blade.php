@php
    $ruta = '.proyectos.';
    $name_section = 'Proyectos';
    $name_singular_m = 'Proyecto';
    $name_singular = 'proyecto';
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
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>URL</th>
                  <th>Token</th>
                  <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto['id'] }}</td>
                        <td>{{ $proyecto['nombre'] }}</td>
                        <td> <a href="{{ $proyecto['url'] }} " target="_blank" rel="noopener noreferrer">{{ $proyecto['url'] }}</a> </td> 
                        <td>{{ $proyecto['tkn'] }}</td>
                        
                        <td>
                            <a href="{{route('admin'.$ruta.'show',$proyecto)}}" class="btn btn-primary btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver más"><i class="bi bi-eye-fill"></i></a>
                            <a href="{{route('admin'.$ruta.'edit',$proyecto)}}" class="btn btn-primary btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" ><i class="bi bi-pencil-square"></i></a>
                            @if ($proyecto->estado == 1)
                              <a href="{{route('admin'.$ruta.'unable_proyecto',$proyecto)}}" class="btn btn-danger btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Deshabilitar" ><i class="bi bi-x-lg"></i></a>
                            @else
                              <a href="{{route('admin'.$ruta.'enable_proyecto',$proyecto)}}" class="btn btn-success btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Habilitar" ><i class="bi bi-check-lg"></i></a>
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
@endsection
