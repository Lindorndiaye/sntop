<?php $__env->startSection('title'); ?>
Sn-TopAuto | Site d'actualités et de petites annonces auto-moto au Sénégal
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/index.js')); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/index.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/loader.css')); ?>">
<style>
.btn-inverse{ padding-bottom:10px; background: #333; color: #fff; }
.btn-inverse:hover{ color: #fff; }
.btn-inverse span.glyphicon{ font-size:20px; }
.displaye{
    display: none;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong><?php echo e($message); ?></strong>
    </div>
    <?php endif; ?>
    
    <?php echo $__env->make('assets.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('assets.controlPanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <ol class = "breadcrumb">
        <li><a href = "<?php echo e(url('/')); ?>">Accueil</a></li>
        <li><a href = "<?php echo e(url('acheteur/')); ?>">Acheteur</a></li>
        <li class='active'>Annonces Moto</li>
    </ol>
    <div class="panel-heading" id="concessionnaire"  style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;" >
      <center>
        <strong>TOUTES LES ANNONCES MOTO</strong>
      </center>
</div>
    <div style='padding:10px;border: solid 2px #ccc;margin-bottom:20px;' align="right">
        <strong>Affichage:</strong>
        <div class="btn-group"> 
            
            <button id="mode_list" class="btn btn-inverse btn-sm" disabled="true" ><span class="glyphicon glyphicon-th-list"></span> </button> 
            <button id="mode_grid" class="btn btn-inverse btn-sm" ><span class="glyphicon glyphicon-th"></span> </button>
            
        </div>
    </div>

    <div class='row' style="display: block;" id="content">
        <?php $__currentLoopData = $annonces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="liste">
                <?php echo $__env->make('annonce.mode.moto.liste', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div id="grid" class="displaye">
                <?php echo $__env->make('annonce.mode.moto.grid', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class=" row panel panel-danger" style="margin-right:2px;margin-left:2px;padding: 4px;">
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
            <input type="hidden" value="$nbreA " id="nbreA" > </input>
        </div>
    </div>


<script type="text/javascript" src="<?php echo e(asset('js/bootspage.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/cookie.js')); ?>"></script>
<script>
$(document).ready(function(){
 function paginate( nbreE ){
   var affichage = getCookie("affichage");
   var nbreA = $("#nbreA").val(); 
   var nbreP = Math.ceil( nbreA / nbreE );
   $('#page-selection').bootpag({
   total: nbreP,maxVisible: 10,next: 'Suivant',prev:'Précédent'
   }).on("page", function(event, num){
   var start = (nbreE*num)-(nbreE); var limit= nbreE; 
   var target = "#myPage";var $target = $(target);
   $('html, body').stop().animate({'scrollTop': $target.offset().top }, 600, 'swing', function () {window.location.hash = target; });
   $("#content").append("<div class='container'><div class='row'><div class='animationload'><div class='osahanloading'></div></div></div></div>");
   $.post("../vue/get_annonce.php",{start: start , limit: limit , affichage :  affichage }
   ).done(function(annonces){ $("#content").html(annonces);
   }).fail(function(){ alert("impossible"); });
   });
 }
 $("#nbreE").change(function () {
   var affichage = getCookie("affichage");
   var start = 0; var limit=  $("#nbreE").val(); 
   $("#content").append("<div class='container'><div class='row'><div class='animationload'><div class='osahanloading'></div></div></div></div>");
   $.post("../vue/get_annonce.php",{start: start , limit: limit , affichage :  affichage }
   ).done(function(annonces){ $("#content").html(annonces);
   }).fail(function(){ alert("impossible"); });
 paginate( $("#nbreE").val() ); 
});

    $("#mode_list").click(function(){
        $("#content").fadeOut(1000, function () {
            $('#content #grid').addClass('displaye');
            $('#content #liste').removeClass('displaye');
            $("#content").fadeIn(1000);
        });
        $(this).attr("disabled" , "true");
        $("#mode_grid").removeAttr("disabled");
        //var start = 0; var limit=  $("#nbreE").val(); 
        //$("#content").append("<div class='container'><div class='row'><div class='animationload'><div class='osahanloading'></div></div></div></div>");
        
        //paginate(0);
        //paginate( $("#nbreE").val() );
    });

    $("#mode_grid").click(function(){
        $("#content").fadeOut(1000, function () {
            $('#content #liste').addClass('displaye');
            $('#content #grid').removeClass('displaye');
            $("#content").fadeIn(1000);
        });
        $(this).attr("disabled" , "true");
        $("#mode_list").removeAttr("disabled");  

        //var start = 0; var limit=  $("#nbreE").val(); 
        //$("#content").append("<div class='container'><div class='row'><div class='animationload'><div class='osahanloading'></div></div></div></div>");
        
        //paginate(0);
        paginate( $("#nbreE").val() );
        });
        //paginate(15);
    });

    $(".partager").click(function(){ $('#partager').modal({ backdrop:"true"}); });
</script>    

<?php $__env->stopSection(); ?>   
<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>