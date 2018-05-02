@if(Auth::check())
    <div class="dropdown">
            
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" 
            role="button" aria-haspopup="true" aria-expanded="false">
                <i class=" fa fa-user"></i> {{ Auth::user()->user }}
        </a>
        
        <ul class="dropdown-menu dropdown-menu-right">
        <li>
            
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Finalizar Sesión') }}
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
    </div>

@else

    <div class="dropdown">
            
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" 
            role="button" aria-haspopup="true" aria-expanded="false">
                <i class=" fa fa-user"></i>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-right">
        <li>
            <a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
        </li>
        </ul>
    </div>
@endif