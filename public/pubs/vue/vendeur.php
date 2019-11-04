<?php
$vendeur="active";
include 'vue/assets/search.php';
include 'vue/assets/controlPanel.php';
?>
<div class="panel panel-danger">
<div class="panel-body">
  <div class="row">	
 	<div class="col-sm-4">
 		<div class="well">
 		    <div class="row">
 		       <a href="<?php echo $address;?>publier/annonce"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/add_new_veh.png" class="pull-left " width="35px" ></div>
 		    	<div class="col-xs-9 well-txt">
 		    		AJOUTER UNE ANNONCE
 		    	</div>
 		    </div>
 		</div>
 	</div>
 		<div class="col-sm-4">
 		<div class="well">
 		    <div class="row">
 		        <a href="<?php echo $address;?>gerer/annonces"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/my_veh.png" class="pull-left" width="35px"></div>
 		    	<div class="col-xs-9 well-txt">
 		    		MES<br> ANNONCES
 		    	</div>
 		    </div>
 		</div>
 	</div>
 	<div class="col-sm-4">
 		<div class="well">
 		    <div class="row">
 		        <a href="<?php echo $address;?>autotheque/consultation"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/vehicle.png" class="pull-left" width="45px"></div>
 		    	<div class="col-xs-9 well-txt">
 		    	 CONSULTATION AUTOTHEQUE
 		    	</div>
 		    </div>
 		</div>
 	</div>

 </div>	
 <div class="row">	
 	<div class="col-sm-4">
 		<div class="well">
 		    <div class="row">
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/stats.png" class="pull-left" width="35px"></div>
 		    	<div class="col-xs-9 well-txt">
 		    		STATISTIQUES
 		    	</div>
 		    </div>
 		</div>
 	</div>
 		<div class="col-sm-4">
 		<div class="well">
 		    <div class="row">
 		        <a href="<?php echo $address;?>messagerie/"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/messages.png" class="pull-left" width="35px"></div>
 		    	<div class="col-xs-9 well-txt ">
 		    		MES MESSAGES
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