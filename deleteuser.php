<?php
    require("../../config.php");
    require("fnc_common.php");

    $database = "if20_lisanne";

    function userData(){
        $notice = null;
        $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
        $stmt = $conn->prepare("SELECT * FROM user");
        $stmt->bind_result($idfromfb, $username, $password, $firstname, $lastname);
        $stmt->execute();

        $userhtml = "";

        while($stmt->fetch()){
            $userhtml .= "<p> E-mail: " .$username ."</p>";
            $userhtml .= "<p> Eesnimi: " .$firstname ."</p>";
            $userhtml .= "<p> Perekonnanimi:" .$lastname ."</p>";
        }

        $stmt->close();
        $conn->close();
        return $userhtml;
    }
?>

    <hr>
    <?php echo userData(); ?>
    <hr>
</body>
</html>