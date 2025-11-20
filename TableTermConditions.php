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
                    <a href="CateringBooking.php" class="btn btn-primary py-2 px-4">Catering Buchung</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Tischreservierung</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Tischreservierung</li>
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
                        <h5 class="section-title ff-secondary text-start text-rgba(15, 26, 43, .5) fw-normal">Tischreservierung</h5>
                        <h1 class="text-rgba(15, 26, 43, .5) mb-4 ">Allgemeine Geschäftsbedingungen (Gasthaus), Stand 22.06.2023 </h1>
                        <form action="<?php echo $_GET['page']; ?> " method="post">
                            <div class="row g-3">
                                <div class="col-md-12">


                                    <h4>1. Geltungsbereich</h4>
                                    <h6>1.1 Diese Allgemeinen Geschäftsbedingungen im Folgenden kurz AGB, regeln das Rechtsverhältnis zwischen Jennifer Ofori, geb. 18.08.1989, Inh. des Unternehmens Jay O, im Folgenden kurz „Gastwirt“, und dem Vertragspartner, und gelten für alle in diesem Verhältnis getätigten Reservierungen und erbrachten Dienstleistungen.</h6>
                                    <h6>1.2 Weichen Geschäftsbedingungen des Vertragspartner von diesen AGB ab oder ergänzen diese die gegenständlichen AGB, so sind diese abweichenden oder ergänzenden Geschäftsbedingungen des Gastes nur bei ausdrücklicher und schriftlicher Vereinbarung mit dem Gastwirt wirksam. Sämtliche im Nachfolgenden näher geregelten Leistungen des Gastwirtes werden ausschließlich auf Basis dieser AGB angeboten.</h6>
                                    <h6>1.3 Mit Abschluss einer Reservierung – ganz gleich durch welche Mittel – bestätigt der Vertragspartner, dass er die Geschäftsbedingungen gelesen und verstanden hat und diesen zustimmt.</h6>

                                    <h4>2. Definitionen</h4>
                                    <h6>2.1  Bewirtung Zurverfügungstellung/Verabreichen von Speisen und Getränken im Bewirtungsbetrieb des Gastwirtes</h6>
                                    <h6>2.2 Bewirtungsvertrag Ist der zwischen dem Gastwirt und dem Gast abgeschlossene Vertrag, dessen Schwerpunkt in der Bewirtung liegt und dessen Inhalt in der Folge näher geregelt wird</h6>
                                    <h6>2.3 Bewirtungsbetrieb Räumlichkeiten außerhalb oder innerhalb eines Gebäudes, wo die Bewirtung der Gäste durch den Gastwirt stattfinde</h6>
                                    <h6>2.4 Gast natürliche Person, die Bewirtung in Anspruch nimmt. Der Gast ist in der Regel zugleich Vertragspartner. Als Gast gelten auch jene Personen, die in Begleitung des Vertragspartners bewirtet werden</h6>
                                    <h6>2.5 Reservierung verbindliches Angebot des Vertragspartners auf Abschluss eines Bewirtungsvertrages</h6>
                                    <h6>2.6 Vertragspartner natürliche oder juristische Person, die als Gast oder für einen Gast einen Bewirtungsvertrag abschließt.</h6>

                                    <h4>3. Vertragsabschluss/Vertragsinhalt</h4>
                                    <h6>3.1 Nach Prüfung der Verfügbarkeit durch die (mündliche oder schriftliche) Annahme der Reservierung kommt der Bewirtungsvertrag zustande. Der Bewirtungsvertrag kommt spätestens durch die Bewirtung des Gastes durch den Gastwirt zustande. Ab dem Zeitpunkt des Zustandekommens des Bewirtungsvertrages sind der Gastwirt und der Vertragspartner an diesen gebunden</h6>
                                    <h6>3.2 Die in der jeweils zum Vertragsschlusszeitpunkt aktuellen Preisliste des Gastwirtes angeführten, sowie durch Sonderabsprachen individuell vereinbarten Preise gelten als Grundlage für das vom Vertragspartner zu leistende Entgelt.</h6>
                                    <h6>3.3 Bei sämtlichen Reservierungen hat der Vertragspartner seinen vollständigen Namen (Firma), seine Anschrift, E-Mail-Adresse (sofern vorhanden) und Telefonnummer, sowie die genaue Anzahl der zu bewirtenden Gäste sowie den Umfang der gewünschten Bewirtung bekanntzugeben.</h6>
                                    <h6>3.4 Diese Daten stellen einen wesentlichen Bestandteil des Vertrags dar und sind Grundlage für die Rechnungslegung an den Vertragspartner. Eine Über- oder Unterschreitung der reservierten Personenanzahl ist nur bei ausdrücklicher Zustimmung des Gastwirtes zulässig. Die vereinbarte Gästezahl wird der Verrechnung als Mindestzahl zugrunde gelegt. Bei vom Gastwirt zugestimmten Überschreiten der vereinbarten Anzahl an Personen erfolgt die Verrechnung gemäß der tatsächlichen Gästezahl. Bei Unterschreiten der vereinbarten Gästeanzahl gelten die angeführten Stornobedingungen gemäß Punkt 6 dieser AGB. </h6>
                                    <h6>3.5 Alle konsumierten Getränke und Speisen werden vom Gastwirt nach dem tatsächlichen Verbrauch und dem Bestellwert laut aktueller Preisliste in Rechnung gestellt, außer, es wird bezüglich der Konsumation eine andere Vereinbarung wie zB eine Pauschale getroffen.</h6>

                                    <h4>4. Sonderregelungen für Vertragsabschlüsse im Fernabsatz</h4>
                                    <h6>4.1 Elektronische Erklärungen gelten als zugegangen, wenn die Partei, für die sie bestimmt sind, diese unter gewöhnlichen Umständen abrufen kann und der Zugang zu den bekannt gegebenen Geschäftszeiten des Gastwirtes erfolgt.</h6>
                                    <h6>4.2 Die Annahme durch den Gastwirt erfolgt bei Buchungen über Fernkommunikationsmittel ausschließlich durch eine Reservierungsbestätigung des Gastwirtes per E-Mail/auf dem Postweg. </h6>
                                    <h6>4.3 Bei Onlinebuchungen besteht eine Reservierungsmöglichkeit nur nach vollständiger und korrekter Eingabe aller im Reservierungsfenster vorhandenen Pflichtfelder sowie des ausdrücklichen Anerkenntnisses der AGB mittels der im Reservierungsfenster vorgesehenen Applikation. </h6>
                                    <h6>4.4 Der Vertragspartner nimmt zur Kenntnis, dass der Reservierungsvorgang bei Onlinereservierungen nach Betätigung des Buttons „Kostenpflichtig reservieren“ nicht mehr storniert oder rückgängig gemacht werden kann.</h6>
                                    <h6>4.5 Der Vertragspartner ist für die korrekte Eingabe/Bekanntgabe der Daten allein verantwortlich. War der Reservierungsvorgang nur durch Eingabe/Bekanntgabe fehlerhafter oder unvollständiger Daten nicht korrekt, kann die Buchung entweder mit Hilfe des Gastwirtes korrigiert oder eine andere Reservierungsbestätigung ausgestellt werden. <b style="color: darkred;">In allen Reklamationsfällen muss vom Vertragspartner jedenfalls die Reservierungsbestätigung vorgelegt werden, da ansonsten die Bewirtung durch den Gastwirt abgelehnt werden kann. Die elektronische Reservierungsbestätigung des Gastwirtes dient als einziger zulässiger Nachweis der ordnungsgemäß getätigten Reservierung und ist daher vom Vertragspartner mitzuführen und im Falle von Reklamationen dem Personal des Gastwirtes vorzuweisen.</b></h6>
                                    <h6>4.6 Der Vertragspartner nimmt zur Kenntnis, dass es aufgrund der notwendigen Datenübertragungen über das Internet und über sonstige Datenleitungen bei der Reservierung ausnahmsweise zu Problemen kommen kann, ohne dass daraus irgendwelche Rechtsfolgen abgeleitet werden können.</h6>

                                    <h4>5. Rücktritt des Gastwirtes vom Bewirtungsvertrag</h4>
                                    <h6>5.1 Falls der Vertragspartner/die Gäste eine halbe Stunde nach dem vereinbarten Reservierungszeitpunkt nicht erscheinen, besteht keine Bewirtungspflicht, es sei denn, dass ein späterer Ankunftszeitpunkt vereinbart wurde.</h6>
                                    <h6>5.2 Bis spätestens drei Monate vor der vereinbarten Bewirtung des Vertragspartners bzw der Gäste kann der Bewirtungsvertrag durch den Gastwirt aus sachlich gerechtfertigten Gründen durch einseitige Erklärung aufgelöst werden.</h6>
                                
                                    <h4>6. Rücktritt durch den Vertragspartner, Stornogebühr</h4>
                                    <h6>6.1 Bei den vom Gastwirt angebotenen Dienstleistungen handelt es sich um Freizeit Dienstleistungen iSd § 18 Abs 1 Z 10 FAGG, die zu einem bestimmten Zeitpunkt innerhalb eines genau angegebenen Zeitraums erbracht werden. Dem Vertragspartner steht demnach kein Rücktrittsrecht gemäß § 11 Abs 1 FAGG zu.</h6>
                                    <h6>6.2 Ein Rücktritt durch einseitige Erklärung des Vertragspartners ist nur unter Entrichtung folgender Stornogebühren möglich:</h6>
                                    <h5><b style="color: darkred;">bis 3 Monate 3 Monate bis 14 Tage 14 Tage bis 1 Tag am letzten Tag 30% 50% 70% 90% </b> 4</h5>

                                    <h6>6.3 Bis zu einer Unterschreitung der reservierten Gästezahl im nachfolgenden Ausmaß ist ein Teilrücktritt im Ausmaß der zu reduzierenden Gästeanzahl ohne Entrichtung einer Stornogebühr durch einseitige Erklärung des Vertragspartners möglich:</h6>
                                    <h5><b style="color: darkred;">bis 3 Monate 3 Monate bis 14 Tage 14 Tage bis 1 Tag am letzten Tag 40% 30% 20% 10% </b></h5>

                                    <h6>6.4 Bei Unterschreitung der reservierten Gästezahl um mehr als die unter Punkt 6.3 genannte Gästeanzahl ist ein Teilrücktritt im Ausmaß der zu reduzierenden Gästezahl durch einseitige Erklärung des Vertragspartners nur unter Entrichtung der unter Punkt 6.2 angeführten Stornogebühren möglich.</h6>
                                    <h6>6.5 Die jeweiligen Stornogebühren berücksichtigen jene Kosten, die sich der Gastwirt aufgrund des Unterbleibens der Leistung(en) erspart hat. Sie sind von der vereinbarten Gesamtsumme bzw dem Gesamtwert der vereinbarten Leistungen (Speisen und Getränke), etwaigen Pauschalvereinbarungen bzw mangels vereinbarter Konsumationsleistung vom Betrag in der Höhe von EUR 30,00 pro reserviertem Gast zu berechnen.</h6>
                                    <h6>6.6 Der Rücktritt des Vertragspartners ist schriftlich zu erklären, anderenfalls er keine Wirksamkeit entfaltet.</h6>


                                    <h4>7. Behinderungen der Anreise</h4>
                                    <h6>Kann der Vertragspartner bzw können die Gäste am Tag der Anreise nicht im Bewirtungsbetrieb erscheinen, weil durch unvorhersehbare außergewöhnliche Umstände (zB extremer Schneefall, Hochwasser etc) sämtliche Anreisemöglichkeiten unmöglich sind, ist der Vertragspartner nicht verpflichtet, das vereinbarte Entgelt zu bezahlen.</h6>
                                    
                                    <h4>8. Rechte des Vertragspartners</h4>
                                    <h6>8.1 Der Vertragspartner erwirbt durch den Abschluss eines Bewirtungsvertrages das Recht auf die übliche Bewirtung und Bedienung, sowie den Gebrauch der Einrichtungen des Bewirtungsbetriebes, die üblicher Weise und ohne besondere Bedingungen den Gästen zur Benützung zugänglich sind.</h6>
                                    <h6>8.2 Dem Vertragspartner steht kein Recht auf Entgeltminderung zu, wenn Einrichtungen aus technischen Gründen nicht verfügbar bzw benutzbar sind.</h6>

                                    <h6>8.3 Der Vertragspartner hat seine Rechte gemäß einer allfälligen Hausordnung bzw den Anweisungen des Gastwirtes auszuüben. </h6>

                                    <h4>9. Pflichten des Vertragspartners</h4>

                                    <h6>9.1 Spätestens zum Zeitpunkt des Endes der Bewirtung ist der Vertragspartner verpflichtet, das vereinbarte Entgelt zuzüglich etwaiger Mehrbeträge, die aufgrund gesonderter Leistungsinanspruchnahmen durch ihn und/oder die ihn begleitenden Gäste entstanden sind zuzüglich – falls noch nicht berücksichtigt – gesetzlicher Umsatzsteuer zu bezahlen.</h6>
                                    <h6>9.2 Der Gastwirt ist nicht verpflichtet, Fremdwährungen zu akzeptieren. Sollte der Gastwirt bargeldlose Zahlungsmittel akzeptieren, so trägt der Vertragspartner alle damit zusammenhängenden Kosten, etwa Erkundigungen bei Kreditkartenunternehmungen usw.</h6>
                                    <h6>9.3 Der Vertragspartner und seine Gäste haften dem Gastwirt gegenüber für jeden Schaden zur ungeteilten Hand, den er oder der Gast oder sonstige Personen, die mit Wissen oder Willen des Vertragspartners Leistungen des Gastwirtes entgegennehmen oder sich am Bewirtungsort aufhalten, verursachen. Für Ansprüche Dritter hält der Vertragspartner/Gast den Gastwirt zur Gänze schad- und klaglos.</h6>
                                    <h6>9.4 Ohne vorherige Genehmigung des Gastwirtes ist das Mitbringen von Speisen und Getränken nicht gestattet. </h6>
                                    <h6>9.5 Für die Einhaltung aller gesetzlichen und behördlichen Vorschriften – insbesondere von gewerberechtlichen, feuerpolizeilichen, urheberschutzrechtlichen und veranstaltungsrechtlichen, sowie des OÖ Jugendschutzgesetzes idgF und des Tabak- und Nichtraucherinnen- bzw Nichtraucherschutzgesetzes idgF – ist der Vertragspartner selbst verantwortlich und hat den diesbezüglichen Weisungen des Gastwirtes zu folgen. Der Vertragspartner ist – soweit nicht gesetzlich anders vorgesehen – verpflichtet, behördliche Bewilligungen auf eigene Kosten einzuholen und alle behördlichen Auflagen auf eigene Kosten zu erfüllen.</h6>
                                    <h6>9.6 Dekorationsmaterial muss den feuerpolizeilichen Anforderungen entsprechen und darf im Übrigen – ebenso wie sonstige Gegenstände – nur mit Zustimmung des Gastwirtes angebracht werden. Das Anbringen von Dekorationsmaterial an den Wänden unter Verwendung von Klebstoffen, Klebestreifen, Möbelheftern, Nägeln und Schrauben ist untersagt. Mitgebrachte Gegenstände sind nach der Veranstaltung unverzüglich vom Vertragspartner zu entfernen. Erfolgt die Entfernung nicht unverzüglich, hat der Gastwirt die Möglichkeit dies auf Kosten des Vertragspartners durch Dritte durchführen zu lassen bzw Raummiete für die Aufbewahrung zu verrechnen</h6>

                                    <h4>10. Rechte des Gastwirtes</h4>
                                    <h6>10.1 Dem Gastwirt steht das gesetzliche Zurückbehaltungsrecht gemäß § 471 ABGB an den vom Vertragspartner bzw. dem vom Gast eingebrachten Sachen zu, wenn der Vertragspartner die Bezahlung des bedungenen Entgelts verweigert oder er damit im Rückstand ist. 6  Dieses Zurückbehaltungsrecht steht dem Gastwirt weiters zur Sicherung seiner Forderung aus dem Bewirtungsvertrag, insbesondere für Verpflegung, sonstiger Auslagen, die für den Vertragspartner gemacht wurden und für allfällige Ersatzansprüche jeglicher Art zu. </h6>
                                    <h6>10.2 Werden vom Gastwirt Sonderwünsche des Vertragspartners oder Gastes erfüllt, so ist der Gastwirt berechtigt, dafür ein Sonderentgelt zu verlangen. Dieses Sonderentgelt bzw die Art der Berechnung ist jedoch vor Leistungserbringung durch den Gastwirt dem Gast/Vertragspartner offenzulegen. Der Gastwirt kann diese Leistungen aus betrieblichen Gründen auch ablehnen.</h6>
                                    <h6>10.3 Dem Gastwirt steht das Recht auf jederzeitige Abrechnung bzw Zwischenabrechnung seiner Leistung zu.</h6>

                                    <h4>11. Pflichten des Gastwirtes</h4>

                                    <h6>11.1 Der Gastwirt ist verpflichtet, die vereinbarten Leistungen in einem seinem Standard entsprechenden Umfang zu erbringen.</h6>
                                    <h6>11.2 Es gelten die gesetzlichen Gewährleistungsbestimmungen.</h6>

                                    <h4>12. Haftungsbeschränkungen</h4>
                                    <h6>12.1  Ist der Vertragspartner ein Konsument im Sinne des § 1 Konsumentenschutzgesetzes (KSchG), wird die Haftung des Gastwirtes – auch für eingebrachte Sachen – für leichte Fahrlässigkeit, mit Ausnahme von Personenschäden, ausgeschlossen.</h6>

                                    <h6>12.2 Ist der Vertragspartner ein Unternehmer im Sinne des § 1 Konsumentenschutzgesetzes (KSchG), wird die Haftung des Gastwirtes sowie seiner Erfüllungsgehilfen – auch für eingebrachte Sachen – für leichte und grobe Fahrlässigkeit ausgeschlossen. In diesem Fall trägt der Vertragspartner die Beweislast für das Vorliegen des Verschuldens. Nicht ersetzt werden Folgeschäden, immaterielle Schäden oder indirekte Schäden sowie entgangene Gewinne. In jedem Fall findet der zu ersetzende Schaden seine Grenze in der Höhe des Vertrauensinteresses.</h6>

                                    <h6>12.3  Nicht gehaftet wird für abhandengekommene Sachen des Gastes/Vertragspartners.</h6>
                                    <h6>12.4  Der Gastwirt bemüht sich, Störungen an vom Gastwirt direkt zur Verfügung gestellten technischen Einrichtungen und sonstigen Einrichtungen umgehend zu beseitigen. Der Gastwirt haftet nicht für Ausfälle dieser Einrichtungen, sowie des Stromnetzes bzw. sonstiger infrastruktureller Einrichtungen.</h6>
                                    <h6>12.5  Die Haftung ist in jedem Fall ausgeschlossen, wenn der Vertragspartner und/oder Gast den eingetretenen Schaden ab Kenntnis nicht unverzüglich dem Gastwirt anzeigt. Überdies sind diese Ansprüche innerhalb von drei Jahren ab Kenntnis oder möglicher Kenntnis durch den Vertragspartner bzw. Gast gerichtlich geltend zu machen; sonst ist das Recht erloschen. </h6>

                                    <h4>13. Tierhaltung</h4>
                                    <h6>13.1 Tiere dürfen nur nach vorheriger Zustimmung des Gastwirtes und allenfalls gegen eine besondere Vergütung in den Bewirtungsbetrieb gebracht werden.</h6>
                                    <h6>13.2 Der Vertragspartner, der ein Tier mitnimmt, ist verpflichtet, dieses Tier während seines Aufenthaltes ordnungsgemäß zu verwahren bzw zu beaufsichtigen oder dieses auf seine Kosten durch geeignete Dritte verwahren bzw beaufsichtigen zu lassen.</h6>
                                    <h6>13.3 Der Vertragspartner bzw Gast, der ein Tier mitnimmt, hat über eine Versicherung, die auch mögliche durch Tiere verursachte Schäden deckt, zu verfügen. Der Nachweis der entsprechenden Versicherung ist über Aufforderung des Gastwirtes zu erbringen. </h6>
                                    <h6>13.4 Der Vertragspartner bzw sein Versicherer haften dem Gastwirt gegenüber zur ungeteilten Hand für den Schaden, den mitgebrachte Tiere anrichten. Der Schaden umfasst insbesondere auch jene Ersatzleistungen des Gastwirtes, die der Gastwirt gegenüber Dritten zu erbringen hat.</h6>

                                    <h4>14. Gutscheine</h4>
                                    <h6>Gutscheine jeglicher Art werden nicht in bar abgelöst. Der zeitliche Geltungsraum von Gutscheinen wird auf dem jeweiligen Gutschein festgeschrieben und definiert, wobei diese spätestens mit Ablauf einer Frist von 5 Jahren ab Ausstellungsdatum eingelöst oder umgetauscht werden müssen. Bei Verlust von Gutscheinen jeglicher Art wird vom Gastwirt kein Ersatz geleistet.</h6>
                                    
                                    <h4>15. Abänderung des Bewirtungsvertrages</h4>
                                    <h6>15.1  Der Vertragspartner hat keinen Anspruch darauf, dass die Art und das Ausmaß der Bewirtung abgeändert werden. Der Gastwirt kann Abänderungen des Bewirtungsvertrages zustimmen, wenn der Vertragspartner rechtzeitig seinen Wunsch auf Abänderung des Bewirtungsvertrages ankündigt. Den Gastwirt trifft dazu aber keine Verpflichtung.</h6>
                                    <h6>15.2 Der Gastwirt kann dem Vertragspartner bzw den Gästen eine andere Bewirtung (gleicher Qualität) zur Verfügung stellen, wenn dies dem Vertragspartner zumutbar ist, besonders wenn die Abweichung geringfügig und sachlich gerechtfertigt ist. Eine sachliche Rechtfertigung ist beispielsweise dann gegeben, wenn ein bestimmter Raum (bestimmte Räume) unbenutzbar geworden ist (sind), bereits anwesende Gäste ihren Aufenthalt verlängern, eine Überbuchung vorliegt oder sonstige wichtige betriebliche Maßnahmen diesen Schritt bedingen. Allfällige Mehraufwendungen für die Ersatzbewirtung gehen auf Kosten des Gastwirtes.</h6>

                                    <h4>16. Beendigung des Bewirtungsvertrages, vorzeitige Auflösung</h4>

                                    <h6>16.1  Erscheint der Vertragspartner bzw seine Gäste nicht, so ist der Gastwirt berechtigt, das vereinbarte Entgelt vorbehaltlich Punkt 16.3 zu verlangen. </h6>
                                    <h6>16.2 Der Gastwirt ist berechtigt, den Bewirtungsvertrag aus wichtigem Grund aufzulösen, insbesondere wenn der Vertragspartner bzw der Gast</h6>
                                    <h6>a) von den Räumlichkeiten einen erheblich nachteiligen Gebrauch macht oder durch sein rücksichtsloses, anstößiges oder sonst grob ungehöriges Verhalten den übrigen Gästen, dem Eigentümer oder dessen Leute verleidet oder sich gegenüber diesen Personen einer mit Strafe bedrohten Handlung gegen das Eigentum, die Sittlichkeit oder die körperliche Sicherheit schuldig macht;</h6>
                                    <h6>b) von einer ansteckenden Krankheit oder eine Krankheit, die über die Bewirtungsdauer hinausgeht, befallen wird oder sonst pflegedürftig wird;</h6>
                                    <h6>c) die vorgelegten Rechnungen bei Fälligkeit innerhalb einer zumutbar gesetzten Frist (3 Tage) nicht bezahlt. </h6>
                                    <h6>Bei Auflösung des Bewirtungsvertrages aus wichtigen Grund ist der Vertragspartner zur Bezahlung des Entgelts vorbehaltlich Punkt 16.3 verpflichtet.</h6>
                                    <h6>16.3 Der Gastwirt wird in Abzug bringen, was er sich infolge der Nichtinanspruchnahme seines Leistungsangebots erspart oder was er durch anderweitige Bewirtung erhalten hat. Eine Ersparnis liegt nur dann vor, wenn der Bewirtungsbetrieb im Zeitpunkt der Nichtinanspruchnahme der vom Gast bestellten Bewirtung vollständig ausgelastet ist und auf Grund des Nichterscheinens des Vertragspartners weitere Gäste bewirtet werden können. Die Beweislast für die Ersparnis trägt der Vertragspartner.</h6>
                                    <h6>16.4 Wenn die Vertragserfüllung durch ein als höhere Gewalt zu wertendes Ereignis (zB Elementarereignisse, Streik, Aussperrung, Lieferboykott, behördliche Verfügungen etc) unmöglich wird, kann der Gastwirt den Bewirtungsvertrag jederzeit auflösen, sofern der Vertrag nicht bereits nach dem Gesetz als aufgelöst gilt, oder der Gastwirt von seiner Bewirtungspflicht befreit ist. Etwaige Ansprüche auf Schadenersatz etc des Vertragspartners sind ausgeschlossen.</h6>

                                    <h4>17. Erfüllungsort, Gerichtsstand, Rechtswahl </h4>
                                    <h6>17.1 Erfüllungsort ist der Ort, an dem der Bewirtungsbetrieb gelegen ist.</h6>
                                    <h6>17.2 Dieser Vertrag unterliegt österreichischem formellen und materiellen Recht unter Ausschluss der Regeln des Internationalen Privatrechts (insbesondere IPRG und EVÜ) sowie UN-Kaufrecht.</h6>
                                    <h6>17.3 Ausschließlicher Gerichtsstand ist im zweiseitigen Unternehmergeschäft der Sitz des Gastwirtes, wobei der Gastwirt überdies berechtigt ist, seine Rechte auch bei jedem anderen örtlich und sachlich zuständigen Gericht geltend zu machen.</h6>
                                    <h6>17.4  Wurde der Bewirtungsvertrag mit einem Vertragspartner, der Verbraucher im Sinne des § 1 Konsumentenschutzgesetzes (KSchG) ist und seinen Wohnsitz bzw gewöhnlichen Aufenthalt in Österreich hat, geschlossen, können Klagen gegen den Verbraucher 9 ausschließlich am Wohnsitz, am gewöhnlichen Aufenthaltsort oder am Beschäftigungsort des Verbrauchers eingebracht werden. </h6>
                                    <h6>17.5 Wurde der Bewirtungsvertrag mit einem Vertragspartner, der Verbraucher ist und seinen Wohnsitz in einem Mitgliedsstaat der Europäischen Union (mit Ausnahme Österreichs), Island, Norwegen oder der Schweiz, hat, ist das für den Wohnsitz des Verbrauchers für Klagen gegen den Verbraucher örtlich und sachlich zuständige Gericht ausschließlich zuständig.</h6>

                                    <h4>18. Sonstiges</h4>
                                    <h6>18.1 Alle Änderungen des Bewirtungsvertrages bedürfen auf Seiten des Vertragspartners der Schriftform. </h6>
                                    <h6>18.2 Erklärungen müssen dem jeweils anderen Vertragspartner am letzten Tag der Frist (24 Uhr) zugegangen sein.</h6>
                                    <h6>18.3 Der Gastwirt ist berechtigt, gegen Forderungen des Vertragspartners mit eigenen Forderungen aufzurechnen. Der Vertragspartner ist nicht berechtigt, mit eigenen Forderungen gegen Forderungen des Gastwirtes aufzurechnen; dies gilt für Konsumenten im Sinne des § 1 Konsumentenschutzgesetzes dann nicht, wenn der Gastwirt zahlungsunfähig oder die Forderung des Vertragspartners gerichtlich festgestellt oder vom Gastwirt anerkannt ist. </h6>
                                    <h6>18.4 Im Falle von Regelungslücken gelten die entsprechenden gesetzlichen Bestimmungen.</h6>
                                    <h6>18.5 Sollten einzelne Punkte dieser AGB unwirksam oder undurchführbar sein oder nach Vertragsabschluss werden, so berührt dies die Gültigkeit und Wirksamkeit der übrigen Bestimmungen und der unter ihrer Zugrundelegung geschlossenen Verträge nicht.</h6>
                                    
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>