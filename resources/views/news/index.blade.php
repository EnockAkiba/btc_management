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

    <!-- Main content -->
    <div class="content" style="max-height: 80vh; overflow:auto">
        <div class="container-fluid">
            <div class="row">
                @for ($i =1 ; $i <15 ; $i++)
                <div class="col-md-4 col-sm-6 col-lg-4">
                    <div class="card">
                        <img src="{{asset('admin/images/coup.png')}}"
                            class="" alt="..." style="max-height: 250px; object-fit: fill;" >
                        <div class="card-body">
                            <div class="liker-box" >
                                <span> <i class="fa fa-calendar" aria-hidden="true"></i>{{date('d.M.Y')}} </span>
                                <div class="liker">
                                    <span class="loved">
                                      43  <i class="fa fa-heart" aria-hidden="true"></i>
                                    </span>
                                    <span class="comment">
                                       46 <i class="fa fa-comment" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <h6 class="card-subtitle mb-2 title-blue"> <a href="{{route('news.show')}}"> {{ substr("titre d'actualite ", 0,45)}}</a></h6>
                            <p class="card-text">
                                {{ substr(" Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla rerum voluptates itaque voluptatibus. Vitae nesciunt molestias cupiditate eius ullam, saepe ab. Culpa harum reiciendis error dolorem velit recusandae, repudiandae nemo?
                                ", 0,200)}}... <a href="{{route('news.show')}}" class="title">Lire plus</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            
            <button class="w-full bg-green-500 text-white py-1">Charger plus</button>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
