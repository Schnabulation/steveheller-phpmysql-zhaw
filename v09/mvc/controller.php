<?php

class Controller {
	
	private $model;
	private $view;
	
	public function __construct($post, $get) {
		
		$this->view = new view();
		
		// prüfen, welche Funktion aufgerufen werden soll
		switch ($get["do"]) {
			case 'show':
				if (isset($get["id"])) {
					$this->show($get["id"]);
				} else {
					$this->showAll();
				}
				break;
				
			case 'edit':
				if (isset($get["id"])) {
					$this->edit($get["id"]);
				} else {
					
				}
				break;
			default:
				$this->showNoGet();	
		}
		
	}
	
	public function showAll() {
		foreach (model::getEntries() as $entry) {
			$this->view->displayEntry($entry);
		}
	}
	
	public function show($id) {
		$this->view->displayEntry(model::getEntry($id-1)); // id um eines erhöhen, da das Array mit 0 startet
	}
	
	public function showNoGet() {
		$this->view->displayText("No GET parm!");
	}
	
	public function edit($id) {
		model::editEntries($id, "Neuer Titel", "Neuer Content");
	}
	
}





?>