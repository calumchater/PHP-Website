

<!DOCTYPE html>
<html>
   <head>
      <title> Gestion de Projets </title>
   </head>
   <style>
      #body {
      background-color: #F5DEB3;
      }
   
      #title {
      background-color: #F5F5F5;
      height: 18%;
      width: 100%
      }
      
      #contenu {
      }
      #proposition{
      display:inline-block;
      background-color: #C0C0C0;
      height: 82%;
      width: 60%
      }
      #loginAdmin {
      float: right;
      display:inline-block;
      background-color: #00BFFF;
      height: 82%;
      width: 15%
      }
      
      #liensExternes {
      background-color: #FFEFD5;
      display: inline-block;
      height: 82%;
      width: 20%
      }
   </style>
   <?php
      ?>
   <body>
      <div  id="title">
         <h1 style="color:black;">Gestion de projets de fin d'etude</h1>
      </div>
      <div id='contenu'>
         <div id='liensExternes'> 
            <a href="sujetsValide.php"> Liste des sujets valides </a> </br> </br> </br>
            <a href="enregistrement.php"> Etudiants veuillez faire vos choix ici </a> </br> </br> </br>
            <a href="listeTuteurs.php"> Liste des tuteurs </a> </br> </br> </br>
            
         </div>
         <div id="proposition">
            <h2> Veuillez soumettre vos propositions de projets </br> grace au formulaire ci-dessous </h2>
            </br>
            <form action='soumettreProjet.php' method="post">
               <table style="width:20%">
                  <tr>
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
                     <td><input type='text' name='siteweb'></td>
                  </tr>
                  <tr>
                     <td>Adresse</td>
                     <td><input type='text' name='adresse'></td>
                  </tr>
                  <tr>
                     <td>Numero Telephone</td>
                     <td><input type='text' name='telephone' value='0'></td>  <!-- ce defaut 0 sert lors de la saisie de projet, car le numero de telephone ne peut pas etre laisse vide -->
                  </tr>
                  <tr>
                     <td>Categorie</td>
                     <td>
                        <select name='categorie' value='categorie' size='3'>
                           <option> Service
                           <option> Recherche
                           <option> Entreprise
                        </select>
                  </tr>
               </table>
               <input type='submit' name ='valider'>
            </form>
         </div>
         <div id='loginAdmin'>
            <a href="validation.php"> Page de validation des sujets (que pour l'admin ) </a> </br> </br> </br>
            <a href="pageAttribution.php"> Page pour l'attribution des sujets </a>
         </div>
      </div>
   </body>
</html>

