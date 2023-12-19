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
                                    <a class="bg-blue mx-1 rounded-sm p-1 active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#custom-tabs-one-home" role="tab"
                                        aria-controls="custom-tabs-one-home" aria-selected="true">les devoirs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="bg-blue mx-1 rounded-sm p-1" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-one-profile" role="tab"
                                        aria-controls="custom-tabs-one-profile"
                                        aria-selected="false">Devoirs remis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="bg-blue mx-1 rounded-sm p-1" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                        href="#custom-tabs-one-messages" role="tab"
                                        aria-controls="custom-tabs-one-messages"
                                        aria-selected="false">Devoirs Ratés</a>
                                </li>
                              
                            </ul>
                        </div>
                        <div class="mt-2 pb-10" style="height: 80vh; overflow:auto ">

                            <div class="tab-content" id="custom-tabs-one-tabContent">

                                {{-- news quizzes --}}
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="row">
                                        @for ($i = 1; $i < 10; $i++)
                                            <div class="col-md-3">
                                                <!-- Widget: user widget style 1 -->
                                                <div class="card card-widget widget-user">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header bg-blue-100">
                                                        <h3 class="widget-user-username">Alexander Pierce</h3>
                                                        <h5 class="widget-user-desc">Founder & CEO</h5>
                                                    </div>
                                                    <div class="widget-user-image">
                                                        <img src="{{ asset('/' . Auth::user()->picture) }}" class="rounded-full mx-2"
                                                            style="width:40px; height:40px">
                                                    </div>
                                                    <div class="p-2">
                                                        <h5 class="mb-1">Titre : <span class="title">blabla</span> </h5>
                                                        <h5 class="mb-1">Date d'envoie : <span class="text-red-400">{{ date('d.M.Y H:i') }}</span> </h5>
                                                        <h5 class="mb-1">Date finale : <span class="text-red-400">{{ date('d.M.Y H:i') }}</span> </h5>
                                                        <h5 class="mb-1  flex justify-between">
                                                            <span class="p-2 bg-blue-400 text-white"><a href="{{route('applay.create')}}">Ouvrir pour remettre</a></span>
                                                        </h5>
                                    
                                                    </div>
                                                </div>
                                                <!-- /.widget-user -->
                                            </div>
                                        @endfor
                                    
                                    
                                    </div>
                                </div>

                                {{--  quizzes  success--}}
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-profile-tab">
                                    <div class="row">
                                        @for ($i = 1; $i < 10; $i++)
                                            <div class="col-md-3">
                                                <!-- Widget: user widget style 1 -->
                                                <div class="card card-widget widget-user">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header bg-blue-100">
                                                        <h3 class="widget-user-username">Alexander Pierce</h3>
                                                        <h5 class="widget-user-desc">Founder & CEO</h5>
                                                    </div>
                                                    <div class="widget-user-image">
                                                        <img src="{{ asset('/' . Auth::user()->picture) }}" class="rounded-full mx-2"
                                                            style="width:40px; height:40px">
                                                    </div>
                                                    <div class="p-2">
                                                        <h5 class="mb-1">Titre : <span class="title">blabla</span> </h5>
                                                        <h5 class="mb-1">Date d'envoie : <span class="text-red-400">{{ date('d.M.Y H:i') }}</span> </h5>
                                                        <h5 class="mb-1">Date finale : <span class="text-red-400">{{ date('d.M.Y H:i') }}</span> </h5>
                                                        <h5 class="mb-1  flex justify-between">
                                                            <span class="p-2 bg-green-400 text-white"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> Remis</span>
                                                        </h5>
                                    
                                                    </div>
                                                </div>
                                                <!-- /.widget-user -->
                                            </div>
                                        @endfor
                                    
                                    
                                    </div>
                                </div>

                                {{-- quizzes non success --}}
                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-messages-tab">
                                    <div class="row">
                                        @for ($i = 1; $i < 10; $i++)
                                            <div class="col-md-3">
                                                <!-- Widget: user widget style 1 -->
                                                <div class="card card-widget widget-user">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header bg-blue-100">
                                                        <h3 class="widget-user-username">Alexander Pierce</h3>
                                                        <h5 class="widget-user-desc">Founder & CEO</h5>
                                                    </div>
                                                    <div class="widget-user-image">
                                                        <img src="{{ asset('/' . Auth::user()->picture) }}" class="rounded-full mx-2"
                                                            style="width:40px; height:40px">
                                                    </div>
                                                    <div class="p-2">
                                                        <h5 class="mb-1">Titre : <span class="title">blabla</span> </h5>
                                                        <h5 class="mb-1">Date d'envoie : <span class="text-red-400">{{ date('d.M.Y H:i') }}</span> </h5>
                                                        <h5 class="mb-1">Date finale : <span class="text-red-400">{{ date('d.M.Y H:i') }}</span> </h5>
                                                        <h5 class="mb-1  flex justify-between">
                                                            <span class="p-2 bg-red-400 text-white"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> Raté</span>
                                                        </h5>
                                    
                                                    </div>
                                                </div>
                                                <!-- /.widget-user -->
                                            </div>
                                        @endfor
                                    
                                    
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

    {{-- NAVIGATION MODAL  --}}

    <div class="modal fade" id="addNew">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-2">
                <div class="">
                    <div class="card-header">
                        <div class="user-block">
                            <h3 class="text-green-500">Veuilez remplir les informations du devoir</h3>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Teachers <span class="required"> *</span> </label>
                                        <select name="teacher_id" id="" class="form-control">
                                            <option>---Choisir un enseignant--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Promotion <span class="required"> *</span> </label>
                                        <select name="promotion_id" id="" class="form-control">
                                            <option>---Choisir une promotion--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Attachez un fichier pdf/doc</label>
                                <input type="file" class="form-control" name="file">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Date d'envoie du devoir <span class="required"> *</span>
                                        </label>
                                        <input type="datetime-local" name="dateBigin" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Date finale <span class="required"> *</span> </label>
                                        <input type="datetime-local" name="dateEnd" id="" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Contenues<span class="required"> *</span></label>
                                <textarea name="content" id="" cols="30" rows="5" class="form-control">
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
@endsection



