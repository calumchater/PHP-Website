<!DOCTYPE html>
<html>
<head> <title> Liste des tuteurs </title>

</head>
<?php
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());

echo("<h1> Liste des tuteurs </h1>");

$requeteTuteurs = "SELECT numt,nom,prenom,email FROM Tuteur";
$queryTuteurs = pg_query($base,$requeteTuteurs);
$i=0;
$nblignes=pg_numrows($queryTuteurs);
echo("<table border=1> <tr><td>Numero de tuteur</td><td>Nom </td><td> Prenom <td> Email </td> </tr>");
while($i<$nblignes){
  echo("<tr>");
  echo("<td>");
  echo pg_result($queryTuteurs,$i,"numt") ; 
  echo("</td>");
  echo("<td>");
  echo pg_result($queryTuteurs,$i,"nom") ; 
  echo("</td>");
  echo("<td>");
  echo pg_result($queryTuteurs,$i,"prenom") ; 
  echo("</td>");
  echo("<td>");
  echo pg_result($queryTuteurs,$i,"email") ; 
  echo("</td>");
  echo("</tr>");
  $i = $i +1;
}
echo("</table>");
echo("</br></br></br><a href='pageAccueil.php'> Retour a la page d'accueil </a>");


pg_close($base);
?>
<body>

</body>


</html>