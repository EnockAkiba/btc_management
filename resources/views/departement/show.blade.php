@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                    <li class="breadcrumb-item title"><a href="{{ route('departement') }}">Departement</a></li>
                    <li class="breadcrumb-item active"> {{$departement->title}}</li>
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
            <div class="col-md-5">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-blue-100">
                        <h3 class="widget-user-username">{{$departement->title}} </h3>
                        <h5 class="widget-user-desc mt-2">Departement</h5>
                    </div>
                    <div class="widget-user-image mt-2">
                        <img src="{{ asset('/' .$departement->picture) }}" class="rounded-full mx-2" style="width:100px; height:100px">
                    </div>
                    <div class="p-4">
                        <h5 class="mb-1 text-lg font-bold"> Description :</h5>
                        <p class="border p-2 mb-2" style="min-height: 130px; max-height: 330px; overflow: auto;">
                            {{$departement->description}}
                        </p>
                        <h5 class="mb-1  flex justify-between">
                            <a class="bg-blue-400 text-white p-2" data-toggle="modal" data-target="#addDepartement" href="#" role="button">Modifier
                            </a>
                            <a class="bg-red-400 text-white p-2" data-toggle="modal" data-target="#deleteExtension" href="#" role="button"><i class="fa fa-trash"></i>
                            </a>
                        </h5>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>

            <div class="col-md-7 p-0" style="max-height: 80vh; overflow:auto">
                <div class="card">
                    <div class="p-1">
                        <div class=" flex items-center justify-between">
                            <h2 class="title">Promotions</h2>
                            <a class="bg-blue-400 text-white p-1 text-sm ml-auto" data-toggle="modal" data-target="#addPromotion" href="#" role="button">Add promotion
                            </a>
                        </div>
                    </div>
                    <div class=" overflow-auto py-0">
                        <table class="table table-hover">
                            <thead class="bg-blue-900 text-white">

                                <th>#</th>
                                <th>Designation/ </th>
                                <th>Prix</th>
                                <th>Date début</th>
                                <th>Date de le fin</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="" class="text-blue-500"> English </a></td>
                                    <td></td>
                                    <td>le 12.Oct 2023</td>
                                    <td>le 22.Dec 2023</td>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-700 p-2">
            <div class="">
                <div class="card-header">
                    <div class="user-block">
                        <h3 class="text-blue-700">Modifier le departement</h3>
                    </div>

                </div>
                <!-- /.card-header -->
                <form action="{{route('departement.update', $departement)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Titre/Designation <span class="required"> *</span> </label>
                                    <input type="text" class="form-control" name="title" value="{{$departement->title}}">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="">Attachez une image</label>
                            <input type="file" class="form-control" name="picture">
                            <input type="hidden" value="{{$departement->picture}}" class="form-control" name="pictureOld">


                        </div>


                        <div class="form-group">
                            <label for="">Description<span class="required"> *</span></label>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control">
                            {{$departement->description}}
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

{{-- ADD PROMOTION --}}

<div class="modal fade" id="addPromotion">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-500 p-2">
            <div class="">
                <div class="card-header">
                    <div class="user-block">
                        <h3 class="">Les informations de la promotion</h3>
                    </div>

                </div>
                <!-- /.card-header -->
                <form action="{{route('promotion.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="departement_id" value="{{$departement->id}}">

                        <div class="form-group">
                            <label for="">Designation / Titre</label>
                            <input type="text" class="form-control" name="designation">
                        </div>

                        <div class="form-group">
                            <label for="">Choisir une extension</label>
                            <input type="text" class="form-control" name="extension_id">
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
                                    <label for="">Date de la fin <span class="required"> *</span> </label>
                                    <input type="datetime-local" name="dateEnd" id="" class="form-control">
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


<!-- {{--DELETE Extension  --}} -->
<div class="modal fade" id="deleteExtension" style="top:30%">
    <div class="modal-dialog modal-md">
        <div class="modal-dialog modal-sm">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-400 p-6">
                <h1 class=" p-2 font-semibold border-b">Voulez-vous supprimer ?</h1>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="mt-3">
                    <a href="{{route('departement.destroy', $departement)}}" class="bg-blue-300  text-white p-2"><i class="fa-solid fa-check"></i> Oui</a>
                    <button type="button" class="bg-red-400 p-1 ml-2 text-white" data-dismiss="modal"><i class="fa-solid fa-x"></i> Non</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection