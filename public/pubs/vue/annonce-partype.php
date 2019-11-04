  <?php 
    require_once('classes/annonce_v.php'); 
    function getNumber( $categorie ){
      $obj= new Database();
      $nbre=$obj->cherche_rqt(" SELECT COUNT(*) as nbre FROM voiture WHERE categorie='$categorie' ");
      return $nbre[0]['nbre'];
    }
   	  $obj= new Database();
   	    
	include 'vue/assets/search.php';   
	include 'vue/assets/controlPanel.php';	
 	?>
 	<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address."acheteur/" ;?>">Acheteur</a></li>
   <li class="active">Annonces par types</li>
</ol>
   <div class="panel panel-danger"  id="partype" style="margin-bottom:0;">
      <div class="panel-heading" style="background-color:#900;color:white;font-size:20px;padding:5px;">
       <strong>ANNONCES PAR TYPE</strong> 
      </div>
      <div class="panel-body">
         <div class="row">
           <div class="col-sm-4 "> 
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/berline">
              <img src="<?php echo $address ;?>/images/voitures/berline.png"><br>
             Berline</a> (<?php echo getNumber("berline");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/suv-4x4"> 
              <img src="<?php echo $address ;?>/images/voitures/suv-4x4.png"><br>
              SUV / 4x4</a> (<?php echo getNumber("suv-4x4");?>)
          
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/citadine"> 
              <img src="<?php echo $address ;?>/images/voitures/citadine.png"><br>
              Citadine</a> (<?php echo getNumber("citadine");?>)
            
            </center> </div>
           </div>
         </div>
         <div class="row">
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/pick-up">
              <img src="<?php echo $address ;?>/images/voitures/pick-up.png"><br>
              Pick-up</a> (<?php echo getNumber("pick-up");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/cabriolet">
              <img src="<?php echo $address ;?>/images/voitures/cabriolet.png"><br>
              Cabriolet</a> (<?php echo getNumber("cabriolet");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/collection">
              <img src="<?php echo $address ;?>/images/voitures/collection.png"><br>
              Collection</a> (<?php echo getNumber("collection");?>)
            </center> </div>
           </div>
     
         </div>
         <div class="row">
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/luxe">
              <img src="<?php echo $address ;?>/images/voitures/luxe.png"><br>
              Luxe</a> (<?php echo getNumber("luxe");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
            <a href="<?php echo $address ;?>recherche/categorie/break">
              <img src="<?php echo $address ;?>/images/voitures/break.png"><br>
              Break</a> (<?php echo getNumber("break");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/coupe-sport">
              <img src="<?php echo $address ;?>/images/voitures/coupe-sport.png"><br>
              Coupé / Sport</a> (<?php echo getNumber("coupe-sport");?>)
            </center> </div>
           </div>
           </div>
         <div class="row">
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/bus">
              <img src="<?php echo $address ;?>/images/voitures/bus.png"><br>
              Bus</a> (<?php echo getNumber("bus");?>)
            </center> </div>
           </div>
           <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/camion">
              <img src="<?php echo $address ;?>/images/voitures/camion.png"><br>
              Camion</a> (<?php echo getNumber("camion");?>)
            </center> </div>
           </div>
            <div class="col-sm-4 ">
            <div class="well"><center>
             <a href="<?php echo $address ;?>recherche/categorie/mini-bus">
              <img src="<?php echo $address ;?>/images/voitures/fourgon.png"><br>
              Mini-bus</a> (<?php echo getNumber("mini-bus");?>)</a>
            </center> </div>
           </div>
         </div>
      </div>
   </div>
  </div>