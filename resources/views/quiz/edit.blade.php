@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('quiz') }}">Les devoirs</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content" style="overflow: auto; height:80vh">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto border bg-white">
                <h2 class=" font-bold text-center my-2"></h2>
                <!-- /.card-header -->
                <form action="{{route('quiz.update', $quiz)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Promotion <span class="required"> *</span> </label>
                                    <select name="promotion_id" id="" class="form-control">
                                        <option value="{{$quiz->promotion_id}}">---Choisir une promotion--</option>
                                        @foreach($promotions as $promotion)
                                        <option value="{{$promotion->id}}">{{$promotion->designation." De :".$promotion->extension->designation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Attachez un fichier pdf/doc</label>
                                    <input type="file" class="form-control" name="file" accept="pdf/doc" value="{{$quiz->file}}">
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Date d'envoie du devoir <span class="required"> *</span> </label>
                                    <input type="datetime-local" name="dateBigin" id="" class="form-control" value="{{$quiz->dateBigin}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Date finale <span class="required"> *</span> </label>
                                    <input type="datetime-local" name="dateEnd" id="" class="form-control" value="{{$quiz->dateEnd}}">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Contenues<span class="required"> *</span></label>
                            <textarea name="content" id="" cols="30" rows="5" class="form-control">
                            {{$quiz->content}}
                            </textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer -->
                    <div class="m-3 flex justify-between">
                        <button type="submit" class="btn-valid">Valider</button>
                        <span class="required ml-auto"> * sont obligatoires </span>
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