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
                    <li><a href="#"><i class="icon-user"></i> Miembros</a></li>
                    <li><a href="#"><i class="icon-group"></i> Grupos</a></li>
                    <li><a href=""><i class="icon-book"></i> Blog</a></li>
                    <li><a href="#"><i class="icon-external-link"></i> Enlaces</a></li>
                    <li><a href=""><i class="icon-film"></i> Multimedia</a></li>
                </ul>
                <ul class="nav pull-right">
                    <li {{ (Request::is('usuario/nuevo') ? 'class="active"' : '') }}><a href="{{ URL::to('usuario/nuevo') }}"><i class="icon-signin"></i> Registrarse</a></li>
                </ul>               
            </div>
        </div>
    </nav>
</section>