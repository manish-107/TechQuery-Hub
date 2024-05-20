<?php

class Admin
{
	// Define a protected property to store the database connection
	protected $conn = null;

	// Define a protected property to store the admin ID
	protected $id;

	// Constructor method
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

	// Method to perform Create, Update, Delete operations
	public function cud($res, $message)
	{
		try {
			// Prepare and execute the provided SQL query
			$stmt = $this->conn->prepare($res);
			$stmt->execute();

			// Set a success message in the session
			$_SESSION['success_message'] = "Successfully " . $message;
			return true;
		} catch (PDOException $e) {
			// If an exception occurs, catch it and handle it gracefully
			echo $e->getMessage(); // Print the error message (consider logging instead of echoing)
			$_SESSION['error_message'] = "Sorry still not " . $message; // Set an error message in the session
			return false;
		}
	}

	// Method to retrieve data from the database
	public function ret($stmt)
	{
		// Prepare and execute the provided SQL statement
		$stmt = $this->conn->prepare($stmt);
		$stmt->execute();
		return $stmt; // Return the executed statement
	}
}
?>