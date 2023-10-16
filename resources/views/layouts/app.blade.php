<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
        
        {{--Jquery--}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    
        <script src="{{asset('dist/js/demo-theme.min.js?1674944402')}}"></script>
    
        <!-- Theme CSS files -->
        <link rel="stylesheet" href="{{asset('dist/css/tabler.min.css')}}">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.css">
    
        <style>
          @import url('https://rsms.me/inter/inter.css');
          :root {
              --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
          }
          body {
              font-feature-settings: "cv03", "cv04", "cv11";
          }
          .cssButton{
            background-color: #206bc4 !important;
          }
        </style>
    
        {{-- Scripts CSS --}}
        {{-- Bootstrap Icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
        {{-- DataTables --}}
        <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">

        {{-- BS Stepper --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    

        @stack('css-styles')
    
    </head>
    <body>
      {{-- {{dd($notificaciones['formatted'])}}; --}}
        <div class="page">
            <!-- Navbar -->
            <header class="navbar navbar-expand-md d-print-none" >
              <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{route('home')}}" class="logo d-flex align-items-center">
                        <span class="d-none d-lg-block">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                  {{-- Inicio Accesos Directos --}}
                    @auth
                      <div class="nav-item d-none d-md-flex me-3">
                        <div class="btn-list">
                          <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="btn-radio-dropdown" id="btn-radio-dropdown-dropdown" autocomplete="off">
                            <label for="btn-radio-dropdown-dropdown" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Accesos directos
                            </label>
                            <div class="dropdown-menu" >
                              @can('admin-user-show')
                                <a class="dropdown-item" href="{{route('admin.users.create')}}" >
                                  Crear usuario
                                </a>
                              @endcan
          
                              @can('admin-role-show')
                                <a class="dropdown-item" href="{{route('admin.roles.create')}}" >
                                  Crear rol
                                </a>
                              @endcan
          
          
                              <a class="dropdown-item" href="#"  data-bs-toggle="modal" data-bs-target="#modal-report"> Reportar error </a>
                              
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    @endauth
                  {{-- Fin Accesos Directos --}}
                  
                  {{-- Inicio Modo Oscuro/Claro --}}
                    <div class="d-md-flex me-2" style="display: flex !important;">
                      <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Habilitar modo oscuro" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
                      </a>
                      <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Habilitar modo claro" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
                      </a>
                    </div>
                  {{-- Fin Modo Oscuro/Claro --}}

                  {{-- Inicio Notificaciones --}}
                  @include('layouts.notificaciones')
                  {{-- Fin Notificaciones --}}

                  {{-- Inicio Acceder/Registro --}}
                    <div class="nav-item dropdown">
                      @guest
                          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                              <span class="avatar avatar-sm" style="background-image: url('{{asset('static/avatars/000m2.png')}}"></span>
                              <div class="d-none d-xl-block ps-2">
                              <div>{{ __('Login') }} / {{ __('Register') }}</div>
                              </div>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              @if (Route::has('login'))
                                  <a href="{{ route('login') }}" class="dropdown-item">{{ __('Login') }}</a>
                              @endif
                              @if (Route::has('register'))
                                  <a href="{{ route('register') }}" class="dropdown-item">{{ __('Register') }}</a>
                              @endif
                          </div>
                      @else
                          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                              <span class="avatar avatar-sm" style="background-image: url('{{asset('static/avatars/000m2.png')}}"></span>
                              <div class="d-none d-xl-block ps-2">
                                      <div>{{Auth::user()->name}}</div>
                                      <div class="mt-1 small text-muted">
                                          @if ( Auth::user()->getRoleNames()->isEmpty()  )
                                          Sin rol
                      
                                          @else
                                          @foreach (Auth::user()->getRoleNames() as $rol )
                                              {{ $rol}} 
                                          @endforeach
                                          @endif
                                      </div>
                              </div>
                          </a>
                      
                          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </div>
                      @endguest    

                    </div>
                  {{-- Fin Acceder/Registro --}}
                </div>
              </div>
            </header>

            @includeWhen(Auth::check(),'layouts.menu')


            <div class="page-wrapper">
              <!-- Page body -->
              <div class="page-body">
                <div class="container-xl d-flex flex-column justify-content-center">
                    @yield('content')
                </div>
              </div>
              @include('layouts.footer')

            </div>
            <form method="POST" action="/reportes" enctype="multipart/form-data" class="submit-prevent-form">
              {{ csrf_field() }}
              <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Reportar error del sitio</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Tu nombre">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Tu email">
                      </div>
                      <div class="row">
                        <div class="col-lg-8">
                          <div class="mb-3">
                            <label class="form-label">URL del error</label>
                            <input type="text" class="form-control" name="url" placeholder="http//dominio.com/ventas/..." autocomplete="off">
                            <small>Copie la URL donde detectó el error.</small>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label class="form-label">Dispositivo</label>
                            <select name="dispositivo" class="selectpicker" title="Seleccione dispositivo...">
                              <option value="computador" >Computador</option>
                              <option value="celular">Celular</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div>
                            <label class="form-label">Descripción del error</label>
                            <textarea name="descripcion" class="form-control" rows="3" placeholder="Describa como ocurrió el error, cuales fueron los pasos que siguió para que se presentara el error..."></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </a>
                      {{-- <a href="#" type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        Enviar reporte
                      </a> --}}
                      <input class="btn btn-primary submit-prevent-button" type="submit" value="Enviar reporte">
                    </div>
                  </div>
                </div>
              </div>
            </form>

            {{-- <form method="POST" action="/reportes" enctype="multipart/form-data" class="submit-prevent-form"> 
              {{ csrf_field() }}--}}
              <div class="modal modal-blur fade" id="modal_notificacion" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Notificación</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="mb-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="modal-title">
                                  <span id="titulo"></span>
                                </h4>
                                <div class="card-actions">
                                  <span class="badge bg-yellow ms-2" style="display:none;" id="badge_importante">Importante</span>
                                </div>
                              </div>
                              <div class="card-body">
                                <div id="contenido"></div>
                              </div>
                              <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                  <div class="text-end">
                                    <span ><i id="fecha"></i></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="modal-footer">
                      <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </a>
                      {{-- <a href="#" type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        Enviar reporte
                      </a> --}}
                      <input class="btn btn-primary submit-prevent-button" onclick="refresh()" type="submit" value="Marcar como leído">
                    </div>
                  </div>
                </div>
              </div>
            {{-- </form> --}}
          </div>
        <!-- Tabler Core -->
        <script src="{{asset('dist/js/tabler.min.js')}}"></script>
        
        <script src="{{asset('dist/js/demo-theme.min.js')}}"></script>
        {{-- Bootstrap Select --}}
        <script src="{{asset('dist/js/bs.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-es_ES.min.js"></script>

        {{-- DataTables --}}
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
        
        {{-- Bs Stepper --}}
        <script src="	https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

        {{-- Tinymce --}}
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="{{asset('dist/js/langs/es_MX.js')}}"></script>

        @include('layouts.script_notificaciones')
        @include('sweetalert::alert')
        @yield('code_js')
    </body>