$(document).ready(function(){
   $('#joined').click(function(){
       alert("test");
   });
   $('a#join.btn').click(function(){
       var num = $(this).attr("club");
       alert("joining "+num);
       
   });
});
