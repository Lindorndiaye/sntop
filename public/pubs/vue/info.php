<script type="text/javascript" src="<?php echo $address;?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $address;?>js/index.js"></script>
<?php  
require_once("classes/Database.php");
function getArticle($rubr){
$obj= new Database();
return $obj->cherche_rqt("SELECT * FROM articles WHERE rubrique='$rubr' ORDER BY id_art DESC ");
}
?>
<?php 
$obj = new Database();
if ($_GET['article']=="publiInfo" ) { 
	    include('vue/articles/publiInfo.php');
}else if($_GET['article']=="guideInfo" ){
	    include('vue/articles/guideInfo.php');
}else if ($_GET['article']=="securiteRoutiere" ) {
		include('vue/articles/securiteRoutiere.php');
}else if ($_GET['article']=="actualites" ) {
		include('vue/articles/actu.php');
}else{
$art=$obj->cherche_all("articles","titre", $_GET['article'] );  ?>
<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address.$art[0]['rubrique'];?>"><?php echo $art[0]['nom_rubrique']; ?></a></li>
   <li class="active"><?php echo (substr($art[0]['nom_article'],0,80))."..."; ?></li>
</ol>
<div style="padding-bottom:10px;">
<div class="panel panel-danger">
<div class="panel-heading" style="background:#900;color:#fff;">
  <strong> <?php echo $art[0]['nom_article']; ?></strong></div>
<div class="panel-body">
<?php if ( $art[0]['rubrique'] != 'info' and $art[0]['rubrique'] != 'autotheque' ): ?>
<center><img src="<?php echo $address."images/actu/".$art[0]['photo_actu']; ?>" class="img-thumbnail img-responsive" width="70%" ><br> 
</center>  
<?php endif ?>
<?php  echo $art[0]['contenue']."</div>";  } ?>
</div>
</div>
