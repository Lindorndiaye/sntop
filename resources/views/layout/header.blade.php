<nav class="navbar navbar-inverse " role="navigation" id="fixe">
	<strong>
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}" style="color:#fff;" title="ACCUEIL">
			<span class="glyphicon glyphicon-home"></span>
			</a>
		</div>
		<!--/.navbar-header-->
	
		<div class="collapse  navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#fff;">Annonces <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ url('/annonce/auto') }}">Auto</a></li><hr style="margin:0px;">
						<li><a href="{{ url('/annonce/moto') }}">Moto</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#fff;">Annuaire Pro <b class="caret"></b></a>
					<ul class="dropdown-menu multi-column columns-3">
						<div class="row">
							<div class="col-sm-4">
								<ul class="multi-column-dropdown">
								<li><a href="{{ url('/annuaire/consultation/CréditAutomobile') }}">Crédit Automobile</a></li>
								<li><a href="{{ url('/annuaire/consultation/AssuranceAutomobile') }}">Assurance Automobile</a></li>
								<li><a href="{{ url('/annuaire/consultation/AgencedeLocation') }}">Agences de Location</a></li>
								<li><a href="{{ url('/annuaire/consultation/Concessionnaire') }}">Concessionnaires</a></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul class="multi-column-dropdown">
								<li><a href="{{ url('/annuaire/consultation/AutoEcole') }}">Auto-Ecoles</a></li>
								<li><a href="{{ url('/annuaire/consultation/PiècesDétachées') }}">Pièces / Accessoires</a></li>
								<li><a href="{{ url('/annuaire/consultation/Pneumatique') }}">Pneumatique</a></li>
								<li><a href="{{ url('/annuaire/consultation/Hydrocarbure') }}">Hydrocarbures</a></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul class="multi-column-dropdown">
								<li><a href="{{ url('/annuaire/consultation/GarageMécanique') }}">Garages Mécaniques</a></li>
								<li><a href="{{ url('/annuaire/consultation/CarosserieetPeinture') }}">Carrosserie / Peinture</a></li>
								<li><a href="{{ url('/annuaire/consultation/Climatisation') }}">Climatisation</a></li>
								<li><a href="{{ url('/annuaire/consultation/NettoyageProfessionnel') }}">Nettoyage Professionnel</a></li>
								</ul>
							</div>
						</div>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#fff;">Autothèque <b class="caret"></b></a>
					<ul class="dropdown-menu multi-column columns-2">
						<div class="row">
							<div class="col-sm-6">
								<ul class="multi-column-dropdown">
									<li><a href="{{ url('/autotheque/depot/') }}">Dépôt Recherche</a></li>
									<li><a href="{{ url('/autotheque/consultation/') }}">Consultations</a></li>
									<li><a href="{{ url('/contact/autotheque/demandeDeCode/') }}">Obtenir un code</a></li>
								</ul>
							</div>
							<div class="col-sm-6">
								<ul class="multi-column-dropdown">
									<li><a href="{{ url('/autotheque/info/autotheque') }}">C'est quoi l'autothèque</a></li>
									<li><a href="{{ url('/autotheque/info/autothequeVendeur/') }}">Autothéque Vendeur</a></li>	
									<li><a href="{{ url('/autotheque/info/autothequeAcheteur/') }}">Autothéque Acheteur</a></li>
								</ul>
							</div>
						</div>
					</ul>
				</li>
				<li><a href="{{ url('/actualites/') }}" style="color:#fff;">Actualités</a></li>
				<li><a href="{{ url('/concessionnaire/') }}" style="color:#fff;">Vitrine Pro</a></li>
				<li><a href="{{ url('/boutiques') }}" style="color:#fff;">Boutiques</a></li>
				<ul class="nav navbar-nav navbar-left">
				<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#fff;">Infos Utiles<b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li><a href="{{ url('/publiInfo/') }}">Publi-Info</a></li>
						<li><a href="{{ url('/guideInfo/') }}">Guide-Info</a></li>
						<li><a href="{{ url('/securiteRoutiere/') }}">Securité Routière</a></li>	
						<li><a href="{{ url('/vitrinePro/') }}">Avantages Vitrine Pro</a></li>
						</ul>
					</li>
				</ul>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#fff;">
					<span class="glyphicon glyphicon-comment"></span> Avis<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Avis</a></li>
						<li><a href="{{ url('/FAQ/') }}">FAQ</a></li>
						<li><a href="#">Forum</a></li>  
					</ul>     
				</li>
				<li class="dropdown">
					@if(Session::has('annonceur'))
					<?php $annonceur = Session::get('annonceur');?>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#0F6;">
						<span class="glyphicon glyphicon-user"></span>
						<span class="glyphicon glyphicon-cog"></span> <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<p class="dropdown-header"> <?= $annonceur->pseudo ?></p> 
						<li><a href="{{ url('publier/annonce')}}" style="color:#fff;">
							<span class="glyphicon glyphicon-plus-sign"></span> Déposer une annonce </a>
						</li>
						<li><a href="{{ url('gerer/annonces')}}" style="color:#fff;">
							<span class="glyphicon glyphicon-th-list"></span> Mes annonces</a>
						</li>
						<li><a href="{{ url('gerer/compte')}}" style="color:#fff;">
							<span class="glyphicon glyphicon-wrench"></span> Mon compte</a>
						</li>
						<hr style="margin:0px;">
						<li><a href="{{ url('logout')}}" style="color:#fff;">
							<span class="glyphicon glyphicon-log-out"></span> Déconnection</a>
						</li>
					</ul>
					@else
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#f00;">
						<span class="glyphicon glyphicon-user"></span> <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ url('/connexion/') }}" style="color:#fff;"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
						<li class="divider"></li>
						<li><a href="{{ url('/inscription/') }}" style="color:#fff;"><span class="glyphicon glyphicon-check"></span> Créer un compte</a></li>
					</ul> 
					@endif
				</li>
			</ul>
		</div>
	</strong>
</nav>