@extends('site')

@section('title')
    Mes Annonces - Sn-TopAuto.com
@endsection

@section('css')
<style type="text/css">
    .panel .panel-danger{border-radius: 0; }
</style>
@endsection

@section('content')
        
    <!-- search-->
    @include('assets.search')

    <!-- control panel -->
    @include('assets.controlPanel')

    <ol class="breadcrumb">
        <li><a href="{{ url('/')}}">Accueil</a></li>
        <li><a href="{{ url('/vendeur')}}">Vendeur</a></li>
        <li class="active">Mes Annonces</li>
    </ol>
        <div class="panel-heading" id="concessionnaire"  style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;" >
      <center>
        <strong>MES ANNONCES</strong>
      </center>
</div>
<div class="col-sm-12">     
  <p>&nbsp;</p>
    <p>@if (count($annonces) <= 0)
    </p>
        <div class="panel panel-danger">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
            <div class="panel-body text-muted">
                <h4>
                    <img src="{{ asset('/images/error_icon.png')}}"> 
                    <strong>Vous n'avez aucune annonce en cours. Cliquez</strong> 
                    <a href="{{ url('publier/annonce')}}">
                        <strong>ici pour en ajouter...</strong>
                    </a>
                </h4>
            </div>  
        </div>
    @else
        <div id="content">
            @foreach ($annonces as $index => $ance)
                @include('annonce.get_mesAnnonces')
            @endforeach
        </div>
        <div class="row panel panel-danger" style="padding: 4px;">
            <div class="pull-left text-muted">
                Afficher 
                <select id="nbreE"> 
                    <option value="10">10</option> 
                    <option value="30">30</option> 
                    <option value="50">50</option> 
                    <option value="100">100</option> 
                    <option value="1000">Tous</option> 
                </select> 
                annonces par page.
            </div>
            <div class="pull-right" id="page-selection"></div>
        </div>
</div>
    @endif

@endsection