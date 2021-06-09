<?php
require("config.php"); //Attempt MySQL server connection.
global $conn;
$inputresult = $_POST[".result"];

if($conn === false){ //check connection
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM App WHERE Name LIKE ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["Name"] . "</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}

//submit nupu vajutusel kuvab kõik tulemused
function searchFunction(){
    global $conn;
    global $inputresult;

    if (isset($_POST["submitSearch"])){


        $sql = "SELECT (Name, Platform, URL) FROM APP WHERE Name = '$inputresult'";
        $stmt = mysqli_prepare($conn, $sql);
        echo $conn->error;

        if($stmt->execute()){
            $result = mysqli_query($conn, $sql);

            echo "<table>
            <tr>
            <th>Nimi</th>
            <thPlatvorm</th>
            <th>URL</th>
            </table>";
            
            while( $row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Platform'] . "</td>";
                echo "<td>" . $row['URL'] . "</td>";
                echo "</tr>";

                echo "</table>";
                mysqli_close($conn);
            }

        }
        $stmt->close();
    }
}
 
// close connection
mysqli_close($conn);
?>