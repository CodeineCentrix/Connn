<?php

/**
 * Description of admin_model
 *
 * @author Haich
 */

class admin_model {
    //put your code here 
    
    public function DetermineLatestEvent() {
        $stored_procedure ="CALL uspDetermineEvent()";
        return DBHelper::GetRow($stored_procedure);
    }
public function add_vendor($venName, $venDescription, $venFacebook, $venTwitter, $venInstagram, $venWebsite,$venPicture)
{
	$query = 'CALL uspAddVendors(:venName, :venDescription,:venFacebook, :venTwitter, :venInstagram, :venWebsite,:venPic)';
	$params = array(
	':venName'=>$venName,
	':venDescription'=>$venDescription,
	':venFacebook'=>$venFacebook, 
	':venTwitter'=>$venTwitter, 
	':venInstagram'=>$venInstagram,
	':venWebsite'=>$venWebsite,	
	':venPic'=>$venPicture);
	return DBHelper::Execute($query, $params); 
}

public function edit_vendor($ven_ID, $venName, $venDescription, $venFacebook, $venTwitter, $venInstagram, $venWebsite,$venPicture)
{
	$query = 'CALL uspUpdateVendor(:venID,:venName, :venDescription,:venFacebook, :venTwitter, :venInstagram, :venWebsite,:venPicture)';
	$params = array(
	':venID'=>$ven_ID,
	':venName'=>$venName,
	':venDescription'=>$venDescription,
	':venFacebook'=>$venFacebook, 
	':venTwitter'=>$venTwitter, 
	':venInstagram'=>$venInstagram,
	':venWebsite'=>$venWebsite,	
	':venPicture'=>$venPicture);
    return DBHelper::Execute($query, $params);
}


     public function add_item_details($item_name, $item_description, $item_quantity, $item_Price)
       {
               $query = 'CALL uspInsertDetails(:item_name, :item_description, :item_quantity, item_Price)';
               $params = array(':item_name'=>$item_name, ':item_description'=>$item_description, ':item_quantity'=>$item_quantity, ':item_Price'=>$item_Price);
               DBHelper::Execute($query, $params);
       }

    public function add_picture($galPic,$galDesc, $galDate)
	{ 
		$query = 'CALL uspAddPicture(:galPic,:galDate,:galDescription)';
		$params = array(
		':galPic'=>$galPic,
		':galDate'=>$galDate,
		':galDescription'=>$galDesc		
		);
		return DBHelper::Execute($query, $params);
	}

/*Region sponsors*/  
    public function get_sponsors() {
        $stored_procedure ="CALL uspGetSponsors";
        return DBHelper::GetAll($stored_procedure);  
    }
    
    public function add_sponsor($spoName, $spoWebsite, $spoPicture) {
        $stored_procedure ="CALL uspAddSponsor(:spoName, :spoWebsite, :spoPicture)";
        $params = array(
         ":spoName" => $spoName,
        ":spoWebsite"=> $spoWebsite,
        ":spoPicture" => $spoPicture
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
     public function edit_sponsor($spoID,$spoName, $spoWebsite, $spoPicture) {
         $stored_procedure ="CALL uspUpdateSponsors(:spoID,:spoName, :spoWebsite, :spoPicture)";
         $params = array(
        ":spoID" => $spoID,
        ":spoName" => $spoName,
        ":spoWebsite"=> $spoWebsite,
        ":spoPicture" => $spoPicture
        );
         return DBHelper::Execute($stored_procedure, $params);
    }
    
    public function get_sponsor($spoID) {
        $stored_procedure ="CALL uspSponsor(:spo_ID)";
        $params = array(
         ":spo_ID" => $spoID   
        );
        return DBHelper::GetRow($stored_procedure, $params);
    }
    /*End sponsors*/
    
   
    /*Region: Events */
    public function add_event($eveName, $eveStartDate, $eveAddress, $eveDescription, $eveEndDate, $ticOnePrice,$ticTwoPrice,$ticDesc) {
        $stored_procedure ="CALL uspAddEvent(:eveName, :eveStartDate, :eveAddress, :eveDescription, :eveEndDate,:ticOnePrice,:ticTwoPrice,:ticDesc)";
        $params = array(
        ":eveName" => $eveName,
        ":eveStartDate" => $eveStartDate,
        ":eveAddress" => $eveAddress,
        ":eveDescription" => $eveDescription,
        ":eveEndDate" => $eveEndDate,
        ":ticOnePrice" => $ticOnePrice,
        ":ticTwoPrice" => $ticTwoPrice,
        ":ticDesc" => $ticDesc
        );
        return DBHelper::Execute($stored_procedure, $params);
    }

    public function edit_event($eveID,$eveName, $eveStartDate, $eveAddress, $eveDescription, $eveEndDate, $ticOnePrice,$ticTwoPrice,$ticDesc) {
        $stored_procedure ="CALL uspEditEvent(:eveID,:eveName, :eveStartDate, :eveAddress, :eveDescription, :eveEndDate,:ticOnePrice,:ticTwoPrice,:ticDesc)";
        $params = array(
        ":eveID"=> $eveID,
        ":eveName" => $eveName,
        ":eveStartDate" => $eveStartDate,
        ":eveAddress" => $eveAddress,
        ":eveDescription" => $eveDescription,
        ":eveEndDate" => $eveEndDate,
        ":ticOnePrice" => $ticOnePrice,
        ":ticTwoPrice" => $ticTwoPrice,
        ":ticDesc" => $ticDesc
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
    public function get_events() {
        $stored_procedure ="CALL uspAllEvents";
        return DBHelper::GetAll($stored_procedure);
    }
    
    public function get_event($eveID) {
        $stored_procedure ="CALL uspEvent(:eveID)";
        $params = array(
         ":eveID" => $eveID
        );

        return DBHelper::GetRow($stored_procedure, $params); 
    }  
    
         public function get_event_date() {
        $stored_procedure ="CALL uspGetDateRange()";
        return DBHelper::GetRow($stored_procedure);
    }
    /*End Events Region*/
 
    
    /*Region Activities*/
    public function add_activity($eveID, $actTitle, $actDesc) {
      $stored_procedure ="CALL uspAddActivity(:eveID, :actTitle, :actDesc)";
      $params = array(
        ":eveID" => $eveID,
        ":actTitle" =>$actTitle,
         ":actDesc" => $actDesc
      );
      return DBHelper::Execute($stored_procedure, $params);
    }
    
    public function get_activities() {
     $stored_procedure ="CALL uspGetActivities()";
     return DBHelper::GetAll($stored_procedure);
    }
    
    public function get_current_activities() {
     $stored_procedure ="CALL uspCurrentActivities()";
     return DBHelper::GetAll($stored_procedure);   
    }
    
    public function edit_activity($eveID, $actTitle,$actDesc, $eveactID ) {
      $stored_procedure ="CALL uspEditActivity(:eveID, :actTitle, :actDesc, :eveactID)";
      $params = array(
          ":eveID"=>$eveID ,
          ":actTitle" => $actTitle ,
          ":actDesc" => $actDesc ,
          ":eveactID" => $eveactID
      );
      return DBHelper::Execute($stored_procedure, $params);
    }
    /*End Region */
    /*Region: business*/
    public function EditBusiness($editBusName , $editBuslogo ,$editBusSlogan,$editBusAddress,$editbusAboutUs,$editBusDateFound)
    {
        $stored_procedure ="CALL `uspUpdateBusiness`(:busName, :busLogo, :busSlogan,"
                . " :busAddressID, :busAboutUs, :busDateFound);";
        $params = array(
            ':busName'=>$editBusName,
            ':busLogo'=>$editBuslogo,
            ':busSlogan'=>$editBusSlogan,
            ':busAddressID'=>$editBusAddress,
            ':busAboutUs'=>$editbusAboutUs,
            ':busDateFound'=>$editBusDateFound
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
       public function EditBusinessName( $editBusName)
    {
        $stored_procedure ="CALL uspUpdateBusiness(:busName);";
        $params = array(
            ':busName'=>$editBusName,
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
    
      public function get_business() {
        $stored_procedure ="CALL uspGetBusiness()";
        return DBHelper::GetRow($stored_procedure);
    }
    /* End business */
    
    //Some of these should actually be in the user_model
    public function get_vendors(){
        $stored_procedure = "CALL uspGetVendors()";
      return DBHelper::GetAll($stored_procedure);
	   
    }
	
	public function get_vendor_by_id($venID){
        $stored_procedure = "CALL uspGetVendorByID(:venID);";
		 $params = array(
          ':venID'=>$venID     
        );
      return DBHelper::GetRow($stored_procedure,$params);
	   
    }
	 public function  get_tickets(){
        $stored_procedure = "CALL uspGetTicket()";
      return DBHelper::GetRow($stored_procedure);
	   
    }
	public function get_picture()
	{
		 $stored_procedure = "CALL uspGetPicture()";
      return DBHelper::GetRow($stored_procedure);
	}
}
