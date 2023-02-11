<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-#7fffff">


        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py- px-4 sm:px-6 lg:px-8">

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <!-- ログインしていないユーザーに表示 -->
                    <li class="nav-item">
                        <div class="flex">お買い物の方は<a class="nav-link" href="{{ route('login') }}">
                                <p class="text-red-500 flex">ログイン</p>
                            </a>をお願いします。</p>
                        </div>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item flex">

                        <div class="flex">会員登録がまだの方は<a class="nav-link" href="{{ route('register') }}">
                                <p class="text-yellow-400">コチラ</p>
                            </a>から！
                        </div>
                    </li>
                    @endif
                    @else
                    <!-- ログインしているユーザーに表示 -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            ようこそ {{ Auth::user()->name }}さん <span class="caret"></span>
                        </a>

                        <div class="mt-4 flex space-x-4 dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item mr-10" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            </a>
                            <a href="{{ url('/cart') }}">
                                <img src="{{ asset('image/cart.png') }}" class="cart ml-6">
                            </a>
                            <a class="dropdown-item" href="{{ url('/history') }}">
                                購入履歴を見る
                            </a>
                            <a class="dropdown-item" href="{{ url('/favorites/index') }}">
                                お気に入り表示
                            </a>

                            @endguest

                        </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
