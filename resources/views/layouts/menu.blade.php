<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar">
        <div class="container-xl">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                  Inicio
                </span>
              </a>
            </li>
            @if (auth()->user()->can('admin-user-show') || auth()->user()->can('admin-role-show') )
              <li class="nav-item dropdown @if ( (request()->segment(1) == 'users')  || (request()->segment(1) == 'roles') )  active  @else '' @endif">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-cog" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                      <path d="M6 21v-2a4 4 0 0 1 4 -4h2.5"></path>
                      <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                      <path d="M19.001 15.5v1.5"></path>
                      <path d="M19.001 21v1.5"></path>
                      <path d="M22.032 17.25l-1.299 .75"></path>
                      <path d="M17.27 20l-1.3 .75"></path>
                      <path d="M15.97 17.25l1.3 .75"></path>
                      <path d="M20.733 20l1.3 .75"></path>
                  </svg>
                  </span>
                  <span class="nav-link-title">
                    Control de acceso
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      @can('admin-user-show')
                        <a class="dropdown-item" href="{{route('admin.users.index')}}" >
                          Usuarios
                        </a>
                      @endcan
                      @can('admin-role-show')
                        <a class="dropdown-item" href="{{route('admin.roles.index')}}">
                          Roles
                        </a>
                      @endcan
                    </div>
                  </div>
                </div>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </header>