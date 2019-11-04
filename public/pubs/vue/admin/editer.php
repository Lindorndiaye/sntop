<link href="<?php echo $address; ?>css/simple-sidebar.css" rel="stylesheet">
<?php 
session_start();
?>
<?php
if (isset($_POST['contenue'])) {
$obj= new Database();
if ($obj->modifier("articles","contenue" , $_POST['contenue'] , 'titre' , $_GET['value'] )){  ?>
 <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Modification Réussi!</strong>.
    <meta http-equiv="refresh" content="3; URL=<?php echo "$address";?>admin/annonce/list">
  </div>
<?php
} }
 ?>
<body>
<div id="page-content-wrapper">
<div class="container-fluid">
	<div class="row">
  <?php
$obj= new Database();
$art=$obj->cherche_all("articles","titre", $_GET['value'] ); 
?>
		<div class="col-md-12">
    <div class="row" style="background-color:#ccc;margin-bottom:20px;"><h3 class="text-danger text-center"><?php echo $art[0]['nom_article'];?></h3> </div>
<form class="form" method="post">

<textarea id="myarea1" class="mceEditor" name="contenue"> 
<?php echo $art[0]['contenue'];?>
</textarea><br>
<input type="submit" class="btn btn-sm btn-success" value="Enregistrer" ></input>	
<a href=""><button type="button" class="btn btn-sm btn-inverse">Annuler</button></a>
</form>

		</div> 
	</div>
</div>
<?php include 'addImage.php'; ?>
</body>
<script src='<?php echo $address?>js/tinymce/tiny_mce.js'></script>
<script src='<?php echo $address?>js/editeur.js'></script>

