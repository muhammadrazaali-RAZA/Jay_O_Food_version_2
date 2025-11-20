<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jay O Food</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/chef-hat.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><img src="img/chef-hat.png" alt="Logo">Jay O Food</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">Über uns</a>
                        <div class="nav-item dropdown">
                            <a href="Events.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Events</a>
                            <div class="dropdown-menu m-0">
                                <?php

                                    // $db = mysqli_connect('mysqlsvr83.world4you.com', 'sql2907834', '5cf4r*eg', '5669563db1');
                                    // $db = mysqli_connect('localhost', 'root', '', 'jayo');

                                    // Read database connection details from the text file
                                    $databaseFile = 'database_connect.txt';
                                    $lines = file($databaseFile, FILE_IGNORE_NEW_LINES);

                                    if (!$lines || count($lines) !== 4) {
                                        die("Error reading database connection details.");
                                    }

                                    $host = $lines[0];
                                    $username = $lines[1];
                                    $password = $lines[2];
                                    $database = $lines[3];

                                    // Establish the database connection
                                    $con = mysqli_connect($host, $username, $password, $database);
                                    if (!$con) {
                                        die("Database connection failed: " . mysqli_connect_error());
                                    }
                                    $db = $con;
                                    
                                    $sql = "SELECT * FROM events";

                                    $events = mysqli_query($db, $sql);

                                    $row_count = mysqli_num_rows($events);

                                    for($i=1; $i<=$row_count; $i++)
                                    {
                                        $row = mysqli_fetch_array($events); 
                                ?>
                                <a href="Events.php?event=<?php echo $row["event_start"]; ?>" class="dropdown-item"><?php echo $row["name"]; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- <a href="" class="nav-item nav-link">Kursangebot</a>
                        <a href="" class="nav-item nav-link">Geschenkideen</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Angebot</a>
                            <div class="dropdown-menu m-0">
                                <a href="" class="dropdown-item">Delivery</a>
                                <a href="" class="dropdown-item">Events</a>
                                <a href="" class="dropdown-item">Menu</a>
                            </div>
                        </div> -->
                        <a href="contact.php" class="nav-item nav-link">Kontakt</a>
                    </div>
                    <a href="CateringBooking.php" class="btn btn-primary py-2 px-4">Catering Buchung</a>
                </div>
            </nav>


            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Tischreservierung</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
           <div class="col-md-12 bg-dark align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservierung</h5>
                        <h1 class="text-white mb-4">Tischreservierung online</h1>
                        <form action="table_booked.php" method="post" id="booking">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="Name" class="form-control" id="name" placeholder="Your Name" required>
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                                            <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="datetime-local" name="rev_date" class="form-control" id="datetime" placeholder="Date & Time" required>
                                        <label for="datetime">Datum & Uhrzeit</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" name="people" class="form-control" Placeholder="No Of People" required>
                                        <label for="number">Personenanzahl</label>
                                      </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="request" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                        <label for="message">Spezielle Anfragen</label>
                                    </div>
                                </div>
                                <label>
                                    <p class="text-primary"><input type="checkbox" name="agree"  class="text-rgba(15, 26, 43, .5) mb-4" required>  Ich akzeptiere die <a href="TableTermConditions.php?page=TableBooking.php"><b><u>Allgemeinen Geschäftsbedingungen.</u></b></a></p>
                                </label>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Jetzt buchen</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Allgemeines</h4>
                        <a class="btn btn-link" href="about.php">Über uns</a>
                        <a class="btn btn-link" href="contact.php">Kontakt</a>
                        <a class="btn btn-link" href="CateringTermConditions.php">Reservierung</a>
                        <a class="btn btn-link" href="DataProtectionRegulation.php">Datenschutz</a>
                        <a class="btn btn-link" href="TableTermConditions.php?page=TableBooking.php">Allgemeine Geschäftsbedingungen</a>
                    </div>
                    <?php 

                        $sql = " select * from contact";

                        $result = mysqli_query($db, $sql);

                        $row = mysqli_fetch_array($result);

                    ?>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Kontakt</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo $row["location"]; ?></p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo $row["phone"]; ?></p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i><?php echo $row["info"]; ?></p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://instagram.com/jayofood?igshid=MzRlODBiNWFlZA=="><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/jayofood"><i class="fab fa-facebook-f"></i></a>
                            <!-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a> -->
                            <!-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                    </div>
                    <?php 

                        $sql = " select * from Res_timing";

                        $result = mysqli_query($db, $sql);

                        $row = mysqli_fetch_array($result);

                    ?>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Öffnungszeiten</h4>
                        <!-- <h5 class="text-light fw-normal"></h5> -->
                        <p class="mb-2">Dienstag <b class="text-primary"><?php echo $row['dienstag']; ?></b></p>
                        <p class="mb-2">Mittwoch <b class="text-primary"><?php echo $row['mittwoch']; ?></b></p>
                        <p class="mb-2">Donnerstag <b class="text-primary"><?php echo $row['donnerstag']; ?></b></p>
                        <p class="mb-2">Freitag <b class="text-primary"><?php echo $row['freitag']; ?></b></p>
                        <p class="mb-2">Samstag  <b class="text-primary"><?php echo $row['samstag']; ?></b></p>
                        <p class="mb-2">Feiertag <b class="text-primary"><?php echo $row['feiertag']; ?></b></p>
                        <p class="mb-2">Montag & Sonntag <b class="text-primary"><?php echo $row['mon_sonn']; ?></b></p>
                        
                        <!-- <h5 class="text-light fw-normal">Sunday</h5> -->
                        <!-- <p>10AM - 08PM</p> -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Neues Menü und Neuigkeiten von Jay O Food</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Anmelden</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="DataProtectionRegulation.php">Jay O Food</a>, All Right Reserved. 
                            
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "DataProtectionRegulation.php/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="DataProtectionRegulation.php">Jay O Food</a><br><br>
                            <!-- Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="index.php">Home</a>
                                <a href="Impressum.php">Impressum</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


    <!-- date time picker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
