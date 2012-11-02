<?php

session_start();
if(isset($_SESSION['id'])){
    $get_creds_session = "SELECT * FROM users WHERE id=".$_SESSION['id'];
    $get_cred_query = mysql_query($get_creds_session);
    $creds = mysql_fetch_assoc($get_cred_query);
    $check_if_admin = "SELECT * FROM admin WHERE studid=".$_SESSION['id'];
    $checked_admin = mysql_query($check_if_admin);
    if($checked_admin){
        $check_if_admin = mysql_fetch_assoc($checked_admin);
        if($check_if_admin)
          $is_admin = 1;
        else
          $is_admin = 0;
    }else{
        $is_admin = 0;
    }
}
function onlyadmins($val=0){
    if(!$val)
    header('Location: home.php');
}

?>