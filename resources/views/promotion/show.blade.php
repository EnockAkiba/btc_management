@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                    <li class="breadcrumb-item title"><a href="{{ route('promotion') }}">Promotions</a></li>
                    <li class="breadcrumb-item active"> {{$promotion->designation}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid overflow-auto" style="height: 80vh;">
        <div class="row">
            <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-blue-100">
                        <h3 class="widget-user-username"> {{$promotion->designation}} </h3>
                        <h5 class="widget-user-desc mt-2">Departement : {{$promotion->departement->title}}</h5>
                    </div>

                    <div class="p-4">
                        <h5 class="mb-1 text-lg font-bold"> Description :</h5>
                        <p class="border p-2 mb-2" style="min-height: 130px; max-height: 330px; overflow: auto;">
                            {{$promotion->departement->description}}
                        </p>
                        <h5 class="mb-1  flex justify-between">
                            <a class="bg-blue-400 text-white p-2 ml-auto" data-toggle="modal" data-target="#addDepartement" href="#" role="button">Modifier
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
                        </div>
                    </div>
                    <div class=" overflow-auto py-0">
                        <table class="table table-hover">
                            <thead class="bg-green-100">
                                <th>#</th>
                                <th>profil </th>
                                <th>Noms </th>
                                <th>Genre</th>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($students as $student)

                                    <td>{{$loop->index +1}}</td>

                                    <td>
                                         @if($student->picture)
                                      <a href="{{asset('/'.$student->picture)}}"> <img src="{{asset('/'.$student->picture)}}" class=" rounded-full w-10 h-10">  </a>    

                                    @else
                                     <img src="{{asset('/images/user.png')}}" alt="" class=" rounded-full w-10 h-10"> 
                                    @endif
                                    </td>
                                    <td>{{$student->name." ".$student->lastName}}</td>
                                    <td>{{$student->sex}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-end">
                            {{$students->links()}}
                        </div>
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
                <form action="{{route('promotion.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group mb-4">
                            <label for="">Designation / Titre</label>
                            <input type="text" class="form-control" name="designation" value="{{$promotion}}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Choisir une extension</label>
                            <input type="text" name="extension_id">
                            <select name="extension_id" class="form-control" id="">
                                <option>---Choisir une extension---</option>
                                @foreach($extensions as $extension)
                                <option value="{{$extension->id}}">{{$extension->designation}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Choisir un departement</label>
                            <input type="text" name="departement">
                            <select name="departement_id" class="form-control" id="">
                                <option>---Choisir un departement---</option>
                                @foreach($departements as $departement)
                                <option value="{{$departement->id}}">{{$departement->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Prix</label>
                            <input type="text" class="form-control" name="price">
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="">Date du début <span class="required"> *</span> </label>
                                    <input type="datetime-local" name="dateBegin" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-4">
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



@endsection