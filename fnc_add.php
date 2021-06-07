
<?php
//POST submittimise funktsioon String ja Int väärtustele
require ("config.php");
$database = "if20_gaspar_l_1u";

function addApplication($appName, $contact, $client, $url, $version, $serverAddress, $serverPlace){
    if(isset($_POST["saveApp"])){
        $conn = new mysqli($serverhost, $username, $password, $database);
        $stmt = $conn->prepare("INSERT INTO App(Name, Platform, URL, Server_address, Server_place, Contact, Version, Client) VALUES(?,?,?,?,?,?,?,?)");
        echo $conn->error;

        $stmt->bind_param("ssssssss",$appName, $contact, $client, $url, $version, $serverAddress, $serverPlace );
        $stmt->execute();
        $stmt->close();
        $conn->close();

    }
}



// function postStringData($input, $where){ // global funktsioon, et submittida ükskõik mida
//     $notice = null; //teade
    
//     if (isset($_POST[$input])){
//         $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
//         // valmistan ete sql käsu
//         $stmt = $conn->prepare("INSERT INTO $where($input) VALUES (?)");
//         echo $conn->error;

//         $stmt->bind_param("ss", $where, $input);

//         if($stmt->execute()){
//             $notice = "data submitted";
//         } else{
//             $notice = $stmt->error;
//         }

//         $stmt->close();
//         $conn->close();
//         return $notice;
//     }


?>