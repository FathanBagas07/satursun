@extends('layouts.guest')

@section('title', 'Landing Page')

@section('head')
    <link rel="stylesheet" href="{{asset('css/pages/landing-page.css')}}">
@endsection

@section('content')
    <div class="container-get-started d-flex flex-column justify-content-end align-items-center w-100 h-100">
        @section('information', 'Teman Freelance Pemula Akhir Pekan')
        <img class="get-started" src="{{asset('images/get_started.png')}}" alt="#">
    </div>
@endsection
@section('button-guest-route', Route('sign-in'))
@section('text button', 'Get Started')