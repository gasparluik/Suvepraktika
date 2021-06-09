<?php
require("config.php");

function showResults($searchBox){
    global $conn;

    if( isset($_POST["searchBox"])){
        $searchBox = $_POST["searchBox"];

        $sql= "SELECT (Name, URL, Platform) FROM App WHERE Name LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->execute([
            "%" . $_POST["searchBox"] . "%",
            "%" . $_POST["searchBox"] . "%",
        ]);

        $results = $stmt->fetch();

        print_r($results);


    }

}
