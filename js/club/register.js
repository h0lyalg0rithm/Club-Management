$(document).ready(function(){
    
    //Registration button
    $('#regreg').click(function(e){
        var x = 0;
        //var par = $('#name').parent().parent().parent().css('background-color','red');
        if(!$('#name').val()){
            $('#name').parent().parent().parent().children('.control-group:nth-child(1)').addClass('warning');
            x = 1;
        }else{
            $('#name').parent().parent().parent().children('.control-group:nth-child(1)').removeClass('warning');
        }
        if(!$('#studid').val()){
            $('#studid').parent().parent().parent().children('.control-group:nth-child(2)').addClass('warning');
            x = 1;
        }else{
            $('#studid').parent().parent().parent().children('.control-group:nth-child(2)').removeClass('warning');
        }
        if(!$('#email').val()){
            $('#email').parent().parent().parent().children('.control-group:nth-child(3)').addClass('warning');
            x = 1;
        }else{
            $('#email').parent().parent().parent().children('.control-group:nth-child(3)').removeClass('warning');
        }
        if(!$('#password').val()){
            $('#password').parent().parent().parent().children('.control-group:nth-child(4)').addClass('warning');
            x = 1;
        }else{
            $('#password').parent().parent().parent().children('.control-group:nth-child(4)').removeClass('warning');
        }
        if(x==0){
            ajaxreg();
        }
    });
    /////////////////////
    
    //FB Registration
    $('#fbsign').click(function(){
        if($('#fbid').val()){
            alert("el");
            fbreg();
        }
        else{
            $('#fbid').attr('placeholder','Enter facebook id')
        }
    });
    ////////////////////
    
    function ajaxreg(){
        var name = $('#name').val();
        var studid = $('#studid').val();
        var email = $('#email').val();
        var password = $('#password').val();
        $.post('/program/ajax/register.php', {name:name,studid:studid,email:email,
            password:password},function(data) {
            $('.returnreg').fadeIn('40000').html(data);
        });
    }
    
    ////////////////////////
    function fbreg(){
        var fbid = $('#fbid').val();
        $.post('/program/ajax/register.php',{fb_username:fbid},function(data){
            $('#returnfb').html(data);
        });
    }
});
