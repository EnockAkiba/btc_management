@extends('layouts.guest')

@section('content')
<div class="row p-3 justify">
    <div class="col-md-5 col-12 flex justify-center items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image "
        style="width:100% "> </a>
    </div>
    <div class="col-md-6 col-12">
        <div class="card-body login-card-body">
            <p class="text-3xl  text-blue-400 font-bold my-4 ">Se connecter</p>
    
            <form action="{{ route('login') }}" method="post">
                @csrf
    
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
    
                <div class="input-group mb-3">
                    <input type="password" name="password"  id="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Mot de passe') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span id="icone" onclick='eye()'></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
    
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Rester connecté
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-12 my-3">
                        <button type="submit" class="p-2 bg-blue-400  text-white font-semibold">{{ __('connexion') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
    
            @if (Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}" class="text-green-400"> Mot de passe oublié ?</a>
                    <a href="{{ route('login') }}" class="text-blue-400"> S'inscrire</a>
                </p>
            @endif
        </div>
    </div>
</div>
   
    <!-- /.login-card-body -->
    <script>
        e = true;
        $('#icone').addClass("fa fa-eye");
        function eye() {
            if (e) {
                document.getElementById("password").setAttribute("type", "text");
                $('#icone').addClass("fa fa-eye-slash");
                e = false;
            } else {
                document.getElementById("password").setAttribute("type", "password");
                $('#icone').addClass("fa fa-eye");
                e = true;
            }
        }
        </script>
@endsection