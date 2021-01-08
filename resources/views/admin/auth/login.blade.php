@extends('admin.admin_layouts')

@section('admin_content')
    <div style="background-image: url('https://images-na.ssl-images-amazon.com/images/I/71Hl321nTCL._SL1500_.jpg')" class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Gema.ba - <span class="tx-info tx-normal">Admin</span></div>
        <div class="tx-center mg-b-60">Administracijski Panel</div>
   <form action="{{ route('admin.login') }}" method="post">
    @csrf
    <div class="form-group">
         <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Unesite email adresu">
    </div><!-- form-group -->
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
    @enderror
    <div class="form-group">
         <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Unesite password">
         <a href="{{ route('admin.password.request') }}" class="tx-info tx-12 d-block mg-t-10">Zaboravili ste password?</a>
    </div><!-- form-group -->
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    <button type="submit" class="btn btn-info btn-block">Loguj se</button>
    </form>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->



@endsection
