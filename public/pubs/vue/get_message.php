<?php 
require_once "../classes/Database.php";
$obj = new Database();
extract($_POST);
$message=$obj->cherche_rqt("SELECT * FROM messagerie WHERE id='$id' "); $message=$message[0];
?>
<div class="row">
   <div style="background-color:#eee;height:35px;line-height:35px;padding:5px;margin-bottom:30px;">
   	<a href="<?php echo $address;?>messagerie/">
   		<button type="button" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-list"></span> Afficher tous les messages </button>
   	</a>
   </div>
   <div class="col-sm-12 text-muted">
   	<span class="glyphicon glyphicon-user"></span> <strong><?php echo $message['nom_expediteur']; ?> | </strong>
   	<em><small>Envoyé le : <?php echo (preg_replace("#([0-9]{4})-([0-9]{2})-([0-9]{2})$#","$3 $2 $1", $message['date_envoi']) ); ?> </small></em> <br>
   	<span class="glyphicon glyphicon-envelope"></span> <strong> <?php echo $message['email_expediteur']; ?></strong> <br>
   	<h4>Objet : <?php echo $message['objet']; ?>	</h4><hr style="margin: 5px;">
   	 <?php echo $message['contenue']; ?> 
   </div>
   
</div>
<?php
$obj->modifier("messagerie" , "statut" , 1 , "id" , $id );
$obj=null; ?>