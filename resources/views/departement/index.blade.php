@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="bg-blue-400 p-1 mx-1 rounded-sm text-white"><a href="{{ route('extension') }}">Extension</a></li>
                    <li class="bg-blue-400 p-1 mx-1 rounded-sm text-white"><a href="{{route('departement')}}">Departement</a> </li>
                    <li class="bg-blue-400 p-1 mx-1 rounded-sm text-white"><a href="{{route('promotion')}}">Promotioin</a></li>

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
            <div class="col-md-12 p-0">
                <div class="card">
                    <div class="card-header">
                        <div class=" flex items-center justify-between">
                            <h2 class="title">Departements</h2>
                            <a class="bg-blue-400 text-white p-2 ml-auto" data-toggle="modal" data-target="#addDepartement" href="#" role="button">Add Departement
                            </a>
                        </div>
                    </div>
                    <div class=" overflow-auto py-0" style="height: 70vh; overflow:auto">

                        <table class="table table-hover">
                            <thead class="bg-green-100">
                                <th>#</th>
                                <th>Image</th>
                                <th>Titre/ Designation</th>
                                <th>Description</th>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($departements as $departement)
                                    <td>{{$loop->index +1}}</td>
                                    <td><img src="{{asset('/').$departement->picture}}" alt="" width="40px" class="rounded-sm"></td>
                                    <td><a href="{{route('departement.show', $departement)}}" class="text-blue-500"> {{$departement->title}} </a></td>
                                    <td>{{substr($departement->description, 0,100) }}...</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-end my-3">
                            {{$departements->links()}}
                        </div>
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
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-500 p-2">
            <div class="">
                <div class="card-header">
                    <div class="user-block">
                        <h3 class=" font-bold">Veuilez remplir les informations du departement</h3>
                    </div>

                </div>
                <!-- /.card-header -->
                <form action="{{route('departement.store')}}" method="post" enctype="multipart/form-data">
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

@endsection