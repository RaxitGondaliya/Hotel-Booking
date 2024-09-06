<?php
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - ROOMS</title>
    
  <?php require('include/links.php')?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
</head>
<body class="bg-light">
<!---------------- header ---------------> 
    <?php require('include/header.php')
?>

    <div class="my-5 px-4">
        <h2 Class=" fw-bold h-font text-center"> OUR ROOMS</h2>
        <div class="h-line bg-dark"></div>
    </div>

<!---------------------------- hotel --------------------------------->
    <div class="container">
        <div class="row"> 

                <div class="col-lg-12 col-md-12 px-4">   
                
                <?php
                    require('include/dbconfig.php');
                    // Retrieve hotel_id from the URL
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];

                        // Query to fetch hotel details based on the hotel_id
                        $query = "SELECT * FROM hotel_list WHERE id = '$id'";
                        $query_run = mysqli_query($connection, $query);

                        // Check if hotel details are found
                        if(mysqli_num_rows($query_run) > 0) {
                            $row = mysqli_fetch_assoc($query_run);
                            // Display hotel details here
                            // Example:
                ?>

                <div class="card mb-4 border-0 shadow" >
                    <div class="row g-0 p-3 ">
                        <h4 class="mb-2 mt-1 ms-3"><?php echo $row['hotel_name'] ?> </h4>
                        <h6 class="mb-3 mt-1 ms-2 "> 
                            <img src="https://cdn-icons-png.flaticon.com/128/2838/2838912.png" height="18px" width="18px"></img> 
                            <?php echo $row['address'] ?>
                        </h6>
                        
                            <div class="col-md-6 mb-lg-0 mb-md-0 mb-3 " style="height: 350px; width: 600px;">
                                <img src="<?php echo $row['hotel_img'] ?>" class="img-fluid " style="height: 100%; width: 100%;"></img>
                            </div>
                            
                            <div class="col-md-5 d-flex flex-column ms-md-5">

                                <hr width="100%">

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 style="color:#0496C7;">Deluxe Studio Room</h5>
                                        <h6></h6>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="mb-1 ">₹<?php echo $row['room_price'] ?></h5>
                                        <h6 class="mb-1 "></h6>
                                        <h6 class="mb-1 "> base price(Per Night)</h6>
                                    </div>
                                </div>

                                <hr width="100%"> 

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span ><img src="https://cdn-icons-png.flaticon.com/128/2693/2693710.png" height="18px" width="18px"></img></span>
                                        <span class="ms-2"> Check-in : 12:00 PM</span>
                                    </div>
                                    <div>
                                        <span ><img src="https://cdn-icons-png.flaticon.com/128/2693/2693710.png" height="18px" width="18px"></img></span>
                                        <span class="ms-2"> Check-in : 11:00 AM</span>
                                    </div>
                                </div>  

                                <hr width="100%">

                                <div class="d-flex justify-content-between">
                                    <span> WiFi </span>
                                    <span> Heater </span>
                                    <span> Food </span>
                                    <span> Spa </span>
                                    <span> Ac </span>
                                </div>

                                <hr width="100%">

                                <div class="d-flex mt-3">
                                    <a href="#rooms" class="btn btn-sm w-100 shadow-none border-primary bg-white text-primary fw-bold" style="font-size:20px;background-color:orange;border-radius:15px;">Select  Room</a>

                                    <!-- Your "Book Now" button code with login check -->
                                        <?php

                                        /*$checkInDate = $_GET['check_in'];
                                        $checkOutDate = $_GET['check_out'];
                                        $adults = $_GET['adults'];
                                        $children = $_GET['children'];*/

                                        $checkInDate = isset($_GET['check_in']) ? $_GET['check_in'] : '';
                                        $checkOutDate = isset($_GET['check_out']) ? $_GET['check_out'] : '';
                                        $adults = isset($_GET['adults']) ? $_GET['adults'] : '';
                                        $children = isset($_GET['children']) ? $_GET['children'] : '';


                                        if (isset($_SESSION['user_id'])) {
                                            // User is logged in, show the Book Now button
                                            echo '<a href="#rooms" id=' . $row['id'] . '&check_in=' . $checkInDate . '&check_out=' . $checkOutDate . '&adults=' . $adults . '&children=' . $children . '" style="text-decoration:none;color:black;">';
                                            echo '<button type="submit" name="submit" class="btn btn-sm w-100 shadow-none coustem-bg text-black fw-bold ms-3" style="font-size:20px;border-radius:15px;">Book Now</a></button>';
                                        } else {
                                            // User is not logged in, show the login modal trigger
                                            echo '<button type="button" class="btn btn-sm w-100 shadow-none coustem-bg text-black fw-bold ms-3" style="font-size:20px;border-radius:15px;" data-bs-toggle="modal" data-bs-target="#loginModal">Book Now</button>';
                                        }
                                        ?>


                                </div>
   
                            </div>  
                    </div>
                </div>
                    <script>
                        function viewDetailsClicked() {
            var isUserLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
            if (!isUserLoggedIn) {
                Swal.fire({
                    icon: "info",
                    title: "Not Logged In",
                    text: "You need to be logged in to view details.",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
                return false;
            }
            return true;
        }
                    </script>
                <?php
                    } else {
                        echo "Hotel details not found";
                    }
                    }
                ?>
            </div>

        </div>
    </div>

<!---------------------------- nevbar ------------------------------->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm ">
          <button class="navbar-toggler shadow-none ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link fw-bold" aria-current="" href="#rooms">Rooms</a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link me-2 fw-bold" href="#amenities">Amenities</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="#location">Location</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="#booking_Policy">Booking Policy</a>
              </li>
            </ul>
          </div>
        </nav>
    </div>
    
<!----------------------------- other room -------------------------------->
    <div id="rooms">
        <div class="container mt-4">
            <div class="row justify-content-center "> 

                <div class="col-lg-9 col-md-12 px-4">  
                  
                <?php
                require('include/dbconfig.php');
                // Retrieve hotel_id from the URL
                if(isset($_GET['id'])) {
                    $hotel_id = $_GET['id'];

                    // Query to fetch all rooms for the selected hotel
                    $query = "SELECT * FROM room_list WHERE hotel_id = '$hotel_id'";
                    $query_run = mysqli_query($connection, $query);

                    // Check if rooms are found
                    if(mysqli_num_rows($query_run) > 0) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            // Display room details here
                            // Example:
            ?>

                    <div class="card mb-4 border-0 shadow" >
                        <div class="row g-0 p-3 ">
                            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3"style="height: 270px; width: 370px;" >
                                <img src="<?php echo $row['room_img'] ?>" style="height: 100%; width: 100%;" class="img-fluid rounded" ></img>
                            </div>
                            
                            <div class="col-md-4 px-lg-3 px-md-3 px-0 ">
                                <div class="  mt-2 "  style=" padding:3px 6px;  "> 
                                    <hr width="100%">
                                    <h5 class="mb-1 "><?php echo $row['room_name'] ?></h5>
                                    <hr width="100%">
                                </div>
                                <div class=" mt-1 ms-2">
                                    <h6 class="ms-2">Room Facilities</h6>
                                    <div class="ms-2">
                                        <span><img src="https://hotel.easemytrip.com/newhotel/img/amenities/hairdryer.svg"></span>
                                        <span class="ms-2"> hairdryer </span>
                                    </div>
                                    <div class="ms-2">
                                        <span><img src="https://hotel.easemytrip.com/newhotel/img/amenities/air-conditioning-centrally regulated.svg"></span>
                                        <span class="ms-2"> air-conditioning-centrally </span>
                                    </div>
                                    <div class="ms-2">
                                        <span><img src="https://hotel.easemytrip.com/newhotel/img/amenities/tv.svg"> </span>
                                        <span class="ms-2">Tv </span>
                                    </div>
                                    <div class="ms-2">
                                        <span><img src="https://hotel.easemytrip.com/newhotel/img/amenities/double-bed.svg"></span>
                                        <span class="ms-2"> double-bed</span>
                                    </div>
                                    <div class="ms-2">
                                        <span><img src="https://hotel.easemytrip.com/newhotel/img/amenities/tea-coffee-maker.svg"></span>
                                        <span class="ms-2"> tea-coffee-maker</span>
                                    </div>                              
                                </div>
                            </div>

                            <div class="col-md-3 d-flex flex-column  text-center">
                                <div class="  mt-2 "  style=" padding:3px 6px;  "> 
                                <hr width="100%">
                                    <h5 class="mb-1 ">per Night price </h5>
                                    <hr width="100%">
                                </div>
                                <div class=" text-end justify-content-end mt-1">
                                    <h5 class="mb-1 ">₹ <?php echo $row['room_price'] ?> </h5>
                                    <h6 class="mb-1 "></h6>
                                    <h6 class="mb-1 "> base price(Per Night)</h6>   
                                    
                                    
                                    <!-- <a href="booking.php?id=<?php echo $row['id']; ?>" style="text-decoration:none;color:black;"><button type="submit" name="submit" class="btn btn-sm w-100 coustem-bg shadow-none mt-5 fw-bold" style="font-size:20px;border-radius:10px;">Book Now</a></button> -->

                                    <?php
                                        $checkInDate = isset($_GET['check_in']) ? $_GET['check_in'] : '';
                                        $checkOutDate = isset($_GET['check_out']) ? $_GET['check_out'] : '';
                                        $adults = isset($_GET['adults']) ? $_GET['adults'] : '';
                                        $children = isset($_GET['children']) ? $_GET['children'] : '';

                                        if (isset($_SESSION['user_id'])) {
                                            // User is logged in, show the Book Now button
                                            echo '<a href="booking.php?id=' . $row['id'] . '&check_in=' . $checkInDate . '&check_out=' . $checkOutDate . '&adults=' . $adults . '&children=' . $children . '&hotel_id='. $hotel_id . '" style="text-decoration:none;color:black;">';
                                            echo '<button type="submit" name="submit" class="btn btn-sm w-100 coustem-bg shadow-none mt-5 fw-bold" style="font-size:20px;border-radius:10px;;">Book Now</button></a>';
                                        } else {
                                            // User is not logged in, show the login modal trigger
                                            echo '<button type="button" class="btn btn-sm w-100 coustem-bg shadow-none mt-5 fw-bold" style="font-size:20px;border-radius:10px;;" data-bs-toggle="modal" data-bs-target="#loginModal">Book Now</button>';
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    
                    <script>
                        function viewDetailsClicked() {
                        var isUserLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
                        if (!isUserLoggedIn) {
                            Swal.fire({
                                icon: "info",
                                title: "Not Logged In",
                                text: "You need to be logged in to view details.",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "OK"
                                });
                                return false;
                            }
                            return true;
                        }
                    </script>
                <?php
                    }} else {
                        echo "rooms not available";
                    }
                    }
                    
                ?>
                </div> 

            </div>
        </div>
    </div>

<!------------------------------AMENITIES------------------------------->
    <div id="amenities">
        <div class="container">
            <div class="row"> 

                <div class="col-lg-12 col-md-12"> 
                    <div class="card mb-4 border-0 shadow mt-3">
                
                        <div class="row g-0 p-3 ">
                            <h5 class="mb-1 mt-1 ms-3">AMENITIES</h5>
                            <hr width="100%">
                            <div class="">
                                <div class="d-md-flex justify-content-between mt-2 ">
                                    <h6 class="ms-2 mt-2">Facilities</h6>
                                    <!--span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/Facilities.svg" height="50px" width="50px" class="ms-0"> </img></span-->
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/bars.svg"> Bar</span>
                                    <span class="ms-2"> <img src="https://hotel.easemytrip.com/newhotel/img/amenities/restaurants.svg">restaurants</span>
                                    <span class="ms-2"> <img src="https://hotel.easemytrip.com/newhotel/img/amenities/conference-room.svg">conference-room </span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/internet-access.svg"> internet-access </span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/wlan-access.svg"> wlan-access </span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/room-service.svg"> room-service </span>
                                </div>
                                <hr width="100%">

                                <div  class="d-md-flex justify-content-between mt-2 ">
                                    <h6 class="ms-2">Meals</h6>
                                    <!--span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/Meals.svg" height="50px" width="50px" class="amenity-group-col"> </img></span-->
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/breakfast-buffet.svg"> breakfast-buffet</span> 
                                    <span></span>  
                                    <span></span>
                                    <span></span>
                                    <span></span>   
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span> 
                                    <span></span>
                                    <span></span>                         
                                </div>
                                <hr width="100%">

                                <div  class="d-md-flex justify-content-between mt-2 ">
                                    <h6 class="ms-2">Object Information</h6>
                                    <!--span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/Object-Information.svg" class="amenity-group-col"> </img></span-->
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/fax.svg">fax </span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/telephone-hotel.svg"> telephone-hotel </span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span> 
                                </div>
                                <hr width="100%">

                                <div  class="d-md-flex justify-content-between mt-2 ">
                                    <h6 class="ms-2">Room Facilities</h6>
                                    <!--span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/Room-Facilities.svg" class="amenity-group-col"> </img></span-->
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/bathroom.svg">bathroom </span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/shower.svg"> shower </span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/hairdryer.svg"> hairdryer </span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/air-conditioning-centrally regulated.svg"> air-conditioning-centrally </span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/tv.svg"> Tv </span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/double-bed.svg"> double-bed</span>
                                    <span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/tea-coffee-maker.svg">tea-coffee-maker </span>                                
                                </div>
                                <hr width="100%">

                                <div class="d-md-flex justify-content-between mt-2 ">
                                    <h6 class="ms-2 mb-2">Sport/Entertainment</h6>
                                    <!--span class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/Sport-Entertainment.svg" class="amenity-group-col"> </img></span-->
                                    <span  class="ms-2" ><img src="https://hotel.easemytrip.com/newhotel/img/amenities/number-of pools.svg"> number of pools </span>
                                    <span  class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/steam-bath.svg">steam bath </span>
                                    <span  class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/massage.svg"> massage</span>
                                    <span  class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/gym.svg"> gym</span>
                                    <span  class="ms-2"><img src="https://hotel.easemytrip.com/newhotel/img/amenities/sauna.svg"> sauna </span>
                                </div>                           
                            </div>
                            <div class=" text-center justify-item-center">
                                    
                            </div>   
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
       
<!------------------------------Location------------------------------------>
    <div id="location">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                <?php
                    require('include/dbconfig.php');
                    // Retrieve hotel_id from the URL
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];

                        // Query to fetch hotel details based on the hotel_id
                        $query = "SELECT * FROM hotel_list WHERE id = '$id'";
                        $query_run = mysqli_query($connection, $query);

                        // Check if hotel details are found
                        if(mysqli_num_rows($query_run) > 0) {
                            $row = mysqli_fetch_assoc($query_run);
                            // Display hotel details here
                            // Example:
                ?>
                    <div class="card mb-4 border-0 shadow mt-3">
                        <div class="row g-0 p-3">
                        <h5 class="mt-1 ms-3 mb-2">Location</h5>
                            <div class=" col-lg-12 col-md-12">
                                <iframe class="w-100 rounded mb-4 " height="500px" width="600px" src="<?php echo $row['location'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php
                    } else {
                        echo "Hotel details not found";
                    }
                    }
                ?>
            </div>
        </div>  
    </div>

<!------------------------------Booking Policy------------------------------->
    <div id="booking_Policy">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-3">
                        <div class="row g-0 p-3">
                            <div class="col-lg-12">
                                <h5 class="mt-2">Booking Policy</h5>
                                    <p> ● As per the government regulations, every guest above the 18 years has to carry a valid Photo ID. The identification proofs can be Driving License, Voters Card, Passport and Ration Card. Without valid ID, guests will not be allowed to check in.
                                    <p> ● Travelnest.com will not be responsible for the check-in denied by the hotel due to the above-mentioned reason.
                                    <p> ● The primary guest checking-in to the hotel must be minimum of 18 years old. Children accompanying adults may be between 1 and 12 years.
                                    <p> ● Guests will be charged for extra bed, food and other facilities which are not mentioned in the booking and may vary as per the hotel.
                                    <p> ● If an extra bed is included in your booking, you may be provided with a folding cot or a mattress as an extra bed (depends on hotel).
                                    <p> ● Generally, check-in / check-out time varies from hotel to hotel and can be checked on the confirmation voucher, However, for early check-in or late check-out, you are advised to confirm the same directly from the concerned hotel.
                                    <p> ● The room tariff is inclusive of all taxes but the amount paid does not include charges for any additional services and facilities (such as room service, mini bar, snacks or telephone calls). These services will be charged by the hotel at the time of check-out.
                                    <p> ● If the hotel denies accommodation to the guests posing as a 'couple' on not providing suitable ID proof, Travelnest.com will not be responsible for this condition and won’t provide any refund for such bookings.
                                    <p> ● The hotel reserves the right to decline accommodation to locals/city residents. Travelnest.com will not be responsible for any check-in declined by the hotel or any refunds due to the above-mentioned reason.
                                    <p> ● For any modifications, users have to pay applicable cancellation/modification charges. Modified bookings will be subject to availability and may depend on the booking policy of the hotel. The cancellation/modification charges are standard and any waiver is on the discretion of the hotel.
                                    <p> ● In case of cancellation or modification, entire benefit (discount / cash back) on the actual booking amount will be forfeited.
                                    <p> ● Travelnest.com reserves the right, at any time, without prior notice and liability and without assigning any reason whatsoever, to add/alter/modify/change or vary all of these terms and conditions or to replace, wholly or in part, this offer by another offer, whether similar to this offer or not, or to extend or withdraw it altogether.
                                    <p> ● In case of partial/full cancellation, the offer stands void, and the discount / cash back will be rolled back before processing the refunds.
                                    <p> ● Gala dinner charges which are applicable for Christmas and New Year dates would be extra and payable directly to the hotel. Please check with the hotel directly for more information on the same.
                                    <p> ● In case of any amendment (date change) in your hotel reservation, Travelnest.com would inform and advise you about the availability and applicable new rates.
                                    <p> ● If payment has been received by credit/debit card, the refund shall be credited to the same card by which the payment was received. For all other cases, the refund will be made by Account Payee Cheque only.
                                    <p> ●  Guests are requested to read the terms & conditions before making any booking under the offers running on Travelnest.com.
                                    <p> ● If any city taxes applicable then it will be directly payable to hotel. For more information, kindly connect with hotelier directly.
                                    <p> ● All the information pertaining to the hotel including the category of the hotel, images, room type, amenities and facilities available at the hotel are as per the information provided by the hotel to Travelnest.com. This information is for reference only. Any discrepancy that may exist between the website pictures and actual settings of the hotel shall be raised by the User with the hotel directly, and shall be resolved between the User and hotel. Travelnest.com will have no responsibility in that process of resolution, and shall not take any liability for such discrepancies.
                                    <p> ● Refund, if any shall be processed by Travelnest.com to the customer only upon receipt of the same from the concerned Hotel.
                                    <p> ● For any query or clarification, please write to us at care@Travelnest.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!------------------------------Similar Hotels------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="row g-0 p-3">
                        
                        <h5 class="mt-2">Similar Hotels</h5>

                        <?php
                            require('include/dbconfig.php');

                            // Retrieve hotel_id from the URL
                            if(isset($_GET['id'])) {
                                $id = $_GET['id'];

                                // Query to fetch hotel details based on the hotel_id
                                $query = "SELECT * FROM hotel_list WHERE id = '$id'";
                                $query_run = mysqli_query($connection, $query);

                                // Check if hotel details are found
                                if(mysqli_num_rows($query_run) > 0) {
                                    $row = mysqli_fetch_assoc($query_run);
                                    $selectedCity = $row['city_id'];

                                    // Query to fetch similar hotels from the same city but excluding the selected hotel
                                    $query = "SELECT * FROM hotel_list WHERE city_id = '$selectedCity' AND id != '$id'";
                                    $query_run = mysqli_query($connection, $query);

                                    // Check if similar hotels are found
                                    if(mysqli_num_rows($query_run) > 0) {
                                        // Display similar hotels
                                        while($row = mysqli_fetch_assoc($query_run)) {
                        ?>

                        <div class="col-lg-3 col-md-6 my-3">
                            <div class="card border-0 shadow" style="max-width: 300px;">
                                <img src="<?php echo $row['hotel_img'] ?>" class="card-img-top">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><?php echo $row['hotel_name'] ?></h5>
                                            
                                        </div>
                                        <div>
                                        <span class="badge rounder-pill bg-light">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </span>
                                        </div>
                                    </div>
                                
                                    <div class="d-flex justify-content-between mb-3 ms-2 mt-3">
                                        <div class="  justify-content-end ">
                                            <h5 class="mb-1 "><?php echo $row['room_price'] ?> </h5>
                                            <h6 class="mb-1 ">(Per Night)</h6>
                                        </div>
                                        <div class="  justify-content-end mx-3 mt-2">
                                            <!-- <span><a href="booking.php?id=<?php echo $row['id']; ?>" class="btn btn-sm text-white coustem-bg shadow-none" style="font-size:15px;">Boook Now</a></span> -->
                                            <a href="rooms.php?id=<?php echo $row['id']; ?>&selected_city=<?php echo $selectedCity; ?>&check_in=<?php echo $checkInDate; ?>&check_out=<?php echo $checkOutDate; ?>&adults=<?php echo $adults; ?>&children=<?php echo $children; ?>" class="text-decoration-none">
                                                <button type="submit" name="submit" class="btn btn-sm text-white coustem-bg shadow-none" style="font-size:15px;">
                                                    View Room
                                                </button>
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                                        }
                                    } else {
                                        echo "No similar hotels found in the same city.";
                                    }
                                } else {
                                    echo "Selected hotel details not found.";
                                }
                            }
                        ?>

                        <!--div class="col-lg-3 col-md-6 my-3">
                            <div class="card border-0 shadow" style="max-width: 300px;">
                                <img src="https://img.easemytrip.com/EMTHotel-1415174/72/l/l/2083052/158303973_P.jpg"  class="card-img-top">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>Hotel Noida</h5>
                                            <h6 class="mb-2">Kasindra-Ahemdabad</h6>
                                        </div>
                                        <div>
                                        <span class="badge rounder-pill bg-light">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </span>
                                        </div>
                                    </div>
                                
                                    

                                    <div class="d-flex justify-content-between mb-3 ms-2 mt-3">
                                        <div class="  justify-content-end ">
                                            <h5 class="mb-1 ">₹3,350/- </h5>
                                            <h6 class="mb-1 "> (Per Night)</h6>
                                        </div>
                                        <div class="  justify-content-end mx-3 mt-2">
                                            <span><a href="booking.php" class="btn btn-sm text-white coustem-bg shadow-none" style="font-size:15px;">Boook Now</a></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div-->
         
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--------------- footer -------------------->
    <?php require('include/footer.php')?>
</body>
</html>