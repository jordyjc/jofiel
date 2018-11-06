

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {!! link_to('admin/home', "Jofiel", $attributes = array('class' => 'navbar-brand main-title')) !!}
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
            <p class="navbar-text"><i class="fa fa-dashboard"></i> Dashboard</p>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('category.index') }}">Categorias</a></li>
                <li><a href="{{ route('product.index') }}">Productos</a></li>
                <li><a href="{{ route('admin.order.index') }}">Pedidos</a></li>
                <li><a href="{{ route('user.index') }}">Usuarios</a></li>
                <li class="dropdown">

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                       role="button" aria-haspopup="true" aria-expanded="false">
                        <i class=" fa fa-user"></i> {{ Auth::user()->user }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>

                            <a class="d ropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                <b>Finalizar Sesión</b>
                            </a>

                            <form id="logout-form"
                                  action="{{ route('logout') }}"
                                  method="POST"
                                  style="display: none;"> @csrf
                            </form>

                            <!--
                                         <a class="dropdown-item" href="{{ route('logout') }}">Finalizar Sesión</a>
                            -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

