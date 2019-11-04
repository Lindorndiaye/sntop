<?php 

 include 'vue/assets/search.php';   
 include 'vue/assets/controlPanel.php';
 require_once("classes/Database.php");
if( ($_SESSION['id_annonceur']) ): 

 $obj=new Database(); $id_user= $_SESSION['id_annonceur'];
 $messages = $obj->cherche_rqt("SELECT * FROM messagerie WHERE id_destinataire='$id_user'");
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
<style type="text/css"> .statut0{background-color:#feefef;color:#444;}  </style>
<div class="panel panel-danger">
<div class="panel-body content"> 
<table class="table table-condensed table-hover" >
 	<thead>
	   <th> </th> <th> Expéditeur </th><th>Email</th>	<th>Objet</th> <th>Date</th>
 	</thead>
 	<tbody>
 	<?php foreach ($messages as $value): ?>
 			<tr id="<?php echo $value['id']; ?>" class="statut<?php echo $value['statut']; ?>">
 				<td align="center"><p><?php  if($value['statut'] == 0){echo "<span class='glyphicon glyphicon-ok-circle'></span>";}else{echo "<span class='glyphicon glyphicon-ok-sign'></span>";} ?></td>
 				<td><p><?php echo $value['nom_expediteur']; ?></td>
 				<td><p><?php echo $value['email_expediteur']; ?></td>
 				<td><p><?php echo $value['objet']; ?></td>
 				<td><p><?php echo (preg_replace("#([0-9]{4})-([0-9]{2})-([0-9]{2})$#","$3 $2 $1", $value['date_envoi'])); ?></td>
 			</tr>		
    <?php endforeach ?>		
 	</tbody>
</table>
</div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $address;?>js/dt.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
     $('tbody > tr').click(function () {
     id_message= $(this).attr("id");
     $.post("../vue/get_message.php" ,{id: id_message , address: "<?php echo $address;?>" }
     	   ).done(function(data){
     	   	$(".content").html(data);
     	   }).fail(function(){
     	   	console.log("ereur dans le fichier php");
     	   });
     });
	});
</script>
<?php else: ?>  
<SCRIPT LANGUAGE="JavaScript">document.location.href="<?php echo $address;?>connexion/ ";</SCRIPT>    
<?php endif ?>
