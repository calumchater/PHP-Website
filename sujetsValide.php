<!DOCTYPE html>
<html>
<head> <title> Liste des sujets validés </title>

</head>

<body>
<?php
echo ("<h1>Liste des sujets valides </h1>");
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
$requete1 = "SELECT nump,intitule from projet WHERE valide = true";
$resultat1 = pg_query($base,$requete1) or die("Erreur SQL ! <br/> $requete1<br/>".pg_last_error());
$nblignes1=pg_numrows($resultat1) ;
$i=0;
echo("</br>");
echo("<table border='1'>");
echo("<tr><td> Intitule </td><td>nump</td></tr> "); 
while($i<$nblignes1){
   echo("<tr>");
   echo("<td>");
   echo pg_result($resultat1,$i,"intitule") ; 
   echo("</td>");
   echo("<td>");
   echo pg_result($resultat1,$i,"nump") ; 
   echo("</td>");
    echo("</tr>");
   
   $i=$i+1 ;
}
echo("</br></br></br><a href='pageAccueil.php'> Retour a la page d'accueil </a>");
pg_close($base) ;
?>
</body>
</html>