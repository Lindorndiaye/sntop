@extends('site')

@section('title')
Ajouter une nouvelle annonce - Sn-TopAuto
@endsection

@section('css')
<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/twitter-bootstrap-wizard.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/form-elements.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css')}}">
<style>
.preloader{
  position: absolute;
	z-index: 2;
	margin-left:-35px;
	width:33px;
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
    background-color: #eeeeee;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.notformpub button {
    border-radius: 0;
    padding: 1px 5px;
    font-size: 12px;
    line-height: 1.5;
    height: 22px;
}
</style>
@endsection

@section('content')
    <?php $vendeur="active"; ?>
    @include('assets.search')
    @include('assets.controlPanel')

    <ol class = "breadcrumb">
        <li><a href = "{{ url('/')}}">Accueil</a></li>
        <li><a href = "{{ url('vendeur/')}}">Vendeur</a></li>
        <li class='active'>Créer une annonce</li>
    </ol>
<div class="panel-heading" id="concessionnaire"  style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;" >
      <center>
        <strong>FORMULAIRE DEPÔT D'ANNONCE</strong>
      </center>
</div>
<h2 class="text-center text-muted"> <u><strong>Déposez une annonce : </strong></u> </h2>
   <td align="text-center" valign="top" bordercolor="#900;" bgcolor="#900;"><h3 align="center" class="Style23"><span class="Style7"><span class="Style31"><strong><em>C'est Simple, Efficace et 100% Gratuit...</em></strong></span></span></h3>
                                  <h4 align="center" class="Style7"><strong>Notre objectif </strong><em>: vous aider &agrave; vendre plus vite et dans les meilleures conditions.</em></h4>
    <div class="row">
        <div class="col-md-12">
            <!-- Wizard container -->
            <div class="">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>CARACTÉRISTIQUES</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>DESCRIPTION ET ÉQUIPEMENTS</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>PHOTOS SUPPLÉMENTAIRES</p>
                        </div>
                    </div>
                </div>
                <form role="form" method="post" action="{{ url('/publier/annonce/')}}" enctype="multipart/form-data" style="background-color: #eeeeee;">
                    <div class="panel-body"> 
                            {{ csrf_field() }}
                            <div class="row setup-content" id="step-1">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <h3> CARACTÉRISTIQUES</h3>
                                        <div class="control-group form-group">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-4 col-xs-offset-4 col-xs-6">
                                                    <label class="radio-custom radio-inline" data-initialize="radio" for="typeVoiture">
                                                        <input id="typeVoiture" name="ClassifiedType" value="auto" type="radio" onClick="getMarques('auto')" >
                                                        <strong class="text-primary text-uppercase">Voiture</strong>
                                                    </label>
                                                </div>
                                                <div class="col-md-offset-0 col-md-4 col-xs-offset-4 col-xs-6">
                                                    <label class="radio-custom radio-inline" data-initialize="radio" for="typeMoto">
                                                        <input id="typeMoto" name="ClassifiedType" value="moto" type="radio" onClick="getMarques('moto')" >
                                                        <strong class="text-primary text-uppercase">Moto</strong>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row"> 
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="marque"> Marque : </label>
                                                </div>
                                                <div class="col-xs-9">
                                                    <select class="form-control" name="marque" id="marque" required>
                                                        <option value="" selected> -- Sélectionnez -- </option>
                                                    </select>  
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row"> 
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="modele"> Modele : </label>
                                                </div>
                                                <div class="col-xs-9">
                                                    <select class="form-control" name="modele" id="modele" required>
                                                        <option value="" selected> -- Sélectionnez -- </option>
                                                    </select>  
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row"> 
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="type"> Catégorie : </label>
                                                </div>
                                                <div class="col-xs-9">
                                                    <div id="categAuto">
                                                        <select class="form-control" name="type" id="type">
                                                            <option selected="selected" value="">TYPE</option>
                                                            <option value="Berline">Berline</option>
                                                            <option value="SUV / 4x4">SUV / 4x4</option>
                                                            <option value="Citadine">Citadine</option>
                                                            <option value="Cabriolet">Cabriolet</option>
                                                            <option value="Coupé">Coupé</option>
                                                            <option value="Luxe">Luxe</option>
                                                            <option value="Collection">Collection</option>
                                                            <option value="Pick-up / Utilitaires">Pick-up / Utilitaires</option>
                                                            <option value="Break">Break</option>
                                                            <option value="VCamion">Camion</option>
                                                            <option value="Bus">Bus</option>
                                                            <option value="Mini-Bus">Mini-Bus</option>
                                                        </select>
                                                    </div>  
                                                    <div id="categMoto">
                                                        <select class="form-control" name="type" id="type">
                                                        <option selected="selected" value="">TYPE</option>
                                                        <option value="Cross">Cross</option>
                                                        <option value="Custom">Custom</option>
                                                        <option value="Enduro">Enduro</option>
                                                        <option value="Offroad">Offroad</option>
                                                        <option value="Quad">Quad</option>
                                                        <option value="Rally">Rally</option>
                                                        <option value="Roadster">Roadster</option>
                                                        <option value="Routière">Routière</option>
                                                        <option value="Scooter">Scooter</option>
                                                        <option value="Side-Car">Side-Car</option>
                                                        <option value="Sportive">Sportive</option>
                                                        <option value="StreetFighter">StreetFighter</option>
                                                        <option value="Super Motard">Super Motard</option>
                                                        <option value="Tout-terrain">Tout-terrain</option>
                                                        <option value="Trail">Trail</option>
                                                        <option value="Trial">Trial</option>
                                                        
                                                    </select>  
                                                    </div>  
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="titre_a">Titre de l'annonce :</label>
                                                </div>
                                                <div class="col-xs-9">
                                                    <input type="text" class="form-control" name="titre_a" id="titre_a" placeholder="Choisissez un titre court et accrochant. Ex : Occasion à saisir!" required>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <div class="row"> 
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="type_a">Type d'annonce :</label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <select name="type_a" id="type_a" class="form-control">
                                                        <option value="" selected> -- Sélectionnez -- </option>
                                                        <option value="Neuf" > Neuf </option>
                                                        <option value="Occasion"> Occasion </option>
                                                        <option value="Location"> Location </option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label class="control-label" for="prix_v">Prix :</label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input type="text" class="form-control" name="prix_v" id="prix" placeholder="Prix Voiture" required>
                                                </div>
                                            </div> 
                                        </div> 

                                        <div class="form-group">
                                            <div class="row"> 
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="boite_vitesse"> Boite de vitesse : </label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <select name="boite_vitesse" id="boite_vitesse" class="form-control">
                                                        <option value="" selected> -- Sélectionnez -- </option>
                                                        <option value="Manuelle"> Manuelle </option>
                                                        <option value="Automatique"> Automatique </option>
                                                        <option value="Séquentielle"> Séquentielle </option>
                                                        <option value="Autre"> Autre </option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label class="control-label" for="carburant"> Carburant : </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <select name="carburant" id="carburant" class="form-control">
                                                        <option value="" selected> -- Sélectionnez -- </option>
                                                        <option value="Essence" > Essence </option>
                                                        <option value="Diesel" > Diésel </option>
                                                        <option value="Electrique" > Electrique </option>
                                                        <option value="GPL" > GPL </option>
                                                        <option value="CNG" > CNG </option>
                                                        <option value="Hybride" > Hybride </option>
                                                        <option value="Bioéthanol" > Bioéthanol </option>
                                                    </select>
                                                </div>
                                            </div>     
                                        </div><!-- Fin transmission et carburant -->
                                            
                                        <div class="form-group">
                                            <div class="row"> 
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="annee_v"> Année : </label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <select name="annee_v" class="form-control">
                                                        <option value="" selected> -- Sélectionnez -- </option>
                                                        <?php 
                                                        for ($i=intval(date("Y")) ; $i>=1950 ; $i--){
                                                            echo "<option value='$i'> $i </option>";
                                                        }
                                                        ?>
                                                    </select>             
                                                </div>
                                                <div class="col-xs-2">
                                                    <label class="control-label" for="kilometrage"> Kilométrage : </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input type="text"  class="form-control" name="kilometrage" min="0" id="kilometrage" placeholder="Kilometrage" required>
                                                </div>
                                            </div>     
                                        </div><!-- Fin Annee et Kilometrage -->
                                        
                                        <div class="form-group">
                                            <div class="row">  
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="cylindre"> Cylindre : </label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <select name="cylindre" id="cylindre" class="form-control">
                                                        <option value="" selected> -- Sélectionnez -- </option>
                                                        <option value="1 cylindre" > 1 cylindre </option>
                                                        <option value="2 cylindres" > 2 cylindres </option>
                                                        <option value="3 cylindres" > 3 cylindres </option> 
                                                        <option value="4 cylindres" > 4 cylindres </option>
                                                        <option value="5 cylindres" > 5 cylindres </option>
                                                        <option value="6 cylindres" > 6 cylindres </option>
                                                        <option value="7 cylindres" > 7 cylindres </option>
                                                        <option value="8 cylindres" > 8 cylindres </option>
                                                        <option value="9 cylindres" > 9 cylindres </option>
                                                        <option value="10 cylindres" > 10 cylindres </option>
                                                        <option value="11 cylindres" > 11 cylindres </option> 
                                                        <option value="12 cylindres" > 12 cylindres </option>
                                                        <option value="13 cylindres" > 13 cylindres </option>
                                                        <option value="14 cylindres" > 14 cylindres </option>
                                                        <option value="15 cylindres" > 15 cylindres </option>
                                                        <option value="16 cylindres" > 16 cylindres </option>
                                                        <option value="17 cylindres" > 17 cylindres </option>
                                                        <option value="18 cylindres" > 18 cylindres </option>
                                                        <option value="19 cylindres" > 19 cylindres </option>
                                                        <option value="20 cylindres" > 20 cylindres </option>  
                                                    </select>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label class="control-label" for="couleur"> Couleur : </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <select name="couleur" id="couleur" class="form-control">
                                                        <option value="" selected> --- Précisez --- </option>
                                                        <option value="ARGENTÉ" > ARGENTÉ </option>
                                                        <option value="BEIGE" > BEIGE </option>
                                                        <option value="blanc" > BLANC </option>
                                                        <option value="BLEU" > BLEU </option>
                                                        <option value="BLEU CLAIR" > BLEU CLAIR</option>
                                                        <option value="BLEU MARINE" > BLEU MARINE</option>
                                                        <option value="BORDEAUX" > BORDEAUX </option>
                                                        <option value="GRIS" > GRIS </option>
                                                        <option value="GRIS CLAIR" > GRIS CLAIR </option>
                                                        <option value="GRIS ANTHRACITE" > GRIS ANTHRACITE </option>
                                                        <option value="GRIS FONCÉ" > GRIS FONCÉ </option>
                                                        <option value="IVOIRE" > IVOIRE </option>
                                                        <option value="JAUNE" > JAUNE </option>
                                                        <option value="MARRON" > MARRON </option>
                                                        <option value="MARRON CLAIR" > MARRON CLAIR</option>
                                                        <option value="NOIRE" > NOIRE </option>
                                                        <option value="OR" > OR </option>
                                                        <option value="ORANGE" > ORANGE </option>
                                                        <option value="ROUGE" > ROUGE </option>
                                                        <option value="VERTE" > VERTE </option>
                                                        <option value="VERT FONCÉ" > VERT FONCÉ </option>
                                                        <option value="MAUVE" > MAUVE </option>
                                                        <option value="MARRON" > MARRON </option>
                                                        <option value="MAUVE" > MAUVE </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- fin cylindre et couleur  -->

                                        <div class="form-group">
                                            <div class="row">  
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="region"> Région : </label>
                                                </div>
                                                <div class="col-xs-9">
                                                    <select name="region" id="region" class="form-control">
                                                        <option value="" selected> -- Sélectionnez -- </option>
                                                        <option value="Dakar"> Dakar </option>
                                                        <option value="Diourbel"> Diourbel </option>
                                                        <option value="Fatick"> Fatick </option>
                                                        <option value="Kaffrine"> Kaffrine </option>
                                                        <option value="Kaolack"> Kaolack </option>
                                                        <option value="Kedougou"> Kédougou </option>
                                                        <option value="Kolda"> Kolda </option>
                                                        <option value="Louga"> Louga </option>
                                                        <option value="Matam"> Matam </option>
                                                        <option value="Saint-Louis"> Saint-Louis </option>
                                                        <option value="Sedhiou"> Sédhiou </option>
                                                        <option value="Tambacounda"> Tambacounda </option>
                                                        <option value="Thies"> Thiès </option>
                                                        <option value="Ziguinchor"> Ziguinchor </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row"> 
                                                <div id="ville_group">
                                                    <div class="col-xs-3">
                                                        <label class="control-label" for="ville"> Ville : </label>
                                                    </div>
                                                    <div class="col-xs-9">
                                                        <select name="ville" id="ville" class="form-control">
                                                            <option value="" selected> -- Sélectionnez -- </option>
                                                            <option value="Dakar" > Dakar </option>
                                                            <option value="Guediawaye" > Guédiawaye </option>
                                                            <option value="Pikine" > Pikine </option>
                                                            <option value="Rufisque" > Rufisque </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- fin region et ville  -->
                                        
                                        <div class="form-group" id="zone_group">
                                            <div class="row"> 
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="modele_v"> Zone : </label>
                                                </div>
                                                <div class="col-xs-9">
                                                    <select class="form-control" name="zone" id="zone">
                                                        <option value="" selected> -- Sélectionnez -- </option>
                                                        <option value="Biscuiterie">Biscuiterie</option>
                                                        <option value="Cambérène">Cambérène</option>
                                                        <option value="Dakar-Plateau">Dakar-Plateau</option>
                                                        <option value="Dieuppeul - Derklé">Dieuppeul - Derklé</option>
                                                        <option value="Fass - Colobane - Gueule Tapée">Fass - Colobane - Gueule Tapée</option>
                                                        <option value="Gorée">Gorée</option>
                                                        <option value="Grand-Dakar">Grand-Dakar</option>
                                                        <option value="Grand-Yoff">Grand-Yoff</option>
                                                        <option value="Hann - Bel-Air">Hann - Bel-Air</option>
                                                        <option value="HLM">HLM</option>
                                                        <option value="Médina">Médina</option>
                                                        <option value="Mermoz - Sacré-Coeur">Mermoz - Sacré-Coeur</option>
                                                        <option value="Ngor">Ngor</option>
                                                        <option value="Ouakam">Ouakam</option>
                                                        <option value="Parcelles Assainies">Parcelles Assainies</option>
                                                        <option value="Patte d'Oie">Patte d'Oie</option>
                                                        <option value="Point E - Amitié - Zone A">Point E - Amitié - Zone A</option>
                                                        <option value="Sicap Liberté">Sicap Liberté</option>
                                                        <option value="Yoff">Yoff</option>    
                                                    </select>  
                                                </div>    
                                            </div>
                                        </div><!--Fin zone --> 

                                        <div class="form-group">
                                            <div class="row">	
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="titre_a"> Description : </label>
                                                </div>
                                                <div class="col-xs-9">
                                                    <textarea rows="4" class="form-control" name="description_a" id="descr_a" placeholder="Précisions, commentaires... Décrivez précisément votre véhicule autant que possible, en indiquant son état, ainsi que toute autre information importante pour l'acquéreur." ></textarea>	
                                                </div>
                                            </div>   	
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <label class="control-label" for="marque_v"> Photo Principale de l'annonce :</label>
                                                </div>
                                                <div class="col-xs-9">
                                                    <input type="file" id="inputprestige" class="form-control" name="photo_v" >
                                                </div>
                                                <div class="col-xs-9 col-xs-offset-3">
                                                    <img src="http://placehold.it/100x100" id="showimages" style="width:100px;wax-height:100px;float:left;"  />
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" >Suivant</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-2">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <h3> DESCRIPTION ET ÉQUIPEMENTS</h3>
                                        <div class="panel panel-danger">
                                            <div class="panel-heading" style="background-color:#900; color:white; margin-bottom:10px;">
                                                <p style="font-size:16px;" > <strong>Spécifications du Véhicule</strong> (Précisez en cochant les options SVP)</p>
                                            </div>
                                            <div class="panel-body">  
                                                <div id="specific_auto">
                                                    <div class="panel panel-default">
                                                        <div style="background-color:#333; color:#fff;" class="panel-heading">
                                                            <strong >Carrosserie</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="2 Portes">2 portes </label></div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="3 Portes">3 portes </label></div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="4 Portes">4 portes </label></div>
                                                            </div>
                                                            <div>
                                                                <div class="row"> 
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="5 Portes">5 portes</label></div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Première Main">Première  Main </label></div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Chassis long">Châssis Long</label></div>
                                                                </div>
                                                                <div class="row"> 
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Chassis Court">Châssis Court</label></div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Double Echappement">Double Echappement </label></div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="carrosserie[]" value="Carnet d'Entretien">Carnet d'Entretien </label></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="panel panel-default">
                                                        <div style="background-color:#333; color:#fff;" class="panel-heading">
                                                            <strong >Transmission</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmissions[]" value="2 Roues Motrices">2 Roues  Motrices </label></div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmissions[]" value="4 Roues Motrices">4 Roues Motrices </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmissions[]" value="Commande de Roue">Commande de Roue </label> </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmissions[]" value="Propulsion">Propulsion </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmissions[]" value="Turbo">Turbo </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="transmissions[]" value="Supercharged">Supercharged </label> </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                
                                                    <div class="panel panel-default">
                                                        <div style="background-color:#333; color:#fff;" class="panel-heading">
                                                            <strong >Intérieur</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="2 Rangées de Sièges">2 Rangées de Sièges </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="3 Rangées de Sièges">3 Rangées de Sièges </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="3ème Rangée Rabattable">3ème Rangée Rabattable </label> </div>
                                                            </div>
                                                            <div>
                                                                <div class="row"> 
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Pédales Réglables">Pédales Réglables </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Direction Assistée">Direction Assistée </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Volant Réglable">Volant Réglable </label> </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="row"> 
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Volant Multifonctions">Volant Multifonctions </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Prise USB">Prise USB </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Bluetooth">Bluetooth </label> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Console Central">Console Central </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Tour de Contrôle">Tour de Contrôle </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Tablette Cache Bagages">Tablette Cache Bagages </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Climatisation">Climatisation </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Stabilisateur Température">Stabilisateur Température </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Toit Ouvrant">Toit Ouvrant </label> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Porte-Gobelets">Porte-Gobelets </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Fermetures Centralisées">Fermetures Centralisées </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Sièges Electriques">Sièges Electriques </label> </div>
                                                                </div>  
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Sièges Chauffants">Sièges Chauffants </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Sièges en Cuir">Sièges en Cuir  </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Siège Enfant">Siège Enfant </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Rafraîchisseur de Sièges">Rafraîchisseur de Sièges </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Rétroviseur Electrochrome">Rétroviseur Electrochrome </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Vitres Electriques">Vitres Electriques </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Vitres Teintées">Vitres Teintées </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Vitres coulissantes">Vitres Coulissantes </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="interieur[]" value="Dégivreur Arrière">Dégivreur Arrière </label> </div>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="panel panel-default">
                                                        <div style="background-color:#333; color:#fff;" class="panel-heading">
                                                            <strong >Extérieur</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Jantes Alliages">Jantes Alliages </label></div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Roue de Secours">Roue de Secours </label></div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="T-Top">T-Top </label></div>
                                                            </div>
                                                            <div>
                                                                <div class="row"> 
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Roues Personnalisables">Roues Personnalisables </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Pneus Neufs">Pneus Neufs </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Roues Premium">Roues Premium </label> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Peinture Métallisée">Peinture Métallisée </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Peinture d'Origine">Peinture d'Origine </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Portes Coulissantes">Portes Coulissantes </label> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Antibrouillards">Antibrouillards </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Pare-Brise Chauffant">Pare-Brise Chauffant </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Calandre Chromé">Calandre Chromé </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Porte-Bagages">Porte-Bagages </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Miroirs Electriques">Miroirs Electriques </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Rétroviseurs Electriques">Rétroviseurs électriques </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Essuie-Glaces électriques">Essuie-Glaces Electriques </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Essuie-Glace arrière">Essuie-Glace Arrière </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Bécquet">Bécquet </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Barres de Toit">Barres de Toit </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Marchepieds">Marchepieds </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Pare-Buffle">Pare-Buffle </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Pare-Boue">Pare-Boue </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Capteur de Pluie">Capteur de Pluie </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Arbre de Remorquage">Arbre de Remorquage </label> </div>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="panel panel-default">
                                                        <div style="background-color:#333; color:#fff;" class="panel-heading">
                                                            <strong >Electroniques</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Alarme">Alarme </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="GPS">GPS </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Téléphone Intégré">Téléphone Intégré </label> </div>
                                                            </div>
                                                            <div>
                                                                <div class="row"> 
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Kit Mains Libres">Kit Mains Libres </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Ordinateur de Bord">Ordinateur de Bord </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="TV">TV </label> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="ABS">ABS </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Système de Navigation">Système de Navigation </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Régulateur de Vitesse">Régulateur de Vitesse </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Démarrage à Distance">Démarrage à Distance </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Code Sécurité Portières">Code Sécurité Portières </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Assistant Marche Arrière">Assistant Marche Arrière </label> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Radar de Recul">Radar de Recul </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Projecteur Xénon">Projecteur Xénon </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Radio Satellite">Radio Satellite </label> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Am / FM radio">AM / FM Radio </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Lecteur CD/DVD">Lecteur CD/DVD </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="electronique[]" value="Commandes Vocales">Commandes Vocales</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div style="background-color:#333; color:#fff;" class="panel-heading">
                                                            <strong >Dispositifs de Sécurité</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Antivol">Antivol </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Freins Antiblocage">Freins Antiblocage </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Détecteur d'Obstacle">Détecteur d’Obstacle </label> </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Air Bag Conducteur">Air Bag Conducteur </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Air Bags Passagers">Air Bags Passagers </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Air Bag Arrière">Air Bag Arrière </label> </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Air Bags Latéraux">Air Bags Latéraux </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Clignotants Rétroviseurs">Clignotants Rétroviseurs </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Contrôle de Traction">Contrôle de Traction  </label> </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div id="specific_moto">
                                                        <div class="panel panel-default">
                                                        <div style="background-color:#333; color:#fff;" class="panel-heading">
                                                            <strong >Dispositifs de Sécurité</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="ABS">ABS </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Airbag">Airbag </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Alarme-Antivol">Alarme-Antivol </label> </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Coupe-circuit">Coupe-circuit </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Gravage antivol">Gravage antivol </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Amortisseur de direction">Amortisseur de direction </label> </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Dosseret passager (Sissy-bar)">Dosseret passager (Sissy-bar) </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="GPS">GPS </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Intercom">Intercom  </label> </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Jupe">Jupe </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Manchons">Manchons </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Pare-brise">Pare-brise  </label> </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Poignées chauffantes">Poignées chauffantes </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Radio">Radio </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Régulateur de vitesse">Régulateur de vitesse  </label> </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value=" Selle basse"> Selle basse </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Selle chauffante">Selle chauffante </label> </div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="securite[]" value="Selle confort">Selle confort  </label> </div>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div style="background-color:#333; color:#fff;" class="panel-heading">
                                                            <strong >Extérieur</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Pot d'échappement spécial">Pot d'échappement spécial </label></div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Protège-cylindres">Protège-cylindres </label></div>
                                                                <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Sabot protège-carter">Sabot protège-carter </label></div>
                                                            </div>
                                                            <div>
                                                                <div class="row"> 
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Saccoche-réservoir">Saccoche-réservoir </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Saccoches rigides">Saccoches rigides </label> </div>
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Saccoches souples">Saccoches souples </label> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Selle spéciale">Selle spéciale </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Tapis de réservoir">Tapis de réservoir </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Tête de fourche">Tête de fourche </label> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Top-Case">Top-Case </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Valises">Valises </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Bulle basse">Bulle basse </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Bulle électrique">Bulle électrique </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Bulle haute">Bulle haute </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Bulle réglable">Bulle réglable </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Durits aviation">Durits aviation </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Kit Chrome">Kit Chrome </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Radio">Radio </label> </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-sm-4 b"><label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Peinture métallisée">Peinture métallisée </label> </div>
                                                                    <div class="col-sm-4 b"> <label class="checkbox-inline"><input type="checkbox" name="exterieur[]" value="Porte-bagages">Porte-bagages </label> </div>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" >Suivant</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-3">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <h3> PHOTOS SUPPLÉMENTAIRES</h3>
                                        <div class="panel panel-danger" id="content_tof" >
                                            <div class="panel-heading" style="background-color:#900; color:white; margin-bottom:10px;">
                                                <p style="font-size:16px;" > <strong>Photos Supplémentaires :</strong></p>
                                            </div>
                                            <div class="panel-body">      
                                                <div class=" form-group">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="marque_v">
                                                                <span class="label label-info pull-left mod_opt">
                                                                    Cliquez sur "Parcourir" pour ajouter d'autres Photos
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <?php $annonceur = Session::get('annonceur');
                                                            if( $annonceur->type_cmpte == "professionnel" ){ ?> 
                                                                <input name="images[]"  class="form-control" id="images" type="file" multiple />
                                                                <input name="nbre_aut" id="nbre_aut" value="15" type="hidden" >
                                                                <small class="text-info help-block "> : Vous pouvez ajouter jusqu'à 15 photos </small>
                                                            <?php }else{ ?>
                                                                <input name="images[]" class="form-control" id="images" type="file" multiple />
                                                                <input name="nbre_aut" id="nbre_aut" value="4" type="hidden" >
                                                                <u><strong>Particulier</strong></u> : Il vous reste jusqu'à 
                                                                <strong>4 photos</strong> à ajouter. Formats autorisés : .jpg, .jpeg, .png, .gif. Poids maxi : 2Mo/Photo. Ensuite cliquez sur &quot;<strong>Enregistrer les Photos avant de continuer</strong>&quot;. Si vous souhaitez intégrer des visuels supplémentaires, il vous faudra valider une option de publication (voir <a href="../FAQ">FAQ</a>).
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div id="images-to-upload"></div>
                                                        </div>  
                                                        <div align="left">
                                                            <h5 align="center"><strong><em>Sn-Topauto d&eacute;cline toute    responsabilit&eacute; concernant l'exactitude des indications fournies. </em></strong></h5>
                                                            <h5 align="justify"><strong>*</strong>En cliquant sur<strong> &quot;Enregistrez et Continuez&quot;</strong>, j'accepte les<a href="{{ url('/conditionsGenerales')}}"> CGU, les CGV et la charte du bon annonceur.</a></span></h5>
                                                            </p>
                                                        </div> 
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <button class="btn btn-success btn-lg pull-right" type="submit">Valider!</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
		    <!-- wizard container -->
        </div>
    </div>

    <script type="text/javascript">

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showimages').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#inputprestige').change(function () {
            readURL(this);
        });


        $("#typeVoiture").on('click', function(){
            $("#specific_auto").show();
            $("#specific_moto").hide();
            $("#categAuto").show();
            $("#categMoto").hide();
        });
        $("#typeMoto").on('click', function(){
            $("#specific_moto").show();
            $("#specific_auto").hide();
            $("#categMoto").show();
            $("#categAuto").hide();
        });

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
        
        $('#images').on('change', function(e){
            var files = e.target.files;
            $.each(files, function(i, file){
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e){
                    var template = '<div class="col-md-3 text-center">'+
                        '<p><img class="thumbnail img-responsive center-block" style="max-height: 160px; max-width: 160px;" src="'+e.target.result+'"/></p>'+
                        '<p><a href="javascript:void(0);" onclick="delfile(this);" class="btn btn-sm btn-danger">Remove</a></p>'+
                        '</div>';
                    $('#images-to-upload').append(template);
                };
            });
        });

        function delfile(id) {
            $(id).parent().parent().remove();
        }

        //gestion affiche ville et zone
        $("#region").on('change', function(){
            var region = $("#region").val();
            if(region === "Dakar"){
                $("#ville_group").show();
            }else{
                $("#ville_group").hide();
            }
        })

        $("#ville").on('change', function(){
            var ville = $("#ville").val();
            if(ville === "Dakar"){
                $("#zone_group").show();
            }else{
                $("#zone_group").hide();
            }
        })
    </script>

    <script>
        $(document).ready(function () {
            $("#categAuto").hide();
            $("#categMoto").hide();

            $("#ville_group").hide();
            $("#zone_group").hide();

            var navListItems = $('div.setup-panel div a'),
                    allWells = $('.setup-content'),
                    allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                        $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>
@endsection   