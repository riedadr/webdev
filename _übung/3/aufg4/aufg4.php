<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../übung3.css">
    <title>Aufgabe 3.3</title>
</head>

<body>
    <header>
        <h1>
            Web-Dev 1: Ü3/4
        </h1>
        <a href="/" title="Startseite">
            <img src="/icons/house-solid.svg" alt="Home">
        </a>
    </header>
    <main>
        <h1>Deutsche Bahn</h1>
        <h2>Kategorien</h2>

        <div id="kat-container">

            <?php
            $kat = 1;

            if (isset($_GET["kat"]))
                $kat = $_GET["kat"];



            include("db.php");

            $query = "SELECT KatVst FROM `Bahnhof` GROUP BY KatVst";
            $result = mysqli_query($db, $query);

            #print_r(mysqli_fetch_all($result));
            while ($row = mysqli_fetch_object($result)) {
                echo "<form><button " . ($kat == $row->KatVst ? "class='pressed'" : "") . " name='kat' value='$row->KatVst'>$row->KatVst</button></form>\n";
            }
            ?>
        </div>
        <section>
            <ol>

                <?php
                $query = "SELECT BfNr, Station, Strasse, PLZ, Ort, Laenge, Breite FROM `Bahnhof` WHERE KatVst = $kat ORDER BY Station";
                $result = mysqli_query($db, $query);

                while ($row = mysqli_fetch_object($result)) {
                    #print_r($row);
                    echo <<< ITEM
                        <li value="$row->BfNr">
                            <a target="_blank" href="https://google.de/maps/place/$row->Strasse, $row->PLZ $row->Ort">$row->Station</a>
                            
                            <a target="_blank" href="https://öpnvkarte.de/#$row->Laenge;$row->Breite;16">ÖPNV</a>
                        </li>
                    ITEM;
                }
            ?>
            </ol>
        </section>
    </main>
</body>

</html>