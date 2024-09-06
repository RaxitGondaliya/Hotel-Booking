
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - CITY</title>
    <?php require('include/links.php'); ?>
</head>
<body class="bg-light">

    <?php require('include/header.php'); ?>
    <?php require('include/scripts.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
               <h3 class="mb-4">City & Place</h3>

     <!-- --------------- room -------------------->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="text-end mb-4">
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-city">
                        <i class="bi bi-plus-square"></i> Add
                    </button>
                </div>

                <div class="table-responsive-lg" style="height : 450px; overflow-y: scroll;">
                    <table class="table table-hover border">
                        <thead>
                            <tr class="bg-dark text-light">
                                <th scope="col">Id</th>
                                <th scope="col" >Name</th>
                                <th scope="col" width="100px">Img Link</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody id="city-data">
                            <?php
                                require('include/essentils.php');
                                require('include/db_config.php');

                                if ($con->connect_error) {
                                    die("Connection failed: " . $con->connect_error);
                                }

                                // Fetch data from the admin_card table
                                $sql = "SELECT * FROM cities";
                                $result = $con->query($sql);
                                $data = array();

                                // Check if there are rows in the result set
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $data[] = $row;
                                        echo '<tr>';
                                        echo '<th scope="row">' . $row['id'] . '</th>';
                                        echo '<td>' . $row['city'] . '</td>';
                                        echo '<td>' . $row['img'] . '</td>';
                                        echo '<td><div class="text-end ">
                                        <button type="button" class="btn btn-dark shadow-none btn-sm " data-bs-toggle="modal" data-bs-target="#edit-city' . $row['id'] . '" >
                                        <i class="bi bi-pencil-square"></i>  Edit
                                        </button>
                                        <a href ="delete_city.php?id='.$row['id'].' "class="btn btn-danger roundes-pill shadow-none btn-sm">
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

                            <!---------------- add city Modal --------------------->
                            <div class="modal fade" id="add-city" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 
                                <div class="modal-dialog ">
                                    <form id="add_city_form"  autocomplete="off" action="add_city.php" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add City</h5>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class=" mb-3">
                                                        <label class="form-label fw-bold">City Name</label>
                                                        <input type="text" name="city"  class="form-control shadow-none" required>
                                                    </div>
                                                    <div class=" mb-3">
                                                        <label class="form-label fw-bold">City img-link</label>
                                                        <input type="text" name="img_link"  class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="reset"  class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                                <button type="submit" name="submit"  class="btn coustem-bg text-white shadow-none" >Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!---------------- Edit city modal --------------------->
                            <?php
                                foreach ($data as $city) {
                                    echo '<div class="modal fade" id="edit-city' . $city['id'] . '" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">';
                                    echo '<div class="modal-dialog ">';
                                    echo '<form id="edit_admin_form" autocomplete="off" action="edit_city.php?id=' . $city['id'] . '" method="post">';
                                    echo '<div class="modal-content">';
                                    echo '<div class="modal-header">';
                                    echo '<h5 class="modal-title">Edit City</h5>';
                                    echo '</div>';
                                    echo '<div class="modal-body">';
                                    echo '<input type="hidden" name="id" value="' . $city['id'] . '">';
                                    echo '<div class="row">';
                                    echo '<div class="mb-3">';
                                    echo '<label class="form-label fw-bold">Name</label>';
                                    echo '<input type="text" name="city" class="form-control shadow-none" value="' . $city['city'] . '" required>';
                                    echo '</div>';
                                    echo '<div class="mb-3">';
                                    echo '<label class="form-label fw-bold">Image link</label>';
                                    echo '<input type="text" name="img" class="form-control shadow-none" value="' . $city['img'] . '" required>';
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


                    </table>
                </div>
            </div>
        </div>

      

         <!-- ?php echo $_SERVER['DOCUMENT_ROOT']?> -->

            </div>
        </div>
    </div>
    
</body>
</html>