@extends('site')
@section('title')
Ma Boutique {{$myboutique->nom}} - Sn-TopAuto.com 
@endsection
@section('css')
<link href="{{ asset('css/article.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/annuaire.css')}}" type="text/css">
@endsection
@section('content')

<ol class="breadcrumb">
    <li> <a href="{{ url('/')}}">Accueil</a> </li>
    <li> <a href="{{ url('annuaire/')}}">Annuaire</a></li>
    <li> <a href="{{ url('boutique/')}}">Boutique</a></li>
    <li class='active'>Mon Boutique</li>
</ol>
<div class="row">
    <?php $annonceur = App\Models\Annonceur::where('id', $myboutique->id_client)->first();  ?>
    @if(Session::has('annonceur'))
        @if($lemien)
        <div class="col-sm-3" >
            <h4 class="text-muted"> <?= strtoupper( $annonceur->nom ); ?> <hr style="border-top:2px solid #900; "> </h4>
        </div>
        <div class="col-sm-4 col-sm-offset-5">
            <a href="{{ url('boutique/ajouter_article/'.$myboutique->id.'/'.str_replace(' ' , '_' , $myboutique->nom))}}">
                <button class="btn btn-lg btn-danger" title="Ajouter un article" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-plus-sign"></span> Ajouter Article 
                </button>
            </a>
        </div>
        @endif
    @endif
</div>


<h3 style="color:#aaa;">{{$myboutique->nom}}</h3>
<div class="panel panel-danger " style="border-color:#900;margin-top:0;">
    <div class="row">
        <div class='col-sm-6'style="border-right:solid 1px #900; " >
            <div class='col-sm-12' style="padding:50px;">
                @if ($myboutique->logo == "shop.png")
                    <img src="{{ asset('images/annuaire/'.$myboutique->logo)}}" alt="" class="img-responsive" >
                @else
                    <img src="{{ asset('images/boutique/'.$myboutique->logo)}}" alt="" class="img-responsive" >
                @endif
            </div>
            <div class="col-sm-12" >
                <strong> <span class="glyphicon glyphicon-map-marker"></span> Adresse : </strong>
                <p class="text-danger"> {{$myboutique->adresse}} </p>
                <strong> <span class="glyphicon glyphicon-phone-alt"></span> Téléphone : </strong>
                <p class="text-danger"> {{$annonceur->telephone}}  </p>
                <strong> <span class="glyphicon glyphicon-envelope"></span> E-mail : </strong>
                <p class="text-danger"> {{$annonceur->email}} </p>
                <strong> <span class="glyphicon glyphicon-dashboard"></span> Horaire d'Ouverture : </strong>
                <p class="text-danger"> {{$myboutique->horaire}} </p>
            </div>
        </div>
        <div class='col-sm-6' style="padding:20px;">
            <h4><u>Catégorie :</u> {{$myboutique->categorie}} </h4>
            <p>{{$myboutique->description}}</p><hr>
            <a href="{{$myboutique->site}}" target="_blank">
            <button class="btn btn-danger form-control"><strong>VISITEZ NOTRE SITE WEB</strong></button></a>
        </div>
    </div>
</div>

<!-- liste articles-->
@if($articles)
<div id="container">
    <ul class="list">
        @foreach($articles as $article)
        <a href="{{ url('detail/boutique_article/'.$article->id)}} ">
            <li>
                <img src="{{ asset('images/boutique/articles/'.$article->photo)}}" alt="">
                <section class="list-left">
                    <h5 class="title">{{$article->titre}}</h5>
                    <span class="adprice">{{$article->prix}} Fcfa</span>
                </section>
                <section class="list-right">
                    <span class="date">Today, 17:55</span>
                </section>
                <div class="clearfix"></div>
            </li>
        </a>
        @endforeach
    </ul>
</div>
@endif

@endsection