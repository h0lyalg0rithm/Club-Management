<?php 
include '../functions/db.php';
/*include '../functions/sessions.php';*/
include '../functions/secure.php';
/*
if(isset($_POST['fb_username'])){
    $data = file_get_contents('http://graph.facebook.com/'.$_POST['fb_username']);
    $data = json_decode($data);
    if($data[''])
    print_r($data);
}
else{*/
if(isset($_POST['name']))
    $name = secure($_POST['name']);
if(isset($_POST['studid']))
    $studid = secure($_POST['studid']);
if(isset($_POST['email']))
    $email = secure($_POST['email']);
if(isset($_POST['password'])){
    $password = secure($_POST['password']);
    $password = hash('SHA256', $password);
}
if(isset($_POST['email'])&&isset($_POST['name'])&&isset($_POST['password'])&&isset($_POST['studid'])){
    $check_email_dup = "Select * from users Where email = '".$email."'";
    $check_email_raw = mysql_query($check_email_dup);
    if($check_email_raw){
        if(!mysql_num_rows($check_email_raw)){
            $add_new_user = "INSERT INTO users(name,student_id,email,password) VALUES(
                                            '".$name."',".$studid.",'".$email."','".$password."')";
            $add_user = mysql_query($add_new_user);
            if($add_user){?>
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
        }
    }else{ ?>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Best check yo self, you're not looking too good.
</div>   
<?php }
}else{?>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Best check yo self, you're not looking too good.
</div>
<?php
}
//}
?>