<?php
require("DB.php");

require("newFetch.php");
require("config.php");
//require ("header.php");
?>
<body>
<h1>Live Search</h1>

    <form action = "anotherTry.php" method = "POST">
        <input type = "text" name="input" placeholder = "Otsi siit..." id = "input">
        <input type= "submit" value="search"
    </form>

    <?php
    if (isset($_POST["search"])){
        if(count($results)< 0){
            foreach ($results as $r){
                printf("<div>%s %s</div>", $r['Name'], $r['URL'], $r['Platform']);
            }
        } else{
            echo "No Data found";
        }
    }
    ?>
</body>
</html>