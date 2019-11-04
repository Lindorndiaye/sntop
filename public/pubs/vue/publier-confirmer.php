<style type="text/css">
.panel-default{
border-color:#fff ;
}
.panel-heading{
 height: 35px ; 
 background-color:#333;
 color:#fff; 
 line-height: 10px;
}
span.option{
  padding: 2px;
  padding-left: 5px;
  padding-right: 5px;
  margin: 1px;
  border: solid 1px #C44C51 ;
  color:#555;
  display: inline-block;
  width:250px;
  text-align:center;
}
.b{
 height: 25px;
 border: solid 1px #ccc;
 margin-bottom:3px ;
}
</style>
<div class="row">
<div class="col-sm-12">
<?php
session_start();

if($_POST['modif_annonce'] == "options"){
require_once("classes/Voiture.php");
extract($_POST);
//var_dump($_POST); complete($id ,$caro , $ext , $int , $elect)
$vtre = new Database();
$valeurs= array( 'carosserie'=> implode(";", $corosserie),
                 'exterieur'=> implode(";", $exterieur),
                 'interieur'=>implode(";", $interieur),
                 'securite'=>implode(";", $securite),
                 'electronique'=>implode(";", $electronique)
                 );
$vtre->modifier_plus("voiture" , $valeurs ,"id_v" , $_GET['id_v']); ?>
 <br>
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> Options Ajoutée avec Succès. </strong>
        </div>
<?php } ?>

<?php
if( ($_SESSION['id_annonceur']) ){
if ($_GET['id_v'] != null and $_GET['id_a_v'] != null):
$id_ance = $_GET['id_a_v'];
$id_vtre = $_GET['id_v'];
require_once("classes/annonce_v.php");
$ance= new annonce_v($id_ance);
$t_a_v = $ance->get_annonce();
$t_v = $ance->get_voiture($id_vtre);
$t_m=$ance->get_mrk_mdl($t_v[0]['marque_v'] , $t_v[0]['modele_v'] );
extract($t_v[0]);
?>

<?php
if($_POST['modif_annonce'] == "photos"){
extract($_POST);
require_once("classes/annonce_v.php");

    if(isset($_FILES['photos']) != NULL){
     $key_photo = array_keys($_FILES['photos']);
     for ($i=0; $i<=$nbre_aut; $i++) {
        foreach ($key_photo as $key) {
          $ph_poste[$i][$key] = $_FILES['photos'][$key][$i];
        }
      }
       $t_tof[]=NULL;
       foreach($ph_poste as $tof){
         $ext_tof= pathinfo ($tof['name'])['extension']; 
         $ext_aut= array('JPG','jpg', 'jpeg', 'gif','png');
         if($tof['size']<18000000)
         if(in_array($ext_tof,$ext_aut)){$t_tof[]=$tof['tmp_name'] ;$t_ext[]=$ext_tof;}
      }
       for($i=1; $i < count($t_ext); $i++){
       $t_nom[$i] = $id_v."-".$i;
       move_uploaded_file($t_tof[$i], "annonce/".$id_v."/".$id_v."-".$i.".".$t_ext[$i]); 
       $t_nom[$i].=".".$t_ext[$i];
       }
       $voiture= new Annonce_v($id_v);
       $voiture->modifier_photo( implode(";" , $t_nom) );  ?>
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> Photos ajoutées avec succès. </strong> 
        </div>
     <?php  }
} ?>

<a href="<?php echo $address;?>gerer/annonces" >
         <button type="button"  id="annuler" class="btn form-control btn-sm btn-danger" > Terminer les modifications </button>
      </a>

<form action="" method="POST" enctype="multipart/form-data">
		
       <div class="panel ">			
   	     <h5 class="text-danger"> Détails Voiture  </h5>
       </div>
       <input name="id_a_v" value="<?php echo $id_ance;?>" type="hidden" /> 
       <input name="id_v" value="<?php echo $id_vtre ; ?>" type="hidden" />
      
       <div class="form-group">
     	    <div class="row">	
     	 	 <div class="col-sm-2">
                <label class="control-label" for="marque_v"> Marque : </label>
			 </div>
            <div class="col-sm-4">
                <input type="hidden" class="form-control" name="marque_v" id="marque_v" value="<?php echo $t_m[1][0];?>" disabled>
                <input type="text" class="form-control"  value="<?php echo $t_m[1][1];?>" disabled>
            </div> 
            <div class="col-sm-2">
                <label class="control-label" for="marque_v"> Modèle : </label>
			 </div>
            <div class="col-sm-4">
                <input type="hidden" class="form-control" name="modele_v" id="modele_v" value="<?php echo $t_m[0][0];?>"  disabled>
                <input type="text" class="form-control"  value="<?php echo $t_m[0][2];?>"  disabled>
            </div> 	
        </div>
      </div><!--Fin input  Marque -->	

        <div class="form-group">
 				
     	    <div class="row">	
     	 	 <div class="col-sm-2">
                <label class="control-label" for="annee_v"> Année : </label>
			 </div>
             <div class="col-sm-4">
                <input type="year"  class="form-control" name="annee_v" id="annee_v" value="<?php echo $annee_v;?>" disabled>
             </div>
             <div class="col-sm-2">
                <label class="control-label" for="kilometrage"> Kilométrage : </label>
			 </div>
			 <div class="col-sm-4">
                <input type="text"  class="form-control" name="kilometrage" id="kilometrage" value="<?php echo $kilometrage_v;?>" disabled>
             </div>
           </div>   	
      </div><!-- Fin Annee et Kilometrage -->
        
      <div class="form-group">
 				
     	    <div class="row">	
     	 	 <div class="col-sm-2">
                <label class="control-label" for="transmission"> Transmission : </label>
			 </div>
             <div class="col-sm-4">
                <input type="text"  class="form-control" name="transmission" id="transmission" value="<?php echo $transmission;?>" disabled>
             </div>
          <div class="col-sm-2">
                <label class="control-label" for="carburant"> Carburant : </label>
			 </div>
			 <div class="col-sm-4">
		  <input type="text"  class="form-control" name="carburant" id="carburant" value="<?php echo $carburant;?>" disabled>
             </div>
           </div>   	
      </div><!-- Fin transmission et carburant -->
      <div class="form-group">
       <div class="row">	
       
     	 	 <div class="col-xs-2">
                <label class="control-label" for="cylindre"> Cylindre : </label>
			 </div>
             <div class="col-xs-4">
                <input type="text"  class="form-control" name="cylindre" id="cylindre" value="<?php echo $cylindre;?>" disabled>
             </div>
             <div class="col-xs-2">
                <label class="control-label" for="couleur"> Couleur : </label>
			 </div>
			 <div class="col-xs-4">
               <input type="text"  class="form-control" name="couleur" id="couleur" value="<?php echo $couleur;?>" disabled>
             </div>
       	</div>
      </div><!-- cylindre et couleur  -->   
        <p class="text-center"><strong class="text-danger">PHOTOS DE L'ANNONCE :</strong></p>
        <div class="row" style="height:110px;white-space:nowrap;overflow-x:scroll;margin-right:3px;">                     
        <?php 
        $photos_v=explode(";" ,$photos_v);
        foreach ($photos_v as $tof): ?>
        <img src="<?php echo $address."annonce/".$id_vtre."/".$tof; ?> " width="90" class="img-thumbnail" >
        <?php endforeach ?>
        </div>
    <div class="form-group">
      <div class="row">
         <div class="col-sm-4">
                <label class="control-label" for="marque_v"><span class="glyphicon glyphicon-picture"></span> Ajouter / Changer les Photos </label>
         </div>
            <div class="col-sm-8">
                <?php if( $_SESSION['type_cmpte'] == "gratuit" ){ ?>
                <input name="photos[]" class="form-control"  id="filesToUpload" type="file" multiple onChange="makeFileList();" />
                <input name="nbre_aut" id="nbre_aut" value="4" type="hidden" >
                <small class="text-info help-block "> GRATUIT: Vous pouvez ajouter jusqu'à 4 photos </small>
                <?php }else if( $_SESSION['type_cmpte'] == "gold" ){ ?> 
                  <input name="photos[]"  class="form-control" id="filesToUpload" type="file" multiple onChange="makeFileList();" />
                  <input name="nbre_aut" id="nbre_aut" value="15" type="hidden" >
                <small class="text-info help-block "> GOLD: Vous pouvez ajouter jusqu'a 15 photos </small>
                <?php }else{ ?>
                  <input name="photos[]" class="form-control" id="filesToUpload" type="file" multiple onChange="makeFileList();" />
                  <input name="nbre_aut" id="nbre_aut" value="8" type="hidden" >
                  <small class="text-info help-block"><u><strong>Particulier</strong></u></small><small class="text-info help-block "> : Il vous reste jusqu'à 4 photos à ajouter.</small> Si vous souhaitez intégrer des visuels supplémentaires, il vous faudra valider une option de publication <span class="form-deposit-label"> (voir FAQ)</span>.
                  <?php } ?>
            </div>   
          </div>
        </div> 
        <div id="btnE" style="margin-bottom:3px; "> 
        <button type="submit" name="modif_annonce" id="ajtP" class="hide btn btn-sm btn-danger" value="photos"> Ajouter les Photos </button>
        </div>
        <ul class="list-group" id="fileList">
          <li class="list-group-item"> Aucune photo chargée !</li></ul><div class="form-group"><div class="row"></div></div>
  </form>
   <div class="col-sm-3">

   </div> 
  
<?php endif ?>
<div class="row">
<div class="col-sm-12">
      <form action="<?php echo $address."publier/confirmer-".$id_ance."-".$id_vtre ;?>" method="POST" enctype="multipart/form-data"> 
      <div class="panel panel-danger">
        <div class="panel-heading" style="background-color:#900; color:white; margin-bottom:10px;">
        <p style="font-size:16px;" > Spécifications du Véhicule (Précisez les options SVP)</p></div>
      <div class="panel-body">  
      
      <div class="panel panel-default">
        <div style="background-color:#333; color:#fff;" class="panel-heading">
        <strong >Carrosserie</strong>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="2 Portes">2 portes </label></div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="3 Portes">3 portes </label></div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="4 Portes">4 portes </label></div>
          </div>
          <div>
           <div class="row"> 
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="5 Portes">5 portes</label></div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Première Main">Première  Main </label>
            </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Chassis long">Châssis Long</label></div>
          </div>
           <div class="row"> 
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Chassis Court">Châssis Court</label></div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Double Echappement">Double Echappement </label></div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Carnet d'E"ntretien">Carnet d'Entretien </label></div>
          </div>
        </div>
        </div>
       </div> 
       <div class="panel panel-default">
        <div style="background-color:#333; color:#fff;" class="panel-heading">
        <strong >Transmission</strong>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmission[]" value="2 Roues Motrices">2 Roues  Motrices </label> 
              </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmission[]" value="4 Roues Motrices">4 Roues Motrices </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmission[]" value="Commande de Roue">Commande de Roue </label> </div>
          </div>
         <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmission[]" value="Propulsion">Propulsion </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmission[]" value="Turbo">Turbo </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmission[]" value="Supercharged">Supercharged </label> </div>
          </div> 
        </div>
      </div>
        
       <div class="panel panel-default">
        <div style="background-color:#333; color:#fff;" class="panel-heading">
        <strong >Intérieur</strong>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="2 Rangées de Sièges">2 Rangées de Sièges </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="3 Rangées de Sièges">3 Rangées de Sièges </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="3ème Rangée Rabattable">3ème Rangée Rabattable </label> </div>
          </div>
          <div>
           <div class="row"> 
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Pédales Réglables">Pédales Réglables </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Direction Assistée ">Direction Assistée </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Direction Réglable">Direction Réglable </label> </div>
          </div>
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Console Central">Console Central </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Tour de Contrôle">Tour de Contrôle </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Tablette Cache Bagages">Tablette Cache Bagages </label> </div>
          </div> 
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Climatisation">Climatisation </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Stabilisateur de Température">Stabilisateur de Température </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Toit Ouvrant">Toit Ouvrant </label> </div>
          </div>
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Toit Amovible">Toit Amovible </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Fermetures Centralisées">Fermetures Centralisées </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Sièges Electriques">Sièges Electriques </label> </div>
          </div>  
			<div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Sièges Chauffants">Sièges Chauffants </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Sièges en Cuir">Sièges en Cuir  </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Siège Enfant">Siège Enfant </label> </div>
          </div> 
			<div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Rafraîchisseur de Sièges">Rafraîchisseur de Sièges </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Rétroviseur int. Electrochrome">Rétroviseur Int. Electrochrome </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Vitres Electriques">Vitres Electriques </label> </div>
          </div> 
			<div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Vitres Teintées">Vitres Teintées </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Vitres coulissantes">Vitres Coulissantes </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Dégivreur Arrière">Dégivreur Arrière </label> </div>
          </div>  
        </div>
        </div>
       </div>
       <div class="panel panel-default">
        <div style="background-color:#333; color:#fff;" class="panel-heading">
        <strong >Extérieur</strong>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Jantes Alliages">Jantes Alliages </label></div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Roue de Secours">Roue de Secours </label></div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="T-Top">T-Top </label></div>
          </div>
          <div>
           <div class="row"> 
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Roues Personnalisables">Roues Personnalisables </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Pneus Neufs">Pneus Neufs </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Roues Premium">Roues Premium </label> </div>
          </div>
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Peinture Métallisée">Peinture Métallisée </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Peinture d'Origine">Peinture d'Origine </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Portes Coulissantes">Portes Coulissantes </label> </div>
          </div>
            <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Antibrouillards">Antibrouillards </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Pare-Brise Chauffant">Pare-Brise Chauffant </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Toiture Convertible">Toiture Convertible </label> </div>
          </div> 
            <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Porte-Bagages">Porte-Bagages </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Miroirs Electriques">Miroirs Electriques </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Rétroviseurs Electriques">Rétroviseurs électriques </label> </div>
          </div> 
            <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Essuie-Glaces électriques">Essuie-Glaces Electriques </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Essuie-Glace arrière">Essuie-Glace Arrière </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Bécquet">Bécquet </label> </div>
          </div> 
            <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Barres de Toit">Barres de Toit </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Marchepieds">Marchepieds </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Pare-Buffle">Pare-Buffle </label> </div>
          </div> 
            <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Pare-Boue">Pare-Boue </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Capteur de Pluie">Capteur de Pluie </label> </div>
            <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Arbre de Remorquage">Arbre de Remorquage </label> </div>
          </div>  
        </div>
        </div>
       </div>

       <div class="panel panel-default">
        <div style="background-color:#333; color:#fff;" class="panel-heading">
        <strong >Electroniques</strong>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Alarme">Alarme </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="GPS">GPS </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Téléphone Intégré">Téléphone Intégré </label> </div>
          </div>
          <div>
           <div class="row"> 
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Kit Mains Libres">Kit Mains Libres </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Ordinateur de Bord">Ordinateur de Bord </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="TV">TV </label> </div>
          </div>
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="ABS">ABS </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Système de Navigation">Système de Navigation </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Régulateur de Vitesse">Régulateur de Vitesse </label> </div>
          </div> 
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Démarrage à Distance">Démarrage à Distance </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Code de Sécurité Portières">Code de Sécurité Portières </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Assistant Marche Arrière">Assistant Marche Arrière </label> </div>
          </div>
        <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Radar de Recul">Radar de Recul </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Projecteur Xénon">Projecteur Xénon </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Radio Satellite">Radio Satellite </label> </div>
             </div>
        <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Am / FM radio">AM / FM Radio </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Lecteur CD/DVD">Lecteur CD/DVD </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="DVD Player">DVD Player </label> </div>
        </div>
        <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Port Ipod / MP3">Port Ipod / MP3 </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Stéréo Bande">Stéréo Bande </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Anti-Patinage">Anti-Patinage  </label> </div>
        </div>
        <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Sièges Electriques à Mémoire">Sièges Electriques A Mémoire </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Blocage de Différentiel">Blocage de Différentiel </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Contrôle de Pression des Roues">Contrôle de Pression des Roues </label> </div>
        </div>
        </div>
        </div>
       </div>
       <div class="panel panel-default">
        <div style="background-color:#333; color:#fff;" class="panel-heading">
        <strong >Dispositifs de Sécurité</strong>
        </div>
        <div class="panel-body">
           <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Antivol">Antivol </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Freins Antiblocage">Freins Antiblocage </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Détecteur d'Obstacle">Détecteur d’Obstacle </label> </div>
          </div> 
          <div class="row">
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Air Bag Conducteur">Air Bag Conducteur </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Air Bags Passagers">Air Bags Passagers </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Air Bag Arrière">Air Bag Arrière </label> </div>
          </div> 
          <div class="row">
          <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Air Bags Latéraux">Air Bags Latéraux </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Clignotants Rétroviseurs">Clignotants Rétroviseurs </label> </div>
            <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Contrôle de Traction">Contrôle de Traction  </label> </div>
          </div> 
        </div> 
      </div>

        <button type="submit" name="modif_annonce" id="enregistrer" class="btn btn-sm btn-danger" value="options"> Enregistrez les Options </button>  
      </form>
  </div>
</div>
    <div class="panel-body">
                <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong>Carrosserie : </strong>
                  </div>
                  <div class="col-xs-9"> 
                    <?php 
                    $Options = explode(";", $carosserie) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div><hr style="margin:5px;"><div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong>Transmission : </strong>
                  </div>
                  <div class="col-xs-9"> 
                    <?php 
                    $Options = explode(";", $transmission) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div><hr style="margin:5px;">
              <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Intérieur : </strong>
                  </div>
                  <div class="col-xs-9"> 
                    <?php 
                    $Options = explode(";", $interieur) ;
                    foreach ($Options as $opt) { ?>
                    <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div><hr style="margin:5px;">
               <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Extérieur : </strong>
                  </div>
                  <div class="col-xs-9"> 
                     <?php 
                    $Options = explode(";", $exterieur) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
                </div> <hr style="margin:5px;">
               <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Electroniques : </strong>
                  </div>
                  <div class="col-xs-9"> 
                     <?php 
                    $Options = explode(";", $electronique) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
            </div> <hr style="margin:5px;">
            <div class="row">
                  <div class="col-xs-3 col-md-2"> 
                   <strong> Dispositifs de Sécurité : </strong>
                  </div>
                  <div class="col-xs-9"> 
                     <?php 
                    $Options = explode(";", $securite) ;
                    foreach ($Options as $opt) { ?>
                     <span  class="option"> <?php echo $opt; ?></span>
                   <?php } ?>
                  </div>
            </div> <hr style="margin:5px;">
      </div>
</div> 
</div>
</div>
</div>
<?php } ?>
<script type="text/javascript" src="<?php echo $address ;?>js/index.js"></script>
<script type="text/javascript" src="<?php echo $address ;?>js/jquery.js"></script>
<script type="text/javascript">
		function makeFileList() {
			var input = document.getElementById("filesToUpload");
			var ul = document.getElementById("fileList");
			var nbre= document.getElementById("nbre_aut").value; 
			while (ul.hasChildNodes()) {
 				     ul.removeChild(ul.firstChild);
			 }
          $("#btnE").append("Cliquer pour Continuer l'ajout des photos"); 
          $("#ajtP").removeClass("hide").addClass("visible");
			   for (var i = 0; i < nbre ; i++) {
				var li = document.createElement("li");
				li.className += "list-group-item text-success";
				li.innerHTML = i+1+". "+input.files[i].name +" chargé";
				ul.appendChild(li);
			   }

			   if(!ul.hasChildNodes()) {
				var li = document.createElement("li");
				li.className += "list-group-item";
				li.innerHTML = 'Vous n\'avez pas choisi de photos ';
				ul.appendChild(li);
			   }
       
	}
</script>