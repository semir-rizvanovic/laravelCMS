@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/login.css') }}">

<br><br>
<div class="cont container">
    <div class="form sign-in">
      <h2>Loguj se</h2>
      <form action="{{route('login') }}" id="contact_form" method="post">
      @csrf
      <label>
        <span>Email ili Broj Telefona</span>
        <input type="email" name="email" lass=" @error('email') is-invalid @enderror" value="{{ old('email') }}">
        @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="password" required=""  class=" @error('password') is-invalid @enderror" >
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </label>
      <button class="submit" type="submit">Login</button>
      </form>
      <a href="{{route('password.request') }}" class="forgot-pass" text-center>Zaboravili ste password ?</a>
      <div class="social-media">
        <ul>
          <li><img src="{{ asset('public/frontend/styles/loginimages/facebook.png') }}"></li>
          <li><img src="{{ asset('public/frontend/styles/loginimages/twitter.png') }}"></li>
          <li><img src="{{ asset('public/frontend/styles/loginimages/linkedin.png') }}"></li>
          <li><img src="{{ asset('public/frontend/styles/loginimages/instagram.png') }}"></li>
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img" style="background-image: url({{ asset('public/frontend/styles/loginimages/bg.jpg') }});">
        <div class="img-text m-up">
          <h2>Nemate račun?</h2>
          <p>Registrujte se i počnite sa kupovinom !</p>
        </div>
        <div class="img-text m-in">
          <h2>Već imate račun?</h2>
          <p>Ako već imate račun molimo Vas da se ulogujete !</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Registracija</span>
          <span class="m-in">Login</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Registruj se</h2>
        <form action="{{ route('register') }}" id="contact_form" method="post">
      @csrf
        <label>
          <span>Prezime i Ime</span>
          <input type="text" name="name" required="" >
        </label>
        <label>
          <span>Broj Telefona</span>
          <input type="text" name="phone" required="" class=" @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
        </label>

        <label>
          <span>Email Adresa</span>
          <input type="email" name="email" required="" class=" @error('email') is-invalid @enderror" value="{{ old('email') }}">
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password" required="">
        </label>
        <label>
          <span>Potvrdite Password</span>
          <input type="password" name="password_confirmation" required="">
        </label>
      <button type="submit" class="submit">Registracija</button> 
      </div>
      </form>

    </div>
  </div>

<br><br>

@endsection
