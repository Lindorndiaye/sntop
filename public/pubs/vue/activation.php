<?php 
require_once("classes/annonceur.php"); 
if( $_SESSION['id_annonceur'] == NULL ){
   
   $login= substr($_GET['action'] , 0, -4 );

   $v_user = new Database();
   $user = $v_user->cherche_all( "annonceur" , "pseudo" , $login );
  ?>
  <div class='panel panel-danger' style='height: 500px;padding-top:100px;'>
   <div class='panel-body'>

  <?php
      if ( $user != NULL ) { 
      	$user=$user[0];
      	$code_v = sha1($user['password'].$user['prenom'].$user['nom']);  	
      	//echo "$code_v et " .$_GET['value'] ;
      	if( $_GET['value'] === $code_v ){ 
      	//$table , $champ, $valeur , $champ_id , $id
      	$v_user->modifier("annonceur" , "statut" , 1 , "pseudo" , $user['pseudo'] );	
        ?>
        <center>
          <h3>Félicitations  <?php echo $user['pseudo'] ?>,<br>
        Votre compte vient d'être activé. </h3></center>
 <?php 	}
      }else{
      	echo "Utilisateur inexistant dans la base de données.";
      }
}


?>
  </div>
</div>