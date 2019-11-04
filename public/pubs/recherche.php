<script type="text/javascript" src="<?php echo $address;?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $address;?>js/index.js"></script>
<?php
require_once "classes/Database.php";
require_once("vue/get_annonce.php"); 

if($_GET['value']=="location"){$lo="active";}else if($_GET['value']=="occasion"){$oc="active";}else if($_GET['value']=="neuf"){$ne="active";}
else{ $re="active"; }
include 'vue/assets/search.php';
include 'vue/assets/controlPanel.php';
$obj = new Database(); ?>

<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address."recherche/" ;?>">Rechercher</a></li>
   <li class="active"><?php echo $_GET['recherche']." <span class='glyphicon glyphicon-play'></span> ".$_GET['value']; ?></li>
   <?php if($_POST) 
            echo $_POST['rqt']; 
    ?>
</ol>
<div id="content">

<?php
if (isset($_GET['recherche'])){
   $champ= $_GET['recherche']; 
   $obj= new Database();
   if ($champ=="vehicules") {
    $valeur=$_GET['value'];
       if ($valeur=="concessionnaire" ){
     	    $rqt="SELECT * FROM annonce_v WHERE type_annonceur='$valeur' ORDER BY id_a_v DESC ";
        }else{
          $rqt="SELECT * FROM annonce_v WHERE type_annonce='$valeur' ORDER BY id_a_v DESC ";
          }
    $res=$obj->cherche_rqt($rqt); 
        foreach ($res as $ance) {
         get_annonce($ance , $address);
        } 
   }else if($champ=="annonces"){
    $valeur=$_GET['value'];
    $rqt="SELECT * FROM annonce_v WHERE type_annonceur='$valeur' ORDER BY id_a_v DESC ";
    $res=$obj->cherche_rqt($rqt); 
        foreach ($res as $ance) {
         get_annonce($ance , $address);
        } 
   }else{ // pour les type de recherche
    $valeur= "%".$_GET['value']."%";
    $rqt="SELECT * FROM voiture WHERE $champ LIKE '$valeur' ORDER BY id_v DESC ";
    $res= $obj->cherche_rqt($rqt); 
       foreach ($res as $value) {
        $id_v=$value['id_v'];
        $ance= $obj->cherche_rqt("SELECT * FROM annonce_v WHERE id_voiture ='$id_v' ");
        get_annonce($ance[0] , $address);
       } 
   }
}else if(isset($_POST['rqt'])){
 $obj = new Database(); 
 $m_m=explode("-",$_POST['rqt']);$mrk=$m_m[0];$mdl=$m_m[1];
 $m=$obj->cherche_rqt("SELECT id FROM marque WHERE title='$mrk' "); $m=$m[0]['id'];
 $rqt="SELECT * FROM voiture WHERE marque_v='$m' ORDER BY id_v DESC ";
 $res= $obj->cherche_rqt($rqt); 
 $m=$obj->cherche_rqt("SELECT id FROM modele WHERE title='$mdl' "); $m=$m[0]['id'];
     foreach ($res as $value) {
        $id_v=$value['id_v'];
        $ance= $obj->cherche_rqt("SELECT * FROM annonce_v WHERE id_voiture ='$id_v'  ");
        get_annonce($ance[0] , $address);
     } 
} 

else if(isset($_POST['submit'])){
//triatement recherche avancée 
foreach ($_POST as $key => $value) {
  if($value != "0" and !is_array($value) and $key!='type_a')
     $rqt[]=" ".$key."='".$value."'";
  if( is_array($value) and $key!="prix_v" and $value[0] != "" and $value[1] != "" ){ 
     $rqt_array[]="$key BETWEEN ".$value[0]." AND ".$value[1];
  }
  if ($key=='type_a' or $key=='prix_v' ) {
      if($value !='0' and !is_array($value) )
          $rqt_type=" AND type_annonce='$value' ";
      if (is_array($value) and $key=="prix_v" and $value[0] != "" and $value[1] != "")
         $rqt_prix=" AND prix_v BETWEEN '$value[0]' AND '$value[1]' ";
  }
};
$obj=new Database(); 
$rch= ("SELECT * FROM voiture WHERE ".implode(" AND ",$rqt)." AND ".implode(" AND ",$rqt_array) );
$rqt_type.=$rqt_prix;
$res=$obj->cherche_rqt($rch); 
     foreach ($res as $value) {
        $id_v=$value['id_v'];
        $rch_annce=("SELECT * FROM annonce_v WHERE id_voiture ='$id_v' $rqt_type ");
        $id_v=$value['id_v']; 
        $ance= $obj->cherche_rqt($rch_annce);
        if($ance != null){ get_annonce($ance[0] , $address); $nbre=true; }
     }
     if( $nbre != true) 
        $res=null; 
}else{ ?>
<div class="panel panel-danger" >
  <div class="panel-heading" style="background-color: #900;color:#fff; ">
   <span class="glyphicon glyphicon-search"></span> Outil de Recherche Avancée
</div>
<div class="col-sm-10 col-sm-offset-1">
<form method="post">  
   <div class="panel-body">
        <div class="form-group">
            <div class="row"> 
             <div class="col-xs-3">
               <label class="control-label" for="modele_v"> Catégorie: </label>
             </div>
            <div class="col-xs-9">
                <select class="form-control" name="categorie" id="categorie" > 
                
                  <option value="berline" selected>Sélectionnez</option>
                  <option value="berline" selected>Berline</option>
                  <option value="citadine">Citadine</option>
                  <option value="cabriolet">cabriolet </option>
                  <option value="coupe-sport">Coupé / Sport </option>
                  <option value="break">Break</option>
                  <option value="suv-4x4">SUV / 4x4 </option>
                  <option value="pick-up">Pick-up </option>
                  <option value="luxe">Voiture de Luxe</option>
                  <option value="collection">Collection</option>
                  <option value="bus">Bus</option>
                  <option value="camion">Camion</option>
                  <option value="mini-bus">Mini-Bus</option>
                </select>  
            </div>    
        </div>
      </div><!--Fin input Modèle -->
       
    <div class="form-group">
      <div class="row"> 
        <div class="col-xs-3">
          <label class="control-label" for="type_a">Type d'annonce:</label>
        </div>
            <div class="col-xs-9">
              <select name="type_a" id="type_a" class="form-control">
                <option value="0"> Sélectionnez </option>
                <option value="neuf" > Neufs </option>
                <option value="occasion"> Occasion </option>
                <option value="location"> Location </option>
              </select>
            </div>
       
          </div> 
       </div> 
        <div class="form-group">
        <div class="row"> 
         <div class="col-xs-3">
                <label class="control-label" for="marque_v"> Marque: </label>
        </div>
            <div class="col-xs-9">
                <?php $obj= new Database(); $t_m= $obj->cherche_rqt("SELECT * FROM marque"); $t_m; ?>  
                <select class="form-control" name="marque_v" id="marque_v" onChange="modele();" >
                <option value="0">Sélectionnez</option>
                  <?php foreach($t_m as $marque){
                    echo "<option value=".$marque['id']." >".$marque['title']."</option>";
                  } ?>
                </select>  
            </div>    
        </div>
      </div><!--Fin input  Marque --> 

   <div class="form-group">
     <div class="row"> 
       <div class="col-xs-3">
          <label class="control-label" for="modele_v"> Modèle: </label>
       </div>
       <div class="col-xs-9">
          <select class="form-control" name="modele_v" id="modele_v" placeholder="Modele Voiture">   
              <option value="0"> Sélectionnez </option>
              <option id="model"> Selectionnez une marque </option>
          </select>  
            </div>    
       </div>
    </div><!--Fin input Modèle -->
    <div class="form-group">
      <div class="row"> 
        <div class="col-xs-3">
           <label class="control-label" for="type_a">Prix entre:</label>
        </div>
            <div class="col-xs-4">
               <input type="number" class="form-control" name="prix_v[]" id="prix" placeholder="Minimum" >
            </div>
            <div class="col-sm-1">et</div>
            <div class="col-xs-4">
               <input type="number" class="form-control" name="prix_v[]" id="prix" placeholder="Maximum" >
            </div>
        </div> 
    </div> 
   <div class="form-group">
      <div class="row"> 
        <div class="col-xs-3">
           <label class="control-label" for="type_a">Kilométrage entre:</label>
        </div>
            <div class="col-xs-4">
               <input type="number" class="form-control" name="kilometrage_v[]" id="prix" placeholder="Minimum" >
            </div>
            <div class="col-sm-1">et</div>

            <div class="col-xs-4">
               <input type="number" class="form-control" name="kilometrage_v[]" id="prix" placeholder="Maximum" >
            </div>
        </div> 
    </div> 
    <div class="form-group">    
      <div class="row"> 
         <div class="col-xs-3">
              <label class="control-label" for="transmission"> Transmission: </label>
          </div>
             <div class="col-xs-9">
               <select name="transmission" id="transmission" class="form-control">
                <option value="0"> Sélectionnez </option>
                <option value="manuelle"> Manuelle </option>
                <option value="automatique"> Automatique </option>
                <option value="sequentielle"> Sequentielle </option>
                <option value="autre"> Autre </option>
              </select>
             </div>
            </div>
      </div><!-- Fin transmission et carburant -->
  <div class="form-group">    
      <div class="row"> 
        <div class="col-xs-3">
            <label class="control-label" for="carburant"> Carburant: </label>
        </div>
       <div class="col-xs-9">
          <select name="carburant" id="carburant" class="form-control">
                <option value="0" > Sélectionnez </option>
                <option value="essence"> Essence </option>
                <option value="gazoil" > Gazoil </option>
                <option value="electrique" > Electrique </option>
                <option value="gpl" > GPL </option>
                <option value="cng" > CNG </option>
          </select>
        </div>
     </div>  
    </div><!-- Fin transmission et carburant -->
   <div class="form-group">    
      <div class="row"> 
      <div class="col-xs-3">
            <label class="control-label" for="annee_v"> Année entre: </label>
        </div>
        <div class="col-xs-4">
          <select name="annee_v[]" class="form-control">
         <?php 
          for ($i=intval(date("Y")) ; $i>=1950 ; $i--){
            echo "<option value='$i'> $i </option>";
           }
          ?>

        </select> 
     </div>  
      <div class="col-sm-1">et</div>
      <div class="col-xs-4">
          <select name="annee_v[]" class="form-control">
          <?php 
          for ($i=intval(date("Y")) ; $i>=1950 ; $i--){
            echo "<option value='$i'> $i </option>";
           }
          ?>
          </select> 
     </div>  
    </div><!-- Fin transmission et carburant -->
   </div>
  </div>
  <div align="center">
    <button type="submit" name="submit" value="0" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
  </div>
</form>
</div>
</div> <!-- Fin formulaire de recherche avancée -->
<?php $res="ok"; }

if( $res == NULL ){ ?>
<div class="panel panel-danger">
  <div class="panel-body text-muted"><img src="<?php echo $address;?>/images/error_icon.png"> 
  <span class="aac"> Aucune annonce correspondante </span>
  </div>  
</div>
<?php  } ?>
</div>
<?php if (empty($_POST)): ?>
   <div class="pull-right" id="page-selection"></div>
<?php endif ?>  
<div>
<?php if (isset($_GET['recherche'])){
  $rqte = "annonce";
 }else if(isset($_POST['rqt'])){
  $rqte = "voiture";
 }else if(isset($_POST['submit'])){
  $rqte = "voiture";
 }
 ?>
</div>
<script type="text/javascript" src="<?php echo $address;?>js/bootspage.js"></script>
<script type="text/javascript">
   function paginate(){
   var nbreP = Math.ceil( <?php echo count($res); ?> / 15 );
   $('#page-selection').bootpag({
   total: nbreP,
   maxVisible: 10,
   next: 'Suivant',
   prev:'Précédent'
   }).on("page", function(event, num){
    var start = (15*num)-(15);  
    var target = "#myPage"; var $target = $(target);
    $('html, body').stop().animate({'scrollTop': $target.offset().top }, 600, 'swing', function () {window.location.hash = target; });
    $("#content").html("<div class='loader'><span></span><span></span><span></span></div>");
    $.post("../../vue/get_annonce.php",{ start: start , limit:15 , requete:"<?php echo $rqt;?>" , rqte:"<?php echo $rqte; ?>" }
     ).done(function(annonces){ $("#content").html(annonces);
    }).fail(function(){ alert("impossible"); });
   });
 }
 paginate();
 function modele() {
   var mrk = $("#marque_v").val();
    $.get("../classes/get_modele.php", { id : mrk } , function(data){
      $("#modele_v").html("<option value='0'>Tous</option>");
      $("#modele_v").html(data);
    });
}
</script>
 