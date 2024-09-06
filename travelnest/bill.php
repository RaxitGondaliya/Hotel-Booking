<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        .bill-item {
            margin-bottom: 15px;
        }

        .bill-item label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }

        .bill-item p {
            margin: 5px 0;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn.print {
            background-color: #28a745;
        }

        .btn.print:hover {
            background-color: #218838;
        }

        @media print {
            .btn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Booking Confirmation</h3>
            </div>
            <div class="card-body">
                <?php
                    // Fetch and display booking details
                    if(isset($_GET['hotel_name']) && isset($_GET['room_no']) && isset($_GET['username']) && isset($_GET['email']) && isset($_GET['checkin']) && isset($_GET['checkout']) && isset($_GET['adult']) && isset($_GET['child'])) {
                        $hotel_name = $_GET['hotel_name'];
                        $room_no = $_GET['room_no'];
                        $username = $_GET['username'];
                        $email = $_GET['email'];
                        $checkin = $_GET['checkin'];
                        $checkout = $_GET['checkout'];
                        $adult = $_GET['adult'];
                        $child = $_GET['child'];

                        echo "<div class='bill-item'>";
                        echo "<label>Hotel Name:</label>";
                        echo "<p>$hotel_name</p>";
                        echo "</div>";

                        echo "<div class='bill-item'>";
                        echo "<label>Room No:</label>";
                        echo "<p>$room_no</p>";
                        echo "</div>";

                        echo "<div class='bill-item'>";
                        echo "<label>Name:</label>";
                        echo "<p>$username</p>";
                        echo "</div>";

                        echo "<div class='bill-item'>";
                        echo "<label>Email:</label>";
                        echo "<p>$email</p>";
                        echo "</div>";

                        echo "<div class='bill-item'>";
                        echo "<label>Check-In Date:</label>";
                        echo "<p>$checkin</p>";
                        echo "</div>";

                        echo "<div class='bill-item'>";
                        echo "<label>Check-Out Date:</label>";
                        echo "<p>$checkout</p>";
                        echo "</div>";

                        echo "<div class='bill-item'>";
                        echo "<label>Adults:</label>";
                        echo "<p>$adult</p>";
                        echo "</div>";

                        echo "<div class='bill-item'>";
                        echo "<label>Children:</label>";
                        echo "<p>$child</p>";
                        echo "</div>";
                    } else {
                        echo "<p class='text-danger'>Booking details not found.</p>";
                    }
                ?>
                <button class="btn print" onclick="window.print()">Print</button>
            </div>
        </div>
    </div>
</body>
</html>
