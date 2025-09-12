<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Include your database connection code here
    session_start();
    include 'include/connect.php';

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process the form data
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $contactNo = mysqli_real_escape_string($con, $_POST["contact_no"]);
    $message = mysqli_real_escape_string($con, $_POST["messages"]);
    $status = "Unread"; // You can set the initial status as needed

    // Insert data into the inquiries table
    $sql = "INSERT INTO inquiries (fname, email, contact_no, messages, status) VALUES ('$fname', '$email', '$contactNo', '$message', '$status')";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Inquiry submitted successfully. We will get back to you soon!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <?php
    include 'include/header.php';
    ?>
    <script>
        // Your additional JavaScript code can go here if needed
    </script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="home.php">Nature Spring Resort</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ameneties.php">Amenities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./admin/login.php">Admin Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h2>Contact Us</h2>

    <p>
        Feel free to reach out to us with any inquiries or messages. We value your feedback and look forward to hearing from you. 
        You can also contact us directly using the following information:
    </p>

    <ul>
        <li><strong>Cellphone Number:</strong> 09061234567</li>
        <li><strong>Email:</strong> lorie@gmail.com</li>
        <li><strong>Address:</strong> Sta Maria Gonazaga Cagayan</li>
    </ul>

    <form action="contactus.php" method="post">
        <!-- ... (Previous form code) ... -->
    </form>
</div>
<div class="container mt-5">

    <form action="contactus.php" method="post">
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="contact_no">Contact Number:</label>
            <input type="tel" class="form-control" id="contact_no" name="contact_no" required>
        </div>

        <div class="form-group">
            <label for="messages">Message:</label>
            <textarea class="form-control" id="messages" name="messages" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Send Message</button>
    </form>
</div>


<footer>
    <div class="container">
        <p>&copy; 2024 Nature Spring Resort. All rights reserved. | Contact: lorie@naturespringresort.com</p>
    </div>
</footer>

</body>

</html>
