<?php
include '../functions/db.php';
include '../functions/sessions.php';
include '../functions/secure.php';
$update = "UPDATE users set";
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
        $update = $update." studdent_id ='".secure($_POST['name'])."'";
        $c = 1;
    }
    if(isset($_POST['oldpassword'])&&$_POST['oldpassword']!=""){
        if($c) $update = $update.",";
        $update = $update." oldpassword ='".hash('SHA256',secure($_POST['oldpassword']))."'";
        $c = 1;
    }
    if(isset($_POST['newpassword'])&&$_POST['newpassword']!=""){
        if($c) $update = $update.",";
        $update = $update." newpassword ='".hash('SHA256',secure($_POST['newpassword']))."'";
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
        <?php }else{echo $update;?>
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