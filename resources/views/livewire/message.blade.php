<div class="content pb-10" style="max-height: 81vh; overflow:hidden">
    <div class="container-fluid">
        <div class="row" id="row">
            <div class="col-md-4 " id="messageIndex">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="post" class="flex items-center bg-gray-100 border rounded-xl">
                            <input type="search" name="" class=" border-none outline-none p-2 bg-transparent w-full" placeholder="Recherche un chat">
                            <i class="fa fa-search mx-1" aria-hidden="true"></i>
                        </form>
                    </div>
                    <div class="card-body overflow-auto pb-10" style="max-height:75vh;">
                        @for ($i = 1; $i < 25; $i++) <div class="user-block mb-3">
                            <div class="relative">
                                <a href="{{ route('message.show') }}"> <img class="img-circle" src="{{ asset('admin/images/user.jpg') }}" alt="img"> </a>
                                <span class="bg-green-500 w-4 h-4 absolute rounded-full left-0 border-2 border-white"></span>
                            </div>
                            <span class="username"><a href="{{ route('message.show') }}">Jonathan Burke
                                    Jr.</a></span>
                            <span class="description"> <i class="fa fa-user-circle opacity-5" aria-hidden="true"></i> <span class="text-green-500"> Student </span>
                            </span>
                    </div>
                    @endfor
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