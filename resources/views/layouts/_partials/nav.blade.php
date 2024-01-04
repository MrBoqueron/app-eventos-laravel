<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">APP Eventos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" :class="{'active': route().current('home')}" aria-current="page" href="{{ route('home') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" :class="{'active': route().current('eventos')}" href="{{ route('eventos') }}">Eventos</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" :class="{'active': route().current('tusEventos')}" href="{{ route('tusEventos') }}">Tus Eventos</a>
        </li>
        @role('admin')
        <li class="nav-item">
          <a class="nav-link" :class="{'active': route().current('admin.roles')}" href="{{ route('admin.roles') }}">Roles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" :class="{'active': route().current('admin.listar_usuarios')}" href="{{ route('admin.listar_usuarios') }}">Usuarios</a>
        </li>
        @endrole
        @endauth
    </ul>
    <form class="d-flex" role="search">
        @if (auth()->check())
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Cerrar session</a></li>
          </ul>
        </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-success me-2 m-6">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a>
        @endif
      </form>
    </div>
  </div>
</nav>