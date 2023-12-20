@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item active"> Mes devoirs</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content mt-0">
    <div class="container-fluid mt-0">
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <div class="card-tabs border-none">
                    <div class="p-0 border-none">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="bg-blue mx-1 rounded-sm p-1 active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">les devoirs</a>
                            </li>
                            <li class="nav-item">
                                <a class="bg-blue mx-1 rounded-sm p-1" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Devoirs remis</a>
                            </li>
                            <li class="nav-item">
                                <a class="bg-blue mx-1 rounded-sm p-1" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Devoirs Ratés</a>
                            </li>

                        </ul>
                    </div>
                    <div class="mt-2 pb-10" style="height: 80vh; overflow:auto ">

                        <div class="tab-content" id="custom-tabs-one-tabContent">

                            {{-- news quizzes --}}
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <div class="row">
                                    @foreach ($quizCurrents as $quizCurrent)
                                    <div class="col-md-3">
                                        <!-- Widget: user widget style 1 -->
                                        <div class="">
                                            <div class="rounded-lg shadow-md m-3 p-2 border bg-white">
                                                <h5 class="mb-3">Promotion : <span class="title">{{$quizCurrent->promotion->designation}}</span> </h5>
                                                <h5 class="mb-3">Teacher : <span class="title">{{$quizCurrent->teacher->user->name}}</span> </h5>
                                                <h5 class="mb-3">Date d'envoie : <span class="text-red-400">{{ date_format(date_create($quizCurrent->dateBigin) ,'d.M.Y H:i')}}</span> </h5>
                                                <h5 class="mb-3">Date finale : <span class="text-red-400">{{ date_format(date_create($quizCurrent->dateEnd) ,'d.M.Y H:i')}}</span> </h5>
                                                <h5 class="mb-3  flex justify-between">
                                                    <span class="p-2 bg-blue mx-auto"><a href="{{route('applay.create', $quizCurrent)}}">Ouvrir pour remettre</a></span>
                                                </h5>

                                            </div>
                                        </div>
                                        <!-- /.widget-user -->
                                    </div>
                                    @endforeach


                                </div>
                            </div>

                            {{-- quizzes  success--}}
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <div class="row">
                                    @foreach ($applays as $applay)
                                    <div class="col-md-3">
                                        <!-- Widget: user widget style 1 -->
                                        <div class="">
                                            <div class="rounded-lg shadow-md m-3 p-2 border bg-white">
                                                <h5 class="mb-3">Promotion : <span class="title">{{$applay->promotion->designation}}</span> </h5>
                                                <h5 class="mb-3">Teacher : <span class="title">{{$applay->teacher->user->name}}</span> </h5>
                                                <h5 class="mb-3">Date d'envoie : <span class="text-red-400">{{ date_format(date_create($applay->dateBigin) ,'d.M.Y H:i')}}</span> </h5>
                                                <h5 class="mb-3">Date finale : <span class="text-red-400">{{ date_format(date_create($applay->dateEnd) ,'d.M.Y H:i')}}</span> </h5>
                                                <h5 class="mb-1  flex justify-between">
                                                    <span class="p-2 bg-success"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> Remis</span>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- /.widget-user -->
                                    </div>
                                    @endforeach


                                </div>
                            </div>

                            {{-- quizzes non success --}}
                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                <div class="row">
                                    @foreach ($quizLoses as $quizLose)
                                    <div class="col-md-3">
                                        <!-- Widget: user widget style 1 -->
                                        <div class="">
                                            <div class="rounded-lg shadow-md m-3 p-2 border bg-white">
                                                <h5 class="mb-3">Promotion : <span class="title">{{$applay->promotion->designation}}</span> </h5>
                                                <h5 class="mb-3">Teacher : <span class="title">{{$applay->teacher->user->name}}</span> </h5>
                                                <h5 class="mb-3">Date d'envoie : <span class="text-red-400">{{ date_format(date_create($applay->dateBigin) ,'d.M.Y H:i')}}</span> </h5>
                                                <h5 class="mb-3">Date finale : <span class="text-red-400">{{ date_format(date_create($applay->dateEnd) ,'d.M.Y H:i')}}</span> </h5>
                                                <h5 class="mb-1  flex justify-between">
                                                    <span class="p-2 bg-red-400 text-white"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> Raté</span>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- /.widget-user -->
                                    </div>
                                    @endforeach


                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->


@endsection