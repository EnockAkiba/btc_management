<div class="content pb-10" style="max-height: 81vh; overflow:hidden">
    <div class="container-fluid">
        <div class="row" id="row">
            <div class="col-md-8">
                <!-- DIRECT CHAT PRIMARY -->
                <div class="card  direct-chat " style="height:80vh;">

                    <!-- /.card-header -->
                    <div class="card-body p-3  " style="height:80vh;" id="messagesContent">

                        <!-- Conversations are loaded here -->

                        <div class="direct-chat-messages  h-full">
                            @forelse ($conversations as $conversation
                            )
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg w-3/4 {{($conversation->user_id=== Auth::user()->id)?'ml-auto':'mr-auto' }}">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name  {{($conversation->user_id=== Auth::user()->id)?'float-right':'float-left' }} ">{{
                                                ($conversation->user_id=== Auth::user()->id)?'Moi':$destinator->name." ".$destinator->lastName
                                                 
                                                }}</span>
                                    <span class="direct-chat-timestamp  float-right">{{$conversation->created_at}}</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                @if($destinator->picture)
                                <img class="direct-chat-img" src="{{ asset('/' . $destinator->picture) }}">
                                @else
                                <img class="img-circle" src="{{asset('/images/user.png')}}" style="width:40px">
                                @endif
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text {{($conversation->user_id=== Auth::user()->id)?'bg-blue-300':'bg-green-300' }}  text-black">
                                    {{$conversation->content}}
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            @empty
                            <p>Aucun message envoye'</p>
                            @endforelse


                            <!-- $conversations->onEachSide(1)->links('pagination::simple-bootstrap-4') -->


                        </div>
                        <!--/.direct-chat-messages-->
                    </div>
                    <!-- /.card-body -->
                    <div class="bg-green-100 p-2" id="formSend">
                        <div class="input-group">
                            <div class="flex w-full">
                                <form wire:submit.prevent="store" enctype="multipart/form-data">
                                        <label for="img-input" id="photoShow" class="mx-2">
                                            <img class="rounded-3xl shadow-sm " src="" style="max-height: 40px; max-width:40px" id='file-preview'>
                                            <i class="fa fa-image" id="icone"></i> </label>
                                        <input type="file" class="d-none" wire:model='picture' name="picture" accept="image/*" id="img-input" onchange="showFile(event)">
                                    <input type="text" name="message" wire:model='content' placeholder="Type Message ..." class="form-control w-full">
                                    <span class="input-group-append">
                                        <button type="submit" class="p-2 bg-blue-600 text-white">Send</button>
                                    </span>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
                {{-- end div --}}
            </div>

            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="post" class="flex items-center bg-gray-100 border rounded-xl">
                            <input type="search" name="" class=" border-none outline-none p-2 bg-transparent w-full" placeholder="Recherche un chat">
                            <i class="fa fa-search mx-1" aria-hidden="true"></i>
                        </form>
                    </div>
                    <div class="card-body overflow-auto pb-10" style="max-height:75vh;">
                        @for ($i = 1; $i < 25; $i++) <div class="user-block mb-3" onclick="ShowMessageindex()">
                            <div class="relative">
                                <img class="img-circle" src="{{ asset('admin/images/user.jpg') }}" alt="img">
                                <span class="bg-green-500 w-4 h-4 absolute rounded-full left-0 border-2 border-white"></span>
                            </div>
                            <span class="username"><a href="">Jonathan Burke Jr.</a></span>
                            <span class="description"> <i class="fa fa-user-circle opacity-5" aria-hidden="true"></i> <span class="text-green-500"> Student </span> </span>
                    </div>
                    @endfor
                </div>
            </div>
        </div>


    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>