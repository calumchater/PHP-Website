<!DOCTYPE html>
<html>
<head> <title> Liste des sujets enregistrés </title>

</head>
<?php

$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
echo ("<h1> Page de validation </h1> ");
$requete1 = "SELECT * FROM Projet WHERE valide = 'FALSE' ";

$resultat1 = pg_query($base,$requete1) or die("Erreur SQL ! <br/> $requete1<br/>".pg_last_error());
$i=0;
$nblignes=pg_numrows($resultat1);
echo("<table border=1> <tr><td>Nom du Projet</td><td>Confirmer</td><td>Numero de projet</tr>");
echo("<form action='confirmRefuse.php' method='get'>");
while($i<$nblignes){
  echo("<tr>");
  echo("<td>");
  echo pg_result($resultat1,$i,"intitule") ; 
  echo("</td>");
  echo("<td>");
  $nimp = pg_result($resultat1,$i,"nump");
  echo("<input name='choix[]' type='checkbox' value=$nimp>");
  //<input type="submit" name="valide" value="TRUE">
  echo("</td>");
  echo("<td>");
  echo pg_result($resultat1,$i,"nump");
  echo("</td>");
  echo("</tr>");
  $i=$i+1 ;
}
echo("</table>");
echo("<input type='submit' name='valider' value='Soumettre Projets'>");
echo("</form>");
echo("</br></br></br><a href='pageAccueil.php'> Retour a la page d'accueil </a>");
pg_close($base) ;
?>
<body>

</body>


</html>