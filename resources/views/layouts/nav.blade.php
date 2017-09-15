<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="dropdown1" class="dropdown-content">
              <li><a href="/perfil">Perfil</a></li>
              <li><a href="/posts/create">Publicar</a></li>
              <li class="divider"></li>
              <li><a href="/logout">Logout</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Inicio</a></li>
            @if(!Auth::check())
                <li><a href="/login">Login</a></li>
            @endif
            @if(Auth::check())
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Opciones<i class="material-icons right">arrow_drop_down</i></a></li>
            @endif
            
        </ul>
        
        <ul class="side-nav" id="mobile-demo">
            <li><a href="/">Inicio</a></li>
            @if(!Auth::check())
                <li><a href="/login">Login</a></li>
            @endif
            @if(Auth::check())
                <li><a href="/posts/create">Publicar</a></li>
                <li><a href="/logout">Logout</a></li>
                <li>Hola {{Auth::user()->name}}</li>
            @endif
        </ul>
    </div>
</nav>