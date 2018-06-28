/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('document').ready(function() {
	
  


$('#pagination a').click( function() { // When click on a 'a' element of the pagination div
 window.alert("Click event just Happened");
        var page = 1; // Page number is the id of the 'a' element
	var pagination = ''; // Init pagination
        window.alert("The page number is "+page);
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
                    window.alert("Error"+error+"Status"+status);
		}
	});
	return false;
});

$("#pagination a").trigger('click'); // When page is loaded we trigger a click
});


