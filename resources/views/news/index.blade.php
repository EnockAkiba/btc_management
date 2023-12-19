@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb flex justify-between items-center">
                    <li class="breadcrumb-item uppercase title"><a href="{{ route('news') }}">Actualités</a></li>
                    <li class="text-white text-sm bg-blue-400 p-1"><a href="{{route('news.create')}}"> <i class="fa fa-plus-circle"></i> Actualité </a></li>
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
@endsection