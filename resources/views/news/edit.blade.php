@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="mt-7 content" style="overflow: auto; height:86vh">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <!-- Box Comment -->
                <div class="rounded-md card p-0">
                    <div class="card-header">
                        <div class="user-block">
                            <h3 class="text-blue-500"><a href="{{route('news.create')}}" class="text-green-400 me-5"> <i class="fa fa-back"></i>Retour </a>  modifier cette actualité</h3>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <form action="{{route('news.update', $news)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="p-4">
                            <div class="form-group">
                                <label for="">Titre </label>
                                <input type="text" class="form-control" name="title" value="{{$news->title}}">
                            </div>
                            <div class="form-group">
                                <label for="">Photo </label>
                                <input type="file" class="form-control" name="picture">
                                <input type="hidden" name="pictureOld" value="{{$news->picture}}">
                            </div>
                            <div class="form-group">
                                <label for="">video</label>
                                <input type="file" class="form-control" name="video">
                                <input type="hidden" name="videoOld" value="{{$news->video}}">
                            </div>


                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control">
                                {{$news->description}}
                                </textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->
                        <div class="p-4 flex justify-between items-center">
                            <button type="submit" class="btn-valid"> Valider</button>
                            <span class="required ml-auto p-2" data-toggle="modal" data-target="#delete" href="#" role="button"> <i class="fa fa-trash text-red" aria-hidden="true"></i> </span>
                        </div>
                    </form>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-5">
                <div class="rounded-md card">
                    <div class="card-header">
                        <div class="flex justify-between items-center">
                            <h2 class="title">Les images d'actualité</h2>
                            <span class="" data-toggle="modal" data-target="#addImage" href="#" role="button"> <span class="bg-blue-400 text-white px-1 py-1 text-sm"> <i class="fa fa-plus"></i> images </span> </span>

                        </div>
                    </div>
                    <div class="card-body mt-1 py-0">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" style="height: 330px;">
                                @for ($i = 0; $i < 8; $i++)
                             <div class="carousel-item active image">
                                    <img src="{{ asset('admin/images/photo2.png') }}" class="d-block w-100" alt="Image 3">
                                    <a href="" class="icone rounded-full shadow-lg"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                            @endfor

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </div>
                    <!-- Carousel wrapper -->
                    <!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @for ($i = 0; $i < 8; $i++) 
                                    <div class="carousel-item active">
                                        <div class="mb-2 image">
                                            <a href="{{ asset('admin/images/photo2.png') }}"> <img class="img-fluid pad" src="{{ asset('admin/images/photo2.png') }}" alt="Photo"></a>
                                            <a href="" class="icone rounded-full shadow-lg"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div>
                                @endfor
                            </div> -->

                </div>
            </div>

        </div>

    </div>
    </div>
    <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->


{{-- DETETE MODAL  --}}

<div class="modal fade" id="delete" style="top:30%">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-3">
            <div class="p-3">
                <h3 class="text-center"><i class="fa fa-question bg-black p-3 rounded-full" aria-hidden="true"></i></h3>
                <h3 class="title mb-4"> Voulez-vous supprimer cette
                    actualité ?</h3>
                <a href="{{route('news.destroy', $news)}}" class="bg-red-500 p-2 me-2 border rounded-sm text-white">Confirmer</a>
                <button type="button" class="text-green-500 p-2 ml-auto border rounded-sm" data-dismiss="modal"><i class="fa-solid fa-x"></i>Non</button>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- DETETE MODAL-->


{{-- ADD IMAGE MODAL  --}}

<div class="modal fade" id="addImage">
    <div class="modal-dialog modal-md">
        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-3">
            <div class="p-3">
                <h3 class="title mb-4">Ajouter des images</h3>
                <p>
                    vous pouvez choisir ou sélectionner au maximum 10 par click
                </p>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="images[]" id="" class="form-control my-3">
                    <button class="bg-green-400 p-2" type="submit">Valider</button>
                    <button type="button" class="bg-red-500 p-2 text-white ml-3" data-dismiss="modal"><i class="fa-solid fa-x"></i>fermer</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- DETETE MODAL-->
@endsection