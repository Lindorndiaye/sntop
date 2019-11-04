
<link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
<style>
.total{font-family:'Candal',cursive; width:70px;font-size: 15px;}
.progress{margin-bottom: 7px;}
.progress{ height: 30px;}
.progress-bar{padding-top: 5px;}
</style>
<?php 
require_once('classes/Database.php');
 $today = date("Y-n-j") ; 
function getNmb($champ ,$valeur ){
$obj = new Database();
$nbre=$obj->cherche_rqt("SELECT COUNT(*) as nbre FROM annonce_v WHERE $champ='$valeur' ");
return $nbre[0]['nbre'];
}
function getTotal(){
return intval(getNmb("type_annonceur","gold" ))+intval( getNmb("type_annonceur","gratuit" ))+intval( getNmb("type_annonceur","prestige" )); 	
}
?>
<div >
  <div class="progress">
  <div class="progress-bar progress-bar-primary" role="progressbar" style="width:100%">
  <span class="pull-left" style="color:#fff;"><img class="img-responsive" src="<?php echo $address;?>images/stats.png" width="18" style="margin-left:5px"></span>Total des Annonces<span class="pull-right total"> <?php echo getTotal(); ?> </span>
  </div>
</div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" style="width:100%">
   <span class="pull-left" style="color:#fff;"><img class="img-responsive" src="<?php echo $address;?>images/stats.png" width="18" style="margin-left:5px"></span> Annonces du Jour <span class="total pull-right">0<?php echo getNmb("date_a_v" , $today ); ?> </span> 
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:100%">
   <span class="pull-left" style="color:#fff;"><img class="img-responsive" src="<?php echo $address;?>images/stats.png" width="18" style="margin-left:5px"></span> Annonces Ordinnaires <span class="total pull-right">0<?php echo getNmb("type_annonceur" , "gratuit" ); ?></span>
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" style="width:100%">
   <span class="pull-left" style="color:#fff;"><img class="img-responsive" src="<?php echo $address;?>images/stats.png" width="18" style="margin-left:5px"></span> Annonces Gold <span class="total pull-right"> <?php echo getNmb("type_annonceur" , "gold" ); ?></span>
  </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-info" role="progressbar" style="width:100%">
   <span class="pull-left" style="color:#fff;"><img class="img-responsive" src="<?php echo $address;?>images/stats.png" width="18" style="margin-left:5px"></span> Annonces Prestige <span class="total pull-right">0<?php echo getNmb("type_annonceur" , "prestige"); ?></span>
  </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?php echo floor(getNmb("type_annonceur" , "gratuit" )/getTotal()*100); ?>%">
  <?php echo floor(getNmb("type_annonceur" , "gratuit" )/getTotal()*100); ?>%</div>
  <div class="progress-bar progress-bar-warning" role="progressbar" style="width:<?php echo floor(getNmb("type_annonceur" , "gold" )/getTotal()*100); ?>%">
  <?php echo floor(getNmb("type_annonceur" , "gold" )/getTotal()*100); ?>%</div>
  <div class="progress-bar progress-bar-info" role="progressbar" style="width:<?php echo  ceil(getNmb("type_annonceur" , "prestige" )/getTotal()*100); ?>%">
  <?php echo ceil(getNmb("type_annonceur" , "prestige" )/getTotal()*100); ?>%</div>
</div>
