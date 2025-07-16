@extends('layouts.guest')

@section('title', 'Sign In')

@section('head')
    @parent
    <link rel="stylesheet" href="{{asset('css/pages/sign-in.css')}}">
@endsection

@section('back link', Route('landing-page'))

@section('information', 'Sign In')

@section('content')
    <div class="container-sign-in d-flex flex-column">
        <form class='form-sign-in' action="">
            <div class="input-name d-flex no-wrap">
                <input class="input-sign-in" type="text" name="" id="" placeholder="First Name">
                <input class="input-sign-in" type="text" name="" id="" placeholder="Last Name">
            </div>
            <input class="input-sign-in" type="text" placeholder="Email or Phone Number">
            <input class="input-sign-in" type="text" placeholder="Password" >
        </form>
    </div>
    @section('text button', 'Sign In')
@endsection