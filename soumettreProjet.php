<!DOCTYPE html>
<html>
  <head>

</head>
<?php

extract($_POST);
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
$requeteNUM = "SELECT * FROM Projet";
$resultatNUM = pg_query($base,$requeteNUM) or die("Erreur SQL ! <br/> $requeteNUM<br/>".pg_last_error());
$numeroPROJ = pg_numrows($resultatNUM);
$numeroPROJ = $numeroPROJ + 1 ;
/*if($categorie='Service'):
  $resultatCAT = 1;
  endif;
   if($categorie='Recherche'):
  $resultatCAT = 2;
  endif;                                       
      if ($categorie='Entreprise'):
  $resultatCAT = 3;
  endif;
*/

$requeteCat = "Select numCat From Catégorie Where nomcat='$categorie' ";
$resultatCat = pg_query($base, $requeteCat) or die("Erreur SQL ! <br/> $ $requeteCat<br/>".pg_last_error());
$numCategorie = pg_result($resultatCat,'numcat');

$requeteSQL1 = "INSERT INTO Projet (nump,intitule,duree,societe,nomcontact,siteweb,adresse,telephone,numCat)
VALUES ($numeroPROJ,'$intitule','$duree','$societe','$nomcontact','$siteweb','$adresse',$telephone,$numCategorie)";

$resultat1 = pg_query($base,$requeteSQL1) or die("Erreur SQL ! <br/> $requeteSQL1<br/>".pg_last_error());

header("Location: pageAccueil.php");
?>
</html>