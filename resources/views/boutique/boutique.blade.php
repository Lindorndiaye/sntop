@extends('site')

@section('title')
Boutique - Sn-TopAuto.com 
@endsection

@section('css')
<style type="text/css">.controlPanel{background-color:#333;border-top:solid 10px #900;color:#fff;font-size:12px;margin-bottom:10px}.well-img{width:50;height:auto}.hover{background-color:#fff}.well{border:solid 2px #ccc;background-color:#eee;cursor:pointer}.well:hover{cursor:pointer;box-shadow:10px 10px 50px 0 gray;background-color:#fff;text-decoration:none}.well-txt{margin-top:10px;color:#900}ul.nav-tabs li a,li.disabled{padding-left:10px;padding-right:10px;color:#fff;border-radius:0}ul.nav-tabs li a:hover,ul.nav-tabs li a:active{color:#900}</style>
@endsection

@section('content')
    @include('assets.controlPanel')
<link rel="stylesheet" href="{{ asset('css/annuaire.css')}}">
<ol class="breadcrumb">
    <li> <a href="{{ url('/') }}">Accueil</a> </li>
    <li> <a href="{{ url('/annuaire/') }}">Annuaire</a></li>
    <li> <a href="{{ url('/boutique/') }}">Boutique</a></li>
    </ol>

        <div class="row">
            <div class="col-sm-4">
                <select name="categorie" class='form-control ' id="sort-categories">
                    <option value="all" selected> Toutes</option>
                    <option value='CréditAutomobile'> Crédit Automobile </option>
                    <option value='AssuranceAutomobile'> Assurance Automobile </option>
                    <option value='AgencedeLocation'> Agence de Location </option>
                    <option value='Concessionnaire'> Concessionnaire </option>
                    <option value='AutoEcole'> Auto Ecole </option>
                    <option value='PiècesDétachées'> Pièces Détachées </option>
                    <option value='Pneumatique'> Pneumatique </option>
                    <option value='Hydrocarbure'> Hydrocarbure </option>
                    <option value='GarageMécanique'> Garage Mécanique </option>
                    <option value='CarrosserieetPeinture'> Carrosserie et Peinture </option>
                    <option value='Climatisation'> Climatisation </option>
                    <option value='NettoyageProfessionnel '> Nettoyage Professionnel </option>                          
                </select>
            </div>
            <div class="col-sm-4">
                <input type="submit" class="btn btn-danger form-control" value="Rechercher">
            </div>
            <div class="col-sm-4">
                <p class="btn btn-danger form-control"> <a href="{{ url('/creer/boutique')}}" style="color:#fff;"><strong>Créer votre boutique</strong></a></p>
            </div>
            <hr>
        </div>
        <div>
            <div style="margin:15px;">
                <a href="{{ url('boutique/')}}" class="list-group-item list-group-item-success"> Répertoire des Boutiques </a>
            </div>
            </div>
        <div class="categories-list">
            @foreach ($annuaires as $annuaire)
            <?php 
                $annonceur = App\Models\Annonceur::where('id', $annuaire->id_client)->first(); 
            ?>
            <div class="col-xs-12 categories-item" data-category="{{ $annuaire->nom_categorie}} ">
                <div class="panel panel-default notice <?= $annuaire->couleur ?>">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
                    <div class="panel-body">
                        <center><strong><span class="glyphicon glyphicon-briefcase center"></span> <?= strtoupper($annuaire->nom) ?></strong></center>
                        <div class='row'>
                            <div class='col-sm-10'>
                                <div class="row under">
                                    <div class="col-xs-12 text-muted">
                                        <span class="glyphicon glyphicon-envelope  pull-left" style="margin-right:20px;"></span><?= $annonceur->email ?>
                                    </div>
                                </div>
                                <div class="row under">
                                    <div class="col-xs-12 text-muted">
                                        <span class="glyphicon glyphicon-earphone pull-left" style="margin-right:20px;"></span>
                                        <?= $annonceur->telephone ?></div>
                                </div>
                                <div class="row under">
                                    <div class="col-xs-12 text-muted">
                                        <span class="glyphicon glyphicon-link  pull-left" style="margin-right:20px;"></span>
                                        <a href="<?= $annuaire->site ?>" target='_blank'><?= $annuaire->site ?></a>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-xs-12 text-muted">
                                        <span class="glyphicon glyphicon-map-marker  pull-left" style="margin-right:20px;"></span>
                                        <?= $annuaire->adresse ?>
                                    </div>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                @if ($annuaire->logo == "shop.png")
                                    <img src="{{ asset('/images/annuaire/'.$annuaire->logo)}}" alt="{{$annuaire->nom}}" class='img-thumbnail img-responsive ' width='100%' pagespeed_url_hash="3343952212" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                @else
                                    <img src="{{ asset('/images/boutique/'.$annuaire->logo)}}" alt="{{$annuaire->nom}}" class='img-thumbnail img-responsive ' width='100%' pagespeed_url_hash="3343952212" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                @endif
                                <a href="{{ url('boutique/'.str_replace(' ', '_' ,$annuaire->nom))}}" title=" Voir sa boutique ">
                                    <button class="btn btn-sm btn-default " style="margin-top:2px;width:100%;padding:2px;"> Voir sa Boutique </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
          
    <div class="pagination pull-right"></div>
    <script src="{{ asset('/js/bootspage.js')}}"></script>
    <script>$('.pagination').bootpag({total:1,leaps:true,maxVisible:10,next:'Suivant',prev:'Précedent',page:1,}).on("page",function(event,num){window.location.href="{{ url('boutique/page/')}}"+num;});$('[data-toggle="tooltip"]').tooltip();</script>
     </div>

    <script>
        //Filter News
        $('select#sort-categories').change(function() {
            var filter = $(this).val()
            filterList(filter);
        });

        //News filter function
        function filterList(value) {
            var list = $(".categories-list .categories-item");
            $(list).fadeOut("fast");
            if (value == "all") {
                $(".categories-list").find(".categories-item").each(function (i) {
                    $(this).delay(200).slideDown("fast");
                });
            } else {
                //Notice this *=" <- This means that if the data-category contains multiple options, it will find them
                //Ex: data-category="Cat1, Cat2"
                $(".categories-list").find("[data-category*=" + value + "]").each(function (i) {
                    $(this).delay(200).slideDown("fast");
                });
            }
        }
    </script>

@endsection