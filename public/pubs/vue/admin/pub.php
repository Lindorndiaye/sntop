<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
$obj= new Database(); 
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
<link href="<?php echo $address; ?>css/simple-sidebar.css" rel="stylesheet">

<div id="page-content-wrapper">
    <div class="container-fluid">
      <div class="row" style="background-color:#ccc;">
        <h3 class="text-danger text-center">Liste des Publicités</h3> </div>
       <div class="row">
        <div class="col-sm-12">
        <div id="alert"></div>
        	<?php if ($_GET['value']== 'list'): ?> 
        		 	<table class="table table-bordered table-codensed table-hover">
        		 		<thead><th> </th><th>Nom Publicité</th><th>Espace de Pub</th><th>Durée</th> <th>Date d'ajout</th><th>Date Fin</th><th>Action</th></thead>
        		 		<tbody>
        		 		 <?php 
        		 		  $pubs=$obj->cherche_rqt("SELECT * FROM pub ORDER BY id DESC ");
        		 		  foreach ($pubs as $value): 
                    if (strtotime($value['fin']) > strtotime(date('Y-m-d')) && $value['statut'] == 1){$class="success";$gl="remove";$ey="open";}else{$class="warning";$gl="ok";$ey="close";}
                  ?>
        		 		 	<tr id="<?php echo $value['id']; ?>" class="text-<?php echo $class; ?>">
        		 		 	<td align="center"><span class="glyphicon glyphicon-eye-<?php echo $ey; ?>"></span> </td>
        		 		 	<td><?php echo $value['nom_pub']; ?></td>
        		 		 	<td><?php echo $value['type']; ?></td>
        		 		 	<td><?php echo $value['validite']; ?> jours</td>
        		 		 	<td><?php echo $value['debut']; ?></td>
        		 		 	<td><?php echo $value['fin']; ?></td>
        		 		 	<td align="center">
                     <button type="button" class="btn btn-xs btn-default <?php echo $class; ?>"><span class="glyphicon glyphicon-<?php echo $gl; ?>"></span></button>
                     <button type="button" class="btn btn-xs btn-danger supprimer"><span class="glyphicon glyphicon-trash"></span></button>
                      <select class="form-control hide set-<?php echo $value['id']; ?>" style="margin-top:5px;"><option >Sélectionnez la durée</option><option value="8">Une semaine</option>
                      <option value="15">2 semaines</option><option value="31">Un mois</option> <option value="90">3 mois</option><option value="180">6 mois</option></select>
        		 		 	</td>
        		 			</tr>
        		 		 <?php endforeach ?>
        		 		</tbody>
        		 	</table>

<a href="<?php echo $address; ?>admin/pub/ajout" data-toggle="tooltip" data-placement="right" id="add" title="Ajouter une Publicité" class="test" ><span class="glyphicon glyphicon-plus-sign text-danger" style="font-size:40px;line-height:40px;"></span></a>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $address;?>js/dt.js"></script>
<script type="text/javascript"> 
  $(".supprimer").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez vous vremment supprimer cette pub?");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "supprimerPub" , id: id  });
        del.done(function( data ){ $("#"+id).html("<td><td>Pub supprimé <td><td><td><td><td>").fadeIn();$("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
    $(".warning").click(function(){
      var id = $(this).parents("tr").attr("id");
      $(".set-"+id).toggleClass("hide");
    });

    $(".success").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez vous cacher cette pub? ");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "cacherPub" , id: id  });
        del.done(function( data ){ $("#"+id).removeClass("text-success").addClass("text-warning");$("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
      $("select.form-control").change(function(){
     var id = $(this).parents("tr").attr("id");
     var validite=$(this).val();
     var r = confirm("Voulez vous afficher cette pub? ");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "afficherPub" , id: id , formule: validite });
        del.done(function( data ){ $("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
    $(this).addClass('hide');
  });

$("#add").tooltip(); </script>
            <?php endif ?>
            <?php if ($_GET['value'] == 'ajout'): 
            
            if (isset($_POST['submit'])){
            extract($_POST);	
            require_once "classes/Pub.php";
            $newPub= new Pub();	
            $Lid=$newPub->ajouter($nom_pub, $validite , $type , $link );
 			    if ($_FILES['photo']) {
 			      $file=$_FILES['photo'];
    			  $inf_file = pathinfo($file['name']);
     			  $ext_charge= $inf_file['extension'];
     			  move_uploaded_file($file['tmp_name'], "pubs/".$Lid.".".$ext_charge);
   			      $obj->modifier("pub", "photo",  $Lid.'.'.$ext_charge ,"id" , $Lid );
 				} ?>
 	       <div class="alert alert-success" id="myAlert">
             <a href="<?php $address;?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Publicité ajoutée avec succès </strong>.
               <meta http-equiv="refresh" content="3; URL=<?php echo "$address";?>admin/pub/list">
           </div>
           <?php }  ?>
            	<br><br>
                  <form class="form" method="post" enctype="multipart/form-data">
                  	<div class="form-group">
                  		<div class="row">
                  			<div class="col-sm-2"></div>
                  			<div class="col-sm-2">
                  			  <label><strong>Nom :</strong></label>
                  			</div>
                  			<div class="col-sm-6"><input type="text" class="form-control" name="nom_pub" placeholder="Nom de l'entreprise "></input></div>
                  		</div>
                  	</div>
                  	<div class="form-group">
                  		<div class="row">
                  			<div class="col-sm-2"></div>
                  			<div class="col-sm-2"><label><strong>Validité</strong></label>
       			            <strong>:</strong></div>
                  			<div class="col-sm-6"><select class="form-control" name="validite"><option id="validite"> Sélectionnez </option>
                  				<option value="8">1 semaine</option>
                  				<option value="15">2 semaines</option>
                  				<option value="31">1 mois</option>
                  				<option value="90">3 mois</option>
                  				<option value="180">6 mois</option>
                  			</select></div>
                  		</div>
                  	</div>
                  	<div class="form-group">
                  		<div class="row">
                  			<div class="col-sm-2"></div>
                  			<div class="col-sm-2"><label><strong>Emplacement</strong></label>
               			    <strong>               			    :</strong></div>
                  			<div class="col-sm-6"><select name="type" class="form-control">
                          <option value="selectionnez" selected >Sélectionnez </option>
                          <option value="simple"> Latérale Gauche </option>
                          <option value="ban_annonces">Bannière Annonces</option>
                          <option value="accueil_lateral">Accueil Droite</option>
                  		  <option value="ban_bas_3D">Bannière bas 3 Droite</option>
                          <option value="ban_bas_3C">Bannière bas 3 Centre</option>
                          <option value="ban_bas_3G">Bannière bas 3 Gauche</option>
                          <option value="ban_bas_2G">Bannière bas 2 Gauche</option>
                          <option value="ban_bas_2D">Bannière bas 2 Droite</option>
                          <option value="ban_bas_1">Bannière bas 1</option>
                  		  <option value="ban_haut" >Bannière en-tête</option>
                  		  <option value="popup_haut">Bannière PopUp en-tête</option>
                          <option value="popup_side_1">Bannière PopUp Side 1</option>
                          <option value="popup_side_2">Bannière PopUp Side 2</option>
                  			</select></div>
                  		</div>
                  	</div>                      
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label><strong>Lien de la pub</strong></label>
                        <strong>                        :</strong></div>
                        <div class="col-sm-6"><input type="text" name="link" class="form-control" value="http://" type="url"></input></div>
                      </div>
                    </div>


                  	<div class="form-group">
                  		<div class="row">
                  			<div class="col-sm-2"></div>
                  			<div class="col-sm-2"><label><strong>Logo</strong></label>
               			    <strong>               			    :</strong></div>
                  			<div class="col-sm-6"><input type="file" class="form-control" name="photo"></input></div>
                  		</div>
                  	</div>
                  	<div class="form-group">
                  		<div class="row">
                  			<center><input type="submit" name="submit" class="btn btn-sm btn-danger " value="Enregistrez"></input></center>
                  		</div>
                  	</div>
                  </form>    
            <?php endif ?>
        </div>
       </div>
    </div>
</div>

