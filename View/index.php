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
        <!-- Section for jQuery plugins -->       
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <script type="text/javascript" src="../scripts/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
        <script type="text/javascript" src="../scripts/kinetic.js"></script> 
        <script type="text/javascript" src="../scripts/jquery.final-countdown.js"></script>
        <link rel="stylesheet" href="../stylesheets/homepage.css">
        <script src="../scripts/myscript.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    
    </head>
    <body>
        <div class="land_page">
        <div><?php include '../View/header.php'; ?></div>
       <div class="fullscreen-bg">
           <img src="../pics/kids_play.jpg" alt="CosPlay Costumes" class="fullscreen-bg-gif">
        </div>
        <?php 
        $milisec_begin = "1527804000";
        $start_date_obj = date_create($date_range["EveStartDate"]);
        $end_date_obj = date_create($date_range["EveEndDate"]);        
        ?>       
        <h1 class="white_text align_center_text">From the <?php echo date_format($start_date_obj, "dS F");?> till <?php echo date_format($end_date_obj, "dS F Y") ;?></h1>
        
        <div class="time-holder">
      <!--First PHP Tags come here.-->      
    <div class="countdown countdown-container container"        
         data-start="<?php echo "$milisec_begin";?>"
         data-end="<?php $end_time = $date_range["EveStartDate"]."00:00:00"; echo strtotime($end_time); ?>"
         data-now="<?php echo strtotime(date("j-M-Y H:i:s "))?>"
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
            
        <div class="new_adds"id="link_act">
            <h1 class="company_font black_text align_center_text">What's new for <?php echo date_format($end_date_obj, "Y") ;?></h1>
            <div class="new-stuff-content">
               <?php if(isset($activities)!=NULL): ?>
                <div>
                    <?php foreach ($activities as $activity):?>
                    <h2 class=" black_text align_left_text"><?php echo $activity["Title"]; ?></h2>
                    <p class="paragraph_text align_left_text">
                        <?php echo $activity["Descr"]; ?>
                    </p><br><br>
                    <?php endforeach;?>
                </div>
               <?php else: ?> 
                <p class="paragraph_text align_left_text"> Unfortunately...Nothing for now, but watch this space.</p>
                <?php endif;?>
            </div>
        </div>
            
            <div class="get_start_holder">
                <div class="get_start_content"id="link_map_tickets">
                <h1 class="company_font black_text align_center_text">Getting started</h1>
                
                <h3 class="company_font black_text align_center_text">Find the venue and get your ticket </h3>
                <div class="map_ticket_holder">
                    
                   <div class="map_holder">
                    <div class="map_balancer">
                        <h3 class="black_text align_center_text">Venue information</h3>
                <!--<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBQk0d2TXWcrEPgbSK2wsdcwBpzkT6iGYg&q=<?php echo $address["EveAddress"]; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                    </div>
                    </div>
                <div class="ticket_holder">
                    <h3 class="black_text align_center_text">Ticket information</h3>
                    <div class="ticket_balancer">
                <h4 class="black_text align_center_text">WHERE:</h4>
                <p class="paragraph_text align_center_text"><?php echo $tickets["TicDescription"];?><p>
                <h4 class="black_text align_center_text">Prices:</h4>
                <p class="black_text align_center_text">Weekend Pass:&nbsp;&nbsp;R<?php echo $tickets['TicPriceWeekendPass'];?></p>
                <p class="black_text align_center_text">Daily Pass:&nbsp;&nbsp;R<?php echo $tickets['TicPriceNormalPass'];?><p>
                    </div>
                    </div>
                </div>
            </div>
        </div> 
            
            <div class="stakeholder" id="link_vendors">            
            <h1 class="company_font black_text align_center_text">Our Vendors</h1>           
            <div class="vendors_holder" id="vendors_area" >

            </div>    
            
                    
            
        </div>
           <div class="pagination_content" id="pagination">
                        <a href="#" id="1"></a>
            </div>
            <div class="sponsors_holder" id="link_sponsors">
            <h1 class='company_font'>Gratitude to our sponsors</h1>
            <br>
            <?php ?>
            <?php foreach($sponsors as $sponsor) : ?>
            <div class='round'>
                <img src="<?php 
             $url =$sponsor["SpoPicture"];
              $bas64 = base64_encode($url);
              $fQIMG = "data:image/jpg;base64,".$bas64;
              echo $fQIMG;
                ?>" alt="<?php echo $sponsor["SpoName"]; ?>" style="width: 200px; height: 200px; border-radius: 250px;" />   
                
                <a href="<?php echo $sponsor["SpoWebsite"] ; ?>"><p class="title black_text"><?php echo $sponsor["SpoName"]; ?></p></a>
            </div>
            <?php endforeach; ?>
        </div>
        </div>
    </body>
</html>
