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
    $obj = unserialize(fgets($fp));
    if (is_object($obj)) {
        $contact[] = $obj;
    }
}

$input = fopen("php://input", "r");
$json = fgets($input);
$eingabeobj = json_decode($json);


$id = 0;
$eingabeform = &$_POST; #&$ ist eine Referenz
$auswahlform = &$_GET;

if (array_key_exists("id", $auswahlform)) {
    $id = $auswahlform["id"];
}
if ($eingabeobj != null && property_exists($eingabeobj, "contact_id")) {
    $contact_id = $eingabeobj->contact_id;
    unset($eingabeobj->contact_id);

    if (array_key_exists($contact_id, $contact)) {
        #Person steht auf der Liste
        $contact[$contact_id] = $eingabeobj;

        ftruncate($fp, 0);
        foreach ($contact as $person) {
            fputs($fp, serialize($person) . "\n");
        }
        $id = $contact_id;
    } else {
        fputs($fp, serialize($eingabeobj) . "\n");
        $contact[] = $eingabeobj;
        $id = count($contact) - 1;
    }

    die("<h4>Speichern erfolgreich</h4>");
}

fclose($fp);
?>


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="cit116" />
    <meta name="description" content="Übung 2 Aufgabe 6" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/favicon.ico" />
    <link rel="stylesheet" href="aufg8.css" />
    <title>Ü2/6</title>
</head>

<body>

    <header>
        <h1>Web-Dev 1: Ü2/62</h1>
        <a id="home" href="/" title="Startseite">
            <img src="/icons/house-solid.svg" alt="Home">
        </a>
    </header>
    <main>
        <section>
            <?php

            #count: damit beim neuladen durch die auswahl einer person kein neuer eintrag angelegt wird
            #if (!empty($_GET) && count($_GET) > 1) {
            #    fputs($fp, serialize($_GET) . "\n");
            #    $contact[] = $_GET;
            #}

            if (!empty($contact)) {
                echo "<form>
                <select name='id' onchange=''>\n";
                foreach ($contact as $key => $value) {
                    echo "<option value='$key'", ($key == $id ? 'selected="selected"' : ''), ">", $value->vorname, "</option>";
                }
                echo "<option value='-1'", (-1 == $id ? 'selected="selected"' : ''), ">Neuer Eintrag</option>\n";
                echo "</select>
                </form>\n";
            }

            ?>
            <form id="daten" method="post">
                <?php
                $vorname = $nachname = $alter = $geschlecht = $straße = $plz = $ort = "";
                $contact_id = $id;
                #@ unterdrückt Warnungen
                if (array_key_exists($id, $contact)) {

                    foreach ($contact[$id] as $key => $value) {
                        #$$ der variablennamen wird durch ihren wert ersetzt. die variable heißt dann nicht $key sondern $vorname
                        #$key = "vorname" => $$key = $vorname
                        $$key = $value;
                    }
                }

                ?>
                <input type="hidden" name="contact_id" value=<?= $contact_id ?> />

                <label for="vorname">Vorname</label>
                <input type="text" name="vorname" value="<?= $vorname ?>" />

                <label for="nachname">Nachname</label>
                <input type="text" name="nachname" value="<?= $nachname ?>" />

                <label for="alter">Alter</label>
                <input type="text" name="alter" value="<?= $alter ?>" />

                <label for="geschlecht">Geschlecht</label>
                <input type="text" name="geschlecht" value="<?= $geschlecht ?>" />

                <label for="straße">Straße</label>
                <input type="text" name="straße" value="<?= $straße ?>" />

                <label for="ort">Ort</label>
                <input type="text" name="ort" value="<?= $ort ?>" />

                <label for="plz">Postleitzahl</label>
                <input type="text" name="plz" value="<?= $plz ?>" />

                <div class="btns">
                    <button id="ok" type="button" onclick="sendInput(this.form)">OK</button>
                    <button id="no" type="reset">
                        Abbrechen
                    </button>
                </div>
            </form>
        </section>
    </main>
    <script src="aufg8.js"></script>
    <script type="text/javascript">
        function sendInput(form) {
            let data = {};
            for (const input of form) {
                if (input.name !== "") data[input.name] = input.value;
            }
            console.table(data);
            let string = JSON.stringify(data);

            const request = new XMLHttpRequest();
            request.open("POST", "<?= $_SERVER['PHP_SELF'] ?>");
            request.setRequestHeader("Content-Type", "application/json");
            request.send(string);
        }
    </script>
</body>

</html>