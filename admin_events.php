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
    <!-- <link rel="stylesheet" href="css/style.css"> -->

</head>

<body>
    <?php
        session_start();
        if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 3600)) {
            session_unset(); 
            session_destroy(); 
            echo "session destroyed"; 
        }

        $name = $_SESSION["name"];
        $pass = $_SESSION["pass"];

        // $con = mysqli_connect('mysqlsvr83.world4you.com', 'sql2907834', '5cf4r*eg', '5669563db1');
        // $con = mysqli_connect('localhost', 'root', '', 'jayo');

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


        $s = " select * from admin where name = '$name' && pass = '$pass'";
        $result = mysqli_query($con, $s);
        $num = mysqli_num_rows($result);

        if($num == 0 ){
            header("location:admin/index.php?first_name={$email}&unique={$pass}");
        }

        $p_0 = " select * from events";

		$result = mysqli_query($con, $p_0);
		// echo $result;
		$row_count = mysqli_num_rows($result);
    ?>
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
                        <a href="admin_home.php" class="nav-item nav-link">Home</a>
                        <!-- <a href="about.php" class="nav-item nav-link ">Über uns</a> -->
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
                        
                    </div>
                    <a href="admin/php_signout.php" class="btn btn-primary py-2 px-4">Sign Out </a>
                    <a class=" btn-dark py-2 px-4" id="demo"></a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $name; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item text-white">Home</li>
                            <li class="breadcrumb-item text-white" aria-current="page">Admin</li>
                            <li class="breadcrumb-item text-primary active" aria-current="page">Events</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.0s">
           <div class="col-md-12 bg-dark align-items-center">
                <div class="p-5 wow fadeInUp" data-wow-delay="0.0s">
                    <div class="tab-pane fade show p-0 table-box">
                        <div class="row g-4">
                            <div class="col-lg-12 text-center">
                                <div class="d-flex align-items-center">
                                    <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/about-4.JPG" alt="" style="width: 120px;"> -->
                                    <h2  style="color: #ff9900; font-family: 'Helvetica Neue', sans-serif; font-size: 98px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Events List</h2>
                                </div>
                            </div>
                            <?php
								for($i=1; $i<=$row_count; $i++)
								{
								    $row = mysqli_fetch_array($result);
							?>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="img/events/<?php echo $row["imgname"]; ?>" alt="" style="width: 650px;">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/about-4.JPG" alt="" style="width: 600px;"> -->
                                    <form method='post' action='admin/php_delete_event.php'>
	                                    <div class="w-100 d-flex flex-column text-start ps-4">
	                                        <h2 class="text-primary">Name : <?php echo $row["name"]; ?></h2>
	                                        <h3 class="text-primary">Location : <?php echo $row["location"]; ?></h3>
	                                        <h3 class="text-primary">Event Starts at : <?php echo $row["event_start"]; ?></h3>
	                                        <h3 class="text-primary">Event Ends   at : <?php echo $row["event_end"]; ?></h3>
	                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
	                                            <h3 class="text-white">Details : <?php echo $row["detail"]; ?></h3>
	                                        </h5>
	                                        <h5 class="d-flex justify-content-between border-bottom pb-2"></h5>
	                                        <input type='hidden' name='event_id' value='<?php echo $row['imgname']; ?>'>
	                                        <button class="btn btn-primary" type="submit">Delete</button> 
	                                    </div>
                                    </form>
                                </div>
                            </div>
                            <?php
							    }
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reservation End -->
        



    	<!-- heading Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Add Events on website</h5>
                    <!-- <h1 class="mb-5">Our Master Chefs</h1> -->
                </div>
            </div>
        </div>
        <!-- heading End -->

        <!-- add  event  Start -->
        <form action="php_event.php" method="post" enctype="multipart/form-data" id="events">
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <h3 class="text-dark mb-4">Choose File (should be : jpg, png)</h3>
                            <input type="file" name="img" id="img_">
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="form-floating">
                                <input type="text" name="Name" class="form-control" id="name" placeholder="Event Name:" required>
                                <label for="name">Event Name:</label>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="datetime-local" name="event_start" class="form-control" id="Start" placeholder="Date & Time" required>
                                <label for="datetime">Event start Datum & Uhrzeit</label>
                            </div>
                        </div>

                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="datetime-local" name="event_end" class="form-control" id="Ends" placeholder="Date & Time" required>
                                <label for="datetime">Event End Datum & Uhrzeit</label>
                            </div>
                        </div>

                        <div class="col-12 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="form-floating">
                                <input type="text" name="location" class="form-control" id="location" placeholder="Event Location:" required>
                                <label for="name">Event Location:</label>
                            </div>
                        </div>

                        <div class="col-12 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="form-floating">
                                <textarea class="form-control" name="detail" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                <label for="message">Detail About Event</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Anmelden</button>
            </div>
        </form>
        <!-- add  event  End -->

        

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
                        <a class="btn btn-link" href="TableTermConditions.php">Allgemeine Geschäftsbedingungen</a>
                    </div>
                    <?php 

                        $db = $con;

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var countdownDate = <?php echo $_SESSION['start'] + 3600; ?>; // 1 hour in seconds from the starting time

        var x = setInterval(function() {
            var now = Math.floor(new Date().getTime() / 1000);
            var distance = countdownDate - now;

            var hours = Math.floor(distance / 3600);
            var minutes = Math.floor((distance % 3600) / 60);
            var seconds = distance % 60;

            // Display the countdown in the "demo" element
            document.getElementById("demo").innerHTML = "Left : " + minutes + "m:" + seconds +"s";

            if (distance <= 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>