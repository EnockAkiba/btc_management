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
                        <input type="search" wire:keyboard.enter="searchregister" class=" border-none outline-none p-2 bg-transparent w-full" wire:model="search" placeholder="Recherche un utilisateur">
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
                                <li><a href="{{route('register.register')}}" class="text-sm p-2 bg-blue">Voir les apprenants</a></li>
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
                                    @foreach($registers as $register)


                                    <th>{{$loop->index +1}}</th>
                                    <th><a href="{{route('register.show',$register)}}" class="text-blue-500"> {{$register->name ." ".$register->lastName}}</a></th>
                                    <th>{{$register->email}}</th>
                                    <th>{{$register->sex}}</th>
                                    <th>{{$register->phone}}</th>
                                    <th>
                                        <a href="{{route('register.create', $register)}}" class="bg-green p-2 text-sm"> <i class="fa fa-register"></i></a>
                                    </th>


                                    <th>
                                        <a href="{{route('register.create', $register)}}" class="bg-blue p-2 text-sm"> <i class="fa fa-lock"></i></a>
                                    </th>
                                    <th>
                                        <a href="{{route('register.create', $register)}}" class="bg-red p-2 text-sm"> <i class="fa fa-trash"></i></a>
                                    </th>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-end">
                            <div class="ml-auto">
                                {{$registers->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- NAVIGATION MODAL-->
    </section><!-- /.container-fluid -->
    <!-- /.content -->
</div>