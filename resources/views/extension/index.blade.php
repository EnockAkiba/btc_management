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

            <div class="col-md-6 p-0">
                <div class="card">
                    <div class="card-header">
                        <div class=" flex items-center justify-between">
                            <h2 class="title">Les Extensions</h2>
                            <a class="bg-blue-400 text-white p-2 ml-auto" data-toggle="modal" data-target="#addNew" href="#" role="button">Ajouter extension
                            </a>
                        </div>
                    </div>
                    <div class=" overflow-auto mt-1 py-0">
                        <table class="table table-hover">
                            <thead class="bg-green-100">
                                <th>#</th>
                                <th>Designation de l'extension</th>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($extensions as $extension)
                                    <td>{{$loop->index+1}}</td>
                                    <td> <a href="{{route('extension.show', $extension)}}">{{$extension->designation}}</a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-md-5 p-0 mx-5">
                <div class="card">
                    <div class="card-header">
                        <div class=" flex items-center justify-between">
                            <h2 class="title">Les promotions encours</h2>
                        </div>
                    </div>
                    <div class="mt-3 p-2">
                        @for($i=1;$i<10;$i++) <p class="my-2"> English l1B</p>
                            <hr>
                            @endfor
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->

{{-- NAVIGATION MODAL  --}}

<div class="modal fade" id="addNew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-400 p-2">
            <div class="">
                <div class="card-header">
                    <div class="user-block">
                        <h3 class=" font-semibold">Veuilez remplir les informations </h3>
                    </div>

                </div>
                <!-- /.card-header -->
                <form action="{{route('extension.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Designation de l'extension <span class="required">*</span></label>
                            <input type="text" class="form-control" name="designation">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer -->
                    <div class="m-3 flex justify-between">
                        <button type="submit" class="p-2 bg-blue-500 text-white">Valider</button>
                        <span class="required ml-auto"> * est obligatoire </span>
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