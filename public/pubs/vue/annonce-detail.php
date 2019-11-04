<link  href="<?php echo $address ;?>css/index.css" rel="stylesheet" type="text/css" >
<link  href="<?php echo $address ;?>css/annonce-detail.css" rel="stylesheet" type="text/css" >
<script type="text/javascript">
  window.___gcfg = {lang: 'fr'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<head>
	<title>Your Website Title</title>
    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	<meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Your Website Title" />
	<meta property="og:description"   content="Your description" />
	<meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
</head>
<?php
$id_ance=$_GET['id_a_v'];
$id_vtre =$_GET['id_v'];
require_once("classes/annonce_v.php");
$ance= new annonce_v($id_ance);
$t_a = $ance->get_annonce(); $t_a=$t_a[0];
$t_v = $ance->get_voiture($id_vtre); $t_v=$t_v[0];
$mm  = $ance->get_mrk_mdl( $t_v['marque_v'], $t_v['modele_v']); 
include 'vue/assets/search.php';
include 'vue/assets/controlPanel.php';
?>
<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address."annonce/voiture" ;?>">Annonce Véhicule</a></li>
   <li class="active"><?php echo $mm[1][1]." ".$mm[0][2]; ?></li>
</ol>
<div class="" style="margin-bottom:0;">
<?php 
if( 
isset($_POST['submit']) ){
extract($_POST);
$headers = 'From:'.$exp."\r\n" ;
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message .= "<br><table  align='center' width='100%' style='border:solid 1px #ddd;margin-top:20px;margin-bottom:20px;'>
            <tr style='border-bottom: 1px solid #ddd;'>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;' >Marque</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'> ".$mm[1][1]."</td>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Modèle</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>".$mm[0][2]."</td>
            </tr>
            <tr style='border-bottom: 1px solid #ddd;'>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Année</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>".$t_v['annee_v']."</td>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Kilométrage</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>".$t_v['kilometrage_v']." </td>
            </tr>
            <tr style='border-bottom: 1px solid #ddd;'>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Transmission</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'> ".$t_v['transmission']."</td>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Energie</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>".$t_v['carburant']."</td>
            </tr>
            <tr style='border-bottom: 1px solid #ddd;'>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>Nombre cylindre</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'> ".$t_v['cylindre']."</td>
              <td style='background-color:#eee;border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'>couleur</td>
              <td style='border-bottom: 1px solid #ddd;height:40px;padding-left:5px;'> ".$t_v['couleur']."</td>
            </tr>
      </table><br>"; 
$message .="\n <a href='".$address."annonce/detail-".$id_ance."-".$id_vtre."'>Voir les details du vehicule.</a> ";

for ($i=0; $i < count($dest) ; $i++) { 
if(mail( $dest[$i] ,"Cette voiture peut vous interesser ", $message ,$headers) ){ ?>
<div class="alert alert-success">
  <a href="#" class="pull-right" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-remove"></span></a>
  <strong> Un message a été envoyé à <?php echo $dest[$i]; ?>.</strong>
</div>
<?php }else { ?>
<div class="alert alert-danger">
  <a href="#" class="pull-right" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-remove"></span></a>
  <strong> L'annonce ne peut pas être partagée, veuillez vérifier l'adresse mail <?php echo $dest[$i]; ?>.</strong>
</div>
<?php }  
}

}else if(isset($_POST['id_destinataire'])){
$obj= new Database();
$_POST['message']=nl2br($_POST['message']);
$_POST['date_envoi']=date('Y-m-d');
if($obj->ajouter("messagerie" , $_POST)){ ?>
<div class="alert alert-success">
  <a href="#" class="pull-right" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-remove"></span></a>
  <strong> Votre message a été envoyé à l'annonceur.</strong>
</div>
<?php  }  }  ?>
<div class="panel panel-danger" style="margin-bottom:0;">
  <div class="panel-heading" style="background-color:#900;color:white;padding-left:10px;overflow:hidden;">
    <strong> <?php echo strtoupper($mm[1][1]." ".$mm[0][2] ." (".$t_v['annee_v']).")";   ?></strong>
    <?php if($t_a['type_annonceur'] != "gratuit"): ?>
     <img src="<?php echo $address."images/".$t_a['type_annonceur'].".png";?>" width="102" class="pull-right">
    <?php endif ?> 
  </div>
  <div class="panel-body">
     <div class="row">
        <div class="col-md-6">
         <p> <span class="glyphicon glyphicon-map-marker"></span> <?php echo $t_v['localite']; ?>  
        <div class="thumbnail"> 
          <?php if($t_a['photos_a_v'] == "logo.png"){
          echo "<img src=' ".$address."images/TOP.png ' class='img-responsive'> " ;
          }else{ ?>
          <img class="tag" src="<?php echo $address.'images/'.$t_a['type_annonce'].'.png'; ?> "> 
	  	    <img src="<?php echo $address."annonce/".$t_a['id_voiture']."/".$t_a['photos_a_v'];?>" class="img-pp img-responsive" width="98%" height="98%"  style="margin:2px;cursor: pointer;">
          <?php } ?>
        </div> 
	  	    <div class="prix_a"> <h4> <?php echo (number_format($t_a['prix_v'], 0 , '', ' ')); ?> F.CFA</h4> </div>
	     </div>
	     <div class="col-md-6 fixe">
    <?php if($t_v['photos_v'] != "logo.png" or $t_v['photos_v'] == "" ): ?>
	       <?php  $t_a_v=explode(";" ,$t_v['photos_v']); 
	     	foreach($t_a_v as $tof){ ?>
	     	<img src="<?php echo $address."annonce/".$t_v['id_v']."/".$tof; ?> " class="img-thumbnail img-responsive" width="100">
	      <?php  } ?>
    <?php endif ?>
	     </div>
    </div>
  </div>
</div>
    <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-danger" style="margin-top:10px;border-color:#900;margin-bottom:10px;">
          <div class="blockquote-box blockquote-danger clearfix">
                <div class="square pull-left">
                    <img src="<?php echo $address."images/voitures/".$t_v['categorie'].".png";?>" alt="" class="img-responsive"  style="opacity:0.9;" />
                </div>
              <div style="height:100px;overflow:scroll;">
                <h5 class="text-muted"><u><strong>DESCRIPTION</strong></u></h5>
                <p class="text-muted"> <?php echo $t_a['description_a_v']?> </p>
              </div>
         </div> 
      </div>
    <div>
      <div class="col-xs-4 no-gutter">
        <button class="form-control btn btn-sm btn-detail afficheNum"><span class="glyphicon glyphicon-phone"></span> Afficher le Numéro</button>
      </div>
      <div class="col-xs-4 no-gutter">
        <button class="form-control btn btn-sm btn-detail message"><span class="glyphicon glyphicon-envelope"></span> Envoyer Message</button>
      </div>
      <div class="col-xs-4 no-gutter">
        <button class="form-control btn btn-sm btn-detail partager"><span class="glyphicon glyphicon-share-alt"></span> Partager ce Véhicule</button>
      </div>
  </div>
<div >
      <table class="table table-bordered" style="margin-bottom:10px;">
            <tr>
              <td class="text-muted color visible-xs">Marque / Modèle</td>
              <td class="text-muted color hidden-xs">Marque</td>
              <td class="text-muted" ><?php echo $mm[1][1];?> </td>
              <td class="text-muted color hidden-xs">Modèle</td>
              <td class="text-muted"><?php echo $mm[0][2];?> </td>
            </tr>
            <tr>
              <td class="text-muted color visible-xs">Année / Kilomètrage</td>
              <td class="text-muted color hidden-xs">Année</td>
              <td class="text-muted" ><?php echo $t_v['annee_v'];?> </td>
              <td class="text-muted color hidden-xs">Kilomètrage</td>
              <td class="text-muted"><?php echo number_format($t_v['kilometrage_v'] , 0,'' ,' ')." KM";?> </td>
            </tr>
            <tr>
              <td class="text-muted color visible-xs">Transmission / Energie</td>
              <td class="text-muted color hidden-xs">Transmission</td>
              <td class="text-muted"><?php echo $t_v['transmission'];?> </td>
              <td class="text-muted color hidden-xs">Energie</td>
              <td class="text-muted"><?php echo $t_v['carburant'];?> </td>
            </tr>
            <tr>
              <td class="text-muted color visible-xs">Cylidre / Couleur</td>
              <td class="text-muted color hidden-xs">Nombre cylindre</td>
              <td class="text-muted"><?php echo $t_v['cylindre'];?> </td>
              <td class="text-muted color hidden-xs">Couleur</td>
              <td class="text-muted"><?php echo $t_v['couleur'];?> </td>
            </tr>
      </table>
</div>
 <div class="panel panel-danger" style="margin-bottom:10px;">
             <div class="panel panel-heading" style="background-color:#900;color:#fff;padding-left:10px;">
                 <h5><strong>Equipements du Véhicule</strong></h5>
             </div>
   

      <?php if($t_v['carosserie'] != "" ): ?>
             <div class="panel-body">
                <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong>Carrosserie : </strong>
                  </div>
                  <div class="col-xs-9 col-md-10"> 
                    <?php 
                    $Options = explode(";", $t_v['carosserie']) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div><hr bgcolor="#000">
              <?php endif ?>
              <?php if($t_v['transmissions'] != "" ): ?>
              <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Transmission : </strong>
                  </div>
                  <div class="col-xs-9 col-md-10"> 
                    <?php 
                    $Options = explode(";", $t_v['transmissions']) ;
                    foreach ($Options as $opt) { ?>
                    <span  class="option"><?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div><hr> 
                <?php endif ?>
                <?php if($t_v['interieur'] != "" ): ?>
                <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Intérieur : </strong>
                  </div>
                  <div class="col-xs-9 col-md-10"> 
                    <?php 
                    $Options = explode(";", $t_v['interieur']) ;
                    foreach ($Options as $opt) { ?>
                    <span  class="option"><?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div><hr style='background-color:#333;'>
                <?php endif ?><?php if($t_v['exterieur'] != "" ): ?>
               <div class="row">
                  <div class="col-xs-3 col-md-2 "> 
                   <strong> Extérieur : </strong>
                  </div>
                  <div class="col-xs-9 col-md-10"> 
                     <?php  
                    $Options = explode(";", $t_v['exterieur']) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"><?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div> <hr>
                <?php endif ?><?php if($t_v['electronique'] != "" ): ?>
               <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Electroniques : </strong>
                  </div>
                  <div class="col-xs-9 col-md-10"> 
                     <?php 
                    $Options = explode(";", $t_v['electronique']) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"><?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div> <hr>
                <?php endif ?><?php if($t_v['securite'] != "" ): ?>
                <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Dispositifs de Sécurité : </strong>
                  </div>
                  <div class="col-xs-9 col-md-10"> 
                     <?php 
                    $Options = explode(";", $t_v['securite']) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"><?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div> 
              <?php endif ?>

 </div>   <!-- Fin Equipement Vehicule -->                   
      
 </div>
 <div class="row" style='padding: 20px;'>
    <div class="col-sm-6 col-sm-offset-4 ">
      <div class="fb-share-button" data-href="<?php echo $address."annonce/detail-".$id_ance."-".$id_vtre; ?>" data-layout="button" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Partager</a>
    </div>
    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="fr" data-size="large">Tweeter</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <div class="g-plus" data-action="share" data-annotation="none" data-height="30"></div>
    </div>
 </div>


 </div>


<?php include 'vue/assets/modals.php'; ?>
<div style='background-color:#333;color:#fff;padding:5px;margin-bottom:10px;'>
  <strong>Commentaires Facebook</strong></div>

<div class='panel panel-danger'> <!-- commentaire facebook -->
<div class="fb-comments" data-href="https://www.facebook.com/goupal656/" data-numposts="15" data-width="100%" ></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
</div>
 <div class="row">
   <div class="col-md-12" style="padding:30px;padding-top:0px;">
    <div class="panel panel-danger" style="background-color:#900;color:#fff;padding:10px;"><strong>Annonces Similaires</strong></div>
<?php 
     require_once("vue/get_annonce.php"); 
     $obj=new Database();$id_v=$t_v['id_v'];
     $marque=$t_v['marque_v'];      $modele=$t_v['modele_v']; 
     $tab_similaire = $obj->cherche_rqt("SELECT id_v,marque_v FROM voiture WHERE marque_v=$marque AND modele_v=$modele AND id_v != '$id_v' ORDER BY rand() LIMIT 2 " ); 
     if ($tab_similaire == null ){
     $categorie=$t_v['categorie'];
     $tab_similaire = $obj->cherche_rqt("SELECT id_v,marque_v FROM voiture WHERE marque_v=$marque AND categorie='$categorie' AND id_v != '$id_v' ORDER BY rand() LIMIT 2 " ); 
     }
     foreach ($tab_similaire as $value) {
     $id_v=$value['id_v']; 
     $ance=$obj->cherche_rqt("SELECT * FROM annonce_v WHERE id_voiture = '$id_v' ");
     get_annonce($ance[0] , $address);
     }      
     if ($tab_similaire == null ):  ?>
  <div class="panel panel-danger">
     <div class="panel-body text-muted"><img src="<?php echo $address;?>/images/error_icon.png"> 
     <span class="aac"> Aucune annonce correspondante !</span> </div>  
  </div>
  <?php endif ?>
   </div>
</div>
</div>

<script type="text/javascript" src="<?php echo $address ;?>js/index.js"></script>
<script type="text/javascript"> 
 $(".img-thumbnail , .img-pp ").click(function(){
    var pic = this.src;
    $("#pp").attr('src', pic);
    $("img").each( function(){ $(this).removeClass("active");
    if ( this.src == pic ){ $(this).addClass("active"); }
    });
    $('#myModal').modal({ backdrop:"true"});
 });
 $(".img-thumbnail").click(function(){
 	  var pic = this.src;
 	  $("#pp").attr('src', pic);
    $("img").each( function(){ $(this).removeClass("active");
    if ( this.src == pic ){ $(this).addClass("active"); }
    });
 	  $('#myModal').modal({ backdrop:"true"});
  });
 $("#next").click(function(){
   var pic = $("img.active").next(".img-thumbnail").attr('src');
   if (pic){
   $("img.active").next("img").addClass("activer");
   $("img.active").removeClass("active");$("img.activer").addClass("active").removeClass("activer");
   $("#pp").attr('src' , pic );
   }
 });
  $("#prev").click(function(){
   var pic = $("img.active").prev(".img-thumbnail").attr('src');
   if (pic) {
   $("img.active").prev("img").addClass("activer");
   $("img.active").removeClass("active");$("img.activer").addClass("active").removeClass("activer");
   $("#pp").attr('src' , pic );
   scroll_checker();
   }
 });
 $(".pp").mouseenter(function(){$(".next").removeClass("hide"),$(".prev").removeClass("hide"); });
 $(".pp").mouseleave(function(){$(".next").addClass("hide"),$(".prev").addClass("hide"); });
 $(".afficheNum").click(function(){ $('#numero').modal({ backdrop:"true"}); });
 $(".partager").click(function(){ $('#partager').modal({ backdrop:"true"}); });
 $(".message").click(function(){ $('#message').modal({ backdrop:"true"}); });
 function scroll_checker(){
    var p = $(".t_img > img.active").width();
    var containerWidth = $('.t_img').width();
    $(".t_img").animate({scrollLeft:containerWidth-5}, 500);
    console.log(containerWidth);
    console.log(p);
 }
 </script>
<?php if(isset($_POST['recommander'])): ?> 
<script type="text/javascript">
  $('#partager').modal({ backdrop:"true"});
</script>

<?php endif  ?>  
