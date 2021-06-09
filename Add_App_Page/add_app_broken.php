<?php
//require ("fnc_add.php"); // basic post funktsioon



$inputerror = "";
//kui klikiti submit, siis ...
if(isset($_POST["submitApp"])){
  if(empty($_POST["appName"]) or empty($_POST["contact"]) or empty($_POST["url"]) or empty($_POST["serverPlace"])){
	$inputerror .= "Osa infot on sisestamata! ";
  } else {
	$appName = $_POST["appName"];
	$contact = $_POST["contact"];
	$client = $_POST["client"];
	$url = $_POST["url"];
	$version = $_POST["version"];
	$serverAddress = $_POST["serverAddress"];
	$serverPlace = $_POST["serverPlace"];
	$commentInput = $_POST["commentInput"];
	$platform = $_POST["platform"];

	//addApplication($_POST["appName"], $_POST["platform"], $_POST["contact"], $_POST["client"], $_POST["url"], $_POST["version"], $_POST["serverAddress"], $_POST["serverPlace"], $_POST["commentInput"]);
	 $database = 'if20_gaspar_l_1u';
	 $serverhost = 'localhost';
	 $serverusername = 'if20';
	 $serverpassword = 'if20';
	 $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);

	//$conn = new mysqli($GLOBALS["serverhost"], $serverusername, $serverpassword, $database); //connection to mySql

	 $notice = null;
	 if ($conn->connection_error){
		 die("Connection failed to database:" . $conn->connection_error);
	 }
	 $stmt = $conn->prepare("INSERT INTO App (Name, Platform, URL, Server_address, Server_place, Contact, Version, Comments, Client) VALUES()");
	 echo $conn->error;
	 $stmt->bind_param("sssssssss", $appName, $platform, $url, $serverAddress, $serverPlace, $contact, $version, $commentInput, $client);
	 $stmt->execute();
	 if($stmt->execute()){
		 $notice = "kõik on ok";
	 } else {
	 	$notice = $stmt->error;
	 }

	 $stmt->close();
	 $conn->close();
	 return $notice;
	//addApplication lõppeb
   }
}

/*
//home.php sisesed muutujad
$inputerror ="";
//Funktsiooni sees kasutatavad POST muutujad



//fnc_add funkstioonid
$comment = readComment(); //loeb kommentaare
*/

/*
//Kontrolli, et salvestamisel, ei oleks nõutud välja tühjad
if(isset($_POST["submitApp"])){
	if(empty($appName or $contact or $client or $url or $serverAddress or $serverPlace)){
		$inputerror .= "Väli on tühi!";
	} else{
		addApplication($_POST["appName"],$_POST["platform"], $_POST["contact"], $_POST["client"], $_POST["url"],$_POST["version"], $_POST["serverAddress"],$_POST["serverPlace"],$_POST["commentInput"]);
	}
}

require ("header.php"); //basic html algus utf estiga jne */
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
	<input type="text" name="client" id="client" placeholder="Kliendi nimi" required>
	<br>
	<p>Platvorm</p><input type="text" name="platform" id="platform" placeholder="Platvorm.." required>
	<p>URL</p><input type="text" name="url" id="url" placeholder = "sisesta url" required> <!peaks muutma type text to link? >
	<br>
	<p>Versioon</p><input type="text" name="version" id="version" placeholder="Versioon">
	<br>
	<p>Serveri aadress</p><input type="text" name="serverAddress" id="serverAddress" placeholder="Serveri aadress" required>
	<br>
	<p>Serveri asukoht</p><input type="text" name="serverPlace" id="serverPlace" placeholder="Serveri asukoht" required>
	<br>
	<textarea rows="10" cols="80" name="commentInput" id="commentInput" placeholder="Kommentaarid....."></textarea>
	<br>
	<input type="submit" name="submitApp" value="Lisa rakendus">
  </form>
  <p><?php
  echo $inputerror;
  //echo $submit = addApplication($_POST["appName"],$_POST["platform"], $_POST["contact"], $_POST["client"], $_POST["url"],$_POST["version"], $_POST["serverAddress"],$_POST["serverPlace"],$_POST["commentInput"]);
  ?></p>


</body>
</html>