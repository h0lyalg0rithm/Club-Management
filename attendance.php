<?php 

include '/functions/db.php';
include '/functions/sessions.php';
include '/functions/secure.php';
onlyadmins($is_admin);
$is_admin = admin_check_force();
if($is_admin){
    $tit_get_admin_club = "SELECT * from admin WHERE studid=".$_SESSION['id'];
    $tit_admin_club = mysql_query($tit_get_admin_club);
    if($tit_admin_club){
        if(mysql_num_rows($tit_admin_club)){
            $tit_admin_club_id = mysql_fetch_assoc($tit_admin_club);
            $tit_get_all_requests = "SELECT COUNT(*) FROM requests WHERE clubid=".$tit_admin_club_id['clubid'];
            $tit_all_requests = mysql_query($tit_get_all_requests);
            if($tit_all_requests){
                if(mysql_num_rows($tit_all_requests)){
                    $tit_requests = mysql_fetch_assoc($tit_all_requests);
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Heriot Watt Clubs - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="index.php">Heriot Watt Club</a>
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse collapse">
          <ul class="nav">
              <li><a href="home.php"><i class="icon-home"></i> Home</a></li>
              <li><a href="clubs.php"><i class="icon-th-large"></i> Clubs</a></li>
              <?php 
              if(isset($is_admin)){
                  if($is_admin){?>
              <li><a href="members.php"><span class="badge badge-inverse"><?php echo $tit_requests['COUNT(*)']?></span> Members</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-calendar"></i> Events
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="organize.php">Organize</a></li>
                  <li><a href="attendance.php">Manage</a></li>
                </ul>
              </li>
              <?php }
              }?>
          </ul>
          <ul class="nav nav-pills pull-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-wrench"></i> Settings
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="profile.php">Your Profile</a></li>
                  <li><a href="logout.php">Log Out</a></li>
                </ul>
              </li>
          </ul>
        </div>
         <!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <!-- Row 1 -->
      <div class="row">
        <div class="span4">
            <?php 
                $get_all_events = "SELECT * FROM events WHERE clubid=".$tit_admin_club_id['clubid'];
                $all_events = mysql_query($get_all_events);
                if(!$all_events){?>
                 <h1>You didnt orgranize any events.</h1>   
                <?php }else{?>
                 <h1>Events</h1> 
            <div class="module">   
            <?php while($events = mysql_fetch_assoc($all_events)){ ?>
           
                <div class="module-cell cursor" eventid="<?php echo $events['id']?>">
                    <img src="http://placehold.it/72x72" class="avatar"/>
                    <div class="details">
                        <h3><?php echo $events['name'];?> </h3>
                        <h5><?php echo $events['whens']?></h5>
                    </div>
                </div>
            <?php }} ?>
            </div>
        </div>
        <div class="span8">
            <?php 
            $typeahead_get_all_members = "SELECT * FROM membership WHERE clubid=".$tit_admin_club_id['clubid'];
            $typeahead_all_members = mysql_query($typeahead_get_all_members);
            while($typehead_members = mysql_fetch_assoc($typeahead_all_members)){
                $typehead_members_id[] = $typehead_members; 
            }
            
            foreach ($typehead_members_id as $typehead_members_ids) {
                $typehead_get_member_details = "SELECT * FROM users WHERE id=".$typehead_members_ids['studid'];
                $typehead_mem_details = mysql_fetch_assoc(mysql_query($typehead_get_member_details));
                $typehead_members[] = $typehead_mem_details['name'];
            }
            $typehead_str = "";
            for($i=0;$i<count($typehead_members);$i++){
                if($i==0)
                    $typehead_str=$typehead_str.'"'.$typehead_members[$i].'"';
                else
                    $typehead_str=$typehead_str.',"'.$typehead_members[$i].'"';
            }
           
            
            
            //print_r($typehead_members);
            ?>
            <div id="return"></div>
            <div>
                <h1 class="dis_title">Attendees</h1>
                <div class="pull-right margtopmin15">
                    <input type="text" class="margtop8" id="typehead_mem" data-provide="typeahead" data-items="4" data-source='[<?php echo $typehead_str;?>]'/>
                    <input type="button" class="btn btn-primary" value="Add Members" id="add_member"/>
                </div>
            </div>
            <div class="module clearfix">
                <div class="dis_mem"></div>
            </div>
        </div>
      </div>
        
      
      <hr>

      <footer>
        <p>&copy; Heriot Watt Technology Club</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/club/attendance.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>
