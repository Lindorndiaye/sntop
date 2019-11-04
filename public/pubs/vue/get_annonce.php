<?php 
function get_annonce($ance, $address){ 
$obj = new Database();
$tab_voiture = $obj->cherche_rqt("SELECT * FROM voiture WHERE id_v =".$ance['id_voiture'] ); 
if($tab_voiture != null ):
$mrk = $obj->cherche_rqt("SELECT title FROM marque WHERE id = ".$tab_voiture[0]['marque_v'] ); 
$mdl = $obj->cherche_rqt("SELECT title FROM modele WHERE id = ".$tab_voiture[0]['modele_v'] ); ?>
 <div class="panel panel-danger lien" style="margin-bottom:10px;"><div class="panel-body"><div class="row"><div class="col-md-3" style="margin-bottom:5px;"><div class="thumbnail"> 
            <a href="<?php echo $address ;?>annonce/detail-<?php echo $ance['id_a_v']."-".$tab_voiture[0]['id_v'] ;?>">
             <?php if($ance['photos_a_v'] !="logo.png" ): ?>
            <img class="tag" src="<?php echo $address.'images/'.$ance['type_annonce'].'.png'; ?> "> 
            <img src="<?php echo $address.'annonce/'.$ance['id_voiture'].'/'.$ance['photos_a_v']; ?>" class="img-responsive" width="98%" style="margin:2px;"> </a>
            <?php else: ?><img src="<?php echo $address ;?>images/TOP.png" class="img-responsive " width="98%" style="margin:2px;"> </a>
            <?php endif ?></div>
           <?php 
           $cu=check_user($ance['id_annonceur']) ;
           if($cu['type_cmpte'] == "professionnel"): ?>
            <center><a href="<?php echo $address."annonceur/professionel/".$ance['id_annonceur']; ?>" >
            <img src=" <?php echo $address."images/conc/".$cu['logo']; ?> " class="logo_conc img-thumbnail "></a></center>
         <?php else: ?>
            <center> <img src="<?php echo $address."images/conc/particulier.jpg"; ?> " class="logo_conc img-thumbnail"></center>
        <?php endif ?></div><div class="col-md-9"><div class="row"><div class="barre"><strong style="color:white;"><?php echo strtoupper($mrk[0]['title']." ".$mdl[0]['title'])." (".$tab_voiture[0]['annee_v'].")" ;?></strong>
          <?php if ($ance['type_annonceur'] != 'gratuit'): ?>
            <img src="<?php echo $address."images/".$ance['type_annonceur'].".png";?>" class="pull-right img-respondive" width="78" style="margin-top:;margin-right:; "> 
           <?php endif ?></div><div class="col-sm-3 col-xs-6  "><div class="panel panel-default opt"><span class="pull-left"><img src="<?php echo $address ?>/images/manuel.jpg" class="img-rounded" height="28"> </span> <p class="text-center"> <?php echo $tab_voiture[0]['transmission'];?></div></div><div class="col-sm-3 col-xs-6 "><div class="panel panel-default opt"><span class="pull-left"><img src="<?php echo $address ?>/images/carb.png" class="img-rounded" height="28"></span> <p class="text-center"> <?php echo $tab_voiture[0]['carburant']; ?></div></div><div class="col-sm-3 col-xs-6"><div class="panel panel-default opt"><span class="pull-left"><img src="<?php echo $address ?>/images/kil.jpg" class="img-rounded" height="28"></span><p class="text-center"> <?php echo (number_format($tab_voiture[0]['kilometrage_v'] ,0 , '' , ',')); ?> Km </div></div><div class="col-sm-3 col-xs-6"><div class="panel panel-danger opt " style="background-color:#eee;color:#900;"><span class="pull-left"></span> <p class="text-center"><strong><?php echo (number_format($ance['prix_v'], 0 , '', ' ')); ?> F.CFA</strong></div></div></div> <div class="panel panel-default text-muted hidden-xs" style="padding:5px;"><?php echo $ance['titre_a_v']; ?></div><div class="row"> <div class="col-sm-3 col-xs-4">
        <?php 
        $today = date("Y-n-j"); $day=$ance['date_a_v']; 
        $diff = abs(strtotime($today) - strtotime($day));
        $days = floor ($diff / (60*60*24) );
        if($days == 0){ $day="Aujourd'hui"; }
        else if($days == 1){  $day = "Hier";}
        else if($days == 2){  $day = "Avant hier" ;}
        else { $day = "Il y'a $days jours "; } ?> 
        <p class="text-muted"><?php echo $day;?></div><div class="col-sm-4 hidden-xs"><p class="text-warning"><span class=" glyphicon glyphicon-map-marker"></span> <?php echo " ".$tab_voiture[0]['localite']; ?> </div><div class="col-xs-4 col-sm-3"><form class="form-inline" method="post" action="<?php echo $address ;?>annonce/detail-<?php echo $ance['id_a_v']."-".$tab_voiture[0]['id_v'] ;?>"><button type="submit" class="btn btn-xs btn-default pull-right" name="recommander"><span class="glyphicon glyphicon-share"></span> Recommander</button></form> </div><div class="col-sm-2 col-xs-4"><a href="<?php echo $address ;?>annonce/detail-<?php echo $ance['id_a_v']."-".$tab_voiture[0]['id_v'] ;?>"><button type="button" class="btn btn-xs btn-danger pull-right"> Détails </button></a></div></div></div></div></div></div> 
<?php endif ?>
<?php  
}
if( isset($_POST['start']) ){
 require_once("../classes/Database.php");
 $obj = new Database(); extract($_POST);
 $tab_annonce = $obj->cherche_rqt("SELECT * FROM annonce_v ORDER BY id_a_v DESC LIMIT $start , $limit " );
 foreach( $tab_annonce as $ance ){ 
     get_annonce($ance , "http://sn-topauto.raidghost.com/");
  }
}
?>
