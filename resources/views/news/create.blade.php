@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                    <li class="breadcrumb-item active"> Ajouter une actualité</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content " style="max-height: 80vh; overflow:auto">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 " style="max-height: 80vh; overflow:auto">
                <div class="content">
                    <div class="bg-whiterounded-md">
                        <div class=" flex items-center justify-between">
                            <h2 class="title px-2 py-1 ">Les actualités</h2>
                            <a class="bg-blue-400 text-white p-2 ml-auto rounded-sm" data-toggle="modal" data-target="#addNew" href="#" role="button">Add News
                            </a>
                        </div>
                    </div>
                    <div class="bg-white overflow-auto mt-2 p-0">
                        <table class="table table-hover">
                            <thead class="bg-green-100">
                                <th>#</th>
                                <th>titre d'actualité</th>
                                <th>Date</th>
                                <th>Type</th>
                            </thead>
                            <tbody>

                                <tr>
                                    @foreach ($news as $new)

                                    <td>{{$loop->index +1}}</td>
                                    <td> <a href="{{route('news.edit', $new)}}" class="text-blue-800">{{$new->title}} </a></td>
                                    <td class="text-sm">{{$new->created_at->format('d.M.Y H:i')}}</td>
                                    <td> <span class="{{$new->type==0?'bg-red-400': 'bg-blue-300'}}  text-white py-2 px-1 rounded-sm date">{{$new->type==0?'private': 'Public'}}</span></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




{{-- NAVIGATION MODAL  --}}

<div class="modal fade" id="addNew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-2">
            <div class="">
                <div class="card-header">
                    <div class="user-block">
                        <h3 class="text-green-500">Veuilez remplir les informations d'actualité</h3>
                    </div>

                </div>
                <!-- /.card-header -->
                <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Titre <span class="required"> *</span> </label>
                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="">Photo <span class="required"> *</span></label>
                            <input type="file" class="form-control" name="picture" value="{{old('picture')}}">
                        </div>
                        <div class="form-group">
                            <label for="">video</label>
                            <input type="file" class="form-control" name="video" value="{{old('video')}}">
                        </div>


                        <div class="form-group">
                            <label for="">Description <span class="required"> *</span></label>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control">
                            {{old('description')}}
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



{{-- IMAGES MODAL  --}}

<div class="modal fade" id="media">
    <div class="modal-dialog modal-md">
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-3">
            <div class="flex justify-between items-center">
                <h3 class="card-title text-orange"><a href="" class="brand-link">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image ">
                        <span class="title">BTC/AGAPD </span>
                    </a>
                </h3>
                <button type="button" class="text-green-500 p-2 ml-auto border rounded-md" data-dismiss="modal"><i class="fa-solid fa-x"></i>Fermer</button>
            </div>

            <!-- /.card-header -->
            <!-- form start -->
            <h2 class="title-blue mb-3 text-center border-bottom">Les images de l'actualité</h2>
            <div class="row mt-2">
                @for ($i = 0; $i < 10; $i++) <div class="col-12 mb-2">
                    <img class="img-fluid pad" src="{{ asset('admin/images/photo2.png') }}" alt="Photo">
            </div>
            @endfor
        </div>
    </div>
</div>
<!-- /.modal-dialog -->
</div>
<!-- IMAGES MODAL-->




@endsection