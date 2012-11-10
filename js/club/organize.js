$(document).ready(function(){
    $('#create').click(function(){
        var name = $('[name="name"]').val();
        var details = $('[name="details"]').val();
        var wheres = $('[name="wheres"]').val();
        var whens = $('[name="whens"]').val();
        var time = $('[name="time"]').val();
        var types = $('[name="types"]').val();
        $.post('ajax/organize.php',{types:types,name:name,details:details,wheres:wheres,whens:whens,time:time},function(data){
            $('.container').html(data).fadeIn('3000');
        });       
    });
    $('.thumbnail').click(function(){
        $('.thumbnail').removeClass("thumbselected");
        var $thumb = $(this);
        $('[name="types"]').val($thumb.attr('types'));
        $thumb.toggleClass("thumbselected");
    });
});
