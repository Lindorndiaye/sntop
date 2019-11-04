<?php 
 require_once("../../classes/Database.php");
 $obj= new Database();

 if (isset($_POST['nom_photo'])) {
 if($_FILES != NULL){  
 	 extract($_POST);
      $file=$_FILES['photo'];
      $inf_file = pathinfo($file['name']);
      $ext_charge= $inf_file['extension'];
      move_uploaded_file($file['tmp_name'], "../../media/".$nom_photo.".".$ext_charge); 
      $obj->ajouter("media", array('nom' => $nom_photo.'.'.$ext_charge ));
  }else{
  	echo "pas d'images ";
  }
 }
  

if(isset($_GET['action']) == "getImages"){
$tofs=$obj->cherche_rqt("SELECT * FROM media ORDER BY id"); 
foreach ($tofs as $key => $value) { ?>
<img src="http://sn-topauto.raidghost.com/media/<?php echo $value['nom'];?>" class="img-thumbnail img-responsive" width="100" height="100" >
<?php }  } ?>