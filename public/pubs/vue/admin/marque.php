<link href="<?php echo $address; ?>css/simple-sidebar.css" rel="stylesheet">
<div id="page-content-wrapper">
    <div class="container-fluid">
    <?php $option=$_GET['value']; $obj= new Database(); ?>
    <?php  if($option == "marque"): ?>
    <?php if(isset($_POST['new_mdle'])){
    	  $valeur=array('makeid'=>$_POST['marque_v'],'title'=>$_POST['new_mdle']);
    	  extract($_POST);
        $mdl=$obj->cherche_rqt("select title from modele where title='$new_mdle' and makeid='$marque_v' ");
        if($mdl[0]['title'] != null ){
           echo("Le modèle existe déja");
        }else{
           $obj->ajouter("modele", $valeur);
           echo("Modèle ajouté avec succès");
        } 
    	  } ?>
    <?php 
      if(isset($_POST['new_mrk'])){
    	  extract($_POST);
        $mrk=$obj->cherche_rqt("select title from marque where title='$new_mrk' ");
        if($mrk[0]['title'] != null ){
           echo("La marque existe déja");
        }else{
           $obj->ajouter("marque", array('title'=>$_POST['new_mrk']) );
           echo("Marque ajoutée avec succès");
        } 
    	}
    ?>
    <div class="row" style="background-color:#ccc;">
      <h3 class="text-danger text-center">Ajoutez une marque ou un modèle</h3> </div>
		<div class="row" style="margin-top:20px;">
		<div class="col-sm-8 col-sm-offset-2">
		<form method="post">
			<div class="form-group">
				<div class="row">
					<div class="col-xs-4">
					<strong>Nouvelle marque </strong>: </div>
					<div class="col-xs-8">
						<input type="text" name="new_mrk" class="form-control" placeholder="Ajoutez nouvelle marque"></input>
					</div>
				</div>
			</div>
			<div class="row">
				<center><input type="submit" class="btn btn-danger" ></input></center>
			</div>
		</form>	
		<hr>
		<form method="post">
	    <div class="form-group">
         <div class="row"> 
         <div class="col-xs-4">
                <label class="control-label" for="marque_v"> Sélectionnez la marque : </label>
         </div>
            <div class="col-xs-8" >
                <?php  $t_m= $obj->cherche_rqt("SELECT * FROM marque order by title "); $t_m; ?>  
                <select class="form-control" name="marque_v" id="marque_v" onChange="modele();" size="5" >
                  <?php foreach($t_m as $marque){
                    echo "<option value=".$marque['id']." >".$marque['title']."</option>";
                  } ?>
                </select>  
            </div>    
        </div>
       </div><!--Fin input  Marque --> 
       <div class="form-group">
        <div class="row"> 
       <div class="col-xs-4">
          <label class="control-label" for="modele_v"> Les Modèles de la marque : </label>
       </div>
       <div class="col-xs-8">
          <select class="form-control" name="modele_v" id="modele_v" placeholder="Modele Voiture" size="10">   
              <option id="model"> Sélectionnez </option>
          </select>  
       </div>    
       </div>
       </div>
       <div class="form-group">
       <div class="row"> 
       <div class="col-xs-4">
          <label class="control-label" for="modele_v"> Nouveau modèle : </label>
       </div>
       <div class="col-xs-8">
       <input type="text" name="new_mdle" class="form-control" placeholder="Ajoutez nouveau modèle"></input>
       </div>    
       </div>
       </div><!--Fin input Modèle -->
		</div>
		</div>
		<div class="row">
			<center><input type="submit" class="btn btn-danger"></input></center>
		</div>
		</form>
     
<?php endif ?>
    </div>
</div>
<script type="text/javascript">
function modele() {
   var mrk = $("#marque_v").val();
    $.get("../../classes/get_modele.php", { id : mrk } , function(data){
      $("#modele_v").html(data);
    });
}
</script>
