<?php
require ("header.php"); //basic html algus utf estiga jne
require ("fnc_add.php"); // basic post funktsioon

postStringData($_POST["name"], "App", 3);
postStringData($_POST["contact"], "App", 3);
postStringData($_POST["client"], "App", 3);
postStringData($_POST["url"], "App", 3)


//php lõpp
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
	<input type="text" name="client" id="client" placeholder="Lavastaja nimi" required>
	<br>
	<label for="url">URL</label>
	<input type="text" name="url" id="url" value="url" required> <!peaks muutma type text to link? >
	<br>
	<label for="version">Versioon</label>
	<input type="char" name="version" id="version" placeholder="Versioon">
	<br>
	<label for="serverAddress">Rakenduse serveri aadress</label>
	<input type="text" name="serverAdress" id="serverAddress" placeholder="Serveri aadress" required>
	<br>

	<input type="submit" name="save" value="Lisa rakendus">
  </form>
</body>
</html>