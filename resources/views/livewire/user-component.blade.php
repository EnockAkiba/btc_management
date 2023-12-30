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
                        </div>
                    </div>
                    <div class=" overflow-auto mt-1 py-0">
                        <table class="table table-hover text-sm ">
                            <thead class="bg-blue-900 text-white">
                                <th>#</th>
                                <th colspan="3">Nom complet</th>
                                <th>Email</th>
                                <th>Genre</th>
                                <th>Phone</th>
                                <th>Inscrire</th>
                                <th>Admin</th>
                                <th>Formateur</th>
                                <th>bloquer</th>
                                <th>Appariteur</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($users as $user)

                                    @if($user->id !=1)

                                    <th>{{$loop->index}}</th>
                                    <th colspan="3"><a href="{{route('register.show',$user)}}" class="text-blue-500"> {{$user->name ." ".$user->lastName}}</a></th>
                                    <th>{{$user->email}}</th>
                                    <th>{{$user->sex}}</th>
                                    <th>{{$user->phone}}</th>
                                    <th>
                                        <a href="{{route('register.create', $user)}}" class="bg-success p-1 text-sm rounded-sm"> <i class="fa fa-layer-group"></i> </a>
                                    </th>

                                    <th class="mx-0">
                                        <button type="button" wire:click="setAdmin({{$user->id}})" class="bg-{{$user->roleUser==2?'red':'yellow'}}  p-1 text-sm rounded-sm"> <i class="fa {{$user->roleUser==2?'fa-shield-halved':'fa fa-user-slash'}}"></i> </button>
                                    </th>
                                    <th class="mx-0">
                                        <button type="button" wire:click="setTeaecher({{$user->id}})" class="bg-{{collect($user->teachers)->isNotEmpty()?'green':'blue'}}  p-1 text-sm rounded-sm"> <i class="fa {{collect($user->teachers)->isNotEmpty()?'fa-user':'fa fa-user-slash'}}"></i> </button>
                                    </th>
                                    
                                    <th>
                                        <button type="button" wire:click="setBlocked({{$user->id}})" class="bg-{{$user->statut==2?'red':'yellow'}}  p-1 text-sm rounded-sm"> <i class="fa {{$user->statut==2?'fa-user-slash':'fa fa-user'}}"></i> </button>
                                    </th>
                                    <th>
                                        <button type="button" wire:click="setApparitor({{$user->id}})" class="bg-{{$user->roleUser==1?'red':'yellow'}}  p-1 text-sm rounded-sm"> <i class="fa {{$user->roleUser==1?'fa-marker':'fa fa-user'}}"></i> </button>

                                    </th>
                                    <th>
                                        <button type="button" wire:click="destroy({{$user->id}})" class="bg-red  p-1 text-sm rounded-sm"> <i class="fa fa-trash"></i> </button>
                                    </th>
                                </tr>

                                @endif

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
<style>
   
    .table th:nth-child(1),
    .table td:nth-child(1)
    {
        width: 3%;
    }
    .table th:nth-child(2),
    .table td:nth-child(2)
    {
        width: 30%;
    }

    .table th:nth-child(3),
    .table td:nth-child(3)
    {
        width: 30%;
    }

    .table th:nth-child(4),
    .table td:nth-child(4)
    {
        width: 2%;
    }
    .table th:nth-child(5),
    .table td:nth-child(5)
    {
        width: 10%;
        text-align: center;
    }

    .table th:nth-child(6),
    .table td:nth-child(6)
    {
        width: 10%;
        text-align: center;
    }
    .table th:nth-child(7),
    .table td:nth-child(7)
    {
        width: 10%;
        text-align: center;
    }

    .table th:nth-child(8),
    .table td:nth-child(8)
    {
        width: 10%;
        text-align: center;
    }

    .table th:nth-child(9),
    .table td:nth-child(9)
    {
        width: 10%;
        text-align: center;
    }
</style>