<?php
// require("config.php")
class Common{
    public function getAllRecords($connection) {
        $query = "SELECT * FROM user";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }
    public function deleteRecordById($connection,$id) {
        $query = "DELETE FROM user WHERE user_id='$id'";
        $result = $connection->query($query) or die("Error in query".$connection->error);
        return $result;
    }
}
?>