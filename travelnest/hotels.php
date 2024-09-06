<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - HOTELS</title>
    
  <?php require('include/links.php')?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
</head>
<body class="bg-light">
    <!---------------- header ---------------> 
        <?php require('include/header.php')?>

     <div class="my-5 px-4">
        <h2 Class=" fw-bold text-center ">HOTELS</h2>
        <div class="h-line bg-dark"></div>
    </div>


    <!--------------------------- Booking form - hotel code ------------------------------>

    <div class="container ">
        <div class="row justify-content-center"> 
        
        
            <div class="col-lg-9 col-md-12 px-4 ">   

                <?Php
                    require('include/dbconfig.php');

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $selectedCity = $_POST['city'];
                    $checkInDate = $_POST['check-in'];
                    $checkOutDate = $_POST['check-out'];
                    $adults = $_POST['adult'];
                    $children = $_POST['children'];

                    //$query = "select * from hotel_list";
                    //$query = "SELECT * FROM hotel_list WHERE city = '$selectedCity'";
                    $query = "SELECT hotel_list.*, cities.city FROM hotel_list
                    JOIN cities ON hotel_list.city_id = cities.id
                    WHERE cities.city = '$selectedCity'";
                    $query_run = mysqli_query($connection,$query);
                    $hotel = mysqli_num_rows($query_run);

                    if($hotel>0)
                    {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                ?>

                <div class="card mb-4 border-0 shadow" >
                    <div class="row g-0 p-3 ">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3" style="height: 270px; width: 370px;" >
                            <img src="<?php echo $row['hotel_img'] ?>"  style="height: 100%; width: 100%;" class="img-fluid rounded " ></img>
                        </div>
                        
                        <div class="col-md-4 px-lg-3 px-md-3 px-0 ">
                            <h5 class="mb-3 mt-3 ms-3"><?php echo $row['hotel_name'] ?> </h5>
                            <h6 class="mb-3 mt-3 ms-3"> <img src="https://cdn-icons-png.flaticon.com/128/2838/2838912.png" height="18px" width="18px"></img><?php echo $selectedCity ?> </h6>
                            
                            <div class=" mt-3 border text-center ms-3" style="background-color:#CAE9E0; border-radius:10px; padding:5px 8px; display:inline-flex;"> 
                                <span class=""> <img src="https://cdn-icons-png.flaticon.com/128/8832/8832108.png" height="20px" width="20px"></img></span>
                                <span  class="fw-bold ms-2 mt-1" style="color:#008631;font-size:12px;">  Free Cancellation </span>
                            </div>

                            <div class="mt-3 border text-center ms-2" style="background-color:#CECBD6; border-radius:20px; padding:5px 8px; display:inline-flex;">
                                <span class=""><img src="https://hotels.easemytrip.com/newhotel/images/discount-logo.svg" width="16" height="16"></span>
                                <span class="fw-bold ms-2 mt-1" style="font-size:12px;">EMTSTAY Discount Applied</span>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex flex-column  text-center">
                            <div class="  mt-2 border "  style="background-color:#187bcd; border-radius:10px; padding:3px 6px;  "> 
                                <span class="" style=""> <img src="https://cdn-icons-png.flaticon.com/128/2977/2977921.png" height="18px" width="18px"></img></span>
                                <span  class="fw-bold ms-2" style="color:white;font-size:12px;"> offer of the Day </span>
                            </div>
                            <div class="justify-content-end mt-5">
                                <h5 class="mb-2 ">₹ <?php echo $row['room_price'] ?></h5>
                                <h6 class="mb-2 "> per night</h6>
                                <a href="rooms.php?id=<?php echo $row['id']; ?>&selected_city=<?php echo $selectedCity; ?>&check_in=<?php echo $checkInDate; ?>&check_out=<?php echo $checkOutDate; ?>&adults=<?php echo $adults; ?>&children=<?php echo $children; ?>" class="text-decoration-none">
                                    <button type="submit" name="submit" class="text-black btn btn-sm w-100 shadow-none mt-4 fw-bold" style="font-size: 20px; background-color: orange; border-radius: 10px;">
                                        View Room
                                    </button>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                    }
                    else{
                    echo "no recored found";
                    }
                    }
                ?>

            </div>
        
            
        </div>
    </div>


    <!--------------------------- card - hotel code ------------------------------>
    <div class="container ">
        <div class="row justify-content-center"> 
        
        
            <div class="col-lg-9 col-md-12 px-4 ">   

                <?Php
                    require('include/dbconfig.php');

                    $selectedCity = '';
                    $selectedCityId = '';

                    if (isset($_GET['city']) && isset($_GET['city_id'])) {
                        $selectedCity = $_GET['city'];
                        $selectedCityId = $_GET['city_id'];
                    
                    //$query = "select * from hotel_list";
                    $query = "SELECT * FROM hotel_list WHERE city_id = '$selectedCityId'";
                    
                    $query_run = mysqli_query($connection,$query);
                    $hotel = mysqli_num_rows($query_run);

                    if($hotel>0)
                    {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                ?>

                <div class="card mb-4 border-0 shadow" >
                    <div class="row g-0 p-3 ">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3"style="height: 270px; width: 370px;" >
                            <img src="<?php echo $row['hotel_img'] ?>" style="height: 100%; width: 100%;" class="img-fluid rounded " ></img>
                        </div>
                        
                        <div class="col-md-4 px-lg-3 px-md-3 px-0 ">
                            <h5 class="mb-3 mt-3 ms-3"><?php echo $row['hotel_name'] ?> </h5>
                            <h6 class="mb-3 mt-3 ms-3"> <img src="https://cdn-icons-png.flaticon.com/128/2838/2838912.png" height="18px" width="18px"></img><?php echo $selectedCity ?></h6>
                            
                            <div class=" mt-3 border text-center ms-3" style="background-color:#CAE9E0; border-radius:10px; padding:5px 8px; display:inline-flex;"> 
                                <span class=""> <img src="https://cdn-icons-png.flaticon.com/128/8832/8832108.png" height="20px" width="20px"></img></span>
                                <span  class="fw-bold ms-2 mt-1" style="color:#008631;font-size:12px;">  Free Cancellation </span>
                            </div>

                            <div class="mt-3 border text-center ms-2" style="background-color:#CECBD6; border-radius:20px; padding:5px 8px; display:inline-flex;">
                                <span class=""><img src="https://hotels.easemytrip.com/newhotel/images/discount-logo.svg" width="16" height="16"></span>
                                <span class="fw-bold ms-2 mt-1" style="font-size:12px;">EMTSTAY Discount Applied</span>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex flex-column  text-center">
                            <div class="  mt-2 border "  style="background-color:#187bcd; border-radius:10px; padding:3px 6px;  "> 
                                <span class="" style=""> <img src="https://cdn-icons-png.flaticon.com/128/2977/2977921.png" height="18px" width="18px"></img></span>
                                <span  class="fw-bold ms-2" style="color:white;font-size:12px;"> offer of the Day </span>
                            </div>
                            <div class="justify-content-end mt-5">
                                <h5 class="mb-2 ">₹ <?php echo $row['room_price'] ?></h5>
                                <h6 class="mb-2 "> per night</h6>
                                <a href="rooms.php?id=<?php echo $row['id']; ?>">  <button type="submit" name="submit"class="btn btn-sm w-100 shadow-none mt-4 fw-bold" style="font-size:20px;background-color:orange;border-radius:10px;">View Room </button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                    }
                    else{
                    echo "no recored found";
                    }

                    }
                ?>

            </div>
                   
        </div>
    </div>


     <!--------------- footer -------------------->
    <?php require('include/footer.php')?>
</body>
</html>