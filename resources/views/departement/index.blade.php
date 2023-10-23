@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                        <li class="breadcrumb-item active"> Departements & Extensions</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row gap-4">
                <div class="col-md-7 p-0" style="max-height: 80vh; overflow:auto">
                    <div class="card">
                        <div class="card-header">
                            <div class=" flex items-center justify-between">
                                <h2 class="title">Departements</h2>
                                <a class="bg-blue-400 text-white p-2 ml-auto" data-toggle="modal"
                                    data-target="#addDepartement" href="#" role="button">Add Departement
                                </a>
                            </div>
                        </div>
                        <div class=" overflow-auto py-0">
                            <table class="table table-hover">
                                <thead class="bg-green-100">
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Titre/ Designation</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>picture</td>
                                        <td><a href="{{route('departement.show')}}" class="text-blue-500"> English </a></td>
                                        <td>{{substr('Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus in similique provident excepturi quo quae at aut inventore? Consequuntur
                                            ', 0,50) }}...</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-0" style="max-height: 80vh; overflow:auto">
                    <div class="card">
                        <div class="card-header">
                            <div class=" flex items-center justify-between">
                                <h2 class="title">Extensions</h2>
                                <a class="bg-blue-400 text-white p-2 ml-auto" data-toggle="modal"
                                    data-target="#addExtension" href="#" role="button">Add Extensions
                                </a>
                            </div>
                        </div>
                        <div class=" overflow-auto  py-0">
                            <table class="table table-hover">
                                <thead class="bg-green-100">
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                </thead>
                                <tbody>
                                   <tr>
                                    <td>1</td>
                                    <td><a href="{{route('extension.show')}}" class="text-blue-500"> Afia bora </a></td>
                                        <td>{{substr('Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus in similique provident excepturi quo quae at aut inventore? Consequuntur
                                            ', 0,20) }}...</td>
                                   </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section><!-- /.container-fluid -->
    <!-- /.content -->

    {{-- Departement MODAL  --}}

    <div class="modal fade" id="addDepartement">
        <div class="modal-dialog modal-md">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-2">
                <div class="">
                    <div class="card-header">
                        <div class="user-block">
                            <h3 class="text-green-500">Veuilez remplir les informations du departement</h3>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Titre/Designation <span class="required"> *</span> </label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="">Attachez une image</label>
                                <input type="file" class="form-control" name="picture">
                            </div>

                            <div class="form-group">
                                <label for="">Description<span class="required"> *</span></label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control">
                                    </textarea>
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


    {{-- Extensions MODAL  --}}

    <div class="modal fade" id="addExtension">
        <div class="modal-dialog modal-md">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-3">

                <div class="">
                    <div class="card-header">
                        <div class="user-block">
                            <h3 class="text-green-500">Veuilez remplir les informations de l'extension</h3>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Titre/Designation <span class="required"> *</span> </label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="">Description<span class="required"> *</span></label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control">
                                    </textarea>
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
    <!-- IMAGES MODAL-->
@endsection
