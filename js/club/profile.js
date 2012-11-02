$(document).ready(function(){
    $('#save').click(function(){
        var name = $('#name').val();
        var email = $('#email').val();
        var studid = $('#studid').val();
        var oldpassword = $('#oldpassword').val();
        var newpassword = $('#newpassword').val(); 
        $.post('ajax/profile.php',{name:name,email:email,studid:studid,oldpassword:oldpassword,newpassword:newpassword},function(data){
            $('#status').html(data).hide(3000);
        });
    });
});
