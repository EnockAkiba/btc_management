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
                    <div class="card-body overflow-auto pb-10" style="max-height:75vh;">
                        @foreach ($destinators as $user)
                        <div class="flex mb-3">
                            <a href="{{route('message.edit',$user)}}" class="flex">
                                @if($user->picture)
                                    <img class="img-circle" src="{{ asset('/'.$user->picture) }}" style="width:40px; height:40px">
                                @else
                                    <img class="img-circle" src="{{asset('/images/user.png')}}" style="width:40px">
                                @endif
                                <h5 class="mx-2 mt-2">{{$user->names}}</h5>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-8" id="messages">
                <!-- DIRECT CHAT PRIMARY -->
                <div class="card  direct-chat" style="height:80vh;  overflow-auto">
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