<div class="content">


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('message') }}">Nouveau chat</a></li>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content pb-10" style="max-height: 80vh; overflow:hidden">
        <div class="container-fluid">
            <div class="row" id="row">
                <div class="col-md-4 " id="messageIndex">
                    <div class="card">
                        <div class="card-header">
                            <div class="flex items-center bg-gray-100 border rounded-xl">
                                <input type="search" name="" wire:model="search" class="border-none outline-none p-2 bg-transparent w-full" placeholder="Recherche un chat">
                                <i class="fa fa-search mx-1" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="card-body overflow-auto pb-10" style="max-height:75vh; overflow:auto">
                            @foreach ($destinators as $user)
                            @if($user->id!=1 and $user->id != Auth::user()->id)
                            <div class="flex mb-3">
                                <div class="flex">
                                    <button class="flex" wire:click='test({{$user->id}})'>
                                        @if($user->picture)
                                        <img class="img-circle" src="{{ asset('/'.$user->picture) }}" style="width:40px; height:40px">
                                        @else
                                        <img class="img-circle" src="{{asset('/images/user.png')}}" style="width:40px">
                                        @endif
                                        <h5 class="mx-2 mt-2">{{$user->names}}</h5>
                                    </button>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-8 d-none d-lg-block" id="messages">
                    <!-- DIRECT CHAT PRIMARY -->
                    <div class="card  direct-chat" style="height:80vh">
                        <div id="welcome" class="h-full flex items-center justify-center">
                            <p class="text-center py-4">
                                Soiyez le premier(e) à envoyer un message
                            </p>
                        </div>
                    </div>
                    <!--/.direct-chat -->
                    {{-- end div --}}
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>