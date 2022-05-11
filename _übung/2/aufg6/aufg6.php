<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="cit116" />
    <meta name="description" content="Übung 2 Aufgabe 6" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/favicon.ico" />
    <link rel="stylesheet" href="aufg4.css" />
    <title>Ü2/6</title>
</head>

<body>

    <header>
        <h1>Web-Dev 1: Ü2/6</h1>
        <a id="home" href="/" title="Startseite">
            <img src="/icons/house-solid.svg" alt="Home">
        </a>
    </header>
    <main>
        <section>
            <?php
            $fp = fopen("person.txt", "a+");
            if (!$fp) {
                die(`<p class="error">Fehler: Kann Datei nicht schreiben</p>`);
            }

            #foreach ($_GET as $key => $value) {
            #    fputs($fp, "$key: $value\n");
            #}
            #fputs($fp, "================\n");

            $contact = array();

            while (!feof($fp)) {
                $array = unserialize(fgets($fp));
                if (is_array($array)) {
                    $contact[] = $array;
                }
            }

            if (!empty($_GET)) {
                fputs($fp, serialize($_GET) . "\n");
                $contact[] = $_GET;
            }

            if (!empty($contact)) {
                echo "<select>\n";
                foreach ($contact as $key => $value) {
                    echo "<option>", $value['vorname'], "</option>";
                }
                echo "</select>\n";
            }

            fputs($fp, serialize($_GET) . "\n");


            fclose($fp);
            ?>
            <form>
                <label for="vorname">Vorname</label>
                <input type="text" name="vorname" />

                <label for="nachname">Nachname</label>
                <input type="text" name="nachname" />

                <label for="alter">Alter</label>
                <input type="text" name="alter" />

                <label for="geschlecht">Geschlecht</label>
                <input type="text" name="geschlecht" />

                <label for="straße">Straße</label>
                <input type="text" name="straße" />

                <label for="ort">Ort</label>
                <input type="text" name="ort" />

                <label for="plz">Postleitzahl</label>
                <input type="text" name="plz" />

                <div class="btns">
                    <button id="import" type="button" onclick="openFile()">
                        importieren
                    </button>
                    <button id="ok" type="submit">OK</button>
                    <button id="no" type="reset">
                        Abbrechen
                    </button>
                </div>
            </form>
            <div id="output-container">
                <div id="output-box">
                    <div id="close-output">
                        <button type="button" onclick="closeOutput()">
                            ✖
                        </button>
                    </div>
                    <dl id="output"></dl>
                    <button id="export" type="button" onclick="exportFile()">
                        exportieren
                    </button>
                </div>
            </div>
        </section>
    </main>
    <script src="aufg4.js"></script>
</body>

</html>