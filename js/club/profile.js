$(document).ready(function(){
    $('#save').click(function(){
        var name = $('#name').val();
        var email = $('#email').val();
        var studid = $('#studid').val();
        var oldpassword = $('#oldpassword').val();
        var newpassword = $('#newpassword').val(); 
        var imgsrc = $('#imgsrc').attr('src');
        $.post('ajax/profile.php',{imgsrc:imgsrc,name:name,email:email,studid:studid,oldpassword:oldpassword,newpassword:newpassword},function(data){
            $('#status').html(data);
        });
    });
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            data.submit();
        },
        done: function (e, data) {
            $('#imgsrc').attr('src',data.result[0].thumbnail_url);
            $(this).hide();
        }
    });
});
