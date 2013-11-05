<?php

class view {
	
	function displayEntry($entry) {
		echo "<b>".$entry["title"] . "</b><br />";
		echo $entry["content"] . "<br />";
	}
	
	function displayText($text) {
		echo $text;
	}
	
}
?>