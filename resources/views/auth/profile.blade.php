@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('news') }}">Mon profil</a></li>
                    <li class="breadcrumb-item active"> <span> {{ Auth::user()->name }}</span></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content" style="max-height: 80vh; overflow:auto">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card border-t-2 border-t-blue-500">
                    <div class="card-body box-profile py-4 ">
                        <form action="{{route('setProfilePicture')}}" method="post" enctype="multipart/form-data" class="p-1">
                            @csrf
                            <div class="text-center w-full">
                                @if(Auth::user()->picture)
                                <label for="img-input" id="photoShow"> <img class="rounded-3xl shadow-sm border-2 w-full" src="{{asset('/'.Auth::user()->picture)}}" style="max-width: 250px;" alt="Add picture" id='file-preview'></label>
                                @else
                                <label for="img-input" id="photoShow"> <img class="rounded-3xl shadow-sm border-2 w-full" src="{{asset('/images/user.png')}}" style="max-width: 250px;" alt="Add picture" id='file-preview'></label>
                
                                @endif
                                <input type="file" class="form-control photo d-none" name="picture" accept="image/*" id="img-input" onchange="showFile(event)" onclick="showBtn()">
                            </div>

                            <h3 class="profile-username text-center">{{ Auth::user()->name." ".Auth::user()->lastName }}</h3>

                            <div class="flex justify-center mt-4">
                                <button type="submit" class="bg-blue-400 p-2 mx-auto text-white" id="btn">Modifier la
                                    photo</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>

            <div class="col-md-8">
                <div class="col-md-12">
                    <div class="card  border-t-2 border-t-blue-500">
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
                            <form method="POST" action="{{ route('profile.update', Auth::user()) }}">
                                @csrf
                                @method("put")
                                <div class="row mt-3">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="" class="text-blue-400">Nom</label>
                                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="" class="text-blue-400">Postnom</label>
                                            <input type="text" name="lastName" class="form-control" value="{{Auth::user()->lastName}}">
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="" class="text-blue-400">Sexe</label>
                                            <select name="sex" class="form-control">
                                                <option value="{{Auth::user()->sex=='M'?'Homme':'Femme'}}">{{Auth::user()->sex=='m'?'Homme':'Femme'}}</option>
                                                <option ></option>
                                                <option value="m">Masculin</option>
                                                <option value="f">Feminin</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="" class="text-blue-400">Téléphone</label>
                                            <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="" class="text-blue-400">Adresse</label>
                                            <input type="text" name="adress" class="form-control" value="{{Auth::user()->adress?Auth::user()->adress:'---'}}">
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="" class="text-blue-400">Email</label>
                                            <input type="text" name="phone" class="form-control" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 my-3">
                                        <button type="submit" class="p-2 bg-blue-400  text-white font-semibold mx-auto">{{ __('Valider') }}</button>
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
<script>
    $('#btn').addClass("d-none");

    function showBtn() {
        $('#btn').removeClass("d-none");
    }

    function showFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById("file-preview");
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>
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