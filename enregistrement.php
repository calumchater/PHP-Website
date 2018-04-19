<!DOCTYPE html>
<html>
<head> <title> Liste des sujets enregistrés </title>

</head>
<?php
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
$requete1 = "SELECT nump,intitule FROM Projet WHERE valide=True";

$resultat1 = pg_query($base,$requete1) or die("Erreur SQL ! <br/> $requete1<br/>".pg_last_error());
$i=0;
$nblignes = pg_numrows($resultat1);

echo("<h1> Page de Saisie des choix des etudiants </h1>
</br></br>");
echo("<form action='saisieVoeux.php' method = 'post'>");
echo("<p> Saisissez le premier numE : </p>");
echo("<input type='text' name='nume1'>");
echo("</br>");
echo("<p> Saisissez le deuxieme numE (laisser vide si seul): </p>");
echo("<input type='text' name='nume2'>");
echo("</br></br>");
echo("<p> Veuillez saisir les numeros de projet dans l'ordre de votre choix </p>");
echo("<table border='1'>");
echo("<tr><td> Numero de projet </td><td>Ordre</td></tr> ");
$i=1;
echo("<tr>");
    echo("<td>");
    echo ("<input type ='text' name='choix1' ");
    echo("</td>");
    echo("<td>");
echo $i;    echo("</td>");
    echo("</tr>");
    echo("<tr>");
    $i=2;
    echo("<td>");
    echo ("<input type ='text' name='choix2' ");
    echo("</td>");
    echo("<td>");
    echo $i;
    echo("</td>");
    echo("</tr>");
    $i=3;
    echo("<tr>");
    echo("<td>");
    echo ("<input type ='text' name='choix3' ");
    echo("</td>");
    echo("<td>");
echo $i;    echo("</td>");
    echo("</tr>");
    echo("<tr>");
    $i=4;
    echo("<td>");
    echo ("<input type ='text' name='choix4' ");
    echo("</td>");
    echo("<td>");
echo $i;    echo("</td>");
    echo("</tr>");
    echo("<tr>");
    echo("<td>");
    echo ("<input type ='text' name='choix5' ");
    echo("</td>");
    echo("<td>");
    $i=5;
echo $i;    echo("</td>");
    echo("</tr>");
echo("</br>");
echo("</table>");
echo("<p> Liste des projets valides </p>");
echo("<table border='1'>");
echo("<tr><td> Intitule </td><td>nump</td></tr> ");
$i=0;
while($i<$nblignes){	 
    echo("<tr>");
    echo("<td>");
    echo pg_result($resultat1,$i,"intitule");
    echo("</td>");
    echo("<td>");
    echo pg_result($resultat1,$i,"nump");
    echo("</td>");
    echo("</tr>");
    $i++;
}
echo("</br>");
echo("</table>");
echo("</br>");


echo("<input type='submit' name='validationVoeux'>");
echo("</form>");
echo("</br></br></br><a href='pageAccueil.php'> Retour a la page d'accueil </a>");
?>
<body>

</body>


</html>