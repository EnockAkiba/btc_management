@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('extension') }}">Extensions</a></li>
                    <li class="breadcrumb-item active"> {{$extension->designation}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <div class="widget-user-header bg-blue">
                        <h3 class="widget-user-username">{{$extension->designation}} </h3>
                        <h5 class="widget-user-desc mt-2">Extension</h5>
                    </div>

                    <div class="p-4">
                       
                        <h5 class="mb-1  flex justify-between">
                            <a class="bg-blue-400 text-white p-2" data-toggle="modal" data-target="#editExtension" href="#" role="button">Modifier
                            </a>
                            <a class="bg-red-400 text-white p-2" data-toggle="modal" data-target="#deleteExtension" href="#" role="button"><i class="fa fa-trash"></i>
                            </a>
                        </h5>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>


        </div>
        <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->

<!-- {{--EDIT Extension  --}} -->
<div class="modal fade" id="editExtension">
    <div class="modal-dialog modal-md">
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-500 p-2">
            <div class="">
                <div class="card-header">
                    <div class="user-block">
                        <h3 class="font-semibold">Modifier l'extension</h3>
                    </div>

                </div>
                <!-- /.card-header -->
                <form action="{{route('extension.update', $extension)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Titre/Designation <span class="required"> *</span> </label>
                                    <input type="text" value="{{$extension->designation}}" class="form-control" name="designation">
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
                    <a href="{{route('extension.destroy', $extension)}}" class="bg-blue-300  text-white p-2"><i class="fa-solid fa-check"></i> Oui</a>
                    <button type="button" class="bg-red-400 p-1 ml-2 text-white" data-dismiss="modal"><i class="fa-solid fa-x"></i> Non</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>




@endsection