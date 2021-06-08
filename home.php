<!DOCTYPE html>
<?php
	require_once 'session.php';
	require 'class.php';
?>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1"/>
		<title>Monitory</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css" />
	</head>
<body>

	<div class = "row">
		<div class = "col-md-4">
		</div>
		<div class = "col-md-4 well">
			<h4 class = "text-danger">Monitory</h4>
			<hr style = "border-top:1px dotted #000;"/>
			<h3>Welcome:</h3>
			<?php
				$user_id = $_SESSION['user_id'];
				$conn = new db_class();
				$user = $conn->user_account($user_id);
				echo '<center><h4 class = "text-success">'.$user['firstname'].' '.$user['lastname'].'</h4></center>';
			?>
			<a href = "logout.php" >Logout</a>
		</div>
	</div>
</body>
</html>