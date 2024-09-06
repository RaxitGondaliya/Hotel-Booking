<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - HOME</title>
    
  <?php require('include/links.php')?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    
    <style>
        .availability-form{
          margin-top: -50px;
          z-index: 2;
          position: relative;
        }

        @media screen and(max-width: 575px){
          .availability-form{
            margin-top: 25px;
            padding: 0 35px;
          }
        }
    </style>
</head>
<body class="bg-light">
    <!---------------- header ---------------> 
        <?php require('include/header.php')?>
    <!---------------- body --------------->

    <!----------------- Carousel  ------------------->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img class="img-fluid" src="images/carousel/1.png" class="m-100 d-block" />
            </div>
            <div class="swiper-slide">
              <img class="img-fluid" src="images/carousel/2.png" class="m-100 d-block" />
            </div>
            <div class="swiper-slide">
              <img class="img-fluid" src="images/carousel/3.png" class="m-100 d-block" />
            </div>
            <div class="swiper-slide">
              <img class="img-fluid" src="images/carousel/4.png" class="m-100 d-block" />
            </div>
            <div class="swiper-slide">
              <img class="img-fluid" src="images/carousel/5.png" class="m-100 d-block" />
            </div>
          </div>
        </div>
    </div>

    <!--------------- check availability form ------------->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-l2 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availiblity</h5>
                <form action="booking_availiblity.php" method="post">
                  <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                      <label class="form-label" style="font-weight: 500;">Check-in</label>
                      <input type="date" class="form-control shadow-none" id="check-in" required>
                    </div>
                    <div class="col-lg-3 mb-3">
                      <label class="form-label" style="font-weight: 500;">Check-out</label>
                      <input type="date" class="form-control shadow-none" id="check-out" required>
                    </div>
                    <div class="col-lg-3 mb-3">
                      <label class="form-label" style="font-weight: 500;">Adult</label>
                        <select class="form-select shadow-none">
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                      <label class="form-label" style="font-weight: 500;">Children</label>
                        <select class="form-select shadow-none">
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                      <button type="submit" class="btn text-white shadow-none coustem-bg">Submit</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

    <!---------------- our rooms ------------------->

    <h2 class="mt-5 pt-4 mb-4 text-center fe-bold h-font">OUR ROOMS <div class="h-line bg-dark"></div></h2>

    <div class="container">
      <div class="row">
        <?Php
          require('include/dbconfig.php');

          $_query = "select * from room";
          $query_run = mysqli_query($connection,$_query);
          $check_room = mysqli_num_rows($query_run) > 0;

          if($check_room)
          {
              while($row = mysqli_fetch_assoc($query_run))
              {
           echo '<div class="col-lg-4 col-md-6 my-3">
          <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="images/rooms/'.$row[img] .'" class="card-img-top">
              <div class="card-body">
                <h5>'.$row[name] .'</h5>
                <h6 class="mb-4">'.$row[price] .'</h6>

                 <!------------------Features -------------------->
                <div class="features mb-4">
                  <h6 class="mb-1">Features</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                  '.$row[features] .'
                  </span>
                </div>

                 <!------------------facilities -------------------->
                <div class="facilities mb-4">
                  <h6 class="mb-1">Facilities</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                  '.$row[facilities] .'
                  </span>
                </div>

                <!------------------reating -------------------->
                <div class="reating mb-4">
                  <h6 class="mb-1">Ratting</h6>
                  <span class="badge rounder-pill bg-light">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </span>
                </div>

                <div class="d-flex justify-content-evenly mb-2">
                  <a href="booking.php" class="btn btn-sm text-white coustem-bg shadow-none">Boook Now</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                </div>
              </div>
          </div>
        </div>';

              }
          }
          else{
            echo "no recored found";
          }
        ?>
        

        <!-------------------2----------------------->
        <div class="col-lg-4 col-md-6 my-3">
          <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="images/rooms/2.png" class="card-img-top">
              <div class="card-body">
                <h5>Simple Room Name</h5>
                <h6 class="mb-4">₹2000 per night</h6>

                <!------------------Features -------------------->
                <div class="features mb-4">
                  <h6 class="mb-1">Features</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    2 Rooms
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Bathroom
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Balcony
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    3 Sofa
                  </span>
                </div>

                <!------------------facilities -------------------->
                <div class="facilities mb-4">
                  <h6 class="mb-1">Facilities</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap ">
                    Wifi
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Television
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Ac
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Room heater
                  </span>
                </div>
                
                 <!------------------reating -------------------->
                <div class="reating mb-4">
                  <h6 class="mb-1">Ratting</h6>
                  <span class="badge rounder-pill bg-light">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </span>
                </div>

                <div class="d-flex justify-content-evenly mb-2">
                  <a href="booking.php" class="btn btn-sm text-white coustem-bg shadow-none">Boook Now</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                </div>
              </div>
          </div>
        </div>

        <!-------------------3----------------------->
        <div class="col-lg-4 col-md-6 my-3">
          <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
            <img src="images/rooms/3.png" class="card-img-top">
              <div class="card-body">
                <h5>Simple Room Name</h5>
                <h6 class="mb-4">₹2000 per night</h6>

                  <!------------------Features -------------------->
                <div class="features mb-4">
                  <h6 class="mb-1">Features</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    2 Rooms
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Bathroom
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    1 Balcony
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    3 Sofa
                  </span>
                </div>

                  <!------------------facilities -------------------->
                <div class="facilities mb-4">
                  <h6 class="mb-1">Facilities</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Wifi
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Television
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Ac
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Room heater
                  </span>
                </div>

                  <!------------------reating -------------------->
                <div class="reating mb-4">
                  <h6 class="mb-1">Ratting</h6>
                  <span class="badge rounder-pill bg-light">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </span>
                </div>

                <div class="d-flex justify-content-evenly mb-2">
                  <a href="booking.php" class="btn btn-sm text-white coustem-bg shadow-none">Boook Now</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                </div>
              </div>
          </div>
        </div>

        <div class="col-mg-12 text-center mt-5">
          <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms
            >>></a>
        </div>
      </div>
    </div>

    <!--------------------- FACILITIES ------------------->

    <h2 class="mt-5 pt-4 mb-4 text-center fe-bold h-font">OUR FACILITIES <div class="h-line bg-dark"></div></h2>

    <div class="container">
      <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/1.jpg" width="80px">
          <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/2.svg" width="80px">
          <h5 class="mt-3">Television</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/3.svg" width="80px">
          <h5 class="mt-3">Ac</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/4.svg" width="80px">
          <h5 class="mt-3">Heater</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/features/5.svg" width="80px">
          <h5 class="mt-3">Geyser</h5>
        </div>
        <div class="col-lg-12 text-center mt-5">
          <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities
            >>></a>
        </div>
      </div>
    </div>

    <!--------------------- testimonials -------------------->

    <h2 class="mt-5 pt-4 mb-4 text-center fe-bold h-font"> GUEST REVIEWS <div class="h-line bg-dark"></div></h2>

    <div class="container mt-5">
      <div class="swiper swiper-testimonials">
        <div class="swiper-wrapper mb-4">

          <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-3">
              <img src="images/review/1.jpg" width="30px" style="border-radius: 50px;">
              <h6 class="m-0 ms-2">Alohi</h6>
            </div>
            <p>
            "The hotel room was clean, nice and spacious. Breakfast offered with a wide variety of food. The staff were friendly and helpful. The location is just perfect for a walk around the city centre."
            </p>
            <div class="rating">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
          </div>

          <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-3">
            <img src="images/review/2.jpg" width="30px" style="border-radius: 50px;">
              <h6 class="m-0 ms-2">Kylan Gentry</h6>
            </div>
            <p>
            "Friendly and personal service
            The staff were all very friendly and helpful and no request for assistance was a problem for them. The hotel is well situated, being close to shopping, transport, and the tourist sites. We would definitely stay there again.
            "
            </p>
            <div class="rating">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
          </div>

          <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-3">
            <img src="images/review/3.jpg" width="30px" style="border-radius: 50px;">
              <h6 class="m-0 ms-2">Ceri</h6>
            </div>
            <p>
            "Lovely hotel
            Lovely hotel and staff. Breakfast was enjoyable and had a good selection with attentive staff. Received good recommendations for food. Room was clean with the essentials. Hotel central, everything we needed for a short visit to Helsinki.
            "
            </p>
            <div class="rating">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>
      <!-- <div class="col-lg-12 text-center mt-5">
        <a href="" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know more
          >>></a>
      </div> -->
    </div>

    <!-------------------------- Reach us ----------------------->

    <h2 class="mt-5 pt-4 mb-4 text-center fe-bold h-font">REACH US <div class="h-line bg-dark"></div></h2>  
    
    <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded border">
            <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235014.29981334085!2d72.4145838617919!3d23.02015772567339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1689245125953!5m2!1sen!2sin" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="bg-white p-4 rounded mb-4 border">
              <h5>Call us</h5>
              <a href="tel: +917778889991" class="d-inline-block mb-2 text-decoration-none text-dark">
                <i class="bi bi-telephone-fill"></i>+91 7778889991
              </a>
              <br>
              <a href="tel: +917778889991" class="d-inline-block text-decoration-none text-dark">
                <i class="bi bi-telephone-fill"></i>+91 7778889991
              </a>
            </div>
            <div class="bg-white p-4 rounded mb-4 border">
              <h5>Follow us</h5>
              <a href="" class="d-inline-block mb-3">
                <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-twitter me-1"></i>Twitter
                </span>
              </a>
              <br>
              <a href="" class="d-inline-block mb-3">
                <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-facebook me-1"></i>Facebook
                </span>
              </a>
              <br>
              <a href="" class="d-inline-block">
                <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-instagram me-1"></i>Instagram
                </span>
              </a>
            </div>
          </div>
        </div>
    </div>


    <!--------------- footer -------------------->
    <?php require('include/footer.php')?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
      <script>
        var swiper = new Swiper(".swiper-container", {
          spaceBetween: 30,
          effect: "fade",
          loop: true,
          autoplay: {
            delay: 3500,
            disableoninteeraction: false,
          },
        });

    //  testimonials Swiper

        var swiper = new Swiper(".swiper-testimonials", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          slidesPerView: "3",
          loop: true,
          coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      }
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

</body>
</html>