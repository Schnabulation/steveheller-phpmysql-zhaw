function fAlert() {
  alert("Hallo Welt!");
}

function fWriteFile() {
  document.open();
  document.write("<h1>TEST<\/h1>");
  document.close();      
}

function fRechnen(zahl1, zahl2, field) {
  resultat = parseFloat(zahl1) + parseFloat(zahl2);
  field.value = resultat;
}