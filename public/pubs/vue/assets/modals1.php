<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom:2px;">
        <span style="background-color:#fff;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo $address;?>images/fermer.png" height="30"></button></span>
       <div class="row">
          <div class="col-xs-3">
          <img src="<?php echo $address;?>images/TOP.png" width="100%">
          </div>
          <div class="pub" style="margin-top:0px;margin-right:10px;height:80px;overflow:hidden;">
   <?php $pub= new Pub(); $mapub=$pub->get_pub('popup_haut');?>
   <?php if ($mapub != 0): ?>
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'/pubs/'.$mapub[0]['photo']; ?>" class="" width="100%" ></a>
   <?php endif ?>
          </div>
       </div>
      </div>
       <div class="modal-body" >
      	<div class="row">
      	<div class="col-sm-8">
          <div class="pp" style="border:solid 1px #eee;">
           <button class="btn btn-inverse prev hide" id="prev"><span class="glyphicon glyphicon-chevron-left"></span></button>
           <button class="btn btn-inverse next hide" id="next"><span class="glyphicon glyphicon-chevron-right"></span></button> 
             <center>
             <img id="pp" class="img-responsive img-rounded" width="100%" height="420px" src="" >
            </center>
          </div>
          <div class="t_img" >
          <img src="<?php echo $address."annonce/".$t_a['id_voiture']."/".$t_a['photos_a_v'];?>" class="img-thumbnail" width="70">
          <?php  $t_a_v=explode(";" ,$t_v['photos_v']); 
           foreach($t_a_v as $tof){ ?>
           <img src="<?php echo $address."annonce/".$t_v['id_v']."/".$tof; ?>" class="img-thumbnail" width="70" >
           <?php  } ?>
        </div> 

        </div> 
        <div class="col-sm-4" >
          <div style="border-bottom:solid 1px #eee;">
           <h5 class="text-danger text-center"> Annonceur </h5>
          </div>
        	<?php 
          require_once("classes/annonceur.php");
          $acr = new annonceur();
          $t_acr=$acr->get_annonceur( $t_a['id_annonceur']); $t_acr=$t_acr[0];
          ?>
          <h4 class="text-muted text-center"><span class="glyphicon glyphicon-user"></span> 
          <?php echo $t_acr['prenom']." ".$t_acr['nom']; ?></h4>
          <p> <span class="glyphicon glyphicon-map-marker"></span> <?php echo $t_v['localite']; ?>
          <br>
          <div style="margin-bottom:5px;">
           <button class="btn btn-detail form-control afficheNum" > 
           <span class="glyphicon glyphicon-earphone"></span> Afficher Numéro</button></div>
          <div><button class="btn btn-detail form-control message">
            <span class="glyphicon glyphicon-envelope"></span> Envoyer Message </button></div>
            <div class='pub' style='margin-top:5px;'>
     <?php $pub= new Pub(); $mapub=$pub->get_pub('popup_side_1');?>
   <?php if ($mapub != 0): ?>
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'/pubs/'.$mapub[0]['photo']; ?>" class=""  width="100%" ></a>
   <?php endif ?></div><div  style='margin-top:5px;'> 
     <?php $pub= new Pub(); $mapub=$pub->get_pub('popup_side_2');?>
   <?php if ($mapub != 0): ?>
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'/pubs/'.$mapub[0]['photo']; ?>" class="" width="100%" ></a>
   <?php endif ?></div>
         
        </div>
       </div>
      </div> 
    </div>
  </div>
   </div>
</div>
<!-- MODAL pour le numero -->  
<div class="modal fade bs-example-modal-sm modal-vertical-centered" id="numero" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
             <div class="modal-header text-muted"> <span class="glyphicon glyphicon-earphone"></span> Téléphone de l'annonceur
             </div>  

             <div class="modal-body">
              <div class="panel panel-success" style="border-width: 2px;">
               <h4 class="text-muted text-center"> <?php echo preg_replace("#^(\+?[0-3]{3})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$#","$1 $2 $3 $4 $5", $t_acr['telephone']); ?></h4>
              </div>
               <div class="row">
                 <div class="col-sm-12 text-danger text-center">* Veuillez mentionnez Sn-TopAuto au vendeur SVP !</div>
               </div> 
             </div>
             <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>  
           </div>
       </div>
 </div><!-- FIN MODAL pour le numero -->  

 <!-- Modal de message  -->
<div class="modal fade" id="message" role="dialog" tabindex="-" role="dialog" aria-labelledby="mySmallModalLabel" >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         <div class="bande-noir"><h4 class="modal-title"> Message à l'annonceur</h4></div> 
        </div>
        <div class="modal-body">
          <form class="form" method="post">
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              E-mail :
                <input class="form-control" type="email" name="email_expediteur" value="<?php echo $_SESSION['email'];?>" placeholder="Votre e-mail" required autofocus></input>
              </div>
            </div>
            <div class="col-sm-6">
            Prénom et Nom :
              <input class="form-control" name="nom_expediteur" value="<?php echo $_SESSION['prenom'];?>" placeholder="Votre prénom et nom" required></input>
            </div>
          </div>
        <div class="row">
            <div class="col-sm-12">
            Objet :
              <input class="form-control" type="text" name="objet" placeholder="Objet de votre message" ></input><br>
             Message : 
              <textarea class="form-control" rows="4" name="contenue" placeholder="Votre message" required></textarea>
            </div>
          </div>
        </div> 
        <div class="modal-footer">
         <input type="hidden" name="id_destinataire" value="<?php echo $t_acr['id_annonceur']; ?>"  ></input>
          <button type="submit" class="btn btn-success" >Envoyer</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Femer</button>
        </div>  
     </form>   
    </div>
</div>
</div>
<!-- fin modal de message  -->
<!-- Modal de message  -->
<div class="modal fade" id="partager" role="dialog" tabindex="-" role="dialog" aria-labelledby="mySmallModalLabel" >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="bande-noir"><h4 class="modal-title"> Partager ce Véhicule</h4></div>
        </div>
        <div class="modal-body">
          <form class="form" method="post" action="">
            <div class="row">
             <div class="col-sm-6">
              <div class="form-group">
              <h4>E-mail :</h4>
                <input class="form-control" name="exp" placeholder="Votre Email" type="email" value="<?php echo $_SESSION['email'];?>" required autofocus ></input>
              </div>
              </div>
             <div class="col-sm-6" >
             <h4>Destinataire :</h4>
              <input class="form-control" name="dest[]" placeholder="Email destinnataire" type="E-mail" required ></input>
            </div>
          </div>
          <div class="row rowdesti">
          <div class="col-sm-6">
          	<button class="btn btn-primary desti form-control" data-toggle="tooltip" tittle="Ajouter un nouveau Destinataire"><span class="glyphicon glyphicon-plus"></span> Ajouter un destinataire</button>
          </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
            <h4>Titre :</h4>
              <input class="form-control" name="email_envoyeur" value=" <?php echo strtoupper($mm[1][1]." ".$mm[0][2] ." (".$t_v['annee_v']).")";?>"></input><br>
             <h4> Message :</h4>
              <textarea class="form-control" rows="4" name="message" placeholder="Votre message"></textarea>
            </div>
          </div>
        </div> 
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="submit">Envoyer</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </form> 
        </div>     
    </div>
</div>
</div>
<!-- fin modal de message  -->
<script type="text/javascript">
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();	
	  $(".desti").click(function(){
	  	 event.preventDefault();
	  	 $(".rowdesti").prepend("<div class='col-sm-6'> <input class='form-control' name='dest[]' placeholder='email destinnataire' type='email'></input><br><div/>")
	  });
	});
</script>