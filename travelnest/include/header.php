<?php
session_start();

// Check if the user is logged in (you may need to adjust the condition to fit your login logic)
if (isset($_SESSION['user_id'])) {
    // User is logged in
    $isLoggedIn = true;
} else {
    // User is not logged in
    $isLoggedIn = false;
}
?>
    <!---------------- nevbar --------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">TravelNest</a>
          <button class="navbar-toggler  shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link fw-bold" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" aria-current="page" href="about_us.php">About Us</a>
              </li>
            </ul>
          
          <?php
          if ($isLoggedIn) {
              // Show the logout button if the user is logged in
              echo '<button type="button" name="logout" class="btn btn-outline-dark shadow-none mg-lg-3 me-2">
              <a href="logout.php" style="text-decoration: none; color: black">Logout</a>
            </button>';
          } else {
              // Show the login and register buttons if the user is not logged in
              echo '<div class="d-flex">
              <button type="button" class="btn btn-outline-dark shadow-none mg-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
              </button>
              <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                Register
              </button>
            </div>';
          }
          ?>

          </div>
        </div>
    </nav>

    <!-- Modal login -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="login.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-circle fs-3 me-2"></i> User Login
              </h5>
              <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email"  name="email" class="form-control shadow-none" required >
              </div>
              <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control shadow-none" required>
              </div>
              <div class="d-flex align-items-center justify-content-between mb -2">
                <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Register -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

         <form action="registration.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-lines-fill  fs-3 me-2"></i> User Registration
              </h5>
              <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                Note: Your details must match with your ID(Aadhaar card, passport, driving license , etc.)
                that will be required during chack-in.
              </span>

              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Username</label> <small id="error_username"></small>
                    <input type="text" name="username" class="form-control shadow-none "  required>
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control shadow-none "  required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number"  name="pno" class="form-control shadow-none "  required>
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Picture</label>
                    <input type="file" name="pic" class="form-control shadow-none " >
                  </div>
                  <div class="col-md-12 p-0 mb-3">
                    <label class="form-label">Address</label>
                    <textarea  name=" address" class="form-control shadow-none address" rows="1" required></textarea>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Pincode</label>
                    <input type="number" name="pincode" class="form-control shadow-none " required>
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Date of birth</label>
                    <input type="date" name="dob" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control shadow-none " required>
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control shadow-none " required>
                  </div>

                </div>
              </div>
              <div class="text-center ny-1">
                <button type="submit" name="submit" class="btn btn-dark shadow-none">REGISTER</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    