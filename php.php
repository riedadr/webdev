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
				<a href="/"> Web-Dev 1 </a>
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
			<h1>PHP <time class="datum">14. Juni 2022</time></h1>
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

				for ($i = 0; $i < count($feld); $i++) {
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

				$feld2 = array(1 => "eins", 2 => "zwei");
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
		<section>
			<h1>Testat 3 <time class="datum">21. Juni 2022</time></h1>
			<p>14 algorithmische Aufgaben auf PROCON. Verbindung über Hochschulnetz (VPN).</p>
			<p>Volle Punktzahl gibt es nur beim ersten Versuch.</p>
			<p>OBACHT: Bei Aufgabe 1 gibt es anscheinend Probleme mit dem Trennzeichen für explode, z.B. beim Leerzeichen.</p>
			<p>Bestenfalls gleiche PHP-Version (7.0.7) wie der Server verwenden.</p>
			<p>Sollte bis nach der WebDev-Prüfung erledigt sein.</p>
		</section>
		<section>
			<h1>PHP (Teil 2) <time class="datum">21. Juni 2022</time></h1>
			<p>In Shell mit <code>$php -a</code></p>
			<pre class="block"><code class="language-php">$a = ["Apfel", "Birne"];
print_r($a);            #Array
print_r((object) $a);   #stdClass
$obj = (object) null;
$obj->name = "Fred";
print_r($obj);
unset($obj);
print_r($obj);          #undefined variable $obj

$obj = new stdclass();
print_r($obj);</code></pre>
			<h2>Variablen</h2>
			<p>vordefiniert:</p>
			<ul>
				<li>GLOBALS,</li>
				<li>_SERVER, _GET, _POST, _FILES, _REQUEST (Kombination aus $_POST und $_GET),</li>
				<li>_SESSION, _ENV, _COOKIE (ermöglicht das Verfolgen einer Sitzung über mehrere Webseiten)</li>
				<li>php_errormsg, http_response_header, argc, argv</li>
			</ul>

			<p>GLOBALS</p>
			<pre class="block"><code class="language-php">
                <?php print_r($GLOBALS) ?>
            </code></pre>

			<p>_SERVER</p>
			<pre class="block"><code class="language-php">
                <?php print_r($_SERVER) ?>
            </code></pre>

			<p>$argv für Übergabeparameter</p>
			<pre class="block"><code class="language-php">file.php:
    &lt;?php
        print_r($argv);
    ?&gt;
                
> php file.php Apfel Birne Traube
    Array
    (
        [0] => Apfel
        [1] => Birne
        [2] => Traube
    )
                </code></pre>

			<p>stdin zum Einlesen fon Text als Alternative zu $argv (?)</p>
			<pre class="block"><code class="language-php">&lt;?php
    print_r($argv);

    
    $stdin = fopen("php://stdin", "r");
    $a; $b; $c;

    fcanf($stdin, "%s %s %s\n", $a, $b, $c);
    echo "$a $b $c";
    fclose($stdin);
?&gt;

> php file.php Apfel Birne Traube
    Apfel Birne Traube
                </code></pre>

			<p>define() für Konstanten</p>
			<pre class="block"><code class="language-php">&lt;?php
    define("SYMBOL", 69);
    echo "SYMBOL = " . SYMBOL;
    <?php
	define("SYMBOL", 69);
	echo "  #SYMBOL = " . SYMBOL . "\n";
	?>
    SYMBOL = 404;          #err: expr is not writable
?&gt;</code></pre>


			<p>Referenzen</p>
			<pre class="block"><code class="language-php">&lt;?php
    $a = 100;
    $b = $a;
    $a++;

    echo "$a, $b";
    <?php
	$a = 100;
	$b = $a;
	$a++;
	echo "  #$a, $b \n";
	?>

    $a = 100;
    $b = &$a;       #b ist eine Referenz (&) auf a
    $a++;

    echo "$a, $b";
    <?php
	$a = 200;
	$b = &$a;
	$a++;
	echo "  #$a, $b \n";
	?>
?&gt;</code></pre>

			<p>Funktionen mit Referenzen (bringt Geschwindigkeit bei Datenverarbeitung)</p>
			<pre class="block"><code class="language-php">&lt;?php
    function addOne(Int &$a): Int {
        # Durch die Referenz ändert sich der Wert beim Aufrufer
        $a++;

        /* 
         * Der Entwickler kann php (optional) dazu veranlassen, 
         * Datentypen bei Über- und Rückgabe zu überprüfen.
         * Ergebnis: Im Zweifelsfall wird das Skript beendet.
        */

        return $a;      #steht hier nur zum Testen von ": Int"
    }

    $a = intval("300km");       #$a = 300 geht auch
    addOne($a);
    echo "a = $a";
    <?php
	function addOne(Int &$a): Int
	{
		$a++;
		return $a;
	}

	$a = intval("300km");
	addOne($a);
	echo "  #a = $a\n";
	?>
?&gt;</code></pre>


		</section>
		<section>
			<h1>PHP (Teil 3) <time class="datum">28. Juni 2022</time></h1>
			<pre class="block"><code class="language-php">&lt;?php
    function increment(Int &$value) {
        $value++;
    }

    $a = 100;
    increment($a);
    print_r($a);
    <?php
	function increment(Int &$value)
	{
		$value++;
	}

	$a = 100;
	increment($a);
	echo "  #";
	print_r($a);
	?>

?&gt;</code></pre>
			<p>Eine Funktion ist erst aufrufbar, wenn der Interpreter ihre Definition verarbeitet hat. Die Funktion kann also erst nach ihrer Definition aufgerufen werden.</p>
			<p>Name als Variable</p>
			<pre class="block"><code class="language-php">&lt;?php
    $vd = "var_dump";
    if (function_exists($vd)) {
        $vd($vd);
    }
    <?php
	$vd = "var_dump";
	if (function_exists($vd)) {
		echo "  #";
		$vd($vd);
	}
	?>
?&gt;</code></pre>
			<p>weitere Paras auffangen</p>
			<pre class="block"><code class="language-php">&lt;?php
    function increment_rest(Int &$value, ...$rest)
    {
        $value++;
        print_r($rest);
    }

    $a = 100;
    increment_rest($a, $a, 2, 3, 4);
    echo "  #";
    print_r($a);

    <?php
	function increment_rest(Int &$value, ...$rest)
	{
		$value++;
		echo "  #\$rest: \n";
		print_r($rest);
	}

	$a = 100;
	increment_rest($a, $a, 2, 3, 4);
	echo "      #\$a = ";
	print_r($a);
	?>

?&gt;</code></pre>
			<p>Anonyme Funktionen</p>
			<pre class="block"><code class="language-php">&lt;?php
    $anon = function (Int &$value = -1): bool {
        $value++;
        echo"   #$value";
        return true;
    };

    $anon();

    $x = 10;
    $anon($x);
    <?php
	$anon = function (Int &$value = -1): bool {
		$value++;
		echo "\n		#$value";
		return true;
	};

	$anon();

	$x = 10;
	$anon($x);
	?>

?&gt;</code></pre>
			<p>Lambda</p>
			<pre class="block"><code class="language-php">&lt;?php
    $x = 1234;
    $value = 100;

    $func = fn() : int => $value = $value + $x;

    echo $func();
    echo $value;
    <?php
	$x = 1234;
	$value = 100;

	$func = fn (): int => $value = $value + $x;

	echo "\n		#\$func(): " . $func();
	echo "\n		#\$value = $value";
	?>

?&gt;</code></pre>
			<p><code class="language-php">use()</code></p>
			<pre class="block"><code class="language-php">&lt;?php
	$x404 = 404;

	$func2 = function(int &$value = -1) use($x404) : int {
		return $value = $value + $x404;
	};

	$x404 = 69;
	$a = 100;

	echo $func2($a);
	echo $a;
	echo $x404;
    <?php
	$x404 = 404;

	$func2 = function (int &$value = -1) use ($x404): int {
		return $value = $value + $x404;
	};

	$x404 = 69;
	$a = 100;

	echo "\n		#" . $func2($a);
	echo "\n		#" . $a;
	echo "\n		#" . $x404;
	?>

?&gt;</code></pre>

			<p><code class="language-php">new</code> erzeugt immer Referenzen.</p>
			<pre class="block"><code class="language-php">&lt;?php
	class K {
		public int $value;	#public <type> $name

		function __construct() {
			$this->value = 100;		#OBACHT: $this ist immer nötig
		}

		function __destruct() {		#gibt den Speicher mit unset() frei
			echo "RIP";
		}
	}

	$k = new K;
	print_r($k);
	unset($k);

	/* Ausgabe:
    <?php
	class K
	{
		public int $value;	#public <type> $name

		function __construct()
		{
			$this->value = 100;		#OBACHT: $this ist immer nötig
		}

		function __destruct()
		{		#gibt den Speicher mit unset() frei
			echo "RIP";
		}
	}

	$k = new K;
	echo "\n";
	print_r($k);
	unset($k);
	?>
	*/

?&gt;</code></pre>
		</section>


		<section>
			<h1>PHP (Teil 4) <time class="datum">5. Juli 2022</time></h1>
			<h2>Klassenobjekte</h2>
			<p>Wandel über Zeit: Von stiefmütterlichen "Vorhandensein" zu einem funktionierenden Konzept. Starke Ähnlichkeiten mit Java.</p>

			<p><code class="language-php">__construct()</code> zum Erstellen, <code class="language-php">__destruct()</code> zum Zerstören (ähnlich Garbage-Collector)</p>

			<pre class="block"><code class="language-php">&lt;?php
	class Basis
	{
		private $name;	#public | private | var
		static $count_objects = 0;		#zählt, wie viele Objekte der Klasse erzeugt wurden

		function __construct($name = "Objektname")	#default-name: "Objektname"
		{
			$name_with_counter = $name . ++Basis::$count_objects;	#Zugriff auf statische Variable
			$this->name = $name_with_counter;	#$this ist hier notwendig
		}

		function __destruct()
		{
			Basis::$count_objects--;	#Objekt-Zähler wird heruntergesetzt
			echo "Objekt gelöscht: " . Basis::$count_objects;
		}
	}

	

	for ($i = 0; $i < 5; $i++) {
		$obj = new Basis("Josef");
		print_r($obj);
	}


/* Ausgabe:
	<?php
	class Basis
	{
		protected $name;	#public | private | var
		static $count_objects = 0;		#zählt, wie viele Objekte der Klasse erzeugt wurden
		const PI = 3.1415;				#ähnlich define()

		function __construct($name = "Objektname")	#default-name: "Objektname"
		{
			$name_with_counter = $name . ++Basis::$count_objects;	#Zugriff auf statische Variable
			$this->name = $name_with_counter;	#$this ist hier notwendig
		}

		function __destruct()
		{
			Basis::$count_objects--;	#Objekt-Zähler wird heruntergesetzt
			print("-- Objekt gelöscht: $this->name; counter: " . Basis::$count_objects . "\n");
		}

		function whoAmI()
		{
			return "Basis";
		}
	}



	for ($i = 0; $i < 5; $i++) {
		$obj = new Basis("Josef");
		print_r($obj);
	}

	unset($obj);
	?>
*/
?&gt;</code></pre>

			<p>Interface</p>
			<pre class="block"><code class="language-php">&lt;?php
	interface C {
		function print();
	}

	$doC = function (C $c) {
		$c->print();
	};
	<?php
	interface C
	{
		function print();
	}

	$doC = function (C $c) {
		$c->print();
	};
	?>

?&gt;</code></pre>


			<p>Vererbung</p>
			<pre class="block"><code class="language-php">&lt;?php
	class B extends Basis implements C
	{
		static $count_objects = 0;

		function __construct()
		{
			parent::__construct();
			self::$count_objects++;
		}

		function print()
		{
			echo "\nprint(): " . $this->whoAmI() . "\n";
			var_dump($this);
		}

		function whoAmI()
		{
			return "B";
		}
	}

	<?php
	class B extends Basis implements C
	{
		static $count_objects = 0;

		function __construct()
		{
			parent::__construct();
			self::$count_objects++;
		}

		function print()
		{
			echo "\nprint(): " . $this->whoAmI() . "\n";
			var_dump($this);
		}

		function whoAmI()
		{
			return "B";
		}
	}

	$doC(new B);
	?>
?&gt;</code></pre>

			<p>Traits</p>
			<pre class="block"><code class="language-php">&lt;?php
	trait CopyPaste
	{
		private $es = "Es";

		function sagEs()
		{
			echo "$this->es\n";
		}
	}
	<?php
	trait CopyPaste
	{
		private $es = "Es";

		function sagEs()
		{
			echo "$this->es\n";
		}
	}
	?>
?&gt;</code></pre>

			<p>Abstrakte Klassen <small class="orange">OBACHT: <code class="language-php">give_number()</code> funktioniert hier iwie nicht</small></p>
			<pre class="block"><code class="language-php">&lt;?php
	abstract class AB
	{
		use CopyPaste;

		protected $number = -1;

		abstract function give_number(): Int;

		final function setNumber($number)
		{
			$this->number = $number;
		}
	}

	class RealAB extends AB
	{
		function give_number(): Int
		{
			return 100 * parent::$number;
		}
	}

	$realAB = new RealAB();
	echo "Number von RealAB: $realAB->give_number()";
	echo "$realAB->sagEs"

	<?php
	abstract class AB
	{
		use CopyPaste;

		protected $number = -1;

		abstract function give_number(): Int;

		final function setNumber($number)
		{
			$this->number = $number;
		}
	}

	class RealAB extends AB
	{
		function give_number(): Int
		{
			return 100 * parent::$number;
		}
	}

	$realAB = new RealAB();
	echo "Number von RealAB: $realAB->give_number()";
	echo "$realAB->sagEs"
	?>

?&gt;</code></pre>

			<p>Exceptions</p>
			<pre class="block"><code class="language-php">&lt;?php
	function werfen()
	{
		throw new Exception("Ausnahme geworfen");
	}

	try {
		werfen();
	} catch (Exception $e) {
		print_r($e);
	} catch (Error $err) {
		echo "Hoppala!";
	}

	#Ausgabe: 
	<?php
	function werfen()
	{
		throw new Exception("Ausnahme geworfen");
	}

	try {
		werfen();
	} catch (Exception $e) {
		print_r($e);
	} catch (Error $err) {
		echo "Hoppala!";
	}

	?>
?&gt;</code></pre>

			<p><code class="language-php">_exists()</code></p>
			<pre class="block"><code class="language-php">&lt;?php
	if (interface_exists('C')) {
		echo "Interface existiert";
	}

	<?php
	if (interface_exists('C')) {
		echo "#Interface existiert";
	}
	?>

?&gt;</code></pre>

		</section>
	</main>
</body>
<script src="index.js"></script>
<script src="prism/prism.js"></script>

</html>