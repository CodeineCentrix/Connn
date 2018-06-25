<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Event Management Page</title>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQk0d2TXWcrEPgbSK2wsdcwBpzkT6iGYg&libraries=places&callback=initAutocomplete"
         async defer></script>
         <link rel="stylesheet" href="../stylesheets/admin_pages.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <style>        

         </style>
    </head>
    <body>
        <div><?php include '../View/admin_header.txt'; ?></div>
        <h1 class="string">Events Management Page</h1>
        <p class="string fa fa-info-circle ">This page is used to create, maintain and update con.ect events</p>
        <?php if(isset($event_added)==TRUE):?>
        <?php if($event_added===TRUE):?>
        <p class="isa_success">Event has been Successfully added!</p>
        <?php elseif($event_added===FALSE): ?>
        <p class="isa_error">unfortunately, the event couldn't be added... Try again later. </p>
        <?php endif; ?>
        <?php endif;?>
        
        <?php if(isset($event_edited)==TRUE):?>
        <?php if($event_edited===TRUE):?>
        <p class="isa_success">Event has been Successfully edited!</p>
        <?php elseif($event_edited==FALSE): ?>
        <p class="isa_error">unfortunately, the event couldn't be edited... Try again later. </p>
        <?php endif; ?>
        <?php endif;?>
        <div class="create_event region"> 
            
                
        <h1>Plan the event here</h1>
        
        
        <div class="float_right">
            <h1>Edit an existing event</h1>
            <label>Choose the Event</label>
            <form METHOD="POST" action="../Controller/index.php?action=maintain_events">
                
            <select name="cmbEvent">
                <?php foreach ($events_combo as $ss): ?>
                <option value="<?php echo $ss["EveID"];?>"><?php echo $ss["EveName"];?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="hidden" value="search_event" name="isSearch">
            <input type="submit" value="Get Event Details">
            </form>
            
        </div>
        
        <form method="POST" action="../Controller/index.php?action=maintain_events">
            <input type="hidden" name="event" value="<?php echo "$event_input"; ?>">
        <label>Enter the event start date <br> </label>
        <input  type="date" required name="dte_start_date" id="start_date" value="<?php echo isset($event_details)?$event_details["EveStartDate"]:NULL; ?>"><br>
        <label>Enter the event end date<br></label>
        <input type="date" required name="dte_end_date" id="end_date" value="<?php echo isset($event_details)?$event_details["EveEndDate"]:NULL; ?>"><br>
        <label>Enter the event alias name<br></label>
        <input type="text" name="txtAlias" required id="txtAlias" value="<?php echo isset($event_details)?$event_details["EveName"]:NULL; ?>"><br>
        <label>Enter the event description below<br></label>
        <textarea name="txtDescription" required>
         <?php echo isset($event_details)?$event_details["EveDescription"]:NULL; ?>   
        </textarea><br>
        
        <label>Enter the event address <br></label>
        <input id="pac-input" class="contros" name="txtAddress" type="text" placeholder="Enter event Address here" value="<?php echo isset($event_details)?$event_details["EveAddress"]:NULL; ?>">
        <div id="map"></div><br>
        <label>Enter ticket information below<br></label>
        <label>Where will the tickets be sold?<br> </label>
        <textarea required name="txttickets_infos">
         <?php echo isset($event_details)?$event_details["TicDescription"]:NULL; ?>  
        </textarea><br>
        <label>Price for Daily Ticket<br></label>
        <input type="number" required name="txtdaily_price" value="<?php echo isset($event_details)?$event_details["TicPriceNormalPass"]:NULL; ?>"><br>
        <label>Price for Weekend Pass<br></label>
        <input type="number" required name="txtweekend_price" value="<?php echo isset($event_details)?$event_details["TicPriceWeekendPass"]:NULL; ?>"><br>
        <input type="hidden" name="current_record" value="<?php echo isset($event_details)?$event_details["EveID"]:NULL; ?>"> 
        <input type="submit" value="Submit Event">
            
            </form>
<!-- The script required to create the map search capability, important for you not to alter stuff -->
        <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
        </div>
    </body>
</html>
