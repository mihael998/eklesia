
<nav class="navbar navbar-light navbar-expand-md bg-white p-1">
    <div class="container">
        <a href="{{route('home')}}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
        <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                @guest
                <li role="presentation" class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login </a>
                </li>
                <li role="presentation" class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Registrati </a>
                </li>
                @else
                <li class="dropdown">
                    <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle">
                        <i class="fa fa-user-circle" style="font-size:26px;"></i>
                    </a>
                    <div role="menu" class="dropdown-menu  align-text-center">
                        <h6 class="dropdown-header">{{$utente->nome." ".$utente->cognome}}</h6>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>