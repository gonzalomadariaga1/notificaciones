@php
    $ruta = '.users.';
    $name_section = 'Usuarios';
    $name_singular_m = 'Usuario';
    $name_singular = 'usuario';
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
                  <th>Email</th>
                  <th>Rol</th>   
                  <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                          @if ( $user->getRoleNames()->isEmpty()  )
                          <a href="{{route('admin'.$ruta.'edit',$user)}}">
                            <span class="badge bg-danger">
                              <u> Asignar rol </u>
                            </span>
                          </a> 

                          @else
                            @foreach ($user->getRoleNames() as $rol )
                              <span class="badge bg-info text-dark"> {{ $rol}} </span> 
                            @endforeach
                          @endif
                        </td>
                        
                        <td>
                            <a href="{{route('admin'.$ruta.'show',$user)}}" class="btn btn-primary btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver más"><i class="bi bi-eye-fill"></i></a>
                            <a href="{{route('admin'.$ruta.'edit',$user)}}" class="btn btn-primary btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" ><i class="bi bi-pencil-square"></i></a>
                            @if ($user->estado == 1)
                              <a href="{{route('admin'.$ruta.'unable_user',$user)}}" class="btn btn-danger btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Deshabilitar" ><i class="bi bi-x-lg"></i></a>
                            @else
                              <a href="{{route('admin'.$ruta.'enable_user',$user)}}" class="btn btn-success btn-sm mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Habilitar" ><i class="bi bi-check-lg"></i></a>
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
