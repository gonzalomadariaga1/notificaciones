@php
    $ruta = '.roles.';
    $name_section = 'Roles';
    $name_singular_m = 'Rol';
    $name_singular = 'rol';
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
                <div class="row">
                    <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                            <label for="Rut"><strong>Nombre del rol:</strong> </label>
                            <p>{{$row->name}} </p>
                        </div>
                    </div>
      
                    <div class="col-lg-8 col-xs-12">
                      <div class="form-group">
                          <label for="Rut"><strong>Descripción del rol:</strong> </label>
                          <p>{{$row->description}} </p>
                      </div>
                    </div>
                </div>
                @php
                    $can_view_permissions = auth()->user()->can('admin-permission-show');
                @endphp

                @if($can_view_permissions)
                    <div class="card">
                        <div class="card-header">
                            <h4>Permisos asignados</h4>
                        </div>

                        <div class="card-body">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                            <table id="tblarticulos" class="table table-striped table-bordered" >
                                <thead>
                                    <th>Grupo</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>                    
                                </thead>
                                <tbody>
                                    @foreach ($permisosgroup as $key => $permisos)
                                        @php
                                            $first = true ;
                                        @endphp
                                        @foreach ($permisos as $permiso)
                                            @if ($first)
                                                @php
                                                    $first = false;
                                                @endphp
                                                <tr>
                                                    <td rowspan="{{count($permisos)}}" style="text-align:center;vertical-align:middle;">{{ $key }}</td>
                                                    <td>{{ $permiso['name']}}</a></td>
                                                    <td>{{ $permiso['description'] }}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $permiso['name']}}</a></td>
                                                    <td>{{ $permiso['description'] }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                @endif
                <br>
                <div class="card">
                    <div class="card-header">
                      <h4>Usuarios asignados</h4>
                    </div>
          
                    <div class="card-body">
                      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                        <table id="tblarticulos" class="table table-striped table-bordered  table-hover" >
                            <thead>
                              <th>Nombre</th>
                              <th>Email</th>                    
                            </thead>
                            <tbody>
                                
                                @foreach ($row_user->users as $user)
                                <tr>
                                    <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
                                    
                                    <td>{{ $user->email }}</td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                      </div>
          
                    </div>
                </div>
            </div>

            <div class="card-footer align-items-center">
                <div class="d-flex justify-content-between">
                  <div class="text-start">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Volver</a>
                  </div>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection