<link  href="<?php echo $address ;?>css/index.css " rel="stylesheet" type="text/css" >
<script type="text/javascript" src="<?php echo $address ;?>js/index.js"></script>
<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address;?>/autotheque">autothèque</a></li>
   <li class="active">Dépôt Recherche</li>
</ol>
<?php 
if (isset($_POST['email_ch'])){
require_once 'classes/Database.php';
$obj= new Database();
 if ($obj->ajouter("rech_autotheque" , $_POST )) {  $v_aut=$_POST ; ?>
    <div class="well" align="center">
       <strong class="text-success">Votre recherche a été enregistrée, vous serez contacté par l'un de nos partenaires.  </strong>
    </div>
    <h4 class="text-muted" align="center"><u>Résumé de votre Recherche :</u></h4>
     <div class="panel panel-danger" style="margin-bottom:10px;">
             <div class="panel-body">
               <div class="col-sm-6 text-muted " >
                <span class="glyphicon glyphicon-user"></span><strong> <?php echo strtoupper($v_aut['prenom_ch'])." ".strtoupper($v_aut['nom_ch']); ?></strong><br>
                 <span class="glyphicon glyphicon-phone"></span> Tél : <?php echo $v_aut['tel_ch'];?><br>
                 <span class="glyphicon glyphicon-envelope"></span> Email : <?php echo $v_aut['email_ch']; ?>
               </div>
               <div class="col-sm-6 text-muted" align="right">
                RECHERCHE :<span class="text-danger"> <?php echo strtoupper($v_aut['marque_v'])." ".strtoupper($v_aut['modele_v']); ?>
                </span><br><span class="text-success" ><?php if ( $v_aut['type_a'] == "location" ) echo 'en LOCATION'; else echo "en ".strtoupper($v_aut['type_a']); ?></span><br>
                <small class="text-muted">Posté le : <?php echo preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#"," $3/$2 /$1", $v_aut['date_pub']); ?> </small>
               </div>
          </div>
          <hr style="margin-top:2px;margin-bottom: 5px;">
          <p style="margin-left:30px;margin-left:20px;"><?php echo $v_aut['description_a'];?>  </p>
             <div class="panel-footer">
          <div class="row">
            <div class="col-sm-4 text-danger">
              BUDGET : <?php echo number_format($v_aut['budget'], 0 , '', ' ') ?> F.CFA<br>
              <span class="text-muted">Année : Entre <strong><?php echo $v_aut['annee_depart']; ?></strong> et <strong><?php echo $v_aut['annee_fin']  ?> </strong></span>
            </div>
            <div class="col-sm-4">
              Transmission :<strong class="text-success"> <?php echo $v_aut['transmission'];?></strong><br>
              Carburant : <strong class="text-success" > <?php echo $v_aut['carburant'];?></strong>
            </div>
            <div class="col-sm-4" align="center">
              Prévision d'achat :<br> dans<strong class="text-success"> <?php echo $v_aut['prevision_achat'];?></strong>
            </div>  
          </div>
            </div>
          </div>
          
 <?php }
}else{
?>
<div class="row">
<div class="col-md-12">
<?php 
session_start();
require_once("classes/Database.php");
?>
<form action="<?php echo $address ;?>autotheque/depot" method="POST" enctype="multipart/form-data">
   <h2 align="center" class="text-center text-muted">Déposer une Recherche dans l'autothèque</h2>
   <hr>
      <div class="text-danger">
        <div align="center">
          <h4><strong>Simple, Rapide et Efficace ...<br>
            Déposer Gratuitemant votre recherche de voiture.<br>
            Grâce à notre autothèque, formulez votre demande rapidement et attendez d'être contacté par un vendeur particulier ou professionnel. </strong></h4>
        </div>
      </div><br>
   <div class="panel panel-default">
    <div class="panel-heading" style="padding-bottom:0;background-color:#900;">
     <p style="color:#fff;"><strong>INFORMATIONS PERSONNELLES</strong></p>
    </div>
    <div class="panel-body">
       <div class="form-group">
         <div class="row">
             <div class="col-xs-2">
                <label class="control-label" for="marque_v"> Prénom : </label>
              </div>
                <div class="col-xs-4">
                <input type="text" class="form-control" name="prenom_ch" placeholder="Prénom" required="" autofocus></input>
                </div>
                 <div class="col-xs-2">
                <label class="control-label" for="marque_v"> Nom : </label>
              </div>
                <div class="col-xs-4">
                <input type="text" class="form-control" name="nom_ch" placeholder="Nom" required=""></input>
                </div>
         </div>
       </div>
              <div class="form-group">
         <div class="row">
             <div class="col-xs-2">
                <label class="control-label" for="marque_v"> Téléphone : </label>
              </div>
                <div class="col-xs-4">
               <input class="form-control" name="tel_ch" type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" placeholder="Téléphone" required ></input>
                </div>
                <div class="col-xs-2">
                <label class="control-label" for="marque_v"> Email : </label>
              </div>
                <div class="col-xs-4">
               <input class="form-control" name="email_ch" type="email" placeholder="Email" required=""></input>
                </div> 
         </div>
       </div>
    </div>
    </div>
   <div class="panel panel-default">
    <div class="panel-heading" style="padding-bottom:0;background-color:#900;">
          <p style="color:#fff;"><strong>DESCRIPTION DU VÉHICULE RECHERCHÉ</strong></p>
    </div>
    <div class="panel-body"> 
   
     <div class="form-group">
          <div class="row"> 
         <div class="col-xs-3">
                <label class="control-label" for="marque_v"> Marque : </label>
       </div>
            <div class="col-xs-9">
                <?php $obj= new Database(); $t_m= $obj->cherche_rqt("SELECT * FROM marque"); $t_m; ?>  
                <select class="form-control" name="marque_v" id="marque_v" onChange="modele();" required>
                <option id="marque"> Sélectionnez </option>
                  <?php foreach($t_m as $marque){
                    echo "<option value=".$marque['id']." >".$marque['title']."</option>";
                        }   ?>
                  </select> 
            </div>    
        </div>
      </div><!--Fin input  Marque --> 

         <div class="form-group">
          <div class="row"> 
         <div class="col-xs-3">
          <label class="control-label" for="modele_v"> Modèle : </label>
       </div>
            <div class="col-xs-9">
              <select class="form-control" name="modele_v" id="modele_v" placeholder="Modele Voiture" required> 
                  <option id="model"> Sélectionnez </option>
              </select>  
            </div>    
        </div>
      </div><!--Fin input Modèle -->
       <div class="form-group">
      <div class="row"> 
      <div class="col-xs-3">
                <label class="control-label" for="prix_v">Budget :</label>
            </div>
            <div class="col-xs-4">
               <input type="number" class="form-control" name="budget" id="prix" placeholder="Prix Voiture" required>
            </div>
        <div class="col-xs-2">
          <label class="control-label" for="type_a">Type :</label>
      </div>
            <div class="col-xs-3">
              <select name="type_a" id="type_a" class="form-control">
                <option value="selectionnez"selected>Sélectionnez </option>
                <option value="neuf" > Neufs </option>
                <option value="occasion" > Occasion </option>
                <option value="location"> Location </option>
              </select>
            </div>
          </div> 
       </div> 

    <div class="form-group">
        
          <div class="row"> 
         <div class="col-xs-3">
                <label class="control-label" for="transmission"> Transmission : </label>
         </div>
             <div class="col-xs-4">
                 <select name="transmission" id="transmission" class="form-control">
                <option value="selectionnez"selected>Sélectionnez </option>
                <option value="tous"> Tous </option> 
                <option value="manuel"> Manuel </option>
                <option value="automatique"> Automatique </option>
                <option value="sequentiel"> Séquentiel </option>
                <option value="autre"> Autre </option>
              </select>
             </div>
          <div class="col-xs-2">
                <label class="control-label" for="carburant"> Carburant : </label>
         </div>
         <div class="col-xs-3">
          <select name="carburant" id="carburant" class="form-control">
                <option value="selectionnez"selected>Sélectionnez </option>
                <option value="tous"> Tous </option>
                <option value="essence"> Essence </option>
                <option value="gazoil" > Gazoil </option>
                <option value="electrique" > Electrique </option>
                <option value="hybride"> Hybride </option>
                <option value="gpl" > GPL </option>
                <option value="cng" > CNG </option>
                <option value="autre" > Autre </option>
              </select>
             </div>
           </div>     
   </div><!-- Fin transmission et carburant -->
     <div class="form-group">
          <div class="row"> 
         <div class="col-xs-3">
          <label class="control-label" for="prevision_achat"> Prévision d'achat : </label>
       </div>
            <div class="col-xs-9">
          <select name="prevision_achat" class="form-control" required=>
              <option value="selectionnez"selected>Sélectionnez </option>
              <option value="l'immediat">Immédiat</option><option value="une semaine">Une semaine</option><option value="deux semaines">Deux semaines</option><option value="un mois">Un mois</option><option value="trois mois">Trois mois</option>
            </select>
            </div>    
        </div>
      </div><!--Fin Prevision d'Achat -->
    <div class="form-group">
       <div class="row">  
       
         <div class="col-xs-3">
                <label class="control-label" for="cylindre"> Période : de</label>
        </div>
             <div class="col-xs-4">
              <select name="annee_depart" class="form-control">
              <option value="selectionnez"selected>Sélectionnez </option>
               <?php 
          for ($i=intval(date("Y")) ; $i>=1950 ; $i--){
            echo "<option value='$i'> $i </option>";
           }
          ?> 
              </select>
             </div>
             <div class="col-xs-2">
              <label class="control-label" for="couleur">  à: </label>
             </div>
       <div class="col-xs-3">
        <select name="annee_fin" class="form-control">
        <option value="selectionnez"selected>Sélectionnez </option>
          <?php 
          for ($i=intval(date("Y")) ; $i>=1950 ; $i--){
            echo "<option value='$i'> $i </option>";
           }
          ?>
        </select>
        </div>
        </div>
    </div><!-- intervalle d'annee  -->

        <div class="form-group">
          <div class="row"> 
         <div class="col-xs-3">
          <label class="control-label" for="titre_a"> Description : </label>
         </div>
            <div class="col-xs-9">
            <textarea rows="4" class="form-control" name="description_a" id="descr_a" placeholder="Description" ></textarea>  
            </div>
           </div>     
        </div>
     </div>
  <div class="row">
    <div class="col-xs-4 col-xs-offset-2">
      <input type="hidden" name="date_pub" value="<?php echo date("Y-m-j")?>" >
     <input type="submit" value="Déposez Votre Recherche" class="btn btn-sm btn-danger form-control">
    </div>
     <div class="col-xs-4 col-xs-offset-1">
      <input type="reset" class="btn btn-sm btn-default form-control">
     </div>
  </div><br>
</div><!--Fin Detail annonce--> 

  </form>
  <br> 

</div>
</div><!--Fin de la ligne row -->
<?php } ?>
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

