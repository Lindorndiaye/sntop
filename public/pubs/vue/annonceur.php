<link  href="<?php echo $address ;?>css/index.css" rel="stylesheet" type="text/css" >

<?php 
require_once("classes/annonce_v.php");
include 'vue/assets/search.php';
include 'vue/assets/controlPanel.php';
$usr = check_user($_GET['value']);
?>
<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address."annonce/voiture" ;?>">Annonce Véhicule</a></li>
   <li><a href = "<?php echo $address."annonce/annonceur/professionnel/" ;?>">Annonceur Professionnel</a></li>
   <li class="active"><?php echo $usr['pseudo']; ?></li>
</ol>

<div class="panel panel-danger">
 <?php 
  $obj = new Database();
  $annonceur=$obj->cherche_all("annonceur" , "id_annonceur" , $_GET['value'] );$a=$annonceur[0]; 
  ?>

  <div class='panel-body'>
  	  <div class="panel-heading" style='background-color:#333;color:#fff;margin-bottom:10px;'><?php  echo $a['pseudo']; ?></div>
      <div class='row' >
      	  <div class="col-sm-4">
      	  	<img src="<?php echo $address."images/conc/".$a['logo']; ?> " class='img-responsive'>
      	  </div>
      	  <div class="col-sm-8 ">
      	  	<table class="table table-condensed table-bordered table-striped">
      	  		<tr>
      	  			<th>Nom Entreprise</th>
      	  			<td><?php echo $a['concession']; ?></td>
      	  		</tr>
      	  		<tr>
      	  			<th>Téléphone </th>
      	  			<td><?php echo $a['telephone']; ?></td>
      	  		</tr>
      	  		<tr>
      	  			<th>Site Web</th>
      	  			<td><?php echo $a['site_web']; ?></td>
      	  		</tr>
      	  		<tr>
      	  			<th>Adresse</th>
      	  			<td><?php echo $a['adresse']; ?></td>
      	  		</tr>
      	  		
      	  	</table>
      	  </div>
      </div>
      <div class="row">
      	  <div class="col-sm-12">
      	  	 <div> <h4 class="text-danger">Marques Représentées</h4> <hr> </div>
      	  </div>
      </div>
  </div>

</div>