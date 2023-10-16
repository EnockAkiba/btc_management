@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item title"><a href="{{ route('message') }}">Nouveau chat</a></li>
                        <li class="breadcrumb-item title" ><a href="{{ route('message') }}">Njumbi</a>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content pb-10" style="max-height: 81vh; overflow:hidden">
        <div class="container-fluid">
            <div class="row" id="row">
                <div class="col-md-8">
                    <!-- DIRECT CHAT PRIMARY -->
                    <div class="card  direct-chat " style="height:80vh;  overflow-auto">
                      
                        <!-- /.card-header -->
                        <div class="card-body p-3  " style="height:80vh;  overflow-auto" id="messagesContent">

                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages  h-full">
                                @for ($i = 1; $i < 20; $i++)
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg w-3/4">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">{{ Auth::user()->name }}</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="{{ asset('/' . Auth::user()->picture) }}"
                                            alt="Message User Image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text bg-green-300 text-black">
                                            Is this template really for free? 
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right w-3/4 ml-auto">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="{{ asset('/' . Auth::user()->picture) }}"
                                            alt="Message User Image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text bg-blue-300 text-black">
                                            You better believe it!
                                            Is this template really for free? That's unbelievable!
                                            Is this template really for free? That's unbelievable!
                                            Is this template really for free? That's unbelievable!
                                            Is this template really for free? That's unbelievable!
                                            Is this template really for free? That's unbelievable!
                                            Is this template really for free? That's unbelievable!
                                            Is this template really for free? That's unbelievable!

                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                @endfor
                                <button class="w-full bg-green-500 text-white py-1 my-2">Charger plus</button>

                            </div>
                            <!--/.direct-chat-messages-->
                        </div>
                        <!-- /.card-body -->
                        <div class="bg-green-100 p-2" id="formSend">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <div class="flex w-full">
                                        <div class="">
                                            <label for="img-input" id="photoShow" class="mx-2">
                                                <img class="rounded-3xl shadow-sm " src=""
                                                    style="max-height: 40px; max-width:40px" id='file-preview'>
                                                <i class="fa fa-image" id="icone"></i> </label>
                                            <input type="file" class="d-none" name="picture" accept="image/*"
                                                id="img-input" onchange="showFile(event)">
                                        </div>
                                        <input type="text" name="message" placeholder="Type Message ..."
                                            class="form-control w-full">
                                        <span class="input-group-append">
                                            <button type="submit" class="p-2 bg-blue-600 text-white">Send</button>
                                        </span>
                                    </div>

                                </div>
                            </form>
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
                                <input type="search" name=""
                                    class=" border-none outline-none p-2 bg-transparent w-full"
                                    placeholder="Recherche un chat">
                                <i class="fa fa-search mx-1" aria-hidden="true"></i>
                            </form>
                        </div>
                        <div class="card-body overflow-auto pb-10" style="max-height:75vh;">
                            @for ($i = 1; $i < 25; $i++)
                                <div class="user-block mb-3" onclick="ShowMessageindex()">
                                    <div class="relative">
                                        <img class="img-circle" src="{{ asset('admin/images/user.jpg') }}"
                                            alt="img">
                                        <span
                                            class="bg-green-500 w-4 h-4 absolute rounded-full left-0 border-2 border-white"></span>
                                    </div>
                                    <span class="username"><a href="{{route('message.show')}}">Jonathan Burke Jr.</a></span>
                                    <span class="description"> <i class="fa fa-user-circle opacity-5"
                                            aria-hidden="true"></i> <span class="text-green-500"> Student </span> </span>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
  
        function showFile(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById("file-preview");
                output.src = dataURL;
            }
            reader.readAsDataURL(input.files[0]);
            $('#icone').addClass('d-none');
        }
    </script>
@endsection
