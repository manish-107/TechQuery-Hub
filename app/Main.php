<?php
class Main
{
    protected $conn = null;
    public function __construct()
    {
        try {
            $this->conn = new PDO(DB_TYPE . ":host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo '<h3>Database Not Connected</h3>', '<p>Please Check database connection before running this site ...</p>';
            exit;
        }
    }
}