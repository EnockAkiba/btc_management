    <div class="card px-1 shadow-none">
        <div class="card-body px-2 shadow-none">
            <div class="card-header">
                <h3 class="flex title items-center">
                    <div class="img relative">
                        <img src="{{ asset('/' . Auth::user()->picture) }}"
                            class="rounded-full mx-2" style="width:40px; height:40px">
                        <span class="bg-green-500 w-4 h-4 absolute rounded-full top-0 right-1 border-2 border-white"></span>
                    </div>
                    <span> {{ Auth::user()->name }}</span>
                </h3>
            </div>
            <ul class="nav  flex-column">
                <li class="nav-item">
                    <a href="{{route('news')}}" class="my-2 text-blue-400 inline-block">
                        <i class="fas fa-home text-blue-7"></i>Actualité
                    </a>
                </li>


                <li class="nav-item">
                    <a href="" class="my-2 text-blue-400 inline-block">
                        <i class="fa fa-filter text-blue-7"></i> Lab
                    </a>
                </li>
            <h3 class=" font-bold mb-2 mt-3"><i class="fa fa-users text-blue-7"></i> Equipe & Partenaires </h3>

                <li class="nav-item">
                    <a href="" class="my-2 text-blue-400 inline-block">
                      <i class="far fa-circle text-blue-7   00"></i>  Equipe
                    </a>
                </li>


                <li class="nav-item">
                    <a href="" class="my-2 text-blue-400 inline-block">
                      <i class="far fa-circle text-blue-7   00" ></i> Partenaires
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="shadow-none card px-3 py-1">
        <div class="card-header shadow-none">
            <h3 class=" font-bold"> <i class="fa-solid fa-gear text-blue-7"></i> Paramétre</h3>
        </div>
        <div class="card-body px-2">
            <ul class="nav nav-pills flex-column">

                <li class="nav-item">
                    <a href="" class="my-2 text-blue-400 inline-block">
                        <i class="far fa-circle text-blue-7 00"></i> A propos
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="my-2 text-blue-400 inline-block">
                        <i class="far fa-circle text-blue-7 00"></i>
                        Slider
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="my-2 text-blue-400 inline-block">
                        <i class="far fa-circle text-blue-7 00"></i> Contact
                    </a>
                </li>
            <h3 class=" font-bold my-2"> <i class="far fa-user text-blue-7"></i> Utilisateur</h3>
                <li class="nav-item">
                    <a href="" class="my-2 text-blue-400 inline-block"> 
                       
                    </a>

                </li>
                
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="my-2 text-blue-400 inline-block"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="mr-2 fa fa-sign-out-alt text-blue-7   00"></i>
                            Se deconnecter
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>