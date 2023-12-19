@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                        <li class="breadcrumb-item active"> Ajouter un devoir</li>
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
               
                <div class="card col-md-12 p-0" style="max-height: 80vh; overflow:auto">
                    <div class="p-0">
                        <div class=" flex items-center justify-between">
                            <h2 class="title mx-3">Les devoirs</h2>
                            <a class="bg-blue text-white p-1 ml-auto" data-toggle="modal" data-target="#addNew" href="#"
                            role="button">Add Devoir
                            </a>
                        </div>
                    </div>
                    <div class=" overflow-auto mt-1 py-0">
                        <table class="table table-hover">
                            <thead class="bg-blue-900 text-white">
                                <th>#</th>
                                <th>Fichier/pdf</th>
                                <th>promotion </th>
                                <th>Extension</th>
                                <th>Contenue</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($quizzes as $quizze)

                                    <th>{{$loop->index +1}}</th>
                                    <th>
                                        @if($quizze->file)
                                        <a href="{{asset('/'.$quizze->file)}}">Ouvrir</a>
                                        @else
                                        <span class="bg-info p-1">Null</span>
                                        @endif
                                    </th>
                                    <th>{{$quizze->promotion->designation}}</th>
                                    <th>{{$quizze->promotion->extension->designation}}</th>
                                    <th> <a href="{{route('quiz.show', $quizze)}}">{{($quizze->content)? substr($quizze->content,0,10):'Null'}}</a> </th>
                                    <th>{{ date_format(date_create($quizze->dateBigin) ,'d.M.Y H:i')}}</th>
                                    <th>{{ date_format(date_create($quizze->dateEnd) ,'d.M.Y H:i')}}</th>
                                    <th>
                                        <a href="{{route('quiz.edit', $quizze)}}" class="text-info mx-2"><i class="fa fa-edit"></i> </a>
                                        <a href="{{route('quiz.destroy', $quizze)}}" class="text-red"><i class="fa fa-trash"></i> </a>
                                    </th>
                                    
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-end">
                            <div class="ml-auto">
                                {{$quizzes->links()}}
                            </div>
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
                <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-500 p-2">
                    <div class="">
                        <div class="card-header">
                            <div class="user-block">
                                <h3 class="text-green-500">Veuilez remplir les informations du devoir</h3>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <form action="{{route('quiz.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Promotion <span class="required"> *</span> </label>
                                            <select name="promotion_id" id="" class="form-control">
                                                <option >---Choisir une promotion--</option>
                                                @foreach($promotions as $promotion)
                                                <option value="{{$promotion->id}}">{{$promotion->designation." De :".$promotion->extension->designation}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="">Attachez un fichier pdf/doc</label>
                                    <input type="file" class="form-control" name="file" accept="pdf/doc">
                                </div>
                               
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Date d'envoie du devoir <span class="required"> *</span> </label>
                                            <input type="datetime-local" name="dateBigin" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Date finale  <span class="required"> *</span> </label>
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


    {{-- IMAGES MODAL  --}}

    {{-- <div class="modal fade" id="media">
        <div class="modal-dialog modal-md">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-400 p-3">
                <div class="flex justify-between items-center">
                    <h3 class="card-title text-orange"><a href="" class="brand-link">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image ">
                            <span class="title">BTC/AGAPD </span>
                        </a>
                    </h3>
                    <button type="button" class="text-green-500 p-2 ml-auto border rounded-md" data-dismiss="modal"><i
                            class="fa-solid fa-x"></i>Fermer</button>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <h2 class="title-blue mb-3 text-center border-bottom">Les images de l'actualité</h2>
                <div class="row mt-2">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="col-12 mb-2">
                            <img class="img-fluid pad" src="{{ asset('admin/images/photo2.png') }}" alt="Photo">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div> --}}
    <!-- IMAGES MODAL-->


    
  
@endsection
