@extends('site')

@section('title')
    Sn-TopAuto.com - Contactez-nous
@endsection

@section('css')
<style type="text/css">
    
</style>
@endsection

@section('content')

    <script>
         function loadMap() {

            var mapOptions = {
               center:new google.maps.LatLng(14.72017539, -17.45324641),
               zoom:15
            }

            var map = new google.maps.Map(document.getElementById("map-canavas"),mapOptions);

            var marker = new google.maps.Marker({
               position: new google.maps.LatLng(14.72017539, -17.45324641),
               map: map,
               animation: google.maps.Animation.BOUNCE,
            });
         }
      </script>

    <!-- control panel -->
    @include('assets.controlPanel')

<div>
        <div class="panel panel-danger" style="background-color: #eeeeee;">
            <p>&nbsp;</p>
  </div>
        <div class="panel-heading" id="concessionnaire"  style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;" >
      <center>
        <strong>FORMULAIRE POUR NOUS CONTACTER</strong>
      </center>
</div>
            <p>@if ($message = Session::get('success')) </p>
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
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
            <div class="panel-body">
              <h5 align="justify" class="text-center text-danger">
                  <em>Vous souhaitez nous joindre? N’hésitez pas. Que ce soit pour nous faire des suggestions, nous faire part de votre perception, nous signaler une anomalie ou pour toute autre raison, nous vous répondrons avec plaisir dans les plus brefs délais.</em>
                </h5>
                <form method="post" action="{{ url('/contact')}}">
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
                                <input type="email" name="email" class="form-control" placeholder="Adresse E-mail" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Sujet :</label>
                            </div>
                            <div class="col-sm-9">
                                <select type="text" name="objet" class="form-control" placeholder="Sujet" required>
                                    <option value="choisir un sujet"selected> -- Choisir un sujet -- </option>
                                    <option>Mon Compte</option>
                                    <option>Poster une Annonce</option>
                                    <option>Supprimer une Annonce</option>
                                    <option>Modifier une Annonce</option>
                                    <option>Partenariat</option>
                                    <option>Publicité</option>
                                    <option>Signaler une Arnaque</option>
                                    <option>Commentaire à propos de ce Site</option>
                                    <option>Autre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="text-diarra">Message :</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="message" rows="10"  class="form-control" placeholder="Message" style="resize: vertical;"></textarea>
                            </div>
                        </div>
                    </div>	
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-danger">Envoyer</button>
                                <h2 align="center"><u>Notre Adresse</u></h2>
                              <div>
                                  <h3 align="center"><img src={{asset('images/MOTO/LOGO_VISCOM.png' width="254" height="81" alt=""/></h3>
                                <h4 align="center">Sicap Dieuppeul 1 N° 2338/C<br>
                                      Tél: +221 77 634 58 38<br>
                                    Dakar - (Sénégal)<br>
                                </h4>
                              </div>
                            </div>
                        </div>
                    </div>	
		        </form>
  </div>	
            <div style="height:100%; width:100%;">
                <div id="map-canavas" style=" height:500px"></div>
            </div>
</div>
    </div>    

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANJ043Bk_kd1l9k1thEfMiFlUkX1XrTwk&callback=loadMap"></script>
@endsection