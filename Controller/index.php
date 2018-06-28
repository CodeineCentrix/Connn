<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Haich
 */
require_once('../Model/DBHelper.php');
require_once('../Model/admin_model.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_home';
    }
}
$data = new admin_model();

switch($action) {
    
            case 'show_home':
                $address = $data->get_event_address();
		$date_range = $data->get_event_date();
                $activities =$data->get_current_activities();
                $tickets = $data->get_tickets();               
		$sponsors = $data->get_sponsors();
		$vendors = $data->get_vendors();
		//$picture = $data->get_picture();//Dont understand this line
		include('../View/index.php');
		break;
            
    /* Region: Vendor           */
	case 'Vendor_details':
            call_stylesheets();
		include('../View/Vendor_details.php');
		break;

	case 'Add_Vendor':
		$diplay	=null;		
		$VenName = filter_input(INPUT_POST, 'vendor_name');
		$VenDescription = filter_input(INPUT_POST, 'vendor_description');
		$VenFacebook = filter_input(INPUT_POST, 'vendor_facebook');
		$VenTwitter = filter_input(INPUT_POST, 'vendor_twitter');
		$VenInstagram = filter_input(INPUT_POST, 'vendor_instagram');
		$VenWebsite = filter_input(INPUT_POST, 'vendor_website');
		$isSuccessfull = null;
			$image = file_get_contents($_FILES['fpVenPicture']['tmp_name']);		
                        $vendor = $data->add_vendor($VenName, $VenDescription, $VenFacebook, $VenTwitter, $VenInstagram, $VenWebsite,$image );		
		call_stylesheets();
                        include('../View/Vendor_details.php');
		break;

	
	case 'edit_vendor':
		$venID = filter_input(INPUT_POST, 'venID');
		$venName = filter_input(INPUT_POST, 'venName');
		$venDescription = filter_input(INPUT_POST, 'venDescription');
		$venFacebook = filter_input(INPUT_POST, 'venFacebook');
		$venTwitter = filter_input(INPUT_POST, 'venTwitter');
		$venInstagram = filter_input(INPUT_POST, 'venInstagram');
		$venWebsite = filter_input(INPUT_POST, 'venWebsite');
		$venPicture = filter_input(INPUT_POST, 'hdImage');
		$isSuccessfull = null;
		$dataimg;
		// Validate input 	
		
		if(!empty($_FILES['fpVenPicture']['tmp_name'])){
			$image = addslashes($_FILES['fpVenPicture']['tmp_name']);
			$image = file_get_contents($_FILES['fpVenPicture']['tmp_name']);
			$image_size = getimagesize($_FILES['fpVenPicture']['tmp_name']);
			if($image_size == false){
				$isSuccessfull = false;
			}
			else{	
				$dataimg = $image;
				$isSuccessfull = true;
			}
		}
		elseif(isset($venPicture )){
			$dataimg = base64_decode($venPicture);
			$isSuccessfull = true;
		}
		else{
		
		}
		
		if($isSuccessfull){
			$isSuccessfull = $data->edit_vendor($venID, $venName, $venDescription, $venFacebook, $venTwitter, $venInstagram, $venWebsite,$dataimg);
		}
		$vendors = $data->get_vendors();
		$vendor = $data->get_vendor_by_id($venID);
                call_stylesheets();
		include '../View/Edit_Vendor.php';
		
		break;

	case 'edit_vendor_get':
		$venID = filter_input(INPUT_GET, 'vendorID');
		$venName = filter_input(INPUT_GET, 'venName');
		$venDescription = filter_input(INPUT_GET, 'venDescription');
		$venFacebook = filter_input(INPUT_POST, 'venFacebook');
		$venTwitter = filter_input(INPUT_POST, 'venTwitter');
		$venInstagram = filter_input(INPUT_POST, 'venInstagram');
		$venWebsite = filter_input(INPUT_POST, 'venWebsite');
		$venPicture = filter_input(INPUT_POST, 'hdImage');
		$isSuccessfull = null;
		$dataimg;
		// Validate input 	
		if(!isset($_FILES['image']))
		{
			$isSuccessfull = false;
		}
		elseif(!empty($_FILES['fpVenPicture']['tmp_name'])){			
			$image = addslashes($_FILES['fpVenPicture']['tmp_name']);
			$image = file_get_contents($_FILES['fpVenPicture']['tmp_name']);
			$image_size = getimagesize($_FILES['fpVenPicture']['tmp_name']);
			if($image_size == false){
				$isSuccessfull = false;
			}
			else{	
				$dataimg = $image;
				$isSuccessfull = true;
			}
		}
		else{
			$isSuccessfull = false;
		}
		
		if($isSuccessfull){
			$isSuccessfull = $data->edit_vendor($venID, $venName, $venDescription, $venFacebook, $venTwitter, $venInstagram, $venWebsite,$dataimg);
		}
		$vendors = $data->get_vendors();
		$vendor = $data->get_vendor_by_id($venID);
                call_stylesheets();
		include '../View/Edit_Vendor.php';
		
		break;
                
                case 'show_edit_vendor':
		$vendors = $data-> get_vendors();
		$venID = filter_input(INPUT_POST,"dbVenID",FILTER_SANITIZE_STRING);
		$vendor = $data->get_vendor_by_id($venID); 
		call_stylesheets();
		include '../View/Edit_Vendor.php';
		break;
            
                case 'get_vendors':
		$vendors = $data-> get_vendors();
                    call_stylesheets();
		include('../View/Vendor_details.php');
		break;
                /* End Region Vendor*/
                
         //Going to the business page

        case 'show_business':
                //getting the business attributes
		$business = $data-> get_business();
                call_stylesheets();
		include('../View/business_details.php');
		break;
        //editing the business attributes
        case 'edit_business':
                //getting the values from the business details view page
		$editBusName = filter_input(INPUT_POST, 'editBusName',FILTER_SANITIZE_STRING);
		$editBusSlogan = filter_input(INPUT_POST, 'editBusSlogan',FILTER_SANITIZE_STRING);
		$editBusDateFound = filter_input(INPUT_POST, 'editBusDateFound');
		$editBuslogo = filter_input(INPUT_POST, 'editBuslogo',FILTER_SANITIZE_STRING);
		$editBusAddress = filter_input(INPUT_POST, 'editBusAddress',FILTER_SANITIZE_STRING);
		$editbusAboutUs = filter_input(INPUT_POST, 'editBusAboutUs',FILTER_SANITIZE_STRING);
                //calling the edit method in the admin_model 
		$data->EditBusiness($editBusName , $editBuslogo ,$editBusSlogan,$editBusAddress,$editbusAboutUs,$editBusDateFound);
                //reloading the page
               $business = $data-> get_business();
               call_stylesheets();
		include('../View/business_details.php');
                break;
                
                
                
                
                
                
                
                /*Healings section fellas*/
        case 'maintain_events':
            //Check if user has entered data and is ready to add to the database        
            $event_input = filter_input(INPUT_POST, 'event');
            if ($event_input=="add") {
                $event_start_date = filter_input(INPUT_POST, 'dte_start_date');
                $event_end_date = filter_input(INPUT_POST, 'dte_end_date');
                $event_name = filter_input(INPUT_POST, 'txtAlias');
                $event_desc = filter_input(INPUT_POST, 'txtDescription');
                $event_address = filter_input(INPUT_POST, 'txtAddress');
                $ticket_desc = filter_input(INPUT_POST, 'txttickets_infos');
                $first_price = filter_input(INPUT_POST, 'txtdaily_price');
                $second_price = filter_input(INPUT_POST, 'txtweekend_price');
                $event_added = $data->add_event($event_name, $event_start_date, $event_address, $event_desc,
                        $event_end_date, $first_price, $second_price, $ticket_desc);
                $events_combo = $data->get_events();
            }
           
            //check if you're editing an event
             if($event_input=="update"){
                $event_ID = filter_input(INPUT_POST, 'current_record');
                 $event_start_date = filter_input(INPUT_POST, 'dte_start_date');
                $event_end_date = filter_input(INPUT_POST, 'dte_end_date');
                $event_name = filter_input(INPUT_POST, 'txtAlias');
                $event_desc = filter_input(INPUT_POST, 'txtDescription');
                $event_address = filter_input(INPUT_POST, 'txtAddress');
                $ticket_desc = filter_input(INPUT_POST, 'txttickets_infos');
                $first_price = filter_input(INPUT_POST, 'txtdaily_price');
                $second_price = filter_input(INPUT_POST, 'txtweekend_price');
                $event_edited = $data->edit_event($event_ID,$event_name, $event_start_date, $event_address, $event_desc,
                        $event_end_date, $first_price, $second_price, $ticket_desc); 
            }
             //check if you're simply retrieving event details           
            $test_input = filter_input(INPUT_POST, 'isSearch');
            if(isset($test_input)){
                $eveID = filter_input(INPUT_POST, 'cmbEvent');
                $event_details = $data->get_event($eveID);
                $event_input = "update";
            }
            
            if(!isset($event_input)){
               $event_input = "add"; 
            }
             $events_combo = $data->get_events();
             call_stylesheets();
            include'../View/events_details.php';
            break;
        
       
        case 'maintain_sponsors':
            $input_event = filter_input(INPUT_POST, 'event');
            if($input_event =="add"){
                $spon_name = filter_input(INPUT_POST, 'txtsponsor_name');
                $spon_url = filter_input(INPUT_POST, 'txtweb_link');
                $spon_pic = filter_input(INPUT_POST, 'fpsponsor_pic');
               /*Upload image => Send to database*/
                $imagetmp= (file_get_contents($_FILES['fpsponsor_pic']['tmp_name']));
               /*end uploading syntax*/
                $is_added = $data->add_sponsor($spon_name, $spon_url, $imagetmp);
            }elseif($input_event=="update"){
                $spon_id = filter_input(INPUT_POST, 'current_record');
                $spon_name = filter_input(INPUT_POST, 'txtsponsor_name');
                $spon_url = filter_input(INPUT_POST, 'txtweb_link');
                $spon_pic = filter_input(INPUT_POST, 'fpsponsor_pic');
                /*Upload image => Send to database*/
                $imagetmp= (file_get_contents($_FILES['fpsponsor_pic']['tmp_name']));
               /*end uploading syntax*/
                $is_edited = $data->edit_sponsor($spon_id, $spon_name, $spon_url,  $imagetmp);
            }
            
            $search = filter_input(INPUT_POST, 'searcher');
            if(isset($search)!=NULL){
                 $spon_id = filter_input(INPUT_POST, 'cmbsponsors');
                 $spon_details = $data->get_sponsor($spon_id);
                $input_event ="update";
            }
            if(!isset($input_event)){
                $input_event= "add";
            }
            $cmb_data = $data->get_sponsors();
            call_stylesheets();
            include '../View/sponsor_details.php';
            break;
      
        case 'maintain_event_activities':
            $todo = filter_input(INPUT_POST, 'event');
            if (isset($todo)) {
                $event_ID = filter_input(INPUT_POST, 'cmbevents');
                $desc = filter_input(INPUT_POST, 'txtDescription');
                $title = filter_input(INPUT_POST, 'txtTitle');
                $is_added = $data->add_activity($event_ID, $title, $desc);
            }
            $events_combo = $data->get_events();
            call_stylesheets();
            include '../View/event_activities.php';
            break;
            
        case 'edit_event_activities':
            $todo = filter_input(INPUT_POST, 'event');
            if(isset($todo)){
                $eveID = filter_input(INPUT_POST, 'cmbEvent');
                $actTitle = filter_input(INPUT_POST, 'txtTitle');
                $actDesc = filter_input(INPUT_POST, 'txtDescription');
                $eveactID = filter_input(INPUT_POST, 'current_record');
                $is_edited = $data->edit_activity($eveID, $actTitle, $actDesc, $eveactID);
            }
            $events_combo = $data->get_events();
            $activities = $data ->get_activities();
            call_stylesheets();
            include '../View/edit_activities.php';
            break;
            
            case 'admin_login':
                $username = filter_input(INPUT_POST, 'username');
                $password = filter_input(INPUT_POST, 'password');
                if (isset($username) && isset($password)) {
                    $login_admin = $data->admin_login($username, $password);
                     $attempt_login = TRUE;
                }else {
                    $attempt_login = FALSE;
                }
                
                if (!empty($login_admin)) {
                    call_stylesheets();
                    include '../View/event_details.php'; 
                }else{
                include '../View/admin_login.php';
                }
                break;
                /*End Healings section*/
            
            //This case is incorrectly structured, we seriously need to reconfigure it, recall the controller cannot be used as a 
            //html page!! and thus echo cannot be used here to display data to a user, rather use variables.. 
            case 'add_picture':
			$galDesc = filter_input(INPUT_POST,'image_description');
			$galDate = filter_input(INPUT_POST,'image_date');
			$image = addslashes($_FILES['image']['tmp_name']);
		
				if(!isset($image))
				{
					echo "select pic";
				}
				else
				{
					$image = file_get_contents($_FILES['image']['tmp_name']);
					$image_size = getimagesize($_FILES['image']['tmp_name']);
			
					if($image_size == false){
						echo 'This Image Is Not Valid!';
					}
					else{
					$picture=$data->add_picture($image,$galDesc, $galDate);
						echo 'UPLOADED!';
					}
				}
                        call_stylesheets();
			include'../View/gallery_uploads.php';
			break;
        
        case'show_gallery':
			$pictures = $data->get_picture();
                        
			include'../View/gallery.php';
            break;

        
        //Healings pagination attempt...
            case 'paginate': 
                $from = 0;
                $page = filter_input(INPUT_POST, 'page');
                if ($page != 1){ 
                    $from = ($page-1) * 4;                   
                }
                 else{
                     $from=0;                     
                 }
                $vendors = $data->paginate_vendors($from);      
                $total_vendors =  $data->count_vendors();
                
                //Dicatate the page numbers
                $num_page = ceil($total_vendors["Total"]/4);
                //create how the div tag should look like
                $vendor_section ='';
                if(!empty($vendors)){
                foreach ($vendors as $vendor) {
                 $vendor_section.='<div class="card_a">';
                 if($vendor["VenPicture"]==NULL){
                   $vendor_section.='<img src="../pics/Image-not-found.jpg" alt="'. $vendor['VenName'].'" style="width:100%">';   
                 }else{
                    $url =$vendor["VenPicture"];
                    $bas64 = base64_encode($url);
                    $fQIMG = "data:image/jpg;base64,".$bas64;
                   $vendor_section.='<img src="'.$fQIMG.'" alt="'.$vendor['VenName'].'" style="width:250px; height: 250px;">';  
                 }
                 $vendor_section.='<h1>'. $vendor['VenName'].'</h1>
            <p class="title">'. $vendor['VenDescription'].'</p>
            <a href="'. $vendor['VenWebsite'].'"><i class="fa fa-dribbble"></i></a> 
            <a href="'. $vendor['VenTwitter'].'"><i class="fa fa-twitter"></i></a> 
            <a href="'. $vendor['VenInstagram'].'"><i class="fa fa-linkedin"></i></a> 
            <a href="'. $vendor['VenFacebook'].'"><i class="fa fa-facebook"></i></a></div>';
                }
                }else{
                    $vendor_section ="<p>Oops, looks as if we've ran out of of vendors</p>";
                }
                $return_data = array("numPage"=>$num_page, "vendorCards"=>$vendor_section);
                $return_data=json_encode($return_data);
                //can use echo here 
                echo $return_data;
                break;

        
}//End switch 

function call_stylesheets() {
   echo " <head><!-- BOOTSTRAP STYLES-->    <link href='../stylesheets/bootstrap.css' rel='stylesheet' />     <!-- FONTAWESOME STYLES-->    <link href='../stylesheets/font-awesome.css' rel='stylesheet' />        <!-- CUSTOM STYLES-->    <link href='../stylesheets/custom.css' rel='stylesheet' />     <!-- GOOGLE FONTS-->   <link href=http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /></head>";
   include_once '../View/blank.html';
}
