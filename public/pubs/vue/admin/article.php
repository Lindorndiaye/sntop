<link href="<?php echo $address; ?>css/simple-sidebar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
 <div id="page-content-wrapper">
    <div class="container-fluid">
    <?php if ($_GET['value'] == "ajouter"): ?>
       <div class="row" style="background-color:#ccc;">
         <h3 class="text-danger text-center">Ajoutez un Article </h3></div>
       <?php 
if(isset($_POST['contenue'])){
$obj= new Database();
$_POST['titre']= md5($_POST['nom_article']); $_POST['article']="article";
if($_POST['rubrique']=="publiInfo"){$_POST['nom_rubrique']= "Publi-Info";}
else if($_POST['rubrique']=="guideInfo"){$_POST['nom_rubrique']= "Guide Info";}
else if($_POST['rubrique']=="actualites"){$_POST['nom_rubrique']= "Actualités";}
else if($_POST['rubrique']=="portrait"){$_POST['nom_rubrique']= "Portrait de la semaine";}
else {$_POST['nom_rubrique']= "Sécurité Routière";}
 if ($Lid=$obj->ajouter("articles" , $_POST)){ 
    if (isset($_FILES)) {
       $file=$_FILES['photo_actu'];
       $inf_file = pathinfo($file['name']);
       $ext_charge= $inf_file['extension'];
       move_uploaded_file($file['tmp_name'], "images/actu/".$Lid.".".$ext_charge);
      $obj->modifier("articles", "photo_actu", $Lid.".".$ext_charge , "id_art" , $Lid );
    } 
  ?>
  <div class="alert alert-success" id="myAlert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Article ajouté avec succès</strong>.
    <meta http-equiv="refresh" content="; URL=<?php echo "$address";?>admin/article/list">
 </div>
<?php  }  } ?>
         <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <form class="form" method="POST" enctype="multipart/form-data" >
                  <div class="form-group" style="margin-top:20px;">
                    <div class="row">
                      <div class="col-md-3">Rubrique de l'article :</div>
                      <div class="col-md-9">
                       <select class="form-control" size="6" name="rubrique" required >
                        <option value="publiInfo">Publi-Info</option>
                        <option value="guideInfo">Guide-Info</option>
                        <option value="actualites">Actualités</option>
                        <option value="portrait">Portrait</option>
                        <option value="securiteRoutiere">Sécurité Routière</option>
                      </select>
                      </div>
                    </div>
                  </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3"> Titre de l'Article :</div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nom_article" placeholder="Titre de l'article" required></input>
                    </div>
                  </div>
                 </div>
                 <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3"> Texte d'introduction :</div>
                    <div class="col-sm-9">
                      <textarea type="text" class="form-control" name="text_intro" placeholder="Texte Inroduction" rows="4" required></textarea>
                    </div>
                  </div>
                 </div>
                 <div class="form-group" id="divActu">
                  <div class="row">
                    <div class="col-sm-3"> Photo de Présentation :</div>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="photo_actu" required></input>
                    </div>
                  </div>
                 </div>
                <h4> Contenu :</h4>
                 <textarea id="myarea1" class="mceEditor" name="contenue"></textarea>
                 <br>
                 <input type="submit" class="btn btn-success" value="Enregistrer"></input>
                 <a href="<?php echo $address;?>admin/annonce/list"><button type="button" class="btn btn-default">Annuler</button></a>
            </form>
            <?php include 'addImage.php'; ?>
            <?php else: $obj=new Database(); ?>
            <?php  if($_GET['value'] == "list"){ 
            $articles = $obj->cherche_rqt("SELECT * FROM articles WHERE article='article' ");
             }else{
            $rubr= $_GET['value']; 
            $articles = $obj->cherche_rqt("SELECT * FROM articles WHERE rubrique='$rubr' ORDER BY id_art DESC ");
              } ?>
        <div class="row" style="background-color:#ccc;"><h3 class="text-danger text-center">Listes des Articles</h3></div>
         <div class="row">
             <div class="col-sm-12">
             <div class="alert"></div>  
               <table class="table table-striped table-bordered table-condensed">
                    <thead><th>Titre :</th>
                    <th>Rubrique : </th> <th> Action :</th></thead>
                    <tbody>
                     <?php foreach ($articles as $key => $value) { ?>
                     <tr id="<?php echo $value['id_art']; ?>" class="text-muted" >
                       <td><?php echo $value['nom_article']; ?> </td>
                       <td><?php echo $value['nom_rubrique']; ?> </td>
                       <td align="center">
                       <button class="btn btn-xs btn-danger supprimer" ><span class="glyphicon glyphicon-trash"></span></button>
                       <a href="<?php echo $address."admin/editer/".$value['titre'];?>"><button class="btn btn-xs btn-warning" ><span class="glyphicon glyphicon-pencil"></span></button></a>
                       <button class="btn btn-xs btn-default voir"><span class="glyphicon glyphicon-eye-open"></span></button>
                       </td>
                     </tr>
                     <?php } ?> 
                    </tbody>
               </table>
               <a href="<?php echo $address; ?>admin/article/ajouter" data-toggle="tooltip" data-placement="right" id="add" title="Ajouter un Article" class="test" ><span class="glyphicon glyphicon-plus-sign text-danger" style="font-size:40px;line-height:40px;"></span></a>
             </div>
         </div>     
<?php endif ?>
    </div>
</div>
<script src='<?php echo $address?>js/tinymce/tiny_mce.js'></script>
<script type="text/javascript" src="<?php echo $address; ?>js/jquery.js"></script> 
<script type="text/javascript" src="<?php echo $address; ?>js/bootstrap.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $address; ?>js/dt.js"></script> 
<script type="text/javascript" src="<?php echo $address; ?>js/editeur.js"></script> 
<script type="text/javascript">
  $(document).ready(function(){  
     $(".supprimer").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez vous vremment supprimer cette annonce");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "supprimerArticle" , id: id  });
        del.done(function( data ){ $("#"+id).html("<td><td>Ligne supprimé <td><td>").fadeIn();$("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
     });
    $("#add").tooltip();    
 });
</script>