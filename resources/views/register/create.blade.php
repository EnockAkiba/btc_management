@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                    <li class="breadcrumb-item title"><a href="{{ route('register') }}">Les apprenants</a></li>
                    <li class="breadcrumb-item active"> {{$user->name." ".$user->lastName}} </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content" style="overflow: auto; height:80vh">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto border bg-white">
                <h2 class=" font-bold text-center my-2">INSCRIPTION DE : {{$user->name." ".$user->lastName}}</h2>
                <!-- /.card-header -->
                <form action="{{route('register.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Promotion <span class="required"> *</span> </label>
                                    <select name="promotion_id" id="" class="form-control"  value="{{old('promotion_id')}}">
                                        <option>---Choisir une promotion--</option>
                                        @foreach($promotions as $promotion)
                                        <option value="{{$promotion->id}}">{{$promotion->designation}}</option>
                                        @endforeach
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
                                    <input type="text" class="form-control" name="respoName"
                                        value="{{old('respoName')}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Contact </label>
                                    <input type="text" class="form-control" name="respoNumber"
                                        value="{{old('respoNumber')}}">
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
        <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->

@endsection