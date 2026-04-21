<?php
require_once '../config/Database.php';

abstract class Model {
    protected $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }
}
