<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gallery</title>
        <link rel="stylesheet" href="../stylesheets/mystyle.css">
        <style>
    .zoom {
    float: left;
    transition: transform .2s;
    width: 100px;
    height: 100px;
    z-index: 100;
}

.zoom:hover {
    padding-right: 50px;
    z-index: 100;
    -ms-transform: scale(5); /* IE 9 */
    -webkit-transform: scale(5); /* Safari 3-8 */
    transform: scale(2); 
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 50%;

}
html,body{
   height: 100%; 
      background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);
}
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body >
        <div>
            <h2 class="company_font">Down memory lane</h2>
            <div class="timeline">
            <?php
            if(isset($galYears)) :
            $it = 0;
           
            foreach ($galYears as $galYear) :
                if($it%2==0){
                    echo '<div class="container left">';  
                }else{
                    echo '<div class="container right">';      
                }
                ?>
                <div class="content gallery" >
                    <h2><?php echo $galYear["Year"] ;?></h2>
                    
                    <?php
                    $i = 1; 

                    for($table=0;$table<sizeof($yearPictures);$table++){
                        for($row=0;$row<sizeof($yearPictures[$table]);$row++){
                            if($yearPictures[$table][$row]["GalDate"]==$galYear["Year"]){

                                if(isset($yearPictures[$table][$row]["GalPic"])){
                                        $image = imagecreatefromstring($yearPictures[$table][$row]["GalPic"]); 
                                        ob_start(); 
                                        imagejpeg($image, null, 80);
                                        $data = ob_get_contents();
                                        ob_end_clean();
                                        if ($i == 1) {
                                            $dis = 'Display:block;';
                                        } else {
                                            $dis = 'Display:none;';
                                        }
                                        echo '<img class="mySlides'.$galYear["Year"].' zoom" src="data:image/jpg;base64, ' . base64_encode($data) . ' " style="width:100%:height:100%;margin-right:6px;'.$dis.'" />';

                                }
                                 $i++;
                            }
                        }

                    }

                    ?>  <br>                    
                 <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1,<?php echo $galYear["Year"] ;?>)">&#10094;</button>
                 <p><?php echo $galYear["NumOfPics"] ;?> Pictures</p>
                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1,<?php echo $galYear["Year"] ;?>)">&#10095;</button>
            
                    </div> 
                <?php
                echo '</div>'; 
                $it++;
                endforeach;
                endif;
                ?>
           </div>

        </div>
    </body>
    <script>
var slideIndex = 1;
showDivs(slideIndex,year);

function plusDivs(n,year) {
  showDivs(slideIndex += n,year);
}

function showDivs(n,year) {
  var i;
  var x = document.getElementsByClassName("mySlides"+year);
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}




</script>
</html>
