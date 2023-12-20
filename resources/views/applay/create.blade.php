@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="my-3 p-0 ">
    <div class="ml-auto">
        <ol class="flex">
            <li class="mx-1 px-1 border rounded-md shadow-md hover:bg-blue-700"><a href="{{ route('extension') }}" class="hover:text-white"><i class="fa fa-plus-circle"></i> Extension</a></li>
            <li class="mx-1 px-1 border rounded-md shadow-md hover:bg-blue-700"><a href="{{route('departement')}}" class="hover:text-white"><i class="fa fa-plus-circle"></i> Departement</a> </li>
            <li class="mx-1 px-1 border rounded-md shadow-md hover:bg-blue-700"><a href="{{route('promotion')}}" class="hover:text-white"> <i class="fa fa-plus-circle"></i> Promotioin</a></li>
        </ol>
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
                        <h3 class="widget-user-username">Alexander Pierce</h3>
                        <h5 class="widget-user-desc">Founder & CEO</h5>
                    </div>
                    <div class="widget-user-image">
                        <img src="{{ asset('/' . Auth::user()->picture) }}" class="rounded-full mx-2" style="width:40px; height:40px">
                    </div>
                    <div class="p-4">
                        <h5 class="mb-1">Titre : <span class="title">blabla</span> </h5>
                        <h5 class="mb-1">Date d'envoie : <span class="text-red-400">{{ date('d.M.Y H:i') }}</span> </h5>
                        <h5 class="mb-1">Date finale : <span class="text-red-400">{{ date('d.M.Y H:i') }}</span> </h5>
                        <h5 class="mb-1 text-lg font-bold"> Question :</h5>
                        <p class="border p-2 mb-2" style="min-height: 130px; max-height: 330px; overflow: auto;">nventore sed cupiditate cum libero quis delectus, quia alias, odio placeat eum fugit quibusdam aliquam magni modi.
                        </p>
                        <h5 class="mb-1  flex justify-between">
                            <span class="p-2 bg-blue-400 text-white"><a href="{{route('applay.create')}}">Ouvrir le fichier</a></span>
                        </h5>

                    </div>
                </div>
                <!-- /.widget-user -->
            </div>

            <div class="card col-md-7 col-sm-6">
                <div class="card-header">
                    <div class="user-block">
                        <h3 class="text-green-500">Veuilez repondre soit en ecrivant ou envoyez un fichier pdf/doc</h3>
                    </div>

                </div>
                <!-- /.card-header -->
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="quiz_id">
                        </div>
                        <div class="form-group">
                            <label for="">Attachez un fichier pdf/doc <span class="required"> </span></label>
                            <input type="file" class="form-control" name="file">
                        </div>

                        <div class="form-group">
                            <label for="">Ecrire votre réponse ici <span class="required"> </span></label>
                            <textarea name="content" id="" cols="30" rows="13" class="form-control">
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
        <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->






@endsection