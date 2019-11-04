<link  href="<?php echo $address ;?>css/index.css " rel="stylesheet" type="text/css" >
<script type="text/javascript" src="<?php echo $address ;?>js/index.js"></script>
<?php  
include 'vue/assets/search.php';   
include 'vue/assets/controlPanel.php'; 
?>
<div class="row">
<div class="col-md-12">
<?php 
session_start();
if( ($_SESSION['id_annonceur']) ): 
require_once("classes/Database.php");
?>
 
   <h3 class="text-center text-muted"> Déposez une annonce :   </h3>
   <hr>
   <div class="panel panel-default">
   	<div class="panel-heading" style="padding-bottom:0;background-color:#900;">
      <h5 style="color:#fff;"><strong>FORMULAIRE DEPÔT D'ANNONCE</strong></h5>
   	</div>
  <form action="<?php echo $address ;?>gerer/annonces" method="POST" enctype="multipart/form-data">
    <div class="panel-body"> 
     <div class="form-group">
     	<div class="row">	
     	 	<div class="col-xs-3">
                <label class="control-label" for="titre_a">Titre de l'annonce :</label>
			</div>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="titre_a" id="titre_a" placeholder="Un Titre accrochant apporte plus de visiteurs" required>
            </div>
         </div>   	
     </div>
     <div class="form-group">
          <div class="row"> 
         <div class="col-xs-3">
                <label class="control-label" for="marque_v"> Marque : </label>
       </div>
            <div class="col-xs-9">
                <?php $obj= new Database(); $t_m= $obj->cherche_rqt("SELECT * FROM marque"); $t_m; ?>  
                <select class="form-control" name="marque_v" id="marque_v" onChange="modele();" required>
                <option value="selectionnez"selected> -- Sélectionnez -- </option>
                  <?php foreach($t_m as $marque){
                    echo "<option value=".$marque['id']." >".$marque['title']."</option>";
                  } ?>
                </select>  
            </div>    
        </div>
      </div><!--Fin input  Marque --> 

         <div class="form-group">
          <div class="row"> 
         <div class="col-xs-3">
                          <label class="control-label" for="modele_v"> Modèle Voiture : </label>
       </div>
            <div class="col-xs-9">
                <select class="form-control" name="modele_v" id="modele_v" placeholder="Modele Voiture" required> 
                  <option id="model"> -- Sélectionnez -- </option>
                </select>  
            </div>    
        </div>
      </div><!--Fin input Modèle -->
       <div class="form-group">
          <div class="row"> 
         <div class="col-xs-3">
                          <label class="control-label" for="modele_v"> Catégorie : </label>
       </div>
            <div class="col-xs-9">
                <select class="form-control" name="categorie" id="categorie"  required>
                <option value="selectionnez"selected> -- Sélectionnez -- </option 
                  ><option value="berline">Berline</option>
                  <option value="citadine">Citadine</option>
                  <option value="cabriolet">cabriolet </option>
                  <option value="coupe-sport">Coupé / Sport </option>
                  <option value="break">Break</option>
                  <option value="suv-4x4">SUV / 4x4 </option>
                  <option value="pick-up">Pick-up </option>
                  <option value="luxe">Voiture de Luxe</option>
                  <option value="collection">Collection</option>
                  <option value="bus">Bus</option>
                  <option value="camion">Camion</option>
                  <option value="mini-bus">Mini-Bus</option>
                </select>  
            </div>    
        </div>
      </div><!--Fin input Modèle -->

       <div class="form-group">
      <div class="row"> 
        <div class="col-xs-3">
                <label class="control-label" for="type_a">Type d'annonce :</label>
      </div>
            <div class="col-xs-3">
              <select name="type_a" id="type_a" class="form-control">
              <option value="selectionnez"selected> -- Sélectionnez -- </option>
                <option value="neuf" > Neuf </option>
                <option value="occasion"> Occasion </option>
                <option value="location"> Location </option>
              </select>
            </div>
          <div class="col-xs-2">
                <label class="control-label" for="prix_v">Prix :</label>
            </div>
            <div class="col-xs-4">
               <input type="number" class="form-control" name="prix_v" id="prix" placeholder="Prix Voiture" required>
            </div>
          </div> 
       </div> 

         <div class="form-group">
        
          <div class="row"> 
         <div class="col-xs-3">
                <label class="control-label" for="transmission"> Transmission : </label>
       </div>
             <div class="col-xs-3">
                 <select name="transmission" id="transmission" class="form-control">
                <option value="selectionnez"selected> -- Sélectionnez -- </option>
                <option value="Manuelle"> Manuelle </option>
                <option value="Automatique"> Automatique </option>
                <option value="Séquentielle"> Séquentielle </option>
                <option value="Autre"> Autre </option>
              </select>
             </div>
          <div class="col-xs-2">
                <label class="control-label" for="carburant"> Carburant : </label>
       </div>
       <div class="col-xs-4">
          <select name="carburant" id="carburant" class="form-control">
          <option value="selectionnez"selected> -- Sélectionnez -- </option>
                <option value="Essence" > Essence </option>
                <option value="Diesel" > Diesel </option>
                <option value="Electrique" > Electrique </option>
                <option value="GPL" > GPL </option>
                <option value="CNG" > CNG </option>
                <option value="Hybride" > Hybride </option>
                <option value="Bioéthanol" > Bioéthanol </option>
              </select>
             </div>
           </div>     
      </div><!-- Fin transmission et carburant -->
         <div class="form-group">
        
          <div class="row"> 
         <div class="col-xs-3">
                <label class="control-label" for="annee_v"> Année : </label>
        </div>
             <div class="col-xs-3">
          <select name="annee_v" class="form-control">
          <option value="selectionnez"selected> -- Sélectionnez -- </option>
          <?php 
          for ($i=intval(date("Y")) ; $i>=1950 ; $i--){
            echo "<option value='$i'> $i </option>";
           }
          ?>
        </select>             </div>
             <div class="col-xs-2">
                <label class="control-label" for="kilometrage"> Kilométrage : </label>
       </div>
       <div class="col-xs-4">
                <input type="number"  class="form-control" name="kilometrage" min="0" id="kilometrage" placeholder="Kilometrage" required>
             </div>
           </div>     
      </div><!-- Fin Annee et Kilometrage -->
        <div class="form-group">
       <div class="row">  
       
         <div class="col-xs-3">
                <label class="control-label" for="cylindre"> Cylindre : </label>
       </div>
             <div class="col-xs-3">
                <select name="cylindre" id="cylindre" class="form-control">
                <option value="selectionnez"selected> -- Sélectionnez -- </option>
                    <option value="1 cylindres" > 1 cylindres </option>
                    <option value="2 cylindres" > 2 cylindres </option>
                    <option value="3 cylindres" > 3 cylindres </option> 
                <option value="4 cylindres" > 4 cylindres </option>
                <option value="5 cylindres" > 5 cylindres </option>
                    <option value="6 cylindres" > 6 cylindres </option>
                    <option value="7 cylindres" > 7 cylindres </option>
                    <option value="8 cylindres" > 8 cylindres </option>
                      <option value="9 cylindres" > 9 cylindres </option>
                    <option value="10 cylindres" > 10 cylindres </option>
                    <option value="11 cylindres" > 11 cylindres </option> 
                <option value="12 cylindres" > 12 cylindres </option>
                <option value="13 cylindres" > 13 cylindres </option>
                    <option value="14 cylindres" > 14 cylindres </option>
                    <option value="15 cylindres" > 15 cylindres </option>
                    <option value="16 cylindres" > 16 cylindres </option>  
              </select>
             </div>
             <div class="col-xs-2">
                <label class="control-label" for="couleur"> Couleur : </label>
       </div>
       <div class="col-xs-4">
         <select name="couleur" id="couleur" class="form-control">
           <option value="selectionnez"selected> --- Précisez --- </option>
                <option value="argenté" > ARGENTÉ </option>
                <option value="beige" > BEIGE </option>
                <option value="blanc" > BLANC </option>
                <option value="bleu" > BLEU </option>
                <option value="bleu clair" > BLEU CLAIR</option>
                <option value="bleu marine" > BLEU MARINE</option>
                <option value="bordeaux" > BORDEAUX </option>
                <option value="gris" > GRIS </option>
                <option value="gris clair" > GRIS CLAIR </option>
                <option value="gris anthracite" > GRIS ANTHRACITE </option>
                <option value="gris foncé" > GRIS FONCÉ </option>
                <option value="ivoire" > IVOIRE </option>
                <option value="jaune" > JAUNE </option>
                <option value="marron" > MARRON </option>
                <option value="marron clair" > MARRON CLAIR</option>
                <option value="noire" > NOIRE </option>
                <option value="or" > OR </option>
                <option value="orange" > ORANGE </option>
                <option value="rouge" > ROUGE </option>
                <option value="verte" > VERTE </option>
                <option value="vert foncé" > VERT FONCÉ </option>
                <option value="mauve" > MAUVE </option>
                <option value="marron" > MARRON </option>
                <option value="mauve" > MAUVE </option>
              </select>
             </div>
        </div>
      </div><!-- cylindre et couleur  -->

      <div class="form-group">
      <div class="row"> 
        <div class="col-xs-3">
        <label class="control-label" for="titre_a">Localité :</label>
      </div>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="localite" id="localite" placeholder="Où se trouve la voiture" required>
            </div>
         </div>     
     </div>
    

        <div class="form-group">
     	    <div class="row">	
     	 	 <div class="col-xs-3">
                <label class="control-label" for="titre_a"> Description : </label>
			 </div>
            <div class="col-xs-9">
                <textarea rows="4" class="form-control" name="description_a" id="descr_a" placeholder="Précisions, commentaires... Décrivez votre article autant que possible." ></textarea>	
            </div>
           </div>   	
        </div>
      
       <div class="form-group">
      <div class="row">
         <div class="col-xs-3">
                <label class="control-label" for="marque_v"> Photo Principale </label>
       </div>
            <div class="col-xs-9">
                <p>
                <?php if( $_SESSION['type_cmpte'] == "gratuit" ){ ?>
                <input type="file" id="inputgratuit" placeholder="Photo principale" class="form-control" name="photo_v" >
                <small class="text-info help-block"> GRATUIT: Vous pouvez ajouter jusqu'à 3 photos </small>
                <?php }else if( $_SESSION['type_cmpte'] == "gold" ){ ?> 
                <input type="file" id="inputgold" class="form-control" name="photo_v" >
                <small class="text-info help-block"> GOLD: Vous pouvez ajouter jusqu'à 15 photos </small>
                <?php }else{ ?>
                <input type="file" id="inputprestige" class="form-control" name="photo_v" >
                <small class="text-info help-block"><u><strong>Particulier</strong></u> : Vous pouvez encore ajouter jusqu'à 4 visuels après enregistrement de la photo principale de votre annonce.</small> Formats autorisés : .jpg, .jpeg, .png, .gif. Poids maxi : 2Mo/Photo.
                <?php } ?>
                </p>
                <p><span class="checkbox-inline">
                  *En cliquant sur &quot;Enregistrez et Continuez&quot;, j'accepte les<a href=" <?php echo $address ?>/conditionsGenerales"> CGU, les CGV et la charte du bon annonceur.</a></span></p>
            </div>    
        </div>
      </div><!--Fin input Modèle -->
     </div>
  <div class="row">
    <div class="col-xs-4 col-xs-offset-1">
     <input type="submit" name="submit_annonce" value="Enregistrez et Continuez" class="btn btn-sm btn-danger form-control">
    </div>
     <div class="col-xs-4 col-xs-offset-1">
      <input type="reset" class="btn btn-sm btn-default form-control">
     </div>
  </div>
</div><!--Fin Detail annonce-->	

  </form>
  <br> 

<?php else: ?>  
<SCRIPT LANGUAGE="JavaScript">document.location.href="<?php echo $address;?>connexion/ ";</SCRIPT>    
<?php endif ?>

</div>

</div><!--Fin de la ligne row -->

<script language="javascript" src="<?php echo $address; ?>js/index.js"></script>
<script type="text/javascript">
function modele() {
   var mrk = $("#marque_v").val();
   $.get("../classes/get_modele.php", { id : mrk } , function(data){
      $("#modele_v").html("");
      $("#modele_v").append(data);
    });
}
</script>
