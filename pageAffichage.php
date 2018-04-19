<!DOCTYPE html>
<html>
<?php
echo ("<h1>Liste des choix par projet </h1>");

extract($_POST);
$choixprojet = $_POST[$choixprojet];
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());

$requete1 = "SELECT  intitule, nom,numB FROM Etudiant E JOIN Choisit C ON E.nume = C.nume
JOIN Projet P ON P.numP = C.numP 
where intitule='$choixprojet'
ORDER  BY numB";
$resultat1 = pg_query($base,$requete1) or die("Erreur SQL ! <br/> $requete1<br/>".pg_last_error());
$nblignes1=pg_numrows($resultat1) ;
$i=0;
echo("Les etudiants qui ont choisi le projet $choixprojet sont :");
echo("<table border='1'>");
echo("<tr><td> Nom Etudiant</td><td> Numero Etudiant</td><td> Numero de binome </td></tr> "); 
while($i<$nblignes1){
 echo("<tr>");

   echo("<td>");
   echo pg_result($resultat1,$i,"nom") ; 
   echo("</td>");
   echo("<td>");
   $numB = pg_result($resultat1,$i,"numB") ; 
   if($numB != 0) {
    echo("$numB");
   } else {
   echo("Pas de binome");
   } 
   echo("</td>");
    echo("</tr>");
$i=$i+1 ;}

echo("</table>");
echo("</br></br></br><a href='pageAccueil.php'> Retour a la page d'accueil </a>");
  pg_close($base) ;                     
?>

</html>