<!DOCTYPE html>
<html>
  <head>

</head>
<?php
echo ("<h1> Page d'attribution des projets </h1> ");
echo("</br>");
echo("</br>");
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());

$requeteEtudiant = "SELECT nom,prenom,nume, numb FROM Etudiant ORDER BY numb DESC";
$queryEtudiant = pg_query($base,$requeteEtudiant);

$nblignes = pg_numrows($queryEtudiant);
$i=0;

echo("<table border='1'>");
echo("<tr><td> Nom  </td><td> Prenom </td><td> Numero Etudiant</td><td> Numero de binome</td><td> Selection du projet</td><td>Choix du tuteur</td><td>Valider le choix</td></tr> ");

$requeteTuteurs = "SELECT numt from Tuteur";
$queryTuteur = pg_query($base,$requeteTuteurs);
$nbTuteur = pg_numrows($queryTuteur);

while($i<$nblignes){
$k=$i+1;
$resultatnumb = pg_result($queryEtudiant,$i, "numb");
$resultatNumE = pg_result($queryEtudiant,$i, "nume");
$requeteProjets = "SELECT  distinct C.nump,ordre FROM Choisit C JOIN Projet P ON C.nump = P.nump WHERE (C.nume = $resultatNumE AND P.attribue = FALSE) ORDER BY ordre";
$queryProjets = pg_query($base,$requeteProjets);

$nbProjetsDispo = pg_numrows($queryProjets);

echo("<form action = 'scriptAttribution.php?numetu=$resultatNumE' method = 'post'>");

if($resultatnumb != 0){

echo("<tr>");
echo("<td>");
  echo pg_result($queryEtudiant,$i, "nom");
  echo("</br>");
  echo pg_result($queryEtudiant,$k, "nom");

echo("</td>");
echo("<td>");
echo pg_result($queryEtudiant,$i, "prenom");
  echo("</br>");
echo pg_result($queryEtudiant,$k, "prenom");
echo("</td>");
echo("<td>");
echo pg_result($queryEtudiant,$i, "nume");
  echo("</br>");
echo pg_result($queryEtudiant,$k, "nume");
echo("</td>");
echo("<td>");
  echo("$resultatnumb");
echo("</td>");
echo("<td>");
  
  if($nbProjetsDispo = 0){
  echo("<input type='text' name='projet'>");}
  else {
  echo("<select name='projet' value='projet' size='1'>");
  $j = 0;
  while($j<5){
  $resultatProjets = pg_result($queryProjets,$j,'nump');
  echo("<option> $resultatProjets </option>");
  $j = $j+1;
  }
  echo("</select>");}
echo("</td>");
echo("<td>");
echo("<select name='tuteur' value='tuteur' size='1'>");
  $t = 0;
  while($t<$nbTuteur){
  $numTuteur = pg_result($queryTuteur,$t,'numt');
  echo("<option> $numTuteur</option>");
  $t = $t+1;
  }
echo("</td>");
echo("<td>");
echo("<input type='submit' name='valider'>");
echo("</td>");
echo("</tr>");
$i=$i+2;  // car on ne veut pas faire pareil pour l'etudiant suivant, on vient de gerer ce cas
} 
else {
echo("<tr>");
echo("<td>");
echo pg_result($queryEtudiant,$i, "nom");
echo("</td>");

echo("<td>");
echo pg_result($queryEtudiant,$i, "prenom");
echo("</td>");

echo("<td>");
echo pg_result($queryEtudiant,$i, "nume");
echo("</td>");
echo("<td>");
echo("Pas de Binome");
echo("</td>");
echo("<td>");
if($nbProjetsDispo = 0){
  echo("<input type='text' name='projet'>");}
  else {
  echo("<select name='projet' value='projet' size='1'>");
  $j = 0;
  while($j<5){
  $resultatProjets = pg_result($queryProjets,$j,'nump');
  echo("<option> $resultatProjets </option>");
  $j = $j+1;
  }
  echo("</select>");}
echo("</td>");
echo("<td>");
echo("<select name='tuteur' value='tuteur' size='1'>");
  $t = 0;
  while($t<$nbTuteur){
  $numTuteur = pg_result($queryTuteur,$t,'numt');
  echo("<option> $numTuteur</option>");
  $t = $t+1;
  }
echo("</td>");
echo("<td>");
echo("<input type='submit' name='valider'>");
echo("</td>");
echo("</tr>");
$i = $i +1;
}

echo("</form>");
}

echo("</table>");
echo("</br></br></br><a href='pageAccueil.php'> Retour a la page d'accueil </a>");
?>
<body>

</body>


</html>