<!DOCTYPE html>
<html>
<?php
echo ("<h1>Liste des choix par projet </h1>");
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
$i=0;
echo("<form method='post' action='pageAffichage.php'>");
$requeteProj = "SELECT intitule FROM Projet WHERE valide = TRUE";
$queryProj = pg_query($base,$requeteProj);
$nblignes = pg_numrows($queryProj);
echo("<select name='choixprojet' value='numP'>");
while($i<$nblignes){
$resultatNom = pg_result($queryProj,$i,"intitule");
echo("<option> '$resultatNom'");
                          $i=$i+1 ;}
echo("</select>");
echo("<input type='submit' name='validation'>");
echo("</form>");
echo("</br></br></br><a href='pageAccueil.php'> Retour a la page d'accueil </a>");
  pg_close($base) ;                     
?>

</html>