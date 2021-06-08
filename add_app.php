<?php


//home.php sisesed muutujad
$inputerror ="";

//fnc_add funkstioonid
$submit = addApplication($appName, $contact, $platform, $client, $url, $version, $serverAddress, $serverPlace, $commentInput);
$comment = readComment(); //loeb kommentaare

//Funktsiooni sees kasutatavad POST muutujad
$appName = $_POST["appName"];
$contact = $_POST["contact"];
$client = $_POST["client"];
$url = $_POST["url"];
$version = $_POST["version"];
$serverAddress = $_POST["serverAddress"];
$serverPlace = $_POST["serverPlace"];
$commentInput = $_POST["commentInput"];
$platform = $_POST["platform"];

require ("header.php"); //basic html algus utf estiga jne
require ("fnc_add.php"); // basic post funktsioon

//Kontrolli, et salvestamisel, ei oleks nõutud välja tühjad
if(isset($_POST["submitApp"])){
	if(empty($appName or $contact or $client or $url or $serverAddress or $serverPlace)){
		$inputerror .= "Väli on tühi!";
	}
	echo $inputerror;
}


//php lõpp
?> 
  <h1>Monitory rakenduse lisamine</h1>

  <hr>
  
  <form method="POST">
	<label for="name">Nimetus</label>
	<input type="text" name="appName" id="appName" placeholder="Nimetus" required>
	<br>
	<label for="contact">Vastutav isik</label>
	<input type="text" name="contact" id="contact" placeholder = "Kes vastutab?" required>
	<br>
	<label for="client">Klient</label>
	<input type="text" name="client" id="client" placeholder="Lavastaja nimi" required>
	<br>
	<p>Platvorm</p><input type="text" name="platform" id="platform" placeholder="Platvorm.." required>
	<p>URL</p><input type="text" name="url" id="url" value="url" required> <!peaks muutma type text to link? >
	<br>
	<p>Versioon/p><input type="text" name="version" id="version" placeholder="Versioon">
	<br>
	<p>Serveri aadress</p><input type="text" name="serverAddress" id="serverAddress" placeholder="Serveri aadress" required>
	<br>
	<p>Serveri asukoht</p><input type="text" name="serverPlace" id="serverPlace" placeholder="Serveri asukoht" required>
	<br>
	<textarea rows="10" cols="80" name="commentInput" id="commentInput" placeholder="Kommentaarid....."><?php echo $comment; ?></textarea>

	<input type="submit" name="submitApp" value="Lisa rakendus">
  </form>
  <p><?php echo $inputerror; ?></p>


</body>
</html>