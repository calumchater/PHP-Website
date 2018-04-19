<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
    <title>TP4 - BD</title>
  </head>
  
  <body>
    <?php
    extract($_POST);
      if(!empty($nom) && !empty($titre)){
	$base = pg_connect("host=houplin.studserv.deule.net user=cchater password=postgres dbname=cc1videoclub") 
		or die("Erreur de connexion à la base videoclub ! <br/>".pg_last_error());
		
	$requeteSQL = "SELECT nomab FROM Abonne WHERE nomab='$nom';";
	$resultat = pg_query($base,$requeteSQL) 
		    or die("Erreur SQL !<br/>$requeteSQL<br/>".pg_last_error());
	$nblignes = pg_numrows($resultat);
	if($nblignes == 0){
	  echo("Vous n'êtes pas inscrit au vidéo club.<br/>");
	}else{
	  $requeteSQL = "SELECT titre FROM Film WHERE titre='$titre';";
	  $resultat = pg_query($base,$requeteSQL) 
		      or die("Erreur SQL !<br/>$requeteSQL<br/>".pg_last_error());
	  $nblignes = pg_numrows($resultat);
	  if($nblignes == 0){
	    echo("Nous ne possédons pas ce film.<br/>");
	  }else{
	    echo("Nous avons $titre, M/Mme $nom");
	  }
	}
      }else{
	echo("Veuillez saisir tous les champs du formulaire.<br/>");
      }
	
	
    ?>
    <input type="button" value="Retour" onclick="history.go(-1)">
  </body>

</html>