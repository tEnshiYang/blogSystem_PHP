<?
/**
* 
*/
class db
{
	
	function __construct()
	{
		$this->mysqli = new mysqli('101.201.235.217','root','mysqlpasswd','blog');
		if($this->mysqli->connect_error){
			die("connect error");
		}
		$this->query("SET NAMES UTF8");
	}

	function query($sql){
		return $this->mysqli->query($sql);
	}
}