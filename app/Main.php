<?php

class Main
{
    // Protected property to store the database connection
    protected $conn = null;

    // Constructor method to establish a database connection
    public function __construct()
    {
        try {
            // Attempt to create a PDO database connection using constants for database configuration
            $this->conn = new PDO(DB_TYPE . ":host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);

            // Set PDO error mode to exception for better error handling
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // If connection fails, display an error message and exit
            echo '<h3>Database Not Connected</h3>', '<p>Please Check database connection before running this site ...</p>';
            exit;
        }
    }
}
?>