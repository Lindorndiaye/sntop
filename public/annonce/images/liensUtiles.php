<style type="text/css">
.list-group-item{
  padding-bottom: 0;
}	
</style>
<div class="list-group">
 <a href=""class="list-group-item  " title="Conseils d'Achat ">Conseils d'Achat</a> 
 <a href="" class="list-group-item list-group-item-default" title="Examiner une voiture">Examiner une voiture</a>
 <a href="" class="list-group-item" title="Comment faire un Entretien">L'Entretien</a>
 <a href="#vehicules"id="colv"  data-toggle="collapse" class="list-group-item list-group-item-default">Véhicules<span id="iconv" class="glyphicon glyphicon-plus pull-right"></span></a>

   <div id="vehicules" class="collapse">
        <ul list-group>
         <li class="list-group-item">  </span>
         <li class="list-group-item">  </span>
         <li class="list-group-item">  </span>
         <li class="list-group-item">  </span>
        </ul>
      </div>
</div>


<script type="text/javascript">
	$("#colv").click(function(){
		$("#iconv").toggleClass('glyphicon-plus').toggleClass('glyphicon-minus');
	});
</script>