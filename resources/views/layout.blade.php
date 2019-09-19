<!DOCTYPE html>
<html>
<head>
	<title>Myspace</title>

    {{-- bootstrap --}}
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>


    <link rel="stylesheet" type="text/css" href="https://static.twitchcdn.net/assets/pages.directory-game-41d69841b8e3b07ef30f.css">

</head>
<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Myspace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

    	<div class="collapse navbar-collapse" id="navbarsExample02">
    	    <ul class="navbar-nav mr-auto">
    	    	<li class="nav-item">
                    <a class="nav-link" href="/users">Users</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            </ul>
            
            <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search user"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
            
            {{-- <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search">
            </form> --}}
        </div>
    </nav>
    <main class="py-4">
        <div class="container">
        @yield('content')
        </div>
    </main>
</body>
</html>