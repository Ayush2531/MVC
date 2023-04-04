<?php
class Model_Core_Adapter
{
	public $host = 'localhost';
	public $username = 'root';
	public $password = '';
	public $database = 'project-ayush-patel';


	public function connect()
	{
		$mysqli = mysqli_connect($this->host,$this->username,$this->password,$this->database);
		return $mysqli;
	}

	public function fetchAll($query){
		$connect = $this->connect();
		$result = $connect->query($query);
		if(!$result){
			return false;
		}
		return $result->fetch_all(MYSQLI_ASSOC);

	}

	public function fetchRow($query)
	{
		$connect = $this->connect();
		$result = $connect->query($query);
		if(!$result){
			return false;
		}
		return $result->fetch_assoc();
	}


	public function insert($query)
	{
		$connect = $this->connect();
		$result = $connect->query($query);
		if (!$result) {
			return false;
		}
		return $connect->insert_id;

	}

	public function update($query)
	{
		$connect = $this->connect();
		$result = $connect->query($query);
		if(!$result){
			return false;
		}
		return true;

	}

	public function delete($query)
	{
		$connect = $this->connect();
		$result = $connect->query($query);
		if(!$result){
			return false;
		}
		return true;
	}
}
?>