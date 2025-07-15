@extends('layouts.app')

@section ('head')
    <link rel="stylesheet" href="{{asset('css/layouts/guest.css')}}">
@endsection

@section ('body')
    {{--Untuk membuat UI Mobile--}}
        <div class="container-mobile d-flex flex-column justify-content-start aligin-items-center mx-auto border border-black rounded-5">
            <header class="header d-flex flex-column justify-content-end align-items-center">
                @if (Route::currentRouteName() !== 'landing-page')
                    <a class="button-back align-self-start text-black p-0 border-0 mb-auto bg-transparent" href="@yield('back link')" role="button">
                        {{--Icon Arrow Left--}}
                        <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="42" height="35" fill="currentColor" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                        </svg>
                    </a>
                @endif
                <div class='d-flex flex-column align-items-center'>
                    <img src="images/logo.svg" alt="Logo">
                    <p class="text-information text-center fw-bold">@yield('information')</p>
                </div>
            </header>
            <main class="position-relative d-flex flex-column justify-content-start align-items-center">
                @yield('content')
                <a class="button-guest btn btn-primary text-center p-0 fw-bold shadow my-2 border-0" href="@yield('button-guest-route')" role="button">@yield('text button')</a>
            </main>
        </div>
@endsection