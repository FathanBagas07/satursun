@extends('layouts.app')

@section('title', 'Landing Page')

@section('head')
    <link rel="stylesheet" href="{{asset('css/landingPage.css')}}">
    <link rel="icon" type="image/svg+xml" href="{{asset('images/logo.svg')}}">
@endsection

@section('content')
    <div class="container-primary d-flex flex-column justify-content-end align-items-center w-100 h-100">
        <img class="logo" src="{{asset('images/logo.png')}}" alt="logo">
        <p class="text-center p-3 fw-bold">Teman Freelance Pemula Akhir Pekan</p>
        <div class="position-relative">
            <img class="getStarted img-fluid" src="{{asset('images/get_started.png')}}" alt="#">
            <a class="button-landingPage btn btn-primary border-0 text-white text-center p-0 position-absolute" href="" role="button">Get Started</a>
        </div>
    </div>
@endsection