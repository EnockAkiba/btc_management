@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="mt-7 content" style="overflow: auto; height:86vh">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="card p-3">
                    <div class="header">
                        <h2 class="text-md font-semibold mb-3 mx-2">{{ $news->title}}</h2>
                        <hr>

                        <div class="my-3 ml-2 pe-3 flex justify-between items-center" style="height: 44px; width:100%">
                            <div class="flex items-center">
                                <img class="img-circle" style="height: 44px;" src="{{ asset('/' . $news->user->picture) }}" alt="User Image">
                                <span class="text-sm mx-2"><a href="#">{{ $news->user->name }}</a></span>
                            </div>
                            <span class="mx-2 text-blue-500 text-sm"> <i class="fa fa-calendar text-gray-200"></i> Publiee' {{ $news->created_at->format('d.M.Y H:i') }} </span>
                        </div>
                        <p class="text-muted my-7">
                            {{ $news->description}} <a href="{{ route('news.show', $news) }}" class="text-blue-400">Lire plus</a>
                        </p>
                    </div>

                    <div class="md:p-4 sm:p-2 rounded-md mb-2" style="max-height: 430px;">
                        @if ($news->video)
                        <video class="rounded-lg" src="{{ asset('/videos/news/Vid652a6538973954.44074558.mp4')}}" controls style="max-height: 430px;width:100%"></video>
                        @endif
                        @if ($news->picture)
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" style="max-height: 430px;">
                                @for ($i = 0; $i < 8; $i++) <div class="carousel-item active rounded-md">
                                    <img src="{{ asset('/' . $news->picture) }}" class="d-block w-100 rounded-md" style="max-height: 430px; width:100% ;">
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

                    @endif
                </div>

                <div class="flex justify-between items-center my-6">
                    <h2 class="text-md"><i class="fa fa-comment text-green-500"></i> 12 Commentaires</h2>
                </div>
                <div class="w-full">
                    <div class="px-4">
                        @foreach ($news->comment as $comment)
                        <div class="card-comment mt-2 ">
                            <!-- User image -->

                            <div class="flex justify-between items-center mb-3">
                                <div class="image flex items-center">
                                    <img class="img-circle img-sm mx-2" src="{{ asset('/' . $comment->user->picture) }}" alt="user">
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


                            <div class="comment-text  text-black mb-3">
                                <!-- /.username -->
                                {{ $comment->content }}
                                @if ($comment->picture)
                                <a href="{{ asset('/' . $comment->picture) }}">
                                    <img src="{{ asset('/' . $comment->picture) }}" alt="" class=" rounded-md" style="min-height:250px; min-width:100%; object-fit:contain"></a>
                                @endif

                            </div>
                            <p class=" font-semibold text-right text-sm mt-3"> <i class="fa fa-calendar text-gray-200"></i> {{$comment->created_at->format('d.M.Y H:i')}}</p>
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
            <!-- /.card -->
        </div>
        <div class=" d-none d-lg-flex d-md-flex flex-col col-md-6">
            <div class="p-1">
                <h2 class="text-md font-semibold mb-3 mx-2">{{ $news->title}}</h2>
                <hr>
            @for($i=1;$i<5;$i++)
                <div class="mt-3 card p-0">
                    <div class="row p-0">
                        <div class="col-md-6">
                            <div class="bg-dark" style="height: 300px;">

                                <video src="{{ asset('/videos/news/Vid652a6538973954.44074558.mp4')}}" controls style="height: 300px; width:100%"></video>


                            </div>
                        </div>
                        <div class="col-md-6 m-0 px-2 pt-2">
                            <h2 class="text-md font-semibold mb-3 mx-2"> titre d'actualite</h2>

                            <div class="mb-1 ml-2 pe-3 flex justify-between items-center" style="height: 44px; width:100%">
                                <div class="flex items-center">
                                    <img class="img-circle" style="height: 44px;" src="{{ asset('/' . $news->user->picture) }}" alt="User Image">
                                    <!-- <span class="text-sm mx-2"><a href="#">{{ $news->user->name }}</a></span> -->
                                </div>
                                <span class="mx-2 date"><i class="fa fa-calendar text-gray-200"></i> {{ $news->created_at->format('d.M.Y H:i') }} </span>
                            </div>

                            <p class="text-muted mx-2 text-sm" style="height: 150px;">
                                {{ substr($news->description, 0, 250) }}... <a href="{{ route('news.show', $news) }}" class="text-blue-400">Lire plus</a>
                            </p>
                            <div class="row justify-evenly mb-3">
                                <div class=" cursor-pointer col-5 text-center bg-gray-50 p-1 rounded-full" wire:click="like({{ $news->id }})">
                                    <span>{{ count($news->like) }} <i class="fa fa-heart text-red-300" aria-hidden="true"></i></span>
                                </div>
                                <a href="{{ route('news.show', $news) }}" class="col-5 text-center bg-gray-50 p-1 rounded-full">

                                    <span class="">
                                        {{ count($news->comment) }} <i class="fa fa-comment text-blue-400"></i>
                                    </span>

                                </a>

                            </div>

                        </div>

                    </div>
                </div>
            @endfor
            </div>
        </div>
    </div>
    </div>
    <!-- /.row -->
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