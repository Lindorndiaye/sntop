<div class="row">
 	<div class="panel panel-danger" style="background-color:#eee;">
 		<div class="panel-body" >	
 		 	<div class="row"> 
 		 		<div class="col-xs-3">
                    <div class="thumbnail">
                        @if($ance->photos_principal == "logo.png" or $ance->photos_principal=="" )
                            <img src='".$address."images/TOP.png'>
                        @else
                            <img class="tag" src="{{ asset('images/'.$ance->type_annonce.'.png')}} ">  
                            <img src="{{ asset('images/annonce/voiture/'.$ance->photos_principal)}}" width="98%">
                        @endif
                    </div>
                </div>
 		 		<div class="col-xs-8">
                    <u> Titre :<?php echo $ance->titre ?></u><br>
                    Description : <?php echo $ance->description?><br>
                    Prix : <?php echo $ance->prix?><br>
                    Date :	<?php echo $ance->date?><br>
 		 		</div>
 		 	</div>
 		</div>
        <div style="border-top:solid 1px #ccc;padding:10px; background-color:#fff;box-shadow: 0 8px 16px #ccc;" >
            <div class="row">
                <div class="col-xs-4" style="padding-bottom:0px;">
                    <a href="{{ url('publier/confirmer-'.$ance->id.'-'.$ance->id_voiture) }}">
                    <button  class="btn btn-warning btn-xs">Ajouter / Modifier Options </button></a>
                </div>
                <div class="col-xs-4" style="padding-bottom:0px;">
                    <form method="POST">
                        <input type="hidden" name="id_a" value="<?php echo $ance->id;?>"> 
                        <input type="hidden" name="id_v" value="<?php echo $ance->id_voiture;?>">
                        <button type="submit" name="suppr_annonce" class="btn btn-danger btn-xs">Supprimer</button>
                    </form>
                </div>
                <div class="col-xs-4" style="padding-bottom:0px;">
                    <a href="{{ url('detail-annonce_voiture-'.$ance->id)}}">
                        <button class="btn btn-default btn-xs">Voir l'annonce</button>
                    </a>
                </div>
            </div>
 		</div>
    </div>
</div>

	