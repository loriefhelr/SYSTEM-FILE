<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home - Nature Spring Resort</title>
    <?php
    session_start();
    include './include/connect.php';
    include 'include/header.php';
    ?>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ensure the body takes up the full height of the viewport */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        /* Flexbox layout to push the footer to the bottom */
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        footer {
            background-color: #blue;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="home.php">Nature Spring Resort</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="ameneties.php">Amenities</a></li>
                        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="./admin/login.php">Admin Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5 content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Welcome to Nature Spring Resort</h4>
                            <p class="text-center">Experience peacefulness in the heart of nature.</p>
                        </div>

                        <div class="card-body">
                            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#imageCarousel" data-slide-to="1"></li>
                                    <li data-target="#imageCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/img/1.png" class="d-block w-100" alt="Nature Image">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/2.jpg" class="d-block w-100" alt="Nature Image">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/e.jpg" class="d-block w-100" alt="Nature Image">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            <form action="check.php" method="post" class="mt-4">
                                <div class="form-group">
                                    <label for="checkin">Check-in Date:</label>
                                    <input type="date" id="checkin" name="checkin" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="checkout">Check-out Date:</label>
                                    <input type="date" id="checkout" name="checkout" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="roomType">Select Room or Cottage:</label>
                                    <select id="roomType" name="roomType" class="form-control" required>
                                        <option value="room">Room</option>
                                        <option value="cottage">Cottage</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="check_btn" class="btn btn-primary">Check Availability</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="container text-center">
                <p>&copy; 2024 Nature Spring Resort. All rights reserved. | Contact: lorie@naturespringresort.com</p>
            </div>
        </footer>
    </div>


</body>

</html>
