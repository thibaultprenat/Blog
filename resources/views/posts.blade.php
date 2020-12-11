@extends('layouts.app')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <a type="button"
                class="border border-purple-500 bg-purple-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-purple-600 focus:outline-none focus:shadow-outline"
                href="{{ URL::action('PostController@create') }}">Créer un article
            </a>
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('login') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Déconnexion') }}
                        </a>

                        <form id="logout-form" action="{{ route('login') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<p>



</p>
<div>

    <section class="rounded-b-lg  mt-4 ">

        <div id="task-comments" class="pt-4">
            <!--     comment-->
            @foreach($posts as $post)
            <div
                class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                <div class="flex flex-row justify-center mr-2">
                    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4"
                        src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
                    <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left "><a
                            href="{{ URL::action('PostController@view', $post->id) }}">{{ $post->title }}</a></h3>

                </div>
                <i class="text-blue-600 font-semibold text-lg text-center md:text-left ">{{ $post->user->name }}</i>


                <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">{{ $post->content }} </p>

            </div>
            @endforeach
            <!--  comment end-->

        </div>
    </section>

</div>

@section('content')