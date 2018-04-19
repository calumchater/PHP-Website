<!DOCTYPE html>
<html>
<head> <title> Liste des sujets enregistrés </title>

</head>
<?php
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
extract($_POST);
$resultatEtu = $_GET['numetu'];

$requeteTuteur = "UPDATE Projet SET numt = $tuteur WHERE nump = $projet";
$queryTuteur = pg_query($requeteTuteur);
$projetTrue = "UPDATE Projet SET attribue = TRUE WHERE nump = $projet";
$queryTrue = pg_query($projetTrue);



$requeteBinome = "SELECT numb FROM Etudiant Where nume=$resultatEtu";
$queryBinome = pg_query($base,$requeteBinome);
$numb = pg_result($queryBinome);
if($numb != 0){
$requeteNumeros = "Select nume From etudiant WHERE numb = $numb";
$querynumeros = pg_query($base,$requeteNumeros);
$i=0;
while($i<2){
$numeroEtu = pg_result($querynumeros,$i,'nume');
$insertionBinome = "UPDATE Etudiant SET nump = $projet WHERE nume = $numeroEtu";
$queryInsertion = pg_query($base,$insertionBinome);
$i=$i+1;
}
} else {
$insertionBinome = "UPDATE Etudiant SET nump = $projet WHERE nume = $resultatEtu";
$queryInsertion = pg_query($base,$insertionBinome);
}

pg_close($base);


header("Location: pageAttribution.php");
?>
<body>

</body>


</html>