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
		<title>Ü2/4</title>
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
					echo "<figure id='bierflasche'>
					<img src='images/bier.png' alt='bierflasche' />
					<figcaption>Bierflasche</figcaption>
				</figure>";

				foreach(scandir("images") as $image) {
					if ($item[0] == ".") continue;
					echo "$item\n";
					$name = print_r(preq_split("/\./", $item));
					$name = ucfirst($name[0]);
					echo "$name\n";

					echo '<figure id="bierglas">
					<img src="images/'.$item.'" alt="'.$name.'" />
					<figcaption>'.$name.'</figcaption>
				</figure>';

				}
				?>
				
				<figure id="bierglas">
					<img src="images/bierglas.png" alt="bierglas" />
					<figcaption>Bierglas</figcaption>
				</figure>
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
			Icons erstellt von <a href="freepik.com">Freepik</a> von
			<a href="flaticon.com">Flaticon</a>.
		</footer>

		<script src="aufg4.js"></script>
	</body>
</html>
