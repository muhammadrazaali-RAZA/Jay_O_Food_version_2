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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Data Protection Regulations</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Data Protection Regulations</li>
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
                        <h5 class="section-title ff-secondary text-start text-rgba(15, 26, 43, .5) fw-normal">Data Protection Regulations</h5>
                        <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Datenschutzerklärung Einleitung und Überblick</h2>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    

                                    <h5>Wir haben diese Datenschutzerklärung (Fassung 21.07.2023-112551003) verfasst, um Ihnen gemäß der Vorgaben der <a href="https://eur-lex.europa.eu/legal-content/DE/TXT/HTML/?uri=CELEX:32016R0679&from=DE&tid=112551003#d1e2269-1-1" class="text-dark"><u>Datenschutz-Grundverordnung (EU)  2016/679</u></a> und anwendbaren nationalen Gesetzen zu  erklären, welche personenbezogenen Daten (kurz Daten)  wir als Verantwortliche – und die von uns beauftragten  Auftragsverarbeiter (z. B. Provider) – verarbeiten, zukünftig  verarbeiten werden und welche rechtmäßigen Möglichkeiten  Sie haben. Die verwendeten Begriffe sind geschlechtsneutral  zu verstehen.</h5>

                                    <h5><b style="color: darkblue;">Kurz gesagt:</b> Wir informieren Sie umfassend über Daten,  die wir über Sie verarbeiten.</h5>

                                    <h5>Datenschutzerklärungen klingen für gewöhnlich sehr  technisch und verwenden juristische Fachbegriffe. Diese  Datenschutzerklärung soll Ihnen hingegen die wichtigsten  Dinge so einfach und transparent wie möglich beschreiben.  Soweit es der Transparenz förderlich ist, werden  technische<b style="color: darkblue;"> Begriffe leserfreundlich erklärt, </b> Links zu  weiterführenden Informationen geboten und <b style="color: darkblue;"> Grafiken </b> zum  Einsatz gebracht. Wir informieren damit in klarer und  einfacher Sprache, dass wir im Rahmen unserer  Geschäftstätigkeiten nur dann personenbezogene Daten  verarbeiten, wenn eine entsprechende gesetzliche  Grundlage gegeben ist. Das ist sicher nicht möglich, wenn  man möglichst knappe, unklare und juristisch-technische  Erklärungen abgibt, so wie sie im Internet oft Standard sind,  wenn es um Datenschutz geht. Ich hoffe, Sie finden die  folgenden Erläuterungen interessant und informativ und  vielleicht ist die eine oder andere Information dabei, die Sie  noch nicht kannten. </h5>

                                    <h5>Wenn trotzdem Fragen bleiben, möchten wir Sie bitten, sich  an die unten bzw. im Impressum genannte verantwortliche  Stelle zu wenden, den vorhandenen Links zu folgen und sich  weitere Informationen auf Drittseiten anzusehen. Unsere  Kontaktdaten finden Sie selbstverständlich auch im  Impressum.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Anwendungsbereich</h2>

                                    <h5>Diese Datenschutzerklärung gilt für alle von uns im  Unternehmen verarbeiteten personenbezogenen Daten und  für alle personenbezogenen Daten, die von uns beauftragte  Firmen (Auftragsverarbeiter) verarbeiten. Mit personenbezogenen Daten meinen wir Informationen im  Sinne des Art. 4 Nr. 1 DSGVO wie zum Beispiel Name, E Mail-Adresse und postalische Anschrift einer Person. Die  Verarbeitung personenbezogener Daten sorgt dafür, dass wir unsere Dienstleistungen und Produkte anbieten und  abrechnen können, sei es online oder offline. Der  Anwendungsbereich dieser Datenschutzerklärung umfasst:</h5>
                                    <h5>• alle Onlineauftritte (Websites, Onlineshops), die wir betreiben</h5>
                                    <h5>• Social Media Auftritte und E-Mail-Kommunikation</h5>
                                    <h5>• mobile Apps für Smartphones und andere Geräte</h5>

                                    <h5><b style="color: darkblue;">Kurz gesagt:</b> Die Datenschutzerklärung gilt für alle  Bereiche, in denen personenbezogene Daten im  Unternehmen über die genannten Kanäle strukturiert  verarbeitet werden. Sollten wir außerhalb dieser Kanäle mit  Ihnen in Rechtsbeziehungen eintreten, werden wir Sie  gegebenenfalls gesondert informieren. </h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Rechtsgrundlagen</h2>

                                    <h5>In der folgenden Datenschutzerklärung geben wir Ihnen  transparente Informationen zu den rechtlichen Grundsätzen  und Vorschriften, also den Rechtsgrundlagen der  Datenschutz-Grundverordnung, die uns ermöglichen,  personenbezogene Daten zu verarbeiten. Was das EU-Recht betrifft, beziehen wir uns auf die  VERORDNUNG (EU) 2016/679 DES EUROPÄISCHEN  PARLAMENTS UND DES RATES vom 27. April 2016. Diese  Datenschutz-Grundverordnung der EU können Sie  selbstverständlich online auf EUR-Lex, dem Zugang zum EU Recht, unter <a href="https://eur-lex.europa.eu/legal-content/DE/ALL/?uri=celex%3A32016R0679" class="text-dark"><u>https://eur-lex.europa.eu/legal-content/DE/ALL/?uri=celex%3A32016R0679</u></a></h5>

                                    <h5>Wir verarbeiten Ihre Daten nur, wenn mindestens eine der  folgenden Bedingungen zutrifft:</h5>

                                    <h5><b style="color: darkblue;">1. Einwilligung</b> (Artikel 6 Absatz 1 lit. a DSGVO): Sie  haben uns Ihre Einwilligung gegeben, Daten zu einem  bestimmten Zweck zu verarbeiten. Ein Beispiel wäre die  Speicherung Ihrer eingegebenen Daten eines  Kontaktformulars. </h5>

                                    <h5><b style="color: darkblue;">2. Vertrag</b> (Artikel 6 Absatz 1 lit. b DSGVO): Um einen  Vertrag oder vorvertragliche Verpflichtungen mit Ihnen  zu erfüllen, verarbeiten wir Ihre Daten. Wenn wir zum  Beispiel einen Kaufvertrag mit Ihnen abschließen,  benötigen wir vorab personenbezogene Informationen.</h5>

                                    <h5><b style="color: darkblue;">3. Rechtliche Verpflichtung</b> (Artikel 6 Absatz 1 lit. c  DSGVO): Wenn wir einer rechtlichen Verpflichtung  unterliegen, verarbeiten wir Ihre Daten. Zum Beispiel  sind wir gesetzlich verpflichtet Rechnungen für die  Buchhaltung aufzuheben. Diese enthalten in der Regel  personenbezogene Daten. </h5>

                                    <h5><b style="color: darkblue;">4. Berechtigte Interessen</b> (Artikel 6 Absatz 1 lit. f  DSGVO): Im Falle berechtigter Interessen, die Ihre  Grundrechte nicht einschränken, behalten wir uns die  Verarbeitung personenbezogener Daten vor. Wir  müssen zum Beispiel gewisse Daten verarbeiten, um  unsere Website sicher und wirtschaftlich effizient  betreiben zu können. Diese Verarbeitung ist somit ein  berechtigtes Interesse.</h5>

                                    <h5>Weitere Bedingungen wie die Wahrnehmung von  Aufnahmen im öffentlichen Interesse und Ausübung  öffentlicher Gewalt sowie dem Schutz lebenswichtiger  Interessen treten bei uns in der Regel nicht auf. Soweit eine  solche Rechtsgrundlage doch einschlägig sein sollte, wird  diese an der entsprechenden Stelle ausgewiesen. </h5>

                                    <h5>Zusätzlich zu der EU-Verordnung gelten auch noch nationale  Gesetze:</h5>

                                    <h5>• In <b style="color: darkblue;"> Österreich</b> ist dies das Bundesgesetz zum Schutz  natürlicher Personen bei der Verarbeitung personenbezogener Daten <b style="color: darkblue;"> (Datenschutzgesetz), </b>kurz <b style="color: darkblue;"> DSG</b></h5>

                                    <h5>• In <b style="color: darkblue;"> Deutschland </b> gilt das <b style="color: darkblue;"> Bundesdatenschutzgesetz, </b>kurz <b style="color: darkblue;"> BDSG.</b></h5>

                                    <h5>Sofern weitere regionale oder nationale Gesetze zur  Anwendung kommen, informieren wir Sie in den folgenden  Abschnitten darüber. </h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Kontaktdaten des Verantwortlichen </h2>

                                    <h5>Sollten Sie Fragen zum Datenschutz oder zur Verarbeitung  personenbezogener Daten haben, finden Sie nachfolgend  die Kontaktdaten der verantwortlichen Person bzw. Stelle:</h5>

                                    <h5><b style="color: darkblue;"> Jennifer Ofori  </b></h5>

                                    <h5><b style="color: darkblue;"> Götschka 69, 4212 Neumarkt im Mühlkreis</b></h5>

                                    <h5>E-Mail: <b style="color: darkblue;"><u>info@jayo.at</u></b></h5>

                                    <h5>Telefon: <b style="color: darkblue;"><u>+43 664 99491040 </u></b></h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Kontaktdaten des Datenschutzbeauftragten</h2>

                                    <h5>Nachfolgend finden Sie die Kontaktdaten des Datenschutzbeauftragten: </h5>

                                    <h5><b style="color: darkblue;"> Jennifer Ofori  </b></h5>

                                    <h5><b style="color: darkblue;"> Götschka 69, 4212 Neumarkt im Mühlkreis</b></h5>

                                    <h5>E-Mail: <b style="color: darkblue;"><u>info@jayo.at</u></b></h5>

                                    <h5>Telefon: <b style="color: darkblue;"><u>+43 664 99491040 </u></b></h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Speicherdauer </h2>

                                    <h5>Dass wir personenbezogene Daten nur so lange speichern,  wie es für die Bereitstellung unserer Dienstleistungen und  Produkte unbedingt notwendig ist, gilt als generelles  Kriterium bei uns. Das bedeutet, dass wir personenbezogene Daten löschen, sobald der Grund für die  Datenverarbeitung nicht mehr vorhanden ist. In einigen  Fällen sind wir gesetzlich dazu verpflichtet, bestimmte Daten  auch nach Wegfall des ursprüngliches Zwecks zu speichern,  zum Beispiel zu Zwecken der Buchführung.</h5>

                                    <h5>Sollten Sie die Löschung Ihrer Daten wünschen oder die  Einwilligung zur Datenverarbeitung widerrufen, werden die  Daten so rasch wie möglich und soweit keine Pflicht zur  Speicherung besteht, gelöscht. Über die konkrete Dauer der jeweiligen Datenverarbeitung  informieren wir Sie weiter unten, sofern wir weitere  Informationen dazu haben.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Rechte laut Datenschutz-Grundverordnung </h2>

                                    <h5>Gemäß Artikel 13, 14 DSGVO informieren wir Sie über die  folgenden Rechte, die Ihnen zustehen, damit es zu einer  fairen und transparenten Verarbeitung von Daten kommt:</h5>

                                    <h5>• Sie haben laut Artikel 15 DSGVO ein Auskunftsrecht  darüber, ob wir Daten von Ihnen verarbeiten. Sollte das  zutreffen, haben Sie Recht darauf eine Kopie der Daten  zu erhalten und die folgenden Informationen zu  erfahren:</h5>

                                    <h5>     ◦ zu welchem Zweck wir die Verarbeitung durchführen; </h5>
                                    <h5>     ◦ die Kategorien, also die Arten von Daten, die  verarbeitet werden; </h5>
                                    <h5>     ◦ wer diese Daten erhält und wenn die Daten an  Drittländerübermittelt werden, wie die Sicherheit  garantiert werden kann;</h5>
                                    <h5>     ◦ wie lange die Daten gespeichert werden;</h5>
                                    <h5>     ◦ das Bestehen des Rechts auf Berichtigung,  Löschung oder Einschränkung der Verarbeitung  und dem Widerspruchsrecht gegen die Verarbeitung;</h5>
                                    <h5>     ◦ dass Sie sich bei einer Aufsichtsbehörde beschweren können (Links zu diesen Behörden  finden Sie weiter unten);</h5>
                                    <h5>     ◦ die Herkunft der Daten, wenn wir sie nicht bei  Ihnen erhoben haben;</h5>
                                    <h5>     ◦ ob Profiling durchgeführt wird, ob also Daten  automatisch ausgewertet werden, um zu einem  persönlichen Profil von Ihnen zu gelangen.</h5>

                                    <h5>• Sie haben laut Artikel 16 DSGVO ein Recht auf  Berichtigung der Daten, was bedeutet, dass wir Daten  richtig stellen müssen, falls Sie Fehler finden.  </h5>

                                    <h5>• Sie haben laut Artikel 17 DSGVO das Recht auf  Löschung („Recht auf Vergessenwerden“), was konkret  bedeutet, dass Sie die Löschung Ihrer Daten verlangen  dürfen.</h5>

                                    <h5>• Sie haben laut Artikel 18 DSGVO das Recht auf  Einschränkung der Verarbeitung, was bedeutet, dass  wir die Daten nur mehr speichern dürfen aber nicht  weiter verwenden.  </h5>

                                    <h5>• Sie haben laut Artikel 20 DSGVO das Recht auf  Datenübertragbarkeit, was bedeutet, dass wir Ihnen auf  Anfrage Ihre Daten in einem gängigen Format zur  Verfügung stellen.  </h5>

                                    <h5>• Sie haben laut Artikel 21 DSGVO ein Widerspruchsrecht,  welches nach Durchsetzung eine Änderung der  Verarbeitung mit sich bringt.</h5>

                                    <h5>   ◦ Wenn die Verarbeitung Ihrer Daten auf Artikel 6  Abs. 1 lit. e (öffentliches Interesse, Ausübung  öffentlicher Gewalt) oder Artikel 6 Abs. 1 lit. f (berechtigtes Interesse) basiert, können Sie gegen  die Verarbeitung Widerspruch einlegen. Wir prüfen  danach so rasch wie möglich, ob wir diesem Widerspruch rechtlich nachkommen können.</h5>
                                    <h5>   ◦ Werden Daten verwendet, um Direktwerbung zu  betreiben, können Sie jederzeit gegen diese Art der  Datenverarbeitung widersprechen. Wir dürfen Ihre  Daten danach nicht mehr für Direktmarketing  verwenden.</h5>
                                    <h5>   ◦ Werden Daten verwendet, um Profiling zu betreiben, können Sie jederzeit gegen diese Art der  Datenverarbeitung widersprechen. Wir dürfen Ihre  Daten danach nicht mehr für Profiling verwenden.</h5>

                                    <h5>• Sie haben laut Artikel 22 DSGVO unter Umständen das  Recht, nicht einer ausschließlich auf einer automatisierten Verarbeitung (zum Beispiel Profiling)  beruhenden Entscheidung unterworfen zu werden.</h5>

                                    <h5>• Sie haben laut Artikel 77 DSGVO das Recht auf  Beschwerde. Das heißt, Sie können sich jederzeit bei  der Datenschutzbehörde beschweren, wenn Sie der  Meinung sind, dass die Datenverarbeitung von  personenbezogenen Daten gegen die DSGVO verstößt.</h5>

                                    <h5><b style="color: darkblue;">Kurz gesagt: </b>Sie haben Rechte – zögern Sie nicht, die oben gelistete verantwortliche Stelle bei uns zu kontaktieren!</h5>

                                    <h5>Wenn Sie glauben, dass die Verarbeitung Ihrer Daten gegen das Datenschutzrecht verstößt oder Ihre datenschutzrechtlichen Ansprüche in sonst einer Weise verletzt worden sind, können Sie sich bei der Aufsichtsbehörde beschweren. Diese ist für Österreich die Datenschutzbehörde, deren Website Sie unter <a href="https://www.dsb.gv.at/?tid=112551003" class="text-dark"><u>https://www.dsb.gv.at/</u></a> finden. In Deutschland gibt es für jedes Bundesland einen Datenschutzbeauftragten. Für nähere Informationen können Sie sich an die <a href="https://www.bfdi.bund.de/DE/Home/home_node.html" class="text-dark"><u>Bundesbeauftragte für den Datenschutz und die Informationsfreiheit (BfDI)</u></a> wenden. Für unser Unternehmen ist die folgende lokale Datenschutzbehörde zuständig:</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Österreich Datenschutzbehörde</h2>

                                    <h5><b style="color: darkblue;">Leiterin: </b> Mag. Dr. Andrea Jelinek</h5>

                                    <h5><b style="color: darkblue;">Adresse: </b> Barichgasse 40-42, 1030 Wien</h5>

                                    <h5><b style="color: darkblue;">Telefonnr: </b> <u>+43 1 52 152-0</u></h5>
                                    
                                    <h5><b style="color: darkblue;">E-Mail-Adresse: </b> <u>dsb@dsb.gv.at</u></h5>

                                    <h5><b style="color: darkblue;">Website: </b> <u>https://www.dsb.gv.at/</u></h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Datenübertragung in Drittländer</h2>

                                    <h5>Wir übertragen oder verarbeiten Daten nur dann in Länder außerhalb der EU (Drittländer), wenn Sie dieser Verarbeitung zustimmen, dies gesetzlich vorgeschrieben ist oder vertraglich notwendig und in jedem Fall nur soweit dies generell erlaubt ist. Ihre Zustimmung ist in den meisten Fällen der wichtigste Grund, dass wir Daten in Drittländern verarbeiten lassen. Die Verarbeitung personenbezogener Daten in Drittländern wie den USA, wo viele Softwarehersteller Dienstleistungen anbieten und Ihre Serverstandorte haben, kann bedeuten, dass personenbezogene Daten auf unerwartete Weise verarbeitet und gespeichert werden.</h5>

                                    <h5>Wir weisen ausdrücklich darauf hin, dass nach Meinung des Europäischen Gerichtshofs derzeit kein angemessenes Schutzniveau für den Datentransfer in die USA besteht. Die Datenverarbeitung durch US-Dienste (wie beispielsweise Google Analytics) kann dazu führen, dass gegebenenfalls Daten nicht anonymisiert verarbeitet und gespeichert werden. Ferner können gegebenenfalls US-amerikanische staatliche Behörden Zugriff auf einzelne Daten nehmen. Zudem kann es vorkommen, dass erhobene Daten mit Daten aus anderen Diensten desselben Anbieters, sofern Sie ein entsprechendes Nutzerkonto haben, verknüpft werden. Nach Möglichkeit versuchen wir Serverstandorte innerhalb der EU zu nutzen, sofern das angeboten wird.</h5>

                                    <h5>Wir informieren Sie an den passenden Stellen dieser Datenschutzerklärung genauer über Datenübertragung in Drittländer, sofern diese zutrifft.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Sicherheit der Datenverarbeitung</h2>

                                    <h5>Um personenbezogene Daten zu schützen, haben wir sowohl technische als auch organisatorische Maßnahmen umgesetzt. Wo es uns möglich ist, verschlüsseln oder pseudonymisieren wir personenbezogene Daten. Dadurch machen wir es im Rahmen unserer Möglichkeiten so schwer wie möglich, dass Dritte aus unseren Daten auf persönliche Informationen schließen können.</h5>

                                    <h5>Art. 25 DSGVO spricht hier von “Datenschutz durch Technikgestaltung und durch datenschutzfreundliche Voreinstellungen” und meint damit, dass man sowohl bei Software (z. B. Formularen) also auch Hardware (z. B. Zugang zum Serverraum) immer an Sicherheit denkt und entsprechende Maßnahmen setzt. Im Folgenden gehen wir, falls erforderlich, noch auf konkrete Maßnahmen ein.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Kommunikation</h2>

                                    <div class="w3-panel w3-border">
                                        <h3 class="w3-serif">Kommunikation Zusammenfassung</h3>
                                        <h5 class="w3-serif">Betroffene: Alle, die mit uns per Telefon, E-Mail oder Online-Formular kommunizieren</h5>
                                        <h5 class="w3-serif">Verarbeitete Daten: z. B. Telefonnummer, Name, E-Mail-Adresse, eingegebene Formulardaten. Mehr Details dazu finden Sie bei der jeweils eingesetzten Kontaktart Zweck: Abwicklung der Kommunikation mit Kunden, Geschäftspartnern usw.</h5>
                                        <h5 class="w3-serif">Speicherdauer: Dauer des Geschäftsfalls und der gesetzlichen Vorschriften</h5>
                                        <h5 class="w3-serif">Rechtsgrundlagen: Art. 6 Abs. 1 lit. a DSGVO (Einwilligung), Art. 6 Abs. 1 lit. b DSGVO (Vertrag), Art. 6 Abs. 1 lit. f DSGVO (Berechtigte Interessen)</h5>
                                    </div>

                                    <h5>Wenn Sie mit uns Kontakt aufnehmen und per Telefon, E-Mail oder Online-Formular kommunizieren, kann es zur Verarbeitung personenbezogener Daten kommen.</h5>

                                    <h5>Die Daten werden für die Abwicklung und Bearbeitung Ihrer Frage und des damit zusammenhängenden Geschäftsvorgangs verarbeitet. Die Daten während eben solange gespeichert bzw. solange es das Gesetz vorschreibt.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Betroffene Personen</h2>

                                    <h5>Von den genannten Vorgängen sind alle betroffen, die über die von uns bereit gestellten Kommunikationswege den Kontakt zu uns suchen.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Telefon</h2>

                                    <h5>Wenn Sie uns anrufen, werden die Anrufdaten auf dem  jeweiligen Endgerät und beim eingesetzten Telekommunikationsanbieter pseudonymisiert gespeichert.  Außerdem können Daten wie Name und Telefonnummer im  Anschluss per E-Mail versendet und zur Anfragebeantwortung gespeichert werden. Die Daten  werden gelöscht, sobald der Geschäftsfall beendet wurde  und es gesetzliche Vorgaben erlauben.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">E-Mail </h2>

                                    <h5>Wenn Sie mit uns per E-Mail kommunizieren, werden Daten  gegebenenfalls auf dem jeweiligen Endgerät (Computer,  Laptop, Smartphone,…) gespeichert und es kommt zur  Speicherung von Daten auf dem E-Mail-Server. Die Daten  werden gelöscht, sobald der Geschäftsfall beendet wurde  und es gesetzliche Vorgaben erlauben. </h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Online Formulare</h2>

                                    <h5>Wenn Sie mit uns mittels Online-Formular kommunizieren,  werden Daten auf unserem Webserver gespeichert und  gegebenenfalls an eine E-Mail-Adresse von uns  weitergeleitet. Die Daten werden gelöscht, sobald der  Geschäftsfall beendet wurde und es gesetzliche Vorgaben  erlauben.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Rechtsgrundlagen</h2>

                                    <h5>Die Verarbeitung der Daten basiert auf den folgenden  Rechtsgrundlagen:</h5>

                                    <h5>• Art. 6 Abs. 1 lit. a DSGVO (Einwilligung): Sie geben uns die Einwilligung Ihre Daten zu speichern und weiter für den Geschäftsfall betreffende Zwecke zu verwenden;</h5>

                                    <h5>• Art. 6 Abs. 1 lit. b DSGVO (Vertrag): Es besteht die Notwendigkeit für die Erfüllung eines Vertrags mit Ihnen oder einem Auftragsverarbeiter wie z. B. dem Telefonanbieter oder wir müssen die Daten für vorvertragliche Tätigkeiten, wie z. B. die Vorbereitung eines Angebots, verarbeiten;</h5>

                                    <h5>• Art. 6 Abs. 1 lit. f DSGVO (Berechtigte Interessen): Wir wollen Kundenanfragen und geschäftliche Kommunikation in einem professionellen Rahmen betreiben. Dazu sind gewisse technische Einrichtungen wie z. B. E-Mail-Programme, Exchange-Server und Mobilfunkbetreiber notwendig, um die Kommunikation effizient betreiben zu können.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Auftragsverarbeitungsvertrag (AVV)</h2>

                                    <h5>In diesem Abschnitt möchten wir Ihnen erklären, was ein Auftragsverarbeitungsvertrag ist und warum dieser benötigt wird. Weil das Wort “Auftragsverarbeitungsvertrag” ein ziemlicher Zungenbrecher ist, werden wir hier im Text auch öfters nur das Akronym AVV benutzen. Wie die meisten Unternehmen arbeiten wir nicht alleine, sondern nehmen auch selbst Dienstleistungen anderer Unternehmen oder Einzelpersonen in Anspruch. Durch die Einbeziehung verschiedener Unternehmen bzw. Dienstleister kann es sein, dass wir personenbezogene Daten zur Verarbeitung weitergeben. Diese Partner fungieren dann als Auftragsverarbeiter, mit denen wir einen Vertrag, den sogenannten Auftragsverarbeitungsvertrag (AVV), abschließen. Für Sie am wichtigsten zu wissen ist, dass die Verarbeitung Ihrer personenbezogenen Daten ausschließlich nach unserer Weisung erfolgt und durch den AVV geregelt werden muss.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Wer sind Auftragsverarbeiter?</h2>

                                    <h5>Wir sind als Unternehmen und Websiteinhaber für alle Daten, die wir von Ihnen verarbeiten verantwortlich. Neben den Verantwortlichen kann es auch sogenannte Auftragsverarbeiter geben. Dazu zählt jedes Unternehmen bzw. jede Person, die in unserem Auftrag personenbezogene Daten verarbeitet. Genauer und nach der DSGVO-Definition gesagt: jede natürliche oder juristische Person, Behörde, Einrichtung oder eine andere Stelle, die in unserem Auftrag personenbezogene Daten verarbeitet, gilt als Auftragsverarbeiter. Auftragsverarbeiter können folglich Dienstleister wie Hosting- oder Cloudanbieter, Bezahlungs- oder Newsletter-Anbieter oder große Unternehmen wie beispielsweise Google oder Microsoft sein.</h5>

                                    <h5>Zur besseren Verständlichkeit der Begrifflichkeiten hier ein Überblick über die drei Rollen in der DSGVO:</h5>

                                    <h5><b style="color: darkblue;">Betroffener </b>(Sie als Kunde oder Interessent) <b style="color: darkblue;"> → Verantwortlicher</b> (wir als Unternehmen und Auftraggeber) <b style="color: darkblue;"> → Auftragsverarbeiter </b>(Dienstleister wie z. B. Webhoster oder Cloudanbieter)</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Inhalt eines Auftragsverarbeitungsvertrages </h2>

                                    <h5>Wie bereits oben erwähnt, haben wir mit unseren Partnern, die als Auftragsverarbeiter fungieren, einen AVV abgeschlossen. Darin wird allen voran festgehalten, dass der Auftragsverarbeiter die zu bearbeitenden Daten ausschließlich gemäß der DSGVO verarbeitet. Der Vertrag muss schriftlich abgeschlossen werden, allerdings gilt in diesem Zusammenhang auch der elektronische Vertragsabschluss als „schriftlich“. Erst auf der Grundlage des Vertrags erfolgt die Verarbeitung der personenbezogenen Daten. Im Vertrag muss folgendes enthalten sein:</h5>
                                    <h5>• Bindung an uns als Verantwortlichen</h5>
                                    <h5>• Pflichten und Rechte des Verantwortlichen</h5>
                                    <h5>• Kategorien betroffener Personen</h5>
                                    <h5>• Art der personenbezogenen Daten</h5>
                                    <h5>• Art und Zweck der Datenverarbeitung</h5>
                                    <h5>• Gegenstand und Dauer der Datenverarbeitung</h5>
                                    <h5>• Durchführungsort der Datenverarbeitung</h5>

                                    <h5>Weiters enthält der Vertrag alle Pflichten des Auftragsverarbeiters. Die wichtigsten Pflichten sind:</h5>

                                    <h5>• Maßnahmen zur Datensicherheit zu gewährleisten</h5>
                                    <h5>• mögliche technische und organisatorischen Maßnahmen zu treffen, um die Rechte der betroffenen Person zu schützen</h5>
                                    <h5>• ein Daten-Verarbeitungsverzeichnis zu führen</h5>
                                    <h5>• auf Anfrage der Datenschutz-Aufsichtsbehörde mit dieser zusammenzuarbeiten</h5>
                                    <h5>• eine Risikoanalyse in Bezug auf die erhaltenen personenbezogenen Daten durchzuführen</h5>
                                    <h5>• Sub-Auftragsverarbeiter dürfen nur mit schriftlicher Genehmigung des Verantwortlichen beauftragt werden</h5>

                                    <h5>Wie so eine AVV konkret aussieht, können Sie sich beispielsweise unter <a href="https://www.wko.at/service/wirtschaftsrecht-gewerberecht/eu-dsgvo-mustervertrag-auftragsverarbeitung.html" class="text-dark"><u>https://www.wko.at/service/wirtschaftsrecht-gewerberecht/eu-dsgvo-mustervertrag-auftragsverarbeitung.html</u></a>ansehen. Hier wird ein Mustervertrag vorgestellt.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Online-Buchungssysteme Einleitung </h2>

                                    <div class="w3-panel w3-border">
                                        <h3 class="w3-serif">Online-Buchungssysteme Datenschutzerklärung Zusammenfassung</h3>
                                        <h5 class="w3-serif">Betroffene: Besucher der Website</h5>
                                        <h5 class="w3-serif">Zweck: Verbesserung der Nutzererfahrung und Organisation Verarbeitete Daten: Welche Daten verarbeitet werden, hängt stark von den verwendeten Diensten ab. Meist handelt es sich um IP-Adresse, Kontakt- und Bezahldaten und/oder technische Daten. Mehr Details dazu finden Sie bei den jeweils eingesetzten Tools.</h5>
                                        <h5 class="w3-serif">Speicherdauer: abhängig von den eingesetzten Tools</h5>
                                        <h5 class="w3-serif">Rechtsgrundlagen: Art. 6 Abs. 1 lit. a DSGVO (Einwilligung), Art. 6 Abs. 1 lit. f DSGVO (Berechtigte Interessen)</h5>
                                    </div>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Was ist ein Online-Buchungssystem?</h2>

                                    <h5>Damit Sie über unsere Website Buchungen vornehmen  können, nutzen wir ein oder mehrere Buchungssysteme.  Termine etwa können so ganz einfach online erstellt  werden. Ein Buchungssystem ist eine in unsere Website  eingebundene Softwareanwendung, die verfügbare  Ressourcen (wie zum Beispiel freie Termine) anzeigt und über die Sie direkt online buchen und meist auch bezahlen  können. Sie kennen wahrscheinlich solche Buchungssysteme  bereits aus der Gastronomie oder Hotellerie. Mittlerweile  werden solche Systeme aber in den verschiedensten  Branchen angewandt. Buchungssysteme können je nach  Tool und Einstellungen sowohl intern für uns als auch für  Kunden wie Sie genutzt werden. Dabei werden in der Regel  auch personenbezogene Daten von Ihnen erhoben und  gespeichert.</h5>

                                    <h5>Meistens funktioniert die Buchung wie folgt: Sie finden auf  unsere Website das Buchungssystem, in dem Sie per  Mausklick und Angaben Ihrer Daten direkt einen Termin für  eine Dienstleistung buchen und meist auch gleich bezahlen  können. Es kann sein, dass Sie über ein Formular  verschiedene Angaben über Ihre Person eintragen können.  Bitte seien Sie sich bewusst, dass alle von Ihnen  eingegebenen Daten in einer Datenbank gespeichert und  verwaltet werden können.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Warum nutzen wir ein Online-Buchungssystem? </h2>

                                    <h5>Wir verstehen unsere Website in gewisser Weise auch als  freie Dienstleistung für Sie. Sie sollen hilfreiche  Informationen erhalten und sich auf unsere Seite rundum  wohl fühlen. Dazu gehört auch ein Online-Service, das  Ihnen das Buchen von Terminen bzw. Dienstleistungen so  einfach wie möglich macht. Vorbei sind die Zeiten, in denen  Sie umständlich via Telefon oder E-Mail tagelang auf eine  Buchungsbestätigung warten mussten. Mit einem Online Buchungssystem haben Sie nach wenigen Klicks alles  erledigt und können sich wieder um andere Dinge  kümmern. Auch für uns erleichtert das System das  Management aller Buchungen und Termine. Daher  betrachten wir ein solches Buchungssystem sowohl für Sie als auch für uns als absolut sinnvoll. </h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Welche Daten werden verarbeitet?</h2>

                                    <h5>Welche Daten genau verarbeitet werden, können wir Ihnen  in diesem allgemeinen Informationstext über Buchungssystem natürlich nicht sagen. Das ist stets vom  verwendeten Tool und den darin enthaltenen Funktionen  und Möglichkeiten abhängig. Viele Buchungssysteme bieten  neben der herkömmlichen Buchungsfunktion auch noch eine Reihe an weiteren Features an. So haben beispielsweise  viele Systeme auch ein externes Online-Zahlsystem (z. B.  von Stripe, Klarna oder Paypal) und eine Kalender Synchronisierungsfunktion integriert. Dementsprechend  können je nach Funktionen unterschiedliche und  unterschiedlich viele Daten verarbeitet werden. Für  gewöhnlich werden Daten wie IP-Adresse, Name und  Kontaktdaten, technische Angaben zu Ihrem Gerät und  Zeitpunkt einer Buchung verarbeitet. Wenn Sie im System  auch eine Zahlung vornehmen, werden auch Bankdaten wie  Kontonummer, Kreditkartennummer, Passwörter, TANs usw.  gespeichert und an den jeweiligen Zahlungsanbieter  weitergegeben. Wir empfehlen Ihnen die jeweilige  Datenschutzerklärung des verwendeten Tools genau  durchzulesen, damit Sie wissen, welche Daten von Ihnen  konkret verarbeitet werden.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Dauer der Datenverarbeitung </h2>

                                    <h5>Jedes Buchungssystem speichert Daten unterschiedlich  lange. Darum können wir über die Dauer der Datenverarbeitung hier noch keine konkreten Angaben  geben. Grundsätzlich werden allerdings personenbezogene  Daten immer nur so lange gespeichert, wie es zur  Bereitstellung der Dienste unbedingt nötig ist. Buchungssystem verwenden in der Regel auch Cookies, die  Informationen unterschiedlich lange speichern. Manche  Cookies werden sofort nach Verlassen der Seite wieder  gelöscht, andere können einige Jahre gespeichert werden.  In unserem Abschnitt "Cookies" erfahren Sie mehr darüber.  Schauen Sie sich bitte auch die jeweiligen Datenschutzerklärungen der Anbieter an. Darin sollte  erläutert werden, wie lange Ihre Daten im konkreten Fall  gespeichert werden.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Widerspruchsrecht</h2>

                                    <h5>Wenn Sie der Datenverarbeitung durch ein Buchungssystem zugestimmt haben, haben Sie natürlich auch immer die Möglichkeit und das Recht diese Einwilligung zu widerrufen. Seien Sie sich also bitte stets bewusst, dass Sie Rechte in Bezug auf Ihre personenbezogenen Daten haben und diese Rechte auch jederzeit wirkend machen können. Wenn Sie nicht wollen, dass personenbezogene Daten verarbeitet werden, dann dürfen auch keine personenbezogenen Daten verarbeitet werden. So einfach ist das. Am einfachsten widerrufen Sie die Datenverarbeitung über ein Cookie-Consent-Tool oder über andere angebotene Opt-Out-Funktionen. Die Datenspeicherung durch Cookies können Sie zum Beispiel auch direkt in Ihrem Browser verwalten. Bis zu Ihrem Widerruf bleibt die Rechtmäßigkeit der Datenverwaltung unberührt.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Rechtsgrundlage</h2>

                                    <h5>Wenn Sie eingewilligt haben, dass Buchungssysteme eingesetzt werden dürfen, ist die Rechtsgrundlage der entsprechenden Datenverarbeitung diese Einwilligung. Sie stellt laut Art. 6 Abs. 1 lit. a DSGVO (Einwilligung) die Rechtsgrundlage für die Verarbeitung personenbezogener Daten, wie sie durch Buchungssysteme vorkommen kann, dar.</h5>

                                    <h5>Weiters haben auch wir ein berechtigtes Interesse, Buchungssysteme zu verwenden, weil wir damit einerseits unser Kundenservice erweitern und andererseits unsere interne Buchungsorganisation optimieren. Die dafür entsprechende Rechtsgrundlage ist Art. 6 Abs. 1 lit. f DSGVO (Berechtigte Interessen). Wir setzen die Tools gleichwohl nur ein, soweit Sie eine Einwilligung erteilt haben. Das wollen wir an dieser Stelle unbedingt nochmals festgehalten haben.</h5>

                                    <h5>Informationen zu speziellen Buchungssystemen erhalten Sie – sofern vorhanden – in den folgenden Abschnitten.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Erklärung verwendeter Begriffe</h2>

                                    <h5>Wir sind stets bemüht unsere Datenschutzerklärung so klar und verständlich wie möglich zu verfassen. Besonders bei technischen und rechtlichen Themen ist das allerdings nicht immer ganz einfach. Es macht oft Sinn juristische Begriffe (wie z. B. personenbezogene Daten) oder bestimmte technische Ausdrücke (wie z. B. Cookies, IP-Adresse) zu verwenden. Wir möchte diese aber nicht ohne Erklärung verwenden. Nachfolgend finden Sie nun eine alphabetische Liste von wichtigen verwendeten Begriffen, auf die wir in der bisherigen Datenschutzerklärung vielleicht noch nicht ausreichend eingegangen sind. Falls diese Begriffe der DSGVO entnommen wurden und es sich um Begriffsbestimmungen handelt, werden wir hier auch die DSGVO-Texte anführen und gegebenenfalls noch eigene Erläuterungen hinzufügen.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Auftragsverarbeiter</h2>

                                    <h4>Begriffsbestimmung nach Artikel 4 der DSGVO</h4>

                                    <h5>Im Sinne dieser Verordnung bezeichnet der Ausdruck:</h5>

                                    <h5><b style="color: darkblue;">"Auftragsverarbeiter" </b>eine natürliche oder juristische Person, Behörde, Einrichtung oder andere Stelle, die personenbezogene Daten im Auftrag des Verantwortlichen verarbeitet;</h5>

                                    <h5><b style="color: darkblue;">Erläuterung: </b>Wir sind als Unternehmen und Websiteinhaber für alle Daten, die wir von Ihnen verarbeiten verantwortlich. Neben den Verantwortlichen kann es auch sogenannte Auftragsverarbeiter geben. Dazu zählt jedes Unternehmen bzw. jede Person, die in unserem Auftrag personenbezogene Daten verarbeitet. Auftragsverarbeiter können folglich, neben Dienstleistern wie Steuerberater, etwa auch Hosting- oder Cloudanbieter, Bezahlungs- oder Newsletter-Anbieter oder große Unternehmen wie beispielsweise Google oder Microsoft sein.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Einwilligung</h2>

                                    <h4>Begriffsbestimmung nach Artikel 4 der DSGVO</h4>

                                    <h5>Im Sinne dieser Verordnung bezeichnet der Ausdruck:</h5>

                                    <h5><b style="color: darkblue;">"Einwilligung" </b> der betroffenen Person jede freiwillig für den bestimmten Fall, in informierter Weise und unmissverständlich abgegebene Willensbekundung in Form einer Erklärung oder einer sonstigen eindeutigen bestätigenden Handlung, mit der die betroffene Person zu verstehen gibt, dass sie mit der Verarbeitung der sie betreffenden personenbezogenen Daten einverstanden ist;</h5>

                                    <h5><b style="color: darkblue;">Erläuterung: </b>In der Regel erfolgt bei Websites eine solche Einwilligung über ein Cookie-Consent-Tool. Sie kennen das bestimmt. Immer wenn Sie erstmals eine Website besuchen, werden Sie meist über einen Banner gefragt, ob Sie der Datenverarbeitung zustimmen bzw. einwilligen. Meist können Sie auch individuelle Einstellungen treffen und so selbst entscheiden, welche Datenverarbeitung Sie erlauben und welche nicht. Wenn Sie nicht einwilligen, dürfen auch keine personenbezogene Daten von Ihnen verarbeitet werden. Grundsätzlich kann eine Einwilligung natürlich auch schriftlich, also nicht über ein Tool, erfolgen.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Personenbezogene Daten</h2>

                                    <h4>Begriffsbestimmung nach Artikel 4 der DSGVO</h4>

                                    <h5>Im Sinne dieser Verordnung bezeichnet der Ausdruck:</h5>

                                    <h5><b style="color: darkblue;">“personenbezogene Daten" </b> alle Informationen, die sich auf eine identifizierte oder identifizierbare natürliche Person (im Folgenden „betroffene Person“) beziehen; als identifizierbar wird eine natürliche Person angesehen, die direkt oder indirekt, insbesondere mittels Zuordnung zu einer Kennung wie einem Namen, zu einer Kennnummer, zu Standortdaten, zu einer Online-Kennung oder zu einem oder mehreren besonderen Merkmalen, die Ausdruck der physischen, physiologischen, genetischen, psychischen, wirtschaftlichen, kulturellen oder sozialen Identität dieser natürlichen Person sind, identifiziert werden kann;</h5>

                                    <h5><b style="color: darkblue;">Erläuterung: </b> Personenbezogene Daten sind also all jene Daten, die Sie als Person identifizieren können. Das sind in der Regel Daten wie etwa:</h5>

                                    <h5>• Name</h5>
                                    <h5>• Adresse</h5>
                                    <h5>• E-Mail-Adresse</h5>
                                    <h5>• Post-Anschrift</h5>
                                    <h5>• Telefonnummer</h5>
                                    <h5>• Geburtsdatum</h5>
                                    <h5>• Kennnummern wie Sozialversicherungsnummer, Steueridentifikationsnummer, Personalausweisnummer oder Matrikelnummer</h5>
                                    <h5>• Bankdaten wie Kontonummer, Kreditinformationen, Kontostände uvm.</h5>
                                    <h5>• Für das Catering werden folgende Daten verwendet: Name, Adresse, Telefonnummer, E-Mail Adresse. Für die Tischreservierung/Zustellung werden folgende Daten verwendet: Name, Adresse, Telefonnummer, E-Mail Adresse. Bei der Kochkurs Anmeldung werden folgende Daten verwendet: Name, Adresse, Geburtsdatum, Telefonnummer, E-Mail Adresse. Im Onlineshop werden folgende Daten verwendet: Name, Adresse, Telefonnummer, E-Mail Adresse und die Bankdaten (für die Zahlungsmenthode). </h5>

                                    <h5>Laut Europäischem Gerichtshof (EuGH) zählt auch Ihre <b style="color: darkblue;">IP-Adresse zu den personenbezogenen Daten.</b> IT-Experten können anhand Ihrer IP-Adresse zumindest den ungefähren Standort Ihres Geräts und in weiterer Folge Sie als Anschlussinhabers feststellen. Daher benötigt auch das Speichern einer IP-Adresse eine Rechtsgrundlage im Sinne der DSGVO. Es gibt auch noch sogenannte <b style="color: darkblue;">“besondere Kategorien"</b>der personenbezogenen Daten, die auch besonders schützenswert sind. Dazu zählen:</h5>

                                    <h5>• rassische und ethnische Herkunft</h5>
                                    <h5>• politische Meinungen</h5>
                                    <h5>• religiöse bzw. weltanschauliche Überzeugungen</h5>
                                    <h5>• die Gewerkschaftszugehörigkeit</h5>
                                    <h5>• genetische Daten wie beispielsweise Daten, die aus Blut- oder Speichelproben entnommen werden</h5>
                                    <h5>• biometrische Daten (das sind Informationen zu psychischen, körperlichen oder verhaltenstypischen Merkmalen, die eine Person identifizieren können). Gesundheitsdaten</h5>
                                    <h5>• Daten zur sexuellen Orientierung oder zum Sexualleben</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Profiling</h2>

                                    <h4>Begriffsbestimmung nach Artikel 4 der DSGVO</h4>

                                    <h5>Im Sinne dieser Verordnung bezeichnet der Ausdruck:</h5>

                                    <h5><b style="color: darkblue;">“Profiling" </b> jede Art der automatisierten Verarbeitung personenbezogener Daten, die darin besteht, dass diese personenbezogenen Daten verwendet werden, um bestimmte persönliche Aspekte, die sich auf eine natürliche Person beziehen, zu bewerten, insbesondere um Aspekte bezüglich Arbeitsleistung, wirtschaftliche Lage, Gesundheit, persönliche Vorlieben, Interessen, Zuverlässigkeit, Verhalten, Aufenthaltsort oder Ortswechsel dieser natürlichen Person zu analysieren oder vorherzusagen;</h5>

                                    <h5><b style="color: darkblue;">Erläuterung: </b> Beim Profiling werden verschiedene Informationen über eine Person zusammengetragen, um daraus mehr über diese Person zu erfahren. Im Webbereich wird Profiling häufig für Werbezwecke oder auch für Bonitätsprüfungen angewandt. Web- bzw. Werbeanalyseprogramme sammeln zum Beispiel Daten über Ihre Verhalten und Ihre Interessen auf einer Website. Daraus ergibt sich ein spezielles Userprofil, mit dessen Hilfe Werbung gezielt an eine Zielgruppe ausgespielt werden kann.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Verantwortlicher </h2>

                                    <h4>Begriffsbestimmung nach Artikel 4 der DSGVO</h4>

                                    <h5>Im Sinne dieser Verordnung bezeichnet der Ausdruck:</h5>

                                    <h5><b style="color: darkblue;">“Verantwortlicher“ </b> die natürliche oder juristische Person, Behörde, Einrichtung oder andere Stelle, die allein oder gemeinsam mit anderen über die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten entscheidet; sind die Zwecke und Mittel dieser Verarbeitung durch das Unionsrecht oder das Recht der Mitgliedstaaten vorgegeben, so kann der Verantwortliche beziehungsweise können die bestimmten Kriterien seiner Benennung nach dem Unionsrecht oder dem Recht der Mitgliedstaaten vorgesehen werden;</h5>

                                    <h5><b style="color: darkblue;">Erläuterung: </b> In unserem Fall sind wir für die Verarbeitung Ihrer personenbezogenen Daten verantwortlich und folglich der “Verantwortliche”. Wenn wir erhobene Daten zur Verarbeitung an andere Dienstleister weitergeben, sind diese “Auftragsverarbeiter”. Dafür muss ein “Auftragsverarbeitungsvertrag (AVV)” unterzeichnet werden.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Verarbeitung </h2>

                                    <h4>Begriffsbestimmung nach Artikel 4 der DSGVO</h4>

                                    <h5>Im Sinne dieser Verordnung bezeichnet der Ausdruck:</h5>

                                    <h5><b style="color: darkblue;">“Verarbeitung“ </b> jeden mit oder ohne Hilfe automatisierter Verfahren ausgeführten Vorgang oder jede solche Vorgangsreihe im Zusammenhang mit personenbezogenen Daten wie das Erheben, das Erfassen, die Organisation, das Ordnen, die Speicherung, die Anpassung oder Veränderung, das Auslesen, das Abfragen, die Verwendung, die Offenlegung durch Übermittlung, Verbreitung oder eine andere Form der Bereitstellung, den Abgleich oder die Verknüpfung, die Einschränkung, das Löschen oder die Vernichtung;</h5>

                                    <h5><b style="color: darkblue;">Anmerkung: </b> Wenn wir in unserer Datenschutzerklärung von Verarbeitung sprechen, meinen wir damit jegliche Art von Datenverarbeitung. Dazu zählt, wie oben in der originalen DSGVO-Erklärung erwähnt, nicht nur das Erheben sondern auch das Speichern und Verarbeiten von Daten.</h5>

                                    <h2 class="text-rgba(15, 26, 43, .5) mb-4 ">Schlusswort</h2>

                                    <h5>Herzlichen Glückwunsch! Wenn Sie diese Zeilen lesen, haben Sie sich wirklich durch unsere gesamte Datenschutzerklärung „gekämpft“ oder zumindest bis hier hin gescrollt. Wie Sie am Umfang unserer Datenschutzerklärung sehen, nehmen wir den Schutz Ihrer persönlichen Daten, alles andere als auf die leichte Schulter. Uns ist es wichtig, Sie nach bestem Wissen und Gewissen über die Verarbeitung personenbezogener Daten zu informieren. Dabei wollen wir Ihnen aber nicht nur mitteilen, welche Daten verarbeitet werden, sondern auch die Beweggründe für die Verwendung diverser Softwareprogramme näherbringen. In der Regel klingen Datenschutzerklärung sehr technisch und juristisch. Da die meisten von Ihnen aber keine Webentwickler oder Juristen sind, wollten wir auch sprachlich einen anderen Weg gehen und den Sachverhalt in einfacher und klarer Sprache erklären. Immer ist dies natürlich aufgrund der Thematik nicht möglich. Daher werden die wichtigsten Begriffe am Ende der Datenschutzerklärung näher erläutert. Bei Fragen zum Thema Datenschutz auf unserer Website zögern Sie bitte nicht, uns oder die verantwortliche Stelle zu kontaktieren. Wir wünschen Ihnen noch eine schöne Zeit und hoffen, Sie auf unserer Website bald wieder begrüßen zu dürfen.</h5>

                                    <h5>Alle Texte sind urheberrechtlich geschützt.</h5>

                                    <h5>Quelle: Erstellt mit dem <a href="https://www.adsimple.at/datenschutz-generator/" class="text-dark"><u> Datenschutz Generator</u></a>von AdSimple</h5>



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
                        <a class="btn btn-link" href="TableTermConditions.php?page=DataProtectionRegulation.php">Allgemeine Geschäftsbedingungen</a>
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