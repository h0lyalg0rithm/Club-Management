<?php

include '../functions/db.php'; 
include '../functions/secure.php';
include '../functions/sessions.php';
onlyadmins($is_admin);
$get_admins_club = "SELECT * FROM admin WHERE studid=".$_SESSION['id'];
$admins_club = mysql_query($get_admins_club);
$admin_club = mysql_fetch_assoc($admins_club);
if(isset($_POST['eventid'])&&isset($_POST['studname'])){
    $event_id = secure($_POST['eventid']);
    $studname = secure($_POST['studname']);
    $get_student_details = 'SELECT * from users WHERE name="'.$studname.'"';
    $student_details = mysql_fetch_assoc(mysql_query($get_student_details));
    $get_event_details = "SELECT * FROM events where clubid=".$admin_club['id']." AND id=".$event_id;
    $event_details = mysql_query($get_event_details);
    $event_attendence = mysql_fetch_assoc($event_details);
    $new_attendees = create_attendees($event_attendence['attendees'], $student_details['id']);
    if(!$new_attendees[1]){
        $update_event = 'UPDATE events SET attendees="'.$new_attendees[0].'" WHERE id='.$event_id;
        $updated_event = mysql_query($update_event);
        if($updated_event){
            echo "1";
        }
    }else{
        echo "0";
    }
}
function create_attendees($event_attendees,$stud_id){
    $already_attended = explode(",", $event_attendees);
    $already_in = 0;
    foreach ($already_attended as $attendees) {
        if($attendees==$stud_id)
            $already_in=1;
    }
    if(!$already_in){
            $attendees_str = $event_attendees.$stud_id.",";
    }else{
        $attendees_str = $event_attendees;
    }
    $returns = array($attendees_str,$already_in);
    return $returns;
}
/////////////////////////////////////////
if(isset($_POST['dis_event_id'])){
    //print_r($_POST);
    $dis_event_id=secure($_POST['dis_event_id']);
    $display_members = "SELECT * FROM events WHERE id=".$dis_event_id;
    $dis_members = mysql_query($display_members);
    if($dis_members){
        if(mysql_num_rows($dis_members)){
            $dis_members_id = mysql_fetch_assoc($dis_members);
            $dis_member_id = explode(",", $dis_members_id['attendees']);
            //print_r($dis_member_id);
            if(count($dis_member_id)&&$dis_member_id[0]!=""){
                foreach ($dis_member_id as $mem_id) {
                    if($mem_id!=""){
                        $dis_get_member_details = "SELECT * FROM users WHERE id=".$mem_id;
                        $dis_member_details = mysql_query($dis_get_member_details);
                        while($dis_mem_details = mysql_fetch_assoc($dis_member_details)){ ?>
                         <div class="module-cell minheight">
                            <img src="http://placehold.it/72x72" class="avatar pull-left"/>
                            <h3 class="pull-left"><?php echo $dis_mem_details['name'];?></h3>
                            <input type="button" class="btn btn-danger pull-right margtop15 rem_att" value="Remove" att_id="<?php echo $dis_mem_details['id'];?>"/>
                         </div>
                        <?php }
                            
                    }
                }
            }
        }
    }
    //echo $display_members;
}

////////////////////////////////////////
if(isset($_POST['eventid'])&&isset($_POST['att_id'])){
    $event_id = secure($_POST['eventid']);
    $att_id = secure($_POST['att_id']);
    $get_event_details = "SELECT * FROM events where clubid=".$admin_club['id']." AND id=".$event_id;
    $event_details = mysql_query($get_event_details);
    $event_attendence = mysql_fetch_assoc($event_details);
    $new_att = delete_attendees($event_attendence['attendees'], $att_id);
    $new_att_str = "";
    if($new_att){
        foreach ($new_att as $att) {
            $new_att_str = $new_att_str.$att.",";
        }
    }
    $update_event = 'UPDATE events SET attendees="'.$new_att_str.'" WHERE id='.$event_id;
    //echo $update_event;
    $updated_event = mysql_query($update_event);
    //echo $update_event;
    if($updated_event){
        echo "1";
    }else{
        echo "0";
    }
    
    
    
}
function delete_attendees($event_attendees,$stud_id){
    $already_attended = explode(",", $event_attendees);
    $already_in = 0;
    foreach ($already_attended as $attendees) {
        //echo $attendees;
        if($attendees==$stud_id)
            $attendees="";
        if($attendees!=""){
            $new_att[] = $attendees;
        }
    }
    if(isset($new_att))
        return $new_att;
    else 
        return 0;
}
?>