@extends('layouts.app')

@section('content')

@if(
collect(Auth::user()->teachers)->isNotEmpty() or
Auth::user()->roleUser == 2 or
Auth::user()->roleUser == 1 or
collect(Auth::user()->registers)->isNotEmpty()

)
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb flex justify-between items-center">
                    <li class="breadcrumb-item uppercase title"><a href="{{ route('news') }}">Actualités</a></li>
                    @if (Auth::user()->roleUser == 2)
                    <li class="text-white text-sm bg-blue-400 p-1"><a href="{{route('news.create')}}"> <i class="fa fa-plus-circle"></i> Actualité </a></li>
                    @endif
                </ol>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<livewire:like-livewire />

<!-- /.container-fluid -->
</div>

<!-- /.content -->

@else


<div class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                    <h1>Brotherly Training Center </h1>
                    <p class="text-red text-md my-4">Vous n'étez pas inscrit </p>
                    <p>
                     Veuillez passer au bureau de BTC pour prendre l'inscription, en fin de profiter  toutes fonctionaliés de notre plateforme
                    </p>
                    <p class="my-3">
                        Pour plus d'information contact l'administration <a href="tel:+243973111973" class="text-blue">  en cliquant ici</a>
                    </p>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@endif

@endsection