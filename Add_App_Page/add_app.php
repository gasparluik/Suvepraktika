<?php
require("config.php"); //andmebaasi andmed

$conn = mysqli_connect($serverhost, $serverusername, $serverpassword, $database); // ühendust andmebaasiga

if( isset($_POST['submitApp'])){ //kui vajutatakse submiti...
    if(!empty($_POST['name']) && !empty($_POST['contact']) && !empty($_POST['url']) && !empty($_POST['platform']) && !empty($_POST['client']) &&!empty($_POST['serverAddress']) &&!empty($_POST['serverPlace'])){
        $name = $_POST["name"];
        $contact = $_POST["contact"];
        $client = $_POST["client"];
        $url = $_POST["url"];
        $version = $_POST["version"];
        $serverAddress = $_POST["serverAddress"];
        $serverPlace = $_POST["serverPlace"];
        $comment = $_POST["comment"];
        $platform = $_POST["platform"];

        $query = "INSERT INTO App (Name, Platform, URL, Server_address, Server_place, Contact, Version, Comments, Client) VALUES('$name', '$platform', '$url', '$serverAddress', '$serverPlace', '$contact', '$version', '$comment', '$client')"; //lause andmete sisestamiseksz
        $run = mysqli_query($conn, $query) or die (mysqli_error($conn)); //lisa andmed andmebaasi

        if($run){
            echo "Data submitted successfully";
        } else{
            echo "and error occurred";
        }
    } else{
        echo "all fields are required!";
    }
}

require("header.php");
?> 
  <form method="POST">
	<label for="name">Nimetus</label>
	<input type="text" name="name" id="name" placeholder="Nimetus" required>
	<br>
	<label for="contact">Vastutav isik</label>
	<input type="text" name="contact" id="contact" placeholder = "Kes vastutab?" required>
	<br>
	<label for="client">Klient</label>
	<input type="text" name="client" id="client" placeholder="Kliendi nimi" required>
	<br>
    <label for="platform">Platvorm</label>
	<input type="text" name="platform" id="platform" placeholder="Platvorm.." required>
    <br>
    <label for="url">URL</label>
	<input type="text" name="url" id="url" placeholder = "example.ee" required>
	<br>
    <label for="version">Versioon</label>
    <input type="text" name="version" id="version" placeholder="Versioon">
	<br>
    <label for="serverAddress">Serveri aadress</label>
    <input type="text" name="serverAddress" id="serverAddress" placeholder="Serveri aadress" required>
	<br>
    <label for="serverPlace">Serveri asukoht</label>
    <input type="text" name="serverPlace" id="serverPlace" placeholder="Serveri asukoht" required>
	<br>
    <label for="comment">Kommentaarid</label>
	<textarea rows="10" cols="80" name="comment" id="comment" placeholder="Kommentaarid....."></textarea>
	<br>
	<input type="submit" name="submitApp" value="Lisa rakendus">
  </form>
</div>
</body>
</html>