<link  href="<?php echo $address ;?>css/owl.carousel.css " rel="stylesheet" type="text/css" ><style type="text/css"> .pic{width:150px;height:150px;border:double 2px #900;} .text{cursor:pointer;width:146px; height:146px;background:#fff; opacity:0; } .pic:hover .text{ opacity:0.8; color:#900; padding:5px; }  .slides-next, .slides-prev {height: 150px;width:50px;z-index: 120; }footer a{font-size:12px;color: #ddd;display:inline-block;margin-left:5px; margin-right:5px ; } footer a:hover{color: #fff;} 
.scroll-top-wrapper {
    position: fixed;
    opacity: 0;
    visibility: hidden;
	overflow: hidden;
	text-align: center;
	z-index: 99999999;
    background-color: #777777;
	color: #eeeeee;
	width: 50px;
	height: 48px;
	line-height: 48px;
	right: 30px;
	bottom: 30px;
	padding-top: 2px;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
	border-bottom-left-radius: 10px;
	-webkit-transition: all 0.5s ease-in-out;
	-moz-transition: all 0.5s ease-in-out;
	-ms-transition: all 0.5s ease-in-out;
	-o-transition: all 0.5s ease-in-out;
	transition: all 0.5s ease-in-out;
}
.scroll-top-wrapper:hover {
	background-color: #888888;
}
.scroll-top-wrapper.show {
    visibility:visible;
    cursor:pointer;
	opacity: 1.0;
}
.scroll-top-wrapper span.glyphicon {
	font-size:25px;
	line-height: 40px;
}
</style> <div class="container" style="background-color:#222;color:#eee ; ">	<div class="row" style="background-color:#333;color:#eee;margin-bottom:20px;">
  <div class="col-xs-11 "> 
    <h4 style="color:#fff; margin-left:18px;"><strong>Les 10 dernières annonces</strong></h4>
  </div></div><div class="row"><div class="col-sm-1 hidden-xs"><div><p align="right"><button type="button" class="slides-prev btn from-control btn-default customPrevBtn" ><span class="glyphicon glyphicon-chevron-left"></span></button></div></div><div class="col-sm-10 " style="padding-right:0;padding-left: 0;"><div class="owlcarousel">
<?php 
require_once("classes/Database.php");
$obj = new Database();
$tab_annonce = $obj->cherche_rqt("SELECT * FROM annonce_v ORDER BY id_a_v DESC LIMIT 0, 10 " );
foreach( $tab_annonce as $ance ){ 
$tab_voiture = $obj->cherche_rqt("SELECT * FROM voiture WHERE id_v =".$ance['id_voiture'] ); 
$mrk = $obj->cherche_rqt("SELECT title FROM marque WHERE id = ".$tab_voiture[0]['marque_v'] ); 
$mdl = $obj->cherche_rqt("SELECT title FROM modele WHERE id = ".$tab_voiture[0]['modele_v'] ); 
?><div class="pic"style="background:url(<?php echo $address.'annonce/'.$ance['id_voiture'].'/'.$ance['photos_a_v']; ?>)no-repeat;background-size:150px;background-position:center;background-color:#eee;background-clip: padding-box;
"><div class="text"> <a href="<?php echo $address ;?>annonce/detail-<?php echo $ance['id_a_v']."-".$tab_voiture[0]['id_v'] ;?>"></a> <h6 class="text-center"style="border-bottom: solid 1px #900; "><strong><?php echo strtoupper($mrk[0]['title']." ".$mdl[0]['title'])."<br>".$tab_voiture[0]['annee_v'] ;?></strong></h6><p><span class=" glyphicon glyphicon-dashboard"></span> <?php echo (number_format($tab_voiture[0]['kilometrage_v'] ,0 , '' , ',')); ?> Km<p><span class=" glyphicon glyphicon-euro"></span> <?php echo (number_format($ance['prix_v'], 0 , '', ' ')); ?> Fcfa</strong><p><span class=" glyphicon glyphicon-map-marker"></span> <?php echo " ".$tab_voiture[0]['localite']; ?> </div> </div><?php } ?></div><!-- Container --></div><div class="col-sm-1 hidden-xs"><div><button type="button" class="slides-next btn btn-default customNextBtn "><span class="glyphicon glyphicon-chevron-right"></span></button></div></div></div><div class="row" style="padding-bottom: 5px;-webkit-box-shadow: 0px 0px #DE6163; box-shadow: 0px 0px #DE6163;"><div class="col-xs-12 text-center" ><strong>
    <p><a href="<?php echo $address;?>quiSommesNous">Qui sommes-nous?</a> |  <a href="<?php echo $address;?>conditionsGenerales">Conditions Générales</a> |  <a href="<?php echo $address;?>partenaires/">Partenaires</a> | <a href="<?php echo $address;?>mentionLegales">Mentions Légales</a> | <a href="<?php echo $address;?>recommander/">Recommandez ce site</a>  | <a href="<?php echo $address;?>planSite">Plan du Site</a> | <a href="<?php echo $address;?>contact/">Contact</a><a href="<?php echo $address;?>contact/"></a></p>
    <hr>
</div>
  <span class="text-center" style="font-size:12px;">* Certaines catégories de Sn-TopAuto sont payantes afin d'assurer un   service de qualité et sécurisé. <span class="text-center" style="font-size:12px;">Sn-TopAuto</span> reste néanmoins gratuit pour les particuliers.</span></div>
<p class="text-center" style="font-size:12px;">Copyright ©2016 Sn-TopAuto.com - Tous droits réservés - Un site du Groupe Viscom Suarl : *TopAuto Magazine *TopImmo Magazine - Notre métier : votre visiblité !</p>
</div><script type="text/javascript" src="<?php echo $address ;?>js/bootstrap.js"></script><script type="text/javascript" src="<?php echo $address ;?>js/index.js"></script><script type="text/javascript" src="<?php echo $address; ?>js/owl.carousel.min.js"></script><script type="text/javascript">$(document).ready(function(){var owl = $('.owlcarousel');owl.owlCarousel({loop:true,margin:10,autoplay:true,autoplayTimeout:1500,autoplayHoverPause:true,responsiveClass:true,URLhashListener:true,responsive:{0:{items:3,},600:{items:4,},1000:{items:5,}}});$('.customNextBtn').click(function() {owl.trigger('next.owl.carousel');});$('.customPrevBtn').click(function() {owl.trigger('prev.owl.carousel', [300]);});$('.text').click(function(){window.location=jQuery(this).find("a").attr("href");return false;});

});
$(function(){$(document).on( 'scroll', function(){if ($(window).scrollTop() > 100) {$('.scroll-top-wrapper').addClass('show');} else {$('.scroll-top-wrapper').removeClass('show');}});$('.scroll-top-wrapper').on('click', scrollToTop);});function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0; element = $('body');offset = element.offset();offsetTop = offset.top;$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');};
 
</script>
 <div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
   <span class="glyphicon glyphicon-hand-up" style=""></span>
  </span>
</div>
</div>