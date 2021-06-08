<?php
    require("../../config.php");
    require("fnc_user.php");
    require("fnc_common.php");
?>
    <p id="create"><a href="addnewuser.php">Lisa uus kasutaja</a>!</p>
    <p id="create"><a href="indeks.php">Kustuta kasutaja</a>!</p>
    <hr>
    <?php echo userData(); ?>
    <hr>
</body>
</html>