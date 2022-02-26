@extends('theme.layout.base_layout')
@section('title', 'File Upload')
@section('content')
    <div class="show_pdf">
        @if(!empty($file_name))
            <iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="./uploads/transaction_report.pdf')}}" frameborder="1" scrolling="auto" height="1100" width="850" ></iframe>
        @else
            <iframe src="https://docs.google.com/viewerng/viewer?url=http://infolab.stanford.edu/pub/papers/google.pdf&embedded=true" frameborder="0" height="1000px" width="100%">
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