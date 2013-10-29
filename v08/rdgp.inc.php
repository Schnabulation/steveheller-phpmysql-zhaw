<?php

/*
 * Data Row Pattern
 * Erweitert im Rahmen des Selbststudiums 08
 * mit optimistic locking
 * 
 */
class Post
{
	
	private $connection;
	
	private $id;
	private $created;
	private $title;
	private $content;
	
	private $version;
	
	function __construct($created, $title, $content) {
		$this->connection = new PDO('mysql:host=localhost;dbname=loc_orm', 'loc_orm', '12341234');
		$this->setContent($content);
		$this->setCreated($created);
		$this->setTitle($title);
	}
	
	public function findByID($id) {
		$this->id = $id;
		$result = $this->connection->query("SELECT * FROM tbl_person WHERE id = ".$id)->fetch();
		$this->setContent($result["content"]);
		$this->setCreated($result["created"]);
		$this->setTitle($result["title"]);
		$this->version = $result["version"];
	}

	public function insert() {
		$this->version = 1;
		$this->connection->exec("INSERT INTO tbl_person (created, title, content, version) VALUES ('$this->created', '$this->title', '$this->content', '$this->version')");
		$result = $this->connection->query("SELECT * FROM tbl_person WHERE created = '$this->created' AND title = '$this->title' AND content = '$this->content'")->fetch();
		$this->id = $result["id"];
	}

	public function update() {
		if ($this->version == $this->getVersion()) {
			$this->version++;
			$this->connection->exec("UPDATE tbl_person SET created='$this->created',title='$this->title',content='$this->content',version='$this->version' WHERE id = '$this->id'");
		} else {
			echo "Die Tabellenzeile wurde in der Zwischenzeit geändert!";
		}
	}

	public function delete() {
		if ($this->version == $this->getVersion()) {
			$this->version++;
			$this->connection->exec("DELETE FROM tbl_person WHERE id = '$this->id'");
		} else {
			echo "Die Tabellenzeile wurde in der Zwischenzeit geändert!";
		}	
	}
	
	private function getVersion() {
		$result = $this->connection->query("SELECT * FROM tbl_person WHERE id = '$this->id'")->fetch();
		return $result["version"];
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