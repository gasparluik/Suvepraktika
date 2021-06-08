<?php
require("config.php");

$output = '';
$sql = "SELECT * FROM App WHERE Name LIKE '%".$_POST['search']."%'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
    $output .= '<h4 align = "center">Search Result</h4>';
    $output .= '<div class = "table-responsive">
                    <table class = "table table bordered">
                    <tr>
                        <th>name</th>
                        <th>platform</th>
                        <th>url</th>
                        <th>server_address</th>
                        <th>server_place</th>
                        <th>contact</th>
                        <th>version</th>
                        <th>comments</th>
                        <th>client</th>
                        <th>date</th>
                    </tr>';
    while($row = mysqli_fetch_array($result)){
        $output .= '
            <tr>
                <td>'.$row["name"].'</td>
                <td>'.$row["platform"].'</td>
                <td>'.$row["url"].'</td>
                <td>'.$row["server_address"].'</td>
                <td>'.$row["server_place"].'</td>
                <td>'.$row["contact"].'</td>
                <td>'.$row["version"].'</td>
                <td>'.$row["comments"].'</td>
                <td>'.$row["client"].'</td>
                <td>'.$row["date"].'</td>
            </tr>';
    }
    echo $output; //näita tulemusi

} else {
    echo "Data missing";
};

?>
