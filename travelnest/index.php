
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel - HOME</title>
    
  <?php require('include/links.php')?>
  <?php require('include/dbconfig.php')?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>


    <style>
        /* .booking_details{
          margin-top: -50px;
          z-index: 2;
          position: relative;
        } */
        @media screen and(max-width: 575px){
          .booking_details{
            margin-top: 25px;
            padding: 0 35px;
          }
        }

        .why_img{
          margin-top: -60px;
          z-index: 2;
          position: relative;
        }
 
    </style>
</head>
<body class="bg-light">
    <!---------------- header ---------------> 
        <?php require('include/header.php')?>
    <!---------------- body --------------->

    <!----------------- Carousel  ------------------->
    <?php
if (isset($_SESSION['booking_success'])) {
  echo "<script>alert('Booking successful!')</script>";
  unset($_SESSION['booking_success']); // Remove after displaying once
}
?>
    <div class="start">
        <img src="https://imgak.mmtcdn.com/pwa_v3/pwa_commons_assets/desktop/bg2.jpg" alt="">
        <!-- <img src="https://imgak.mmtcdn.com/pwa_v3/pwa_commons_assets/desktop/bg4.jpg" alt="">  -->
        <!-- <img src="https://imgak.mmtcdn.com/pwa_v3/pwa_commons_assets/desktop/bg6.jpg" alt="">  -->

      <div class="d_text">
        <span class="heading"> Hotel in India </span><br>
        <span class="heading_p"> Enter your dates and choose from 72,636 hotels and other places to stay! </span>
      </div>

     <!--------------- check availability form ------------->
      <div class="container booking_details ">
        <div class="row">
            <div class="col-lg-l2 bg-white shadow p-4 rounded">
            <!-- border border-warning border-4 main shadow-lg -->
                <!-- <h5 class="mb-4">Check Booking Availiblity</h5> -->
                <form action="hotels.php" method="post" id="booking_form">
                  <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">

                <?php
                  if ($connection->connect_error) {
                      die("Connection failed: " . $connection->connect_error);
                  }
                  $query = "SELECT * FROM cities";
                  $result = $connection->query($query);

                  echo '<label class="form-label" style="display: block; margin-bottom: 5px;font-weight: 500;">City</label>';
                 echo ' <select name="city" id="city" style="width: 100%; padding: 6px; box-sizing: border-box;  border-radius:5px; border: 1px solid #D3D3D3;" required>';
                  echo '<option value="">select a city</option>';
                
                  $result = $connection->query("SELECT id, city FROM cities");
              
                  while ($row = $result->fetch_assoc()) {
                      $isSelected = ($row['city'] == $selectedCity) ? 'selected' : '';
                      echo '<option value="' . $row['city'] . '" data-city-id="' . $row['id'] . '" ' . $isSelected . '>' . $row['city'] . '</option>';
                  }
                  ?>
              </select>
              <input type="hidden" name="selected_city_id" id="selected_city_id" value="<?php echo $selectedCityId; ?>">

                    </div>
                    <div class="col-lg-2 mb-3">
                      <label class="form-label" style="font-weight: 500;">Check-in</label>
                      <input type="date" name="check-in" class="form-control shadow-none" id="check-in" required>
                    </div>
                    <div class="col-lg-2 mb-3">
                      <label class="form-label" style="font-weight: 500;">Check-out</label>
                      <input type="date" name="check-out" class="form-control shadow-none" id="check-out" required>
                    </div>
                    <div class="col-lg-2 mb-3">
                      <label class="form-label" style="font-weight: 500;">Adult</label>
                        <select name="adult" class="form-select shadow-none" required>
                          <!-- <option value="0">Zero</option> -->
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                      <label class="form-label" style="font-weight: 500;">Children</label>
                        <select name="children" class="form-select shadow-none" required>
                          <option value="0">Zero</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div>

                    <input type="hidden" name="check-in" id="hidden_check_in">
                    <input type="hidden" name="check-out" id="hidden_check_out">
                    <input type="hidden" name="adult" id="hidden_adult">
                    <input type="hidden" name="children" id="hidden_children">

            
                    <div class="col-lg-1 mb-lg-3 mt-2">
                      <button type="submit" name="submit"  class="btn text-white shadow-none coustem-bg">Submit</button>
                    </div>

                    <input type="hidden" name="selected_city" id="selected_city" value="">
                  </div>
                </form>
            </div>
        </div>
      </div>
    </div>

     <!------------------- card display ----------------------->

     <div class="container">
      <div class="row">

        <div class="my-5 px-4">
          <h2 Class=" fw-bold  text-center">Book Hotels at Popular Destinations</h2>
        </div>

        <?Php
          require('include/dbconfig.php');

          $query = "select * from cities LIMIT 4";
          $query_run = mysqli_query($connection,$query);
          $city = mysqli_num_rows($query_run) > 0;

          if($city)
          {
              while($row = mysqli_fetch_assoc($query_run))
              {
                ?>
                  <div class="col-lg-3 col-md-6 my-3">
                    <a href="hotels.php?city=<?php echo $row['city']; ?>&city_id=<?php echo $row['id']; ?>"  style="text-decoration: none; color: black;">
                      <div class="card border-0 shadow " style="max-width:300px; max-height: 400px; margin: auto; border-radius: 20px;">
                        
                        <div style="padding: 15px 15px 15px;">
                          <img src="<?php echo $row['img'] ?>" height="250px" width="300px" class="card-img-top" style="border-radius: 20px;">
                        </div> 
                      
                        <div class="card-body text-center" style="padding-bottom:5px; padding-top:5px;">
                          <h5><?php echo $row['city'] ?></h5>
                        </div>
                      </div>
                    </a>
                  </div>     
              <?php
              }
          }
          else{
            echo "no recored found";
          }
        ?>

      </div>
    </div>

    <!------------------- our top hotel chains ----------------------->

    <div class="container mt-5">
      <div class="row">

          <div class="my-3 bg-white border shadow">
              <div class="p-3">
                  <div class="mt-3 mb-3">
                      <h3 class="text-center">Our Top Hotel Chains</h3>
                  </div>
                  <p>Travelnest has a wide range of luxury and budget-friendly hotel chain properties. We have picked the finest hotels in India with world-class amenities. We bring you not only a stay option but an experience in your budget to enjoy the luxury. We make sure that all the hotels are safe, hygienic, comfortable, and easily approachable when it comes to location. Book your hotel with Travelnest and don't forget to grab an amazing hotel deal to save huge on your stay.</p>
              </div>

              <div class="d-flex flex-wrap justify-content-around align-items-center p-3">
                  <div class="p-3">
                      <img src="https://www.easemytrip.com/images/hotel-img/ramee-hotels-hp-new.png" width="85" alt="Ramee Hotel Logo">
                  </div>

                  <div class="p-3">
                      <img src="https://www.easemytrip.com/images/hotel-img/EMTLORDS-26oct21-hp.png" width="85" alt="Lords Hotel Logo">
                  </div>

                  <div class="p-3">
                    <img src="https://www.easemytrip.com/images/hotel-img/EMTOT-26oct21-hp.png" width="85" alt="Orange Tiger Logo">
                  </div>

                  <div class="p-3">
                    <img src="https://www.easemytrip.com/images/hotel-img/welcomheritage-hp.png" width="85" alt="Heritage Hotel Logo">
                  </div>

                  <div class="p-3"> 
                    <img src="https://www.easemytrip.com/images/hotel-img/bloom-hp.png" width="85" alt="Bloom Hotel Logo">
                  </div>

                  <div class="p-3"> 
                    <img src="https://www.easemytrip.com/images/hotel-img/byke-hp.png" width="85" alt="Byke Hotel Logo">
                  </div>

                  <div class="p-3"> 
                    <img src="https://www.easemytrip.com/images/hotel-img/justa-hp.png" width="85" alt="Justa Hotels Resorts Logo">
                  </div>

                  <div class="p-3">
                    <img src="https://www.easemytrip.com/images/hotel-img/royal-orchid-hp.png" width="85" alt="Royal Orchid Logo">
                  </div>

                  <div class="p-3">
                    <img src="https://www.easemytrip.com/images/hotel-img/shrigo-hp2.png" width="85" alt="Shrigo Hotel Logo">
                  </div>

                  <div class="p-3">
                    <img src="https://www.easemytrip.com/images/hotel-img/cygnett-hp.png" width="85" alt="Cygnett Hotel Logo">
                  </div>

                  <div class="p-3">
                    <img src="https://www.easemytrip.com/images/hotel-img/brij-hp.png" width="85" alt="Brij Hotel Logo">
                  </div>

                  <div class="p-3"> 
                    <img src="https://www.easemytrip.com/images/hotel-img/clarks-hp.png" width="85" alt="Hotel Clarks Logo">
                  </div>

                  <div class="p-3">
                    <img src="https://www.easemytrip.com/images/hotel-img/EMTTGI20-26oct21-hp.png" width="85" alt="TGI Hotel Logo">
                  </div>

                  <div class="p-3">
                    <img src="https://www.easemytrip.com/images/hotel-img/the-clarks-hotel-hp.png" width="85" alt="The Clark Hotel">
                  </div>
              
                  <div class="p-3">
                    <img src="https://www.easemytrip.com/images/hotel-img/spree-hotels-hp.png" width="85" alt="Spree Hotel Logo">
                  </div>
              </div>
          </div>

      </div>
    </div>

<!------------------- Why Book Hotels with Travelnest.com? ----------------------->
        
    <div class="container">
      <div class="row">
        <div class="my-5 px-4">
          <h2 class="fw-bold text-center ">Why Book Hotels with Travelnest.com?</h2>
        </div>

        <div class="row d-flex justify-content-center g-4">
          <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="border border-2 shadow-sm text-center bg-white p-3  d-flex flex-column align-items-center h-100" style="border-radius:10px;">
              <div class="why_img rounded-circle mx-auto mb-3 border border-2" style="width: 100px; height: 100px; padding: 20px; background-color:#DFF2FF">
                <img src="https://www.easemytrip.com/hotels/content/img/homes/hotel-icn.svg" class="img-fluid" height="60" alt="Extensive Hotel Options">
              </div>
              <div class="fw-bold">Extensive Hotel Options</div>
              <div>Best hotels available for different destinations to offer you the stay of a lifetime.</div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="border border-2 shadow-sm  text-center bg-white p-3  d-flex flex-column align-items-center h-100" style="border-radius:10px;">
              <div class="why_img  rounded-circle mx-auto mb-3 border border-2" style="width: 100px; height: 100px; padding: 20px; background-color:#DFF2FF">
                <img src="https://www.easemytrip.com/hotels/content/img/homes/wallet-icn.svg" class="img-fluid" height="60" alt="Savings on Hotel Booking">
              </div>
              <div class="fw-bold">Savings on Hotel Booking</div>
              <div>Enjoy hotel bookings with the best offers and discounts and make your stay unforgettable.</div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="border border-2 shadow-sm  text-center bg-white p-3  d-flex flex-column align-items-center h-100" style="border-radius:10px;">
              <div class="why_img rounded-circle mx-auto mb-3 border border-2" style="width: 100px; height: 100px; padding: 20px; background-color:#DFF2FF">
                <img src="https://www.easemytrip.com/hotels/content/img/homes/rating-icn.svg" class="img-fluid" height="60" alt="Hotel Ratings">
              </div>
              <div class="fw-bold">Hotel Ratings</div>
              <div>All our hotels have good ratings on Trip Advisor and are recommended by users.</div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="border border-2 shadow-sm   text-center bg-white p-3  d-flex flex-column align-items-center h-100"  style="border-radius:10px;">
              <div class="why_img  rounded-circle mx-auto mb-3 border border-2" style="width: 100px; height: 100px; padding: 20px; background-color:#DFF2FF">
                <img src="https://www.easemytrip.com/hotels/content/img/homes/beach-icn.svg" class="img-fluid" height="60" alt="Best Price">
              </div>
              <div class="fw-bold">Best Price</div>
              <div>Get excellent hotels/resorts at the best prices to pamper your desires.</div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!------------------- FAQ's ----------------------->
    <div class="container">
      <div class="row">

        <div class="my-5 px-4">
          <h2 Class=" fw-bold text-center"> FAQ's</h2>
        </div>

        <div class="accordion accordion-flush" id="accordionFlushExample">

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                How can I save while booking hotels ?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <p>To save on your hotel reservation, you should try to book them in advance by comparing the best deals on various websites. One important thing that every traveler should know is that hotels in India have different GST rates depending on their tariff. The GST rate for hotels with a tariff between Rs 1,001 and RS 7,500 per night is 12% and the GST rate for hotels with a tariff equal to or above Rs 7,501 per night is 18%. So, you can create a great difference here.</p>

                <p>You can plan your stay opposite to what others do. Hotels in business hubs are cheaper during the weekends but resorts are reasonably priced during the weekdays. Everyone knows the reason behind this. If you follow this rule, it will help you crack the best deals on hotels.</p>

                <p> Booking hotels within a cancellation period can do wonders with hotel booking amount. The period is usually between 24 and 48 hours prior to the scheduled stay. Due to the last-minute cancellation of the hotel rooms, booking is available at a lower price. Although this is a little risky, but you might end up saving huge on hotels.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Can I book a hotel with a local id?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                  <p>There is no law that allows hotel authorities to prohibit local couples from spending time with each other in a hotel room. Earlier hoteliers used to deny the local couples as they wanted to give preference to the guests who traveled from far as they usually occupy the room for more days but local couples hardly book a room for one day. However, due to the growing number of startups in the hotel industry, local couples can also book hotel rooms.</p>

                  <p>There are some specific hotels which don't allow check-in with local ID proof but most of these are accepted now. Before booking a hotel, you may check on our website if someone can book a hotel with a local I'd proof or not. But most of the hotels allow check-in with a valid ID proof.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                How can I get early check-in or late check-out in a hotel?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <p>Early check-ins or late checkouts in hotels are subject to availability and customers have to ask about this directly from the hotels. If a hotel reception is accommodating, they can provide their guests with both Early Check-in and Late Check-out or at least one of these. However, it also depends if rooms are available in the hotel or not. Usually, guests can enjoy free early check-in or late check-out of up to 2 hours.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                How can unmarried couples book hotels in india?
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <p>No law denies the stay of unmarried couples from booking and staying in a hotel. However, it solely depends on the hotel authority to allow check-ins in such hotels. Choosing to stay together is a personal choice, which can't be restricted.</p>

                <p> Unmarried couples should always try to book their hotels online for 2 persons by checking earlier if the hotel provides them entry or not. Here is a tip, unmarried couples or any couple shouldn't indulge in activities that unnecessarily draw the attention of people. Generally, hotel reception checks the id proofs and then allows the guests to check-in without making any fuss about if they are unmarried or married.</p>
              </div>
            </div>
          </div>  

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                How can I book cheap hotel rooms in 5 star hotels?
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <p>There are several 5-star hotels in various cities that are available at cheaper rates. To book cheap hotel rooms in 5-star hotels, one of the most important things that you can do is to be flexible about your dates. If you are not planning to travel during weekends, a stay can be booked at very cheaper rates.<p>

                <p>One more tip is to book hotels in the off-season. By booking a hotel room at a location where there is a lesser crowd during a particular weather, customers can get really cheap deals. Suppose if you are only looking for a staycation or are willing to stay in 5-star hotels, then you can choose to visit cities like Jaipur, Agra or any tourist place in Northern India during the summers. Booking hotels at hill stations during the rainy season can also be an opportunity to get rooms at cheaper rates.<p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSix">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                How to book hotel online?
              </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
              <p>Booking online hotels with EaseMyTrip is extremely hassle-free. Follow the below-mentioned steps to make your booking experience smooth.<p>

              <p>Step 1: Visit Travelnest and tap on the Hotels tab.<p>
              <p> Step 2: Enter the city name, location or specific hotel where you wish to book the stay at.<p>
              <p> Step 3: Mention the Check-in and Check-out dates, as per your choice in the mentioned tab.<p>
              <p>  Step 4: Mention the number of rooms required as per the guest count in the "Rooms & Guests" section.<p>
              <p> Step 5: Tap on the 'Search' button and you will be directed to a new page, where all the hotels are mentioned as per your requirements.<p>
              <p> Step 6: After being redirected to the hotels, one can select the hotels, as per the amenities provided. You can also customize your search by selecting the options from the top left corner, like price range, ratings, nearby attractions, attractions and type of properties.<p>
              <p> Step 7: After customizing the search, one can select the hotel and select the number of rooms required.<p>
              <p> Step 8: After finalizing, you are required to tap on the 'Book Now' option.<p>
              <p> Step 9: Fill in the details asked and tap on 'Continue to payment'.<p>
              <p> Step 10: Now, make your payment using your preferred option. You can choose from a wide range of options from Debit cards, Credit cards, UPI, net banking, or wallet money.<p>
              <p>Step 11: Once the payment is done, you will receive an Email and SMS for the same. You will also receive your e-ticket on mobile and email ID.<p>

              <p>The process is simple and hassle-free. It is easy to book your travel online on Travelnest app/web. Save your time by booking hotels online and get the best deals with Travelnest.<p>
                </div>
            </div>
          </div>


        </div>
      
      </div>
    </div>




    <!--------------- footer -------------------->
    <?php require('include/footer.php')?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    

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
    document.getElementById('city').addEventListener('change', function() {
        var selectedCity = this.value;
        var selectedCityId = this.options[this.selectedIndex].getAttribute('data-city-id');
        document.getElementById('selected_city_id').value = selectedCityId;
    });
</script>

<script>
    document.getElementById('booking_form').addEventListener('submit', function () {
        // Set the values of hidden fields before form submission
        document.getElementById('hidden_check_in').value = document.getElementById('check-in').value;
        document.getElementById('hidden_check_out').value = document.getElementById('check-out').value;
        document.getElementById('hidden_adult').value = document.getElementsByName('adult')[0].value;
        document.getElementById('hidden_children').value = document.getElementsByName('children')[0].value;
    });
</script>

</body>
</html>