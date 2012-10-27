<?php ?>
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
          <a class="brand" href="#">Heriot Watt Club</a>
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      
      <div class="hero-unit">
              <h1>Registration</h1>
      </div>
      
      
      <!-- Row 1 -->
      <div class="row">
        <br><br><br>
        <div class="span6">
          <form class="form-horizontal" method="post" action="signin.php">
              <div class="control-group">
                  <label class="control-label" for="inputEmail">Name</label>
                    <div class="controls">
                      <input type="text" id="inputEmail" placeholder="Name">
                    </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="inputEmail">Student ID</label>
                    <div class="controls">
                      <input type="text" id="inputEmail" placeholder="Heriot Watt ID">
                    </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                      <input type="text" id="inputEmail" placeholder="Email">
                    </div>
              </div>
              <div class="control-group">
                    <div class="controls">
                      <input type="submit" class="btn btn-primary" value="Register">
                    </div>
              </div>
          </form>
        </div>
         <div class="span6">
            <h2>Sign up with facebook id/name</h2>
            <form action="fbsign.php" method="post">
                <div class="input-prepend input-append">
                    <span class="add-on">facebook.com/</span><input type="text"/><a class="add-on" href="#"><i class="icon-circle-arrow-right"></i></a>
                </div>
            </form>
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