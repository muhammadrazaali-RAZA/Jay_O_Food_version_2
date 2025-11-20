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

        <!-- banner Start -->
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

            $sql = "SELECT * FROM banner";

            $banner = mysqli_query($db, $sql);

            $row_count = mysqli_num_rows($banner);

            if($row_count){include('overlay.php');}

        ?>
        <!-- banner Ends -->

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
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">Über uns</a>
                        <div class="nav-item dropdown">
                            <a href="Events.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Events</a>
                            <div class="dropdown-menu m-0">
                                <?php
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
                    <a href="TableBooking.php" class="btn btn-primary py-2 px-4">Tischreservierung</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <!-- display-3 text-white animated slideInLeft -->
                            <h1 class="display-3 text-white ff-secondary text-start text-primary fw-normal">So schmeckt<br>Afrika</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Gönne dir in unserem Restaurant die authentischen Aromen Afrikas, wo jeder Bissen ein Hauch von Tradition ist!</p>
                            <a href="CateringBooking.php" class="btn btn-primary py-sm-3 px-sm-5 me-3">Catering Buchung</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/image0.jpeg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <a href="apply_intern.php">    
                                <div class="p-4">
                                    <img src="img/icons/training.png" alt="Logo" width="100" height="100">
                                    <h5>Kochkurs</h5>
                                    <p>Hier gehts zur Anmeldung.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <img src="img/icons/cooking.png" alt="Logo" width="100" height="100"> Coming Soon
                                <h5>Rezepte</h5>
                                <p>Rezepte und Zutaten</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <!-- <a href="shoping.html">     -->
                                <div class="p-4">
                                    <img src="img/icons/buy.png" alt="Logo" width="100" height="100"> Coming Soon !
                                    <h5>Online Shop</h5>
                                    <p>Bestelle Geschenke & Zutaten</p>
                                </div>
                            <!-- </a> -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <img src="img/icons/Delivery.png" alt="Logo" width="100" height="100"> Coming Soon !
                                <h5>Zustellung</h5>
                                <p>Bestelle online und genieβe zu Hause</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Über uns</h5>
                        <h1 class="mb-4">Willkommen bei<img src="img/chef-hat.png" alt="Logo" width="50" height="50">Jay O</h1>
                        <p class="mb-4">Das afrikanische Restaurant bietet eine kulinarische Reise, die sowohl spannend als auch abwechslungsreich ist und die reiche Vielfalt an Aromen und Traditionen des Kontinents präsentiert.</p>
                        <p class="mb-4">Das lebhafte Lokal vereint die Essenz Afrikas, durch köstliche Gerichte, die herzliche Gastfreundschaft und das bezaubernde Ambiente.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Jahre der</p>
                                        <h6 class="text-uppercase mb-0">ARBEITSERFAHRUNG</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">9</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Erfahrung als</p>
                                        <h6 class="text-uppercase mb-0">CHEFKöCHIN</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Speisekarte</h5>
                    <h1 class="mb-5">Beliebte Artikel</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item" onclick="myFunction()">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-1">
                                <img src="img/icons/drink.png" alt="Logo" width="50" height="50">
                                <div class="ps-3">
                                    <!-- <small class="text-body">Beliebt</small> -->
                                    <h6 class="mt-n1 mb-0">Getränke</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" onclick="myFunctionM()">
                            <a class="d-flex align-items-center text-start mx-3 pb-3 active" data-bs-toggle="pill" href="#tab-5">
                                <img src="img/icons/menu.png" alt="Logo" width="50" height="50">
                                <div class="ps-3">
                                    <!-- <small class="text-body">Berühmtes</small> -->
                                    <h6 class="mt-n1 mb-0">Hauptspeise</h6>
                                </div>
                            </a>
                        </li>
                        <!-- <li class="nav-item" onclick="myFunctionS()">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-6">
                                <img src="img/icons/dish.png" alt="Logo" width="50" height="50">
                                <div class="ps-3">
                                    <small class="text-body">Wochen</small>
                                    <h6 class="mt-n1 mb-0">Spezial</h6>
                                </div>
                            </a>
                        </li> -->
                    </ul>

                    <!-- Menu ---------------------------------------------------- -->
                    <div id="menu_3">
                        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-5">
                                    <img src="img/icons/appetizer.png" alt="Logo" width="50" height="50">
                                    <div class="ps-3">
                                        <!-- <small class="text-body">Super</small> -->
                                        <h6 class="mt-n1 mb-0">Vorspeise</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-6">
                                    <img src="img/icons/menu.png" alt="Logo" width="50" height="50">
                                    <div class="ps-3">
                                        <!-- <small class="text-body">Berühmtes</small> -->
                                        <h6 class="mt-n1 mb-0">Hauptspeise</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-7">
                                    <img src="img/icons/cake.png" alt="Logo" width="50" height="50">
                                    <div class="ps-3">
                                        <!-- <small class="text-body">Lecker</small> -->
                                        <h6 class="mt-n1 mb-0">Nachspeise</h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Menu ------------------------------------------------ -->



                    <!-- Drinks ---------------------------------------------------- -->
                    <div id="drinks_4" style="display:none;"> 
                        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-1">
                                    <img src="img/icons/Alkoholfrei.png" alt="Logo" width="50" height="50">
                                    <div class="ps-3">
                                        <small class="text-body">Getränke</small>
                                        <h6 class="mt-n1 mb-0">Alkoholfrei</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-2">
                                    <img src="img/icons/bier.png" alt="Logo" width="50" height="50">
                                    <div class="ps-3">
                                        <small class="text-body">Getränke</small>
                                        <h6 class="mt-n1 mb-0">Bier</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-3">
                                    <img src="img/icons/Drinks.png" alt="Logo" width="50" height="50">
                                    <div class="ps-3">
                                        <small class="text-body">Getränke</small>
                                        <h6 class="mt-n1 mb-0">Wein</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-4">
                                    <img src="img/icons/coffee.png" alt="Logo" width="50" height="50">
                                    <div class="ps-3">
                                        <small class="text-body">Tee</small>
                                        <h6 class="mt-n1 mb-0">Kaffee</h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Drinks ------------------------------------------------- -->
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php 
                                $p_0 = " select * from drinks where class = 'Alkoholfrei'";

                                $result = mysqli_query($con, $p_0);
                                // echo $result;
                                $row_count = mysqli_num_rows($result);
                                for($i=1; $i<=$row_count; $i++)
                                {
                                    $row = mysqli_fetch_array($result);

                                ?>

                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $row["name"]; ?></span>
                                                <span class="text-primary"><?php echo $row["volcost"]; ?></span>
                                            </h5>
                                            <small class="fst-italic">
                                                <span><?php echo $row["type"]; ?></span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h4 class="text-start">Hibiskussaft, Apfelsaft und Ginger Ale</h4>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $p_0 = " select * from drinks where class = 'Hibiskussaft, Apfelsaft und Ginger Ale'";

                                $result = mysqli_query($con, $p_0);
                                // echo $result;
                                $row_count = mysqli_num_rows($result);
                                for($i=1; $i<=$row_count; $i++)
                                {
                                    $row = mysqli_fetch_array($result);

                                ?>

                            
                                <div class="col-lg-6">
                                    <form action="admin_drink_modify.php" method="post">
                                        <div class="d-flex align-items-center">
                                            <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/1.jpg" alt="" style="width: 120px;"> -->
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?php echo $row["name"]; ?></span>
                                                    <span class="text-primary"><?php echo $row["volcost"]; ?></span>
                                                </h5>
                                                <small class="fst-italic">
                                                    <span><?php echo $row["type"]; ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php 
                                $p_0 = " select * from drinks where class = 'Bier'";

                                $result = mysqli_query($con, $p_0);
                                // echo $result;
                                $row_count = mysqli_num_rows($result);
                                for($i=1; $i<=$row_count; $i++)
                                {
                                    $row = mysqli_fetch_array($result);

                                ?>

                                
                                <div class="col-lg-6">
                                    <form action="admin_drink_modify.php" method="post">
                                        <div class="d-flex align-items-center">
                                            <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/1.jpg" alt="" style="width: 120px;"> -->
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?php echo $row["name"]; ?></span>
                                                    <span class="text-primary"><?php echo $row["volcost"]; ?></span>
                                                </h5>
                                                <small class="fst-italic">
                                                    <span><?php echo $row["type"]; ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php 
                                $p_0 = " select * from drinks where class = 'Wine'";

                                $result = mysqli_query($con, $p_0);
                                // echo $result;
                                $row_count = mysqli_num_rows($result);
                                for($i=1; $i<=$row_count; $i++)
                                {
                                    $row = mysqli_fetch_array($result);

                                ?>

                                
                                <div class="col-lg-6">
                                    <form action="admin_drink_modify.php" method="post">
                                        <div class="d-flex align-items-center">
                                            <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/1.jpg" alt="" style="width: 120px;"> -->
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?php echo $row["name"]; ?></span>
                                                    <span class="text-primary"><?php echo $row["volcost"]; ?></span>
                                                </h5>
                                                <small class="fst-italic">
                                                    <span><?php echo $row["type"]; ?></span>
                                                </small>
                                            </div>
                                        
                                        </div>
                                    </form>
                                </div>
                            
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php 
                                $p_0 = " select * from drinks where class = 'Kaffee'";

                                $result = mysqli_query($con, $p_0);
                                // echo $result;
                                $row_count = mysqli_num_rows($result);
                                for($i=1; $i<=$row_count; $i++)
                                {
                                    $row = mysqli_fetch_array($result);

                                ?>

                                <div class="col-lg-6">
                                    <form action="admin_drink_modify.php" method="post">
                                        <div class="d-flex align-items-center">
                                            <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/1.jpg" alt="" style="width: 120px;"> -->
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?php echo $row["name"]; ?></span>
                                                    <span class="text-primary"><?php echo $row["volcost"]; ?></span>
                                                </h5>
                                                <small class="fst-italic">
                                                    <span><?php echo $row["type"]; ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Vorspeise</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5649.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüsebohnensauce mit Maniokrösti (C)</span>
                                                <span class="text-primary">10,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5482.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüse Samosa auf Salat mit frischer Chilisauce (A)</span>
                                                <span class="text-primary">10,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5519.JPEG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veganer Bohneneintopf mit Reis</span>
                                                <span class="text-primary">10,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Klein und Fein</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5458.JPEG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüse Samosa mit frischer Chilisauce pro Stück (A)</span>
                                                <span class="text-primary">1,90</span>
                                            </h5>
                                            <small class="fst-italic">Klein und Fein</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5503.JPEG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Grüne oder gelbe Kochbananenpommes mit frischer Chilisauce oder Cocktailsauce</span>
                                                <span class="text-primary">5,60</span>
                                            </h5>
                                            <small class="fst-italic">Klein und Fein</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5493.JPEG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Yamspommes mit frischer Chilisauce und Cocktailsauce </span>
                                                <span class="text-primary">5,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5472.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Maniokpommes mit frischer Chilisauce und Cocktailsauce</span>
                                                <span class="text-primary">5,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5524.JPEG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Afrogulasch mit Würstchen und Brot (A)</span>
                                                <span class="text-primary">8,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5510.JPEG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veganer Bohneneintopf mit Brot (A)</span>
                                                <span class="text-primary">8,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-6" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Vegetarische / Vegane</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5647.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüsebohnensauce mit Maniokrösti (C)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5492.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüse Samosa auf Salat mit frischer Chilisauce (A)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5522.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veganer Bohneneintopf mit Reis</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5669.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veggie Burger mit Bohnen, Ei, Avocado, frischer Chilisauce und grüne Kochbananen-Pommes (A,C,G,N)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fleischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/RNI-Films-IMG-BC3399B2-A67D-4DB5-BCF5-35F1B281D684.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Schwarzaugiger Bohnenreis mit Rindfleisch-Gemüse, Ei und Avocado (C)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5662.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Afro-Burger mit grüne Kochbananen-Pommes und frischer Chilisauce (A,C,G,N)</span>
                                                <span class="text-primary">17,50</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5542.JPEG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Erdnusssauce mit Hühnerkeule und Reis (E,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Marinierte Lammkoteletts vom Junglamhof mit Gemüse und Yam-Pommes(G)</span>
                                                <span class="text-primary">25,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5537.JPEG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Fisch Jollofreis mit Seehecht, Gemüse und Kochbananen (D,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/IMG_5535.JPEG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Okra-Fischragout mit Garnelen, Seehecht und Reis (B,D,G)</span>
                                                <span class="text-primary">19,50</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/RNI-Films-IMG-29ABF8D6-6503-4CB9-BE2D-37C367C095A1.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary text-center">Gemischte Platte (serviert, ab 2 Personen) /- 25,00 (pro Person)</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span> -->
                                                <!-- <span class="text-dark text-center">totall - 25,00</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-7" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/RNI-Films-IMG-38C1587F-A2D5-4B78-A5BB-2ABCA6DDC032.JPG" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Hirsecreme mit Apfelmus und Schlagobers (G)</span>
                                                <span class="text-primary">5,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/2.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Eiskaffee mit Vanilleeis und Schlagobers (G)</span>
                                                <span class="text-primary">6,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/3.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Saftiger Schokokuchen mit Vanilleeis und Schlagobers (C,G,H)</span>
                                                <span class="text-primary">7,60</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/4.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Saftiger Nusskuchen mit Vanilleeis und Schlagobers (C,G,H)</span>
                                                <span class="text-primary">7,60</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/6.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Eispalatschinke mit Vanilleeis, Schlagobers und Schokosauce (A,C,G)</span>
                                                <span class="text-primary">8,50</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-8" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/1.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüsebohnensauce mit Maniokrösti (C)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/2.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüse Samosa auf Salat mit frischer Chilisauce (A)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/3.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veganer Bohneneintopf mit Reis</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/4.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veggie Burger mit Bohnen, Ei, Avocado, frischer Chilisauce und grüne Kochbananen-Pommes (A,C,G,N)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fleischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/6.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Schwarzaugiger Bohnenreis mit Rindfleisch-Gemüse, Ei und Avocado (C)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/7.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Afro-Burger mit grüne Kochbananen-Pommes und frischer Chilisauce (A,C,G,N)</span>
                                                <span class="text-primary">17,50</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Erdnusssauce mit Hühnerkeule und Reis (E,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Marinierte Lammkoteletts vom Junglamhof mit Gemüse und Yam-Pommes(G)</span>
                                                <span class="text-primary">25,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Fisch Jollofreis mit Seehecht, Gemüse und Kochbananen (D,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Okra-Fischragout mit Garnelen, Seehecht und Reis (B,D,G)</span>
                                                <span class="text-primary">19,50</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary text-center">Gemischte Platte (serviert, ab 2 Personen) /- 25,00 (whole deal)</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span> -->
                                                <!-- <span class="text-dark text-center">totall - 25,00</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-9" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/1.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüsebohnensauce mit Montokrösti (C)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/2.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüse Samosa auf Salat mit frischer Chilisauce (A)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/3.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veganer Bohneneintopf mit Reis</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/4.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veggie Burger mit Bahnen, Et, Avocado, frischer Chilisauce und grüne Kochbananen-Pommes (A,C,G,N)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fleischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/6.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Schwarzaugiger Bohnenreis mit Rindfleisch-Gemüse, Ei und Avocado (C)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/7.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Afro-Burger mit grüne Kochbananen-Pommes und frischer Chilisauce (A,C,G,N)</span>
                                                <span class="text-primary">17,50</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Erdnusssauce mit Hühnerkeule und Reis (E,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Marinierte Lammkoteletts vom Junglamhof mit Gemüse und Yam-Pommes(G)</span>
                                                <span class="text-primary">25,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Fisch Jollofreis mit Seehecht, Gemüse und Kochbananen (D,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Okra-Fischragout mit Garnelen, Seehecht und Reis (B,D,G)</span>
                                                <span class="text-primary">19,50</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary text-center">Gemischte Platte (serviert, ab 2 Personen) /- 25,00 (whole deal)</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span> -->
                                                <!-- <span class="text-dark text-center">totall - 25,00</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-10" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/1.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüsebohnensauce mit Montokrösti (C)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/2.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüse Samosa auf Salat mit frischer Chilisauce (A)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/3.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veganer Bohneneintopf mit Reis</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/4.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veggie Burger mit Bahnen, Et, Avocado, frischer Chilisauce und grüne Kochbananen-Pommes (A,C,G,N)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fleischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/6.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Schwarzaugiger Bohnenreis mit Rindfleisch-Gemüse, Ei und Avocado (C)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/7.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Afro-Burger mit grüne Kochbananen-Pommes und frischer Chilisauce (A,C,G,N)</span>
                                                <span class="text-primary">17,50</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Erdnusssauce mit Hühnerkeule und Reis (E,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Marinierte Lammkoteletts vom Junglamhof mit Gemüse und Yam-Pommes(G)</span>
                                                <span class="text-primary">25,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Fisch Jollofreis mit Seehecht, Gemüse und Kochbananen (D,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Okra-Fischragout mit Garnelen, Seehecht und Reis (B,D,G)</span>
                                                <span class="text-primary">19,50</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary text-center">Gemischte Platte (serviert, ab 2 Personen) /- 25,00 (whole deal)</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span> -->
                                                <!-- <span class="text-dark text-center">totall - 25,00</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-11" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/1.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüsebohnensauce mit Montokrösti (C)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/2.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüse Samosa auf Salat mit frischer Chilisauce (A)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/3.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veganer Bohneneintopf mit Reis</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/4.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veggie Burger mit Bahnen, Et, Avocado, frischer Chilisauce und grüne Kochbananen-Pommes (A,C,G,N)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fleischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/6.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Schwarzaugiger Bohnenreis mit Rindfleisch-Gemüse, Ei und Avocado (C)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/7.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Afro-Burger mit grüne Kochbananen-Pommes und frischer Chilisauce (A,C,G,N)</span>
                                                <span class="text-primary">17,50</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Erdnusssauce mit Hühnerkeule und Reis (E,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Marinierte Lammkoteletts vom Junglamhof mit Gemüse und Yam-Pommes(G)</span>
                                                <span class="text-primary">25,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Fisch Jollofreis mit Seehecht, Gemüse und Kochbananen (D,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Okra-Fischragout mit Garnelen, Seehecht und Reis (B,D,G)</span>
                                                <span class="text-primary">19,50</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary text-center">Gemischte Platte (serviert, ab 2 Personen) /- 25,00 (whole deal)</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span> -->
                                                <!-- <span class="text-dark text-center">totall - 25,00</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-12" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/1.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüsebohnensauce mit Montokrösti (C)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/2.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Gemüse Samosa auf Salat mit frischer Chilisauce (A)</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/3.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veganer Bohneneintopf mit Reis</span>
                                                <span class="text-primary">12,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/4.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Veggie Burger mit Bahnen, Et, Avocado, frischer Chilisauce und grüne Kochbananen-Pommes (A,C,G,N)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fleischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/6.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Schwarzaugiger Bohnenreis mit Rindfleisch-Gemüse, Ei und Avocado (C)</span>
                                                <span class="text-primary">16,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/7.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Afro-Burger mit grüne Kochbananen-Pommes und frischer Chilisauce (A,C,G,N)</span>
                                                <span class="text-primary">17,50</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Erdnusssauce mit Hühnerkeule und Reis (E,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Marinierte Lammkoteletts vom Junglamhof mit Gemüse und Yam-Pommes(G)</span>
                                                <span class="text-primary">25,90</span>
                                            </h5>
                                            <small class="fst-italic">Fleischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary">Fischgerichte</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span>
                                                <span class="text-primary">4,10</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Fisch Jollofreis mit Seehecht, Gemüse und Kochbananen (D,G)</span>
                                                <span class="text-primary">17,90</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/8.jpg" alt="" style="width: 120px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Okra-Fischragout mit Garnelen, Seehecht und Reis (B,D,G)</span>
                                                <span class="text-primary">19,50</span>
                                            </h5>
                                            <small class="fst-italic">Fischgerichte</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu_images/5.jpg" alt="" style="width: 120px;"> -->
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h2 class="text-primary text-center">Gemischte Platte (serviert, ab 2 Personen) /- 25,00 (whole deal)</h2>
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <!-- <span>Cappuccino</span> -->
                                                <!-- <span class="text-dark text-center">totall - 25,00</span> -->
                                            </h5>
                                            <small class="fst-italic"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->


        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video bg-dark d-flex align-items-center">
                        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-rgba(15, 26, 43, .5) fw-normal">Event & Catering - Buchung</h5>
                        <!-- <h1 class="text-rgba(15, 26, 43, .5) mb-4 ">Allgemeine Geschäftsbedingungen</h1> -->
                        <form action="CateringBooking.php" method="post" id="booking_catering">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <img class="flex-shrink-0 img-fluid rounded" src="img/cater_1.jpg" alt="" style="width: 231px;">
                                    <img class="flex-shrink-0 img-fluid rounded" src="img/cater_2.JPG" alt="" style="width: 325px;">
                                    <!-- <h6>Allgemeines, Geltungsbereich </h6>
                                    <h6>Diese Allgemeinen Geschäftsbedingungen, im Folgenden kurz AGB, regeln das Rechtsverhältnis zwischen Jennifer Ofori, geb. 18.08.1989, Inh. des Unternehmens Jay O, im Folgenden kurz „Caterer“, und dem Vertragspartner, im Folgenden genannt „Auftraggeber“, und gelten für alle in diesem Verhältnis getätigten Bestellungen, Reservierungen und erbrachten Dienstleistungen im Zusammenhang mit dem von Caterer angebotenen Catering.</h6> -->
                                </div>                                
                                <!-- <label>
                                    <input type="checkbox" name="agree"  class="text-rgba(15, 26, 43, .5) mb-4 "> I agree Terms and Conditions
                                </label> -->
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Book online</button>
                                </div>
                            </div>
                        </form>
                    </div>
                        <!-- <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button> -->
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservierung - Tischreservierung</h5>
                        <!-- <h1 class="text-white mb-4">Tischreservierung</h1> -->
                        <form action="TableBooking.php" method="post" id="booking_table">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <img class="flex-shrink-0 img-fluid rounded" src="img/table_1.JPG" alt="" style="width: 640px;">
                                    <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/table_2.jpeg" alt="" style="width: 325px;"> -->
                                    <!-- <h4 class="text-primary fw-normal">Allgemeine Geschäftsbedingungen (Gasthaus), Stand 22.06.2023 </h4>
                                    <h4 class="text-primary fw-normal">Geltungsbereich</h4>
                                    <h6 class="text-primary fw-normal"> Diese Allgemeinen Geschäftsbedingungen im Folgenden kurz AGB, regeln das Rechtsverhältnis zwischen Jennifer Ofori, geb. 18.08.1989, Inh. des Unternehmens Jay O, im Folgenden kurz „Gastwirt“, und dem Vertragspartner, und gelten für alle in diesem Verhältnis getätigten Reservierungen und erbrachten Dienstleistungen.</h6> -->
                                </div>    
                                <!-- <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="Name" class="form-control" id="name" placeholder="Your Name" required>
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="Phone" name="phone" class="form-control" Placeholder="Your Phone Number" required>
                                        <label for="Phone">Telefonnummer</label>
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
                                </div> -->
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book online</button>
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


        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team</h5>
                    <!-- <h1 class="mb-5">Our Master Chefs</h1> -->
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/team-1.jpg" alt="">
                            </div>
                            <h5 class="mb-0">Jennifer Ofori</h5>
                            <small>Inhaber</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/team.jpg" alt="">
                            </div>
                            <h5 class="mb-0">Petra Führlinger</h5>
                            <small>Restaurantleitung</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/team-3.jpeg" alt="">
                            </div>
                            <h5 class="mb-0">Patricia Gimpl</h5>
                            <small>Social Media Management</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/suleman.jpeg" alt="">
                            </div>
                            <h5 class="mb-0">Suleman Lawrence Pedula</h5>
                            <small>Chefkoch</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/prof.png" alt="">
                            </div>
                            <h5 class="mb-0">Muhammad Raza Ali</h5>
                            <small>arbeitete als Website Developer</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/asjid.jpeg" alt="">
                            </div>
                            <h5 class="mb-0">Asjid Ahmed</h5>
                            <small>Software Engineer from UK</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <!-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                    <h1 class="mb-5">Our Clients Say!!!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Testimonial End -->
        

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
                        <a class="btn btn-link" href="TableTermConditions.php?page=TableBooking">Allgemeine Geschäftsbedingungen</a>
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

    <script>
        function myFunction() {
          var x = document.getElementById("drinks_4");
          var y = document.getElementById("menu_3");
          var z = document.getElementById("tab-1");
          if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            // z.style.display = "block";
          }
          if (y.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            // z.style.display = "block";
          }
        }

        function myFunctionM() {
          var x = document.getElementById("drinks_4");
          var y = document.getElementById("menu_3");
          if (x.style.display === "none") {
            x.style.display = "none";
            y.style.display = "block";
          }
          if (y.style.display === "none") {
            x.style.display = "none";
            y.style.display = "block";
          }
        }

        function myFunctionS() {
          var x = document.getElementById("drinks_4");
          var y = document.getElementById("menu_3");
          if (x.style.display === "none") {
            x.style.display = "none";
            y.style.display = "none";
          }
          if (y.style.display === "none") {
            x.style.display = "none";
            y.style.display = "none";
          }
        }
    </script>

</body>

</html>


