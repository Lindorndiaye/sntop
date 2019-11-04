<?php $__env->startSection('title'); ?>
Sn-TopAuto.com - Autothèque consultation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script type="text/javascript" src="<?php echo e(url('js/index.js')); ?>"></script>
<ol class = "breadcrumb">
   <li><a href = "<?php echo e(url('/')); ?>">Accueil</a></li>
   <li><a href = "<?php echo e(url('/autotheque')); ?>">autothèque</a></li>
   <li class="active">Consultation</li>
</ol> 

<?php echo $__env->make('assets.controlPanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="row panel panel-danger" id="contenue_aut" style="margin-right:5px;padding: 20px;"> 
    <div class="col-sm-6 col-sm-offset-3" style="margin-bottom:50px;margin-top:60px" > 
        <div class="panel panel-danger">
            <div class="panel-heading" style="background:#900;color:#fff;">
                <strong><span class="glyphicon glyphicon-lock"></span>  Consultation</strong>
                <strong>Autothèque</strong>
            </div>
  
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
            <div class="panel-body" >
                <?php if($message = Session::get('error')): ?>
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong><?php echo e($message); ?></strong>
                </div>
                <?php endif; ?>
                <form id="formulaire"  action="<?php echo e(url('/autotheque/check_code_autotheque')); ?>" method="GET">
                    <?php echo e(csrf_field()); ?>

                    <center class="text-muted"><strong>Entrez votre code</strong></center><br>
                    <input type="password" name="code_autotheque" id="code_aut" class="form-control" autofocus required > </input><br>
                    <button type="submit" id="submit" class="btn btn-xs btn-danger form-control" >Validez</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--<script type="text/javascript">
    $(document).ready( function(){

        $("#submit").on('click', function(event){
            event.preventDefault();
            var code = $("#code_aut").val();
            <?php $url = url('/autotheque/check_code_autotheque') ?>
            $.ajax({
                url: "<?= $url?>/"+code,
                data: {
                    code: code
                },
                dataType: 'html',
                type: 'get',
                success: function (data) {
                    console.log(data);
                    $("#contenue_aut").html(data);
                }
            })
        });
    });

    
</script>-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>