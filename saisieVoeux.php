<!DOCTYPE html>
<html>
<head> <title> Liste des sujets enregistrés </title>

</head>
<?php
extract($_POST);
$option = $_POST['ordre'];
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());

$requeteBin = "Select numB From Etudiant Where numB != 0 ";
$resultatBin = pg_query($base,$requeteBin) or die("Erreur SQL ! <br/> $requeteBin<br/>".pg_last_error());
$nombreB = pg_numrows($resultatBin);
$numB = $nombreB + 1 ;

if($nume1 != NULL AND $nume2!= NULL){

// Insertion du numero de binome pour les 2 etudiants
$requete1 = "UPDATE Etudiant  SET numB=$numB where nume=$nume1";

$resultat1 = pg_query($base,$requete1) or die("Erreur SQL ! <br/> $requete1<br/>".pg_last_error());

$requete6 = "UPDATE Etudiant  SET numB=$numB where nume=$nume2";

$resultat6 = pg_query($base,$requete6) or die("Erreur SQL ! <br/> $requete6<br/>".pg_last_error());

  
// Insertion des choix realises par les 2 etudiants  
  
$requete1 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,1,$choix1)";
$requete2 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,2,$choix2)";
$requete3 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,3,$choix3)";
$requete4 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,4,$choix4)";
$requete5 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,5,$choix5)";
$resultat1 = pg_query($base,$requete1) or die("Erreur SQL ! <br/> $requete1<br/>".pg_last_error());
$resultat2 = pg_query($base,$requete2) or die("Erreur SQL ! <br/> $requete2<br/>".pg_last_error());
$resultat3 = pg_query($base,$requete3) or die("Erreur SQL ! <br/> $requete3<br/>".pg_last_error());
$resultat4 = pg_query($base,$requete4) or die("Erreur SQL ! <br/> $requete4<br/>".pg_last_error());
$resultat5 = pg_query($base,$requete5) or die("Erreur SQL ! <br/> $requete5<br/>".pg_last_error());
$requete6 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume2,1,$choix1)";
$requete7 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume2,2,$choix2)";
$requete8 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume2,3,$choix3)";
$requete9 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume2,4,$choix4)";
$requete10 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume2,5,$choix5)";
$resultat6 = pg_query($base,$requete6) or die("Erreur SQL ! <br/> $requete6<br/>".pg_last_error());
$resultat7 = pg_query($base,$requete7) or die("Erreur SQL ! <br/> $requete7<br/>".pg_last_error());
$resultat8 = pg_query($base,$requete8) or die("Erreur SQL ! <br/> $requete8<br/>".pg_last_error());
$resultat9 = pg_query($base,$requete9) or die("Erreur SQL ! <br/> $requete9<br/>".pg_last_error());
$resultat10 = pg_query($base,$requete10) or die("Erreur SQL ! <br/> $requete10<br/>".pg_last_error());
}

else {

// Insertion choix pour l'etudiant, son numB sera donc 0 par defaut ( voir tables sql)

$requete1 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,1,$choix1)";
$requete2 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,2,$choix2)";
$requete3 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,3,$choix3)";
$requete4 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,4,$choix4)";
$requete5 = "INSERT INTO Choisit  (nume,ordre,nump) VALUES ($nume1,5,$choix5)";
$resultat1 = pg_query($base,$requete1) or die("Erreur SQL ! <br/> $requete1<br/>".pg_last_error());
$resultat2 = pg_query($base,$requete2) or die("Erreur SQL ! <br/> $requete2<br/>".pg_last_error());
$resultat3 = pg_query($base,$requete3) or die("Erreur SQL ! <br/> $requete3<br/>".pg_last_error());
$resultat4 = pg_query($base,$requete4) or die("Erreur SQL ! <br/> $requete4<br/>".pg_last_error());
$resultat5 = pg_query($base,$requete5) or die("Erreur SQL ! <br/> $requete5<br/>".pg_last_error());
}

header("Location: enregistrement.php");


?>

</html>