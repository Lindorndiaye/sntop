<?php if(Session::has('annonceur')): ?>
  <?php 
    $annonceur = Session::get('annonceur'); 
    $nbnvm = App\Models\Messagerie::where('id_destinataire', $annonceur['id'])->where('statut', 0)->count();
  ?>
  <?php if($annonceur->type_cmpte == "professionnel"): ?>
    <?php 
      $prof = App\Models\Professionnel::where('id_annonceur', $annonceur['id'])->first();
    ?>
    <?php if($prof): ?>
    <div class='thumbnail' align='center'>
      <img src="<?php echo e(asset('images/conc/'.$prof->logo)); ?>" class='img-thumbnail' height='100%' >
      <div class='text-center'><?php echo e(strtoupper($prof->concession)); ?> </div>
    </div>
    <?php endif; ?>
  <?php else: ?>
    <h5 align="" style="margin: 2px;margin-bottom:20px;">      
      <span class="glyphicon glyphicon-user"></span>
      <?php echo e(strtoupper($annonceur->prenom)); ?> <?php echo e(strtoupper($annonceur->nom)); ?>

    </h5>
  <?php endif; ?>

  <ul class="nav nav-pills nav-stacked ">
    <li class="<?php echo e(isset($ge) ? $ge : ''); ?>"> <a href="<?php echo e(url('gerer/annonces')); ?>"><span class="glyphicon glyphicon-th-list"></span> Mes Annonces</a> </li>
     <li class="<?php echo e(isset($pb) ? $pb : ''); ?>"> <a href="<?php echo e(url('publier/annonce')); ?>"><span class="glyphicon glyphicon-plus"></span> Nouvelle Annonce</a></li>
     <li class="<?php echo e(isset($ge) ? $ge : ''); ?>"> <a href="<?php echo e(url('/my/boutiques')); ?>"><span class="glyphicon glyphicon-th-list"></span> Mes Boutiques</a> </li>
     <li class="<?php echo e(isset($pb) ? $pb : ''); ?>"> <a href="<?php echo e(url('creer/boutique')); ?>"><span class="glyphicon glyphicon-plus"></span> Nouvelle Boutique</a></li>
     <li class="<?php echo e(isset($me) ? $me : ''); ?>"> <a href="<?php echo e(url('messagerie/')); ?>"><span class="glyphicon glyphicon-envelope"></span> Mes Messages<span class="badge pull-right"><?php echo e($nbnvm); ?> </span></a></li>
     <li class="<?php echo e(isset($gc) ? $gc : ''); ?>"> <a href="<?php echo e(url('gerer/compte')); ?>"><span class="glyphicon glyphicon-cog"></span> Mon Compte</a> </li>
     <li class="<?php echo e(isset($dec) ? $dec : ''); ?>"> <a href="<?php echo e(url('logout')); ?>"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a> </li>
  </ul>
<?php else: ?>
  <a href="<?php echo e(url('connexion/')); ?>">
  <button class="btn btn-sm form-control btn-danger"> Connectez-vous </button></a>
<?php endif; ?>
<div style="margin-top:20px;"> 
  <?php $__currentLoopData = $pubSimples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pubSimple): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="pub-nogutter hidden-xs">
    <a href="<?php echo e($pubSimple->link); ?> " target="_blank">    
      <img src="<?php echo e(asset('/pubs/'.$pubSimple->photo)); ?>" width="100%" >
    </a>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>