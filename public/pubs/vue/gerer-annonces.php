<?php 
 include 'vue/assets/search.php';   
 include 'vue/assets/controlPanel.php';
?>
<style type="text/css"> button.btn-xs{width: 100%;}</style>
  <div class="col-sm-12"> 
 <?php 
   if (isset($_POST['submit_annonce'])) {
    extract($_POST); extract($_SESSION);
    require_once("classes/annonce_v.php");
    $voiture = new Voiture($marque_v , $modele_v , $categorie , $annee_v , $kilometrage ,$transmission , $carburant , $cylindre , $couleur , $localite);
    $id_voiture=$voiture->ajouter();
    $n_annonce= new annonce_v($id_voiture);
    mkdir( "annonce/".$id_voiture , 0777 );
      if($_FILES){  
      $file=$_FILES['photo_v'];
      $inf_file = pathinfo($file['name']);
      $ext_charge= $inf_file['extension']; 
      $ext_autorise= array('JPG','jpg', 'jpeg', 'gif','png');
          if(in_array($ext_charge,$ext_autorise)){ //extension autorisé
           $idna=$n_annonce->ajouter($titre_a , $description_a , trim($prix_v) , $id_annonceur ,$type_a , "gratuit" , $id_voiture.".".$ext_charge);
           move_uploaded_file($file['tmp_name'], "annonce/".$id_voiture."/".$id_voiture.".".$ext_charge); 
           header("Location:index.php"); ?>
        <br>
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> Annonce Ajoutée avec succès. </strong> Vous allez être redirigé dans quelques secondes pour ajouter les options et photos du véhicule.
        <meta http-equiv="refresh" content="0; URL=<?php echo $address."publier/confirmer-".$idna."-".$id_voiture;?>">
        </div>
     <?php }else{
         $idna=$n_annonce->ajouter($titre_a , $description_a  , trim($prix_v) , $id_annonceur ,$type_a , "gratuit" ,"logo.png"); ?>
        <br>
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <strong> Annonce Ajoutée avec succès </strong> Vous allez être redirigé dans quelques secondes pour ajouter les options et photos du véhicule.
         <meta http-equiv="refresh" content="2; URL=<?php echo $address."publier/confirmer-".$idna."-".$id_voiture;?>">
        </div>   
     <?php }
     }   
   } 

  if (isset($_POST['suppr']) ){
  require_once("classes/annonce_v.php"); 
   if ($an = new annonce_v($_POST['id_a']))
       $an->supprimer( $_POST['id_a'] , $_POST['id_v'] );
  }
   ?>
<?php 
if(isset($_POST['suppr_annonce'])){ ?>
  <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="row">
              <center> <strong> Voulez-vous vraiment continuer la suppression </strong> ?
              </center>
              <div class="col-sm-6">
                <form method="POST" >
                <input type="hidden" name="id_a" value="<?php echo $_POST['id_a'];?>"> 
                <input type="hidden" name="id_v" value="<?php echo $_POST['id_v'];?>">
                <button type="submit" name="suppr" class="btn btn-danger btn-xs form-control">Supprimer</button>
              </div>
               <div class="col-sm-6">
                <button class="btn btn-primary btn-xs form-control">Annuler</button>
                 </form>
               </div>
              </div>
            </div>
         
<?php } ?>
<style type="text/css">
.panel .panel-danger{border-radius: 0; }
</style>
<link  href="<?php echo $address ;?>css/index.css " rel="stylesheet" type="text/css" >
<?php  
session_start(); 
if(isset($_SESSION) ): 
require_once("classes/Database.php");
$obj = new Database(); 
$ida=$_SESSION['id_annonceur']; 
$annonces= $obj->cherche_rqt("SELECT * FROM annonce_v WHERE id_annonceur='$ida' ORDER BY id_a_v DESC LIMIT 10 ");
if ($annonces == null ): ?>
<div class="panel panel-danger">
  <div class="panel-body text-muted"><img src="<?php echo $address;?>/images/error_icon.png"> Vous n'avez pas d'annonces actives. Cliquez <a href="<?php echo $address;?>publier/annonce">ici pour en ajouter une nouvelle</a>.</div>  
</div>
<?php else: 
require_once "vue/get_mesAnnonces.php"
?>
<div id="content">
   <?php foreach ($annonces as $a => $ance) {
          get_mesAnnonces($ance , $address);
         } ?>
</div>
<div class="row panel panel-danger" style="padding: 4px;">
  <div class="pull-left text-muted">
    Afficher <select id="nbreE"> 
    <option value="10">10</option> 
    <option value="30">30</option> 
    <option value="50">50</option> 
    <option value="100">100</option> 
    <option value="1000">Tous</option> 
    </select> annonces par page.
  </div>
  <div class="pull-right" id="page-selection"></div>
 </div>
<?php endif ?>
  </div>  
<?php endif ?>
<script type="text/javascript" src="<?php echo $address ;?>js/index.js"></script>
<script type="text/javascript" src="<?php echo $address?>js/bootspage.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 function paginate( nbreE ){
   var nbreA = <?php echo intval(count($annonces))+1; ?> ;
   var nbreP = Math.ceil( nbreA / nbreE );
   $('#page-selection').bootpag({
   total: nbreP,maxVisible: 10,next: 'Suivant',prev:'Précédent'
   }).on("page", function(event, num){
   var start = (nbreE*num)-(nbreE); var limit= nbreE; 
   var target = "#myPage";var $target = $(target);
   $('html, body').stop().animate({'scrollTop': $target.offset().top }, 600, 'swing', function () {window.location.hash = target; });
   $("#content").html("<div class='loader'><span></span><span></span><span></span></div>");
   $.post("../vue/get_mesAnnonces.php",{start: start , limit: limit , id_ann :<?php echo $ida ?>}
   ).done(function(annonces){ $("#content").html(annonces);
   }).fail(function(){ alert("impossible"); });
   });
 }
 $("#nbreE").change(function () {
   var start = 0; var limit=  $("#nbreE").val(); 
   $.post("../vue/get_mesAnnonces.php",{start: start , limit: limit , id_ann :<?php echo $ida ?> }
   ).done(function(annonces){ $("#content").html(annonces);
   }).fail(function(){ alert("impossible"); });
 paginate( $("#nbreE").val() ); });
 paginate(10);
})
</script>    
