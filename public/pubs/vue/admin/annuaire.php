<link href="<?php echo $address; ?>css/simple-sidebar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
<style type="text/css"> 
.span-couleur{ display:inline-block; width:50px ; height:30px ;border:solid 1px #ccc; }
</style>
<div id="page-content-wrapper">
    <div class="container-fluid">
    <?php if($_GET['value']=="ajouter"):   ?>
    <div class="row" style="background-color:#ccc;margin-bottom:20px;">
      <h3 class="text-danger text-center">Ajouter une Entreprise</h3></div>
       <?php
       if(isset($_POST['ajouter'])){
         unset($_POST['ajouter']);
         $obj = new Database();
         $_POST['nom_categorie']= str_replace(' ', '' , $_POST['categorie']);
        if(isset($_FILES['logo']) != null ){
          $file=$_FILES['logo'];
          $inf_file = pathinfo($file['name']);
          $ext_charge= $inf_file['extension'];
          move_uploaded_file($file['tmp_name'], "images/annuaire/".$_POST['nom'].".".$ext_charge); 
          $_POST['logo'] = $_POST['nom'].".".$ext_charge;
        }else{ $_POST['logo'] = "shop.png"; }
        if ($obj->ajouter("annuaire" , $_POST)){
        ?>
           <div class="alert alert-success" id="myAlert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Contact Annuaire! Entreprise ajoutée avec succès</strong>.
             <meta http-equiv="refresh" content="3; URL=<?php echo "$address"; ?>admin/annuaire/list" > 
            </div>
      <?php  }  }

       else if(isset($_POST['modifie'])){
         $obj = new Database();
         $_POST['nom_categorie']= str_replace(' ', '' , $_POST['categorie']);
         $valeur = array('nom' => $_POST['nom'],'email' => $_POST['email'],'tel'=>$_POST['tel'] , 'adresse'=>$_POST['adresse'], 'site'=>$_POST['site'] , 'couleur'=>$_POST['couleur'] );
        if ($obj->modifier_plus("annuaire" , $valeur , "id" , $_POST['modifie'] )){           
?>
           <div class="alert alert-success" id="myAlert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Contact Annuaire! modifié  avec succès</strong>.
             <meta http-equiv="refresh" content="3; URL=<?php echo "$address";?>admin/annuaire/list">
            </div>
      <?php  }  } ?>

       <div class="col-sm-10 col-sm-offset-1">
           <form class="form" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="row">
                   <div class="col-sm-3">
                     Annuaire :
                   </div>
                   <div class="col-sm-9">
                   <?php  if(isset($_POST['modifier'])){ ?>
                      <input type="text" class="form-control" name="categorie" value="<?php echo $_POST['categorie']; ?>" disabled>
                    <?php }else{ ?>
                      <select name="categorie" size="4" class="form-control" required>
                       <option value="Crédit Automobile">Crédit Automobile</option>
                       <option value="Assurance Automobile">Assurance Automobile</option>
                       <option value="Agence de Location">Agences de Location</option>
                       <option value="Concessionnaire">Concessionnaires</option>
                       <option value="Auto Ecole">Auto-Ecoles</option>
                       <option value="Pièces Détachées">Pièces détachées/ Accessoires</option>
                       <option value="Pneumatique">Pneumatique</option>
                       <option value="Hydrocarbure">Hydrocarbures</option>
                       <option value="Garage Mécanique">Garages Mécaniques</option>
                       <option value="Carosserie et Peinture">Carrosserie / Peinture</option>
                       <option value="Climatisation">Climatisation</option>
                       <option value="Nettoyage et Accessoire">Nettoyage Professionnel</option>
                     </select>
                   <?php  } ?>
                   </div>
                </div>
              </div>
              <div class="form-group">
                 <div class="row">
                    <div class="col-sm-3">
                     Nom de l'entreprise :
                    </div>
                    <div class="col-sm-9">
                      <input class="form-control" name="nom" placeholder="nom de l'entreprise" required="" value="<?php echo $_POST['nom']; ?>"></input>
                    </div>
                 </div>
              </div>
            <div class="form-group">
                 <div class="row">
                    <div class="col-sm-3">
                     Téléphone :
                    </div>
                    <div class="col-sm-3">
                      <input class="form-control" name="tel" placeholder="telephone" required="" value="<?php echo $_POST['tel']; ?>"></input>
                    </div>
                     <div class="col-sm-2">
                     Email :
                    </div>
                    <div class="col-sm-4">
                      <input class="form-control" name="email" type="email" placeholder="adresse email" value="<?php echo $_POST['email'] ?>"></input>
                    </div>
                 </div>
             </div>
             <div class="form-group">
                 <div class="row">
                    <div class="col-sm-3">
                     Adresse de l'entreprise :
                    </div>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="adresse" rows="2" placeholder="adresse de l'entreprise" value="" required> <?php echo $_POST['adresse'] ?></textarea>
                    </div>
                 </div>
             </div>
             <div class="form-group">
                 <div class="row">
                    <div class="col-sm-3">
                     Site Web :
                    </div>
                    <div class="col-sm-9">
                      <input class="form-control" name="site" placeholder="site" value="<?php echo $_POST['site']; ?> "> 
                    </div>
                 </div>
             </div>
              <div class="form-group">
                 <div class="row">
                    <div class="col-sm-3">
                     Logo :
                    </div>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="logo" placeholder="logo entreprise"> 
                    </div>
                 </div>
             </div>
             <div class="form-group">
                 <div class="row">
                    <div class="col-sm-3">
                     Couleur :
                    </div>
                    <?php if($_POST['couleur']=="notice-danger"){$da="checked";}elseif($_POST['couleur']=="notice-primary"){$pr="checked";} 
                     elseif($_POST['couleur']=="notice-info"){$in="checked";}elseif($_POST['couleur']=="notice-warning"){$wa="checked";}
                     elseif($_POST['couleur']=="notice-success"){$su="checked";} else{$de="checked";} 
                    ?>
                    <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-default" <?php echo $de;?>><span class="span-couleur btn-default"></span></label></div>                   
                    <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-primary" <?php echo $pr;?>><span class="span-couleur btn-primary"></span></label></div>
                    <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-info"  <?php echo $in;?>><span class="span-couleur btn-info"></span></label></div>
                    <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-warning" <?php echo $wa;?>><span class="span-couleur btn-warning"></span></label></div>      
                    <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-danger" <?php echo $da;?>><span class="span-couleur btn-danger"></span></label></div>
                    <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-success" <?php echo $su;?> ><span class="span-couleur btn-success"></span></label></div>


                    </select>
                 </div>
             </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
               <?php  if(! isset($_POST['modifier'])): ?>
                 <input type="hidden" name="ajouter" >
                 <button type="submit"  class="btn btn-sm btn-success form-control">Ajouter l'annuaire</button>
               <?php else: ?> 
                 <input type="hidden" name="modifie" value="<?php echo $_POST['id'];?>">
                 <button type="submit"  class="btn btn-sm btn-success form-control">Modifier l'annuaire</button>
               <?php endif ?>
                </div>
              </div> 
            </div>
           </form>
       </div>

    <?php else: ?>
    <div class="row" style="background-color:#ccc;margin-bottom:20px;"><h3 class="text-danger text-center">Listes des Annuaires</h3></div>
    <div id="alert"></div>
      <table class="table table-striped table-bordered table-condensed">
      <thead><th></th>
      <th>Catégorie Annuaire </th><th >Nom Entreprise </th><th> Téléphone</th> <th> Email</th> <th> Action</th></thead>
    <?php $obj=new Database();
          $annuaires=$obj->cherche_rqt("SELECT * FROM annuaire ORDER BY id DESC");
          foreach ($annuaires as $key => $value) { ?>
              <?php if ($value['afficher'] == 1): ?>
            <tr id="<?php echo $value['id']; ?>" class="text-success">
            <td align="center">
              <span class="glyphicon glyphicon-ok-sign text-success"></span> 
              <?php else: ?>
            <tr id="<?php echo $value['id']; ?>" class="text-warning">
            <td align="center">
              <span class="glyphicon glyphicon-remove-sign text-warning"></span>
              <?php endif ?>
            </td>
            <td><?php echo $value['categorie']; ?></td>
            <td><?php echo $value['nom'] ?></td>
            <td><?php echo $value['tel'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td align="center">
            <div class="row">
              <div class="col-sm-4">
              <button type="button" class="btn btn-xs btn-danger supprimer"><span class="glyphicon glyphicon-trash"></span> </button>
              </div>
              <div class="col-sm-4">
              <?php if ($value['afficher'] == 0): ?>
              <button  class="btn btn-xs btn-success afficher"><span class="glyphicon glyphicon-ok"></span> </button>
              <?php else: ?>
              <button class="btn btn-xs btn-warning retirer"><span class="glyphicon glyphicon-remove"></span> </button>
              <?php endif ?>
              </div>
              <div class="col-sm-4">
              <form method="post" action="<?php echo $address; ?>admin/annuaire/ajouter">
            
              <input type="hidden" name="nom" value="<?php echo $value['nom'] ?>" >
              <input type="hidden" name="id" value="<?php echo $value['id'] ?>" >
              <input type="hidden" name="tel" value="<?php echo $value['tel'] ?>" >
              <input type="hidden" name="email" value="<?php echo $value['email'] ?>" >
              <input type="hidden" name="adresse" value="<?php echo $value['adresse'] ?>" >
              <input type="hidden" name="categorie" value="<?php echo $value['categorie'] ?>" >
              <input type="hidden" name="couleur" value="<?php echo $value['couleur'] ?>" >
              <button type="submit" class="btn btn-xs btn-primary" name="modifier"><span class="glyphicon glyphicon-pencil"></span> </button>
              </form>
              </div>

            </td>
          </tr>
   <?php  } ?>
        </table>
<a href="<?php echo $address; ?>admin/annuaire/ajouter" data-toggle="tooltip" data-placement="right" id="add" title="Ajouter un contact annuaire" class="test" ><span class="glyphicon glyphicon-plus-sign text-danger" style="font-size:40px;"></span></a>
<script type="text/javascript" src="<?php echo $address; ?>js/jquery.js"></script> 
<script type="text/javascript" src="<?php echo $address; ?>js/bootstrap.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $address; ?>js/dt.js"></script> 
<script type="text/javascript">
  $(".supprimer").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez vous vremment supprimer cette annonce");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "supprimerAnnuaire" , id: id  });
        del.done(function( data ){ $("#"+id).html("<td><td>Contact supprimé <td><td><td>").fadeIn();$("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
  $(".afficher").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez vous vremment afficher ce contact");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "afficherContact" , id: id  });
        del.done(function( data ){ $("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
  $(".retirer").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Ce contact ne seras plus affiché dans le site");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "retirerContact" , id: id  });
        del.done(function( data ){ $("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
    $("#add").tooltip();    
</script>
    <?php endif ?> 
    </div>
</div>
