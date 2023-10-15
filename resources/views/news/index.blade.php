@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{route('news')}}">Actualité</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="content" style="max-height: 80vh; overflow:auto">
        <div class="container-fluid">
            <div class="row">
                @foreach ($news as $new)
                <div class="col-md-4 col-sm-6 col-lg-4">
                    <div class="card">
                        @if($new->video)
                        <video src="{{asset('/').$new->video}}" controls style="max-height: 250px;"></video>
                        @endif
                        @if ($new->picture)
                        <img src="{{asset('/imagesnews/65290ffef0334.jpg')}}" class="" alt="..." style="max-height: 250px; object-fit: fill;">
                        @endif
                        <div class="card-body">
                            <div class="liker-box">
                                <span> <i class="fa fa-calendar text-gray-300 me-2" aria-hidden="true"></i>{{$new->created_at->format('d.M.Y')}} </span>
                                <div class="liker">
                                @livewire('like-livewire')
                                    <span class="comment">
                                        {{count($new->comment)}} <i class="fa fa-comment" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <h6 class="card-subtitle mb-2 title-blue"> <a href="{{route('news.show',$new)}}"> {{ substr($new->title, 0,45)}}...</a></h6>
                            <p class="card-text">
                                {{ substr($new->description, 0,200)}}... <a href="{{route('news.show',$new)}}" class="title">Lire plus</a>
                            </p>
                            <p class="flex justify-end">
                                <i class="fa fa-eye cursor-pointer" aria-hidden="true"></i>
                                <i class="fa fa-eye-slash cursor-pointer" aria-hidden="true"></i>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <button class="w-full bg-green-500 text-white py-1">Charger plus</button>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content -->
@endsection
