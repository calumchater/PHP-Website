<!DOCTYPE html>
<html>
  <head>

</head>
<?php
extract($_POST);
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
$choix = FALSE;
$requete1 = "INSERT INTO Projet(valide) VALUES ($choix)";



?>
<body>

</body>


</html>