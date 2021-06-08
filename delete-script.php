<?php
require("config.php");
require("common.php");
if (isset($_POST['deleteBtn'])){
    $userids = $_POST['recordsCheckBox'];
    $common = new Common();
    foreach ( $userids as $id ) {
        $delete = $common->deleteRecordById($connection,$id);
    }
    if ($delete) {
        echo '<script>alert("Record deleted successfully !")</script>';
        echo '<script>window.location.href="indeks.php";</script>';
    }
}