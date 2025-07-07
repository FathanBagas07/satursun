<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/layouts/guest.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap">
        <link rel="icon" type="image/svg+xml" href="{{asset('images/logo.svg')}}">
        @yield('head')
    </head>
    <body>
        <div class="container-mobile d-flex flex-column justify-content-between aligin-items-center mx-auto bg-white">
            <header class=" d-flex flex-column align-items-center">
                <img src="images/logo.png" alt="Logo">
                <p class="text-information text-center fw-bold">@yield('information')</p>
            </header>
            <main>
                @yield('content')
                <a class="button-guest btn text-black text-center p-0" href="" role="button">@yield('text button')</a>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>