
<link  href="<?php echo $address ;?>css/index.css " rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $address ;?>js/index.js"></script>
<?php 
include 'vue/assets/search.php';  
include 'vue/assets/controlPanel.php';  
 ?>

<?php
ob_start();
session_start();
require_once("classes/annonceur.php"); 
if( $_SESSION['id_annonceur'] == NULL ):

if( isset($_POST['email']) ){
   extract($_POST); 
   $v_user = new Database();
   $user = $v_user->cherche_all( "annonceur" , "pseudo" , $_POST['login'] );
   //var_dump($user);
   if ($user == NULL ) { 
       $annoncer = new annonceur();
          if($type_cmpte == "professionnel"){
            $Lid=$annoncer->ajouterPro($login , md5($conf_p), $type_cmpte , $email , $telephone ,$concession , $adresse , $marques , $site_web , $logo );
            if($_FILES != NULL){  
     		    $file=$_FILES['logo'];
      			$inf_file = pathinfo($file['name']);
  			    $ext_charge= $inf_file['extension'];
  			    move_uploaded_file($file['tmp_name'], "images/conc/".$Lid.".".$ext_charge); 
    		  	$obj->modifier("annonceur" , "logo" ,$Lid.".".$ext_charge , "id_annonceur", $Lid);
  			}
          }else{
           $annoncer->ajouter($login , md5($conf_p) ,$nom ,$prenom , $type_cmpte , $email , $telephone );
          } 
       $code=sha1($password.$prenom.$nom);  
       $headers = "From:ne-pas-repondre@sn-topauto.com \r\n" ;
       $headers .= 'MIME-Version: 1.0' . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       $message =  "<p>Bonjour $prenom $nom,&nbsp;</p>
		  <p><br /> Merci de vous &ecirc;tre inscrit sur sn-topauto.com, votre site d'annonce auto-moto.&nbsp;Votre compte a &eacute;t&eacute; cr&eacute;&eacute; 
		  et doit &ecirc;tre activ&eacute; avant que puissiez l'utiliser. Pour l'activer, cliquer sur le lien ci-dessous ou 
		  copiez et collez-le dans votre navigateur :&nbsp;</p>
		  <p><br />  <a href='".$address."activation/$login/$code'>".$address."activation/$login/$code</a> </p>
		  <p><br /> Apr&egrave;s activation, vous pourrez vous connecter sur&nbsp;
		  <a href='".$address."connexion/' >".$address."connexion/</a> &nbsp;en utilisant&nbsp;
		  l'identifiant et le mot de passe suivants :&nbsp;</p>
		  <p><br /> Identifiant : $login &nbsp;<br /> Mot de passe : $conf_p &nbsp;</p>
		  <p><br /> N'h&eacute;sitez pas &agrave; nous contacter si vous avez besoin d'aide lors de la prise en main de l'outil ....&nbsp;</p>
		  <p><br /> Merci de votre confiance et bonne navigation &agrave; travers nos pages.</p>
		  <p>&nbsp;<br /> Cordialement,&nbsp;</p>
          <p><br /> <strong>L'&eacute;quipe de Sn-TopAuto.com</strong></p>";
         
      if($type_cmpte == "professionnel"){
        $message="<p>Sn-TopAuto vous remercie de votre inscription.<br> L'administration du site vous contactera
        dans les prochaines heures pour le choix d'un pack. </p>	  
        <p>&nbsp;<br /> Cordialement,&nbsp;</p>
        <p><br /> <strong>L'&eacute;quipe de Sn-TopAuto.com</strong></p>";
      }
       mail( $email ,"CREATION DE COMPTE REUSSI", $message ,$headers); ?>
       <div>
         <div class="panel panel-danger" style='height: 500px;padding-top:80px;' >
           <div class="panel-body">
             <h4 class="text-danger text-center"> Félicitation  <?php echo $prenom." ".$nom; ?></h4>
             <div class="col-sm-8 col-sm-offset-2 text-center">
             Sn-TopAuto.com vous remercie de votre inscription.<br>
             Un mail de validation vient de vous être envoyé.  
             </div>
           </div>
         </div>
       </div>
       
 <?php  }else{ ?>
 
   <br>
   <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Désolé. </strong> Cet identifiant est indisponible. Veuillez Rééssayer SVP !<!-- <meta http-equiv="refresh" content="5; URL=<?php echo $address;?>inscription/"> -->
   </div>
<?php }  

}else{ ?>

<div>
<div class="panel panel-danger ">
<div class="panel-body">
      <h3 class="text-center text-danger"> Création d'un compte </h3>
<hr>
 <form id="forma" class="form-horizontal" method="POST" action="">
 		<div class="form-group">
            <label class="control-label col-xs-3" for="firstName">Type de Compte :</label>
            <div class="col-xs-4">
				 <input type="radio" name="type_cmpte" value="particulier" checked> Particulier<br> 
			</div>
			<div class='col-xs-4'>
 				 <input type="radio" name="type_cmpte" value="professionnel"> Professionnel
            </div>
        </div>
        
       <div class="panel panel-danger " id="divPersonne" style="padding: 10px;margin: 20px;">
        <div class="form-group">
            <label class="control-label col-xs-3" for="firstName">Prénom et Nom :</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="prenom" id="firstName" placeholder="Prénom" >
            </div>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nom" id="lastName" placeholder="Nom" >
            </div>
        </div>
    </div>
    
       <div class="panel panel-danger hide" id="divEntreprise" style="padding: 10px;margin: 20px;">
         <div class="form-group " >
            <label class="control-label col-xs-3" for="concession" >Concession :</label>
            <div class="col-xs-8 ">
             <input type="text" class="form-control" name="concession" id="entreprise" placeholder="Nom Concession ">
            </div>
        </div>
         <div class="form-group " >
            <label class="control-label col-xs-3" for="adresse" >Adresse :</label>
            <div class="col-xs-8 ">
             <input type="text" class="form-control" name="adresse" id="entreprise" placeholder="Adresse">
            </div>
        </div>
        <div class="form-group " >
            <label class="control-label col-xs-3" for="marque" >Marques représentées:</label>
            <div class="col-xs-8 ">
             <input type="text" class="form-control" name="marques" id="entreprise" placeholder="Marques représentées ">
            </div>
        </div>
        <div class="form-group " >
            <label class="control-label col-xs-3" for="site" >Site Web :</label>
            <div class="col-xs-8 ">
             <input type="text" class="form-control" name="site_web" id="entreprise" placeholder="Site Web">
            </div>
        </div>
         <div class="form-group " >
            <label class="control-label col-xs-3" for="logo" >Logo :</label>
            <div class="col-xs-8 ">
             <input type="file" class="form-control" name="logo" id="entreprise" >
            </div>
        </div>
      </div>
        
        
        <div class="form-group" >
            <label class="control-label col-xs-3" for="pseudo1">Indentifiant*:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="login" id="pseudo1" placeholder="Nom d'Utilisateur">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="inputPassword">Mot de Passe*:</label>
            <div class="col-xs-8">
                <input type="password" class="form-control" name="mot_de_passe" id="password1" placeholder="Mot de Passe">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="cpassword">Confirmation*:</label>
            <div class="col-xs-8">
                <input type="password" class="form-control" name="conf_p" id="cpassword" placeholder="Confirmation du Mot de Passe">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="email1" >E-mail*/ Phone *:</label>
            <div class="col-xs-4 ">
                <input type="email" class="form-control" name="email" id="email1" placeholder="Adresse mail" required>
            </div>
            <div class="col-xs-4 ">
               <input type ="tel"  pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" name="telephone" id="telephone" placeholder="Téléphone" required>
               <span class="help-block hide">Ex : +221776001122</span>

            </div>
        </div>
 
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <label class="checkbox-inline"><input type="checkbox" name="accord" id="accord">  
                   J'accepte de recevoir des offres et informations des Partenaires de Sn-TopAuto.com.</label>
                <div class="text-danger" id="resultat"></div>
                <div class="text-warning" id="rmdp"></div>

            </div>
        </div>
        <br>
</div>
<div class="panel-footer">
         <input type="submit" id="envoi" class="btn btn-danger" value="Valider">
         <input type="reset" class="btn btn-default" value="Effacer">  
   </div>
</div>
</div>
 </form>
<script>

 $("#envoi").click(function(){
      returne = true;
      if( $('#pseudo1').val() == "" ){
             $('#resultat').html("<hr><span class='glyphicon glyphicon-alert' ></span> Remplir tous les champs"); 
             $('#pseudo1').parent('div').addClass('has-error'); 
             returne= false;  
            }else{
              $('#pseudo1').parent('div').removeClass('has-error').addClass('has-success');  
            }
             if($('#email1').val() == ""){  
             $('#resultat').html("<hr><span class='glyphicon glyphicon-remove-circle'></span> Remplir tous les champs "); 
             $('#email1').parent('div').addClass('has-error'); 
             returne= false;  
            }else{
              $('#email1').parent('div').addClass('has-success');  
            }
             if($('#password1').val().length < 6){  
             $('#rmdp').html("<hr><span class='glyphicon glyphicon-remove-circle'></span> Le mot de passe doit contenir 6 caractères "); 
             $('#password1').parent('div').addClass('has-error'); 
             $('#cpassword').parent('div').addClass('has-error');
             returne= false;  
            }else{
             if( $('#password1').val() != $('#cpassword').val() ){
             $('#rmdp').html("<hr><span class='glyphicon glyphicon-remove-circle'></span> Les deux mots de passes doivent êtres identiques "); 
             $('#password1').parent('div').addClass('has-error'); 
             $('#cpassword').parent('div').addClass('has-error'); 
             returne= false;  
            }else{
              $('#password1').parent('div').addClass('has-success').removeClass('has-error');  
              $('#cpassword').parent('div').addClass('has-success').removeClass('has-error'); 
            }
           }
           if($( "input:checked" ).length == 0){
             $('#resultat').append("<hr><span class='glyphicon glyphicon-remove-circle'></span> Vous n'avez pas déclaré avoir lu les Conditions d'utilisations "); 
             returne= false;  
            }  
        return returne;
       });
       
      $( "input[type='radio'][name='type_cmpte']" ).change(function () {
      var str =  $(this ).val();
      if( str == "professionnel" ){
      $("#divEntreprise").removeClass("hide");
      $("#divPersonne").addClass("hide");
      }else if (str == "particulier"){
      $("#divPersonne").removeClass("hide");
      $("#divEntreprise").addClass("hide");
      }
      });
      
      $("#telephone").focus(function(){
        $(".help-block").removeClass('hide');
      });
      
</script>

<?php  } ?>

<?php else: ?>
<SCRIPT LANGUAGE="JavaScript">document.location.href="<?php echo $address;?>gerer/annonces ";</SCRIPT>
<?php endif ?>



