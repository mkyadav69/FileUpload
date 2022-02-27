$(document).ready(function(){
    $('#file_upload').change(function(){  
        $('#file_upload').submit();  
    }); 
     $('#file_upload').on('submit', function(event){  
        event.preventDefault();
        let path = window.location.origin+'/store/file';
        $.ajax({  
            url:path,  
            method:"POST",   
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:new FormData(this),  
            contentType:false,  
            processData:false,  
            success:function(response){
                if(response.code == 200){
                    alert("File uploaded successfully");
                    window.location = window.location.origin;
                }else{
                    alert(response);
                }
            }  
        });
    });
});