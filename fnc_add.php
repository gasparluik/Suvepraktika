
<?php
//POST submittimise funktsioon String ja Int väärtustele
$database = "if20_gaspar_lu_1";


function postStringData($input, $where, $values){ // global funktsioon, et submittida ükskõik mida

    $values = $values * "?,"; 
    $notice = null; //teade
    
    if (isset($_POST[$input])){
        $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
        // valmistan ete sql käsu
        $stmt = $conn->prepare("INSERT INTO $where($input) VALUES ($values)");
        echo $conn->error;

        $stmt->bind_param("ssi", $where, $input, $values);

        if($stmt->execute()){
            $notice = "data submitted";
        } else{
            $notice = $stmt->error;
        }

        $stmt->close();
        $conn->close();
        return $notice;
    }

    function postIntData($input, $where, $values){ // Integer väärtuste submittimine

        $values = $values * "?,"; 
        $notice = null; //teade
        
        if (isset($_POST[$input])){
            $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
            // valmistan ete sql käsu
            $stmt = $conn->prepare("INSERT INTO $where($input) VALUES ($values)");
            echo $conn->error;
    
            $stmt->bind_param("sii", $where, $input, $values);
    
            if($stmt->execute()){
                $notice = "data submitted";
            } else{
                $notice = $stmt->error;
            }
    
            $stmt->close();
            $conn->close();
            return $notice;
        }
    }

}
?>