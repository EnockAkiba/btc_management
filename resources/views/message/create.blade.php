@extends('layouts.app')

@section('content')

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
