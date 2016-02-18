<?php
  include 'aviationInfo.php';
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Aviation Kiosk - <?php echo $fboFullName ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body background="img/Background.jpg">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="container-fluid">
	        <div class="row">
		        <div class="col-md-6">
			        <h3 class="text-muted text-center">
				       Welcome to <?php echo $fboFullName ?> 
			        </h3>
			        <div class="panel panel-default">
				        <div class="panel-heading">
					        <h3 class="panel-title">
						        METARs from nearby airports 
					        </h3>
				        </div>
				        <div class="panel-body">
                                          <table border="1" style="background-color:#FFFFFF;border-collapse:collapse;border:1px solid #B6B6B6;color:#000000;width:100%" cellpadding="3" cellspacing="3">
					  <?php
                                             #foreach ($metarArray as $apt => $metar) {
                                             foreach ($airports as $apt) {
                                               $am = $metarArray[$apt];
                                               print "<tr><td>"
                                                      . "<b>$apt</b>"
                                                      . "<br>Condition: <span class=\"$am->flight_category\">$am->flight_category</span>"
                                                      . "<br>METAR: $am->raw_text"
                                                      . "</td></tr>\n";
                                             }
                                          ?>
                                          </table>


				        </div>
				        <div class="panel-footer">
					  Update current as of <?php echo date('m/d/Y h:i:s a', time()); ?> 
				        </div>
			        </div>
		        </div>
		        <div class="col-md-6">
                                <embed type="application/x-shockwave-flash" src="https://photos.gstatic.com/media/slideshow.swf" width="700" height="500" flashvars="host=picasaweb.google.com&hl=en_US&feat=flashalbum&RGB=0x000000&feed=https%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F111713639493363703799%3Falt%3Drss%26kind%3Dphoto%26access%3Dpublic%26psc%3DF%26q%26uname%3D111713639493363703799" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
		        </div>
	        </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/scripts.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
