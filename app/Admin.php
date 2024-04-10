<?php

class Admin extends Main
{
	protected $id;

	public function __construct()
	{
		//$this->id = $_SESSION['admin'];
		parent::__construct();
	}

	public function loginAdmin($name,$message)
	{
		try{
			$stmnt=$this->conn->prepare("select name,password from tbl_admin where id=1");
			$stmnt->bindParam("name", $name,PDO::PARAM_STR) ;
			$stmnt->bindParam("password", $password,PDO::PARAM_STR) ;
			$stmnt->execute();
			$count=$stmnt->rowCount();
			$res=$stmnt->fetch(PDO::FETCH_ASSOC);
			$id = $res['id'];
			if($count){
				$_SESSION['admin']= $id;
				return true;
			}else{
				return false;
			}

		}catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}

	}
	public function loginUser($name,$message)
	{
		try{
			$stmnt=$this->conn->prepare("Query statement");
			$stmnt->bindParam("name", $name,PDO::PARAM_STR) ;
			$stmnt->bindParam("password", $password,PDO::PARAM_STR) ;
			$stmnt->execute();
			$count=$stmnt->rowCount();
			$res=$stmnt->fetch(PDO::FETCH_ASSOC);
			$id = $res['id'];
			if($count){
				$_SESSION['admin']= $id;
				return true;
			}else{
				return false;
			}

		}catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}

	}

		// Create Update Delete Code
	public function cud($res,$message){
		try {
			$stmt = $this->conn->prepare($res);
			$stmt->execute();

			$_SESSION['success_message'] = "Successfully ".$message;
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			$_SESSION['error_message'] = "Sorry  still not ".$message;
			return false;
		}
	}

	public function Rcud($res){
		try {
			$stmt = $this->conn->prepare($res);
			$stmt->execute();
			$id = $this->conn->lastInsertId();
			//$_SESSION['success_message'] = "Successfully ".$message;
			return $id;
		} catch (PDOException $e) {
			echo $e->getMessage();
			$_SESSION['error_message'] = "Sorry  still not ".$message;
			return false;
		}
	}

	public function ret($stmt){
		$stmt = $this->conn->prepare($stmt);
		$stmt->execute();
		return $stmt;	
	}

}
?>