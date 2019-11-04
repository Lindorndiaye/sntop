<?php
$acheteur="active";
include 'vue/assets/search.php';
include 'vue/assets/controlPanel.php';
?>
<div class="panel panel-danger">
<div class="panel-body">
    <div class="row">	
 	<div class="col-sm-4">
 		<div class="well">
 		    <div class="row">
 		        <a href="<?php echo $address;?>recherche/vehicules/neuf"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/new.png " class="pull-left well-img "></div>
 		    	<div class="col-xs-9 well-txt">
 		    		NEUFS
 		    	</div>
 		    </div>
 		</div>
 	</div>
 		<div class="col-sm-4">
 		<div class="well">
 		    <div class="row">
 		       <a href="<?php echo $address;?>recherche/vehicules/occasion"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/used.png " class="pull-left well-img  "></div>
 		    	<div class="col-xs-9 well-txt">
 		    		OCCASION
 		    	</div>
 		    </div>
 		</div>
 	</div>
 		<div class="col-sm-4">
 		<div class="well">
 		    <div class="row">
 		       <a href="<?php echo $address;?>recherche/vehicules/location"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/used.png " class="pull-left well-img  "></div>
 		    	<div class="col-xs-9 well-txt">
 		    		LOCATION
 		    	</div>
 		    </div>
 		</div>
 	</div>
 </div>	
 <div class="row">	
 	<div class="col-sm-4">
 		<div class="well">
 		<a href="<?php echo $address?>recherche/annonces/gold"></a>
 		    <div class="row">
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/gold_veh.png " class="pull-left well-img "></div>
 		    	<div class="col-xs-9 well-txt">
 		    		GOLD
 		    	</div>
 		    </div>
 		</div>
 	</div>
 		<div class="col-sm-4">
 		<div class="well">
 		<a href="<?php echo $address?>recherche/annonces/prestige"></a>
 		    <div class="row">
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/featured_veh.png " class="pull-left well-img "></div>
 		    	<div class="col-xs-9 well-txt">
 		    		PRESTIGE
 		    	</div>
 		    </div>
 		</div>
 	</div>
 	<div class="col-sm-4">
 		<div class="well ">
 		    <div class="row">
 		     <a href="<?php echo $address?>recherche/vehicules/concessionnaire"></a>
 		    	<div class="col-xs-12 well-txt">
 		    		CONCESSIONNAIRE 
 		    	</div>
 		    </div>
 		</div>
 	</div>
 		
 </div>	
 <div class="row">
 		<div class="col-sm-4">
 		<div class="well ">
 		    <div class="row">
 		     <a href="<?php echo $address?>autotheque/depot"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/search.png " class="pull-left well-img "></div>
 		    	<div class="col-xs-9 well-txt">
 		    		 AUTOTHEQUE
 		    	</div>
 		    </div>
 		</div>
 	</div>
 	<div class="col-sm-4">
 		<div class="well ">
 		    <div class="row">
 		     <a href="<?php echo $address?>annonce/partype"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/vehicle_types.png" class="pull-left well-img "></div>
 		    	<div class="col-xs-9 well-txt">
 		    		PAR TYPE
 		    	</div>
 		    </div>
 		</div>
 	</div>
 	<div class="col-sm-4">
 		<div class="well ">
 		    <div class="row">
 		     <a href="<?php echo $address?>recherche/"></a>
 		    	<div class="col-xs-3"><img src="<?php echo $address;?>images/search.png " class="pull-left well-img "></div>
 		    	<div class="col-xs-9 well-txt">
 		    		RECHERCHE
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
