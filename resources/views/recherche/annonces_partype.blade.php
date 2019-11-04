<?php $acheteur="active"; ?>
@extends('site')

@section('title')
    Annonces par type - Sn-TopAuto
@endsection

@section('css')
<style type="text/css">
    .well a {
        color: #337ab7 !important;
    }
    .well center {
        font-size: 14px !important;
    }
</style>
@endsection

@section('content')
        
    <!-- search-->
    @include('assets.search')

    <!-- control panel -->
    @include('assets.controlPanel')

    <ol class="breadcrumb">
        <li><a href="{{ url('/')}}">Accueil</a></li>
        <li><a href="{{ url('/acheteur')}}">Acheteur</a></li>
        <li class="active">Annonces par type</li>
    </ol>
    
    <div class="panel panel-danger" id="partype" style="margin-bottom:10px;">
        <div class="panel-heading" style="background-color:#900;color:white;font-size:16px;padding:5px;">
            <strong>ANNONCES PAR TYPE (Toutes les carrosseries)</strong> 
        </div>
        <?php
            function getNumber( $categorie ){
                $nbre=App\Models\Annonce::where('categorie', $categorie)->count();
                return $nbre;
            }
        ?>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4 "> 
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/berline')}}">
                    <img src="{{ asset('images/voitures/berline.png')}}"><br>
                    Berline</a> ({{getNumber("berline")}})
                    </center> </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/suv-4x4')}}"> 
                    <img src="{{ asset('images/voitures/suv-4x4.png')}}"><br>
                    SUV / 4x4</a> ({{getNumber("suv-4x4")}})
                
                    </center> </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/citadine')}}"> 
                    <img src="{{ asset('images/voitures/citadine.png')}}"><br>
                    Citadine</a> ({{getNumber("citadine")}})
                    
                    </center> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/pick-up')}}">
                    <img src="{{ asset('images/voitures/pick-up.png')}}"><br>
                    Pick-up / Utilitaires</a> ({{getNumber("pick-up")}})
                    </center> </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/cabriolet')}}">
                    <img src="{{ asset('images/voitures/cabriolet.png')}}"><br>
                    Cabriolet</a> ({{getNumber("cabriolet")}})
                    </center> </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/collection')}}">
                    <img src="{{ asset('images/voitures/collection.png')}}"><br>
                    Collection</a> ({{getNumber("collection")}})
                    </center> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/luxe')}}">
                    <img src="{{ asset('images/voitures/luxe.png')}}"><br>
                    Luxe</a> ({{getNumber("luxe")}})
                    </center> </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/break')}}">
                    <img src="{{ asset('images/voitures/break.png')}}"><br>
                    Break</a> ({{getNumber("break")}})
                    </center> </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/coupe-sport')}}">
                    <img src="{{ asset('images/voitures/coupe-sport.png')}}"><br>
                    Coupé / Sport</a> ({{getNumber("coupe-sport")}})
                    </center> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/bus')}}">
                    <img src="{{ asset('images/voitures/bus.png')}}"><br>
                    Bus</a> ({{getNumber("bus")}})
                    </center> </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/camion')}}">
                    <img src="{{ asset('images/voitures/camion.png')}}"><br>
                    Camion</a> ({{getNumber("camion")}})
                    </center> </div>
                </div>
                    <div class="col-sm-4 ">
                    <div class="well"><center>
                    <a href="{{ url('recherche/categorie/mini-bus')}}">
                    <img src="{{ asset('images/voitures/fourgon.png')}}"><br>
                    Mini-bus</a> ({{getNumber("mini-bus")}})</a>
                    </center> </div>
                </div>
            </div>
        </div>
    </div>

@endsection