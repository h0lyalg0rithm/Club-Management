$(document).ready(function(){
    
    //Registration button
    $('#regreg').click(function(e){
        //var par = $('#name').parent().parent().parent().css('background-color','red');
        if(!$('#name').val()){
            $('#name').parent().parent().parent().children('.control-group:nth-child(1)').addClass('warning');
        }else{
            $('#name').parent().parent().parent().children('.control-group:nth-child(1)').removeClass('warning');
        }
        if(!$('#studid').val()){
            $('#studid').parent().parent().parent().children('.control-group:nth-child(2)').addClass('warning');
        }else{
            $('#studid').parent().parent().parent().children('.control-group:nth-child(2)').removeClass('warning');
        }
        if(!$('#email').val()){
            $('#email').parent().parent().parent().children('.control-group:nth-child(3)').addClass('warning');
        }else{
            $('#studid').parent().parent().parent().children('.control-group:nth-child(3)').removeClass('warning');
        }
        
    });
    /////////////////////
    
    //FB Registration
    $('#fbsign').click(function(){
        if($('#fbid').attr('placeholder','Enter facebook id')){
        }
    });
    ////////////////////
});
