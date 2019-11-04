<style type="text/css">
  .form-signin {
  max-width: 330px;
  padding: 15px;
  margin-bottom:100px ;
}

.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<?php
 ob_start();
 session_start();
 require_once("classes/annonceur.php");
 if ($_POST['motpasse']) {
   extract($_POST);
   $v_user = new Database();
   $user = $v_user->cherche_all("annonceur", "pseudo" , $loggin );
   if ($user != NULL) {
       $motpasse = md5($motpasse);
       $getin = $v_user->cherche_rqt("SELECT * FROM annonceur WHERE pseudo = '$loggin'  AND mot_de_passe = '$motpasse' and statut=1 ");
        if ($getin != NULL) {
         $_SESSION['id_annonceur']=$getin[0]['id_annonceur'];
         $_SESSION['pseudo'] = $getin[0]['pseudo'];
         $_SESSION['nom'] = $getin[0]['nom'];
         $_SESSION['mot_de_passe'] = $getin[0]['mot_de_passe'];
         $_SESSION['prenom'] = $getin[0]['prenom'];
         $_SESSION['email'] = $getin[0]['email'];
         $_SESSION['telephone'] = $getin[0]['telephone'];
         $_SESSION['type_cmpte'] = $getin[0]['type_cmpte']; 
         $_SESSION['sexe'] = $getin[0]['sexe']; 
         $v_user->modifier("annonceur","dernier_conn", date('Y-m-d H:i:s') ,"id_annonceur"  , $_SESSION['id_annonceur'] );
         ?>
         <SCRIPT LANGUAGE="JavaScript">document.location.href="<?php echo $address;?>gerer/annonces ";</SCRIPT>
        <?php }else { ?>
         <p class="text-warning text-center"><span class="glyphicon glyphicon-exclamation-sign"></span> Vérifiez votre mot de passe
          <?php } 
     }else{ ?>
    <p class="text-danger text-center"><span class="glyphicon glyphicon-remove-sign"></span> Vérifiez votre Identifiant
   <?php }  
}
if( ($_SESSION['id_annonceur']) == "" ): ?>
<div class="row panel panel-danger" style="margin-right:15px; ">
<div class="col-sm-6 col-sm-offset-3">
      <form class="form-signin" method="POST" action="">
        <h2 class="form-signin-heading text-center">Connexion</h2>
        <label for="pseudo" class="sr-only" >Identifiant</label>
        <input type="text" name="loggin" id="pseudo" class="form-control" placeholder="Pseudo" value ="<?php echo $_POST['login']; ?>"required autofocus><br>
        <label for="password" class="sr-only">Mot de Passe </label>
        <input type="password" name="motpasse" id="password" class="form-control" placeholder="Mot de passe" required><br>
        <button class="btn btn-sm btn-danger btn-block" id="submit" type="submit" >Se connecter </button>
        <a href="<?php echo $address;?>inscription/">Pas encore de compte? Inscrivez-vous !</a><br>
        <a href="<?php echo $address;?>/inscription">Mot de passe oublié? </a>
      </form>
</div>
</div>
<?php else: ?> 
<SCRIPT LANGUAGE="JavaScript">document.location.href="<?php echo $address;?>gerer/annonces ";</SCRIPT>
<?php endif ?>
 
