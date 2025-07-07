@extends('layouts.guest')

@section('title', 'verifikasi-otp')

@section('head')
    <link rel="stylesheet" href="{{asset('css/pages/landing-page.css')}}">
@endsection

@section('content')
    <div class="container-get-started d-flex flex-column align-items-center w-100 h-100">J
        @section('information', 'Teman Freelance Pemula Akhir Pekan')
        <div class="position-relative">
            <img class="getStarted img-fluid" src="{{asset('images/get_started.png')}}" alt="#">
        </div>
    </div>
@endsection