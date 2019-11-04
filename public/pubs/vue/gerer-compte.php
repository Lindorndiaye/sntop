<?php 
session_start(); 
if(isset($_SESSION['pseudo'])): 
if (isset($_POST['proprietes'])) {
  extract($_POST);
require_once ("classes/Database.php");  
$obj= new Database();
$valeur=array('sexe'=>$sexe, 'telephone'=>$tel, 'email'=>$email, 'prenom'=>$prenom,'nom'=>$nom );
if($obj->modifier_plus("annonceur" , $valeur , "pseudo" ,$_SESSION['pseudo'] )) ?>
<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Vos informations ont étés mises à jour avec succès!</strong>
<?php $_SESSION['telephone']=$tel;$_SESSION['email']=$email;$_SESSION['sexe']=$sexe;$_SESSION['prenom']=$prenom;$_SESSION['nom']=$nom; ?>
</div>
<?php }else if (isset($_POST['motdepasse'])) {
require_once ("classes/Database.php");  
$obj= new Database();
if ($obj->modifier("annonceur" ,"mot_de_passe" , md5($_POST['cmdp']) , "pseudo" ,$_SESSION['pseudo'] )) ?>
<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Votre mot de passe a été changé.</strong>
<?php session_destroy(); } ?>
  <div class="panel">
 <a href="<?php echo $address;?>gerer/annonces">
   <button class="btn btn-danger form-control">Terminer les modifications </button>	
 </a>		
</div>		
<div class="col-sm-12">
<form class="form" method="post">
  <div class="row">
    <h4 class="text-muted"><?php echo $_SESSION['pseudo']; ?> </h4><hr>
   <div class="form-group">  	
     <div class="col-sm-2">Nom :</div>
     <div class="col-sm-4">
     <input type="text" class="form-control" name="nom" value="<?php echo $_SESSION['nom']; ?>" required>	
     </div>
     <div class="col-sm-2">Prenom :</div>
     <div class="col-sm-4">    
      <input type="text" class="form-control" name="prenom"  value="<?php echo $_SESSION['prenom']; ?>" required>	
     </div>
  	</div>
  </div><br>
<div class="row">
   <div class="form-group">   
     <div class="col-sm-2">Type de Compte:</div>
     <div class="col-sm-4">
     <input type="text" class="form-control" value="<?php echo $_SESSION['type_cmpte']; ?>" disabled>  
     </div>
     <div class="col-sm-2">Sexe :</div>
     <div class="col-sm-4">   
       <select name="sexe" class="form-control">
       <?php if($_SESSION['sexe']=='masculin'): ?>
        <option value="masculin" selected>Masculin</option>
        <option value="feminin ">Feninin</option>
       <?php else : ?> 
        <option value="masculin">Masculin</option>
        <option value="feminin " selected>Féminin</option>
       <?php endif ?> 
       </select> 
     </div>
    </div>
  </div><br>
  <div class="row">
   <div class="form-group">   
     <div class="col-sm-2">Téléphone :</div>
     <div class="col-sm-4">
     <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" name="tel" value="<?php echo $_SESSION['telephone']; ?>" required> 
      <span class="help-block"> Ex : +221776543210</span> 
     </div>
     <div class="col-sm-2">Email :</div>
     <div class="col-sm-4">    
      <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" required >  
     </div>
    </div>
  </div><br>
  <div class="row">
    <div class="col-sm-3 col-sm-offset-9">
      <input type="submit" class="btn btn-sm btn-danger form-control" name="proprietes" value="Modifier">
    </div>
  </div>
</form>
<form class="form" method="post">
<div class="row">
  <h4 class="text-muted">Reinitialisation du mot de passe</h4><hr>
</div>
<div class="row"  > 
  <center><div class="col-sm-12 text-danger" id="vmp" style="font-size:15px;"></div></center>
</div>
   <div class="form-group">   
     <div class="col-sm-3">Nouveau mot de passe :</div>
     <div class="col-sm-3">
     <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe">  
     </div>
     <div class="col-sm-3">Confirmez :</div>
     <div class="col-sm-3">    
      <input type="password" class="form-control" name="cmdp" id="cmdp" placeholder="Confirmation" >  
     </div>
  </div>
  <div class="form-group" style="margin-bottom:50px;">
    <div class="col-sm-3 col-sm-offset-9"><br>
      <input type="submit" class="btn btn-sm btn-danger form-control" name="motdepasse" id="mmdp" value="Terminez la Modification">
    </div><br><br>
  </div>  
</form>
</div>

<script type="text/javascript">
 $("#mmdp").click(function () {
  if( $("#mdp").val() == $("#cmdp").val() ) {
     var mdp = $("#mdp").val(); 
     if( mdp.length < 6 ){
       $("#vmp").text("Le mot de passe doit contenir aumoins 6 caractères ");
      }else{ return true; }
  }else{ $("#vmp").text("Les deux mots de passe doivent êtres identiques "); }
  return false;
 });
</script>
<?php endif ?>