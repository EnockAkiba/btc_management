<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item active"> Les utilisateurs</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-3 ml-auto">
                    <div class="mt-0 pt-0 flex items-center bg-gray-100 border rounded-xl">
                        <input type="search" wire:keyboard.enter="searchUser" class=" border-none outline-none p-2 bg-transparent w-full" wire:model="search" placeholder="Recherche un utilisateur">
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
                            <h2 class="title">Les utilisateurs</h2>
                            <ul>
                                <li><a href="" class="text-sm p-2 bg-blue">Voir les apprenants</a></li>
                            </ul>
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
                                <th>Inscrire</th>
                                <th>Editer</th>
                                <th>bloquer</th>
                                <th>Effacer</th>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($users as $user)


                                    <th>{{$loop->index +1}}</th>
                                    <th><a href="{{route('register.show',$user)}}" class="text-blue-500"> {{$user->name ." ".$user->lastName}}</a></th>
                                    <th>{{$user->email}}</th>
                                    <th>{{$user->sex}}</th>
                                    <th>{{$user->phone}}</th>
                                    <th>
                                        <a href="{{route('register.create', $user)}}" class="bg-green p-2 text-sm"> <i class="fa fa-user"></i></a>
                                    </th>
<?php
    if(!$user->register=="[]") echo "deda".$user->register;
    else echo "non";
?>
                                    @if(isset($user->regi))
                                    <th>
                                        <a href="{{route('register.create', $user)}}" class="bg-yellow p-2 text-sm"> <i class="fa fa-edit"></i>{{$user->register}}</a>
                                    </th>
                                    @endif

                                    <th>
                                        <a href="{{route('register.create', $user)}}" class="bg-blue p-2 text-sm"> <i class="fa fa-lock"></i></a>
                                    </th>
                                    <th>
                                        <a href="{{route('register.create', $user)}}" class="bg-red p-2 text-sm"> <i class="fa fa-trash"></i></a>
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