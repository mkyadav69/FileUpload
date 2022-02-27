@extends('theme.layout.base_layout')
@section('title', 'File Upload')
@section('content')
    <div class="show_pdf">
        @if(!empty($file_name))
            <iframe src="{{$path}}" height="1000px" width="100%">
            </iframe>
        @else
            <iframe src="{{asset('uploads/'.$data[0])}}" frameborder="0" height="1000px" width="100%">
            </iframe>
            
        @endif
    </div>
    <script>
        $(document).ready(function(){
            let data = {!! json_encode($data) !!};
            let num = {!! json_encode($num) !!};
            if(num != 0){
                $('#file_number').text("Document #"+num);
            }else{
                $('#file_number').text("Document #1");
            }
        });
    </script>
@endsection