<link href="<?php echo $address; ?>css/simple-sidebar.css" rel="stylesheet">
<div id="page-content-wrapper">
    <div class="container-fluid">
<?php $option=$_GET['value']; $obj= new Database(); ?>
<?php  if($option == "ajout"){ ?>

<div class="row" style="background-color:#ccc;"><h3 class="text-danger text-center">Ajout d'un utilisateur</h3> </div>
<?php 
if(isset($_POST['email'])){
 extract($_POST);  
 echo $compte;       
 if($compte == "professionnel"){
 $valeur=array('pseudo'=>$login,
  				 'mot_de_passe'=>md5($mot_de_passe),
  				 'prenom'=>$prenom,
  				 'nom'=>$nom,
                 'type_cmpte'=>$compte,
                 'email'=>$email,
                 'date_adhesion'=> date('Y-m-d H:i:s'),
                 'telephone'=>$telephone,
                 'concession'=>$concession,
      			 'adresse'=>$adresse,
       			 'marque_representee'=>$marques,
      			 'site_web'=>$site_web,
               );
  }else{
  $valeur=array('pseudo'=>$login,
  				 'mot_de_passe'=>md5($mot_de_passe),
  				 'prenom'=>$prenom,
  				 'nom'=>$nom,
                 'type_cmpte'=>$compte,
                 'email'=>$email,
                 'date_adhesion'=> date('Y-m-d H:i:s'),
                 'telephone'=>$telephone );
          } 
$obj= new Database();
$Lid=$obj->ajouter("annonceur" , $valeur);
 if($_FILES != NULL){  
      $file=$_FILES['logo'];
      $inf_file = pathinfo($file['name']);
      $ext_charge= $inf_file['extension'];
      move_uploaded_file($file['tmp_name'], "images/conc/".$Lid.".".$ext_charge); 
      $obj->modifier("annonceur" , "logo" ,$Lid.".".$ext_charge , "id_annonceur", $Lid);
  }//fin file ?>
          <div class="alert alert-success" id="myAlert">
            <a href="<?php $address;?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Utilisateur ajouté avec succès</strong>.
               <meta http-equiv="refresh" content="3; URL=<?php echo "$address";?>admin/annonceur/list">
            </div>

<?php }//Fin post  ?>
<div class="row" style="margin-top:20px;">
<div class="col-sm-10 col-sm-offset-1">
 <form id="forma" class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

        <div class="form-group" >
            <label class="control-label col-xs-3" for="identifiant1">Identifiant*:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="login" id="pseudo1" placeholder="Nom d'Utilisateur ">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="inputPassword">Mot de Passe*:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="mot_de_passe" id="password1" placeholder="Mot de Passe">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="email1" >Email*/ Phone *:</label>
            <div class="col-xs-4 ">
                <input type="email" class="form-control" name="email" id="email1" placeholder="Adresse email" required>
            </div>
            <div class="col-xs-4 ">
               <input type ="tel"  class="form-control" name="telephone" id="telephone" placeholder="telephone" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="compte">Type de Compte*:</label>              
            <div class="col-xs-8 ">
                <select name="compte" id ="compte" class="form-control" size="5"> 
                <option value="professionnel"> Professionnel </option>
                <option value="particulier"> Particulier </option>
                </select> 
            </div>
        </div>
         <div class="panel panel-danger " id="divPersonne" style="padding: 10px;margin: 20px;">
        <div class="form-group">
            <label class="control-label col-xs-3" for="firstName">Prénom et Nom:</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="prenom" id="firstName" placeholder="Prenom" >
            </div>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nom" id="lastName" placeholder="Nom" >
            </div>
        </div>
    </div>
    
       <div class="panel panel-danger hide" id="divEntreprise" style="padding: 10px;margin: 20px;">
         <div class="form-group " >
            <label class="control-label col-xs-3" for="concession" >Concession :</label>
            <div class="col-xs-8 ">
             <input type="text" class="form-control" name="concession" id="entreprise" placeholder="Nom Concession ">
            </div>
        </div>
         <div class="form-group " >
            <label class="control-label col-xs-3" for="adresse" >Adresse :</label>
            <div class="col-xs-8 ">
             <input type="text" class="form-control" name="adresse" id="entreprise" placeholder="Adresse">
            </div>
        </div>
        <div class="form-group " >
            <label class="control-label col-xs-3" for="marque" >Marques représentées :</label>
            <div class="col-xs-8 ">
             <input type="text" class="form-control" name="marques" id="entreprise" placeholder="Marques représentées ">
            </div>
        </div>
        <div class="form-group " >
            <label class="control-label col-xs-3" for="site" >Site Web :</label>
            <div class="col-xs-8 ">
             <input type="text" class="form-control" name="site_web" id="entreprise" placeholder="Site Web">
            </div>
        </div>
         <div class="form-group " >
            <label class="control-label col-xs-3" for="logo" >Logo :</label>
            <div class="col-xs-8 ">
             <input type="file" class="form-control" name="logo" id="entreprise" >
            </div>
        </div>
      </div>
       
</div>

  <div class="row col-sm-4 col-sm-offset-5">
         <input type="submit"  class="btn btn-danger" value="Valider">
         <input type="reset" class="btn btn-default" value="Effacer"> <br>
 </div>
    
   </div>
</div>
</form>

<script type="text/javascript">
  $( "select" ).change(function () {
    var str =  $("select option:selected").val();
    if( str == "professionnel" ){
      $("#divEntreprise").removeClass("hide");
      $("#divPersonne").addClass("hide");
    }else if (str != "professionnel"){
      $("#divPersonne").removeClass("hide");
      $("#divEntreprise").addClass("hide");
    }
  });
</script>
  <?php }else if($option == "TopConcessionnaire") { ?>
    <?php if(isset($_POST['nom'])){

        if($_FILES != NULL){  
            $file=$_FILES['logo'];
            $inf_file = pathinfo($file['name']);
            $ext_charge= $inf_file['extension'];
            move_uploaded_file($file['tmp_name'], "images/conc/".$_POST['nom'].".".$ext_charge); 
            $obj= new Database();
            $obj->ajouter("conc" , array("nom"=>$_POST['nom'],"link"=>$_POST['site'],"logo"=>$_POST['nom'].".".$ext_charge) );
        } ?>
         <div class="alert alert-success" id="myAlert">
            <a href="<?php $address;?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Le Concessionnaire apparaitra dans la rubrique des top concessionnaires</strong>.
        </div>
    <?php } ?>
     <div class='col-sm-6 col-sm-offset-4 '>
      <form method="post" enctype='multipart/form-data'> 
      <div class='form-group'>
       <label>Concession </label>
        <input type='text' name='nom' class='form-control'>
       </div>
       <div class='form-group'>
       <label>Site Web </label>
        <input type='url' name='site' class='form-control'>
       </div>
       <div class='form-group'>
       <label>Logo </label>
        <input type='file' name='logo' class='form-control'>
       </div>
       <div class='form-group'>
        <input type='submit' class='btn btn-danger form-control' value='VALIDER' >
       </div>
      </form>
    </div> 
  <?php }else { ?>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
 <div id="alert"></div>
<div class="row" style="background-color:#ccc;"><h3 class="text-danger text-center"> <?php echo $_GET['value']; ?> </h3> </div>
 <?php	if ($option != "list") {
 			$annonceur=$obj->cherche_rqt("SELECT * FROM annonceur WHERE type_cmpte= '$option' ORDER BY id_annonceur DESC");
 		}else{
 			$annonceur=$obj->cherche_rqt("SELECT * FROM annonceur WHERE type_cmpte != 'concessionnaire' ORDER BY id_annonceur DESC ");
 		} ?>
  <table class="table table-bordered table-condensed table-striped" >
   <thead> <th>Pseudo</th> <?php if($option == "concessionnaire") echo '<th>Entreprise</th>';  ?>
   <th>Téléphone</th> <th>Email</th> <th>Date Inscription</th>
   <th>Dernière Connexion</th><th>Action</th> </thead>
    <tbody>
  <?php foreach ($annonceur as $key => $value) { ?>
      <tr class="text-muted" id="<?php echo $value['id_annonceur']; ?>">
      <td><strong> <?php echo $value['pseudo']; ?> </strong></td>
      <?php if($option =="concessionnaire") echo  "<td><strong>".$value['entreprise']."</strong></td>"; ?>
      <td><?php echo $value['telephone']; ?> </td>
      <td><?php echo $value['email']; ?> </td>
      <td><?php echo preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9:]+)$#"," $3-$2 $1 à $4", $value['date_adhesion'] );  ?></td>
      <td><?php echo preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9:]+)$#"," $3-$2 $1 à $4", $value['dernier_conn'] );  ?></td>
      <td align="center"> 
      <?php if( $value['statut'] == 0 ): ?>
      <button class="btn btn-default btn-sm debloquer"><span class="glyphicon glyphicon-remove"></span></button>
      <?php else: ?>
      <button class="btn btn-success btn-sm bloquer"><span class="glyphicon glyphicon-ok"></span></button>
      <?php endif ?>
      <button class="btn btn-danger btn-sm supprimer"><span class="glyphicon glyphicon-trash"></span></button> 
      </td>
      </tr>
    <?php }  ?>
     </tbody>
  </table>
<a href="<?php echo $address; ?>admin/annonceur/ajout" data-toggle="tooltip" data-placement="right" id="add" title="Ajouter un Utilisateur" class="test" ><span class="glyphicon glyphicon-plus-sign text-danger" style="font-size:40px;line-height:40px;"></span></a>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $address;?>js/dt.js"></script> 
<script type="text/javascript">
  $(".supprimer").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez vous vremment supprimer ce utilisateur");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "supprimerAnnonceur" , id: id  });
        del.done(function( data ){ $("#"+id).html("<td><td>Utilisateur supprimé <td><td><td>").fadeIn();$("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
  $(".bloquer").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez vous vremment bloquer cet annonceur");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "bloquer" , id: id  });
        del.done(function( data ){ $("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
  $(".debloquer").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Cet annonceur seras débloquer");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "debloquer" , id: id  });
        del.done(function( data ){ $("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
 $("#add").tooltip(); 
 </script>

 <?php } ?>


