@extends('layouts.guest')

@section('title', 'Sign In')

@section('head')
    @parent
    <link rel="stylesheet" href="{{asset('css/pages/sign-in.css')}}">
@endsection

@section('back link', Route('landing-page'))

@section('information', 'Sign In')

@section('content')
    <div class="container-sign-in">
        
    </div>
    @section('text button', 'Sign In')
@endsection