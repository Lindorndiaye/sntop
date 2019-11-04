<style type="text/css">
.controlPanel{
 background-color: #333;
 border-top: solid 10px #900 ;
 color:white;
 font-size: 12px;
 margin-bottom:10px; 
}
.well-img{
width: 50;
height: auto;
}
.hover{
background-color:#fff;
}
.well{
  border:solid 2px #ccc;
  background-color:#eee; 
  cursor: pointer;
}
.well:hover{cursor: pointer;box-shadow: 10px 10px 50px 0 gray ;background-color: #fff; text-decoration:none; }

.well-txt{
  margin-top:10px;
  color:#900; 
}
ul.nav-tabs li a,
li.disabled{
padding-left:10px;
padding-right:10px;
color:white;
border-radius: 0;
}
ul.nav-tabs li a:hover , ul.nav-tabs li a:active{ 
color:#900;
}

</style>
  <div class="controlPanel">
   <ul class="nav nav-tabs">
    <li class="disabled" style="padding-top:12px;">Panneau de Navigation</li>
    <li class="<?php echo $acheteur ?>"><a href="<?php echo $address;?>acheteur/">Acheteur</a></li>
    <li class="<?php echo $vendeur ?>"><a href="<?php echo $address;?>vendeur/">Vendeur</a></li>
    <li class="<?php echo $ne;?>"><a href="<?php echo $address;?>recherche/vehicules/neuf">Neuf</a></li>
    <li class="<?php echo $oc; ?>"><a href="<?php echo $address;?>recherche/vehicules/occasion">Occasion</a></li>
    <li class="<?php echo $lo; ?>"><a href="<?php echo $address;?>recherche/vehicules/location">Location</a></li>
    <li class="<?php echo $re; ?>"><a href="<?php echo $address;?>recherche/">Recherche</a></li>
  </ul>
 </div> 
