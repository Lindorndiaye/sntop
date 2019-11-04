<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address."securiteRoutiere" ;?>">Sécurité Routière</a></li>
</ol>
<div style="padding-bottom:10px;">
<div class="panel panel-danger">
<div class="panel-heading" style="background:#900;color:#fff;">
	<strong>Sécurité Routière</strong>
</div>
<div class="panel-body">
	<?php  $art=getArticle ("securiteRoutiere");
           foreach ($art as $key => $value) { ?>
           <div class="row" style="margin:5px">
              <h5 class="text- text-muted"><strong> <?php echo $value['nom_article']; ?></strong> </h5>
              <div class="col-sm-4">
              <?php if($value['photo_actu'] != "" ): ?>
               <img src="<?php echo $address."images/actu/".$value['photo_actu']; ?>" class="img-thumbnail img-responsive" > 
              <?php endif ?>
            </div>
              <div class="col-sm-8"> <?php echo $value['text_intro'];?></div>
            <a href="<?php echo $address.$value['titre'] ;?>" class='pull-right'><button class="btn btn-xs btn-danger">Lire l'article</button></a>
           </div><hr style="margin:4px;background-color:#900;"> 	
     <?php  } ?> 
</div>