<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        dIV Forum
                    </a>


                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav" style="margin: auto">
                        <li>
                            <a>
                                Hello,
                                @guest Guest
                                @else  {{ Auth::user()->name }}
                                @endguest
                                <span>Time : {{Carbon\Carbon::now()}}</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                        @guest
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Register</a></li>
                        @else
                            <li class="info">
                                <a href="/myForum" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    MyForum
                                </a>
                            </li>
                            <li class="info">
                                <a href="/messages" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Inbox
                                </a>
                            </li>


                            @if(Auth::user()->role == "admin")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Master <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href=""
                                               onclick="event.preventDefault();
                                                     document.getElementById('master-user-form').submit();">
                                                Master User
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                               onclick="event.preventDefault();
                                                     document.getElementById('master-category-form').submit();">
                                                Master Category
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                               onclick="event.preventDefault();
                                                     document.getElementById('master-forum-form').submit();">
                                                Master Forum
                                            </a>
                                        </li>
                                    </ul>
                                    <form id="master-user-form" action="/users" method="get" style="display: none;">

                                    </form>
                                    <form id="master-category-form" action="/categories" method="get" style="display: none;">

                                    </form>
                                    <form id="master-forum-form" action="/forums" method="get" style="display: none;">

                                    </form>

                                </a>
                            </li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/"
                                           onclick="event.preventDefault();
                                                     document.getElementById('profile-form').submit();">
                                            Profile
                                        </a>
                                        @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
                                            <a href="/"
                                               onclick="event.preventDefault();
                                                     document.getElementById('categories-form').submit();">
                                                All Categories
                                            </a>
                                        @endif
                                        <a href="/"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="/doLogout" method="post" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        <form id="categories-form" action="/categories" method="get" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        <form id="profile-form" action="/profile/{{Auth::user()->id}}" method="get" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>




    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


