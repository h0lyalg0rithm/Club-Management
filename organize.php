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

    <div class="container data">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <!--
      <div class="hero-unit">
              <h1>Welcome</h1>
              <p>This is the official page for the heriot watt clubs.</p>
              <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
            </div>-->
      
      
      <!-- Row 1 -->
      <div class="row">
    	<div class="span4">
    	    <div class="thumbnail cursor" types="1">
        	    <img src="img/meeting.jpg"/>
        	    <center><h2>Meetup</h2></center>
    	    </div>
    	</div>
    	<div class="span4">
            <div class="thumbnail cursor" types="2">
                <img src="img/event.jpg"/>
                <center><h2>Event</h2></center>
            </div>
        </div>
        <div class="span4">
            <div class="thumbnail cursor" types="3">
                <img src="img/learning.jpg"/>
                <center><h2>Training</h2></center>
            </div>
        </div>
      </div>
      
      <!-- Row 2 -->
	  <div class="row">
	      <div class="span8 offset2 margtop15">
	          <div class="span5">
	              <div id="return"></div>
    	          <form class="form-horizontal">
    	              <div class="control-group">
                          <label class="control-label" for="inputEmail">Name</label>
                            <div class="controls">
                              <input type="text" id="inputEmail" placeholder="Name" name="name">
                            </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label" for="inputEmail">Details</label>
                            <div class="controls">
                              <textarea rows="3" name="details"></textarea>
                            </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label" for="inputEmail">Where</label>
                            <div class="controls">
                              <input type="text" id="inputEmail" placeholder="Location" name="wheres">
                            </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label" for="inputEmail">When</label>
                            <div class="controls">
                              <input type="date" id="inputEmail" name="whens">
                            </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label" for="inputEmail">Time</label>
                            <div class="controls">
                              <select name="time">
                                  <?php for($i=1;$i<=23;$i++){?>
                                  <option value="<?php echo $i.':00';?>"><?php echo $i.":00";?></option>
                                  <?php }?>
                              </select>
                            </div>
                      </div>
                      
                      <div class="control-group">
                        <div class="controls">
                          <input type="hidden" name="types" value="1"/>
                          <button type="button"  class="btn btn-primary" id="create">Create</button>
                        </div>
                      </div>
    	          </form>
    	      </div>
    	      <div class="span2">
                  <img src="http://placehold.it/180x180" class="img-polaroid" id="imgsrc"/>
                  <input id="fileupload" type="file" name="files[]" data-url="uploadman/" />
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
    <script src="js/club/organize.js"></script>
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
    <script src="js/fileupload/jquery.ui.widget.js"></script>
    <script src="js/fileupload/jquery.fileupload.js"></script>
    <script src="js/fileupload/jquery.iframe-transport.js"></script>
  </body>
</html>
