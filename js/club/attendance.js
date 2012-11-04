$(document).ready(function(){
    var eventid;
    $('.module-cell.cursor').click(function(){
        var $module = $(this);
        if(eventid!=$module.attr('eventid')){
            eventid = $module.attr('eventid');
            reload_dis(eventid);
        }
        $('.module-cell.cursor').removeClass('alert-info');
        $module.toggleClass('alert-info');
        
    });
    $('#add_member').click(function(){
        var typehead_mem = $('#typehead_mem').val()
        if(typehead_mem&&eventid){
            $.post('ajax/attendance.php',{eventid:eventid,studname:typehead_mem},function(data){
                   if(data=="1"){
                       $('#return').html("Done");
                   }else{
                       $('#return').html("Already added");
                   }
                   setTimeout('$("#return").fadeOut("slow");', 2000);
                   reload_dis(eventid);
            });
        }
    });
    $('.rem_att').live('click',function(){
        var $rem_att_btn = $(this);
        var att_id = $rem_att_btn.attr('att_id');
        //alert($rem_att_btn.attr('att_id'));
        $.post('ajax/attendance.php',{att_id:att_id,eventid:eventid},function(data){
            if(data=="1"){
                $rem_att_btn.parent().remove();
                reload_dis(eventid);
            }
        });
    });
    function reload_dis(eventid){
        $.post('ajax/attendance.php',{dis_event_id:eventid},function(data){
                $('.dis_mem').html(data);
                if(data==""){
                  $('.dis_title').html("No Attendees");  
                }else{
                  $('.dis_title').html("Attendees");  
                }
            });
    }
});

