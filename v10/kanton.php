<?php

require_once "model.php";

class Kanton {
	
	private $model;
	
	public function __construct() {
		$this->model = new Model();
	}
	
	public function showTheArray() {
		print_r($this->model->getKantonArray());
	}
	
	public function showTheArrayByKennzeichen($kennzeichen) {
		print_r($this->model->getKantonByKennzeichen($kennzeichen));
	}
	
}