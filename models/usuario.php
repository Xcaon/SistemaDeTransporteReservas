<?php

require_once 'config/db.php';

class usuario {

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }


}

?>
