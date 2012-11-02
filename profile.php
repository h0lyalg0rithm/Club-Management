<?php
include '/functions/db.php';
include '/functions/sessions.php';
include '/functions/secure.php';
if(!isset($_SESSION['id'])){
    header('Location: login.php');
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

    <div class="container margtop15">
      <!-- Row 1 -->
      <div class="row">
        <div class="span2 offset2">
            <img src="http://placehold.it/140x140"/>
            <input type="file" />
            <input type="submit" class="btn" />
        </div>
        <div class="span8">
            <form class="form-horizontal">
              <div class="control-group">
                  <label class="control-label" for="name">Name</label>
                    <div class="controls">
                      <input type="text" id="name" placeholder="Name">
                    </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="email">Email</label>
                    <div class="controls">
                      <input type="text" id="email" placeholder="Name">
                    </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="studid">Students ID</label>
                    <div class="controls">
                      <input type="text" id="studid" placeholder="Heriot Watt ID">
                    </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="oldpassword">Old Password</label>
                    <div class="controls">
                      <input type="text" id="oldpassword" placeholder="Password">
                    </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="newpassword">Password again</label>
                    <div class="controls">
                      <input type="text" id="newpassword" placeholder="Password">
                    </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="button" class="btn btn-primary" id="save">Save</button>
                </div>
              </div>
            </form>
            <div id="status"></div>
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
    <script src="js/club/profile.js"></script>
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
