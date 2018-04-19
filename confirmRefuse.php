<!DOCTYPE html>
<html>
<head> <title> page de confirmation </title>
  <head>

</head>
<?php
echo ("<h1> Page devalidation </h1> ");
extract($_POST);
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
$requete2 = "SELECT * FROM Projet";
$i = 1;
$resultat1 = pg_query($base,$requete2) or die("Erreur SQL ! <br/> $requete2<br/>".pg_last_error());
$nblignes= pg_numrows($resultat1); 
//while($i<=$nblignes){
$option = $_GET['choix'];
foreach($option as list($valide)){;
$requete1 = "UPDATE Projet SET valide = TRUE WHERE nump = $valide";
$resultat2 = pg_query($base,$requete1) or die("Erreur SQL ! <br/> $requete1<br/>".pg_last_error());

//$i++;
}


header("Location: validation.php");
?>
<body>

</body>


</html>