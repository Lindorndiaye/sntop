<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title> TOP AUTO </title>
<link href="<?php echo $address ;?>css/bootstrap.css" rel="stylesheet" type="text/css">
<link  href="<?php echo $address ;?>css/index.css" rel="stylesheet" type="text/css" >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
<nav class="navbar navbar-default navbar-inverse " role="navigation" id="fixe" >
	<strong>
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="<?php echo $address ;?>" >
	        <span class="glyphicon glyphicon-home"> </span>
	        </a>
	    </div>
	    <!--/.navbar-header-->
	
	    <div class="collapse  navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
	         
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Annonces <b class="caret"></b></a>
		            <ul class="dropdown-menu">
			            <li><a href="<?php echo $address ;?>annonce/voiture">Auto</a></li>
			            <li class="divider"></li>
			            <li><a href="#">Moto</a></li>
		            </ul>
		        </li>
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Annuaire <b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-3">
			            <div class="row">
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						        <li><a href="#">Crédit Automobile</a></li>
							    <li><a href="#">Assurance Automobile</a></li>
					   			<li><a href="#">Agences de Location</a></li>
								<li><a href="#">Concessionnaires</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						        <li><a href="#">Auto-Ecoles</a></li>
								<li><a href="#">Pièces / Accessoires</a></strong></a></li>
								<li><a href="#">Pneumatiques</a></li>
								<li><a href="#">Hydrocarbures</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
					   <li><a href="#">Garages Mécaniques</a></li>
                       <li><a href="#">Carrosserie / Peinture</a></li>
                       <li><a href="#">Climatisation</a></li>
                       <li><a href="#">Nettoyage Professionnel</a></li>
					            </ul>
				            </div>
			            </div>
		            </ul>
		        </li>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Autothèque <b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-2">
			            <div class="row">
				            <div class="col-sm-6">
					            <ul class="multi-column-dropdown">
						            <li><a href="<?php echo $address;?>autotheque">C'est quoi l'autothèque</a></li>
						            <li><a href="<?php echo $address;?>autothequeAcheteur">Autothèque Acheteur</a></li>
						            <li><a href="<?php echo $address;?>autotheque/depot">Dépôt Recherche</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-6">
					            <ul class="multi-column-dropdown">
						            <li><a href="<?php echo $address;?>autotheque/consultation">Consultation Autothèque</a></li>
						            <li><a href="<?php echo $address;?>autothequeVendeur">Autothèque Vendeur</a></li>		
					            </ul>
				            </div>
			            </div>
		            </ul>
		        </li>
		        
		        <li><a href="#">Actualités</a></li>
		        <li><a href="#">Vitrine Pro</a></li>		          
		            <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Infos Utiles<b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-2">
			            <div class="row">
				            <div class="col-sm-6">
					            <ul class="multi-column-dropdown">
						            <li><a href="#">Publi-Info</a></li>
			            			<li><a href="#">Guide-Info</a></li>
			           				<li><a href="#">Sécurité Routière</a></li>	
						            
					            </ul>
				            </div>
				            <div class="col-sm-6">
					            <ul class="multi-column-dropdown">
						          <li><a href="#">Avis</a></li>
			                		 <li><a href="#">FAQ</a></li>  							
					            </ul>
				            </div>
			            </div>
		            </ul>
		        </li>
	        </ul>
	      <ul class="nav navbar-nav navbar-right">
	            <li><a href="<?php echo $address;?>inscription/"> Forum </a></li>
	        <?php if( ($_SESSION['id_annonceur']) ): ?>
                <li><a href="<?php echo $address ;?>dec.php">Déconnection</a></li>
               <?php endif ?> 
             </ul>
	    </div>
	    <!--/.navbar-collapse-->
	</nav>
</strong>
<script type="text/javascript" src="<?php echo $address ;?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $address ;?>js/bootstrap.js"></script>

