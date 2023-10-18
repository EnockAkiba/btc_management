@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                        <li class="breadcrumb-item title"><a href="{{ route('users') }}">Les utilisateurs</a></li>
                        <li class="breadcrumb-item active"> paul </li>
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
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('/' . Auth::user()->picture) }}" class="rounded-full p-2 mx-auto"
                        style="width:270px; height:270px">
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="p-3 bg-blue-100 text-left">
                            <h3 class="widget-user-username ">Noms complet:  Paul </h3>
                            <h3 class="widget-user-username ">Type :  Student </h3>
                            <h5 class="widget-user-username ">Genre :  </h5>
                            <h5 class="widget-user-desc">Statut :  Actif(e)</h5>
                        </div>
                        <div class="px-4 py-3">
                            <h5 class="mb-1 border p-2">Date d'ajout : <span class="text-red-400">{{ date('d.M.Y H:i') }}</span> </h5>
                            <h5 class="mb-1 border p-2">Phone number :  </h5>
                            <h5 class="mb-1 border p-2">Email :  </h5>
                            <h5 class="mb-1 border p-2">Adresse :  </h5>
                
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                
            </div>
            <!-- /.row -->
        </div>
    </section><!-- /.container-fluid -->
    <!-- /.content -->
    
        {{-- NAVIGATION MODAL  --}}

     


  
@endsection
