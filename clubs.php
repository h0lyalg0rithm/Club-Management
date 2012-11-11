<?php 
include '/functions/db.php';
include '/functions/sessions.php';
include '/functions/secure.php';
if(isset($_SESSION['id'])){
    $check_clubs = "SELECT * FROM membership WHERE studid=".$_SESSION['id'];
    $check_clubs_raw = mysql_query($check_clubs);
    if($check_clubs_raw){
        $num_clubs = mysql_num_rows($check_clubs_raw);
        while($clubs_id = mysql_fetch_assoc($check_clubs_raw)){
            $get_club_details = "SELECT * FROM clubs where id = ".$clubs_id['clubid'];
            $get_club_details_query = mysql_query($get_club_details);
            if($get_club_details_query)
                $clubs[] = mysql_fetch_assoc($get_club_details_query);
        }
        /*
        for($i=0;$i<count($club_id);$i++){
                     $get_all_other_clubs_f= $get_all_other_clubs_f.$club_id[$i];
                     if($i==(count($clubid)-1))
                     $get_all_other_clubs_f = $get_all_other_clubs_f." AND id<>";
                }
                echo $get_all_other_clubs_f;*/
    }else{
        $num_clubs = 0;
    }
    $get_all_clubs = "SELECT * FROM clubs";
    $all_clubs = mysql_query($get_all_clubs);
}else{
    header("Location: login.php");
}
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

  <body><?php /*print_r($clubs);*/?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">Heriot Watt Club</a>
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
          </div><!--/.nav-collapse -->
          <div class="nav-collapse collapse">
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
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <!--
      <div class="hero-unit">
              <h1>Welcome</h1>
              <p>This is the official page for the heriot watt clubs.</p>
              <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
            </div>-->
      

      <!-- Row 1 -->
     <?php 
            if($num_clubs){?>
     <h1>Clubs you have signed up for.</h1>
     <div class="row">
        <?php
            foreach ($clubs as $club) {
                $joined_clubs[] = $club['id'];
        ?>
        <div class="span4">
          <img src="http://placehold.it/360x200" />
          <h2><?php echo $club['name'];?></h2>
          <p><?php echo $club['description'];?></p>
          <p><a class="btn" club="<?php echo $club['id'];?>" id="joined">Joined Club &raquo;</a></p>
        </div>
        <?php } ?>
        </div>    
        <?php    }else{?>
         <h1 class="alert">You have not signed up for any club</h1>
        <?php } ?>
		
	  <!-- Row 2 -->
     <h1>Other Clubs</h1>
     <div class="row">
        <?php 
        while($club = mysql_fetch_assoc($all_clubs)){
            $k = 0;
            if(isset($joined_clubs)){
                foreach ($joined_clubs as $same) {
                    if($club['id']==$same){
                        $k=1;break;
                    }
                }
            }if(!$k){
        ?>
        <div class="span4">
          <img src="http://placehold.it/360x200" />
          <h2><?php echo $club['name'];?></h2>
          <p><?php echo $club['description'];?></p>
          <p><a class="btn" club="<?php echo $club['id'];?>" id="join">Join Club &raquo;</a></p>
        </div>
        <?php }}?>        
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
    <script src="js/club/clubs.js"></script>
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
