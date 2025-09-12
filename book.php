<?php
session_start();
include './include/connect.php';
include './include/header.php';

// Check if necessary parameters are set in the URL
if (isset($_GET['id']) && isset($_GET['days']) && isset($_GET['total']) && isset($_GET['in']) && isset($_GET['out'])) {

    $rc_id = $_GET['id'];
    $days = $_GET['days'];
    $total = $_GET['total'];
    $check_in = $_GET['in'];
    $check_out = $_GET['out'];

    // Default values
$default_room_type = 'room';
$default_reserve_fee = 500;

// Check if the room_type is set in the URL and is valid
if (isset($_GET['room_type'])) {
    $room_type = strtolower($_GET['room_type']);
    switch ($room_type) {
        case 'room':
        case 'cottage':
            // Valid room type
            break;
        default:
            // Invalid room type, fallback to default
            $room_type = $default_room_type;
    }
} else {
    // Room type not set in URL, use default
    $room_type = $default_room_type;
}

// Validate and set the reserve_fee based on the room_type
$reserve_fee = ($room_type === 'cottage') ? 300 : 500;

// Ensure $reserve_fee is a positive integer
$reserve_fee = max(0, intval($reserve_fee));

// Set a default value if $reserve_fee is not valid
$reserve_fee = ($reserve_fee > 0) ? $reserve_fee : $default_reserve_fee;



    // Check if the form is submitted
    if (isset($_POST['booked_btn'])) {
        // Sanitize and retrieve form input data
        $cus_name = isset($_POST['cus_name']) ? mysqli_real_escape_string($con, $_POST['cus_name']) : '';
        $cus_cpnum = isset($_POST['cus_cpnum']) ? mysqli_real_escape_string($con, $_POST['cus_cpnum']) : '';
        $cus_address = isset($_POST['cus_address']) ? mysqli_real_escape_string($con, $_POST['cus_address']) : '';
        $cus_email = isset($_POST['cus_email']) ? mysqli_real_escape_string($con, $_POST['cus_email']) : '';
        $check_status = 'Booked';

        // Assuming there is a reservation fee input in the form
        $reserve_fee = isset($_POST['reserve_fee']) ? intval($_POST['reserve_fee']) : $reserve_fee;

        // Check if a file is uploaded
        if ($_FILES['receipt_img']['size'] > 0) {
            $upload_dir = './assets/';
            $img_name = $_FILES['receipt_img']['name'];
            $img_tmp_name = $_FILES['receipt_img']['tmp_name'];
            $img_path = $upload_dir . $img_name;

            // Ensure the 'assets' directory exists
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($img_tmp_name, $img_path)) {
                // File uploaded successfully
            } else {
                // Handle error if file upload fails
                $img_path = '';  // Set a default value or handle the error as needed
                die('File upload failed: ' . $_FILES['receipt_img']['error']);
            }
        }

        // Insert booking details into the bookings table
        $query = "INSERT INTO bookings (book_name, book_desc, book_type, book_price, book_days, book_total, book_reservefee, book_in, book_out, book_cpnum, book_address, book_email, book_status, receipt_img, rc_id) 
                  VALUES ('$cus_name', (SELECT description FROM rooms_cottages WHERE rc_id = '$rc_id'), '$room_type', (SELECT price FROM rooms_cottages WHERE rc_id = '$rc_id'), '$days', '$total', '$reserve_fee', '$check_in', '$check_out', '$cus_cpnum', '$cus_address', '$cus_email', '$check_status', '$img_path', '$rc_id')";

        $result = mysqli_query($con, $query);

        // Check if the booking insertion is successful
        if ($result) {
            // Update the status of the room/cottage to 'Not Available'
            $update_query = "UPDATE rooms_cottages SET status = 'Not Available' WHERE rc_id = '$rc_id'";
            $update_result = mysqli_query($con, $update_query);

            // Check if the room status update is successful
            if (!$update_result) {
                die('Update Query Failed: ' . mysqli_error($con));
            }

            // Insert into customers table with ref_no
            $insert_customer_query = "INSERT INTO customers (cus_name, cus_address, cus_email, cus_cpnum, receipt_img, reservation_fee, rc_id) VALUES ('$cus_name', '$cus_address', '$cus_email', '$cus_cpnum', '$img_path', '$reserve_fee', '$rc_id')";
            $insert_customer_result = mysqli_query($con, $insert_customer_query);

            // Check if the customer details insertion is successful
            if (!$insert_customer_result) {
                die('Insert Customer Query Failed: ' . mysqli_error($con));
            }

            // Redirect to the home page after successful booking
            echo "<script>window.open('home.php','_self');</script>";
        } else {
            // Display an error message if booking insertion fails
            die('Insert Query Failed: ' . mysqli_error($con));
        }
    }
} else {
    // Redirect to the home page if required parameters are not set
    echo "<script>window.open('home.php','_self');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking confirmation</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add additional styles here or in your custom CSS file */
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        h2 {
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <h2 class="text-center">Booked Now</h2>
                <form method="post"
                      action="book.php?id=<?php echo $rc_id; ?>&days=<?php echo $days; ?>&total=<?php echo $total; ?>&in=<?php echo $check_in; ?>&out=<?php echo $check_out; ?>"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Room or Cottage Type:</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="room_type" value="room" <?php echo ($room_type === 'room') ? 'checked' : ''; ?>> Room
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="room_type" value="cottage" <?php echo ($room_type === 'cottage') ? 'checked' : ''; ?>> Cottage
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="reserve_fee">Reservation Fee:</label>
                        <input type="text" name="reserve_fee" class="form-control" value="<?php echo $reserve_fee; ?>" readonly>
                    </div>

                    <div class="form-group">
                    <label for="cus_name">Customer Name:</label>
                    <input type="text" name="cus_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="cus_cpnum">Customer Phone Number:</label>
                    <input type="text" name="cus_cpnum" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="cus_address">Customer Address:</label>
                    <input type="text" name="cus_address" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="cus_email">Customer Email:</label>
                    <input type="email" name="cus_email" class="form-control" required>
                </div>

                <!-- Add a form input for uploading receipt image -->
                <div class="form-group">
                    <label for="receipt_img">Upload Receipt Image:</label>
                    <input type="file" name="receipt_img" class="form-control-file" accept="image/*" required>
                </div>

                    <div class="text-center">
                        <button type="submit" name="booked_btn" class="btn btn-primary">Confirm Booking</button>
                        <a href="home.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-4">
                <img src="assets/gcashcode.jpg" alt="Booking Image" class="img-fluid">
            </div>
        </div>
    </div>

   <!-- Add this button/link to trigger the modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal">
  View Booking Terms and Regulations
</button>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">Booking Terms and Regulations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <strong>Reservation fee:</strong>
        <ul>
          <li>To reserve your booking, you must pay a reservation fee.</li>
          <li>The reservation cost may vary depending on the type of accommodation.</li>
        </ul>

        <strong>Non-refundable Reservation Fee:</strong>
        <ul>
          <li>The reservation fee is not refundable under any circumstances.</li>
          <li>This policy ensures that the resort receives compensation for reserving the room or cottage for you, regardless of changes in your plans.</li>
        </ul>

        <strong>Booking Detail Confirmation:</strong>
        <ul>
          <li>The guest must double-check all booking details before confirming their reservation.</li>
          <li>To avoid problems when you arrive, double-check the dates, room type, and other relevant details.</li>
        </ul>

        <strong>No cancellation policy:</strong>
        <ul>
          <li>The resort does not accept cancellations or refunds for any reason.</li>
          <li>Guests must carefully review their schedules before confirming the reservation.</li>
        </ul>

        <strong>Contact Information:</strong>
        <ul>
          <li>Provide clear contact information for the resort's bookings in case guests require changes or have inquiries.</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    <script>
        // Update the reservation fee field based on the selected room or cottage type
        document.addEventListener('DOMContentLoaded', function () {
            var roomTypeRadios = document.querySelectorAll('[name="room_type"]');
            var reserveFeeInput = document.querySelector('[name="reserve_fee"]');

            // Function to update reservation fee based on selected room/cottage type
            function updateReservationFee() {
                if (roomTypeRadios[0].checked) {
                    reserveFeeInput.value = '500';
                } else if (roomTypeRadios[1].checked) {
                    reserveFeeInput.value = '300';
                } else {
                    reserveFeeInput.value = '';
                }
            }

            // Add event listeners to room type radios
            roomTypeRadios.forEach(function (radio) {
                radio.addEventListener('change', updateReservationFee);
            });

            // Initial update based on default selection
            updateReservationFee();
        });
    </script>
</body>

</html>