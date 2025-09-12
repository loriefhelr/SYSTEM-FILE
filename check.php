<?php
include 'include/connect.php';
include 'include/header.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home - Nature Spring Resort</title>
    <!-- Add your CSS styles or link to an external stylesheet here -->
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external stylesheet -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Nature Spring Resort</a>
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
                        <a class="nav-link" href="ameneties.php">Ameneties</a>
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

    <?php
    if (isset($_POST['check_btn'])) {
        $check_in = addslashes($_POST['checkin']);
        $check_out = addslashes($_POST['checkout']);
        $room_type = addslashes($_POST['roomType']);
        $datediff = strtotime($check_out) - strtotime($check_in);

        if (empty($check_in) || empty($check_out)) {
            echo "<script>alert('Please select both check-in and check-out dates!');</script>";
            echo "<script>window.open('home.php','_self');</script>";
        } else {
            // Modify the query to include the selected room type
            $query = "SELECT * FROM rooms_cottages WHERE status = 'Available' AND type = '$room_type'";
            $result = mysqli_query($con, $query);

            if (!$result) {
                die('Query Failed: ' . mysqli_error($con));
            }

            $available_rooms_cottages = mysqli_fetch_all($result, MYSQLI_ASSOC);
            ?>
            <div class="container">
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <img src="assets/img/logo.png" class="d-block w-100">
                    </div>
                    <div class="col-md-9">
                        <hr>
                        <h5 class="alert alert-success">
                            Rooms and Cottages Available from: <?php echo $check_in . ' to ' . $check_out; ?>
                        </h5>
                        <table class="table table-hover">
                            <thead style="color: green">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Days</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($available_rooms_cottages) === 0) {
                                    echo "<tr><td colspan='8' class='text-center'><h4 class='text-info'>No rooms or cottages available!</h4></td></tr>";
                                } else {
                                    foreach ($available_rooms_cottages as $item) {
                                        $days = max(1, $datediff / 3600 / 24);
                                        $total = ($days == 0) ? $item['price'] : $days * $item['price'];
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#imageModal<?php echo $item['rc_id']; ?>">
                                                    <img src="./assets/<?php echo $item['img']; ?>" alt="Room Image" style="max-width: 100px; max-height: 100px;">
                                                </a>
                                            </td>
                                            <td><?php echo $item['name']; ?></td>
                                            <td><?php echo $item['description']; ?></td>
                                            <td><?php echo $item['type']; ?></td>
                                            <td><?php echo "Php " . number_format($item['price']) . ".00"; ?></td>
                                            <td><?php echo $item['status']; ?></td>
                                            <td><?php echo ($days > 0) ? $days : 1; ?></td>
                                            <td><?php echo "Php " . number_format($total) . ".00"; ?></td>
                                            <td>
                                               <!-- Inside the loop where you display available rooms or cottages -->
                                            <a href="book.php?id=<?php echo $item['rc_id']; ?>&days=<?php echo $days; ?>&total=<?php echo $total; ?>&in=<?php echo $check_in; ?>&out=<?php echo $check_out; ?>&room_type=<?php echo $item['type']; ?>" class="btn btn-outline-info btn-sm">Book Now</a>

                                            </td>
                                        </tr>

                                        <!-- Bootstrap Modal for Image View -->
                                        <div class="modal fade" id="imageModal<?php echo $item['rc_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="imageModalLabel"> Image</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="./assets/<?php echo $item['img']; ?>" alt="Room Image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="home.php" class="btn btn-outline-info"> Go Back</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Nature Spring Resort. All rights reserved. | Contact: lorie@naturespringresort.com</p>
        </div>
    </footer>

    <!-- Add your JavaScript scripts or link to external scripts here -->
</body>

</html>
