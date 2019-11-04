<?php 
if($_GET['page'] == 'publier-annonce.php'){$pb="active";}else if($_GET['page'] == 'gerer-annonces.php'){$gr="active";}else if($_GET['page'] == 'messagerie.php'){$me="active";}
else if($_GET['page'] == 'gerer-compte.php'){$gc="active";}
require_once('classes/Database.php');
function getNmNwMessage($id_annonceur){
$obj = new Database();
$nbre=$obj->cherche_rqt("SELECT COUNT(*) as nbre FROM messagerie WHERE id_destinataire='$id_annonceur' and statut=0 ");
return $nbre[0]['nbre'];
}
if( ($_SESSION['id_annonceur']) != "" ): ?>
  <h5 align="" style="margin: 2px;margin-bottom:20px;"> 
    <span class="glyphicon glyphicon-user"></span>
    <?php echo strtoupper($_SESSION['prenom'])." ".strtoupper($_SESSION['nom']) ; ?>
  </h5>
  <ul class="nav nav-pills nav-stacked ">
     <li class="<?php echo $pb ?>"> <a href="<?php echo $address ;?>publier/annonce"><span class="glyphicon glyphicon-plus"></span> Nouvelle Annonce</a></li>
     <li class="<?php echo $gr ?>"> <a href="<?php echo $address ;?>gerer/annonces"><span class="glyphicon glyphicon-th-list"></span> Mes Annonces</a> </li>
     <li class="<?php echo $me ?>"> <a href="<?php echo $address ;?>messagerie/"><span class="glyphicon glyphicon-envelope"></span> Mes Messages<span class="badge pull-right"><?php echo getNmNwMessage($_SESSION['id_annonceur']); ?></span></a></li>
     <li class="<?php echo $gc ?>"> <a href="<?php echo $address ;?>gerer/compte"><span class="glyphicon glyphicon-cog"></span> Mon Compte</a> </li>
  </ul>
<?php else: ?>
  <a href="<?php echo $address;?>connexion/">
  <button class="btn btn-sm form-control btn-danger"> Connectez- vous</button></a>
<?php endif ?>
<div style="margin-top:20px;"> 
<?php
$pub=new Pub();
$mespubs=$pub->get_pub_simple(20);
foreach ($mespubs as $pub) { ?>
<div class="pub-nogutter">
  <a href="<?php echo $pub['link']; ?>" target="_blank">    
    <img src="<?php echo $address."pubs/".$pub['photo']; ?>" width="100%" >
  </a>
</div>
<?php } ?>
</div>