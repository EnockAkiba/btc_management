@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                        <li class="breadcrumb-item title"><a href="{{ route('departement') }}">Departements</a></li>
                        <li class="breadcrumb-item active"> Title promotion</li>
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
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-blue-100">
                            <h3 class="widget-user-username">promotion :  bbaabaala</h3>
                            <h5 class="widget-user-desc mt-2">Departement : couture</h5>
                        </div>
                        <div class="widget-user-image mt-2">
                            <img src="{{ asset('/' . Auth::user()->picture) }}" class="rounded-full mx-2"
                                style="width:40px; height:40px">
                        </div>
                        <div class="p-4">
                            <h5 class="mb-1">Titre : <span class="title">blabla</span> </h5>
                            <h5 class="mb-1 text-lg font-bold"> Description :</h5>
                            <p class="border p-2 mb-2" style="min-height: 130px; max-height: 330px; overflow: auto;">nventore sed cupiditate cum libero quis delectus, quia alias, odio placeat eum fugit quibusdam aliquam magni modi.
                            </p>
                            <h5 class="mb-1  flex justify-between">
                                <a class="bg-blue-400 text-white p-2 ml-auto" data-toggle="modal"
                                data-target="#addDepartement" href="#" role="button">Modifier
                            </a>
                            </h5>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>

                <div class="col-md-8 p-0" style="max-height: 80vh; overflow:auto">
                    <div class="card">
                        <div class="card-header">
                            <div class=" flex items-center justify-between">
                                <h2 class="title">Les apprenants</h2>
                                {{-- <a class="bg-blue-400 text-white p-2 ml-auto" data-toggle="modal"
                                    data-target="#addPromotion" href="#" role="button">Add promotion
                                </a> --}}
                            </div>
                        </div>
                        <div class=" overflow-auto py-0">
                            <table class="table table-hover">
                                <thead class="bg-green-100">
                                    <th>#</th>
                                    <th>profil </th>
                                    <th>Noms </th>
                                    <th>Index number</th>
                                    <th>Vacation</th>
                                    <th>Statut</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>image</td>
                                        <td><a href="{{route('departement.show')}}" class="text-blue-500"> English </a></td>
                                        <td>le 12.Oct 2023</td>
                                        <td>le 22.Dec 2023</td>
                                        <td>Actif/e</td>
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
                                                                                                                                                                                                                                                                                       
    {{--EDIT DEPARTEMENT  --}}
    <div class="modal fade" id="addDepartement">
        <div class="modal-dialog modal-md">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-2">
                <div class="">
                    <div class="card-header">
                        <div class="user-block">
                            <h3 class="text-green-500">Modifier le promotion</h3>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                           
                            <div class="form-group">
                                <label for="">Designation / Titre</label>
                                <input type="text" class="form-control" name="designation">
                            </div>

                            <div class="form-group">
                                <label for="">Prix</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                           
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Date du début <span class="required"> *</span> </label>
                                        <input type="datetime-local" name="dateBegin" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Date de la fin  <span class="required"> *</span> </label>
                                        <input type="datetime-local" name="dateEnd" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                    
                            <input type="hidden" value="" name="departement_id">
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



@endsection
