<?php $acheteur="active"; ?>
@extends('site')

@section('title')
    Acheteur - Sn-TopAuto
@endsection

@section('css')
<style type="text/css">
    .well-txt{
		font-size: large;
		text-weight:bold;
	}
	h3{
		margin-top: 2px;
		margin-bottom:2px ;
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
        <li class="active">Acheteur</li>
    </ol>
    
    <div class="panel panel-danger">
        <div class="panel-heading"><h3>Véhicules</h3></div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="{{ url('recherche/vehicules/auto/neuf')}}"></a>
                            <div class="col-xs-4"><img src="{{ url('images/new.png')}} " class="pull-left  "></div>
                            <div class="col-xs-8 well-txt">
                                NEUFS
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="{{ url('recherche/vehicules/moto/neuf')}}"></a>
                            <div class="col-xs-4"><img src="{{ url('images/MOTO/NEUF.png')}} " class="pull-left" style="width: 88px;height: 68px;"></div>
                            <div class="col-xs-8 well-txt">
                                NEUFS
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="{{ url('recherche/vehicules/auto/occasion')}}"></a>
                            <div class="col-xs-4"><img src="{{ url('images/used.png')}} " class="pull-left   "></div>
                            <div class="col-xs-8 well-txt">
                                OCCASIONS
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="{{ url('recherche/vehicules/moto/occasion')}}"></a>
                            <div class="col-xs-4"><img src="{{ url('images/MOTO/OCCASION.png')}}" class="pull-left" style="width: 88px;height: 68px;"></div>
                            <div class="col-xs-8 well-txt">
                                OCCASIONS
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="{{ url('recherche/vehicules/auto/location')}}"></a>
                            <div class="col-xs-4"><img src="{{ asset('images/loc.png')}} " class="pull-left   "></div>
                            <div class="col-xs-8 well-txt">
                                LOCATIONS
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <div class="row">
                            <a href="{{ url('recherche/vehicules/moto/location')}}"></a>
                            <div class="col-xs-4"><img src="{{ asset('images/MOTO/LOCATION.png')}} " class="pull-left" style="width: 88px;height: 68px;"></div>
                            <div class="col-xs-8 well-txt">
                                LOCATIONS
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-heading"><h3>Annonces</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <a href="{{ url('recherche/annonces/gold')}}"></a>
                        <div class="row">
                            <div class="col-xs-4"><img src="{{ asset('images/gold_veh.png')}} " class="pull-left  "></div>
                            <div class="col-xs-8 well-txt">
                                GOLD
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <a href="{{ url('recherche/annonces/prestige')}}"></a>
                        <div class="row">
                            <div class="col-xs-4"><img src="{{ asset('images/featured_veh.png')}} " class="pull-left "></div>
                            <div class="col-xs-8 well-txt">
                                PRESTIGE
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well ">
                        <a href="{{ url('recherche/vehicules/concessionnaire')}}"></a>
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="{{ asset('images/pro.png ')}}" class="pull-left">
                            </div>
                            <div class="col-xs-8 well-txt">
                                PROFESSIONNEL
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-heading"><h3>Recherche</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="well ">
                        <div class="row">
                            <a href="{{ url('autotheque/depot')}}"></a>
                            <div class="col-xs-4"><img src="{{ asset('images/search.png')}} " class="pull-left  "></div>
                            <div class="col-xs-8 well-txt">
                                AUTOTHÈQUE
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well ">
                        <div class="row">
                            <a href="{{ url('annonces_partype')}}"></a>
                            <div class="col-xs-4"><img src="{{ asset('images/vehicle_types.png')}}" class="pull-left  "></div>
                            <div class="col-xs-8 well-txt">
                                VÉHICULES PAR TYPE
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well ">
                        <div class="row">
                            <a href="{{ url('recherche/')}}"></a>
                            <div class="col-xs-4"><img src="{{ asset('images/search.png ')}}" class="pull-left  "></div>
                            <div class="col-xs-8 well-txt">
                                RECHERCHE AVANCÉE
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well ">
                        <div class="row">
                            <a href="{{ url('concessionnaire/')}}"></a>
                            <div class="col-xs-4"><img src="{{ asset('images/list_pro.png')}} " class="pull-left  "></div>
                            <div class="col-xs-8 well-txt">
                                LISTE DES PROFESSIONNELS
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $("div.well").click(function(){
            window.location=$(this).find("a").attr("href");
            return false;
        });
    </script>


@endsection