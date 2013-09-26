<?php
if (!isset($_COOKIE['seen'])) {
	setcookie("seen");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Submit us your Bug!</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<script type="text/javascript">
	// ref: http://diveintohtml5.org/detect.html
	function supports_input_placeholder() {
		var i = document.createElement('input');
		return 'placeholder' in i;
	}

	if (!supports_input_placeholder()) {
		var fields = document.getElementsByTagName('INPUT');
		for ( var i = 0; i < fields.length; i++) {
			if (fields[i].hasAttribute('placeholder')) {
				fields[i].defaultValue = fields[i].getAttribute('placeholder');
				fields[i].onfocus = function() {
					if (this.value == this.defaultValue)
						this.value = '';
				}
				fields[i].onblur = function() {
					if (this.value == '')
						this.value = this.defaultValue;
				}
			} 
		}
	}
</script>
</head>
<?php 
if (!isset($_COOKIE['seen'])) {
	echo "<body onload=\"document.getElementById('underlay').style.display='block'; document.getElementById('lightbox').style.display='block';\">";
} else {
echo "<body>";
}
?>
<h2>Bitte melde deinen Bug mit diesem Formular</h2>

<form enctype="multipart/form-data" class="form" action="filebug.php" method="POST">




	<p class="name">
		<input type="text" name="name" id="name" placeholder="John Doe" required /> <label
			for="name">Name</label>
	</p>

	<p class="email">
		<input type="text" name="email" id="email"
			placeholder="mail@example.com" required /> <label for="email">Email</label>
	</p>

	<p class="web">
		<input type="text" name="web" id="web" placeholder="www.example.com" required />
		<label for="web">Betreffende Website</label>
	</p>

	<p class="slider">
		<input type="range" min="1" max="10" /> <label for="slider">Priorität</label>
	</p>

	<p class="bugtype">
		<select id="Bugtype" required >
			<option value="1">Fehler</option>
			<option value="2">Layout</option>
			<option value="3">Textfehler</option>
		</select> <label for="bugtype">Bugtype</label>
	</p>

	<p class="rueckruf">
		<input type="checkbox" name="Ja" value="ja"> <label for="rueckruf">Rückruf
			erforderlich</label>
	</p>

	<p class="reproduzierbar"> <input type="radio" name="reproduzierbar"
		value="Ja">Ja<br>
	<input type="radio" name="reproduzierbar" value="Nein">Nein <label
		for="reproduzierbar">Reproduzierbar</label>
	</p>

	<p class="datetime">
		<input type="datetime" name="datum" required /> <label for="datetime">Datum</label>
	</p>
	
	<p class="fileupload">
		<input name="userfile" type="file" />
	</p>
	
	<p class="text">
		<textarea name="text" placeholder="Fehlerreport" required /></textarea>
	</p>

	<?php
          require_once('recaptchalib.php');
          $publickey = "6LewAugSAAAAADBC2qAQLmVfetE33s5gOGFbvNan"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
	
	<p class="submit">
		<input type="submit" value="Senden" />
	</p>

</form>


<div id="underlay"></div>
<div id="lightbox">
	<div id="lightboxtext">
		Lieber Jaime <br /> <br /> Ich habe mir erlaubt, die Aufgabenstellung
		etwas anzupassen. Während meiner Tätigkeit bei der CS2 habe ich genug
		Formulare gebaut und mit CSS gestylet. Darum habe ich in diesem
		Formular nur die wichtigsten und für mich neuen HTML5 Tags umgesetzt.<br />
		Ausserdem habe ich das Cookie-Handling noch angesehen. <br /> <br />
		Ich bitte dich, dies zu berücksichtigen, wenn du die Bewertung machst.
		<br /> <br /> Der Aufruf der Lightbox wird übrigens in einem Cookie
		gespeichert - du wirst diese Lightbox also nur einmal sehen.<br />
		Damit sie verschwindet, lade bitte die Seite neu. <br /> <br /> Danke
		für dein Verständnis,<br /> Steve
	</div>
</div>


</body>
</html>
