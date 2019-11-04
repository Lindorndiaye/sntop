<?php ob_start(); 
session_start();
?> 
<!DOCTYPE ><html lang="fr"><head><link rel="stylesheet" type="text/css" href="<?php echo $address;?>css/bootstrap.css"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Administration</title><style rel="stylesheet">body{background-color:#850606;padding-top: 40px;padding-bottom: 40px;color:#fff;}.form-signin {max-width: 330px;padding: 15px;margin: 0 auto;}.form-signin .form-control {position: relative;height: auto;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 10px;font-size: 16px;}.form-signin .form-control:focus {z-index: 2;}.form-signin input[type="text"] {margin-bottom: -1px;border-bottom-right-radius: 0;border-bottom-left-radius: 0;}.form-signin input[type="password"] {margin-bottom: 10px;border-top-left-radius: 0;border-top-right-radius: 0;}</style><body><div class="container"><form class="form-signin" action="" method="POST"><div class="row" style="margin-bottom:20px"><center><img src="<?php echo $address; ?>images/auto.png" class="img-thumbnail " width="350">
  <h3 style="color:#fff;">ADMINISTRATION TOP AUTO</h3>
</center></div><label for="login" class="sr-only">Identifiant</label><input type="text" name="pseudo" id="login" value="<?php echo $_POST['login']; ?>" class="form-control" placeholder="Pseudo" required autofocus><label for="password" class="sr-only">Mot de passe </label><input type="password" name="motpasse" id="pswrd" class="form-control" placeholder="Mot de passe" required><button class="btn btn-lm btn-default btn-block" name="connection" type="submit"> <span class="glyphicon glyphicon-wrench"></span> Connection </button></form><div class="row"><center><?php 
 if ($_POST['motpasse']){
   extract($_POST);
   $obj = new Database();
   $user = $obj->cherche_all("admin", "admin" , $pseudo );
      if ($user != NULL) {
        $getin = $obj->cherche_rqt("SELECT * FROM admin WHERE admin='$pseudo'  AND motdepasse='$motpasse' ");
        if ($getin != NULL) {
          $_SESSION['admin']=$getin[0]['admin'];
          $_SESSION['motdepasse']=$getin[0]['motdepasse']; ?>
          <script type="text/javascript">document.location.href="<?php echo $address;?>admin/annonce/list"</script>  
       <?php }else{
          echo "Mot de passe Incorrect";
        }
      }else{
         echo "Pseudo Incorrect";
      }
} ?></center> </div></div><script type="text/javascript" src="<?php echo $address;?>js/jquery.js"></script><script type="text/javascript" src="<?php echo $address;?>js/bootstrap.js"></script></body></html><footer style="text-align:right;color: #fff;padding: 10px" class="navbar-fixed-bottom"><span class="glyphicon glyphicon-copyright-mark"></span> Designed by MastCorp</footer>
