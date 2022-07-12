<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="author" content="cit116" />
	<meta name="description" content="Ü2/1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="/favicon.ico" />
	<link rel="stylesheet" href="../übung2.css" />
	<title>Ü2/5</title>
</head>

<body id="aufg4">
	<header>
		<h1>Web-Dev 1: Ü2/4</h1>
		<a href="/" title="Startseite">
			<img src="/icons/house-solid.svg" alt="Home" />
		</a>
	</header>
	<main>
		<div id="images" title="Bilder">
			<?php

			$images = scandir("./images");
			//! Pfad anpassen und testen mit print_r($images);
			//xampp: $images = scandir("./_übung/2/aufg5/images");

			foreach ($images as $image) {
				if ($image[0] == ".") continue;

				$name = explode(".", $image);
				$name = ucfirst($name[0]);

				echo '
				<figure id="' . $name . '">
					<img src="images/' . $image . '" alt="' . $name . '" />
					<figcaption>' . $name . '</figcaption>
				</figure>';
			}

			?>
		</div>

		<div id="container">
			<div id="food" title="Essen & Trinken">
				<fieldset>
					<legend>Essen & Trinken</legend>
				</fieldset>
			</div>
			<div id="vehicle" title="Fortbewegung">
				<fieldset>
					<legend>Fortbewegung</legend>
				</fieldset>
			</div>
			<div id="music" title="Instrument">
				<fieldset>
					<legend>Instrument</legend>
				</fieldset>
			</div>
		</div>
	</main>
	<footer>
		Icons erstellt von <a href="freepik.com">Freepik</a> auf
		<a href="flaticon.com">Flaticon</a>.
	</footer>

	<script src="aufg5.js"></script>
</body>

</html>