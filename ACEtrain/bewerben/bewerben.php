<!DOCTYPE html>


<html>

	<head>
		<meta charset="utf-8" />

		<title>Bewerben</title>

		<link rel="stylesheet" href="../stylesheet_3.css">

		<link rel="shortcut icon" type="image/x-ico" href="../icon.ico">


		<a href="../index.html" target="_self">
			<img src="../acetrain_bewerben.jpg" alt="Acetrain" width="1890" >
		</a>


	</head>

	<?php

	if(isset($_POST["Abschicken"])){
	  require("dbconnection.php");
	  $stmt = $conn->prepare("SELECT * FROM bewerben WHERE steamid = :id");// Steam-ID überprüfen
	  $stmt->bindParam(":id", $_POST["Steam-ID"]);
	  $stmt->execute();
	  $count = $stmt->rowCount();
	  if($count == 0){ //Steam-ID ist noch frei
	    $stmt = $conn->prepare("INSERT INTO Bewerben(vorname,ingamename, email, steamid,spieleralter, rang, beschreibung) VALUES (:name, :ingamename, :email, :steamid, :spieleralter, :rang, :beschreibung)");
	  $stmt->bindParam(":name", $_POST["Vorname"]);
	    $stmt->bindParam(":ingamename", $_POST["Ingame-Name"]);
	    $stmt->bindParam(":email", $_POST["Email"]);
	    $stmt->bindParam(":steamid", $_POST["Steam-ID"]);
	    $stmt->bindParam(":spieleralter", $_POST["Alter"]);
	    $stmt->bindParam(":rang", $_POST["Rang"]);
	    $stmt->bindParam(":beschreibung", $_POST["über dich"]);
	    $stmt->execute();


	    echo "Vielen Dank für deine Bewerbung! ";
	  } else{
	    echo "Steam-ID ist bereits vergeben";
	  }
	}

	 ?>


	<body>



		<nav>

			<ul><a href="../bewerben/bewerben.php">Bewerben</a></ul>
			<ul><a href="../teams/teams.html">Teams</a></ul>
			<ul><a href="../turniere/turniere.html">Turniere</a></ul>

		</nav>

		<p>Dir gefällt unser Clan und du willst dich bewerben?</p>
		<hr>
		<h2>Das solltest du mitbringen</h2>

		<ul>
			<li>Freundliches Verhalten</li>
			<li>Spaß am spielen</li>
			<li>Mindestens den Rang MGE</li>
			<li>Kein VAC Ausschluss</li>
			<li>Mindestens 16 Jahre</li>
			<li>Teamspeak (+Headset & Mikro)</li>
			<li>Aktiv genutzer Steam Account</li>
		</ul>
		<hr>
		<P><i>Du erfüllst diese Kriterien?</i></p>

		<h2>Bewerben</h2>


		<form action="bewerben.php" method="post">

			<p><label>Vorname: <input type="text" name="Vorname"></label></p>
			<p><label>Ingame-Name: <input name="Ingame-Name" size="20"></label></p>
			<p><label>
			E-Mail: <input type="email" name="Email"
			placeholder="mail@example.com">
			</label></p>
			<p><label>Steam-ID: <input type="text" name="Steam-ID"></label></p>
			<p><label>Alter: <input type="text" name="Alter"></label></p>
			<p><label>Rang: <input list="ränge"
			name="Rang">
			<datalist id="ränge">
			<option value="MGE">
			<option value="DMG">
			<option value="LE">
			<option value="LEM">
			<option value="Supreme">
			<option value="Global">
			</datalist>
			</label></p>

			<p><textarea name="über dich" placeholder="Über dich"></textarea></p>


			<button type="submit" name="Abschicken">Senden</button>
			</form>


	</body>



</html>
