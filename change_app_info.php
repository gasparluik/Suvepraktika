<?php

    require("../../config.php");
    $database = "if20_liisa_mi_1";

    $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
    $stmt = $conn->prepare("SELECT app_id, appl_name, app_url, url_change, app_platform, app_actual_address, app_tech_contact, app_in_server, app_version, 
    app_client, app_comment FROM app_info");

    echo $conn->error;
    $stmt->bind_result($idfromdb, $namefromdb, $urlfromdb, $changetimefromdb, $platformfromdb, $addressfromdb, $contactfromdb, $serverfromdb, $versionfromdb, 
    $clientfromdb, $commentfromdb);
    $stmt->execute();
    $apphtml = "\t <ol> \n ";
    while($stmt->fetch()){
        $apphtml .= "<ul> \n";
        $apphtml .= "<li>URL: " .$urlfromdb ."</li> \n";
        $apphtml .= "<li>Platvorm: " .$platformfromdb ."</li> \n";
        $apphtml .= "<li>Serveri tegelik aadress: " .$addressfromdb ."</li> \n";
        $apphtml .= "<li>Tehniline kontakt: " .$contactfromdb ."</li> \n";
        $apphtml .= "<li>Asukoht serveris: " .$serverfromdb ."</li> \n";
        $apphtml .= "<li>Rakenduse versioon: " .$versionfromdb ."</li> \n";
        $apphtml .= "<li>Tellija: " .$clientfromdb ."</li> \n";
        $apphtml .= "<li>Kommentaar: " .$commentfromdb ."</li> \n";
        $apphtml .= "</ul> \n";
    }
    $apphtml .= "\t </ol> \n";

    if(isset($_POST['urlsubmit']))
    {
        $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
        $url = $_POST['urlinput'];
        $change = date('Y-m-d H:i:s');

        $query = "UPDATE `app_info` SET `app_url` = '".$url."' WHERE `app_id` = '".$idfromdb."'";
        $timequery = "UPDATE `app_info` SET `url_change` = '".$change."' WHERE `app_id` = '".$idfromdb."'";

        $result = mysqli_query($conn, $query);
        $timeresult = mysqli_query($conn, $timequery);

        $stmt->close();
        $conn->close();
    }

    if(isset($_POST['platformsubmit']))
    {
        $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
        $platform = $_POST['platforminput'];

        $query = "UPDATE `app_info` SET `app_platform` = '".$platform."' WHERE `app_id` = '".$idfromdb."'";

        $result = mysqli_query($conn, $query);

        $stmt->close();
        $conn->close();
    }

    if(isset($_POST['addresssubmit']))
    {
        $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
        $address = $_POST['addressinput'];

        $query = "UPDATE `app_info` SET `app_actual_address` = '".$address."' WHERE `app_id` = '".$idfromdb."'";

        $result = mysqli_query($conn, $query);

        $stmt->close();
        $conn->close();
    }

    if(isset($_POST['contactsubmit']))
    {
        $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
        $contact = $_POST['contactinput'];

        $query = "UPDATE `app_info` SET `app_tech_contact` = '".$contact."' WHERE `app_id` = '".$idfromdb."'";

        $result = mysqli_query($conn, $query);

        $stmt->close();
        $conn->close();
    }

    if(isset($_POST['serversubmit']))
    {
        $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
        $server = $_POST['serverinput'];

        $query = "UPDATE `app_info` SET `app_in_server` = '".$server."' WHERE `app_id` = '".$idfromdb."'";

        $result = mysqli_query($conn, $query);

        $stmt->close();
        $conn->close();
    }

    if(isset($_POST['versionsubmit']))
    {
        $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
        $version = $_POST['versioninput'];

        $query = "UPDATE `app_info` SET `app_version` = '".$version."' WHERE `app_id` = '".$idfromdb."'";

        $result = mysqli_query($conn, $query);

        $stmt->close();
        $conn->close();
    }

    if(isset($_POST['clientsubmit']))
    {
        $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
        $client = $_POST['clientinput'];

        $query = "UPDATE `app_info` SET `app_client` = '".$client."' WHERE `app_id` = '".$idfromdb."'";

        $result = mysqli_query($conn, $query);

        $stmt->close();
        $conn->close();
    }

    if(isset($_POST['commentsubmit']))
    {
        $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
        $comment = $_POST['commentinput'];

        $query = "UPDATE `app_info` SET `app_comment` = '".$comment."' WHERE `app_id` = '".$idfromdb."'";

        $result = mysqli_query($conn, $query);

        $stmt->close();
        $conn->close();
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="app_info.css">
<body>
    <br>
    <div id="logoimage">
        <image src="logotest.png" alt="logo" height="100px" width="320px">
    </div>
    <br>
    <div id="container"> 
        <div id="container_one"></div>
        <div id="container_two">
            <div id="content">
            <h2><?php echo $namefromdb?></h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="urlinput">URL: </label>
                <input type="text" name="urlinput" id="urlinput" placeholder="<?php echo $urlfromdb ?>">
                <input type="submit" name="urlsubmit" value="✓">
            </form>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="platforminput">Platvorm: </label>
                <input type="text" name="platforminput" id="platforminput" placeholder="<?php echo $platformfromdb?>">
                <input type="submit" name="platformsubmit" value="✓">
            </form>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="addressinput">Serveri tegelik aadress: </label>
                <input type="text" name="addressinput" id="addressinput" placeholder="<?php echo $addressfromdb?>">
                <input type="submit" name="addresssubmit" value="✓">
            </form>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="contactinput">Tehniline kontakt: </label>
                <input type="text" name="contactinput" id="contactinput" placeholder="<?php echo $contactfromdb?>">
                <input type="submit" name="contactsubmit" value="✓">
            </form>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="serverinput">Asukoht serveris: </label>
                <input type="text" name="serverinput" id="serverinput" placeholder="<?php echo $serverfromdb?>">
                <input type="submit" name="serversubmit" value="✓">
            </form>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="versioninput">Rakenduse versioon: </label>
                <input type="text" name="versioninput" id="versioninput" placeholder="<?php echo $versionfromdb?>">
                <input type="submit" name="versionsubmit" value="✓">
            </form>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="clientinput">Tellija: </label>
                <input type="text" name="clientinput" id="clientinput" placeholder="<?php echo $clientfromdb?>">
                <input type="submit" name="clientsubmit" value="✓">
            </form>
            <div id="comment">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="commentinput">Kommentaar: </label>
                <textarea type="text" name="commentinput" id="clientinput" placeholder="<?php echo $commentfromdb?>"></textarea>
                <input type="submit" name="commentsubmit" value="✓">
            </form>
            </div>
	        <ul><button><a href="app_info.php">Salvesta</a></button></ul>
            </div>
        </div>
    </div>
</body>
