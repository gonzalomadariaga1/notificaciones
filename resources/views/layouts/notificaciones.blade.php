@auth
    <div class="nav-item dropdown d-md-flex me-3" style="display: flex !important;">
    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Mostrar notificaciones">
        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path><path d="M9 17v1a3 3 0 0 0 6 0v-1"></path></svg>
        @if ($notificaciones->num_no_leidas != 0)

        <span class="status-dot status-dot-animated bg-red d-block" style="position: absolute; top: .375rem; right: .375rem; transform: translate(50%,-50%);"></span>

        @endif
        
    </a>
    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Notificaciones</h3>
        </div>
        <div class="list-group list-group-flush list-group-hoverable">
            @foreach ($notificaciones->notificaciones as $noti)
            <div class="list-group-item" >
                <div class="row align-items-center">
                <div class="col-auto">
                    @if ($noti->leido == 0)
                    <span class="status-dot status-dot-animated bg-blue d-block"></span>
                    @endif
                </div>
                <div class="col text-truncate">
                    <a href="#" class="text-body d-block" onclick="showModal('{{$noti->proyectos_notificaciones_id}}','{{$noti->titulo}}','{{$noti->resumen}}','{{$noti->importancia}}','{{$noti->contenido}}','{{$noti->fecha}}','{{$noti->leido}}')">
                    {{$noti->titulo}}
                    </a>
                    <div class="d-block text-muted text-truncate mt-n1">
                    {{$noti->resumen}}
                    </div>
                </div>
                <div class="col-auto">
                    @if ($noti->importancia == 1)
                    <a href="#" class="list-group-item-actions show">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-red icon-tabler icon-tabler-bell-exclamation" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 17h-11a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6a2 2 0 1 1 4 0a7 7 0 0 1 4 6v1.5"></path>
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                        <path d="M19 16v3"></path>
                        <path d="M19 22v.01"></path>
                        </svg>
                    </a>
                    @endif
                </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    </div>
@endauth
