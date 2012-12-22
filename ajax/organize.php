<?php

include '../functions/db.php'; 
include '../functions/secure.php';
include '../functions/sessions.php';
onlyadmins($is_admin);
$get_admins_club = "SELECT * FROM admin WHERE studid=".$_SESSION['id'];
$admins_club = mysql_query($get_admins_club);
$admins_clubs = mysql_fetch_assoc($admins_club);
if(isset($_POST['types'])&&isset($_POST['name'])&&isset($_POST['details'])&&isset($_POST['wheres'])&&isset($_POST['whens'])&&isset($_POST['time'])){
    $types = secure($_POST['types']);
    $name = secure($_POST['name']);
    $details = secure($_POST['details']);
    $wheres = secure($_POST['wheres']);
    $whens = secure($_POST['whens']);
    $time = secure($_POST['time']);
    $img = $_POST['srcimg'];
    $check_if_event = 'SELECT * from events WHERE clubid='.$admins_clubs['clubid'].' AND name="'.$name.'" AND details="'.$details.'"';
    $if_event = mysql_query($check_if_event);
    if($if_event){
        if(!mysql_num_rows($if_event)){
            $create_event = "INSERT INTO events(photo,clubid,name,type,details,wheres,whens) VALUES ('".$img."',".$admins_clubs['clubid'].",'".$name."',".$types.",'".$details."','".$wheres."','".$whens." ".$time.":00')";
            //echo $create_event;
            $created_event = mysql_query($create_event);
            if($created_event){?>
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Done</strong>
                </div>
            <?php }
        }else{?>
                <div class="alert">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Warning!</strong> Best check yo self, you're not looking too good.
                </div>
        <?php }
    }
}
?>