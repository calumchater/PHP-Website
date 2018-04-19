<!DOCTYPE html>
<html>
  <head>

</head>
<?php
extract($_POST);
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
$requeteSQL1 = "INSERT INTO Projet (intitule,duree,societe,nomcontact,siteweb,adresse,telephone) VALUES ('$intitule','$duree','$societe','$nomcontact','$siteweb','$adresse',$telephone)";
$resultat1 = pg_query($base,$requeteSQL1) or die("Erreur SQL ! <br/> $requeteSQL1<br/>".pg_last_error());
?>
</html>