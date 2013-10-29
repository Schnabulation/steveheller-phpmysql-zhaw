<?php
class Post
{
	
	private $connection;
	
	private $created;
	private $title;
	private $content;
	
	function __construct() {
		$this->connection = new PDO('mysql:host=localhost;dbname=loc_orm', 'loc_orm', '12341234');
	}
	
	public function findByID($id) {
		$result = $this->connection->query("SELECT * FROM tbl_person WHERE id = ".$id)->fetch();
		$this->setContent($result["content"]);
		$this->setCreated($result["created"]);
		$this->setTitle($result["title"]);
	}

	public function insert() {
		$this->connection->exec("INSERT INTO tbl_person (created, title, content) VALUES ('".$this->created."', '".$this->title."', '".$this->content."')");
	}

	public function update() {
		echo "Log dich ins PHPmyAdmin ein und ändere den Record selber - ich habe schon genug getan!";
	}

	public function delete() {
		$this->connection->exec("DELETE FROM tbl_person WHERE content = '".$this->content."'");
	}
	
	public function setCreated($created) {
		$this->created = $created;
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}
	
	public function setContent($content) {
		$this->content = $content;
	}
}