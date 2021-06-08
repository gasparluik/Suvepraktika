<?php
    $database = "if20_lisanne";

    function userData(){
        $notice = null;
        $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
        $stmt = $conn->prepare("SELECT * FROM user");
        $stmt->bind_result($idfromfb, $username, $password, $firstname, $lastname, $status);
        $stmt->execute();

        $userhtml = "";

        while($stmt->fetch()){
            $userhtml .= "<table><tr><th>PILT/IKOON VMS</th><th>ANDMED</th></tr>";
            $userhtml .= "<tr><td></td><td>E-mail: " .$username ." <br> Nimi: " .$firstname ." " .$lastname ."</td><td><a href='changeuser.php'><div>Muuda andmeid</div></a></td></tr></table>";
            // $userhtml .= "<p> E-mail: " .$username ."</p>";
            // $userhtml .= "<p> Eesnimi: " .$firstname ."</p>";
            // $userhtml .= "<p> Perekonnanimi:" .$lastname ."</p>";
            
        }

        $stmt->close();
        $conn->close();
        return $userhtml;
    }

    function signup($username, $password, $firstname, $lastname, $status){
        $notice = null;
        $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
        $stmt = $conn->prepare("INSERT INTO user (username, password, firstname, lastname, status) VALUES(?,?,?,?,?)");
        echo $conn->error;
        $stmt->bind_param("ssssi", $username, $password, $firstname, $lastname, $status);

        if($stmt->execute()){
            $notice = "ok";
        } else {
            $notice = $stmt->error;
        }
        
        $stmt->close();
        $conn->close();
        return $notice;
    }
?>