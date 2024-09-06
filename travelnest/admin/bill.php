<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking - Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .bill-details {
            margin-top: 30px;
        }
        .bill-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .bill-details th, .bill-details td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .bill-details th {
            background-color: #f2f2f2;
        }
        .total-price {
            margin-top: 20px;
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hotel Booking - Bill</h2>
        <div class="bill-details">
            <table>
                <tr>
                    <th>Hotel Name:</th>
                    <td><?php echo $hotel_name; ?></td>
                </tr>
                <tr>
                    <th>Room No:</th>
                    <td><?php echo $room_no; ?></td>
                </tr>
                <tr>
                    <th>Guest Name:</th>
                    <td><?php echo $username; ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <th>Check-in Date:</th>
                    <td><?php echo $checkin; ?></td>
                </tr>
                <tr>
                    <th>Check-out Date:</th>
                    <td><?php echo $checkout; ?></td>
                </tr>
                <tr>
                    <th>Number of Adults:</th>
                    <td><?php echo $adult; ?></td>
                </tr>
                <tr>
                    <th>Number of Children:</th>
                    <td><?php echo $child; ?></td>
                </tr>
            </table>
        </div>
        <div class="total-price">
            Total Price: <?php echo $total_price; ?>
        </
