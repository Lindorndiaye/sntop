<?php  
require_once("../../classes/Database.php");
$address="http://sn-topauto.raidghost.com/";

function getDateFin ( $formule ){
       $day = time() + ( $formule * 24 * 60 * 60);
       $date = date('Y-m-d', $day);
       return $date;
    }

$obj=new Database();
if (isset($_POST['action']) && $_POST['action']=="detail"){
?>
<div class="container-fluid">
 		<?php 
 		 	$ance = $obj->cherche_rqt("SELECT * FROM annonce_v WHERE id_a_v = ".$_POST['id']);$ance[0];
 		 	require_once("../../classes/annonce_v.php");
            $ance= new annonce_v($_POST['id']);
            $t_a = $ance->get_annonce(); $t_a=$t_a[0];
            $t_v = $ance->get_voiture($t_a['id_voiture']); $t_v=$t_v[0];
            $mm  = $ance->get_mrk_mdl( $t_v['marque_v'], $t_v['modele_v']); 
         ?>
    <div class="panel panel-danger">
  <div class="panel-heading" style="padding-top:0;padding-bottom:0;font-size: 20px; ">
  	<a class="text-danger" href="<?php echo $address."admin/annonce/".$t_a['type_annonceur'];?>"><span class="glyphicon glyphicon-circle-arrow-left" style="margin-top:5px;"></span></a> Détail de l'annonce
  </div>     
    <div class="row">
      <div class="panel-body">
      <div class="row">
      <div class="col-md-8 col-md-offset-2">  
       <div class="thumbnail"> 
	  	<img src="<?php echo $address."annonce/".$t_a['id_voiture']."/".$t_a['photos_a_v'];?>" class="img-responsive" width="100%" height="100%">
       </div> 
	</div>
   </div>
       <div class="row">
       	<div class="col-sm-2 col-sm-offset-2 "> <h4> <?php echo (number_format($t_a['prix_v'], 0 , '', ' ')); ?></h4> </div>
	  	<div class="col-sm-2"> <h4><?php echo $t_a['type_annonce']; ?></h4></div>
	    <div class="col-sm-2"> <h4><?php echo $t_a['type_annonceur']; ?></h4></div>
	    <div class="col-sm-2"> <h4><?php echo $t_v['localite']; ?></h4></div>
       </div>
  </div>
      <div class="col-md-10 col-md-offset-1 ">
       <div style="margin-bottom:20px;"> <p class="text-muted" > <?php echo $t_a['description_a_v']?> </p></div>
        <table class=" table table-bordered">
            <tr>
              <td class="text-muted color">Marque</td>
              <td class="text-muted" ><?php echo $mm[1][1];?> </td>
              <td class="text-muted color">Modèle</td>
              <td class="text-muted"><?php echo $mm[0][2];?> </td>
            </tr>
            <tr>
              <td class="text-muted color">Année</td>
              <td class="text-muted" ><?php echo $t_v['annee_v'];?> </td>
              <td class="text-muted color">Kilométrage</td>
              <td class="text-muted"><?php echo number_format($t_v['kilometrage_v'] , 0,'' ,' ')." KM";?> </td>
            </tr>
            <tr>
              <td class="text-muted color">Transmission</td>
              <td class="text-muted"><?php echo $t_v['transmission'];?> </td>
              <td class="text-muted color">Energie</td>
              <td class="text-muted"><?php echo $t_v['carburant'];?> </td>
            </tr>
            <tr>
              <td class="text-muted color">Nombre cylindre</td>
              <td class="text-muted"><?php echo $t_v['cylindre'];?> </td>
              <td class="text-muted color">Couleur</td>
              <td class="text-muted"><?php echo $t_v['couleur'];?> </td>
            </tr>
        </table>
          <div class="panel panel-danger">
             <div class="panel panel-heading" style="background-color:#900;color:#fff;">
              <h4 align="center"> EQUIPEMENTS / OPTIONS DU VEHICULE</h4>
             </div>
             <div class="panel-body">
                <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong>Carrosserie : </strong>
                  </div>
                  <div class="col-xs-9"> 
                    <?php 
                    $Options = explode(";", $t_v['carosserie']) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div><hr>
                <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Transmission : </strong>
                  </div>
                  <div class="col-xs-9"> 
                     <?php 
                    $Options = explode(";", $t_v['transmission']) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div> <hr>
              <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Intérieur : </strong>
                  </div>
                  <div class="col-xs-9"> 
                    <?php 
                    $Options = explode(";", $t_v['interieur']) ;
                    foreach ($Options as $opt) { ?>
                    <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div><hr>
               <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Extérieur : </strong>
                  </div>
                  <div class="col-xs-9"> 
                     <?php 
                    $Options = explode(";", $t_v['exterieur']) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div> <hr>
               <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Electronique : </strong>
                  </div>
                  <div class="col-xs-9"> 
                     <?php 
                    $Options = explode(";", $t_v['electronique']) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                   </div>
                </div> <hr>
               <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Options de Sécurité : </strong>
                  </div>
                  <div class="col-xs-9"> 
                     <?php 
                    $Options = explode(";", $t_v['securite']) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div> 
             </div>
          </div>
      </div>
  </div>
    </div>
</div>
</div>
<?php }else if( isset($_POST['action']) && $_POST['action']=="supprimer" ){ 
 	$vtre = $obj->cherche_rqt("SELECT id_voiture FROM annonce_v WHERE id_a_v = ".$_POST['id']);$vtre=$vtre[0]['id_voiture'];
 	$obj->suppr("annonce_v" , "id_a_v" , $_POST['id'] );$obj->suppr("voiture" , "id_v" , $vtre);
?>
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Suppression!</strong> Vous avez supprimé une annonce.
</div>
<?php  }else if( isset($_POST['action']) && $_POST['action']=="supprimerArticle" ){ 
  $obj->suppr("articles" , "id_art" , $_POST['id'] );
?>
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Suppression!</strong> Vous avez supprimé un article.
</div>
<?php  }else if( isset($_POST['action']) && $_POST['action']=="supprimerAnnuaire" ){ 
  $obj->suppr("annuaire" , "id" , $_POST['id'] );
?>
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Suppression!</strong> Vous avez supprimé un contact de l'annuaire.
</div>
<?php  }else if( isset($_POST['action']) && $_POST['action']=="supprimerCode" ){ 
  $obj->suppr("code_autotheque" , "id" , $_POST['id'] );
?>
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Suppression!</strong> Vous avez supprimé un contact de l'annuaire.
</div>
<?php  }else if( isset($_POST['action']) && $_POST['action']=="supprimerPub" ){ 
  $obj->suppr("pub" , "id" , $_POST['id'] )
?>
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Suppression!</strong> Vous avez supprimé une Publicité.
</div>
<?php  }else if( isset($_POST['action']) && $_POST['action']=="supprimerAnnonceur" ){ 
  $obj->suppr("annonceur" , "id_annonceur" , $_POST['id'] )
?>
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Suppression!</strong> Vous avez supprimé un Utilisateur.
</div>
<?php }else if(isset($_POST['action']) && $_POST['action']=="addToGold" ){ 
	   $obj->modifier("annonce_v" , "type_annonceur", "gold" , "id_a_v" , $_POST['id'] );  ?> 
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Réussi!</strong> Vous avez ajouté l'annonce à Gold.
  <meta http-equiv="refresh" content="3; URL=<?php echo "$address";?>admin/annonce/gold">
</div>
<?php }else if(isset($_POST['action']) && $_POST['action']=="addToPrestige" ){ 
	   $obj->modifier("annonce_v" , "type_annonceur", "prestige" , "id_a_v" , $_POST['id'] );  ?> 
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Réussi!</strong> Vous avez ajouté l'annonce à Prestige.
  
</div>
<?php }else if(isset($_POST['action']) && $_POST['action']=="addToGratuit"){ 
	   $obj->modifier("annonce_v" , "type_annonceur", "gratuit" , "id_a_v" , $_POST['id'] );  ?> 
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Réussi!</strong> Vous avez ajouté l'annonce à Gratuit.
 </div> 
 <?php }else if(isset($_POST['action']) && $_POST['action']=="afficherContact"){ 
     $obj->modifier("annuaire" , "afficher", 1 , "id" , $_POST['id'] );  ?> 
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Réussi!</strong> Le contact sera affiché.
 </div> 
 <?php }else if(isset($_POST['action']) && $_POST['action']=="retirerContact"){ 
     $obj->modifier("annuaire" , "afficher", 0 , "id" , $_POST['id'] );  ?> 
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Réussi!</strong> Le contact a été retiré.
 </div> 
 <?php }else if(isset($_POST['action']) && $_POST['action']== "bloquer"){ 
     $obj->modifier("annonceur" , "statut", 0 , "id_annonceur" , $_POST['id'] );  ?> 
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Réussi!</strong> L'annonceur est désactivé.
  <meta http-equiv="refresh" content="3; URL=<?php echo "$address";?>admin/annonce/gold">

 </div> 
 <?php }else if(isset($_POST['action']) && $_POST['action']== "debloquer"){ 
     $obj->modifier("annonceur" , "statut", 1 , "id_annonceur" , $_POST['id'] );  ?> 
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Réussi!</strong> L'annonceur est activé.
  <meta http-equiv="refresh" content="3; URL=<?php echo "$address";?>admin/annonce/gold">
  
 </div> 
 <?php }else if(isset($_POST['action']) && $_POST['action']=="afficherPub"){ 
    extract($_POST);$validite=getDateFin($formule);$today=date('Y-m-d');
    $obj->cherche_rqt(" UPDATE pub SET  validite='$formule' ,debut='$today' ,fin='$validite', statut = '1' WHERE id = '$id'; ");  ?> 
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Réussi!</strong> Cette pub sera affichée jusqu'au <?php echo $validite; ?>.
    <meta http-equiv="refresh" content="3; URL=<?php echo "$address";?>admin/pub/list">
 </div> 
 <?php }else if(isset($_POST['action']) && $_POST['action']=="cacherPub"){ 
     $obj->modifier("pub" , "statut", 0 , "id" , $_POST['id'] );  ?> 
 <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Réussi!</strong> La pub sera désactivée.
 </div> 
  <?php }else if(isset($_GET['action']) && $_GET['action']=="GenererCode"){ 
    // function getDateFin ( $formule ){
      // $day = time() + ( $formule * 24 * 60 * 60);
       //$date=date('Y-m-d', $day);
       //return $date;
     //}
     //function getCode( $id ){ }
     function chaine_aleatoire($date_fin, $chaine = 'AZERTYUIOPQSDFGHJKLMWXCVBN'){
       $chaine .= intval($date_fin);
       $nb_lettres = strlen($chaine) - 1;
       $generation = '';
       for($i=0; $i < 5; $i++){
            $pos = mt_rand(0, $nb_lettres);
            $car = $chaine[$pos];
            $generation .= $car;
        }
      return $generation;
    }

  ?>
    <div class="row">
       <div class="col-sm-2 text-muted ">
         Code : <strong><span class="text-danger"><?php echo $code=chaine_aleatoire( getDateFin($_GET['date_fin'] ) ); ?> </span></strong>
       </div>
       <div class="col-sm-4 text-muted">
         Expiration :  <em><span class="text-danger"><?php echo preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#"," Le $3/$2 $1", getDateFin($_GET['date_fin']) );  ?></span></em>
       </div>
       <div class="col-sm-3 text-muted">
         Utilisateur : <span class="text-danger"> <?php echo strstr($_GET['id_ancr'], " ");?></span>
       </div>
       <div class="col-sm-3 enrg">
        <form class="form" >
         <input name="code" type="hidden" value="<?php echo $code; ?>"></input><input name="date_fin" type="hidden" value="<?php echo getDateFin($_GET['date_fin']); ?>"></input><input name="id_annonceur" type="hidden" value="<?php echo intval($_GET['id_ancr']);?>"></input>
         <button type="submit" class="btn btn-xs btn-danger" id="ech" ><span class="glyphicon glyphicon-ok"></span> Enregistrer le code</button>
        </form> 
       </div>
   </div><hr>
   <script type="text/javascript">
      $(".form").submit(function(event){
        event.preventDefault();
        var value = $(this).serialize();
        var valide = $.ajax({ url: "../../vue/admin/traitement.php", data: value });
         valide.done(function( data ){
          $("#resume").prepend(data);
         });
         valide=null;
         valide.fail(function(){ alert ("Impossible");});
      });
   </script>
  <?php unset($_GET['action']); }
  if(isset($_GET['id_annonceur'] ) and $_GET['id_annonceur'] != NULL ){
      $obj->ajouter("code_autotheque" , $_GET ); ?>
      <div class="row">
       <div class="col-sm-2 text-muted ">
         Code : <strong><span class="text-danger"><?php echo $_GET['code'] ; ?> </span></strong>
       </div>
       <div class="col-sm-4 text-muted">
         Expiration :  <em><span class="text-danger"><?php echo preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#"," Le $3/$2 $1", $_GET['date_fin'] );  ?></span></em>
       </div>
       <div class="col-sm-3 text-muted">
         Utilisateur : <span class="text-danger"> <?php echo $_GET['id_annonceur'];?></span>
       </div>
       <div class="col-sm-3 text-success">
          Enregistré
       </div>
   </div><hr>
  <?php  } ?>



