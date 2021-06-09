<?php
require("DB.php");

require("newFetch.php");
//require ("header.php");
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

<?php
if (isset($_POST["searchBox"])){
    if(count($results)< 0){
        foreach ($results as $r){
            printf("<div>%s %s</div>", $r['Name'], $r['URL'], $r['Platform']);
        }
    } else{
        echo "No Data found";
    }
}
?>

<ul id="dataViewer">
    <li>Nimi</li>
    <li>URL</li>
    <li>Platvorm</li>
</ul>
</body>
</html>