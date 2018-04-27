<!--
    CREA EL NAVBAR DE LA PÁGINA A TRAVÉS DE UN BOOTSWATCH
-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand  main-tittle" href="{{ route('home') }}">Stora</a>
  
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="nav navbar-nav">
          <li>
            <div class="navbar-text">Tienda en Linea</div> 
          </li>
      </ul>
    </div>

    <div>
      <ul class="nav navbar-collapse navbar-nav navbar-right">
        <li><a class="nav-link" href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart fa-1x"></i></a></li>

        <li class="nav-item">
            <a class="nav-link" href="">Conocenos</a><span class="sr-only">(current)</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Contacto</a><span class="sr-only">(current)</span> 
        </li>

        <div class="dropdown">
          
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" 
              role="button" aria-haspopup="true" aria-expanded="false">
                  <i class=" fa fa-user"></i>
          </a>
          
          <ul class="dropdown-menu dropdown-menu-right">
            <li>
              <a class="dropdown-item" href="#">Inicio de Sesión</a>
            </li>
          </ul>
        </div>
      </ul>
    </div>
</nav>
