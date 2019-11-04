<?php $__env->startSection('title'); ?>
Annuaire - Sn-TopAuto.com 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style type="text/css">.controlPanel{background-color:#333;border-top:solid 10px #900;color:#fff;font-size:12px;margin-bottom:10px}.well-img{width:50;height:auto}.hover{background-color:#fff}.well{border:solid 2px #ccc;background-color:#eee;cursor:pointer}.well:hover{cursor:pointer;box-shadow:10px 10px 50px 0 gray;background-color:#fff;text-decoration:none}.well-txt{margin-top:10px;color:#900}ul.nav-tabs li a,li.disabled{padding-left:10px;padding-right:10px;color:#fff;border-radius:0}ul.nav-tabs li a:hover,ul.nav-tabs li a:active{color:#900}</style>
<link rel="stylesheet" href="<?php echo e(asset('css/annuaire.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div>
    <?php if($categAnnuaire): ?>
    <ol class = "breadcrumb">
        <li><a href = "<?php echo e(url('/')); ?>">Accueil</a></li>
        <li><a href = "<?php echo e(url('annuaire/')); ?>">Annuaire</a></li>
        <li class="active"><?php echo e($categAnnuaire->categorie); ?> </li>
    </ol>
    <div class="col-sm-12">
        <?php echo $__env->make('assets.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('assets.controlPanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="panel-heading" style="background-color:#900;color:#fff;"> 
            <strong>Annuaire</strong> <?php echo e($categAnnuaire->categorie); ?>  
        </div>
        <div class="panel-body" style="padding-left:0;padding-right:0;">
            <?php if($entete): ?>
                <div class='panel panel-danger row' style='margin-left:12px;margin-right:12px;padding:0px;box-shadow:0 0 4px #ccc;'>
                    <div class='col-sm-6' style='padding:0px;'> 
                        <img src="<?php echo e(asset('images/annuaire/'.$entete->image)); ?>" class='img-responsive' width='100%'> 
                    </div>
                    <div class='col-sm-6'>
                        <span class='text-danger'><?php echo e($entete->texte); ?></span><br><br>
                        <h4 class='text-danger'> Retrouvez dans cette rubrique <?php echo e($entete->texte2); ?> au Sénégal.</h4>
                        <p class='text-info'>
                            <span class='glyphicon glyphicon-asterisk'> </span> 
                            Pour être repris dans notre annuaire professionnel,  merci de nous envoyer vos coordonnées via notre formulaire de contact. 
                        </p> 
                    </div>
                </div>
                <div style="margin:15px;">
                    <a href="<?php echo e(url('boutique/')); ?>" class="list-group-item list-group-item-success"> Liste des Boutiques </a>
                </div>
                <?php if($annuaires): ?>
                    <?php $__currentLoopData = $annuaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annuaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $annonceur = App\Models\Annonceur::where('id', $annuaire->id_client)->first(); ?>
                        <div  class="col-xs-12">
                            <div class="panel panel-default notice <?php echo e($annuaire->couleur); ?>" >
                                <div class="panel-body">
                                    <center><strong><span class="glyphicon glyphicon-briefcase center"></span> <?php echo e(strtoupper($annuaire->nom)); ?></strong></center>
                                    <div class='row'>  
                                        <div class='col-sm-10'>
                                            <div class="row under">
                                                <div  class="col-xs-12 text-muted">
                                                    <span class="glyphicon glyphicon-envelope  pull-left" style="margin-right:20px;"></span><?php echo e($annonceur->email); ?>

                                                </div>
                                            </div> 
                                            <div class="row under">
                                                <div  class="col-xs-12 text-muted">
                                                    <span class="glyphicon glyphicon-earphone pull-left" style="margin-right:20px;"></span><?php echo e($annonceur->telephone); ?>

                                                </div>
                                            </div> 
                                            <div class="row under">
                                                <div  class="col-xs-12 text-muted">
                                                    <span class="glyphicon glyphicon-link  pull-left" style="margin-right:20px;"></span>
                                                    <a href="<?php echo e($annuaire->site); ?>" target='_blank'> <?php echo e($annuaire->site); ?> </a> 
                                                </div>
                                            </div>  
                                            <div class="row ">
                                                <div  class="col-xs-12 text-muted">
                                                    <span class="glyphicon glyphicon-map-marker  pull-left" style="margin-right:20px;"></span><?php echo e($annuaire->adresse); ?>

                                                </div>
                                            </div>  
                                        </div> 
                                        <div  class='col-sm-2'>
                                            <img src="<?php echo e(asset('images/annuaire/'.$annuaire->logo)); ?>" class='img-thumbnail img-responsive' width='100%' >
                                            <?php if( $annuaire->boutique == 1 ): ?>
                                                <a href="<?php echo e(url('boutique/'.$categorie.'/'.str_replace(' ', '_' ,$annuaire->nom))); ?>" title=" Voir sa boutique " >
                                                    <button class="btn btn-sm btn-default " style="margin-top:2px;width:100%;padding:2px;"> Boutique </button>
                                                </a>
                                            <?php endif; ?>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <?php else: ?>
                    <div class="panel panel-danger">
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
                        <div class="panel-body text-muted">
                            <img src="<?php echo e(asset('/images/error_icon.png')); ?>"> 
                            <span class="aac"> Aucun contact </span> 
                        </div>  
                    </div>
                <?php endif; ?> 
            <?php else: ?>
                <div class="panel-body" >
                    <a href="<?php echo e(url('boutique/')); ?>" class="list-group-item list-group-item-success">Liste des Boutiques</a>
                    <a href="<?php echo e(url('annuaire/consultation/CréditAutomobile')); ?>" class="list-group-item">Crédit Automobile</a>
                    <a href="<?php echo e(url('annuaire/consultation/AssuranceAutomobile')); ?>" class="list-group-item">Assurance Automobile</a>
                    <a href="<?php echo e(url('annuaire/consultation/AgencedeLocation')); ?>" class="list-group-item">Agences de Location</a>
                    <a href="<?php echo e(url('annuaire/consultation/Concessionnaire')); ?>" class="list-group-item">Concessionnaires</a>
                    <a href="<?php echo e(url('annuaire/consultation/AutoEcole')); ?>" class="list-group-item">Auto-Ecoles</a>
                    <a href="<?php echo e(url('annuaire/consultation/PiècesDétachées')); ?>" class="list-group-item">Pièces détachées / Accessoires</a>
                    <a href="<?php echo e(url('annuaire/consultation/Pneumatique')); ?>" class="list-group-item">Pneumatique</a>
                    <a href="<?php echo e(url('annuaire/consultation/Hydrocarbure')); ?>" class="list-group-item">Hydrocarbures</a>
                    <a href="<?php echo e(url('annuaire/consultation/GarageMécanique')); ?>" class="list-group-item">Garages Mécaniques</a>
                    <a href="<?php echo e(url('annuaire/consultation/CarrosserieetPeinture')); ?>" class="list-group-item">Carrosserie / Peinture</a>
                    <a href="<?php echo e(url('annuaire/consultation/Climatisation')); ?>" class="list-group-item">Climatisation</a>
                    <a href="<?php echo e(url('annuaire/consultation/NettoyageProfessionnel')); ?>" class="list-group-item">Nettoyage Professionnel</a>
                </div>
            <?php endif; ?>
        </div>
        </div>
    </div>
    <?php else: ?>
        <div class="panel panel-danger">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
            <div class="panel-body text-muted">
                <img src="<?php echo e(asset('/images/error_icon.png')); ?>"> 
                <span class="aac"> Aucun contact </span> 
            </div>  
        </div>
    <?php endif; ?> 
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>