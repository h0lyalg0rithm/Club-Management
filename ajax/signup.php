<?php include '../functions/db.php'; include '../functions/secure.php';?>
<?php 
/*
if(isset($_POST['fb_username'])){
    $data = file_get_contents('http://graph.facebook.com/'.$_POST['fb_username']);
    $data = json_decode($data);
    if($data[''])
    print_r($data);
}
else{*/

$name = secure($_POST['name']);
$studid = secure($_POST['studid']);
$email = secure($_POST['email']);
$password = secure($_POST['password']);
$password = hash('SHA256', $password);
$check_email_dup = "Select * from users Where email = '".$email."'";
$email_dup = mysql_num_rows(mysql_query($check_email_dup));
if($email_dup < 1){
    $add_new_user = "INSERT INTO users(name,student_id,email,password) VALUES(
                                    '".$name."',".$studid.",'".$email."','".$password."')";
    $add_user = mysql_query($add_new_user);
    if($add_new_user){
?>
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Hurray!</strong> <?php echo $name;?> you have registered successfully
</div>
<?php
}else{?>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Best check yo self, you're not looking too good.
</div>

<?php    
}
}else{
?>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Best check yo self, you're not looking too good.
</div>
<?php
}
//}
?>