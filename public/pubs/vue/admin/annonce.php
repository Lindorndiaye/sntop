<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
<?php  
session_start(); 
if( isset($_SESSION['admin'])):
$option=$_GET['value']; $obj= new Database(); ?>
<style type="text/css">.gold{color: #fc6;}.prestige{color: blue;} ul.nav-pills li a {font-size:18px; }.btn-sm{padding: 2px;font-size:15px;}</style>
<link href="<?php echo $address; ?>css/simple-sidebar.css" rel="stylesheet">
<div id="page-content-wrapper">
    <div class="container-fluid">
       <div class="row" style="background-color:#ccc;">
         <h3 class="text-danger text-center">LISTE DES ANNONCES</h3> </div>
       <div class="row"><div id="alert" ></div></div>
       <div class="row">
 		<?php 
 		if ($option != "list") {
 			$annonces=$obj->cherche_rqt("SELECT * FROM annonce_v WHERE type_annonceur= '$option' ORDER BY id_a_v DESC");
 		}else{
 			$annonces=$obj->cherche_rqt("SELECT * FROM annonce_v  ORDER BY id_a_v DESC ");
 		}
 		 ?>
 		 <table class="table table-striped table-bordered table-condensed" >
 		 <thead><th><th>Véhicule</th><th>Année</th><th>Prix</th><th>Carburant</th><th>Annonceur</th><th>Type</th><th>Action</th></thead>
 		 <tbody>
 		 	<?php 
 		 	foreach ($annonces as $annonce => $ance){ 
 		 	$tab_voiture = $obj->cherche_rqt("SELECT * FROM voiture WHERE id_v =".$ance['id_voiture'] ); 
 		 	$ancr = $obj->cherche_rqt("SELECT pseudo FROM annonceur WHERE id_annonceur = ".$ance['id_annonceur'] ); 
 		 	$mrk = $obj->cherche_rqt("SELECT title FROM marque WHERE id = ".$tab_voiture[0]['marque_v'] ); 
            $mdl = $obj->cherche_rqt("SELECT title FROM modele WHERE id = ".$tab_voiture[0]['modele_v'] ); 
            ?>
 		 	<tr class="text-muted" id="<?php echo $ance['id_a_v']; ?>">
 		 	 	<td align="center">
 		 	 	<span class="glyphicon glyphicon-star <?php echo $ance['type_annonceur'] ?>" ></span>	
 		 	 	</td>
 		 	 	<td>
 		 	 	 <?php echo $mrk[0]['title']." ".$mdl[0]['title']; ?>
 		 	 	</td>
 		 	 	 <td>
 		 	 	 <?php echo $tab_voiture[0]['annee_v']; ?>
 		 	 	</td>
 		 	 	<td align="right">
         <?php echo (number_format($ance['prix_v'], 0 , '', ',')) ?>
 		 	 	</td>
 		 	 	<td>
 		 	     <?php echo $tab_voiture[0]['carburant']; ?>
 		 	 	</td>
 		 	 	<td>
 		 	 	 <?php echo $ancr[0]['pseudo']; ?>
 		 	 	</td>
 		 	 	<td>
 		 	 	 <?php echo $ance['type_annonce']; ?>
 		 	 	</td>
 		 	 	<td align="center">
 		  	 	<button class="btn btn-sm btn-danger supprimer" title="Supprimer" ><span class="glyphicon glyphicon-trash" ></span></button>
        <?php if ($ance['type_annonceur'] !="gold"): ?>
 		 	    <button class="btn btn-sm btn-warning set_gold" title="Ajouter aux Golds"><span class="glyphicon glyphicon-star"></span></button>
        <?php else: ?>
          <button class="btn btn-sm btn-warning rem" title="Enlever des Golds"><span class="glyphicon glyphicon-star-empty"></span></button>
        <?php endif ?> 
        <?php if ($ance['type_annonceur'] !="prestige"): ?>
          <button class="btn btn-sm btn-primary set_prestige" title="Ajouter aux Prestiges"><span class="glyphicon glyphicon-star"></span></button>
        <?php else: ?>
          <button class="btn btn-sm btn-primary rem" title="Enlever des Prestiges"><span class="glyphicon glyphicon-star-empty"></span></button>
        <?php endif ?> 
 		 	    <button class="btn btn-sm btn-default detail" title="Détails de la voiture"><span class="glyphicon glyphicon-eye-open"></span></button>
 		 	 	</td> 
 		   </tr>
 		   <?php } ?>
 		 </tbody>
 		 </table>
     </div>
  </div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $address;?>js/dt.js"></script> 
<script type="text/javascript">
$(document).ready( function(){

  $(".supprimer").click(function(){
  	 var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez-vous vraiment supprimer cette annonce?");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "supprimer" , id: id  });
        del.done(function( data ){ $("#"+id).html("<td><td>Ligne supprimé <td><td><td><td><td><td>").fadeIn();$("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
  $(".detail").click(function(){
    var id = $(this).parents("tr").attr("id");
    var del= $.post( "../../vue/admin/traitement.php", { action: "detail" , id: id  });
    del.done(function( data ){
      $("#page-content-wrapper").html(data); 
     });
    del.fail(function() {
       alert( "error" );
     })  
   });
   $(".set_gold").click(function(){
    var id = $(this).parents("tr").attr("id");
    var r = confirm("L'annonce va être ajoutée aux annonces Gold");
     if (r == true) {
    var del= $.post( "../../vue/admin/traitement.php", { action: "addToGold" , id: id  });
    del.done(function( data ){$("#alert").html(data); });
    del.fail(function() { alert( "error" ); })  
    } else { return false; }
  }); 
   $(".set_prestige").click(function(){
    var id = $(this).parents("tr").attr("id");
    var r = confirm("L'annonce va être ajoutée aux annonces Prestige");
     if (r == true) {
    var del= $.post( "../../vue/admin/traitement.php", { action: "addToPrestige" , id: id  });
    del.done(function( data ){
      $("#alert").html(data); 
    });
    del.fail(function() { alert( "error" ); })  
    } else { return false; }
  });
    $(".rem").click(function(){
    var id = $(this).parents("tr").attr("id");
    var r = confirm("L'annonce va devenir une annonce gratuite");
     if (r == true) {
    var del= $.post( "../../vue/admin/traitement.php", { action: "addToGratuit" , id: id  });
    del.done(function( data ){ $("#alert").html(data); });
    del.fail(function() { alert( "error" ); })  
    } else { return false; }
  });   
   $('#myAlert').on('closed.bs.alert', function () {
     alert('');
    }); });
</script>

<?php endif ?>

