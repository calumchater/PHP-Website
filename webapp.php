<!DOCTYPE html>
<html>
<head>

<title> TP4 BD </title>
</head>
<body>
<?php 
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1videoclub") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
$requeteSQL1 = "SELECT titre,realisateur,anneeproduction,libelle FROM Film F JOIN Categorie C ON F.nCat = C.nCat;";
$resultat1 = pg_query($base,$requeteSQL1) or die("Erreur SQL ! <br/> $requeteSQL1<br/>".pg_last_error());
$nblignes1=pg_numrows($resultat1) ;
$i=0 ;
echo("<table border=1> <tr><td>Titre</td><td>Realisateur</td><td>Annee production</td><td>Libelle</td></tr>");
while ($i < $nblignes1) {
  echo("<tr>");
  echo("<td>");
  echo pg_result($resultat1,$i,"titre") ;
  echo("</td>");
  echo("<td>");
  echo pg_result($resultat1,$i,"realisateur") ;
  echo("</td>");
  echo("<td>");
  echo pg_result($resultat1,$i,"anneeproduction");
  echo("</td>");
  echo("<td>");
  echo pg_result($resultat1,$i,"libelle");
  echo("</td>");
  echo("</tr>");
  $i=$i+1 ;
}
echo("</table>");
echo("<br>");


$requeteSQL2="SELECT nomab,prenomab FROM abonne;";
$resultat2 = pg_query($base,$requeteSQL2) or die("Erreur SQL ! <br/> $requeteSQL2<br/>".pg_last_error());
$nblignes2=pg_numrows($resultat2) ;
$i=0 ;
echo("<table border=1> <tr><td>Nom</td><td>Prenom</td></tr>");
while ($i < $nblignes2) {
  echo("<tr>");
  echo("<td>");
  echo pg_result($resultat2,$i,"nomab") ;
  echo("</td>");
  echo("<td>");
  echo pg_result($resultat2,$i,"prenomab") ;
  echo("</td>");
  echo("</tr>");
  $i=$i+1 ;
};
echo("</table>");
pg_close($base) ;
?>
http://www.freeformatter.com/html-formatter.html#ad-output
<form action="verif.php" method="post">
Nom: <input type="text" name="nom"> <br>
Titre: <input type="text" name="titre"> <br>
<input type="submit" value="Valider le formulaire">
</form>

</body>


</html>