@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="my-3 p-0 ">
        <div class="ml-auto">
            <ol class="flex">
                <li class="mx-1 px-1 border rounded-md shadow-md hover:bg-blue-700"><a href="{{ route('extension') }}" class="hover:text-white"><i class="fa fa-plus-circle"></i> Extension</a></li>
                <li class="mx-1 px-1 border rounded-md shadow-md hover:bg-blue-700"><a href="{{route('departement')}}" class="hover:text-white"><i class="fa fa-plus-circle"></i> Departement</a> </li>
                <li class="mx-1 px-1 border rounded-md shadow-md hover:bg-blue-700"><a href="{{route('promotion')}}" class="hover:text-white"> <i class="fa fa-plus-circle"></i> Promotion</a></li>
            </ol>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="card">
                    <div class="card-header p-0">
                        <div class=" flex items-center justify-between">
                            <h2 class="title p-2">Promotion</h2>
                            <a class="bg-blue-400 text-white p-1 ml-auto" data-toggle="modal" data-target="#addDepartement" href="#" role="button">Add promotion
                            </a>
                        </div>
                    </div>
                    <div class=" overflow-auto py-0" style="max-height: 68vh; overflow:auto">
                        <table class="table table-hover table-striped  text-sm">
                            <thead class="bg-blue-900 text-white">

                                <th>#</th>
                                <th>Designation</th>
                                <th>Extension</th>
                                <th>Departement</th>
                                <th>Prix</th>
                                <th>Debut</th>
                                <th>Fin</th>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($promotions as $promotion)
                                    <td>{{$loop->index +1}}</td>
                                    <td><a href="{{route('promotion.show', $promotion)}}" class="text-blue-500"> {{$promotion->designation}} </a></td>
                                    <td>{{$promotion->extension->designation}}</td>
                                    <td>{{$promotion->departement->title}}</td>
                                    <td>{{$promotion->price}}$</td>
                                    <td>{{date_format(date_create($promotion->dateBegin),'d.M.Y')}}</td>
                                    <td>{{date_format(date_create($promotion->dateEnd),'d.M.Y')}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>

                </div>
                <div class="flex justify-end text-sm">
                    {{$promotions->links()}}
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->

{{-- PROMOTION MODAL  --}}

<div class="modal fade" id="addDepartement">
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

                        <div class="form-group mb-4">
                            <label for="">Designation / Titre</label>
                            <input type="text" class="form-control" name="designation" value="{{old('designation')}}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Choisir une extension</label>
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
                            <input type="text" class="form-control" name="price" value="{{old('price')}}">
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="">Date du début <span class="required"> *</span> </label>
                                    <input type="datetime-local" name="dateBegin" id="" class="form-control" value="{{old('dateBegin')}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="">Date de la fin <span class="required"> *</span> </label>
                                    <input type="datetime-local" name="dateEnd" id="" class="form-control" value="{{old('dateEnd')}}">
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