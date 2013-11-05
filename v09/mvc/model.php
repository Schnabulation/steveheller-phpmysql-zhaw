<?php  
session_start();

//Einträge eines Blogs als zweidimensionales Array
if (!isset($_SESSION['entries'])) {
		$_SESSION['entries'] = array(
		array("title"=>"Eintrag 1", "content"=>"Ich bin der erste Eintrag."),
		array("title"=>"Eintrag 2", "content"=>"Ich bin der ewige Zweite!"),
		array("title"=>"Eintrag 3", "content"=>"Na dann bin ich die Nummer drei.")
		);
}

/**
 * Klasse für den Datenzugriff
 */
class Model{	

	/**
	 * Gibt alle Einträge des Blogs zurück.
	 *
	 * @return Array Array von Blogeinträgen.
	*/
	public static function getEntries(){
// 		return self::$entries;
		return $_SESSION["entries"];
	}
	
	public static function editEntries($id,$title,$content){
		$_SESSION["entries"][$id-1] = array("title"=>$title, "content"=>$content); 
		return 0;
	}

	/**
	 * Gibt einen bestimmten Eintrag zurück.
	 *
	 * @param int $id Id des gesuchten Eintrags
	 * @return Array Array, dass einen Eintrag repräsentiert, bzw.
	 *                  wenn dieser nicht vorhanden ist, null.
	 */
	public static function getEntry($id){
		if(array_key_exists($id, $_SESSION["entries"])){
			return $_SESSION["entries"][$id];
		}else{
			return null;
		}
	}
}
?>