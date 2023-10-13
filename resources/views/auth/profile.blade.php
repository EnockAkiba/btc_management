@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('news') }}">Mon profil</a></li>
                        <li class="breadcrumb-item active"> Name of user</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card border-t-2 border-t-green-400">
                        <div class="card-body box-profile py-4">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">Nina Mcintire</h3>

                            <p class="text-muted text-center">Software Engineer</p>

                            <a href="#" class="btn btn-primary btn-block"><b>Modifier la photo</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>

                <div class="col-md-9" style="max-height: 80vh; overflow:auto">


                    <div class="col-md-12">
                        <div class="card  border-t-2 border-t-green-400">
                            <div class="card-header">
                                <h3 class="card-title">Mon Profil</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="text-blue-400">Nom</label>
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
                                                <label for="" class="text-blue-400">Postnom</label>
                                                <input type="text" name="name" class="form-control" required>
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
                                                <label for="" class="text-blue-400">Sexe</label>
                                                <select name="sex" id="" class="form-control">
                                                    <option></option>
                                                    <option value="M">Homme</option>
                                                    <option value="F">Femme</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="text-blue-400">Téléphone</label>
                                                <input type="text" name="phone" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="input-group mb-3">
                                        <input type="text" name="adress"
                                            class="form-control @error('adress') is-invalid @enderror" placeholder="Adresse"
                                            required autocomplete="adress">
                                    </div>

                                    <div class="row">
                                        <div class="col-12 my-3">
                                            <button type="submit"
                                                class="p-2 bg-blue-400  text-white font-semibold mx-auto">{{ __('Valider') }}</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-12">
                        <div class="card  border-t-2 border-t-green-400">
                            <div class="card-header">
                                <h3 class="card-title">Modifier le profil</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="text-blue-400">Nom</label>
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
                                                <label for="" class="text-blue-400">Postnom</label>
                                                <input type="text" name="name" class="form-control" required>
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
                                                <label for="" class="text-blue-400">Sexe</label>
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
                                        <input type="text" name="adress"
                                            class="form-control @error('adress') is-invalid @enderror"
                                            placeholder="Adresse" required autocomplete="adress">
                                    </div>

                                    <div class="row">
                                        <div class="col-12 my-3">
                                            <button type="submit"
                                                class="p-2 bg-blue-400  text-white font-semibold mx-auto">{{ __('Valider') }}</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-12">
                      <div class="card  border-t-2 border-t-green-400">
                          <div class="card-header">
                              <h3 class="card-title">Modifier le Mot de passe</h3>

                              <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                  </button>
                              </div>
                              <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <form method="POST" action="{{ route('register') }}">
                                  @csrf
                                  <div class="row mt-3">
                                      <div class="col-12 col-md-12">
                                          <div class="form-group">
                                              <label for="" class="text-blue-400">Ancien mot de passe</label>
                                              <input type="password" name="password_old" class="form-control" required>
                                          </div>
                                          @error('name')
                                              <span class="error invalid-feedback">
                                                  {{ $message }}
                                              </span>
                                          @enderror
                                      </div>
                                      <div class="col-12 col-md-12">
                                          <div class="form-group">
                                              <label for="" class="text-blue-400">Mot de passe</label>
                                              <input type="password" name="name" class="form-control" required>
                                          </div>
                                        
                                      </div>

                                  </div>

                                  <div class="row">
                                      <div class="col-12 col-md-12">
                                          <div class="form-group">
                                              <label for="" class="text-blue-400">Confirmez le mot de passe</label>
                                              <input type="password" name="password2" class="form-control" required>
                                          </div>

                                      </div>
                                     
                                  </div>

                                  <div class="row">
                                      <div class="col-12 my-3">
                                          <button type="submit"
                                              class="p-2 bg-blue-400  text-white font-semibold mx-auto">{{ __('Valider') }}</button>
                                      </div>

                                  </div>
                              </form>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                </div>
                <!-- /.row -->
            </div>
    </section><!-- /.container-fluid -->
    <!-- /.content -->
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('scripts')
    @if ($message = Session::get('success'))
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            toastr.success('{{ $message }}')
        </script>
    @endif
@endsection
