<link  href="<?php echo $address ;?>css/index.css" type="text/css" >
<link  href="<?php echo $address ;?>css/owl.carousel.css" type="text/css" >

<style type="text/css">
.sliders{border:solid 1px #ccc;background-position: center;   font-size: 20px;overflow: hidden;}
.t-voiture{padding-left:20px ;width:100%;height: 80px;line-height:80px ;background-color: #333;opacity: 0.2; color:white;}
.t-data{padding-left:20px ;width:250px;height: 50px;line-height:50px ;background-color: #fff;border: solid 1px #900;opacity: 0.7;}
.badge{background-color: #fff;color:#333 ;} 
.icon{padding-bottom:10px; }
.total{border-radius:2px;background-color: #333; letter-spacing:5;padding-left:5px ; color:#fff;}
.go-previous, .go-next {margin: 4px;padding: 5px 10px;text-decoration: none;}
.my-navigation{text-align: center;white-space: nowrap;overflow-x: auto;}             
.my-navigation img {opacity: 0.6;cursor: pointer;}
.my-navigation img.active {opacity: 1;background-color:#900;}
.img-circle{border-color:#900;background-color:#900; }
.well{padding: 5px;border-radius: 0;font-size:11px; }
.well img{width:120;} 
.well a{color:#900;font-size:11px;}
.well:hover{cursor: pointer;box-shadow: 10px 10px 50px 0 gray ;background-color: #fff; text-decoration:none; }
.descpr{position:absolute;left:20px;top:220px;z-index:10; background-color: #fff;height:130px;width: 400px;opacity:0.9;border-radius: 6px;padding: 10px; } 
</style>
<div class="row" style="background-color:#feefef;border:solid 1px #C44C51;margin-left:13px;margin-right:13px;padding:5px;margin-bottom:8px;">
 <center>
  <a href="<?php echo $address?>connexion/" style="margin-right:20px;"><button class="btn btn-xs btn-danger" style="border-radius:0;">Connection</button></a><a href="<?php echo $address?>inscription/" style="margin-right:20px;">
  <button class="btn btn-xs btn-danger" style="border-radius:0;">Créer un compte</button></a><a href="<?php echo $address?>publier/annonce" style="margin-right:20px;"><button class="btn btn-xs btn-danger" style="border-radius:0;">Poster une annonce</button></a><a href="<?php echo $address?>autotheque/consultation" style="margin-right:20px;">
  <button class="btn btn-xs btn-danger" style="border-radius:0;">Consultation autothèque</button></a><a href="<?php echo $address?>annonce/voiture" style="margin-right:20px;"><button class="btn btn-xs btn-danger" style="border-radius:0;">Consulter les annonces</button></a><a href="<?php echo $address?>annuaire/" style="margin-right:20px;"><button class="btn btn-xs btn-danger" style="border-radius:0;">Consulter l'annuaire</button></a><a href="<?php echo $address?>newsletter/" style="margin-right:;"><button class="btn btn-xs btn-danger" style="border-radius:0;">Newsletter</button></a></center></div>
  <?php require_once('classes/annonce_v.php'); 
    function getNumber( $categorie ){
      $obj= new Database();
      $nbre=$obj->cherche_rqt(" SELECT COUNT(*) as nbre FROM voiture WHERE categorie='$categorie' ");
      return $nbre[0]['nbre'];
    }
   	  $obj= new Database();
   	  $golds = $obj->get_gold();   	
 	?>
<div class="row hidden-xs" style="margin-left:13px;margin-right:13px;background-color:initial;">
<strong><div style="background-color:#900;color:#fff;margin-bottom:0;height:40px;line-height:40px;padding-left:10px;" > TOP GOLD </div></strong>
<div class="col-md-12 " style="margin-bottom:0;border: solid 1px #900;border-bottom-color:#ccc; ">
   <div class="col-md-10 col-md-offset-1" style="background-color:initial;">
      <div class="sliders" id="sliders" >
     <?php  foreach ($golds as $g => $gold ) { 
       $obj = new Annonce_v($gold['id_a_v']);
       $t_v = $obj->get_voiture($gold['id_voiture']); $t_v=$t_v[0];
       $mm  = $obj->get_mrk_mdl( $t_v['marque_v'], $t_v['modele_v']); 
       ?>
       	    <div data-lazy-background="<?php echo $address."annonce/".$gold['id_voiture']."/".$gold['photos_a_v']; ?>">
                <h3 class="t-voiture" data-pos="['50%', '50%', '0%', '0%']" data-duration="700" data-effect="move">
                   <?php echo $mm[1][1]." ".$mm[0][2] ." (".$t_v['annee_v'].")" ;?>
                </h3>
               <div data-pos="['26%', '-40%', '26%', '2%']" data-duration="700" data-effect="move">
                   <div class="t-data">
                    <img  data-lazy-src="<?php echo $address."images/carb.png"; ?>" class="icon" width="30">
                     <?php echo $t_v['carburant']; ?>
                   </div>  
                </div>
                <div data-pos="['36%', '-40%', '38%', '2%']" data-duration="700" data-effect="move">
                    <div class="t-data">
                    <img data-lazy-src="<?php echo $address."images/manuel.jpg"; ?>" class="icon" width="30">
                     <?php echo $t_v['transmission']; ?>
                   </div>
                </div>
                <div data-pos="['46%', '-40%', '50%', '2%']" data-duration="700" data-effect="move">
                    <div class="t-data">
                    <img data-lazy-src="<?php echo $address."images/kil.jpg"; ?>" class="icon" width="40">
                     <?php echo (number_format($t_v['kilometrage_v'])." Km"); ?>
                   </div>
                </div>
                <div data-pos="['56%', '-40%', '62%', '2%']" data-duration="700" data-effect="move">
                   <div class="t-data">
                    <img data-lazy-src="<?php echo $address."images/argent.jpg"; ?>" width="40" class="icon">
                     <?php echo (number_format($gold['prix_v'],0,'',' ')); ?>F.CFA
                   </div>
                   </div>
              <div data-pos="['90%', '90%', '80%', '70%']" data-duration="1400" data-effect="move">
                   <a href="<?php echo $address ;?>annonce/detail-<?php echo $gold['id_a_v']."-".$t_v['id_v'] ;?>">
                   <img src="<?php echo $address ;?>images/detail.png"> 
                   </a>
                   </div>      
                </div>   
      <?php } ?>
  </div>    
</div>
</div>
</div>
<div class="row hidden-xs" style="margin-left:13px;margin-right:13px;">
<div class="my-navigation" style="background-color:#eee;border: solid 1px #900;border-top-color:#ccc;">
      <?php  foreach ($golds as $g => $gold ) { ?>
          <img src=<?php echo $address."annonce/".$gold['id_voiture']."/".$gold['photos_a_v']; ?> class="img-thumbnail " width="70"/>
      <?php } ?>
</div>
<br><br>
</div>

<div class="row"  style="margin-left:3px;margin-right:3px;"> 
  <div class="col-sm-8 " >
   <div class="row">
   <?php include 'vue/assets/controlPanel.php';?>
   </div>
   <div class="panel panel-default" >
   <div class="panel-heading" id="concessionnaire"  style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;" >
     <strong><center>TOP CONCESSIONNAIRES </center></strong>
   </div>
   <div class="panel-body" style="padding:5px;"> <!-- TOP CONCESSIONNAIRE -->

<div class="owl-carousel">
<?php 
$obj= new Database();
$cnc=$obj->cherche_rqt("SELECT * FROM conc LIMIT 0, 30"); 
foreach ($cnc as $c => $conc ) { ?>
    <div  style="height:100px;line-height:100px;display:inline;text-align:center!important;" > 
    <a href="<?php echo $conc['link']?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $conc['nom'] ;?>">
    <img class="img-thumbnail" style="" src="<?php echo $address."/images/conc/".$conc['logo'];?>" alt="<?php echo $conc['nom'] ;?>" > 
    </a>
    </div>
<?php } ?>
</div>

   </div>
   </div>

   <div class="panel panel-danger" >
   <div class="panel-heading" id="concessionnaire" style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;">
     <strong><center>TOP PRESTIGE </center></strong>
   </div>
   <div class="owl-prestige" >
<?php 
$obj= new Database();
$prstge=$obj->cherche_rqt("SELECT id_a_v, type_annonceur, id_voiture, date_a_v, prix_v ,photos_a_v FROM annonce_v WHERE type_annonceur= 'prestige' ");
foreach ($prstge as $p => $ptg ) {
$obj = new annonce_v($ptg['id_a_v']);
$t_v = $obj->get_voiture($ptg['id_voiture']); $t_v=$t_v[0];
$mm  = $obj->get_mrk_mdl( $t_v['marque_v'], $t_v['modele_v']);?> 
<div style="padding-left:10px;padding-right:10px;padding-bottom:10px;"> 
<a href="<?php echo $address ;?>annonce/detail-<?php echo $ptg['id_a_v']."-".$t_v['id_v'] ;?>">
<img class="img-thumbnail" src="<?php echo $address."annonce/".$ptg['id_voiture']."/".$ptg['photos_a_v']; ?>" alt="Annonce Prestige">
</a> 
<div class="descpr">
  <div >
      <h4><?php echo $mm[1][1]." ".$mm[0][2] ." ".$t_v['annee_v'] ;?></h4>
    <table class="table">
     <tr>
     <td><p> Carburant :<span class="text-danger" > <?php echo $t_v['carburant']; ?></span>
     <td><p> Transmission :<span class="text-danger"> <?php echo $t_v['transmission']; ?></span>
     </tr>
     <tr>
     <td><p>Prix : <span class="text-success"><?php echo (number_format($gold['prix_v'],0,'',' ')); ?> F.CFA</span>     	
     <td><p>Kilomètrage : <span class="text-danger"><?php echo (number_format($t_v['kilometrage_v'])." Km"); ?></span>
     </tr>
    </table>
  </div>           
</div>
</div>
<?php } ?>
   </div>
   </div>

   <div class="panel panel-danger"  id="partype" style="margin-bottom:0;">
      <div class="panel-heading" style="background-color:#900;color:white;font-size:16px;padding:5px;">
       <strong>ANNONCES PAR TYPE</strong> 
      </div>
      <div class="panel-body">
         <div class="row">
           <div class="col-sm-4 "> 
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/berline">
              <img src="<?php echo $address ;?>/images/voitures/berline.png"><br>
             Berline</a> (<?php echo getNumber("berline");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/suv-4x4"> 
              <img src="<?php echo $address ;?>/images/voitures/suv-4x4.png"><br>
              SUV / 4x4</a> (<?php echo getNumber("suv-4x4");?>)
          
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/citadine"> 
              <img src="<?php echo $address ;?>/images/voitures/citadine.png"><br>
              Citadine</a> (<?php echo getNumber("citadine");?>)
            
            </center> </div>
           </div>
         </div>
         <div class="row">
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/pick-up">
              <img src="<?php echo $address ;?>/images/voitures/pick-up.png"><br>
              Pick-up</a> (<?php echo getNumber("pick-up");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/cabriolet">
              <img src="<?php echo $address ;?>/images/voitures/cabriolet.png"><br>
              Cabriolet</a> (<?php echo getNumber("cabriolet");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/collection">
              <img src="<?php echo $address ;?>/images/voitures/collection.png"><br>
              Collection</a> (<?php echo getNumber("collection");?>)
            </center> </div>
           </div>
     
         </div>
         <div class="row">
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/luxe">
              <img src="<?php echo $address ;?>/images/voitures/luxe.png"><br>
              Luxe</a> (<?php echo getNumber("luxe");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
            <a href="<?php echo $address ;?>recherche/categorie/break">
              <img src="<?php echo $address ;?>/images/voitures/break.png"><br>
              Break</a> (<?php echo getNumber("break");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/coupe-sport">
              <img src="<?php echo $address ;?>/images/voitures/coupe-sport.png"><br>
              Coupé / Sport</a> (<?php echo getNumber("coupe-sport");?>)
            </center> </div>
           </div>
           </div>
         <div class="row">
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/bus">
              <img src="<?php echo $address ;?>/images/voitures/bus.png"><br>
              Bus</a> (<?php echo getNumber("bus");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/camion">
              <img src="<?php echo $address ;?>/images/voitures/camion.png"><br>
              Camion</a> (<?php echo getNumber("camion");?>)
            </center> </div>
           </div>
            <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/mini-bus">
              <img src="<?php echo $address ;?>/images/voitures/fourgon.png"><br>
              Mini-bus</a> (<?php echo getNumber("mini-bus");?>)</a>
            </center> </div>
           </div>
         </div>
      </div>
   </div>
  </div>
  <div class="col-sm-4">
    <div class="panel panel-danger" style="border-color:#333;">
      <div class="panel-heading text-center" style="background-color:#333;border-top: solid 9px #900; color:#fff;">
       <strong >  PORTRAIT DE LA SEMAINE</strong>
      </div>
      <div class="panel-body" style="background:#ccc;">
       <center> 
      <?php 
      $obj= new Database();
      $portrait=$obj->cherche_rqt("SELECT * FROM articles WHERE rubrique='portrait' ORDER BY id_art DESC  LIMIT 1 ");$portrait=$portrait[0];
       ?>
     
      <div>
        <h4 class="text-danger"><?php echo strtoupper($portrait['nom_article']); ?></h4>
        <img src="<?php echo $address.'images/actu/'.$portrait['photo_actu'];?>" class="img-responsive img-thumbnail">
       </div>
       <h4 class="text-muted"><b><?php echo substr($portrait['text_intro'],0 , 170); ?></b></h4>
        <a href="<?php echo $address.$portrait['titre'];?>"> <button class="btn btn-xs btn-danger" style='padding-left:20px;padding-right:20px;'>Lire la suite</button></a>

       </center>
       </div>
      </div>

  <div class="panel panel-danger" style="">
      <div class="panel-heading text-center" style="background-color:#333;border-top: solid 10px #900; color:#fff;">
       <strong><span class="glyphicon glyphicon-stats" style="font-size:20px;"></span> STATISTIQUES DES ANNONCES </strong>
      </div>
      <div class="panel-body">
     <?php include 'vue/assets/stats.php'; ?>
      </div>
  </div>
  <div class="panel panel-default" style="">
      <div class="panel-heading text-center" style="">
      <strong> <span class="glyphicon glyphicon-link"></span> LIENS UTILES</strong>
      </div>
      <?php include 'vue/assets/liensUtiles.php' ?>
  </div>
<div style="margin-top:20px;"> 
<?php
$pub=new Pub();
$mapub=$pub->get_pub("accueil_lateral");
if($mapub != null ) :
 ?>
<div class="pub-nogutter">
  <a href="<?php echo $mapub[0]['link']; ?>" target="_blank">    
    <img src="<?php echo $address."pubs/".$mapub[0]['photo']; ?>" width="100%">
  </a>
</div>
<?php endif ?>
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo $address ;?>js/index.js" ></script>
<script type="text/javascript" src="<?php echo $address; ?>js/devrama/devrama-slider.jquery.js"></script>
<script type="text/javascript" src="<?php echo $address; ?>js/owl.carousel.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.sliders').DrSlider({width:890,height:475,'showNavigation': false,'classNavigation': 'my-navigation','duration' : 6000, 'progressColor': '#FF0000'}); //Yes! that's it!
     var owl = $('.owl-carousel');owl.owlCarousel({items:9,loop:true,margin:10,autoplay:true,autoplayTimeout:1000,autoplayHoverPause:true});
     var owlpr = $('.owl-prestige');owlpr.owlCarousel({items:1,loop:true,autoplay:true,autoplayTimeout:4000,autoplayHoverPause:true});
   });
</script>
 	

