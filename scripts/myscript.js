/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('document').ready(function() {
	
$('#pagination a').click( function() { // When click on a 'a' element of the pagination div
        var page = this.id; // Page number is the id of the 'a' element
	var pagination = ''; // Init pagination
        $('#vendors_area').html('<div class="loader"></div>'); // Display a processing div
	var data = {page: page, per_page: 4,action:'paginate'}; // Create JSON which will be sent via Ajax
	// We set up the per_page var at 4. You may change to any number you need.
        $.ajax({ // jQuery Ajax
		type: 'POST',
		url: '../Controller/index.php', // URL to the PHP file which will insert new value in the database
		data: data, // We send the data string
		dataType: 'json', // Json format
		timeout: 120000,
		success: function(data) {
                    $('#vendors_area').html(data.vendorCards); // We update the vendors DIV with the article list
                
        
        // Pagination system
			if (page == 1) pagination += '<div class="cell_disabled"><span>First</span></div><div class="cell_disabled"><span>Previous</span></div>';
			else pagination += '<div class="cell"><a href="#" id="1">First</a></div><div class="cell"><a href="#" id="' + (page - 1) + '">Previous</span></a></div>';
 
			for (var i=parseInt(page)-3; i<=parseInt(page)+3; i++) {
				if (i >= 1 && i <= data.numPage) {
					pagination += '<div';
					if (i == page) pagination += ' class="cell_active"><span>' + i + '</span>';
					else pagination += ' class="cell"><a href="#" id="' + i + '">' + i + '</a>';
					pagination += '</div>';
				}
			}
 
			if (page == data.numPage) pagination += '<div class="cell_disabled"><span>Next</span></div><div class="cell_disabled"><span>Last</span></div>';
			else pagination += '<div class="cell"><a href="#" id="' + (parseInt(page) + 1) + '">Next</a></div><div class="cell"><a href="#" id="' + data.numPage + '">Last</span></a></div>';
			
			$('#pagination').html(pagination); // We update the pagination DIV
		},
		error: function(error , status) {
                   // window.alert("Error"+error+"Status"+status);
		}
	});
	return false;
});

$("#pagination a").trigger('click'); // When page is loaded we trigger a click
});

function checkdate(input){
var start = document.getElementById("start_date").value;
var end = document.getElementById("end_date").value;

//change to date objects and compare with each other via miliseconds
start  = Date.parse(start);
end = Date.parse(end);
// if statement to compare the two different miliseconds 

	if(end <= start){
	//clear date fields and send error message
	document.getElementById("start_date").value ="";
	document.getElementById("end_date").value="";
	document.getElementById("date_error").innerHTML = "Incorrect end date because it is greater than the start date";
	document.getElementById("date_error").className ="isa_error";
    }else{
         document.getElementById("date_error").innerHTML = "";
         document.getElementById("date_error").className ="";
	 // new objective is to perform an ajax reqest to see if the dates are actally valid and dont exist
	var start = document.getElementById("start_date").value;
        var end = document.getElementById("end_date").value;
        openNav();
        var data = {start_date: start, end_date: end, action:"validate_event_date"};
        $.ajax({
           type: 'POST',
           url:'../Controller/index.php',
           data: data,
           dataType: 'json', // Json format
            timeout: 120000,
           cache:false,
           success: function(data){
               //read data and determine what to do with it             
               if(data.IsExist==true){
        document.getElementById("date_error").innerHTML = "The "+start +" till "+end+"  date range already exists<br>(duplication of dates - fatal error)";
	document.getElementById("date_error").className ="isa_error";
        document.getElementById("start_date").value ="";
	document.getElementById("end_date").value="";
        
               }else{
        document.getElementById("date_error").innerHTML = "";
	document.getElementById("date_error").className ="";   
              }
              
              closeNav();
           },
           error: function(){
               //display error message like no network etc
        document.getElementById("date_error").innerHTML = "An unclear error occured, please check network connectivity and try again<br>if this error persists report to developers";
	document.getElementById("date_error").className ="isa_error";
        document.getElementById("start_date").value ="";
	document.getElementById("end_date").value="";
               closeNav();
           }
        });
	}
}

function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}


