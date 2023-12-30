@extends('layouts.guest')

@section('content')
    <div class="row p-2">
        <div class="col-md-3 flex justify-center items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image " style="width:100% "> </a>
        </div>
        <div class="col-md-9">
            <div class="card-body login-card-body">
                <p class="text-3xl  text-blue-400 font-bold my-4 ">S'inscrire</p>
                <hr>
                <div class="card-body  m-0 p-0">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Nom</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                @error('name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Postnom</label>
                                    <input type="text" name="lastName" class="form-control" required>
                                </div>
                                @error('name')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Sexe</label>
                                    <select name="sex" id="" class="form-control">
                                        <option></option>
                                        <option value="M">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                </div>
                             
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Téléphone</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                            </div>
                        </div>

                       
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="{{ __('Email') }}" required autocomplete="email">
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
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('Mot de passe') }}" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="password" name="password_confirmation" id="passwordC"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="{{ __('Confirmer votre Mot de passe ') }}" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span id="icone" onclick="eye()"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      

                        <div class="row">
                            <div class="col-12 my-3">
                                <button type="submit" class="p-2 bg-blue-400  text-white font-semibold mx-auto">{{ __('Valider') }}</button>
                            </div>
                            <p class="mb-1">
                                <a href="{{ route('login') }}" class="text-red-400"> J'ai déjà un compte </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        e = true;
        $('#icone').addClass("fa fa-eye");
        function eye() {
            if (e) {
                document.getElementById("password").setAttribute("type", "text");
                document.getElementById("passwordC").setAttribute("type", "text");
                $('#icone').addClass("fa fa-eye-slash");
                e = false;
            } else {
                document.getElementById("password").setAttribute("type", "password");
                document.getElementById("passwordC").setAttribute("type", "password");
                $('#icone').addClass("fa fa-eye");
                e = true;
            }
        }
        </script>
@endsection
