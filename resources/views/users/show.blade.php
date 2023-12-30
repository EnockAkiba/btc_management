@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('users') }}">Les utilisateurs</a></li>
                    <li class="breadcrumb-item active"> paul </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content" style="max-height: 80vh; overflow:auto">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    @if($user->picture)
                    <img src="{{ asset('/' .$user->picture) }}" class="rounded-full p-2 mx-auto" style="width:270px; height:270px">
                    @else
                    <img src="{{asset('/images/user.png')}}" class="rounded-full p-2 mx-auto" style="width:270px; height:270px">
                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <!-- Widget: user widget style 1 -->
                <div class="">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="p-3 text-white" style="background: darkblue ;">
                        <h3 class="font-bold ">Noms complet: {{$user->name." ".$user->lastName}} </h3>
                        <h5 class="font-bold ">Genre : {{$user->sex}}</h5>
                    </div>
                    <div class="px-4 py-3 card">
                        <h5 class="mb-1 border p-2">Phone number : <span class="font-bold"> {{$user->phone}}</span></h5>
                        <h5 class="mb-1 border p-2">Email : <span class="font-bold"> {{$user->email}}</span> </h5>
                        <h5 class="mb-1 border p-2">Adresse : <span class="font-bold"> {{$user->adress}}</span></h5>

                    </div>

                    @if(collect($user->registers)->isNotEmpty())
                    <h5 class="text-center font-bold mb-2"> les inscriptions</h5>
                    @foreach($user->registers as $register)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Promotion : <span class="font-bold">{{$register->promotion->designation}} </span>  </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <h5 class="mb-1 border p-2">Index number : <span class="title"> {{$register->index}}</span> </h5>
                            <h5 class="mb-1 border p-2">Date d'inscription : <span class="font-bold">{{ $register->created_at->format('d.M.Y H:i') }}</span> </h5>
                            <h5 class="mb-1 border p-2">Extension : <span class="font-bold">{{$register->promotion->extension->designation}} </span></h5>
                            <h5 class="mb-1 border p-2">Departement : <span class="font-bold">{{$register->promotion->departement->title}}</span> </h5>
                            <h5 class="mb-1 border p-2">promotion : <span class="font-bold"> {{$register->promotion->designation}} </span></h5>
                            <h5 class="mb-1 border p-2">Vacation : <span class="font-bold"> {{$register->vacation}} </span></h5>

                            <h3 class="font-bold"> Responsable</h3>
                            <h5 class="mb-1 border p-2"> Noms : <span class="font-bold"> {{$register->respoName}}</span></h5>
                            <h5 class="mb-1 border p-2"> Phone number : <span class="font-bold">{{$register->respoNumber}}</span></h5>

                        </div>
                        <!-- /.card-body -->
                    </div>





                    @endforeach
                    @endif

                </div>
                <!-- /.widget-user -->
            </div>

        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.container-fluid -->
<!-- /.content -->

{{-- NAVIGATION MODAL  --}}





@endsection