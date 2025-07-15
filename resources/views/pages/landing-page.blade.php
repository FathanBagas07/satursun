@extends('layouts.guest')

@section('title', 'Landing Page')

@section('head')
    <link rel="stylesheet" href="{{asset('css/pages/landing-page.css')}}">
@endsection

@section('content')
    @section('information', 'Teman Freelance Pemula Akhir Pekan')
    <img class="get-started img-fluid" src="{{asset('images/get_started.png')}}" alt="#">
@endsection
@section('button-guest-route', Route('sign-in'))
@section('text button', 'Get Started')