<?php 

include '/functions/db.php';
include '/functions/sessions.php';
include '/functions/secure.php';
onlyadmins($is_admin);
$get_admin_of_club = "SELECT * FROM admin WHERE studid=".$_SESSION['id'];
$get_admin_of_club = mysql_query($get_admin_of_club);
if(mysql_num_rows($get_admin_of_club)){
    $admin_of_club = mysql_fetch_assoc($get_admin_of_club);
    $get_requests = "SELECT * FROM requests WHERE clubid =".$admin_of_club['clubid'];
    $requests = mysql_query($get_requests);
    if($requests){
        $num_of_requests = mysql_num_rows($requests);
    }else{
        $num_of_requests = 0;
    }
    $get_old_members = "SELECT * FROM membership WHERE clubid =".$admin_of_club['clubid'];
    $old_members = mysql_query($get_old_members);
    if($old_members){
        $num_of_old_members = mysql_num_rows($old_members);
    }else{
        $num_of_old_members = 0;
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
    <?php /*print_r($get_requests);*/?>
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
              <?php if(isset($is_admin)){if($is_admin){?>
              <li><a href="members.php"><span class="badge badge-inverse">3</span> Members</a></li>
              <li><a href="organize.php"><i class="icon-calendar"></i> Organize</a></li>
              <li><a href="attendance.php"><i class="icon-calendar"></i> Manage</a></li>
              <?php }}?>
          </ul>
          <ul class="nav nav-pills pull-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-wrench"></i> Your Profile
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

      <!-- Main hero unit for a primary marketing message or call to action -->
      <!--
      <div class="hero-unit">
              <h1>Welcome</h1>
              <p>This is the official page for the heriot watt clubs.</p>
              <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
            </div>-->
      

      <!-- Row 1 -->
      <div class="row">
        <div class="span5">
            <?php 
            if($num_of_requests){
            ?>
            <h2>New Members</h2>
            <?php while($new_members= mysql_fetch_assoc($requests)){
                $get_requests_details = "SELECT * FROM users WHERE id=".$new_members['studid'];
                $requests_details = mysql_query($get_requests_details);
                if($requests_details){
                    $new_member_details=mysql_fetch_assoc($requests_details);
                    
            ?>
            <div class="module">
                <div class="module-cell">
                    <img src="http://placehold.it/72x72" class="avatar"/>
                    <h3 class="pull-left"><?php echo $new_member_details['name'];?></h3>
                    <div class="inline margtop15">
                        <input type="button" class="btn btn-danger pull-right margleft5" value="Deny" />
                        <input type="button" class="btn btn-success pull-right margleft5" value="Accept" />
                    </div>
                </div>
            </div>
            <?php }}}else{?>
            <h2>No new members</h2>
            <?php }?>
        </div>
        <div class="span6">
            <?php 
            if($num_of_old_members){
            ?>
            <h2>Old Members</h2>
            <div class="module">
                <?php while($old_member = mysql_fetch_assoc($old_members)){
                        $get_member_details = "SELECT * FROM users WHERE id=".$old_member['studid'];
                        $member_details = mysql_query($get_member_details);
                        if($member_details){
                            $old_member_details=mysql_fetch_assoc($member_details);
                    ?>
                <div class="module-cell minheight">
                    <img src="http://placehold.it/72x72" class="avatar pull-left"/>
                    <h3 class="pull-left"><?php echo $old_member_details['name'];?></h3>
                    <input type="button" class="btn btn-danger pull-right margtop15" value="Remove" />
                </div>
                <?php }}}else{ ?>
                <h2>No Members in your club</h2>
                <?php }?>                
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
