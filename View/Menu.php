
   <div  class="card">
  <svg class="icon-menu" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 250 250">
  <title>Menu</title>
  <g>
    <line class="line line--1" x1="20" y1="30" x2="190" y2="30"></line>
    <line class="line line--2" x1="20" y1="90" x2="150" y2="90"></line>
    <line class="line line--3" x1="20" y1="150" x2="190" y2="150"></line>
  </g>
</svg>
<!-- the menu  drawer or tray-->
<div class="drawer">

    <div class="links">
       
      <div class="link_con">
          <i class="icon fa"><a href="../Controller/index.php?action=admin_login"><img src="https://png.icons8.com/ios/50/000000/login-rounded-right-filled.png"></a></i>
        <p class="para">LOGIN</p>
      </div>
       <div class="link_con">
           <i class="icon fa "><a href="#link_act"><img src="https://png.icons8.com/ios/50/000000/to-do-filled.png"></a></i>
        <p class="para">ACTIVITIES</p>
      </div>
        
        <div class="link_con">
           <i class="icon fa "><a href="#link_map_tickets"><img src="https://png.icons8.com/android/50/000000/marker.png"></a></i>
        <p class="para">MAPS & TICKETS</p>
      </div>
        
            
       <div class="link_con">
           <i class="icon fa "><a href="#link_vendors"><img src="https://png.icons8.com/ios/50/000000/market-square.png"></a></i>
        <p class="para">VENDOR</p>
      </div>
       
       <div class="link_con">
           <i class="icon fa "><a href="#link_sponsors"><img src="https://png.icons8.com/ios/50/000000/crowdfunding-filled.png"></a></i>
        <p class="para">SPONSORS</p>
      </div>
       
        <div class="link_con">
           <i class="icon fa "><a href="."><img src="https://png.icons8.com/ios/50/000000/picture-filled.png"></a></i>
        <p class="para">GALLERY</p>
      </div>
        
        <div class="link_con">
           <i class="icon fa "><a href="."><img src="https://png.icons8.com/ios/50/000000/about-filled.png"></a></i>
        <p class="para">ABOUT US</p>
      </div>
        
    </div>
</div>
   </div>
    <script>
$('.icon-menu').on('click', function() {
 $(this).toggleClass('clicked');
  $('.line').toggleClass('active');
  $('.line--2').toggleClass('clicked');
  $('.line--1').toggleClass('clicked');
  $('.line--3').toggleClass('clicked');
  
   $('.drawer').toggleClass('clicked');
  $('.link_con').toggleClass('clicked');
  $('.card').toggleClass('clicked');

});

$('.menu').on('click', function() {

  $(this).toggleClass('clicked');
  $('.drawer').toggleClass('clicked');
  $('.link_con').toggleClass('clicked');
  $('.card').toggleClass('clicked');

});
</script>

