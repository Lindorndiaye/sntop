@extends('site')

@section('title')
Sn-TopAuto - Autothèque dépôt
@endsection

@section('css')

@endsection

@section('content')
<script type="text/javascript" src="{{ url('js/index.js')}}"></script>
<ol class = "breadcrumb">
   <li><a href = "{{ url('/')}}">Accueil</a></li>
   <li><a href = "{{ url('/autotheque')}}">Autothèque</a></li>
   <li class="active">Dépôt Recherche</li>
</ol>

@include('assets.controlPanel')


<div class="row">
    <div class="col-md-12" style="background: #eeeeee;">
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

        <form action="{{ url('/autotheque/depot')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h2 class="text-center text-muted" align="center">Déposer une Recherche dans l'autothèque</h2>
            <hr>
            <div class="text-danger">
                <div align="center">
                    <h4><strong>Simple, Rapide et Efficace ...<br>
                        Déposer Gratuitement votre recherche de voiture.<br>
                        Grâce à notre autothèque, formulez votre demande rapidement et attendez d'être contacté par un vendeur particulier ou professionnel possédant le bien correspondant. </strong>
                    </h4>
                </div>
            </div><br>
            <div class="panel panel-default">
                <div class="panel-heading" style="padding-bottom:0;background-color:#900;">
                    <p style="color:#fff;"><strong>INFORMATIONS PERSONNELLES</strong></p>
                </div>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-2">
                                <label class="control-label" for="prenom"> Prénom : </label>
                            </div>
                            <div class="col-xs-4">
                                <input class="form-control" name="prenom" placeholder="Prénom" required="" autofocus="" type="text">
                            </div>
                            <div class="col-xs-2">
                                <label class="control-label" for="nom"> Nom : </label>
                            </div>
                            <div class="col-xs-4">
                                <input class="form-control" name="nom" placeholder="Nom" required="" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-2">
                                <label class="control-label" for="telephone"> Téléphone : </label>
                            </div>
                            <div class="col-xs-4">
                                <input class="form-control" name="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" placeholder="Téléphone" required="" type="tel">
                            </div>
                            <div class="col-xs-2">
                                <label class="control-label" for="email"> E-mail : </label>
                            </div>
                            <div class="col-xs-4">
                                <input class="form-control" name="email" placeholder="Email" required="" type="email">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" style="padding-bottom:0;background-color:#900;">
                    <p style="color:#fff;"><strong>DESCRIPTION DU VÉHICULE RECHERCHÉ</strong></p>
                </div>
                <div class="panel-body"> 
                    <div class="form-group">
                        <div class="row"> 
                            <div class="col-xs-3">
                                <label class="control-label" for="type_vehicule"> Type Véhicule : </label>
                            </div>
                            <div class="col-xs-9">
                                <select class="form-control" name="typevehicule" id="typevehicule" required>
                                    <option id="typevehicule"> --Sélectionnez-- </option>
                                    <option value="auto">Voiture</option>
                                    <option value="moto">Moto</option>
                                </select> 
                            </div>    
                        </div>
                    </div><!--Fin input  Marque -->
                    <div class="form-group">
                        <div class="row"> 
                            <div class="col-xs-3">
                                <label class="control-label" for="marque"> Marque : </label>
                            </div>
                            <div class="col-xs-9">
                                <select class="form-control" name="marque" id="marque" required>
                                    <option> --Sélectionnez-- </option>
                                </select> 
                            </div>    
                        </div>
                    </div><!--Fin input  Marque --> 

                    <div class="form-group">
                        <div class="row"> 
                            <div class="col-xs-3">
                                <label class="control-label" for="modele"> Modèle : </label>
                            </div>
                            <div class="col-xs-9">
                                <div class="preloader hide" id="preloader">
                                    <img src="{{ asset('images/loading.gif')}}" class="img-responsive center-block">
                                </div>
                                <select class="form-control" name="modele" id="modele" placeholder="Modele" required> 
                                    <option> --Sélectionnez-- </option>
                                </select>  
                            </div>    
                        </div>
                    </div><!--Fin input Modèle -->
                    <div class="form-group">
                        <div class="row"> 
                            <div class="col-xs-3">
                                <label class="control-label" for="prix">Budget :</label>
                            </div>
                            <div class="col-xs-4">
                                <input class="form-control" name="budget" id="prix" placeholder="--Précisez--" required type="text">
                            </div>
                            <div class="col-xs-2">
                                <label class="control-label" for="type">Type :</label>
                            </div>
                            <div class="col-xs-3">
                                <select name="type" id="type" class="form-control">
                                    <option value=""> --Sélectionnez-- </option>
                                    <option value="neuf"> Neuf </option>
                                    <option value="occasion"> Occasion </option>
                                    <option value="location"> Location </option>
                                </select>
                            </div>
                        </div> 
                    </div> 

                    <div class="form-group">
                        <div class="row"> 
                            <div class="col-xs-3">
                                <label class="control-label" for="transmission"> Transmission : </label>
                            </div>
                            <div class="col-xs-4">
                                <select name="transmission" id="transmission" class="form-control">
                                    <option value=""> --Sélectionnez-- </option>
                                    <option value="tous"> Tous </option> 
                                    <option value="manuel"> Manuelle </option>
                                    <option value="automatique"> Automatique </option>
                                    <option value="sequentiel"> Séquentielle </option>
                                    <option value="autre"> Autre </option>
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <label class="control-label" for="carburant"> Carburant : </label>
                            </div>
                            <div class="col-xs-3">
                                <select name="carburant" id="carburant" class="form-control">
                                    <option selected=""> --Sélectionnez-- </option>
                                    <option value="tous"> Tous </option>
                                    <option value="essence"> Essence </option>
                                    <option value="gazoil"> Diésel </option>
                                    <option value="electrique"> Electrique </option>
                                    <option value="hybride"> Hybride </option>
                                    <option value="gpl"> GPL </option>
                                    <option value="cng"> CNG </option>
                                    <option value="autre"> Autre </option>
                                </select>
                            </div>
                        </div>     
                    </div><!-- Fin transmission et carburant -->

                    <div class="form-group">
                        <div class="row"> 
                            <div class="col-xs-3">
                                <label class="control-label" for="prevision_achat"> Prévision d'achat : </label>
                            </div>
                            <div class="col-xs-9">
                                <select name="prevision_achat" class="form-control" required="">
                                    <option selected=""> --Sélectionnez-- </option>
                                    <option value="l'immediat">Immédiat</option>
                                    <option value="une semaine">Une semaine</option>
                                    <option value="deux semaines">Deux semaines</option>
                                    <option value="un mois">Un mois</option>
                                    <option value="trois mois">Trois mois</option>
                                </select>
                            </div>    
                        </div>
                    </div><!--Fin Prevision d'Achat -->

                    <div class="form-group">
                        <div class="row">  
                            <div class="col-xs-3">
                                <label class="control-label" for="cylindre"> Période : de</label>
                            </div>
                            <div class="col-xs-4">
                                <select name="annee_depart" class="form-control">
                                    <option selected=""> --Sélectionnez-- </option>
                                    <?php 
                                    for ($i=intval(date("Y")) ; $i>=1950 ; $i--){
                                        echo "<option value='$i'> $i </option>";
                                    }
                                    ?> 
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <label class="control-label" for="couleur">  à: </label>
                            </div>
                            <div class="col-xs-3">
                                <select name="annee_fin" class="form-control">
                                    <option selected=""> --Sélectionnez-- </option>
                                    <?php 
                                    for ($i=intval(date("Y")) ; $i>=1950 ; $i--){
                                        echo "<option value='$i'> $i </option>";
                                    }
                                    ?> 
                                </select>
                            </div>
                        </div>
                    </div><!-- intervalle d'annee  -->

                    <div class="form-group">
                        <div class="row"> 
                            <div class="col-xs-3">
                                <label class="control-label" for="description"> Description : </label>
                            </div>
                            <div class="col-xs-9">
                                <textarea rows="4" class="form-control" name="description" id="description" placeholder="Description"></textarea>  
                            </div>
                        </div>     
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-3">
                        <input name="date_pub" value="2018-01-12" type="hidden">
                        <input value="Déposez Votre Recherche" class="btn btn-sm btn-danger form-control" type="submit">
                    </div>
                </div><br>
            </div><!--Fin Detail annonce--> 

        </form>
        <br> 

    </div>
</div>

<script>
    //type vehicule change
    $("#typevehicule").on('change', function(){
        var typevehicule = $("#typevehicule").val();
        $("#modele").html('<option value="">--Selectionner--</option>');
        <?php $url = url('/get_marque') ?>
        $.ajax({
            url: "<?= $url?>/"+typevehicule,
            data: {
                type: typevehicule
            },
            dataType: 'html',
            type: 'get',
            success: function (data) {
                console.log(data);
                $("#marque").html(data);
            }
        })
    });

    //get marque by type vehicule
    function getMarques(type){
        <?php $url = url('/get_marque') ?>
        $.ajax({
            url: "<?= $url?>/"+type,
            data: {
                type: type
            },
            dataType: 'html',
            type: 'get',
            success: function (data) {
                $("#marque").html(data);
            }
        })
    };

    //get modele by marque
    $("#marque").on('change', function() {
        var id = $("#marque").val();
        <?php $url = url('/get_modele') ?>
        $.ajax({
            url: "<?= $url?>/"+id,
            data: {
                id: id
            },
            dataType: 'html',
            type: 'get',
            success: function (data) {
                $("#modele").html(data);
            }
        })
    });
</script>
@endsection