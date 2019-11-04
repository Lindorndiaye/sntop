<?php if($ance != null ): ?>
    <?php 
    $index++;
    if($index%2 == 0) {
        $border_color = '3px solid darkcyan';
    }else{
        $border_color = '3px solid #990000';
    }
    $mrk =  App\Models\Marque::select("title")->Where('id', $ance->id_marque)->first(); 
    $mdl =  App\Models\Modele::select("title")->Where('id', $ance->id_modele)->first(); 
    $cu = App\Models\Annonceur::select("type_cmpte")->Where('id', $ance->id_annonceur)->first();
    ?>
    <div class="panel panel-danger lien" style="margin:6px 15px;border:<?= $border_color ?>;">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3" style="margin-bottom:5px;">
                    <div class="thumbnail" style="margin-bottom:3px;"> 
                        <a href="<?php echo e(url('detail-annonce_voiture-'.$ance->id)); ?>">
                            <?php if($ance->photos_a_v != 'logo.png'): ?>
                                <img class="tag" src="<?php echo e(asset('images/'.$ance->type_annonce.'.png')); ?>"> 
                                <?php if($ance->urgence == 1): ?>
                                    <img class='tag_urgent' src="<?php echo e(asset('images/urgent_h.png')); ?>">
                                <?php endif; ?>
                                <img src="<?php echo e(asset('images/annonce/voiture/'.$ance->photos_principal)); ?>" class="img-responsive" width="98%" style="margin:2px;height: 107px;max-width: 142px;"> 
                        </a>
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/TOP.png')); ?>" class="img-responsive " width="98%" style="margin:2px;"> </a>
                            <?php endif; ?>
                    </div>
                    <?php if($cu): ?>
                    <?php if($cu->type_cmpte == "professionnel"): ?>
                    <?php $pro = App\Models\Professionnel::Where('id_annonceur', $ance->id_annonceur)->first();?>
                        <center>
                            <a href="<?php echo e(url('annonceur/professionel/'.$ance->id_annonceur)); ?>" >
                                <img src="<?php echo e(asset('images/conc/'.$pro->logo)); ?>" class="logo_conc img-rounded " style="height: 60px;width: 70px;">
                            </a>
                        </center>
                    <?php endif; ?>
                    <?php endif; ?>
                        
                </div>
          
                <div class="col-md-9"><div class="row">
                    <div class="barre">
                        <strong style="color:white;"><?php echo e(strtoupper($mrk->title." ".$mdl->title)." (".$ance->annee.")"); ?></strong>
                        <?php if($ance->type_annonceur != 'gratuit'): ?>:
                            <img src="<?php echo e(asset('images/'.$ance->type_annonceur.'.png')); ?>" class="pull-right img-respondive" width="78" style="margin-top:;margin-right:; "> 
                        <?php endif; ?>
                </div>
                <div class="col-sm-3 col-xs-6  ">
                    <div class="panel panel-default opt">
                        <span class="pull-left">
                        <img src="<?php echo e(asset('images/manuel.jpg')); ?>" class="img-rounded" height="28"> 
                        </span> 
                        <p class="text-center"> <?php echo e($ance->boite_vitesse); ?> </p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 ">
                    <div class="panel panel-default opt">
                        <span class="pull-left">
                        <img src="<?php echo e(asset('images/carb.png')); ?>" class="img-rounded" height="28">
                        </span> 
                        <p class="text-center"> <?php echo e($ance->carburant); ?></p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="panel panel-default opt">
                        <span class="pull-left">
                        <img src="<?php echo e(asset('images/kil.jpg')); ?>" class="img-rounded" height="28">
                        </span>
                        <p class="text-center"> <?php echo e(number_format($ance->kilometrage ,0 , '' , ',')); ?> Km </p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="panel panel-danger opt " style="background-color:#eee;color:#900;">
                        <span class="pull-left"></span> 
                        <p class="text-center"><strong><?php echo e(number_format($ance->prix, 0 , '', ' ')); ?> F.CFA</strong> </p>
                    </div>
                </div>
            </div> 
            <div class="panel panel-default text-muted hidden-xs" style="padding:5px;"><?php echo $ance->titre ?></div>
                <div class="row"> 
                    <div class="col-sm-3 col-xs-4">
                        <?php 
                        $today = date("Y-n-j"); 
                        $day=$ance->date; 
                        $diff = abs(strtotime($today) - strtotime($day));
                        $days = floor ($diff / (60*60*24) );
                        if($days == 0){ $day="Aujourd'hui"; }
                        else if($days == 1){  $day = "Hier";}
                        else if($days == 2){  $day = "Avant hier" ;}
                        else { $day = "Il y'a $days jours "; } ?> 
                        <p class="text-muted"><?php echo $day;?></p>
                    </div>
                    <div class="col-sm-4 hidden-xs">
                        <p class="text-warning"><span class=" glyphicon glyphicon-map-marker"></span> 
                        <?php echo " ".$ance->zone ?> 
                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <button type="submit" class="btn btn-xs btn-default pull-right partager" name="recommander">
                            <span class="glyphicon glyphicon-share"></span> Recommander
                        </button>
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <a href="<?php echo e(url('detail-annonce_voiture-'.$ance->id)); ?>">
                            <button type="button" class="btn btn-xs btn-danger pull-right"> Détails </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php echo $__env->make('annonce.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>