<style>
@media (min-width: 1200px){.container{max-width: 1000px;}}.container{ background-color:#fefefe;}
</style>
<body style="background-color:#eee;">
<div class="container" id="myPage">
<div class="row" style="padding-top:5px;">
   <div class="col-xs-3">
   <a href="<?php echo $address; ?>" >
   <img  src="<?php echo $address;?>/images/auto.png"  class="img-responsive" width="110%">
   </a>
   </div>
   <div class="col-xs-9 " style="height:100;overflow:hidden;" >
   <?php $pub= new Pub(); $mapub=$pub->get_pub('ban_haut'); ?>
   <?php if ($mapub != 0): ?>
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'pubs/'.$mapub[0]['photo']; ?>" class="img-responsive" width="100%" ></a>
   <?php endif ?>
  </div>
 </div>
<?php include('header.php'); ?>
  <div class="row">
     <br>
     <div class="col-sm-3 col-md-3"> 
      <?php include('vue/assets/usernav.php'); ?> 
     </div>
      <div class="col-sm-9 col-md-9 "> 
      <?php $page=$_GET['page'];
       include('vue/'.$page);
      ?>
     </div>
   </div>
  <div class="row"  style="margin-bottom:0px;">
  <?php $pub= new Pub(); $mapub=$pub->get_pub('ban_bas_3D');?>
  <?php if ($mapub != 0): ?>
  <div class="col-sm-4 pub-nogutter">
    <div class="pub pub-simple">
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'/pubs/'.$mapub[0]['photo']; ?>" class="img-responsive" width="100%" ></a>
    </div>
  </div>
  <?php endif ?> 
  <?php $pub= new Pub(); $mapub=$pub->get_pub('ban_bas_3C');?>
   <?php if ($mapub != 0): ?>
  <div class="col-sm-4 pub-nogutter">
    <div class="pub pub-simple">
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'/pubs/'.$mapub[0]['photo']; ?>" class="img-responsive" width="100%" ></a>
     </div>
  </div>
<?php endif ?>  
<?php $pub= new Pub(); $mapub=$pub->get_pub('ban_bas_3G');?>
  <?php if ($mapub != 0): ?>
  <div class="col-sm-4 pub-nogutter">
    <div class="pub">
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'/pubs/'.$mapub[0]['photo']; ?>" class="img-responsive" width="100%" ></a>
    </div>
   </div>
  <?php endif ?> 
</div>
<div class="row"  style="margin:10px;margin-bottom:0px;">
<?php $pub= new Pub(); $mapub=$pub->get_pub('ban_bas_2D');?>
   <?php if ($mapub != 0): ?>
  <div class="col-sm-6 pub-nogutter">
    <div class="pub pub-simple">
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'/pubs/'.$mapub[0]['photo']; ?>" class="img-responsive" width="100%" ></a>
    </div>
  </div>
  <?php endif ?> 
    <?php $pub= new Pub(); $mapub=$pub->get_pub('ban_bas_2G');?>
   <?php if ($mapub != 0): ?>
  <div class="col-sm-6 pub-nogutter">
    <div class="pub pub-simple">
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'/pubs/'.$mapub[0]['photo']; ?>" class="img-responsive" width="100%" ></a>
    </div>
  </div>
 <?php endif ?> 
</div>
<?php $pub= new Pub(); $mapub=$pub->get_pub('ban_bas_1');?>
<?php if ($mapub != 0): ?>
 <div class="row" style="height:200;margin-bottom:15px;">
   <div class="col-md-12">
    <div class="pub-nogutter">
      <a href="<?php echo $mapub[0]['link'];?>" target="_blank">
      <img src="<?php echo $address.'/pubs/'.$mapub[0]['photo']; ?>" class="img-responsive" width="100%" ></a>
   </div>
  </div>
 </div>
<?php endif ?>
</div>
</body>
<footer>
<?php  include 'footer.php'; ?>  
</footer>