@php
    $ruta = '.users.';
    $name_section = 'Usuarios';
    $name_singular_m = 'Usuario';
    $name_singular = 'usuario';
    $third_li = true;
    $type_section = 'Ver';
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Información del usuario</h3>
              </div>
              <div class="card-body">
                <div class="datagrid">
                  <div class="datagrid-item">
                    <div class="datagrid-title">Nombre</div>
                    <div class="datagrid-content">{{$user->name}}</div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Email</div>
                    <div class="datagrid-content">{{$user->email}}</div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Fecha de creación</div>
                    <div class="datagrid-content">{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i') }}</div>
                  </div>
                </div>
              </div>
            </div>

            <br>
            {{-- Rol asignado --}}
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rol(es) asignado(s) al usuario</h3>
              </div>
    
              <div class="card-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                  <table id="tblarticulos" class="table table-striped table-bordered  table-hover" >
                      <thead>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Permisos</th>                    
                      </thead>
                      <tbody>
                          @foreach ($user->roles as $row)
                          <tr>
                              <td>{{ $row->name }}</a></td>
                              <td>{{ $row->description }}</td>
                              <td> 
                                @foreach ($row->permissions as $permiso)  
                                  <span class="badge bg-secondary mb-1"> {{ $permiso->description}} </span>
                                  
                                @endforeach 
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
        
    </div>
</div>

@endsection