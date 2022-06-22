<!DOCTYPE html>
<html lang="en">

    <?php include 'header.html';?>

<body>
    <header>
        <h1>
            Web-Dev 1: Ü3/3
        </h1>
        <a href="/" title="Startseite">
            <img src="/icons/house-solid.svg" alt="Home">
        </a>
    </header>
    <main>

        <h1>Deutsche Bahn</h1>
        <h2>Bahnhöfe in <?=$_REQUEST['management'] ?></h2>
        

            <?php
            #phpinfo();
            if(!isset($_REQUEST['bm'])) {
                die("gabutt");
            }

            $bm = $_REQUEST['bm'];

            include("db.php");

            $query = "SELECT BfNr, Station, Strasse, PLZ, Ort, Traeger.Traeger  FROM `Bahnhof` JOIN `Traeger` ON Bahnhof.Traeger = Traeger.id WHERE BM = $bm ORDER BY Station";
            $result = mysqli_query($db, $query);

            $treffer = $result->num_rows;

            echo "<p>$treffer Ergebnisse:</p>";
            echo "<ol>";
            while ($data = mysqli_fetch_array($result)) {
                echo <<<TEXT
                    <li value="{$data['BfNr']}">
                        <details>
                            <summary>{$data['Station']}</summary>
                            <dl>
                                <df>BhfNr</df>
                                <dd><code>{$data['BfNr']}</code></dd>

                                <df>Adresse</df>
                                <dd><code>{$data['Strasse']}, {$data['PLZ']} {$data['Ort']}</code></dd>

                                <df>Träger</df>
                                <dd><code><marquee>{$data['Traeger']}</marquee></code></dd>
                            </dl>
                      </details>
                    
                    </li>\n
                TEXT;
            }
            echo "</ol>";


            mysqli_close($db);

            ?>
    </main>
</body>

</html>