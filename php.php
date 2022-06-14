<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#18181b" />
    <link rel="icon" href="/favicon.ico" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="prism/prism.css" />

    <title>PHP</title>
</head>

<body>
    <header>
        <div class="nav-content">
            <h1 class="no-margin">
                Web-Dev 1
                <time class="datum">14. Juni 2022</time>
            </h1>
            <a href="/" title="Startseite">
                <img src="/icons/house-solid.svg" alt="Home">
            </a>
        </div>
        <progress id="scoll-progress" value="0" max="100"></progress>
    </header>
    <main id="main">
        <section id="top">
            <h1>PHP</h1>
            <h2>Datentypen</h2>
            <dl>
                <df>Boolean</df>
                <dd>
                    Als <code class="red">false</code> interpretiert wird: <code>0; 0.0; ""; "0"; null</code>. Andere Werte werden als <code class="green">true</code> erkannt.
                </dd>

                <df>Zahlen</df>
                <dd>Bereichsüberschreitung bei Integer führen automatisch zu <code class="blue">float</code>. Die Überprüfung auf Gleichheit von Gleitkommazahlen wird von Rundungsfehlern beeinflusst.</dd>

                <df>String</df>
                <dd>Einfache, Doppelte ~Anführungszeichen + Heredoc, Nowdoc
                    Numerische Zeichenketten werden bedarfsweise autom. konvertiert</dd>

                <df>Arrays</df>
                <dd>
                    Als geordnete Map gespeichert: <code>Array(2) => [1] a, ["zwei"] b</code>
                    <p class="block"><code>array[1] = a</code>; <code>array["zwei"] = b</code></p>
                </dd>

                <df>Objekte</df>
                <dd>Objekte werden aus Klassen mittels <code>new</code> erzeugt.</dd>

                <df>Weitere</df>
                <dd><code class="violett">NULL</code>, Ressourcen, Iterables, Callables/-backs, Type declaration</dd>

            </dl>

            <h1>Beispiele</h1>
            <br>
            <div class="block">
                <?php
                function hello($nr)
                {
                    echo "Hello " . $nr . ". World! \n";
                }
                hello(1);

                $hello2 = hello(2);

                echo "<h3><code>var_dump()</code></h3>";
                var_dump("0");
                var_dump("0" + 0);
                var_dump(intval("12345ABCDE"));
                var_dump(intval("123454321"));

                $someVar = "Moin";
                var_dump(($someVar));
                $someNum = 69;
                var_dump(($someNum));
                $bool = false;
                var_dump(($bool));


                echo "<h3><code>print()</code></h3>";
                print "$someVar da drüben";
                print "This\tis\ta\ttext!";

                echo "<h3><code>gettype()</code></h3>";
                echo $someVar . " : " . gettype($someVar);
                echo $someNum . " : " . gettype($someNum);

                echo "<h3><code>is_[type]()</code></h3>";
                echo is_float($someVar); #false: keine Ausgabe; true: 1

                echo is_bool($bool);
                echo is_bool(true);
                echo is_bool(boolval(0));


                echo "<h3><code>echo</code></h3>";
                echo <<<Irgendwas
                Hier kann Text
                beliebig reingeschrieben werden!
                Eigentlich müsste dieser Text
                auch wie in der PHP-Datei formatiert werden.
                Wird er aber nicht!
                Hier können auch Varialen ($someVar, $someNum) verwendet werden.
                Irgendwas;

                echo <<<'NOW'
                Backslash Escapes werden nun nicht übersetzt
                \t bleibt \\t
                Variablen werden auch nicht ersetzt: $someNum
                NOW;


                echo "<h3><code>Array</code></h3>";
                $feld = [1, 2, 3, 4, 5];
                var_dump($feld);
                
                $feld[10] = "zehn";
                var_dump($feld);
                echo count($feld);

                for($i = 0; $i < count($feld); $i++) {
                    echo "[$i]: $feld[$i]\n";
                    #"zehn" fehlt, feld[5] = nix
                }

                $feld["elf"] = 11;
                var_dump($feld);

                foreach ($feld as $index => $item) {
                    echo "[$index]: $item\n";
                }
                unset($feld);       #feld wird gelöscht und kann neu deklatiert werden
                var_dump($feld);

                $feld2 = Array(1 => "eins", 2 => "zwei");
                #ein Array ohne index 0
                var_dump($feld2);
                $feld2[] = "drei";
                var_dump($feld2);

                $feld[10] = 100;
                var_dump($feld);

                print_r(array_keys($feld2));    #liefert Array mit den keys des anderen Arrays

                echo in_array("drei", $feld2);  #bei true -> 1
                echo in_array("vier", $feld2);  #bei true -> 1
                echo key_exists(0, $feld2);     #keine ausgabe, weil false

                echo isset($feld2[1]);          #gleich funktion wie:
                echo is_array($feld2) && array_key_exists(1, $feld2);

                ?>
            </div>
        </section>
    </main>
</body>
<script src="index.js"></script>
<script src="prism/prism.js"></script>

</html>