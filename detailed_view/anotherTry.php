<?php
require("DB.php");

require("fetch.php");
require ("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<h1>Live Search</h1>

<form action = "anotherTry.php" method = "POST">
<input type = "text" name="name" placeholder = "Otsi siit..."
id = "searchBox">
</form>

<ul id="dataViewer">
    <li>Nimi</li>
    <li>URL</li>
    <li>Platvorm</li>
</ul>
</body>
</html>