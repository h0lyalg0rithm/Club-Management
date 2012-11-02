<?php
include '../functions/db.php'; 
include '../functions/secure.php';
include '../functions/sessions.php';
$no_error = 0;
if(isset($_POST['clubid'])){
    $club_id = secure($_POST['clubid']);
    $is_club_valid = "SELECT * FROM clubs WHERE id=".$club_id;
    $club_valid = mysql_query($is_club_valid);
    if(mysql_num_rows($club_valid)){
        $check_request_list = "SELECT * FROM requests WHERE studid=".$_SESSION['id']." AND clubid=".$club_id;
        $check_requests = mysql_query($check_request_list);
        if($check_requests){
            if(mysql_num_rows($check_requests)){
                $no_error = 0;
            }else{
                $check_old_members_list = "SELECT * FROM membership WHERE studid=".$_SESSION['id']." AND clubid=".$club_id;
                $check_old_members = mysql_query($check_request_list);
                if($check_old_members){
                    if(mysql_num_rows($check_requests)){
                        $no_error = 0;
                    }else{
                        $no_error=1;
                    }
                }
            }
        }
    }
    if($no_error){
        $insert_request = "INSERT INTO requests(studid,clubid) VALUES(".$_SESSION['id'].",".$club_id.")";
        $inserted_request = mysql_query($insert_request);
        if($inserted_request){
            echo "1";
        }
     }else{
         echo "0";
     }
}else{
    $no_error = 0;
}
?>