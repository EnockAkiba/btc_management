@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                    <li class="breadcrumb-item active"> {{ $news->title }}</li>
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
                            <img class="img-circle" src="{{ asset('/' . $news->user->picture) }}" alt="User Image">
                            <span class="username"><a href="#">{{ $news->user->name }}</a></span>
                            <span class="description"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-green-500"> {{ $news->created_at->format('d.M.Y H:i') }} </span> </span>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($news->video)
                        <video src="{{ asset('/') . $news->video }}" controls></video>
                        @endif
                        @if ($news->picture)
                        <img src="{{ asset('/' . $news->picture) }}" class="img-fluid bg-black mb-3" alt="..." style="max-height: 340px; width:100%;object-fit: fill;">
                        @endif
                        {{-- <img class="img-fluid pad" src="{{ asset('admin/images/photo2.png') }}" alt="Photo"> --}}
                        {{-- <a class="text-blue-500 d-lg-none d-md-none" data-toggle="modal" data-target="#media"
                                href="#" role="button">
                                <i class="fa fa-image" aria-hidden="true"></i> Voir plus d'image
                            </a> --}}

                        <!-- Carousel wrapper -->
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="..." alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="..." alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="..." alt="Third slide">
                                </div>
                            </div>
                        </div>
                        <!-- Carousel wrapper -->

                        <div class="liker flex justify-end ">
                            <span class="loved">
                                {{ count($news->like) }} <i class="fa fa-heart text-red-600" aria-hidden="true"></i>
                            </span>
                            <span class="comment mx-2">
                                {{ count($news->comment) }} <i class=" fa fa-comment text-green-400" aria-hidden="true"></i>
                            </span>
                        </div>

                        <p>{{ $news->description }}</p>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer -->
                    <div class="bg-green-100 p-2" id="formSend">
                        <form action="{{ route('comment.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <div class="flex w-full items-center">
                                    <div class="">
                                        <label for="img-input" id="photoShow" class="mx-2">
                                            <img class="rounded-3xl shadow-sm " src="" style="max-height: 40px; max-width:40px" id='file-preview'>
                                            <i class="fa fa-image" id="icone"></i> </label>
                                        <input type="file" class="d-none" name="picture" accept="image/*" id="img-input" onchange="showFile(event)">
                                    </div>
                                    <input type="text" name="content" placeholder="Laissez un commentaire" class="form-control w-full">
                                    <span class="input-group-append">
                                        <input type="hidden" value="{{ $news->id }}" name="news_id">
                                        <button type="submit" class="p-1 bg-blue-600 text-white mx-1">Send</button>
                                    </span>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <div class="card col-md-6 " style="max-height: 80vh; overflow:auto">
                <div class="card-header">
                    <div class="user-block">
                        <div class="flex justify-between items-start">
                            <h5 class="mb-3 text-green-400">Commentaires</h5>
                        </div>
                    </div>

                </div>
                <div class="w-full">
                    <div class="px-4 card-comments bg-white">
                        @foreach ($news->comment as $comment)
                        <div class="card-comment mt-2">
                            <!-- User image -->

                            <div class="flex justify-between items-center">
                                <div class="image">
                                    <img class="img-circle img-sm" src="{{ asset('/' . $comment->user->picture) }}" alt="user">
                                    <span class="username">
                                        {{ $comment->user->name }}
                                        <span class="text-muted float-right"></span>
                                    </span>

                                </div>


                                @if (Auth::user()->id === $comment->user->id)
                                <a class=" text-green-400" data-toggle="modal" data-target="#deleteComment" href="#" role="button"> <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                @endif
                            </div>


                            <div class="comment-text  text-black">
                                <!-- /.username -->
                                {{ $comment->content }}
                                @if ($comment->picture)
                                <a href="{{ asset('/' . $comment->picture) }}">
                                    <img src="{{ asset('/' . $comment->picture) }}" alt="" class=" rounded-md" style="min-height:250px; min-width:100%; object-fit:contain"></a>
                                @endif

                            </div>
                            <p class=" font-semibold text-right text-sm"> {{$comment->created_at->format('d.M.Y H:i')}}</p>
                            <!-- /.comment-text -->

                        </div>

                        {{-- DELETE Comment  --}}

                        <div class="modal fade" id="deleteComment" style="top:40%">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-3">
                                    <h1 class=" p-2 text-green border-b">Voulez-vous supprimer ?</h1>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="mt-3">
                                        <a href="{{route('comment.destroy', $comment)}}" class="bg-blue-300  text-white p-2"><i class="fa-solid fa-check"></i> Oui</a>
                                        <button type="button" class="bg-red-400 p-1 ml-2 text-white" data-dismiss="modal"><i class="fa-solid fa-x"></i> Non</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- DELETE modal -->
                        @endforeach

                        <!-- /.card-comment -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</section><!-- /.container-fluid -->
<!-- /.content -->


{{-- IMAGES MODAL  --}}

{{-- <div class="modal fade" id="media">
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
</div> --}}
<!-- IMAGES MODAL-->

<script>
    function showFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById("file-preview");
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
        $('#icone').addClass('d-none');
    }
</script>
@endsection