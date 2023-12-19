@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="mt-7 content" style="overflow: auto; height:86vh">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <!-- Box Comment -->
                <div class="card p-3">
                    <div class="header">
                        <h2 class="text-md font-semibold mb-3 mx-2">{{ $news->title}}</h2>
                        <hr>

                        <div class="my-3 ml-2 pe-3 flex justify-between items-center" style="height: 44px; width:100%">
                            <div class="flex items-center">
                                <img class="img-circle" style="width:45px; height:45px" src="{{ asset('/' . $news->user->picture) }}" alt="User Image">
                                <span class="text-sm mx-2 d-none d-lg-block d-md-block"><a href="#">{{ $news->user->name }}</a></span>
                            </div>
                            <span class="mx-2 text-blue-500 text-sm"> <i class="fa fa-calendar text-gray-200"></i> Publiee' {{ $news->created_at->format('d.M.Y H:i') }} </span>
                        </div>
                        <p class="text-muted my-7">
                            {{ $news->description}}
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
                                <div class="carousel-item active rounded-md">
                                    <img src="{{ asset('/' . $news->picture) }}" class="d-block w-100 rounded-md" style="max-height: 430px; width:100% ;">
                                </div>

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

                    <div class="flex items-end my-6">
                        <div class="ml-auto flex mr-4">
                            <h2 class="text-md mx-1 bg-slate-100 p-2 rounded-full">{{count($news->comment)}} <i class="fa fa-comment text-green-500"></i> </h2>
                            <h2 class="text-md bg-slate-100 p-2 rounded-full"><i class="fa fa-heart text-red-300"></i> {{$news->liker}}</h2>
                        </div>
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


                                <div class="comment-text  text-black mb-3 row">
                                    <!-- /.username -->
                                    <p class="col-md-12">
                                        {{ $comment->content }}
                                    </p>
                                    @if ($comment->picture)
                                    <a href="{{ asset('/' . $comment->picture) }}" class="col-md-5">
                                        <img src="{{ asset('/' . $comment->picture) }}" alt="" class=" rounded-md"></a>
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
                            <hr>

                            <!-- DELETE modal -->
                            @endforeach

                            <!-- /.card-comment -->
                        </div>
                    </div>
                    <div class="w-full">
                        <form action="{{route('comment.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="news_id" value="{{$news->id}}">
                            <div class="flex justify-center items-center">
                                <label for="file" class="p-2 bg-slate-200 mt-2 rounded-full mr-1"><i class="fa fa-file"></i> </label>
                                <input type="file" name="picture" class="d-none" id="file">
                                <input type="text" name="content" class="form-control" placeholder="Laisser un commentaire ...">
                                <button type="submit" class="p-2 bg-blue-400 ml-1 rounded-sm text-white">Poster</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class=" d-none d-lg-flex d-md-flex flex-col col-md-5 ">
                <div class=" p-0">
                    <div class="row p-0">
                        @foreach($lastNews as $data)
                        <div class="card col-md-10 ml-auto p-0 mr-3">
                            <a href="{{route('news.show', $data)}}">
                                <div class="card-header">
                                    {{$data->title}}
                                </div>
                                <div class="card-body p-0">
                                    @if ($data->video)
                                    <video src="{{ asset('/') . $data->video }}" controls></video>
                                    @endif
                                    @if ($data->picture)
                                    <img src="{{ asset('/' . $data->picture) }}" class="img-fluid bg-black mb-3" alt="..." style="max-height: 340px; width:100%;object-fit: fill;">
                                    @endif
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section><!-- /.container-fluid -->
<!-- /.content -->

@endsection