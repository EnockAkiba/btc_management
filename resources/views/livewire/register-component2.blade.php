<div>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item title"><a href="{{ route('news') }}">Actualité</a></li>
                    <li class="breadcrumb-item active"> Les apprenants</li>
                </ol>
            </div>
            <div class="col-sm-6 col-md-3 ml-auto">
                <div class="mt-0 pt-0 flex items-center bg-gray-100 border rounded-xl">
                    <input type="search" wire:keyboard.enter="searchUser" class=" border-none outline-none p-2 bg-transparent w-full" wire:model="search" placeholder="Recherche un apprenant">
                    <i class="fa fa-search mx-1" aria-hidden="true"></i>
                </div>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="card col-md-12 p-0" style="max-height: 80vh; overflow:auto">
                <div class="card-header">
                    <div class=" flex items-center justify-between">
                        <h2 class="title">Les apprenants</h2>

                    </div>
                </div>
                <div class=" overflow-auto mt-1 py-0">
                    <table class="table table-hover">
                        <thead class="bg-green-100">
                            <th>#</th>
                            <th>Nom complet</th>
                            <th>Email</th>
                            <th>Genre</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($users as $user)
                                {{-- ADD STUDENT MODAL  --}}
                                <div class="modal fade" id="addNew">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content rounded-none shadow-none  border-t-2 border-t-blue-300 p-2">
                                            <div class="">
                                                <div class="card-header">
                                                    <div class="user-block flex justify-between w-full items-start">
                                                        <h3 class=" font-bold">Inscrire un apprenant</h3>
                                                    </div>

                                                </div>
                                                <!-- /.card-header -->
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="" name="user_id" value="{{$user->id}}">
                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Promotion <span class="required"> *</span> </label>
                                                                    <select name="promotion_id" id="" class="form-control">
                                                                        <option>---Choisir une promotion--</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Index number <span class="required"> *</span></label>
                                                            <input type="text" class="form-control" name="index">
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Vacation <span class="required"> *</span> </label>
                                                                    <input type="text" class="form-control" name="vacation">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Responsable </label>
                                                                    <input type="text" class="form-control" name="respoName">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Phone du Responsable </label>
                                                                    <input type="text" class="form-control" name="respoNumber">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->

                                                    <!-- /.card-footer -->
                                                    <div class="m-3 flex justify-between">
                                                        <button type="submit" class="btn-valid">Valider</button>
                                                        <span class="required ml-auto"> * sont obligatoire </span>
                                                    </div>
                                                </form>
                                                <!-- /.card-footer -->
                                            </div>


                                        </div>
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                {{-- ADD STUDENT MODAL  --}}

                                <th>{{$loop->index +1}}</th>
                                <th><a href="{{route('student.show')}}" class="text-blue-500"> {{$user->name ." ".$user->lastName}}</a></th>
                                <th>{{$user->email}}</th>
                                <th>{{$user->sex}}</th>
                                <th>{{$user->phone}}</th>
                                <th>
                                    <a class="bg-red-200 text-black p-2 ml-auto text-sm" data-toggle="modal" data-target="#addNew" href="{{$user->id}}" role="button">Inscrire
                                    </a>

                                </th>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- NAVIGATION MODAL-->
</section><!-- /.container-fluid -->
<!-- /.content -->
</div>
