<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link rel="stylesheet" href="../stylesheets/mystyle.css">
        <script src="scripts/myscript.js"></script>
        <!-- Section for jQuery plugins -->       
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <script type="text/javascript" src="../scripts/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
        <script type="text/javascript" src="../scripts/kinetic.js"></script> 
        <script type="text/javascript" src="../scripts/jquery.final-countdown.js"></script>
        <link rel="stylesheet" href="../stylesheets/homepage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    
    </head>
    <body>
        <div class="land_page">
        <div><?php include '../View/header.php'; ?></div>
       <div class="fullscreen-bg">
           <img src="../pics/kids_play.jpg" alt="CrosPlay Costumes" class="fullscreen-bg-gif">
        </div>
        
        
         <strong><h1 style="color: white; text-align: center;">From the 15th August till 18 August 2018</h1></strong>
        
        <div class="time-holder">
      <!--First PHP Tags come here.-->      
    <div class="countdown countdown-container container"        
     data-start="1362139200"
     data-end="1388461320"
     data-now="1387461319"
     data-border-color="rgba(255, 255, 255)">
    <div class="clock row">
        <div class="clock-item clock-days countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas-days" class="clock-canvas"></div>

                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-days type-time">DAYS</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.wrap -->
        </div><!-- /.clock-item -->

        <div class="clock-item clock-hours countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas-hours" class="clock-canvas"></div>

                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-hours type-time">HOURS</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.wrap -->
        </div><!-- /.clock-item -->

        <div class="clock-item clock-minutes countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas-minutes" class="clock-canvas"></div>

                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-minutes type-time">MINUTES</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.wrap -->
        </div><!-- /.clock-item -->

        <div class="clock-item clock-seconds countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas-seconds" class="clock-canvas"></div>

                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-seconds type-time">SECONDS</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.wrap -->
        </div><!-- /.clock-item -->
    </div><!-- /.clock -->
</div><!-- /.countdown-wrapper -->
 <script type="text/javascript">
	$('.countdown').final_countdown();
        </script>
        </div> 
        <div class="arrow_holder">
           
       <div class="arrow bounce">
        <p class="fa fa-arrow-down fa-2x" href="#"></p>
        </div>
        </div> 
        </div>
        
        <div class="content_holder">
            
        <div class="new_adds">
            <h1 class="company_font section_two">What's new for 2018</h1>
            <div class="new-stuff-content">
               <?php if(isset($activities)==NULL): ?>
                <div>
                    <?php foreach ($activities as $activity):?>
                    <h2><?php echo $activity["Title"]; ?></h2>
                    <p>
                        <?php echo $activity["Descr"]; ?>
                    </p><br><br>
                    <?php endforeach;?>
                </div>
               <?php else: ?> 
                <p class=""> Unfortunately...Nothing for now, but watch this space.</p>
                <?php endif;?>
            </div>
        </div>
            
            <div class="get_start_holder">
            <div class="get_start_content">
                <h1 class="company_font normal_text section_two">Getting started</h1>
                
                <h3 class="company_font normal_text section_two">Find the venue and get your ticket </h3>
                <div class="map_ticket_holder">
                    
                   <div class="map_holder">
                    <div class="map_balancer">
                       <h3>Venue information</h3>
                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBQk0d2TXWcrEPgbSK2wsdcwBpzkT6iGYg&q=<?php echo'Eiffel+Tower,Paris+France'; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    </div>
                <div class="ticket_holder">
                <h3>Ticket information</h3>
                <h4 class="ticket_headings">WHERE:</h4>
                <p><?php echo $tickets["TicDescription"];?><p>
                <h4 class="ticket_headings">Prices:</h4>
                <p>Weekend Pass:&nbsp;&nbsp;R<?php echo $tickets['TicPriceWeekendPass'];?></p>
                <p>Daily Pass:&nbsp;&nbsp;R<?php echo $tickets['TicPriceNormalPass'];?><p>
                </div>
                </div>
            </div>
        </div> 
            
            
            
        </div>

  
    </body>
</html>
