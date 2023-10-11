    <div class="card px-3 shadow-none">
        <div class="card-body px-2 shadow-none">
            <h3 class=" font-bold mb-2"><i class="fa fa-box text-orange-300"></i> Actualités </h3>
            <ul class="nav  flex-column">
                <li class="nav-item active">
                    <a href="{{route('news')}}" class="nav-link">
                        <i class="fas fa-inbox text-orange-300"></i>Actualité
                    </a>
                </li>


                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fa fa-filter text-orange-300"></i> Lab
                    </a>
                </li>
            <h3 class=" font-bold mb-2 mt-3"><i class="fa fa-users text-orange-300"></i> Equipe & Partenaires </h3>

                <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle text-orange-300"></i>  Equipe
                    </a>
                </li>


                <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle text-orange-300" ></i> Partenaires
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="shadow-none card px-3 py-1">
        <div class="card-header shadow-none">
            <h3 class=" font-bold"> <i class="fa-solid fa-gear text-orange-300"></i> Paramétre</h3>
        </div>
        <div class="card-body px-2">
            <ul class="nav nav-pills flex-column">

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle text-orange-300"></i> A propos
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle text-orange-300"></i>
                        Slider
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle text-orange-300"></i> Contact
                    </a>
                </li>
            <h3 class=" font-bold my-2"> <i class="far fa-user text-orange-300"></i> Utilisateur</h3>
                <li class="nav-item">
                    <a href="" class="nav-link"> 
                       
                    </a>

                </li>
                
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="mr-2 fa fa-sign-out-alt text-orange-300"></i>
                            Se deconnecter
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>