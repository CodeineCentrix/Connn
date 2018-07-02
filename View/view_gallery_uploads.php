<!DOCTYPE html>
<html>
<head>
	<title>Gallery Uploads</title>
        <link rel="stylesheet" href="../stylesheets/admin_pages.css">
</head>
    <body>
            <div id="page-wrapper">
            <div class="col-md-5">
                       <h1>Years</h1>
             <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Select Year</h1>
                    </div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <?php foreach ($galYears as $galYear) : ?> 
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="?action=show_gallery_view&selectedYear=<?php echo $galYear["Year"] ?>" class="collapsed"><?php echo $galYear["Year"] ?></a>&nbsp;&nbsp;Pictuers&nbsp;(<?php echo $galYear["NumOfPics"] ?>)
                                    </h4>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
        </div> 
               
            <div class="col-md-5">
                    <h1>Descriptions</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1> Select description to see picture </h1>
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <?php 
                                    $i = 1;
                                    foreach ($yearPictures as $galDesc) : ?> 
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ;?>" class="collapsed"> <?php echo $galDesc["GalDescrip"]; ?></a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $i ;?>" class="panel-collapse collapse" style="height: 0px;">
                                       
                                        <div class="panel-body">
                                            <div class="col-md-5">
                                         <?php
                                                if(isset($galDesc["GalPic"]))
                                                {
                                                    $image = imagecreatefromstring($galDesc["GalPic"]); 
                                                    ob_start(); 
                                                    imagejpeg($image, null, 80);
                                                    $data = ob_get_contents();
                                                    ob_end_clean();
                                                     echo '<img src="data:image/jpg;base64, ' . base64_encode($data) . ' " style="width:250px; height:250px;" />';
                                                  
                                                }
                                                ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <form method="POST" action="" enctype="multipart/form-data">
                                                       <div class="form-group">
                                                           <label>Description:</label><input type="text" value="<?php echo $galDesc["GalDescrip"] ;?>" placeholder="Helps you to find image" autofocus="true" class="form-control" name="image_description" required="true">
                                                           <label>Year:</label><input type="text" value="<?php echo $galDesc["GalDate"] ;?>" placeholder="Groups the image to its year"  class="form-control" name="image_date" required="true">
                                                           <label>Rate:</label><input type="number" value="<?php echo $galDesc["GalRate"] ;?>" placeholder="Importance of picture"  class="form-control" name="image_rate" >
                                                       
                                                       </div>
                                                       <input type="hidden" value="<?php echo $galDesc["GalID"] ;?>" name="gal_id"/>
                                                       <input type="hidden" value="show_gallery_view" name="action"/>
                                                       <input type="submit" class="btn btn-primary" name="btnEdit" value="Edit"/>&nbsp;<input type="submit" name="btnDelete" class="btn btn-default" value="Delete"/>
                                                   </form>  
                                             </div>
                                        </div>
                                    </div>
                                       <?php 
                                $i = $i+1;
                                endforeach;?>
                                </div>                             
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
    </body>
</html>