<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address;?>/autotheque">autotheque</a></li>
   <li class="active">Consultation</li>
</ol> 
  <div class="row panel panel-danger" id="contenue_aut" style="margin-right:5px;padding: 20px;"> 
  <div class="col-sm-6 col-sm-offset-3" style="margin-bottom:50px;margin-top:60px" > 
  <div class="panel panel-danger">
  <div class="panel-heading" style="background:#900;color:#fff;">
     <strong><span class="glyphicon glyphicon-lock"></span> Autotheque Consultation</strong>
  </div>
  
   <div class="panel-body" >
    <form id="formulaire" >
      <center class="text-muted"><strong>Entrez votre code:</strong></center><br>
      <input type="password" name="code_autotheque" id="code_aut" class="form-control" autofocus required > </input><br>
      <button type="submit" id="submit" class="btn btn-xs btn-danger form-control" >Valider</button>
    </form>
   </div>
  </div>
 </div>
</div>
<script type="text/javascript">
 $(document).ready( function(){
   $("#formulaire").submit(function(event){
   event.preventDefault();
   var code = $("#code_aut").val();
   $.get("../classes/check_code_autotheque.php", { code_aut: code } , function(data){
      $("#contenue_aut").html("");
      $("#contenue_aut").append(data);
    });
   });
 });
</script>