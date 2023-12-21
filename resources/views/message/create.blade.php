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
    <livewire:send-sms-component>

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
