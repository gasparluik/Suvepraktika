<?php

class Database{

    public function connect(){
        $this->connection = mysqli_connect();
    }

    public function _destruct(){
        mysqli_close($this->connection);
    }

    public function query($query){
        return mysqli_query($query, $this->connection);
    }

}

$database = new Database;
