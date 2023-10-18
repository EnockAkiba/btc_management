@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                        <li class="breadcrumb-item active"> Les utilisateurs</li>
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
                            <h2 class="title">Les utilisateurs</h2>
                            <a class="bg-blue-400 text-white p-2 ml-auto" data-toggle="modal" data-target="#addNew"
                                href="#" role="button">Ajouter un utilisateur
                            </a>
                        </div>
                    </div>
                    <div class=" overflow-auto mt-1 py-0">
                        <table class="table table-hover">
                            <thead class="bg-green-100">
                                <th>#</th>
                                <th>profil</th>
                                <th>name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Sexe</th>
                                <th>Type</th>
                                <th>statut</th>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($users as $user)
                                        <th>{{ $loop->index + 1 }}</th>
                                        <th>
                                                @if (Auth::user()->picture)
                                                    <img src="{{ asset('/' . Auth::user()->picture) }}"
                                                        class="rounded-full mx-2" style="width:40px; height:40px">
                                                
                                                @else
                                                    <span><i class="fa fa-user-circle" aria-hidden="true"></i> </span>
                                                @endif
                                        </th>
                                        <th><a href="{{ route('user.show') }}" class="text-blue-500"> {{$user->name." ".$user->lastName}}
                                             </a></th>
                                        <th>{{$user->email}}</th>
                                        <th>{{$user->phone}}</th>
                                        <th>{{$user->sex}}</th>
                                        <th>{{$user->type}}</th>
                                        <th>{{$user->statut}}</th>
                                </tr>
                                @endforeach
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
                            <h3 class="text-green-500">Ajouter un utilisateur</h3>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Nom <span class="required"> *</span> </label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Postnom <span class="required"> *</span> </label>
                                        <input type="text" name="lastName" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="">Adress Mail <span class="required"> *</span></label>
                                <input type="email" class="form-control" name="email">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Mot de passe par defaut <span class="required"> *</span>
                                        </label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Sexe <span class="required"> *</span> </label>
                                        <select name="sex" id="" class="form-control">
                                            <option>---Choisir---</option>
                                            <option value="M">Masculin</option>
                                            <option value="F">Feminin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Phone number </label>
                                        <input type="text" class="form-control" name="phone">
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
@endsection
