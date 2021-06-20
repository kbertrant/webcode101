@extends('layouts.app')

@section('title', ' Modifier mot de passe')

@section('content')
<!-- begin:: Page -->
<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{asset('assets/media//bg/bg-3.jpg')}});">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="{{asset('img/preloader-logo.png')}}">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                    <h3 class="kt-login__title">Changez votre mot de passe</h3>
                    <div class="kt-login__desc">Entrer votre nouveau mot de passe et veuillez le confirmer pour le compte <b>{{$user->email}}</b></div>
                    @if(session()->has('success'))
                        <div class="alert alert-danger">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                        
                        <form class="kt-form" method="POST" action="{{route('user.change_password')}}">
                            @csrf
                            <div class="input-group">
                                <input class="form-control" type="hidden" value="{{$user->id}}" name="id" required>
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="password" placeholder="Mot de passe" name="password" autocomplete="off" required>
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="password" placeholder="Confirmez Mot de passe" name="repassword" autocomplete="off" required>
                            </div>
                            <div class="kt-login__actions">
                                <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- end:: Page -->
@endsection
