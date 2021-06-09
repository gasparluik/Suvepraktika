<?php
require("config.php");

function showResults($input){
    global $conn;

    if( isset($_POST["input"])){
        $input = $_POST["input"];

        $sql= "SELECT (Name, URL, Platform) FROM App WHERE Name LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->execute([
            "%" . $_POST["input"] . "%",
            "%" . $_POST["input"] . "%",
        ]);

        $results = $stmt->fetch();

        print_r($results);


    }

}
