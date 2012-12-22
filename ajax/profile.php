<?php
include '../functions/db.php';
include '../functions/sessions.php';
include '../functions/secure.php';
$update = "UPDATE users set";
onlyadmins($is_admin);
if(isset($_SESSION['id'])){
    $c = 0;
    if(isset($_POST['name']) && $_POST['name']!=""){
        $update = $update." name ='".secure($_POST['name'])."'";
        $c = 1;
    }
    if(isset($_POST['email'])&&$_POST['email']!=""){
        if($c) $update = $update.",";
        $update = $update." email ='".secure($_POST['email'])."'";
        $c = 1;
    }
    if(isset($_POST['studid'])&&$_POST['studid']!=""){
        if($c) $update = $update.",";
        $update = $update." student_id ='".secure($_POST['studid'])."'";
        $c = 1;
    }
    if(isset($_POST['oldpassword'])&&$_POST['oldpassword']!=""){
        $get_old_password = 'SELECT * FROM users WHERE id='.$_SESSION['id'];
        $old_password = mysql_query($get_old_password);
        if((mysql_num_rows($old_password)&&$old_password)){
            $old_password = mysql_fetch_assoc($old_password);
            if($old_password['password']==hash('SHA256',secure($_POST['oldpassword']))){
                if(isset($_POST['newpassword'])&&$_POST['newpassword']!=""){
                    if($c) $update = $update.",";
                    $update = $update." password ='".hash('SHA256',secure($_POST['newpassword']))."'";
                    $c = 1;
                }
            }
        }
    }
    
    if(isset($_POST['imgsrc'])){
        $img = $_POST['imgsrc'];
        if($c) $update = $update.",";
        $update = $update." photo ='".$img."'";
        $c = 1;
    }
    
    
    
    $update = $update." WHERE id=".$_SESSION['id'];
    if($c){
        $ran_update = mysql_query($update);
        if($ran_update){?>
           <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Your settings were saved</strong>
           </div> 
        <?php }else{?>
           <div class="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Warning!</strong> Best check yo self, you're not looking too good.
           </div>
        <?php }
            
    }
}else{
    echo "Error";
}
?>