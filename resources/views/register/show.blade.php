@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('register') }}">Les apprenants inscrits</a></li>
                    <li class="breadcrumb-item active">{{$register->user->name." ".$register->user->lastName}} </li>
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
            <div class="col-md-4">
                <div class="card">
                    @if($register->user->picture)
                    <img src="{{ asset('/' .$register->user->picture) }}" class="rounded-full p-2 mx-auto" style="width:270px; height:270px">
                    @else
                    <img src="{{asset('/images/user.png')}}" class="rounded-full p-2 mx-auto" style="width:270px; height:270px">
                    @endif
                </div>
                <div class="flex justify-between p-2">
                    <h4 class="bg-white card p-2"><a data-toggle="modal" data-target="#editregister" href="#" role="button"><i class="fa fa-edit"></i> l'inscription</a> </h4>
                    <h4 class="bg-red card p-2 "><a data-toggle="modal" data-target="#deleteregister" href="#" role="button"><i class="fa fa-trash"></i> </a></h4>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Widget: user widget style 1 -->
                <div class="card">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="p-3 text-white" style="background: darkblue ;">
                        <h3 class="font-bold ">Noms complet: {{$register->user->name." ".$register->user->lastName}} </h3>
                        <h5 class="font-bold ">Genre : {{$register->user->sex}}</h5>
                        <h5 class="text-right">Statut : <span class="rounded-sm p-1 bg-{{$register->promotion->dateEnd <=  date('Y/m/d')?'success':'danger'}}"> {{$register->promotion->dateEnd <=  date('Y/m/d') ?'Actif':'Inactif'}} </span></h5>
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="mb-1 border p-2">Index number : <span class="title"> {{$register->index}}</span> </h5>
                        <h5 class="mb-1 border p-2">Date d'inscription : <span class="font-bold">{{ $register->user->created_at->format('d.M.Y H:i') }}</span> </h5>
                        <h5 class="mb-1 border p-2">Extension :  <span class="font-bold">{{$register->promotion->extension->designation}} </span></h5>
                        <h5 class="mb-1 border p-2">Departement :  <span class="font-bold">{{$register->promotion->departement->title}}</span> </h5>
                        <h5 class="mb-1 border p-2">promotion : <span class="font-bold"> {{$register->promotion->designation}} </span></h5>
                        <h5 class="mb-1 border p-2">Vacation : <span class="font-bold"> {{$register->vacation}} </span></h5>
                        <h5 class="mb-1 border p-2">Phone number :  <span class="font-bold"> {{$register->user->phone}}</span></h5>
                        <h5 class="mb-1 border p-2">Email :  <span class="font-bold"> {{$register->user->email}}</span> </h5>
                        <h5 class="mb-1 border p-2">Adresse :  <span class="font-bold">  {{$register->user->adress}}</span></h5>
                        <h3 class="font-bold"> Responsable</h3>
                        <h5 class="mb-1 border p-2"> Noms :  <span class="font-bold"> {{$register->respoName}}</span></h5>
                        <h5 class="mb-1 border p-2"> Phone number :  <span class="font-bold">{{$register->respoNumber}}</span></h5>


                    </div>
                </div>
                <!-- /.widget-user -->
            </div>

        </div>
        <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->

{{-- NAVIGATION MODAL   EDIT REGISTER--}}
<div class="modal fade" id="editregister">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-500 p-2">
            <div class="">
                <div class="card-header">
                    <div class="user-block">
                        <h3 class="">Modifier cette inscription</h3>
                    </div>

                </div>
                <!-- /.card-header -->
                <form action="{{route('register.update', $register)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$register->user->id}}">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Promotion <span class="required"> *</span> </label>
                                    <select name="promotion_id" id="" class="form-control" value="{{old('promotion_id')}}">
                                        <option>---Choisir une promotion--</option>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Index number <span class="required"> *</span></label>
                            <input type="text" class="form-control" name="index" value="{{old('index')}}">
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Vacation <span class="required"> *</span> </label>
                                    <input type="text" class="form-control" name="vacation" value="{{old('vacation')}}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Responsable </label>
                                    <input type="text" class="form-control" name="respoName" value="{{old('respoName')}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Contact </label>
                                    <input type="text" class="form-control" name="respoNumber" value="{{old('respoNumber')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer -->
                    <div class="m-3 flex justify-between">
                        <button type="submit" class="bg-blue p-2">Valider</button>
                        <span class="required ml-auto"> * sont obligatoires </span>
                    </div>
                </form>
                <!-- /.card-footer -->
            </div>



        </div>
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- NAVIGATION MODAL   EDIT REGISTER--}}



<!-- {{--DELETE REGISTER  --}} -->
<div class="modal fade" id="deleteregister" style="top:30%">
    <div class="modal-dialog modal-md">
        <div class="modal-dialog modal-sm">
            <div class="modal-content  border-t-2 border-t-blue-400 p-6">
                <h1 class=" p-2 font-semibold border-b">Voulez-vous supprimer ?</h1>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="mt-3">
                    <a href="" class="bg-blue  text-white p-2"><i class="fa-solid fa-check"></i> Oui</a>
                    <button type="button" class="bg-red p-1 ml-2 text-white" data-dismiss="modal"><i class="fa-solid fa-x"></i> Non</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- REGISTER -->





@endsection