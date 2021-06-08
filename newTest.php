<?php
$database = "if20_gaspar_l_1u";
$serverhost = "localhost";
$serverusername = "if20";
$serverpassword = "if20";

$conn = mysqli_connect($serverhost, $serverusername, $serverpassword, $database);

if( isset($_POST['submitApp'])){
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

        $query = "INSERT INTO App (Name, Platform, URL, Server_address, Server_place, Contact, Version, Comments, Client) VALUES('$name', '$platform', '$url', '$serverAddress', '$serverPlace', '$contact', '$version', '$comment', '$client')";
        $run = mysqli_query($conn, $query) or die (mysqli_error($conn));

        if($run){
            echo "Data submitted successfully";
        } else{
            echo "and error occurred";
        }
    } else{
        echo "all fields are required!";
    }
}


?> 
  <h1>Monitory rakenduse lisamine</h1>

  <hr>
  
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
	<p>Platvorm</p><input type="text" name="platform" id="platform" placeholder="Platvorm.." required>
	<p>URL</p><input type="text" name="url" id="url" placeholder = "sisesta url" required> <!peaks muutma type text to link? >
	<br>
	<p>Versioon</p><input type="text" name="version" id="version" placeholder="Versioon">
	<br>
	<p>Serveri aadress</p><input type="text" name="serverAddress" id="serverAddress" placeholder="Serveri aadress" required>
	<br>
	<p>Serveri asukoht</p><input type="text" name="serverPlace" id="serverPlace" placeholder="Serveri asukoht" required>
	<br>
	<textarea rows="10" cols="80" name="comment" id="comment" placeholder="Kommentaarid....."></textarea>
	<br>
	<input type="submit" name="submitApp" value="Lisa rakendus">
  </form>
  <p><?php
  echo $inputerror;
  //echo $submit = addApplication($_POST["name"],$_POST["platform"], $_POST["contact"], $_POST["client"], $_POST["url"],$_POST["version"], $_POST["serverAddress"],$_POST["serverPlace"],$_POST["comment"]);
  ?></p>


</body>
</html>