<!DOCTYPE html>
<html>
<?php
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
include 'hotel_menu_details.php';
$hotel_menu_details = new Hotel_menu_details(); // hotel name,address,phonenumber are in araay
$hotel_details= $hotel_menu_details ->hotel_details();
?>
<body>

    <header id="header" class="full_width clear">
<div class="wrapper row1">

    <hgroup>
      <h1><?php echo $hotel_details['HotelName'];?></h1>
      <h2>We make foods,,,</h2>
    </hgroup>
    <div id="header-contact">
      <ul class="list none">
        <li><span class="icon-envelope"></span> <a href="#">info@domain.com</a></li>
        <li><span class="icon-phone"></span><?php echo $hotel_details['Phonenumber'];?></li>
      </ul>
    </div>

</div>
  </header>


</html>