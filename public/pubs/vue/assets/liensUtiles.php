<style type="text/css">
.list-group-item{
  padding-bottom: 0;
}	
</style>
<div class="list-group">
 <a href="<?php echo $address;?>conseilsAchat"class="list-group-item  " title="Conseils d'Achat ">Conseils d'Achat</a> 
 <a href="<?php echo $address;?>ExaminerUneVoiture" class="list-group-item list-group-item-default" title="Examiner une voiture">Examiner une Voiture</a>
 <a href="<?php echo $address;?>Entretien" class="list-group-item" title="Comment faire un Entretien">L'entretien</a>
 <a href="#vehicules"id="colv"  data-toggle="collapse" class="list-group-item list-group-item-default">Véhicule<span id="iconv" class="glyphicon glyphicon-plus pull-right"></span></a>

   <div id="vehicules" class="collapse">
        <ul class="list-group">
         <a href="<?php echo $address;?>publiInfo" class="list-group-item" >Publi-Info</a>
         <a href="<?php echo $address;?>actualites" class="list-group-item" >Actualités </a>
         <a href="<?php echo $address;?>securiteRoutiere" class="list-group-item" >Sécurité Routière</a>
        </ul>
      </div>
</div>


<script type="text/javascript">
	$("#colv").click(function(){
		$("#iconv").toggleClass('glyphicon-plus').toggleClass('glyphicon-minus');
	});
</script>