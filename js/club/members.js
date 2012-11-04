$(document).ready(function(){
    $('input#accept').click(function(){
        var $acceptbtn = $(this);
        var studid = $acceptbtn.attr('studid');
        $.post('ajax/members.php',{accept:studid},function(data){
            $acceptbtn.parent().parent().parent().remove();
            //alert(data);
        });
    });
    $('input#remove').click(function(){
        var $removebtn = $(this);
        var studid = $removebtn.attr('studid');
        $.post('ajax/members.php',{remove:studid},function(data){
            $removebtn.parent().remove();
        });
    });
    $('input#deny').click(function(){
        var $denybtn = $(this);
        var studid = $denybtn.attr('studid');
        $.post('ajax/members.php',{deny:studid},function(data){
           $denybtn.parent().parent().parent().remove();
           //alert(data);
        });
    });
});
