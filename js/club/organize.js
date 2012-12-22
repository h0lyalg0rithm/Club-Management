$(document).ready(function(){
    $('#create').click(function(){
        var name = $('[name="name"]').val();
        var details = $('[name="details"]').val();
        var wheres = $('[name="wheres"]').val();
        var whens = $('[name="whens"]').val();
        var time = $('[name="time"]').val();
        var types = $('[name="types"]').val();
        var img = $('#imgsrc').attr('src');
        if(img!=""){
            $.post('ajax/organize.php',{types:types,name:name,details:details,wheres:wheres,whens:whens,time:time,srcimg:img},function(data){
               $('.container.body').html(data).fadeIn('3000');
            });     
        }  
    });
    $('.thumbnail').click(function(){
        $('.thumbnail').removeClass("thumbselected");
        var $thumb = $(this);
        $('[name="types"]').val($thumb.attr('types'));
        $thumb.toggleClass("thumbselected");
    });
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            data.context = $('<p/>').text('Uploading...').appendTo(document.body);
            data.submit();
        },
        done: function (e, data) {
            data.context.text('Upload finished.');
            //$('#srcimg').attr('')
            $('#imgsrc').attr('src',data.result[0].thumbnail_url);
            $(this).hide();
        }
    });
});
