<?php $vendeur="active"; ?>
@extends('site')

@section('title')
Sn-TopAuto connexion
@endsection

@section('css')
<style type="text/css">
  .form-signin {
  max-width: 330px;
  padding: 15px;
  margin-bottom:100px ;
}

.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
@endsection

@section('content')
        
        <!-- search-->
        @include('assets.search')

        <script type="text/javascript" src="https://www.sn-topauto.com/js/typeahead.min.js"></script>
        <script type="text/javascript">$(document).ready(function(){$('#rqt').typeahead({ajax:{url:'https://www.sn-topauto.com/classes/get_marque.php',loadingClass:"loading-circle",triggerLength:1}});});</script>
        <style type="text/css">.controlPanel{background-color:#333;border-top:solid 10px #900;color:#fff;font-size:12px;margin-bottom:10px}.well-img{width:50;height:auto}.hover{background-color:#fff}.well{border:solid 2px #ccc;background-color:#eee;cursor:pointer}.well:hover{cursor:pointer;box-shadow:10px 10px 50px 0 gray;background-color:#fff;text-decoration:none}.well-txt{margin-top:10px;color:#900}ul.nav-tabs li a,li.disabled{padding-left:10px;padding-right:10px;color:#fff;border-radius:0}ul.nav-tabs li a:hover,ul.nav-tabs li a:active{color:#900}</style>
        <!-- control panel -->
        @include('assets.controlPanel')
        <ol class="breadcrumb">
            <li><a href="{{ url('/')}}">Accueil</a></li>
            <li><a href="{{ url('vendeur/')}}"> Vendeur </a></li>
            <li class="active">Connexion</li>
        </ol>
        <div class="panel-heading" id="concessionnaire"  style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;" >
      <center>
<strong>CONNEXION A MON COMPTE</strong>
      </center>
</div>
        <div class="row">
        <p>&nbsp;</p>
            <div class="row panel panel-danger" style="margin-right:15px;margin-left:15px; ">
                <div class="col-sm-6">
                    <h2><u>Pas encore membre ?</u></h2>    
                    <div class="green bottom "> 
                        <h3>Nouveau membre</h3>
                        <h5 align="justify">
                            <strong>Vous êtes déjà membre?</strong> Utilisez le 
                            <strong><u>formulaire de connexion</u></strong> à droite pour accéder à votre compte.<br>
                            </h5>
                        <h5 align="justify"><strong>Vous êtes nouveau </strong> sur Sn-TopAuto.com? Cliquez sur le <u><strong>bouton</strong></u> ci-dessous pour créér gratuitement un compte et commencez à publier vos annonces.</h5>
                        <p>
                            <a href="{{ url('/inscription')}}">
                                <button type="submit" class="btn btn-primary">
                                <b>Créer votre compte</b>
                            </button>
                            </a>
                        </p>
                    </div>                                 
                </div>
                <div class="col-sm-6">
                    <div class="compte">
                        <form class="form-signin" method="POST" action="{{url('/connexion')}} ">
                            {{ csrf_field() }}
                            <h2 class="form-signin-heading text-center"><u>Connexion</u></h2>
                            <h5 align="justify"><strong><em>Vous devez vous connecter ou créer un compte gratuitement pour pouvoir poster des annonces.</em></strong></h5>
                            <label for="pseudo" class="sr-only">Identifiant</label>
                            <input type="text" name="loggin" id="pseudo" class="form-control" placeholder="Pseudo" value="" required autofocus><br>
                            <label for="password" class="sr-only">Mot de Passe </label>
                            <input type="password" name="motpasse" id="password" class="form-control" placeholder="Mot de passe" required>
                            <br><button class="btn btn-sm btn-danger btn-block" id="submit" type="submit">
                                <h5><strong>Se connecter</strong></h5>
                            </button>
                            <a href="{{ url('inscription')}}">Mot de passe oublié? </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

     </div>

@endsection