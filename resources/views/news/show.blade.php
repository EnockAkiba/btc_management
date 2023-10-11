@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                        <li class="breadcrumb-item active"> designation de l'actualite</li>
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
                                <img class="img-circle" src="{{ asset('admin/images/user.jpg') }}" alt="User Image">
                                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                                <span class="description"><i class="fa fa-calendar" aria-hidden="true"></i> <span
                                        class="text-green-500"> {{ date('d.M.Y') }} </span> </span>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <img class="img-fluid pad" src="{{ asset('admin/images/photo2.png') }}" alt="Photo">
                            <a class="text-blue-500 d-lg-none d-md-none" data-toggle="modal" data-target="#media"
                                href="#" role="button">
                                <i class="fa fa-image" aria-hidden="true"></i> Voir plus d'image
                            </a>
                            <span class="float-right text-muted">127 likes - 3 comments</span>
                            <p>I took this photo this morning. What do you guys think?</p>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer card-comments">
                            <div class="card-comment">
                                <!-- User image -->
                                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                                <div class="comment-text">
                                    <span class="username">
                                        Maria Gonzales
                                        <span class="text-muted float-right">8:03 PM Today</span>
                                    </span><!-- /.username -->
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <!-- /.card-comment -->
                            <div class="card-comment">
                                <!-- User image -->
                                <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                                <div class="comment-text">
                                    <span class="username">
                                        Luna Stark
                                        <span class="text-muted float-right">8:03 PM Today</span>
                                    </span><!-- /.username -->
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <!-- /.card-comment -->
                        </div>
                        <!-- /.card-footer -->
                        <div class="card-footer">
                            <form action="#" method="post">
                                <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Press enter to post comment">
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="card col-md-6 d-md-block d-none" style="max-height: 80vh; overflow:auto">
                    <div class="card-header">
                        <div class="user-block">
                            <h2 class="title">Les images de l'actualité</h2>
                        </div>

                    </div>
                    <div class="row">
                        @for ($i = 0; $i < 10; $i++)
                            <div class="col-md-6 mb-2">
                              <a href="{{ asset('admin/images/photo2.png') }}"> <img class="img-fluid pad" src="{{ asset('admin/images/photo2.png') }}" alt="Photo"></a> 
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section><!-- /.container-fluid -->
    <!-- /.content -->


    {{-- IMAGES MODAL  --}}

    <div class="modal fade" id="media">
        <div class="modal-dialog modal-md">
            <div class="modal-content rounded-none shadow-none  border-t-2 border-t-green-300 p-3">
                <div class="flex justify-between items-center">
                    <h3 class="card-title text-orange"><a href="" class="brand-link">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image " style="opacity:">
                            <span class="title">BTC/AGAPD </span>
                        </a>
                    </h3>
                    <button type="button" class="text-green-500 p-2 ml-auto border rounded-md" data-dismiss="modal"><i
                            class="fa-solid fa-x"></i>Fermer</button>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <h2 class="title-blue mb-3 text-center border-bottom">Les images de l'actualité</h2>
                <div class="row mt-2">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="col-12 mb-2">
                            <img class="img-fluid pad" src="{{ asset('admin/images/photo2.png') }}" alt="Photo">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- IMAGES MODAL-->
@endsection
