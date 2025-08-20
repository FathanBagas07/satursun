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
            <div class="input-name d-flex gap-4 no-wrap fw-bold">
                <input class="input-sign-in w-100 border-0 rounded-3" type="text" name="" id="" placeholder="First Name">
                <input class="input-sign-in w-100 border-0 rounded-3" type="text" name="" id="" placeholder="Last Name">
            </div>
            <input class="input-sign-in w-100 border-0 rounded-3" type="text" placeholder="Email or Phone Number">
            <input class="input-sign-in m-0 w-100 border-0 rounded-3" type="text" placeholder="Password" >
        </form>
        <div class="line-or d-flex justify-content-center align-items-center">
            <span class='line d-inline-block w-100 bg-black'></span>
            <span class='or p-4 fw-bold'>OR</span>
            <span class='line -inline-block w-100 bg-black'></span>
        </div>
        <a href="" class="btn btn-light fw-bold"><img src="{{asset('images/google.png')}}" alt=""><span class="btn-text">Continue with Google</span></a>
        <a href="" class="btn btn-light d-flex justfy-content-center align-items-center fw-bold"><img src="{{asset('images/facebook.png')}}" alt="">Continue with Facebook</a>
        <a href="" class="btn btn-light d-flex justfy-content-center align-items-center fw-bold">Login</a>
    </div>
</div>

    @section('text button', 'Sign In')
@endsection