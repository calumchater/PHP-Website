<!DOCTYPE html>
<html>
<head> <title> Gestion de Projets </title>
</head>

<?php
$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1projetBD") or die("Erreur de connexion a la base ! <br/>".pg_last_error());
$requeteSQL1 = "INSERT INTO Projet VALUES (intitule,duree,societe,nomcontact,site,email,adresse,telephone)";
$resultat1 = pg_query($base,$requeteSQL1) or die("Erreur SQL ! <br/> $requeteSQL1<br/>".pg_last_error());

?>
<body>

<form method="post">
   <table style="width:20%">
      <tr>
         <h1 style="color:black;">Gestion de projet de fin d'étude</h1>
         <td>Intitule</td>
         <td><input type='text' name='intitule'></td>
      </tr>
      <tr>
         <td>Duree</td>
         <td><input type='text' name='duree'></td>
      </tr>
      <tr>
         <td>Societe</td>
         <td><input type='text' name='societe'></td>
      </tr>
      <tr>
         <td>Nom Contact</td>
         <td><input type='text' name='nomcontact'></td>
      </tr>
      <tr>
         <td>Site Web</td>
         <td><input type='text' name='site'></td>
      </tr>
      <tr>
         <td>Email </td>
         <td><input type='text' name='email'></td>
      </tr>
      <tr>
         <td>Adresse</td>
         <td><input type='text' name='adresse'></td>
      </tr>
      <tr>
         <td>Numero Telephone</td>
         <td><input type='text' name='telephone'></td>
      </tr>
   </table>
   <input type='submit' name ='valider'>
</form>




</body>
</html>
