@extends('site')

@section('title')
    Sn-TopAuto - Liste des concessionnaires(Annonceur Professionnel)
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/annuaire.css')}}">
<style type="text/css">.controlPanel{background-color:#333;border-top:solid 10px #900;color:#fff;font-size:12px;margin-bottom:10px}.well-img{width:50;height:auto}.hover{background-color:#fff}.well{border:solid 2px #ccc;background-color:#eee;cursor:pointer}.well:hover{cursor:pointer;box-shadow:10px 10px 50px 0 gray;background-color:#fff;text-decoration:none}.well-txt{margin-top:10px;color:#900}ul.nav-tabs li a,li.disabled{padding-left:10px;padding-right:10px;color:#fff;border-radius:0}ul.nav-tabs li a:hover,ul.nav-tabs li a:active{color:#900}</style>
@endsection

@section('content')


    @include('assets.search')
    @include('assets.controlPanel')
<ol class="breadcrumb">
    <li> <a href="{{ url('/') }}">Accueil</a> </li>
    <li><a href = "{{ url('acheteur/')}}">Acheteur</a></li>
    <li><a href = "{{ url('concessionnaire/')}}">Concessionnaires_Parkings</a></li>
</ol>

<div class="panel-heading" id="concessionnaire"  style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;" >
      <center>
        <strong>LISTE DES CONCESSIONNAIRES &amp; PARKINGS AUTOMOBILES</strong>
      </center>
</div>
    <script type="text/javascript" src="{{ url('js/bootspage.js')}}"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
    <div class="panel-body"> 
        
        @foreach ($concessionnaires as $concessionnaire)
        <a href="{{ url('annonceur/professionel/'.$concessionnaire->id_annonceur)}}">
            <div class='well' style="padding:5px;"> 
                <div class="row ">
                    <div class="col-sm-2" >
                        <img src="{{ url('images/conc/'.$concessionnaire->logo)}}" width="100%" class="img-responsive img-thumbnail" > 
                    </div>
                    <div class="col-sm-10">
                        <h4 style="text-transform:uppercase;color:#900;">{{$concessionnaire->concession}}</h4>
                        <p><span class="glyphicon glyphicon-map-marker"> </span>{{$concessionnaire->adresse}} </p>
                        <p><span class="glyphicon glyphicon-phone"></span>{{$concessionnaire->telephone}}</p>
                    </div> 
                </div>
            </div>
        </a> 
        @endforeach
    </div>
    <div class="">
        <div class="pull-right" id="page-selection"> </div>
    </div>
</div>
          
    <div class="pagination pull-right"></div>
    <script src="{{ asset('/js/bootspage.js')}}"></script>
    <script>$('.pagination').bootpag({total:1,leaps:true,maxVisible:10,next:'Suivant',prev:'Précedent',page:1,}).on("page",function(event,num){window.location.href="{{ url('boutique/page/')}}"+num;});$('[data-toggle="tooltip"]').tooltip();</script>
     </div>

@endsection