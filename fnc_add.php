
<?php
//POST submittimise funktsioon String ja Int väärtustele
require ("config.php");
$database = "if20_gaspar_l_1u";
$conn = new mysqli($GLOBALS["serverhost"], $username, $password, $database); //connection to mySql


//lisa rakendus
function addApplication($appName, $contact, $client, $url, $version, $serverAddress, $serverPlace){
    $date = date('Y-m-d H:i:s'); // timestamp
    if(isset($_POST["submitApp"])){
        $conn = new mysqli('serverhost', 'serverusername', 'serverpassword', 'database'); //connection to mySql
        $stmt = $conn->prepare("INSERT INTO App(Name, Platform, URL, Server_address, Server_place, Contact, Version, Client, Date) VALUES(?,?,?,?,?,?,?,?)");
        echo $conn->error;

        $stmt->bind_param("ssssssssi",$appName, $contact, $client, $url, $version, $serverAddress, $serverPlace, $date);
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