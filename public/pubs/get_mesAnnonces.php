
<?php  
function get_mesAnnonces( $ance , $address){ ?>
<div class="row">
 		 	<div class="panel panel-danger" style="background-color:#eee;">
 		 	  <div class="panel-body" >	
 		 	  <div class="row"> 
 		 		<div class="col-xs-3">
        <div class="thumbnail">
         <?php if($ance['photos_a_v'] == "logo.png" or $ance['photos_a_v']=="" ){
          echo "<img src='".$address."images/TOP.png'>";
          }else{?>
         <img class="tag" src="<?php echo $address.'images/'.$ance['type_annonce'].'.png'; ?> ">  
         <img src="<?php echo $address.'annonce/'.$ance['id_voiture'].'/'.$ance['photos_a_v'] ?>" width="98%">
         <?php } ?>
 		 		</div>
      </div>
 		 		<div class="col-xs-8">
 		 		   <u> Titre:<?php echo $ance['titre_a_v']; ?></u><br>
 		 		    Description: <?php echo $ance['description_a_v'];?><br>
 		 		    Prix: <?php echo $ance['prix_v'];?><br>
 		 		    Date :	<?php echo $ance['date_a_v'];?><br>
 		 		</div>
 		 		</div>
 		 	 </div>
        <div style="border-top:solid 1px #ccc;padding-left:10px;padding-right:10px;padding-top:10px; background-color:#fff;box-shadow: 0 8px 16px #ccc;" >
        <div class="row">
          <div class="col-xs-4" style="padding-bottom:0px;">
           <a href="<?php echo $address."publier/confirmer-".$ance['id_a_v']."-".$ance['id_voiture'] ?>">
           <button  class="btn btn-warning btn-xs">Ajouter Options / Modifier</button></a>
          </div>
          <div class="col-xs-4" style="padding-bottom:0px;">
            <form method="POST">
              <input type="hidden" name="id_a" value="<?php echo $ance['id_a_v'];?>"> 
              <input type="hidden" name="id_v" value="<?php echo $ance['id_voiture'];?>">
              <button type="submit" name="suppr_annonce" class="btn btn-danger btn-xs">Supprimer</button>
            </form>
          </div>
          <div class="col-xs-4" style="padding-bottom:0px;">
            <a href="<?php echo $address."annonce/detail-".$ance['id_a_v']."-".$ance['id_voiture'];?>"><button class="btn btn-default btn-xs">Voir l'annonce</button></a>
          </div>
        </div>
 		 	</div>
    </div>
 	</div>
<?php }


if( isset($_POST['start']) ){
     require_once("../classes/Database.php");
     $obj = new Database(); extract($_POST);
     $tab_annonce = $obj->cherche_rqt("SELECT * FROM annonce_v WHERE id_annonceur='$id_ann' ORDER BY id_a_v DESC LIMIT $start , $limit  " );
     foreach( $tab_annonce as $ance ){ 
        get_mesAnnonces($ance , "http://localhost/top_auto/");
     }
  }

  ?>
	