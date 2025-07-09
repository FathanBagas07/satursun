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
        {{--Untuk membuat UI Mobile--}}
        <div class="container-mobile d-flex flex-column justify-content-between aligin-items-center mx-auto border border-black rounded-5">
            <header class="header d-flex flex-column justify-content-end align-items-center">
                @if (Route::currentRouteName() !== 'landing-page')
                    <a class="button-back btn btn-light align-self-start text-black p-0 border-0 mb-auto" href="@yield('back link')" role="button">
                        {{--Icon Arrow Left--}}
                        <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="42" height="35" fill="currentColor" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                        </svg>
                    </a>
                @endif
                <div class='d-flex flex-column align-items-center'>
                    <img src="images/logo.png" alt="Logo">
                    <p class="text-information text-center fw-bold">@yield('information')</p>
                </div>
            </header>
            <main>
                @yield('content')
                <a class="button-guest btn btn-primary text-black text-center p-0" href="" role="button">@yield('text button')</a>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>