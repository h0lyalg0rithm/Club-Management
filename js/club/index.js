$(document).ready(function(){
    
    //Sign in button
    $('#signinbtn').click(function(e){
        if(!$('#email').val()){
            $('#email').attr('placeholder','Enter Email id');
            e.preventDefault();
        }else{
             $('#email').attr('placeholder','');
        }
        if(!$('#password').val()){
            $('#password').attr('placeholder','Enter Password');
            e.preventDefault();
        }else{
             $('#password').attr('placeholder','');
        }
        
    });
});
