<title> Vendeur - Sn-TopAuto </title>
<?php
$vendeur="active";
include 'vue/assets/search.php';
include 'vue/assets/controlPanel.php';
?>
<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li class="active">Vendeur</li>
</ol>
<style>
	.well-txt{  font-size: large;  text-weight:bold;text-align: center;  }
	h3{  margin-top: 2px;  margin-bottom:2px ;  }
</style>
<div class="panel panel-danger">
	<div class="panel-heading"><h3>ANNONCES</h3></div>
	<div class="panel-body">
  <div class="row">	
 	<div class="col-sm-6">
 		<div class="well">
 		    <div class="row">
 		       <a href="<?php echo $address;?>publier/annonce"></a>
 		    	<div class="col-xs-4"><img src="<?php echo $address;?>images/add_new_veh.png" class="pull-left " width="80%" ></div>
 		    	<div class="col-xs-8 well-txt">
 		    		AJOUTER UNE ANNONCE
 		    	</div>
 		    </div>
 		</div>
 	</div>
 		<div class="col-sm-6">
 		<div class="well">
 		    <div class="row">
 		        <a href="<?php echo $address;?>gerer/annonces"></a>
 		    	<div class="col-xs-4"><img src="<?php echo $address;?>images/my_veh.png" class="pull-left img-responsive" width="80%"></div>
 		    	<div class="col-xs-8 well-txt">
 		    		MES ANNONCES
 		    	</div>
 		    </div>
 		</div>
 	</div>
   </div>
		<div class="row">
 	<div class="col-sm-6">
 		<div class="well">
 		    <div class="row">
 		        <a href="<?php echo $address;?>autotheque/consultation"></a>
 		    	<div class="col-xs-4"><img src="<?php echo $address;?>images/vehicle.png" class="pull-left img-responsive" width="100%" ></div>
 		    	<div class="col-xs-8 well-txt">
 		    	 CONSULTATION AUTOTHEQUE
 		    	</div>
 		    </div>
 		</div>
 	</div>
 </div>
</div>
	<div class="panel-heading"><h3>OPTION VENDEUR </h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="well">
					<div class="row">
						<div class="col-xs-4"><img src="<?php echo $address;?>images/stats.png" class="pull-left" width="35px"></div>
						<div class="col-xs-8 well-txt">
							STATISTIQUES
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="well">
					<div class="row">
						<a href="<?php echo $address;?>messagerie/"></a>
						<div class="col-xs-4"><img src="<?php echo $address;?>images/messages.png" class="pull-left" width="35px"></div>
						<div class="col-xs-8 well-txt ">
							MES MESSAGES
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="well">
					<a href="<?php echo $address;?>gerer/compte"></a>
					<div class="row">
						<div class="col-xs-4"><span class="glyphicon glyphicon-user text-danger" style="font-size:40px;"></span></div>
						<div class="col-xs-8 well-txt">
							MON COMPTE
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  $("div.well").click(function(){
      window.location=$(this).find("a").attr("href");
      return false;
   });
</script>