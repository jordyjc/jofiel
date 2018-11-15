<!--
    CREA EL NAVBAR DE LA PÁGINA A TRAVÉS DE UN BOOTSWATCH -->

<nav class="navbar navbar-expand-lg navbar-light bg-light"  style="width: 99.9% !important" >
  <a class="navbar-brand" href="{{ route('stora') }}">Stora</a>
  

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <div class="navbar-text">Tienda en Linea</div> 
      </li>
    </ul>
  </div>
  <div>
      <ul class="nav navbar-collapse navbar-nav navbar-right">
        <li><a class="nav-link" href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart fa-2x"></i></a></li>

        <li class="nav-item">
            <a class="nav-link" href="">Conocenos</a><span class="sr-only">(current)</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Contacto</a><span class="sr-only">(current)</span> 
        </li>
<!-- Vista Parcial del Inicio de Sesión -->
        @include('store.partials.menu-user')
      </ul>
    </div>
</nav>   