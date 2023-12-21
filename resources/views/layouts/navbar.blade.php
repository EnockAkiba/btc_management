    <div class="card px-1 shadow-none">
        <div class="card-body px-2 shadow-none">
            <div class="card-header">
                <h3 class="flex title items-center">
                    @if(Auth::user()->picture)
                    <a href="{{route('profile.show')}}">
                        <img src="{{ asset('/' . Auth::user()->picture) }}" class="rounded-full mx-2 border-2 " style="width:40px; height:40px">
                    </a>
                    @else
                    <a href="{{route('profile.show')}}">
                        <img src="{{ asset('/images/user.png')}}" class="rounded-full mx-2 border-2 " style="width:40px; height:40px">
                    </a>
                    @endif
                    <span> {{ Auth::user()->name." ".Auth::user()->lastName }}</span>
                </h3>
            </div>
            <ul class="nav  flex-column">
                <li class="nav-item active">
                    <a href="{{ route('news') }}" class="mx-auto inline-block my-2">
                        <i class="fas fa-home" title="Actualités"></i> Actualités
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('message') }}" class="mx-auto inline-block my-2">
                        <i class="fa fa-comment" title="messages"></i> messages
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('promotion') }}" class="mx-auto inline-block my-2">
                        <i class="fas fa-box" title="Extension"></i> Extension
                    </a>
                </li>


                <li class="nav-item ">
                    <a href="{{ route('quiz') }}" class="mx-auto inline-block my-2">
                        <i class="fas fa-book" title="Devoirs"></i> Devoirs

                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('user')}}" class="mx-auto inline-block my-2">
                        <i class="fas fa-users" title="users"></i> Utilisateurs
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('register') }}" class="mx-auto inline-block my-2">
                        <i class="fas fa-pen" title="register"></i> Inscription
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="mx-auto inline-block my-2" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="mr-2 fa fa-sign-out-alt "></i>
                            Se deconnecter
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->