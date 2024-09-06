
<?php require('include/db_config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -HOME</title>
    <?php require('include/links.php'); ?>
</head>
<body class="bg-light">

    <?php require('include/header.php'); ?>
    <?php require('include/scripts.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Admin List</h3>

                <!----------------  admin --------------------->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-admin">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-lg" style="height : 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light sticky-top">
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col"></th> 
                                    </tr>
                                </thead>
                                <tbody id="admin-data">
                                    <?php
                                        require('include/essentils.php');

                                        if ($con->connect_error) {
                                            die("Connection failed: " . $con->connect_error);
                                        }

                                        $sql = "SELECT * FROM admin_cred";
                                        $result = $con->query($sql);
                                        $data = array();

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $data[] = $row;
                                                echo '<tr>';
                                                echo '<th scope="row">' . $row['id'] . '</th>';
                                                echo '<td>' . $row['admin_name'] . '</td>';
                                                echo '<td><div class="text-end">
                                                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#edit-admin' . $row['id'] . '">
                                                        <i class="bi bi-pencil-square"></i>  Edit
                                                        </button>
                                                        <a href="delete_admin.php?id=' . $row['id'] . '" class="btn btn-danger roundes-pill shadow-none btn-sm">
                                                        <i class="bi bi-trash"></i> Delete 
                                                        </a></td></div>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="4">No data available</td></tr>';
                                        }
                                    ?>
                                </tbody>   
                                
                                    
                                <!---------------- Add admin modal --------------------->
                                <div class="modal fade" id="add-admin" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <form id="add_admin_form" autocomplete="off" action="add_admin.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add admin</h5>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold">Name </label>
                                                            <input type="text" name="admin_name" class="form-control shadow-none" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold">Password </label>
                                                            <div class="input-group mb-3">
                                                                <input type="password" name="admin_pass" class="form-control shadow-none" required id="addPassword">
                                                                <div class="input-group-text">
                                                                <!--input class="form-check-input mt-0 show-password-toggle" type="checkbox" value="" aria-label="Checkbox for following text input" id="addShowPasswordToggle"-->
                                                                <input class="form-check-input mt-0 show-password-toggle" type="checkbox" value="addPassword" aria-label="Checkbox for following text input" onclick="showAddPassword('addPassword')">
                                                                    <label class="form-check-label ms-2" for="addShowPasswordToggle">Show Password</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                                    <button type="submit" name="submit" class="btn coustem-bg text-white shadow-none">Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!---------------- Edit admin modal --------------------->
                                <?php
                                    foreach ($data as $admin) {
                                        echo '<div class="modal fade" id="edit-admin' . $admin['id'] . '" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">';
                                        echo '<div class="modal-dialog ">';
                                        echo '<form id="edit_admin_form" autocomplete="off" action="edit_admin.php?id=' . $admin['id'] . '" method="post">';
                                        echo '<div class="modal-content">';
                                        echo '<div class="modal-header">';
                                        echo '<h5 class="modal-title">Edit admin</h5>';
                                        echo '</div>';
                                        echo '<div class="modal-body">';
                                        echo '<input type="hidden" name="id" value="' . $admin['id'] . '">';
                                        echo '<div class="row">';
                                        echo '<div class="mb-3">';
                                        echo '<label class="form-label fw-bold">Name</label>';
                                        echo '<input type="text" name="admin_name" class="form-control shadow-none" value="' . $admin['admin_name'] . '" required>';
                                        echo '</div>';
                                        echo '<div class="mb-3">';
                                        echo '<label class="form-label fw-bold">Password</label>';
                                        echo '<div class="input-group mb-3">';
                                        echo '<input type="password" name="admin_pass" class="form-control shadow-none" value="' . $admin['admin_pass'] . '" required id="editPassword' . $admin['id'] . '">';
                                        echo '<div class="input-group-text">';
                                        echo '<input class="form-check-input mt-0 show-password-toggle" type="checkbox" value="' . $admin['id'] . '" aria-label="Checkbox for following text input" onclick="showEditPassword(this)">';
                                        echo '<label class="form-check-label ms-2">Show Password</label>';
                                        echo '</div>';
                                        echo '</div>';
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
            </div>
        </div>
    </div>
    
    <!--------------------edit admin show password code--------------------->
    <script>
        function showEditPassword(checkbox) {
            var passwordInputId = checkbox.value;
            var passwordInput = document.getElementById("editPassword" + passwordInputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
    <!--------------------add admin show password code--------------------->
    <script>
        function showAddPassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>

