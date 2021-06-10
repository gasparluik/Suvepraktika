<?php
require("config.php");


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Rakenduse otsing</title>
        <link rel="stylesheet" href="searchCSS.php">
        <script type = "text/javascript">
        //script goes here

        function active(){
            var searchBar = document.getElementById('searchBar');

            if(searchBar.value != null){


            }
        }

        function inactive(){
            var searchBar = document.getElementById('searchBar');

            if(searchBar.value != null){


            }
        }
        </script>
    </head>
    <body>
        <form action="search.php" method = "post"> 
            <input type = "text" id="searchBar" placeholder="Otsi rakendust..." maxlength="25" autocomplete="off" onmousedown="active();" onblur="">
            <input type="submit" id="submit" value="Otsi">
        </form>
    
    </body>

</html>