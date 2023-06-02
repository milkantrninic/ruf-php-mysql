
<?php
class DBController {
	private $host = "devkinsta_db";
	private $user = "root";
	private $password = "y9Q66z79CGQiZid3";
	private $database = "racun";
	private $conn;
    
    function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	function updateQuery($query) {
        $result = mysqli_query($this->conn,$query);
        if (empty($result)) {
            die('Invalid query: ' . mysql_error());
        } else {
            return $result;
        }
    }
   
    function insertQuery($query) {
        $result = mysqli_query($this->conn,$query);
		if (empty($result)) {
            die('Invalid query: ' . mysql_error());
        } else {
            return $result;
        }
    }
   
    function deleteQuery($query) {
        $result = mysqli_query($this->conn,$query);
        if (empty($result)) {
            die('Invalid query: ' . mysql_error());
        } else {
            return $result;
        }
    }
    
    function estringQuery($query) {
        $result = mysqli_real_escape_string($this->conn,$query);
        return $result;
    }


	function last_id() {
        $result = mysqli_insert_id($this->conn, $query);
        if (empty($result)) {
            die('Invalid query: ' . mysql_error());
        } else {
            return $result;
        }
    }
 
}

?>
