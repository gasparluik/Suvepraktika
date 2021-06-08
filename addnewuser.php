<?php
  require("../../config.php");
  require("fnc_user.php");
  require("fnc_common.php");
  
  //kui klikiti nuppu, siis kontrollime ja salvestame
  $firstname= "";
  $lastname = "";
  $username = "";
  $status = "";
    
  $firstnameerror = "";
  $lastnameerror = "";
  $usernameerror = "";
  $passworderror = "";
  $confirmpassworderror = "";
  $statuserror = "";
    
  $notice = "";
  
  if(isset($_POST["submituserdata"])){
	  
	  if (!empty($_POST["firstnameinput"])){
		$firstname = test_input($_POST["firstnameinput"]);
	  } else {
		  $firstnameerror = "Palun sisesta eesnimi!";
	  }
	  
	  if (!empty($_POST["lastnameinput"])){
		$lastname = test_input($_POST["lastnameinput"]);
	  } else {
		  $lastnameerror = "Palun sisesta perekonnanimi!";
	  }
	  }
	  
	  
	  if (!empty($_POST["emailinput"])){
		$username = test_input($_POST["emailinput"]);
	  } else {
		  $usernameerror = "Palun sisesta e-postiaadress!";
	  }
	  
	  if (empty($_POST["passwordinput"])){
		$passworderror = "Palun sisesta salasõna!";
	  } else {
		  if(strlen($_POST["passwordinput"]) < 8){
			  $passworderror = "Liiga lühike salasõna (sisestasite ainult " .strlen($_POST["passwordinput"]) ." märki).";
		  }
	  }
	  
	  if (empty($_POST["confirmpasswordinput"])){
		$confirmpassworderror = "Palun sisestage salasõna kaks korda!";  
	  } else {
		  if($_POST["confirmpasswordinput"] != $_POST["passwordinput"]){
			  $confirmpassworderror = "Sisestatud salasõnad ei olnud ühesugused!";
		  }
	  }
	  
	  if(empty($firstnameerror) and empty($lastnameerror) and empty($usernameerror) and empty($passworderror) and empty($confirmpassworderror)){
		// $result = signup($firstname, $lastname, $username, $_POST["passwordinput"]);
		$result = signup($username, $_POST["passwordinput"], $firstname, $lastname);
		//$notice = "Kõik korras!";
		if($result == "ok"){
		$firstname= "";
		$lastname = "";
		$username = "";
		$notice = "Kasutajakonto loomine õnnestus";
		}else{
			$notice = "Kahjuks tekkis tehniline viga" .$result;
		}
	  }

	  if(isset($_POST["statusinput"])){
		$status = intval($_POST["statusinput"]);
		//$gender = $_POST["genderinput"];
	  } else {
		  $statuserror = "Palun märgi sugu!";
	  }
?>

  <h1>Uue kasutajakonto loomine</h1>
    
  <ul>
    <li><a href="users.php">Avalehele</a></li>
  </ul>
  <hr>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <label for="emailinput">E-mail (kasutajatunnus):</label><br>
	  <input type="email" name="emailinput" id="emailinput" value="<?php echo $username; ?>"><span><?php echo $usernameerror; ?></span>
	  <br>
      <label for="passwordinput">Salasõna (min 8 tähemärki):</label>
	  <br>
	  <input name="passwordinput" id="passwordinput" type="password"><span><?php echo $passworderror; ?></span>
	  <br>
	  <label for="confirmpasswordinput">Korrake salasõna:</label>
	  <br>
	  <input name="confirmpasswordinput" id="confirmpasswordinput" type="password"><span><?php echo $confirmpassworderror; ?></span>
	  <br>
      <label for="firstnameinput">Eesnimi:</label>
	  <br>
	  <input name="firstnameinput" id="firstnameinput" type="text" value="<?php echo $firstname; ?>"><span><?php echo $firstnameerror; ?></span>
	  <br>
      <label for="lastnameinput">Perekonnanimi:</label><br>
	  <input name="lastnameinput" id="lastnameinput" type="text" value="<?php echo $lastname; ?>"><span><?php echo $lastnameerror; ?></span>
	  <br>
	  <input type="radio" name="statusinput" id="statusadmininput" value="2" <?php if($status == "2"){		echo " checked";} ?>><label for="statusadmininput">Administraator</label>
	  <input type="radio" name="statusinput" id="statusreginput" value="1" <?php if($gender == "1"){		echo " checked";} ?>><label for="statusreginput">Tavakasutaja</label>
	  <br>
      <input name="submituserdata" type="submit" value="Loo kasutaja"><span><?php echo "&nbsp; &nbsp; &nbsp;" .$notice; ?></span>
	</form>
  
</body>
</html>