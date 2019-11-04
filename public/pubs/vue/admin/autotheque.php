<?php  session_start(); $option=$_GET['value']; $obj= new Database(); ?>
<link href="<?php echo $address; ?>css/simple-sidebar.css" rel="stylesheet">
<div id="page-content-wrapper">
    <div class="container-fluid">
    <?php if( $option=="genererCode" ){ ?>
        <div class="row" style="background-color:#ccc;margin-bottom:20px;"><h3 class="text-danger text-center">Génération d'un nouveau Code </h3></div>
        <form class="form" id="ajout">
          <div class="col-sm-10 col-sm-offset-1">
         	 <div class="form-group">  
    	       <div class="row">
    				<div class="col-sm-4">
    					Identifiant du consultant :
    				</div>
    				<div class="col-sm-8">
    				  <select size="3" type="text" class="btn-default form-control" name="id_ancr" style="font-size:20px;" required>
    				  	<?php  $annonces=$obj->cherche_rqt("SELECT id_annonceur, pseudo FROM annonceur ORDER BY id_annonceur DESC "); 
    				  	 foreach ($annonces as $key => $value) { ?>
    				  	 <option value="<?php echo $value['id_annonceur'].' '.$value['pseudo'];?>"><?php echo $value['pseudo'];?></option>
    				  <?php } ?>
    				  </select>
    				</div>
    			</div> 
             </div>	
             <div class="form-group">  
    	       <div class="row">
    				<div class="col-sm-4">
    					Durée de validité du code :
    				</div>
    				<div class="col-sm-8">
    				  <select name="date_fin" class="form-control">
    				  	<option value="8">Une semaine</option>
    				  	<option value="15">Deux semaines</option>
    				  	<option value="30">Un mois</option>
    				  	<option value="60">Deux mois</option>
    				  	<option value="90">Trois mois</option>
    				  </select>
    				</div>
    			</div> 
             </div>	
             <div class="form-group">  
    	       <div class="row">
    				<div class="col-sm-3"></div>
    				<div class="col-sm-6">
    				  <input type="hidden" name="action" value="GenererCode"></input>
    				  <button class="btn btn-danger btn-sm form-control" value="GenererCode"  type="submit">Générer un Code</button>
    				</div>
    			</div> 
             </div>

         </div>
      </form>
      <div class="row">
      	 <div class="col-sm-10 col-sm-offset-1" >
      	   <div class="panel panel-danger">
      	   		<div class="panel-heading" ><strong>Résumé</strong></div>
      	        <div class="panel-body" id="resume">
      	         
      	        </div>
      	   </div>	
      	 </div>
      </div>
    <?php }elseif ($option=="list" ) { 
      $obj=new Database();?>
      <div class="row" style="background-color:#ccc;margin-bottom:20px;"><h3 class="text-danger text-center">LISTE DES CODES </h3></div>
    <div class="col-sm-10 col-sm-offset-1">
      <table class="table table-bordered table-condensed table-striped">
        <thead>
        <th></th><th>Utilisateur</th><th>code</th><th>Date Expiration</th><th>Action</th>
        </thead>
        <tbody>
          <?php 
           $codes=$obj->cherche_rqt("SELECT * FROM code_autotheque ORDER BY id_code DESC ");
           foreach ($codes as $key => $value) { 
            extract($value);
            $user=$obj->cherche_rqt("SELECT pseudo from annonceur where id_annonceur='$id_annonceur' ");
          ?>
            <tr id="<?php echo $id; ?>" >
              <td> </td>
              <td> <?php echo $user[0]['pseudo']; ?> </td>
              <td align="center"> <h6 class="text-primary"><?php echo $code; ?> </h6></td>
              <td><strong> <?php 
              if($date_fin < date('Y-m-d') )
                echo "<span class='text-danger'>CODE EXPIRÉ</span>";
              else
                echo "<span class='text-success'>".preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#"," Le $3 $2 $1 ", $date_fin ) ."</span>";  
              ?> </strong></td>
              <td align="center"> 
              <button class="btn btn-danger btn-sm supprimer"><span class="glyphicon glyphicon-trash"></span></button> 
              </td>
            </tr>
           <?php } ?>
        </tbody>
      </table>
   </div>
   </div>
<a href="<?php echo $address; ?>admin/autotheque/genererCode" data-toggle="tooltip" data-placement="right" id="add" title="Generer un code" class="test" >
         <span class="glyphicon glyphicon-plus-sign text-danger" style="font-size:40px;line-height:40px;"></span>
</a>
    <?php } ?>
    </div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $address;?>js/dt.js"></script> 
<script type="text/javascript">
	 $("#ajout").submit( function( event ){
        event.preventDefault();
        var value =$("#ajout").serialize();
        var resume = $.ajax({  url: "../../vue/admin/traitement.php", data: value });
         resume.done(function( data ){
         	$("#resume").prepend(data);
         });
         resume = null ;
         resume.fail(function(){
         	alert ("Impossible")
         });
	 });
  $(".supprimer").click(function(){
     var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez vous vremment supprimer ce code");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "supprimerCode", id: id  });
        del.done(function( data ){ $("#"+id).html("<td>Utilisateur supprimé <td><td><td><td>").fadeIn();$("#alert").html(data); });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
 $("#add").tooltip(); 
</script>