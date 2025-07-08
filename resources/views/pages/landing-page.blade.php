@extends('layouts.guest')

@section('title', 'Landing Page')

@section('head')
    <link rel="stylesheet" href="{{asset('css/pages/landing-page.css')}}">
@endsection

@section('content')
    <div class="container-get-started d-flex flex-column justify-content-end align-items-center w-100 h-100">
        @section('information', 'Teman Freelance Pemula Akhir Pekan')
        <div class="position-relative">
            <img class="get-started" src="{{asset('images/get_started.png')}}" alt="#">
            <a class="button-get-strated btn btn-primary position-absolute text-white text-center p-0 border-0 z-1" href="{{Route('sign-in')}}">Get Started</a>
        </div>
    </div>
@endsection