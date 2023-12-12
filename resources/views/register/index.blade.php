@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                        <li class="breadcrumb-item active"> Les apprenants</li>
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

                <div class="card col-md-12 p-0" style="max-height: 80vh; overflow:auto">
                    <div class="card-header">
                        <div class=" flex items-center justify-between">
                            <h2 class="title">Les apprenants</h2>
                            <a class="bg-blue-400 text-white p-2 ml-auto" data-toggle="modal" data-target="#addNew"
                                href="#" role="button">Inscrire
                            </a>
                        </div>
                    </div>
                    <div class=" overflow-auto mt-1 py-0">
                        <table class="table table-hover">
                            <thead class="bg-green-100">
                                <th>Code Index</th>
                                <th>profil</th>
                                <th>name</th>
                                <th>Phone</th>
                                <th>Genre</th>
                                <th>Promotion</th>
                                <th>Extension</th>
                                <th>vacation</th>
                            </thead>
                            <tbody>
                                <th>891</th>
                                <th>images</th>
                                <th><a href="{{route('student.show')}}" class="text-blue-500"> paul bebukya espoir dev </a></th>
                                <th>8919890893</th>
                                <th>M</th>
                                <th>Anglais</th>
                                <th>afi bora</th>
                                <th>6h-8h</th>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section><!-- /.container-fluid -->
    <!-- /.content -->

    {{-- ADD STUDENT MODAL  --}}

    <div class="modal fade" id="addNew">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-2">
                <div class="">
                    <div class="card-header">
                        <div class="user-block flex justify-between w-full items-start">
                            <h3 class="text-green-500">Inscrire un apprenant</h3>
                            <form action="" method="post"
                                class="mt-0 pt-0 flex items-center bg-gray-100 border rounded-xl">
                                <input type="search" name=""
                                    class=" border-none outline-none p-2 bg-transparent w-full"
                                    placeholder="Recherche un apprenant">
                                <i class="fa fa-search mx-1" aria-hidden="true"></i>
                            </form>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">apprenant <span class="required"> *</span> </label>
                                        <select name="user_id" id="" class="form-control">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Promotion <span class="required"> *</span> </label>
                                        <select name="promotion_id" id="" class="form-control">
                                            <option>---Choisir une promotion--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Index number <span class="required"> *</span></label>
                                <input type="text" class="form-control" name="index">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Extension <span class="required"> *</span> </label>
                                        <select name="extension" id="" class="form-control">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Vacation <span class="required"> *</span> </label>
                                        <input type="text" class="form-control" name="vacation">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Responsable  </label>
                                        <input type="text" class="form-control" name="respoName">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Phone du Responsable  </label>
                                        <input type="text" class="form-control" name="respoNumber">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->
                        <div class="m-3 flex justify-between">
                            <button type="submit" class="btn-valid">Valider</button>
                            <span class="required ml-auto"> * sont obligatoire </span>
                        </div>
                    </form>
                    <!-- /.card-footer -->
                </div>


            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- NAVIGATION MODAL-->


    {{-- IMAGES MODAL  --}}

    {{-- <div class="modal fade" id="media">
        <div class="modal-dialog modal-md">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-3">
                <div class="flex justify-between items-center">
                    <h3 class="card-title text-orange"><a href="" class="brand-link">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image " >
                            <span class="title">BTC/AGAPD </span>
                        </a>
                    </h3>
                    <button type="button" class="text-green-500 p-2 ml-auto border rounded-md" data-dismiss="modal"><i
                            class="fa-solid fa-x"></i>Fermer</button>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <h2 class="title-blue mb-3 text-center border-bottom">Les images de l'actualité</h2>
                <div class="row mt-2">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="col-12 mb-2">
                            <img class="img-fluid pad" src="{{ asset('admin/images/photo2.png') }}" alt="Photo">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div> --}}
    <!-- IMAGES MODAL-->
@endsection
