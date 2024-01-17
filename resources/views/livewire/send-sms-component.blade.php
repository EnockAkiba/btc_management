<div class="content pb-10">

    <div class="container-fluid ">
        <h4 class="flex items-center my-2">
            @if($destinator->picture)
            <img class="direct-chat-img mx-2" src="{{ asset('/' . $destinator->picture) }}">
            @else
            <img class="img-circle" src="{{asset('/images/user.png')}}" style="width:40px">
            @endif
            <span class="mx-2">
                {{$destinator->name." ".$destinator->lastName}}
            </span>
        </h4>

    </div>

    <div class="container-fluid">
        <div class="row" id="row">
            <div class="col-md-12">
                <!-- DIRECT CHAT PRIMARY -->
                <div class="card  direct-chat ">
                    <!-- /.card-header -->
                    <div class="card-body" id="messagesContent" style="height: 70vh;">

                        <!-- Conversations are loaded here -->

                        <div class="direct-chat-messages h-full bg-yellow-200">
                            @forelse ($conversations as $conversation
                            )
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg w-3/4 {{($conversation->user_id=== Auth::user()->id)?'ml-auto':'mr-auto ' }}">

                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text {{($conversation->user_id=== Auth::user()->id)?'bg-blue-100':'bg-green-100' }}  text-black m-0" style="max-width:max-content">
                                    {{$conversation->content}}
                                    @if($conversation->picture)
                                    <a href="{{ asset('/' . $conversation->picture) }}"><img class="" src="{{ asset('/' . $conversation->picture) }}"></a>
                                    @endif

                                </div>
                                <div class="direct-chat-infos clearfix">
                                    <span class="block direct-chat-timestamp text-sm">{{date_format(date_create($conversation->created_at), 'd.M.Y H:i') }}</span>
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
                    <div class="bg-gray-100 p-2" id="formSend">
                        <div class="input-group">
                            <div class="flex w-full">
                                <form wire:submit.prevent="store" enctype="multipart/form-data" class="flex w-full">
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

            <!-- <div class="col-md-4 ">
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
            </div> -->
        </div>


    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>