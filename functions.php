<?php
class DBcontroller
{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "blog_samples";
	private $connection = "";
    function __construct() {
		$conn = $this->connectDB();
		$this->connection = $conn;
	}
    function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
    function runQ($query)
    {
        $result = mysqli_query($this->connection,$query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset)) {
            return $resultset;
        }
    }
    function numRows($query)
    {
        $result = mysqli_query($this->connection, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
    public function select_product($id)
    {
        $str = mysqli_query($this->conn, "SELECT * FROM tblproduct WHERE code = $id");
        return $str;
    }
}

?>