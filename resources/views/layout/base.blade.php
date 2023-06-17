<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle')|BooksSearch</title>
    <!-- Bulma Version 0.9.X-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" />
    <script async type="text/javascript" src="{{url('js/script.js')}}"></script>
    @yield('pageCss')
</head>

<body>
    <!--START NAV -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{url('/')}}">
                    <span class="is-size-3">Books_Search</span>
                </a>
                <span class="navbar-burger burger" data-target="navbarMenu" id="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item" href="{{url('/')}}">
                        Home
                    </a>
                    <a class="navbar-item" href="{{url('/history')}}">
                        検索履歴
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->

    <!--START PAGE TITLE -->
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">@yield('pageTitle')</h1>
            </div>
        </div>
    </section>
    <!-- END PAGE TITLE -->

    <div class="container">
        <section class="articles">
            <div class="column is-8 is-offset-2 py-6">
                @yield('pageContents')
            </div>
        </section>
    </div>

    @yield('pageJs')
</body>

</html>
