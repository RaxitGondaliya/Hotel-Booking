
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - HOTEL LIST</title>
    <?php require('include/links.php'); ?>
</head>
<body class="bg-light">

    <?php require('include/header.php'); ?>
    <?php require('include/scripts.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
               <h3 class="mb-4">Hotel List</h3>

     <!-- --------------- Hotel list -------------------->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0"></h5>
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-hotel">
                        <i class="bi bi-plus-square"></i> Add
                    </button>
                </div>

                <div class="table-responsive-md" style="height : 450px; overflow-y: scroll;">
                    <table class="table table-hover border " style="table-layout: fixed;">
                        <thead>
                            <tr class="bg-dark text-light  sticky-top">
                                <th scope="col" width="50px">id</th>
                                <th scope="col" >Name</th>
                                <th scope="col" >Image</th>
                                <th scope="col" >Address</th>
                                <th scope="col">Location</th>
                                <th scope="col">Room-price/Night</th>
                                <th scope="col">City-id</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody id="hotel-data">
                                <?php
                                    require('include/essentils.php');
                                    require('include/db_config.php');

                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    }

                                    // Fetch data from the admin_card table
                                    $sql = "SELECT * FROM hotel_list";
                                    $result = $con->query($sql);
                                    $data = array();

                                    // Check if there are rows in the result set
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                            echo '<tr >';
                                            echo '<th scope="row">' . $row['id'] . '</th>';
                                            echo '<td>' . $row['hotel_name'] . '</td>';
                                            echo '<td>' . $row['hotel_img'] . '</td>';
                                            echo '<td>' . $row['address'] . '</td>';
                                            echo '<td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">' . $row['location'] . '</td>';
                                            echo '<td>' .'₹'. $row['room_price'] .'/-'. '</td>';
                                            echo '<td>' . $row['city_id'] . '</td>';
                                            echo '<td><div class="text-end ">
                                            <button type="button" class="btn btn-dark shadow-none btn-sm " data-bs-toggle="modal" data-bs-target="#edit-hotel' . $row['id'] . '" >
                                            <i class="bi bi-pencil-square"></i>  Edit
                                            </button>
                                            <a href ="delete_hotel.php?id='.$row['id'].' "class="btn btn-danger roundes-pill shadow-none btn-sm">
                                            <i class="bi bi-trash"></i> Delete 
                                            </a></td></div>';
                                        echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="4">No data available</td></tr>';
                                    }

                                    // Close the database connection
                                    $con->close();
                                ?>  
                            </tbody>
                    </table>
                </div>
            </div>
        </div>

      <!---------------- add hotel Modal --------------------->
        <div class="modal fade" id="add-hotel" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 
            <div class="modal-dialog">
                <form id="add-hotel_form" action="add_hotel.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Hotel</h5>
                        </div>
                        <div class="modal-body">
                            <div class=" mb-3">
                                <label class="form-label fw-bold">Name </label>
                                <input type="text" name="hotel_name"  class="form-control shadow-none" required>
                            </div>
                            <div class=" mb-3">
                                <label class="form-label fw-bold">Image Link</label>
                                <input type="text" name="hotel_img"  class="form-control shadow-none" required>
                            </div>
                            <div class=" mb-3">
                                <label class="form-label fw-bold">Address </label>
                                <input type="text" name="address"  class="form-control shadow-none" required>
                            </div>
                            <div class=" mb-3">
                                <label class="form-label fw-bold">Location </label>
                                <input type="text" name="location"  class="form-control shadow-none" required>
                            </div>
                           
                            <div class=" mb-3">
                                <label class="form-label fw-bold">Room-Price/Night </label>
                                <div class="input-group">
                                    <span class="input-group-text">&#8377;</span> <!-- Rupee sign -->
                                    <input type="text" name="room_price" class="form-control shadow-none" placeholder="Enter room price" required>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <!-- <label class="form-label fw-bold">City-id </label>
                                <input type="text" name="city_id"  class="form-control shadow-none" required> -->

                                <?php
                                    require('include/db_config.php');
                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    }
                                    $query = "SELECT * FROM cities";
                                    $result = $con->query($query);

                                    echo '<label class="form-label fw-bold">City-id </label>';
                                    echo '<select name="city_id" id="city" style="width: 100%; padding: 6px; box-sizing: border-box;  border-radius:5px; border: 1px solid #D3D3D3;">';

                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id'] . '">' . $row['id'] .'-' . $row['city'] . '</option>';
                                    }
                                    echo '</select>';

                                    // Close the database connection
                                    $con->close();

                                ?>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset"  class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" name="submit" class="btn coustem-bg text-white shadow-none" >Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!---------------- Edit hotel modal --------------------->
        <?php
            foreach ($data as $hotel) {
                echo '<div class="modal fade" id="edit-hotel' . $hotel['id'] . '" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">';
                echo '<div class="modal-dialog ">';
                echo '<form id="edit_hotel_form" autocomplete="off" action="edit_hotel.php?id=' . $hotel['id'] . '" method="post">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h5 class="modal-title">Edit Hotel</h5>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo '<input type="hidden" name="id" value="' . $hotel['id'] . '">';
                echo '<div class="row">';
                echo '<div class="mb-3">';
                echo '<label class="form-label fw-bold">Name</label>';
                echo '<input type="text" name="hotel_name" class="form-control shadow-none" value="' . $hotel['hotel_name'] . '" required>';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label class="form-label fw-bold">Image link</label>';
                echo '<input type="text" name="hotel_img" class="form-control shadow-none" value="' . $hotel['hotel_img'] . '" required>';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label class="form-label fw-bold">Address</label>';
                echo '<input type="text" name="address" class="form-control shadow-none" value="' . $hotel['address'] . '" required>';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label class="form-label fw-bold">Location</label>';
                echo '<input type="text" name="location" class="form-control shadow-none" value="' . $hotel['location'] . '" required>';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label class="form-label fw-bold">Room Price</label>';
                echo '<div class="input-group">';
                echo '<span class="input-group-text">&#8377;</span>'; // Rupee sign
                echo '<input type="text" name="room_price" class="form-control shadow-none" value="' . $hotel['room_price'] . '" required>';
                echo '</div>';
                echo '</div>';

                echo '<div class="mb-3">';
                // echo '<label class="form-label fw-bold">City-id</label>';
                // echo '<input type="text" name="city_id" class="form-control shadow-none" value="' . $hotel['city_id'] . '" required>';
            

                
                require('include/db_config.php');
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }
                $query = "SELECT * FROM cities";
                $result = $con->query($query);

                echo '<label class="form-label fw-bold">City-id </label>';
                echo '<select name="city_id" id="city" style="width: 100%; padding: 6px; box-sizing: border-box;  border-radius:5px; border: 1px solid #D3D3D3;">';

                while ($row = $result->fetch_assoc()) {
                    // echo '<option value="' . $row['id'] . '">' . $row['id'] .'-' . $row['city'] . '</option>';
                    
                    $selected = ($row['id'] == $hotel['city_id']) ? 'selected' : ''; // Check for the desired value
                    echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['id'] .'-' . $row['city'] . '</option>';
                }
                echo '</select>';

                // Close the database connection
                $con->close();



                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>';
                echo '<button type="submit" name="submit" class="btn coustem-bg text-white shadow-none">Edit</button>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        ?>


            </div>
        </div>
    </div>
    
</body>
</html>