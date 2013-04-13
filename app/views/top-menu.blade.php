<section class="container-fluid">
    <header>
        <div class="group">
            <img class="pull-left" src="/assets/img/FIAT2.png" >
            <img class="pull-right" src="/assets/img/LUISA.png" >
            <h1>Regreso a Casa en la Divina Voluntad</h1>
        </div>     
    </header>
    <nav>
        <div class='navbar'>
            <div class="navbar-inner">
                <ul class="nav">
                    <li {{ (Request::is('/') ? 'class="active"' : '') }}><a class"active" href="{{ URL::to('') }}"><i class="icon-home"></i> Inicio</a></li>
                    <!-- <li><a href="#"><i class="icon-user"></i> Miembros</a></li>
                    <li><a href="#"><i class="icon-group"></i> Grupos</a></li>
                    <li><a href=""><i class="icon-book"></i> Blog</a></li>
                    <li><a href="#"><i class="icon-external-link"></i> Enlaces</a></li>
                    <li><a href=""><i class="icon-film"></i> Multimedia</a></li> -->
                </ul>
                <ul class="nav pull-right">
                    @if(Auth::check())
                    <li {{ (Request::is('usuario/perfil/' . Auth::user()->username) ? 'class="active"' : '') }}><a href="/usuario/perfil/{{ Auth::user()->username }}"><i class="icon-cog"></i> {{Auth::user()->first_name . " " . Auth::user()->last_name }} </a></li>
                    <li><a href="/usuario/salir"><i class="icon-signout"></i> Salir</a></li>
                    @else
                    <li {{ (Request::is('usuario/entrar') ? 'class="active"' : '') }}><a href="{{ URL::to('usuario/entrar') }}"><i class="icon-signin"></i> Entrar</a></li>
                    <li {{ (Request::is('usuario/nuevo') ? 'class="active"' : '') }}><a href="{{ URL::to('usuario/nuevo') }}"> Registrarse</a></li>
                    @endif
                </ul>               
            </div>
        </div>
    </nav>


</section>