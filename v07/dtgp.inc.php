<?php
class Post
{
	
	private $connection;
	private $tbl_name;
	
	function __construct($tbl_name) {
		$this->tbl_name = $tbl_name;
		$this->connection = new PDO('mysql:host=localhost;dbname=loc_orm', 'loc_orm', '12341234');
	}
	
	public function findByID($id) {
		$result = $this->connection->query("SELECT * FROM ".$this->tbl_name." WHERE id = ".$id)->fetch();
		echo "Erstellt: ".$result["created"]."<br />";
		echo "Titel: ".$result["title"]."<br />";
		echo "Content: ".$result["content"]."<br />";
	}

	public function insert($created, $title, $content) {
		$this->connection->exec("INSERT INTO ".$this->tbl_name." (created, title, content) VALUES ('".$created."', '".$title."', '".$content."')");
	}

	public function update() {
		echo "Log dich ins PHPmyAdmin ein und ändere den Record selber - ich habe schon genug getan!";
	}

	public function delete($id) {
		$this->connection->exec("DELETE FROM ".$this->tbl_name." WHERE id = '".$id."'");
	}

}