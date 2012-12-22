$(document).ready(function(){
    var eventid;
    var editing=0;
    $('.module-cell.cursor').click(function(){
        var $module = $(this);
        if(eventid!=$module.attr('eventid')){
            eventid = $module.attr('eventid');
            if(!editing)
               reload_dis(eventid);
            else
               edit_event(eventid);
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
    $('#edit').live('click',function(){
        $(this).toggleClass('btn-success');
        if(!editing){
            editing = 1;
            $(this).html(' Editing ');
            $('.dis_title').html("Edit the events"); 
            $('#add_mem_dis').hide();
            if(eventid)
                edit_event(eventid); 
            
        }
        else{
            editing = 0;
            $('#add_mem_dis').show();
            $(this).html('<i class="icon-wrench"></i> Edit ');
            $('.dis_title').html("Manage Attendees");
            reload_dis(eventid);
        }
        
    });
    $('#event_edit').live("click",function(){
        var event_name = $('#event_name').val();
        var event_details = $('#event_details').val();
        var event_whens = $('#event_whens').val();
        var event_wheres = $('#event_wheres').val();
        var event_time = $('#event_time').val();
        var img = $('#imgsrc').attr('src');
        $.post('ajax/attendance.php',{imgsrc:img,event_id:eventid,event_name:event_name,event_details:event_details,
              event_whens:event_whens,event_wheres:event_wheres,event_time:event_time},function(data){
                    $('.dis_mem').html(data);
       });
       //setInterval(function(){
       //location.reload();
       //},600);
    });
    $('#event_delete').live("click",function(){
        var pro = confirm("Are you sure you want to delete?");
        if(pro){
            $.post('ajax/attendance.php',{del_event:"1",event_id:eventid},function(data){
                $('.dis_mem').empty();
            });
        }
    });
    var file_upload = function fileupload(){
            
    }
    $('body').ajaxSuccess(function(){
       $('#fileupload').fileupload({
                dataType: 'json',
                add: function (e, data) {
                    data.submit();
                },
                done: function (e, data) {
                    //$('#srcimg').attr('')
                    $('#imgsrc').attr('src',data.result[0].thumbnail_url);
                    $(this).hide();
                }
        });
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
function edit_event(eventid){
    $.post('ajax/attendance.php',{edit_event_id:eventid},function(data){
        $('.dis_mem').html(data);
        
     });
}

