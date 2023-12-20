@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('quiz') }}">Les devoirs</a></li>
                    <li class="breadcrumb-item active"> Voir le detail du devoir soumit</li>
                </ol>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-md-4">
                <!-- Box Comment -->
                <div class="card card-widget">
                    <div class="card-header">
                        <div class="user-block">
                            <h3 class="text-primary">Devoir</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- Widget: user widget style 1 -->
                    <div class="p-4">
                        <h5 class="mb-3">Promotion : <span class="title">{{$quiz->promotion->designation}}</span> </h5>
                        <h5 class="mb-3">Teacher : <span class="title">{{$quiz->teacher->user->name}}</span> </h5>
                        <h5 class="mb-3">Date d'envoie : <span class="text-red-400">{{ date_format(date_create($quiz->dateBigin) ,'d.M.Y H:i')}}</span> </h5>
                        <h5 class="mb-3">Date finale : <span class="text-red-400">{{ date_format(date_create($quiz->dateEnd) ,'d.M.Y H:i')}}</span> </h5>
                        @if($quiz->content)
                        <h5>Contenue :</h5>

                        <p class="border p-2">
                            {{$quiz->content}}
                        </p>
                        @endif
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-8 ">
                <div class="bg-white card-header">
                    <div class="flex justify-between items-center">
                        <h2 class="title">Les apprenants qui ont remis</h2>

                    </div>
                </div>
                <div class="card overflow-auto mt-1 py-0" style="min-height:auto; max-height: 76vh; overflow:auto">
                    <table class="table table-hover">
                        <thead class="bg-dark">
                            <th>#</th>
                            <th>Noms </th>
                            <th>Contenu</th>
                            <th>fichier</th>
                            <th>Date de remit</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td><a href="{" class="text-blue-500">Paul</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->

@endsection