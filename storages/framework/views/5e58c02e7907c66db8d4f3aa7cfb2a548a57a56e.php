<?php $vendeur="active"; ?>


<?php $__env->startSection('title'); ?>
    Vendeur - Sn-TopAuto
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style type="text/css">
    .well-txt{
		font-size: large;
		text-weight:bold;
	}
	h3{
		margin-top: 2px;
		margin-bottom:2px ;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        
    <!-- search-->
    <?php echo $__env->make('assets.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- control panel -->
    <?php echo $__env->make('assets.controlPanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
        <li class="active">Vendeur</li>
    </ol>
    
    <div class="panel panel-danger">
        <div class="panel-heading"><h3>ANNONCES</h3></div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="<?php echo e(url('publier/annonce')); ?>"></a>
                            <div class="col-xs-4"><img src="<?php echo e(url('images/add_new_veh.png')); ?> " class="pull-left" width="80%"></div>
                            <div class="col-xs-8 well-txt">
                                CREER UNE ANNONCE
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="<?php echo e(url('gerer/annonces')); ?>"></a>
                            <div class="col-xs-4"><img src="<?php echo e(url('images/my_veh.png')); ?> " class="pull-left img-responsive" width="80%"></div>
                            <div class="col-xs-8 well-txt">
                                MES ANNONCES
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="<?php echo e(url('autotheque/consultation')); ?>"></a>
                            <div class="col-xs-4"><img src="<?php echo e(asset('images/vehicle.png')); ?> " class="pull-left img-responsive" width="100%"></div>
                            <div class="col-xs-8 well-txt">
                                CONSULTATION AUTOTHEQUE
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-heading"><h3>OPTION VENDEUR</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <a href="<?php echo e(url('gerer/compte')); ?>"></a>
                        <div class="row">
                            <div class="col-xs-4"><span class="glyphicon glyphicon-cog text-danger" style="font-size:40px;"></span></div>
                            <div class="col-xs-8 well-txt">
                                MON COMPTE
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <a href="<?php echo e(url('connexion/')); ?>"></a>
                        <div class="row">
                            <div class="col-xs-4"><span class="glyphicon glyphicon-log-in text-danger" style="font-size:40px;"></span></div>
                            <div class="col-xs-8 well-txt">
                                CONNEXION
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well ">
                        <a href="<?php echo e(url('messagerie/')); ?>"></a>
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="<?php echo e(asset('images/messages.png ')); ?>" class="pull-left" width="35px">
                            </div>
                            <div class="col-xs-8 well-txt">
                                MES MESSAGES
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <div class="col-xs-4"><img src="<?php echo e(asset('images/stats.png')); ?>" class="pull-left" width="35px"></div>
                            <div class="col-xs-8 well-txt">
                                STATISTIQUES
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="<?php echo e(url('inscription/')); ?>"></a>
                            <div class="col-xs-4"><span class="glyphicon glyphicon-check text-danger" style="font-size:40px;"></span></div>
                            <div class="col-xs-8 well-txt ">
                                CREER UN COMPTE
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $("div.well").click(function(){
            window.location=$(this).find("a").attr("href");
            return false;
        });
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>