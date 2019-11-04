<script type="text/javascript" src="<?php echo $address;?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $address;?>js/index.js"></script>
<?php 
include 'vue/assets/search.php';   
include 'vue/assets/controlPanel.php';
?>
<ol class = "breadcrumb">
   <li><a href = "<?php echo $address;?>">Accueil</a></li>
   <li><a href = "<?php echo $address."annonce/voiture" ;?>">Annonce Véhicule</a></li>
</ol>
<div id="content">
<?php 
require_once("classes/Database.php");
require_once("vue/get_annonce.php");
$obj = new Database();
$tab_annonce = $obj->cherche_rqt("SELECT * FROM annonce_v ORDER BY id_a_v DESC LIMIT 15 " );
foreach( $tab_annonce as $ance ){ 
   get_annonce($ance , $address);
 } ?>
</div>
<div class="row panel panel-danger" style="margin-right:2px;margin-left:2px;padding: 4px;">
  <div class="pull-left text-muted">
  	Afficher <select id="nbreE"> 
  	<option value="15">15</option> 
  	<option value="30">30</option> 
  	<option value="50">50</option> 
  	<option value="100">100</option> 
  	<option value="1000">Tous</option> 
  	</select> annonces par page.
  </div>
 <div class="pull-right" id="page-selection">
	<?php 
	$nbreA=$obj->cherche_rqt("SELECT count(*) as nbre from annonce_v ");?>
	<input type="hidden" value="<?php echo $nbreA[0]['nbre'] ?>" id="nbreA" ></input>
  </div>
</div>
<script type="text/javascript" src="<?php echo $address?>js/bootspage.js"></script>
<script>
$(document).ready(function(){
 function paginate( nbreE ){
   var nbreA = $("#nbreA").val(); 
   var nbreP = Math.ceil( nbreA / nbreE );
   $('#page-selection').bootpag({
   total: nbreP,maxVisible: 10,next: 'Suivant',prev:'Précédent'
   }).on("page", function(event, num){
   var start = (nbreE*num)-(nbreE); var limit= nbreE; 
   var target = "#myPage";var $target = $(target);
   $('html, body').stop().animate({'scrollTop': $target.offset().top }, 600, 'swing', function () {window.location.hash = target; });
   $("#content").html("<div class='loader'><span></span><span></span><span></span></div>");
   $.post("../vue/get_annonce.php",{start: start , limit: limit}
   ).done(function(annonces){ $("#content").html(annonces);
   }).fail(function(){ alert("impossible"); });
   });
 }
 $("#nbreE").change(function () {
   var start = 0; var limit=  $("#nbreE").val(); 
   $.post("../vue/get_annonce.php",{start: start , limit: limit}
   ).done(function(annonces){ $("#content").html(annonces);
   }).fail(function(){ alert("impossible"); });
 paginate( $("#nbreE").val() ); });
 paginate(15);
})
</script>    
