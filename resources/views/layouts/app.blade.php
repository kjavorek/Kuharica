<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kuharica</title>

    <!-- Styles -->
    <!--<link href="/css/app.css" rel="stylesheet">-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!--&nbsp;-->
                        <li class="active"><a href="{{ url('/#') }}">Home</a></li>
                        <li><a href="{{ url('/soups') }}">Soups</a></li>
                        <li><a href="{{ url('/snacks') }}">Appetizers and snacks</a></li>
                        <li><a href="{{ url('/entrees') }}">Entrees</a></li>
                        <li><a href="{{ url('/desserts') }}">Desserts</a></li>
                        <li><a href="{{ url('/other') }}">Other</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/myPhotos') }}">My recipes</a>                                   
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container text-center">
                <h1>Recipes</h1>  
                <p>My cup of tea...</p>
            </div>
            <div class="muffinOne"></div>​
            <div class="muffinTwo"></div>​
            <div class="dinner"></div>​
            <!--<img src="../public/cook.png" alt="cook" width="100%" height="auto"/>-->
        </div>
        <main>
            @yield('content')
        </main>
    </div>
    <footer class="container-fluid text-center">
        <p>&#169; Kuharica</p>
    </footer> 
    <!-- Scripts -->
    <!--<script src="/js/app.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
         $(document).ready(function() {
             $('li a').click(function(){
                $('li.active').removeClass('active');
                $('a[href="' + location.pathname + '"]').closest('li').addClass('active'); 
             }); 
          });
    </script>
</body>
</html>
