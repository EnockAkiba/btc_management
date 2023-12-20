@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('applay') }}">Mes devoirs</a></li>
                    <li class="breadcrumb-item active"> Remettre le devoir</li>
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
            <div class="col-md-5">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->

                    <div class="p-4">
                        <h5 class="mb-3">Promotion : <span class="title">{{$quiz->promotion->designation}}</span> </h5>
                        <h5 class="mb-3">Teacher : <span class="title">{{$quiz->teacher->user->name}}</span> </h5>
                        <h5 class="mb-3">Date d'envoie : <span class="text-red-400">{{ date_format(date_create($quiz->dateBigin) ,'d.M.Y H:i')}}</span> </h5>
                        <h5 class="mb-3">Date finale : <span class="text-red-400">{{ date_format(date_create($quiz->dateEnd) ,'d.M.Y H:i')}}</span> </h5>
                       @if($quiz->content)
                        <h5 class="mb-1 text-lg font-bold"> Contenue :</h5>
                        <p class="border p-2 mb-2" style="min-height: 130px; max-height: 330px; overflow: auto;">
                        {{$quiz->content}}
                    </p>
                        @elseif($quiz->file)
                        <h5 class="mb-1  flex justify-between">
                            <span class="p-2 bg-blue-400 text-white"><a href="{{asset('/',$quiz->file)}}">Ouvrir le fichier</a></span>
                        </h5>
                        @endif
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>

            <div class="card col-md-7 col-sm-6">
                <div class="card-header">
                    <div class="user-block">
                        <h3 class="font-bold">Veuilez repondre soit en ecrivant ou envoyez un fichier pdf/doc</h3>
                    </div>

                </div>
                <!-- /.card-header -->
                <form action="{{route('applay.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" px-4">
                        <div class="form-group">
                            <input type="hidden" value="{{$quiz->id}}" class="form-control" name="quiz_id">
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