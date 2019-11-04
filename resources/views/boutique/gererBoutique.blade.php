@extends('site')

@section('title')
Création de Boutique
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/annuaire.css')}}">
@endsection

@section('content')
<ol class="breadcrumb">
    <li> <a href="{{ url('/')}} ">Accueil</a> </li>
    <li> <a href="{{ url('annuaire/')}}">Annuaire</a></li>
    <li> <a href="{{ url('boutique/')}}">Boutique</a></li>
    <li class='active'>Création de Boutique</li>
</ol>
@if(Session::has('annonceur'))
<?php $annonceur = Session::get('annonceur'); ?>
<div class="col-sm-3" >
    <h4 class="text-muted"> <?= strtoupper( $annonceur->nom ); ?> <hr style="border-top:2px solid #900; "> </h4>
</div>
<div class="col-sm-4 col-sm-offset-5">
    <a href="<?= "boutique/ajouter/".str_replace(" ","_" ,$annonceur->nom);?>"><button class="btn btn-lg btn-danger" title="Ajouter un article" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span> </button></a>
    <a href="gerer/boutique"><button class="btn btn-lg btn-danger active" title="Configurer ma boutique" data-toggle="tooltip"><span class="glyphicon glyphicon-cog"></span> </button></a>
    <a href="<?= "boutique/".$annonceur->nom_categorie."/".str_replace(" ","_" ,$annonceur->nom); ?>"><button class="btn btn-lg btn-danger" title="Voir ma boutique" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button></a>
    <a href="dec.php"><button class="btn btn-lg btn-danger" title="Fermer la Session" data-toggle="tooltip"><span class="glyphicon glyphicon-log-out"></span> </button></a>
</div>
@else
<form method="post" action="{{ url('/creer/boutique/')}}" style="padding-bottom: 10px;" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-sm-4"><input type="text" placeholder="Nom d'utilisateur" class="form-control" name="pseudo" autocomplete="off"> </div>
    <div class="col-sm-4"><input type="password" placeholder="Mot de passe" class="form-control" name="passwd" autocomplete="off"> </div>
    <div class="col-sm-4"><input type="submit" class="btn btn-danger form-control" value="Se connecter"></div>
</form>
<hr>
@endif
<div class="row">
    <div class="col-sm-12">
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
        <div class="panel panel-danger">
        <div class="panel-heading" style="background-color: #900;color:#fff;font-weight:bold; "> Configurer ma Boutique</div>

            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
            <div class="panel-body">
                <form method="post" id="form_ins" action="{{ url('/save/boutique/')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(Session::has('annonceur'))
                    <?php $annonceur = Session::get('annonceur'); ?>
                    <input type="hidden" name="id_client" value="{{$annonceur['id']}}">
                    @endif
                    <div class="row form-group">
                        <div class="col-sm-3 col-sm-offset-1"><label> Catégorie : </label> </div>
                        <div class="col-sm-7">
                            <select name="categorie" class='form-control input-sm' required>
                                <option value="selectionnez" selected> -- Sélectionnez -- </option>
                                <option value='Crédit Automobile'> Crédit Automobile </option>
                                <option value='Assurance Automobile'> Assurance Automobile </option>
                                <option value='Agence de Location'> Agence de Location </option>
                                <option value='Concessionnaire'> Concessionnaire </option>
                                <option value='Auto Ecole'> Auto Ecole </option>
                                <option value='Pièces Détachées'> Pièces Détachées </option>
                                <option value='Pneumatique'> Pneumatique </option>
                                <option value='Hydrocarbure'> Hydrocarbure </option>
                                <option value='Garage Mécanique'> Garage Mécanique </option>
                                <option value='Carrosserie et Peinture'> Carrosserie et Peinture </option>
                                <option value='Climatisation'> Climatisation </option>
                                <option value='Nettoyage Professionnel'> Nettoyage Professionnel </option>                          
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3 col-sm-offset-1 "> <label> Nom Boutique : </label></div>
                        <div class="col-sm-7">
                            <input type="text" id="" class="input-sm  form-control " name="nom" placeholder="Nom de la boutique" required autocomplete="off" value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3 col-sm-offset-1 "> <label> Adresse : </label></div>
                        <div class="col-sm-7">
                            <input type="adresse" id="" class="input-sm  form-control " name="adresse" placeholder="Adresse de la boutique" required autocomplete="off" value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3 col-sm-offset-1 "> <label> Site Web :</label></div>
                        <div class="col-sm-7">
                            <input type="siteweb" id="" class="input-sm  form-control " name="site_web" placeholder="Site Web" required autocomplete="off" value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3 col-sm-offset-1 "> <label> Logo : </label></div>
                        <div class="col-sm-7">
                            <input type="file" id="inputlogo" class="form-control" name="photo" >
                            <img src="http://placehold.it/100x100" id="showimages" style="width:100px;wax-height:100px;float:left;"  />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3 col-sm-offset-1 "> <label> Description : </label></div>
                        <div class="col-sm-7">
                            <textarea class="input-sm  form-control " name="description" rows="10" placeholder="Exemple : Une description détaillée de vos activités"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3 col-sm-offset-1 "> <label> Horaire d'Ouverture : </label></div>
                        <div class="col-sm-7">
                            <textarea class="input-sm form-control" name="horaire" rows="2" placeholder="Exemple: Du lundi au vendredi 09H00-17H00 et le samedi 9H00-14H00"></textarea>
                        </div>
                    </div>
                    
                    <div class="row form-goup">
                        <div class="col-sm-4 col-sm-offset-4">
                            <button class="form-control input-sm btn btn-danger" name="ajouter"><strong>Enregistrer ma boutique</strong></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showimages').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#inputlogo').change(function () {
        readURL(this);
    });
</script>
@endsection