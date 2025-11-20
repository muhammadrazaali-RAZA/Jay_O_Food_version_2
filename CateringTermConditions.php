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
                    <a href="TableBooking.php" class="btn btn-primary py-2 px-4">Tischreservierung</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Book Catering</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Book Catering</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-24">
                    <div class="video bg-dark align-items-center">
                        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-rgba(15, 26, 43, .5) fw-normal">Event & Catering - allgemeine Geschäftsbedingungen</h5>
                        <h1 class="text-rgba(15, 26, 43, .5) mb-4 ">Allgemeine Geschäftsbedingungen</h1>
                        <form action="CateringBooking.php" method="post">
                            <div class="row g-3">
                                <div class="col-md-12">


                                    <h4>1. Allgemeines, Geltungsbereich </h4>
                                    <h6>1.1 Diese Allgemeinen Geschäftsbedingungen, im Folgenden kurz AGB, regeln das Rechtsverhältnis zwischen Jennifer Ofori, geb. 18.08.1989, Inh. des Unternehmens Jay O, im Folgenden kurz „Caterer“, und dem Vertragspartner, im Folgenden genannt „Auftraggeber“, und gelten für alle in diesem Verhältnis getätigten Bestellungen, Reservierungen und erbrachten Dienstleistungen im Zusammenhang mit dem von Caterer angebotenen Catering.</h6>
                                    <h6>1.2 Weichen Geschäftsbedingungen des Auftraggebers von diesen AGB ab oder ergänzen diese die gegenständlichen AGB, so sind diese abweichenden oder ergänzenden Geschäftsbedingungen des Auftraggebers nur bei ausdrücklicher und schriftlicher Vereinbarung mit dem Caterer wirksam. Sämtliche im Nachfolgenden näher geregelten Leistungen des Caterers werden ausschließlich auf Basis dieser AGB angeboten. </h6>
                                    <h4>2. Definitionen </h4>
                                    <h6>2.1 Catering Zubereitung bzw. Lieferung von Speisen und Getränken zu einem außerhalb des Bewirtungsbetriebes des Caterers liegenden, vom Auftraggeber bestimmten Leistungsort</h6>
                                    <h6>2.2 Reservierung verbindliches Angebot des Auftraggebers auf Abschluss eines Cateringvertrages</h6>
                                    <h6>2.3 Auftraggeber natürliche oder juristische Person, die mit dem Caterer einen Cateringvertrag abschließt</h6>
                                    <h6>2.4 Verbraucher und Unternehmer jeweils im Sinne des § 1 Konsumentenschutzgesetzes (KSchG)</h6>
                                    <h4>3. Vertragsabschluss/Vertragsinhalt, Angebot </h4>
                                    <h6>3.1 Das Angebot des Caterers ist freibleibend, also unverbindlich, außer es ist durch den Caterer Abweichendes im Angebot festgelegt. Der Auftraggeber stellt beim Caterer eine schriftliche oder mündliche Anfrage hinsichtlich des gewünschten Termins und der gewünschten Anzahl der Personen, für die das Catering erfolgen soll. Der Caterer erstellt auf diese Anfrage hin ein Angebot, zu welchem der Auftraggeber nach Übermittlung durch den Caterer per E-Mail schriftlich, wobei hier die Übermittlung eines E-Mails ausreicht, erklärt, das Angebot annehmen zu wollen. Der Cateringvertrag kommt erst durch die schriftliche (E-Mail ausreichend) Auftragsbestätigung durch den Caterer zustande. </h6>
                                    <h6>3.2 Eine Anfrage hat durch den Auftraggeber spätestens 21 (einundzwanzig) Tage vor dem gewünschten Termin des Caterings zu erfolgen. Das vom Caterer übermittelte Angebot muss 2 bis spätestens 14 (vierzehn) Tage vor dem gewünschten Termin des Caterings durch den Auftraggeber angenommen werden. </h6>
                                    <h6>3.3 Für die Richtigkeit und Vollständigkeit der vom Auftraggeber für die Angebotserstellung dem Caterer zur Verfügung gestellten Unterlagen übernimmt der Caterer keine Haftung, außer deren Fehlerhaftigkeit wird vom Caterer vorsätzlich oder grob fahrlässig nicht erkannt. </h6>
                                    <h6>3.4 Da das Angebot der Waren saisonal bedingten Veränderungen unterliegt, behält sich der Caterer für den Fall, dass einzelne Artikel des Angebots nicht zeitgerecht beschaffbar sind, den Austausch gegen gleichwertige Waren vor. </h6>
                                    <h4>4. Lieferung, Durchführung des Caterings, Gefahrenübergang</h4>
                                    <h6>4.1 Der im gegenständlichen Cateringvertrag vereinbarte Leistungszeitpunkt oder -zeitraum wird vom Caterer nur unter der Voraussetzungen eine gewöhnlichen Betriebsablaufes eingehalten. Leistungsstörungen durch höhere Gewalt, Streiks, unverschuldete Betriebsstörungen (zB Stromausfall), Unruhen, Pandemien und sonstige unabwendbare Ereignisse entbinden den Caterer von den übernommenen Pflichten, wobei auch der Auftraggeber von der Entgeltzahlungspflicht in diesen Fällen entbunden wird.</h6>
                                    <h6>4.2 Sobald die Lieferung vom Caterer oder einem von ihm beauftragten Dritten an den Auftraggeber übergeben worden ist, geht auch die Gefahr der zufälligen Beschädigung oder des zufälligen Untergangs der Lieferung an den Auftraggeber über.</h6>
                                    <h6>4.3 Sämtliche vom Caterer angelieferten Materialien und Gegenstände (zB Geschirr, Warmhaltebehälter, etc) – mit Ausnahme der Speisen und Getränke – werden dem Auftraggeber nur leih- bzw. mietweise überlassen. Der Auftraggeber hat dem Caterer Schäden und Verluste der angelieferten Materialien und Gegenstände zu ersetzen.</h6>
                                    <h6>4.4 Sollten noch Teilleistungen ausstehen oder Mängel zum Lieferzeitpunkt gerügt werden, so wird der Caterer diese ausstehenden Teilleistungen nachholen bzw. die gerügten Mängel beseitigen. Ist die Gesamtleistung dadurch nicht wesentlich beeinträchtigt, berechtigten ausstehende Teilleistungen oder zum Lieferzeitpunkt gerügte Mängel nicht zur Verweigerung der Annahme der Lieferung.</h6>
                                    <h4>5. Gewährleistung, Mängelrüge</h4>
                                    <h6>5.1 Es gelten die gesetzlichen Gewährleistungsfristen.</h6>
                                    <h6>5.2 Mängel sind dem Caterer möglichst bei Lieferung bzw. unverzüglich nach deren Sichtbarwerden bekannt zu geben. Ist der Auftraggeber Verbraucher im Sinne des Konsumentenschutzgesetzes (KSchG), so sind mit der Unterlassung dieser sofortigen Bekanntgabe von Mängeln keine nachteiligen Rechtsfolgen verbunden. 3 Ist der Auftraggeber jedoch Unternehmer im Sinne des Konsumentenschutzgesetzes (KSchG), so hat er dem Caterer Mängel der Lieferung, die er bei ordnungsgemäßem Geschäftsgang nach Ablieferung durch Untersuchung festgestellt hat oder feststellen hätte müssen, sogleich bei Lieferung, spätestens binnen 5 (fünf) Tagen ab Lieferung anzuzeigen. Unterlässt der Auftraggeber die Anzeige, so kann er Ansprüche auf Gewährleistung (§§ 922 ff. ABGB), auf Schadenersatz wegen des Mangels selbst (§ 933a Abs. 2 ABGB) sowie aus einem Irrtum über die Mangelfreiheit der Sache (§§ 871 f. ABGB) nicht mehr geltend machen. Zeigt sich später ein solcher Mangel, so muss er ebenfalls in angemessener Frist angezeigt werden; andernfalls kann der Auftraggeber auch in Ansehung dieses Mangels die im vorherigen Absatz bezeichneten Ansprüche nicht mehr geltend machen. </h6>
                                    <h6>5.3 Festgehalten wird, dass eine unsachgemäße Lagerung, Handhabung oder Aufbereitung der gelieferten Speisen und Getränke nach Übergabe an den Auftraggeber die Gewährleistung ausschließt.</h6>
                                    <h4>6. Preise, sonstige Kosten, Zahlungsbedingungen, Verzugszinsen </h4>
                                    <h6>6.1 Die im Angebot genannten Preise verstehen sich inklusive Umsatzsteuer.</h6>
                                    <h6>6.2 Die Kosten für die Lieferung der Speisen und Getränke sowie für die Zustellung und Abholung der sonstigen Materialien und Gegenstände (zB Geschirr, Warmhaltebehälter, etc) sind im Preis inkludiert.</h6>
                                    <h6>6.3 Es wird vereinbart, dass allfällige Kosten für die ordnungsgemäße Abfallentsorgung vom Auftraggeber getragen werden.</h6>
                                    <h6>6.4 Rechnungen sind binnen 14 (vierzehn) Tagen nach Erhalt der Rechnung ohne Abzug zu bezahlen.</h6>
                                    <h6>6.5 Bei Zahlungsverzug ist der Caterer berechtigt, die gesetzlichen Verzugszinsen geltend zu machen.</h6>
                                    <h4>7. Aufrechnungs- und Zurückbehaltungsrecht</h4>
                                    <h6>7.1 Dem Auftraggeber, wenn er nicht Verbraucher im Sinne des § 1 Konsumentenschutzgesetzes (KSchG), steht keine Berechtigung zur Aufrechnung mit eigenen Forderungen gegenüber Forderungen des Caterers zu; diese Berechtigung kommt dem Auftraggeber nur bei Anerkenntnis des Caterers oder gerichtlicher Feststellung der Forderung des Auftraggebers zu.</h6>
                                    <h6>7.2 An ihm überlassenen Materialien und Gegenständen hat der Auftraggeber kein Zurückbehaltungsrecht. Wenn der Auftraggeber Verbraucher im Sinne des § 1 Konsumentenschutzgesetzes (KSchG) ist, so steht ihm ein nach diesem Gesetz zustehendes Zurückbehaltungsrecht zu und wird dieses Recht durch die im vorherigen Satz angeführte Bestimmung nicht ausgeschlossen. </h6>
                                    <h4>8. Stornierungen, Stornogebühr, Gästeanzahl </h4>
                                    <h6>8.1 Bei den vom Caterer angebotenen Dienstleistungen handelt es sich um Freizeit-Dienstleistungen im Sinne des § 18 Abs 1 Z 10 Fern- und Auswärtsgeschäfte-Gesetz (FAGG), welche zu einem bestimmten Zeitpunkt innerhalb eines genau angegebenen Zeitraumes erbracht werden. Dem Auftraggeber steht daher kein Rücktrittsrecht gemäß § 11 Abs 1 FAGG zu.</h6>
                                    <h6>8.2 Ein Rücktritt durch den Auftraggeber ist durch einseitige Erklärung, welche schriftlich (E-Mail ausreichend) zu erfolgen hat, nur unter Entrichtung nachstehender Stornogebühren möglich: Bei Rücktritt bis 14 (vierzehn) Tage vor dem vereinbarten Lieferzeitpunkt ist vom Auftraggeber keine Stornogebühr zu leisten. Bei Rücktritt bis 7 (sieben) Tage vor dem vereinbarten Lieferzeitpunkt ist vom Auftraggeber eine Stornogebühr in Höhe von 50 (fünfzig) % des vereinbarten Preises zu leisten. Bei Rücktritt bis 3 (drei) Tage vor dem vereinbarten Lieferzeitpunkt ist vom Auftraggeber eine Stornogebühr in Höhe von 75 (fünfundsiebzig) % des vereinbarten Preises zu leisten. Bei Rücktritt unter 3 (drei) Tage vor dem vereinbarten Lieferzeitpunkt ist vom Auftraggeber eine Stornogebühr in Höhe von 100 (hundert) % des vereinbarten Preises zu leisten</h6>

                                    <h6>8.3 Eine Reduktion der im Cateringvertrag vereinbarten Gästeanzahl kann nur bis 5 (fünf) Tage vor dem vereinbarten Lieferzeitpunkt berücksichtigt werden. Wird die Reduktion der vereinbarten Gästeanzahl dem Caterer vom Auftraggeber nicht bis 5 (fünf) Tage vor dem vereinbarten Lieferzeitpunkt schriftlich (E-Mail ausreichend) bekannt gegeben, so gilt der vereinbarte Preis ohne Berücksichtigung der reduzierten Gästeanzahl.</h6>
                                    <h6>8.4 Eine Erhöhung der im Cateringvertrag vereinbarten Gästeanzahl kann nur bis 3 (drei) Tage vor dem vereinbarten Lieferzeitpunkt berücksichtigt werden. Die Erhöhung der Gästeanzahl ist dem Caterer vom Auftraggeber schriftlich (E-Mail ausreichend) bekannt zu geben. Der Caterer ist berechtigt, den vereinbarten Preis der erhöhten Gästeanzahl entsprechend anzupassen.</h6>


                                    <h4>9. Behördliche Genehmigungen, Versicherungen</h4>

                                    <h6>Festgehalten wird, dass der Auftraggeber allenfalls erforderliche behördliche oder sonstige Genehmigung für die Veranstaltung einzuholen und für allfällig abzuschließende, die Veranstaltung betreffende Versicherungen Sorge zu tragen hat. Sämtliche damit in Verbindung stehende Kosten sind vom Auftraggeber zu tragen. </h6>

                                    <h4>10. Haftung des Caterers</h4>

                                    <h6>10.1 Ist der Auftraggeber Verbraucher im Sinne des § 1 Konsumentenschutzgesetzes (KSchG), wird die Haftung des Caterers für leichte Fahrlässigkeit, mit Ausnahme von Personenschäden, ausgeschlossen.</h6>
                                    <h6>10.2 Ist der Auftraggeber Unternehmer im Sinne des § 1 Konsumentenschutzgesetzes (KSchG), wird die Haftung des Caterers sowie seiner Erfüllungsgehilfen für leichte und grobe Fahrlässigkeit ausgeschlossen. In diesen Fällen trägt der Auftraggeber die Beweislast für das Vorliegen des Verschuldens. Folgeschäden, immaterielle Schäden oder indirekte Schäden sowie entgangene Gewinne werden nicht ersetzt. </h6>
                                    <h4>11. Erfüllungsort, Gerichtsstand, Rechtswahl</h4>

                                    <h6>11.1 Erfüllungsort ist der Sitz des Caterers.</h6>
                                    <h6>11.2 Dieser Vertrag unterliegt österreichischem formellen und materiellen Recht unter Ausschluss der Regeln des Internationalen Privatrechts (insbesondere IPRG und die EuGVVO) sowie UN-Kaufrecht.</h6>
                                    <h6>11.3 Ausschließlicher Gerichtsstand für sämtliche Streitigkeiten aus dem diesen AGB zugrundliegenden Cateringvertrag ist, wenn der Auftraggeber Unternehmer im Sinne des § 1 Konsumentenschutzgesetzes (KSchG) ist, das am Sitz des Caterers örtlich und sachlich zuständige Gericht. Der Caterer ist berechtigt, seine Rechte auch bei jedem anderen örtlich und sachlich zuständigen Gericht geltend zu machen.</h6>
                                    <h6>11.4 Wurde der Cateringvertrag mit einem Auftraggeber abgeschlossen, der Verbraucher im Sinne des § 1 Konsumentenschutzgesetzes (KSchG) ist und der seinen gewöhnlichen Wohnsitz bzw. gewöhnlichen Aufenthaltsort in Österreich hat, können Klagen gegen den Verbraucher ausschließlich am Wohnsitz, am gewöhnlichen Aufenthaltsort oder am Beschäftigungsort des Verbrauchers eingebracht werden.</h6>

                                    <h4>12. Sonstiges </h4>

                                    <h6>12.1 Alle Änderungen des Cateringvertrages bedürfen der Schriftform. </h6>

                                    <h6>12.2 Im Falle von Regelungslücken gelten die entsprechenden gesetzlichen Bestimmungen.</h6>

                                    <h6>12.3 Sollten einzelne Punkte dieser AGB unwirksam oder undurchführbar sein oder nach Vertragsabschluss werden, so berührt dies die Gültigkeit und Wirksamkeit der übrigen Bestimmungen und der unter ihrer Zugrundelegung geschlossenen Verträge nicht.</h6>


                                </div>                                
                                <!-- <label>
                                    <input type="checkbox" name="agree"  class="text-rgba(15, 26, 43, .5) mb-4 " required> Ich akzeptiere die allgemeinen Geschäftsbedingungen.
                                </label> -->
                                <div class="col-15">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                        <!-- <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button> -->
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
                        <a class="btn btn-link" href="TableTermConditions.php?page=CateringTermConditions.php">Allgemeine Geschäftsbedingungen</a>
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>