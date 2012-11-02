$(document).ready(function(){
   $('#joined').click(function(){
       alert("test");
   });
   $('a#join.btn').click(function(){
       var num = $(this).attr("club");
       var $link = $(this);
       $.post('/program/ajax/clubs.php',{clubid:num},function(data){
           if(data=="1"){
               $link.text("Request Sent");
               $link.addClass("btn-success");
           }else{
               alert("Error occured");
           }
       });
   });
});
