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
    <li class="{{ $acheteur or ''  }}"><a href="{{ url('/acheteur/')}}">Acheteur</a></li>
    <li class="{{ $vendeur or ''  }}"><a href="{{ url('/vendeur/')}}">Vendeur</a></li>
    <li class="{{ $ne or ''  }}"><a href="{{ url('/recherche/vehicules/neuf')}}">Neuf</a></li>
    <li class="{{ $oc or ''  }}"><a href="{{ url('/recherche/vehicules/occasion')}}">Occasion</a></li>
    <li class="{{ $lo or ''  }}"><a href="{{ url('/recherche/vehicules/location')}}">Location</a></li>
    <li class="{{ $re or ''  }}"><a href="{{ url('/recherche/')}}">Recherche</a></li>
  </ul>
 </div>