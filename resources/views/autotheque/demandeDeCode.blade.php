@extends('site')

@section('title')
Sn-TopAuto.com - Contactez-nous
@endsection

@section('css')

@endsection

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript" src="{{ url('js/index.js')}}"></script>
<ol class = "breadcrumb">
   <li><a href = "{{ url('/')}}">Accueil</a></li>
   <li><a href = "{{ url('/autotheque')}}">autothèque</a></li>
   <li class="active">Demande Code</li>
</ol> 
   
<div>
@include('assets.controlPanel')
</div>
        <div class="panel-heading" id="concessionnaire"  style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;" >
      <center>
        <strong>DEMANDER UN CODE AUTOTHEQUE</strong>
      </center>
</div>

<div>
	<div class="panel panel-danger">
    	<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
		<div class="panel-body">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
			</div>
			@endif

			@if ($message = Session::get('error'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
			</div>
			@endif
			<h5 align="justify" class="text-center text-danger"><em>Vous souhaitez disposer d'un code vous permettant de consulter toutes les demandes faites par de potentiels acheteurs afin de les contacter et leur proposer le véhicule correspondant à leur recherche? Notre autothèque vous accompagne dans cette démarche pour un rapide écoulement de vos produits.</em>
			</h5>
			<form method="post" action="{{ url('/contact/autotheque/demandeDeCode')}}">
				{{ csrf_field() }}
				<div class="form-group">
					<div class="row">
						<div class="col-sm-3">
							<label>Nom Complet :</label>
						</div>
						<div class="col-sm-9">
							<input type="text" name="nom" class="form-control" placeholder="Prénom et Nom" required="">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-3">
							<label>E-mail :</label>
						</div>
						<div class="col-sm-9">
							<input type="email" name="email" class="form-control" placeholder="Adresse E-mail" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-3">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-3">
							<label class="text-diarra">Message :</label>
						</div>
						<div class="col-sm-9">
							<textarea name="message" rows="10"  class="form-control" placeholder="Message"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<div class="g-recaptcha" data-sitekey="6LdwNgkUAAAAABiQhdfoh5Gz9fgvlSj_wZP_1scI"></div>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<button type="submit" class="btn btn-sm btn-danger">Envoyer</button>
						</div>
					</div>
				</div>	
			</form>
		</div>	
	</div>
</div>

@endsection