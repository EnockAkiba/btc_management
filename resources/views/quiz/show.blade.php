@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('news') }}">Accueil</a></li>
                        <li class="breadcrumb-item title"><a href="{{ route('quiz') }}">Les devoirs</a></li>
                        <li class="breadcrumb-item active"> Devoir title</li>
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
                <div class="col-md-6" style="max-height: 80vh; overflow:auto">
                    <!-- Box Comment -->

                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">
                                <h3 class="text-green-500">Devoir</h3>
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
                                <div class="flex">
                                    <span class="required mx-2"> * sont obligatoire </span>
                                    <a class=" text-red-600" data-toggle="modal" data-target="#deleteQuiz"
                                        href="#" role="button"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="card col-md-6 " style="max-height: 80vh; overflow:auto">
                    <div class="card-header">
                        <div class="flex justify-between items-center">
                            <h2 class="title">Les apprenants qui ont remis</h2>

                        </div>
                    </div>
                    <div class=" overflow-auto mt-1 py-0">
                        <table class="table table-hover">
                            <thead class="bg-green-100">
                                <th>#</th>
                                <th>Noms </th>
                                <th>Contenu</th>
                                <th>fichier</th>
                                <th>Date de remit</th>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section><!-- /.container-fluid -->
    <!-- /.content -->


    {{-- DELETE Comment  --}}

    <div class="modal fade" id="deleteQuiz" style="top:40%">
        <div class="modal-dialog modal-sm">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-3">
                <h1 class=" p-2 text-green border-b">Voulez-vous supprimer ?</h1>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="mt-3">
                    <a href="" class="bg-blue-300  text-white p-2"><i class="fa-solid fa-check"></i> Oui</a>
                    <button type="button" class="bg-red-400 p-1 ml-2 text-white" data-dismiss="modal"><i
                            class="fa-solid fa-x"></i> Non</button>
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- DELETE modal -->
@endsection
