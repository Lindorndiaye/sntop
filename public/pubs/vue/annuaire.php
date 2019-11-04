<style type="text/css"> a.list-group-item{padding:5px;padding-left:30px;font-size:20px;} .under{padding-bottom:5px;padding-top: 7px;}
.notice {
    padding-left: 10px;
    background-color: #fff;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
            box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.text-muted{ color:#555;}
.img-circle{ border:solid 2px #555;background-color: #eee;}
.notice-success {border-color: #32CD32; background-color: #E0FFFF;}
.notice-success strong , .notice-success span {color: #32CD32; }
.notice-success .img-circle{border:solid 2px #32CD32;}
.notice-info { border-color: #45ABCD; background-color: #F0F8FF; }
.notice-info  strong , .notice-info span { color: #45ABCD; }
.notice-info .img-circle{border:solid 2px #45ABCD;;}
.notice-warning { border-color: #FEAF20; background-color: #FAEBD7;}
.notice-warning strong , .notice-warning span { color: #FEAF20; }
.notice-warning .img-circle{border:solid 2px #FEAF20;}
.notice-danger { border-color: #d73814; background-color: #feefef;}
.notice-danger strong , .notice-danger span { color: #d73814; }
.notice-danger .img-circle{border:solid 2px #d73814;}
.notice-primary { border-color: #0000CD; background-color:#B0E0E6; }
.notice-primary strong , .notice-primary span { color: #0000CD; }
.notice-primary .img-circle{border:double 2px #0000CD;}

</style>
<div>
<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address."annuaire/" ;?>">Annuaire</a></li>
   <?php 
 if(isset($_GET['action'])){
   require_once("classes/Database.php"); $value = $_GET['value'];
   $obj= new Database();
   $annuaire=$obj->cherche_rqt("SELECT categorie FROM annuaire WHERE nom_categorie='$value' LIMIT 0,1 "); ?>
  <li class="active"><?php echo $annuaire[0]['categorie']; ?>  </li>
 <?php  } ?>
</ol>
<div class="col-sm-12">
<div class="panel panel-danger" class="list-group" style="border-color:#fff;">
  <div class="panel-heading" style="background-color:#900;color:#fff;"> <strong>Annuaire</strong> <?php echo $annuaire[0]['categorie']; ?> </div>
  <div class="panel-body" style="padding-left:0;padding-right:0;">
   <?php if(isset($_GET['action'])){ 
         $entete =$obj->cherche_rqt("SELECT * FROM entete_annuaire WHERE rubrique='$value' "); ?>
         <div class='panel panel-danger row' style='margin-left:12px;margin-right:12px;padding:0px;box-shadow:0 0 4px #ccc;'>
           <div class='col-sm-6' style='padding:0px;'> <img src='<?php echo $address."images/annuaire/".$entete[0]['image']; ?>' class='img-responsive' width='100%'> </div>
           <div class='col-sm-6'>
           <span class='text-danger'><?php echo $entete[0][texte]; ?></span><br><br>
           <p class='text-danger'> Retrouvez dans cette rubrique <?php echo $entete[0]['texte2']; ?> au Sénégal.</p>
           <p class='text-info'><span class='glyphicon glyphicon-asterisk'> </span> 
           Pour être repris dans notre listing des professionnels "<?php echo $annuaire[0]['categorie']; ?>" au Sénégal,
           envoyez-nous vos coordonnées via notre formulaire de contact. 
           </p> 
           </div>
         </div>
   <?php    $annuaires=$obj->cherche_rqt("SELECT * FROM annuaire WHERE nom_categorie='$value' AND afficher=1 ORDER BY id DESC ");
         foreach ($annuaires as $key => $value){ ?>
              <div  class="col-xs-12">
                <div class="panel panel-default notice <?php echo $value['couleur']; ?>" >
                   <div class="panel-body">
                        <center><strong><span class="glyphicon glyphicon-briefcase center"></span> <?php echo strtoupper($value['nom']); ?></strong></center>
              <div class='row'>  
                 <div class='col-sm-9'>        
                  <div class="row under">
                         <div  class="col-xs-12 text-muted">
                          <span class="glyphicon glyphicon-envelope  pull-left" style="margin-right:20px;"></span>
                          <?php echo $value['email']; ?>
                         </div>
                  </div> 
                  <div class="row under">
                         <div  class="col-xs-12 text-muted">
                          <span class="glyphicon glyphicon-earphone pull-left" style="margin-right:20px;"></span>
                          <?php echo $value['tel']; ?>
                         </div>
                  </div> 
                  <div class="row under">
                         <div  class="col-xs-12 text-muted">
                          <span class="glyphicon glyphicon-link  pull-left" style="margin-right:20px;"></span>
                          <a href="<?php echo $value['site']; ?>" target='_blank'> <?php echo $value['site']; ?> </a> 
                         </div>
                  </div>  
                   <div class="row ">
                         <div  class="col-xs-12 text-muted">
                          <span class="glyphicon glyphicon-map-marker  pull-left" style="margin-right:20px;"></span>
                          <?php echo $value['adresse']; ?>
                         </div>
                  </div>  
                </div> 
                <div  class='col-sm-3'> 
                <img src="<?php echo $address."images/annuaire/".$value['logo']; ?>" class='img-circle img-responsive ' width='100%' >
                </div>   
            </div>      
                  </div>
                </div> 
             </div>
        <?php }  
    if($annuaires == null){ ?>
    <div class="panel panel-danger">
     <div class="panel-body text-muted"><img src="<?php echo $address;?>/images/error_icon.png"> 
     <span class="aac"> Aucun contact </span> </div>  
     </div>
   <?php }  }else{ // liste des annuaires  ?>
    <div class="panel-body" >
    <a href="<?php echo $address ;?>annuaire/consultation/CréditAutomobile" class="list-group-item">Crédit Automobile</a>
    <a href="<?php echo $address ;?>annuaire/consultation/AssuranceAutomobile" class="list-group-item">Assurance Automobile</a>
    <a href="<?php echo $address ;?>annuaire/consultation/AgencedeLocation" class="list-group-item">Agences de Location</a>
    <a href="<?php echo $address ;?>annuaire/consultation/Concessionnaire" class="list-group-item">Concessionnaires</a>
    <a href="<?php echo $address ;?>annuaire/consultation/AutoEcole" class="list-group-item">Auto-Ecoles</a>
    <a href="<?php echo $address ;?>annuaire/consultation/PiècesDétachéesetAccessoires" class="list-group-item">Pièces détachées / Accessoires</a>
    <a href="<?php echo $address ;?>annuaire/consultation/Pneumatique" class="list-group-item">Pneumatique</a>
    <a href="<?php echo $address ;?>annuaire/consultation/Hydrocarbure" class="list-group-item">Hydrocarbures</a>
    <a href="<?php echo $address ;?>annuaire/consultation/GarageMécanique" class="list-group-item">Garages Mécaniques</a>
    <a href="<?php echo $address ;?>annuaire/consultation/CarosserieetPeinture" class="list-group-item">Carrosserie / Peinture</a>
    <a href="<?php echo $address ;?>annuaire/consultation/Climatisation" class="list-group-item">Climatisation</a>
    <a href="<?php echo $address ;?>annuaire/consultation/NettoyageetProfessionnel" class="list-group-item">Nettoyage Professionnel</a>
   </div>
   <?php  } // fin listes des annuaires  ?>
   </div>
  </div>
 </div>
</div>