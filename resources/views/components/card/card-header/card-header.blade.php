<div class="card-header">
  <div>
    <h3 class="card-title">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
          <li class="breadcrumb-item @if ($third_li) '' @else 'active' @endif"> @if ($third_li) <a href="{{route('admin'.$ruta.'index')}}">{{$name_section}}</a> @else {{$name_section}} @endif </li>
          @if ($third_li)
            <li class="breadcrumb-item active "> {{$type_section}} {{$name_singular}}</li>
          @endif
          
        </ol>
      </nav>
    </h3>
  </div>
  @if ($card_actions)
        <div class="card-actions">
            <a href="{{route('admin'.$ruta.'create')}}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            {{$name_singular_m}}
            </a>
        </div>
  @endif
  
</div>