<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel -Booking</title>
    
  <?php require('include/links.php')?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
</head>
<body class="bg-light">
    <!---------------- header ---------------> 
        <?php require('include/header.php') ?>

     <div class="my-5 px-4">
        <h2 Class=" fw-bold h-font text-center">BOOKING</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row">
            
            <!------------------left side -------------------->

                <div class="col-lg-6 col-md-6 px-4 mt-3" >
                    <div class="card mb-4 border-0 shadow" >
                        <div class="row g-0 p-3"> 
                            <div class="col-md-12 mb-lg-0 mb-md-0 mb-3 " style="height:74vh;">
                                <!---------------------------- hotel --------------------------------->
                                
                                <?php
                                    require('include/dbconfig.php');
                                    // Retrieve hotel_id from the URL
                                    if(isset($_GET['hotel_id'])) {
                                        $hotel_id = $_GET['hotel_id'];

                                        // Query to fetch hotel details based on the hotel_id
                                        $query = "SELECT * FROM hotel_list WHERE id = '$hotel_id'";
                                        $query_run = mysqli_query($connection, $query);

                                        // Check if hotel details are found
                                        if(mysqli_num_rows($query_run) > 0) {
                                            $row = mysqli_fetch_assoc($query_run);
                                            // Display hotel details here
                                            // Example:
                                    ?>

                                    <div>
                                        <h4 class="mb-2 mt-1 ms-3"><?php echo $row['hotel_name'] ?> </h4>
                                        <h6 class="mb-3 mt-1 ms-2 "> 
                                            <img src="https://cdn-icons-png.flaticon.com/128/2838/2838912.png" height="18px" width="18px"></img> 
                                            <?php echo $row['address'] ?>
                                        </h6>
                                        <hr width="100%">
                                    </div>                           

                                <?php
                                    }    else {
                                        echo "Hotel details not found";
                                    }

                                    }
                                ?>

                                <!---------------------------- room --------------------------------->

                                <?php
                                    require('include/dbconfig.php');
                                    // Retrieve hotel_id from the URL
                                    if(isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    // Query to fetch hotel details based on the hotel_id
                                    $query = "SELECT * FROM room_list WHERE id = '$id'";
                                    $query_run = mysqli_query($connection, $query);

                                    // Check if hotel details are found
                                    if(mysqli_num_rows($query_run) > 0) {
                                        $row = mysqli_fetch_assoc($query_run);
                                        // Display hotel details
                                ?>
        
                                <div class="d-flex justify-content-between ">
                                    <div class="ms-2">   
                                        <h5 class="mb-1 ">  <?php echo $row['room_name'] ?></h5> 
                                        <h6> Room No : <?php echo $row['room_no'] ?></h6> 
                                        <div class="mt-3"><img src="<?php echo $row['room_img'] ?>" class="img-fluid" height="300px" width="400px"></div>                                                                       
                                    </div>
                                        
                                    <div class=" ">
                                        <h5 class="mb-1" id="room-price">₹<?php echo $row['room_price'] ?>(per Night) </h5>                                                                   
                                    </div>
                                    
                                </div>
                                

                                
                                <?php
                                    } else {
                                        echo "rooms not available";
                                    }
                                    }
                                ?>

                            </div>                            
                        </div>
                    </div>
                </div>


            <!------------------right side -------------------->
            
            <?php
                $checkInDate = $_GET['check_in'];
                $checkOutDate = $_GET['check_out'];
                $adults = $_GET['adults'];
                $children = $_GET['children'];
                
            ?>

            <?php
            // Assuming you have already started the session
            require('include/dbconfig.php');

            // Retrieve user information from the registration table
            $userEmail = $_SESSION['userlogin'];

            if ($userEmail) {
                $query = "SELECT username, email FROM registration WHERE email = '$userEmail'";
                $result = mysqli_query($connection, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    $userName = $user['username'];
                    // $userEmail = $user['email'];
                } else {
                    // Handle if user information is not found
                    $userName = '';
                    $userEmail = '';
                }
            } else {
                // Handle the case where the user is not logged in
                $userName = '';
                $userEmail = '';
            }
            ?>

                <?php
                require('include/dbconfig.php');

                // Retrieve hotel_id from the URL
                if(isset($_GET['hotel_id'])) {
                    $id = $_GET['hotel_id'];

                    // Query to fetch hotel details based on the hotel_id
                    $hotelQuery = "SELECT * FROM hotel_list WHERE id = '$id'";
                    $hotelResult = mysqli_query($connection, $hotelQuery);

                    // Check if hotel details are found
                    if(mysqli_num_rows($hotelResult) > 0) {
                        $hotelRow = mysqli_fetch_assoc($hotelResult);
                    } else {
                        echo "Hotel details not found";
                    }

                    // Query to fetch room details based on the hotel_id
                    $roomQuery = "SELECT * FROM room_list WHERE id = '$id'";
                    $roomResult = mysqli_query($connection, $roomQuery);

                    // Check if room details are found
                    if(mysqli_num_rows($roomResult) > 0) {
                        $roomRow = mysqli_fetch_assoc($roomResult);
                    } else {
                        echo "Rooms not available";
                    }
                }
            ?>


                <div class="col-lg-6 col-md-6 px-4 mt-3">
                    <div class="bg-white rounded shadow p-4 border">
                        <form action="book_room.php" method="post">
                            <h5>Book Room </h5>

                            <!-- Inside the booking form -->
                            <input type="hidden" name="hotel_name" value="<?php echo $hotelRow['hotel_name']; ?>">
                            <input type="hidden" name="room_no" value="<?php echo $roomRow['room_no']; ?>">
                            

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mt-1">
                                        <label class="form-label" style="font-weight:500;"> Your Name</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo $userName; ?> ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-1">
                                        <label class="form-label" style="font-weight:500;"> Your email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $userEmail; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                <div class="" style="font-size:15px;">Your booking details will be sent to this email address.</div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-1"  >
                                        <label class="form-label" style="font-weight:500;"> Check In</label>
                                        <input type="date" value="<?php echo $checkInDate?>" class="form-control datetimepicker-input" name="checkin" placeholder="Check In" id="check-in" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-1">
                                        <label class="form-label" style="font-weight:500;"> Check Out</label>
                                        <input type="date" value="<?php echo $checkOutDate?>" class="form-control datetimepicker-input" name="checkout" placeholder="Check Out" id="check-out" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-1">
                                        <label class="form-label" style="font-weight:500;"> Select Adult</label>
                                        <select class="form-select" name="adult" value="<?php echo $adults?>">
                                            <option value="1"  <?php echo ($adults == 1) ? 'selected' : ''; ?>>One</option>
                                            <option value="2"  <?php echo ($adults == 2) ? 'selected' : ''; ?>>Two</option>
                                            <option value="3"  <?php echo ($adults == 3) ? 'selected' : ''; ?>>Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-1">
                                        <label class="form-label" style="font-weight:500;">Select Child</label>
                                        <select class="form-select" name="child">
                                            <option value="0" <?php echo ($children == 0) ? 'selected' : ''; ?>>Zero</option>
                                            <option value="1" <?php echo ($children == 1) ? 'selected' : ''; ?>>One</option>
                                            <option value="2" <?php echo ($children == 2) ? 'selected' : ''; ?>>Two</option>
                                            <option value="3" <?php echo ($children == 3) ? 'selected' : ''; ?>>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2 mb-0">  
                                    <div class="mb-0">
                                        <h4>Total Amount: ₹ <span id="totalAmount"></span></h4>
                                    </div>                                      
                                </div>    

                                <div class="col-md-12">  
                                    <div class="mt-1" style="font-size:15px;">
                                        <input type="checkbox" class="form-check-input" name="checkbox" >
                                        I understand and agree to the rules of this fare, the Terms & conditons and privacy policy of EasyMyTrip
                                    </div>                                      
                                </div>
                                <div class="mt-3" style="text-align:center;">                                                        
                                    <button class="btn btn-primary rounded" type="submit" name="submit" >Book Now</button>
                                </div>
                                <input type="hidden" id="room_price" name="room_price" value="<?php echo $roomRow['room_price']; ?>">
                                
                            </div>       
                        </form>
                    </div>
                </div>

        </div>
    </div>

     <!--------------- footer -------------------->
    <?php require('include/footer.php')?>

 <script>
  document.addEventListener('DOMContentLoaded', function() {
  const checkInDatePicker = document.getElementById('check-in');
  const checkOutDatePicker = document.getElementById('check-out');
  const today = new Date().toISOString().split('T')[0]; // Get the current date in YYYY-MM-DD format

  // Set the minimum date for both check-in and check-out inputs to today
  checkInDatePicker.min = today;
  checkOutDatePicker.min = today;

  checkInDatePicker.addEventListener('change', function() {
    const checkInDate = new Date(checkInDatePicker.value);
    const checkOutDate = new Date(checkOutDatePicker.value);


    // Set the minimum "check-out" date to the selected "check-in" date
    checkOutDatePicker.min = checkInDate.toISOString().split('T')[0];

    // Reset the "check-out" date when the "check-in" date is greater than the selected "check-out" date
    if (checkOutDate < checkInDate) {
      checkOutDatePicker.value = '';
    }
  });

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkInDatePicker = document.getElementById('check-in');
    const checkOutDatePicker = document.getElementById('check-out');
    const today = new Date().toISOString().split('T')[0]; // Get the current date in YYYY-MM-DD format

    // Set the minimum date for both check-in and check-out inputs to today
    checkInDatePicker.min = today;
    checkOutDatePicker.min = today;

    // Function to calculate total amount
    function calculateTotal() {
        var checkInDate = new Date(checkInDatePicker.value);
        var checkOutDate = new Date(checkOutDatePicker.value);

         var roomPriceElement = document.getElementById('room-price');
         var roomPriceText = roomPriceElement.textContent;
         var price = roomPriceText.match(/\d+/)[0]; // Extract the price from the text
        //var roomPriceElement = document.getElementById('room-price'); // Assuming 'room-price' is the ID of the element containing the price
        //var roomPriceText = roomPriceElement.textContent;
        //var price = roomPriceText.match(/\d{1,3}(,\d{3})*(\.\d+)?/)[0].replace(/,/g, '');


        var timeDifference = checkOutDate.getTime() - checkInDate.getTime();
        var numberOfDays = Math.ceil(timeDifference / (1000 * 3600 * 24)) + 1;

        if (numberOfDays <= 0) {
            numberOfDays = 1;
        }

        var totalAmount = price * numberOfDays;
        document.getElementById("room_price").value = totalAmount;
        document.getElementById("totalAmount").innerHTML = totalAmount.toFixed(2);
    }

    // Add input event listeners to check-in and check-out date inputs
    checkInDatePicker.addEventListener('input', calculateTotal);
    checkOutDatePicker.addEventListener('input', calculateTotal);

    // Initial calculation on page load
    calculateTotal();
});
</script>




</script>
</body>
</html>



