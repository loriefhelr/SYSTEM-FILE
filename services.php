<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Management System</title>
    <?php
    session_start();
    include 'include/connect.php';
    include 'include/header.php';
    ?>
  <style>
    .service-card {
        border: 1px solid #ddd;
        margin: 10px;
        padding: 10px;
        display: inline-block;
        width: 300px; /* Set a fixed width for better alignment */
    }

    .service-card img {
        max-width: 100%;
        max-height: 200px; /* Set a maximum height for the images */
        height: auto;
    }

    .service-details {
        margin-top: 10px;
    }

    .service-title {
        font-size: 18px;
        font-weight: bold;
    }

    .service-description {
        margin-top: 5px;
    }

    .service-price {
        margin-top: 5px;
        font-style: italic;
    }

    .service-status {
        margin-top: 5px;
        font-style: italic;
    }

    .no-services {
        text-align: center;
        font-style: italic;
    }
</style>


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
        <h2>Services</h2>
        <?php
        $result = $con->query("SELECT * FROM services");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="service-card">';
                echo '<img src="./assets/' . $row['img'] . '" alt="Service Image">';
                echo '<div class="service-details">';
                echo '<div class="service-title">' . $row['name'] . '</div>';
                echo '<div class="service-description">' . $row['description'] . '</div>';
             //  echo '<div class="service-price">Price: ₱' . $row['price'] . '</div>'; // Displaying Price
                echo '<div class="service-status">Status: ' . $row['status'] . '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p class="no-services">No services found</p>';
        }

        $con->close();
        ?>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Nature Spring Resort. All rights reserved. | Contact: lorie@naturespringresort.com</p>
        </div>
    </footer>
</body>

</html>
