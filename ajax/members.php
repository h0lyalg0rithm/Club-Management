<?php

include '../functions/db.php'; 
include '../functions/secure.php';
include '../functions/sessions.php';
onlyadmins($is_admin);
$get_admins_club = "SELECT * FROM admin WHERE studid=".$_SESSION['id'];
$admins_club = mysql_query($get_admins_club);
if(isset($_POST['accept'])){
    
    if($admins_club){
        if(mysql_num_rows($admins_club)){
            $admins_club_id = mysql_fetch_assoc($admins_club);
            $studid = secure($_POST['accept']);
            $check_id_redudency = "SELECT * FROM membership WHERE studid=".$studid." AND clubid=".$admins_club_id['clubid'];
            $id_redundency = mysql_query($check_id_redudency);
            if($id_redundency){
                if(!mysql_num_rows($id_redundency)){
                    $insert_user = "INSERT INTO membership(studid,clubid) VALUES(".$studid.",".$admins_club_id['clubid'].")";
                    $insert_user_raw = mysql_query($insert_user);
                    if($insert_user_raw){
                        $delete_request = "DELETE FROM requests WHERE studid=".$studid." AND clubid=".$admins_club_id['clubid'];
                        if(mysql_query($delete_request)){
                            echo "1";
                            die();
                        }
                    }
                }
            }
        }
    }
}
if(isset($_POST['remove'])){
    $studid = secure($_POST['remove']);
    if($admins_club){
        if(mysql_num_rows($admins_club)){
            $admins_club_id = mysql_fetch_assoc($admins_club);
            $check_id_redudency = "SELECT * FROM membership WHERE studid=".$studid." AND clubid=".$admins_club_id['clubid'];
            $id_redundency = mysql_query($check_id_redudency);
            if($id_redundency){
                if(mysql_num_rows($id_redundency)){
                    $delete_request = "DELETE FROM membership WHERE studid=".$studid." AND clubid=".$admins_club_id['clubid'];
                    if(mysql_query($delete_request)){
                        echo "1";
                        die();
                    }
                }
            }
        }
    }
}
if(isset($_POST['deny'])){
    $studid = secure($_POST['deny']);
    if($admins_club){
        if(mysql_num_rows($admins_club)){
            $admins_club_id = mysql_fetch_assoc($admins_club);
            $check_id_redudency = "SELECT * FROM membership WHERE studid=".$studid." AND clubid=".$admins_club_id['clubid'];
            $id_redundency = mysql_query($check_id_redudency);
            if($id_redundency){
                if(!mysql_num_rows($id_redundency)){
                    $delete_request = "DELETE FROM requests WHERE studid=".$studid." AND clubid=".$admins_club_id['clubid'];
                    if(mysql_query($delete_request)){
                        echo "1";
                        die();
                    }
                }
            }
        }
    }
}
?>
?>