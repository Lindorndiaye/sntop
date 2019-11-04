@extends('site')

@section('title')
Sn-TopAuto inscription
@endsection

@section('css')
<style type="text/css">
    .panel-heading { 
        height: 35px ; 
        background-color:#333;
        color:#fff; 
        line-height: 10px;
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
        <li><a href="{{ url('vendeur/')}}"> Vendeur </a></li>
        <li class="active">Création de compte</li>
    </ol>
<div class="panel-heading" id="concessionnaire"  style="margin-bottom:solid 1px #900;background-color:#900;color:#fff;font-size:16px;padding:5px;" >
      <center>
        <strong>JE CREE MON COMPTE</strong>
      </center>
</div>
<p>@if ($message = Session::get('success'))
        </p>
<div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong><?php echo $message; ?></strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        @endif
        <div class="panel panel-danger " style="background-color:#eeeeee;">
            <div class="panel-body">
              <h3 class="text-center text-danger"><strong>Pourquoi créer un compte?</strong></h3>
                <h5><strong><em>Pour passer facilement vos annonces, nous vous recommandons de créer un compte. Rapide, facile et gratuit, il vous donne accès à de nombreuses fonctionnalités...</em></strong></h5>
                <h5 align="center">Passez vos annonces;</h5>
                <h5 align="center">Modifiez vos annonces;</h5>
                <h5 align="center">Supprimez vos annonces;</h5>
                <h5 align="center">Consultez et recherchez des milliers d'annonces...</h5>
                <hr>
                <h3 class="text-center text-danger"> <strong>Création d'un compte </strong></h3>
                <hr>
                <form id="forma" class="form-horizontal" method="POST" action="{{url('/inscription')}} " enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="firstName">Type de Compte :</label>
                        <div class="col-xs-4">
                            <input type="radio" name="type_cmpte" value="particulier" checked> Particulier<br> 
                        </div>
                        <div class='col-xs-4'>
                            <input type="radio" name="type_cmpte" value="professionnel"> Professionnel
                        </div>
                    </div>
        
                    <div class="panel panel-danger " id="divPersonne" style="padding: 10px;margin: 20px;">
                        <div class="form-group">
                            <label class="control-label col-xs-3" for="civilite">Civilité :</label>
                            <div class="col-xs-3">
                                <input type="radio" name="civilite" value="madame"> Madame<br> 
                            </div>
                            <div class="col-xs-3">
                                <input type="radio" name="civilite" value="mademoiselle"> Mademoiselle<br> 
                            </div>
                            <div class='col-xs-3'>
                                <input type="radio" name="civilite" value="monssieur"> 
                                Monsieur
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" for="firstName">Prénom et Nom :</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="prenom" id="firstName" placeholder="Prénom" >
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="nom" id="lastName" placeholder="Nom" >
                            </div>
                        </div>
                        
                    </div>
    
                    <div class="panel panel-danger hide" id="divEntreprise" style="padding: 10px;margin: 20px;">
                        <div class="form-group " >
                            <label class="control-label col-xs-3" for="concession" >Concession :</label>
                            <div class="col-xs-8 ">
                                <input type="text" class="form-control" name="concession" id="entreprise" placeholder="Nom Concession ">
                            </div>
                        </div>
                        <div class="form-group " >
                            <label class="control-label col-xs-3" for="adresse" >Adresse :</label>
                            <div class="col-xs-8 ">
                                <input type="text" class="form-control" name="adresse" id="entreprise" placeholder="Adresse">
                            </div>
                        </div>
                        <div class="form-group " >
                            <label class="control-label col-xs-3" for="marque" >Marques représentées :</label>
                            <div class="col-xs-8 ">
                                <input type="text" class="form-control" name="marques" id="entreprise" placeholder="Marques représentées ">
                            </div>
                        </div>
                        <div class="form-group " >
                            <label class="control-label col-xs-3" for="site" >Site Web :</label>
                            <div class="col-xs-8 ">
                                <input type="text" class="form-control" name="site_web" id="entreprise" placeholder="Site Web">
                            </div>
                        </div>
                        <div class="form-group " >
                            <label class="control-label col-xs-3" for="logo" >Logo :</label>
                            <div class="col-xs-8 ">
                                <input type="file" class="form-control" name="logo" id="entreprise" >
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group" >
                        <label class="control-label col-xs-3" for="pseudo1">Identifiant*:</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="login" id="pseudo1" placeholder="Nom d'Utilisateur">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputPassword">Mot de Passe*:</label>
                        <div class="col-xs-8">
                            <input type="password" class="form-control" name="mot_de_passe" id="password1" placeholder="Mot de Passe">
                            <span class="help-block hide">Le mot de passe doit avoir au moins 6 caractères</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="cpassword">Confirmation*:</label>
                        <div class="col-xs-8">
                            <input type="password" class="form-control" name="conf_p" id="cpassword" placeholder="Confirmation du Mot de Passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="email1" >E-mail*/ Phone *:</label>
                        <div class="col-xs-4 ">
                            <input type="email" class="form-control" name="email" id="email1" placeholder="Adresse mail" required>
                        </div>
                        <div class="col-xs-4 ">
                            <input type ="tel"  pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" name="telephone" id="telephone" placeholder="Téléphone" required>
                            <span class="help-block hide">Ex : +221776001122</span>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-8">
                            <div class="panel-heading" style="background-color:#900; color:white; margin-bottom:10px;line-height:16px;height:50px;">
                                <div align="center">
                                    <strong><u>NB :</u></strong> 
                                        <em>Nous prenons la protection de vos données au sérieux.</em>
                                        <p><em>Les données saisies ne seront pas utilisées à des fins 
                                        publicitaires ou autres. </em></p>
                                </div>
                            </div>
                            <label class="checkbox-inline">
                                <div align="justify"><br>
                                    <input type="checkbox" name="accord" id="accord">  
                                    <strong><em>J'accepte de recevoir des offres et informations des Partenaires de Sn-TopAuto.com.</em></strong>
                                </div>
                            </label>
                            <div class="text-danger" id="resultat"></div>
                            <div class="text-warning" id="rmdp"></div>
                        </div>
                    </div>
                    <br>
                    <div class="panel-footer" style="text-align: center;">
                        <input type="submit" id="envoi" class="btn btn-danger" value="Valider" style="font-size: 16px;width: 150px;">
                    </div>
                </form>
          </div>
        </div>
    </div>
    <script>

    $("#envoi").click(function(){
        returne = true;
        if( $('#pseudo1').val() == "" ){
                $('#resultat').html("<hr><span class='glyphicon glyphicon-alert' ></span> Remplir tous les champs"); 
                $('#pseudo1').parent('div').addClass('has-error'); 
                returne= false;  
                }else{
                $('#pseudo1').parent('div').removeClass('has-error').addClass('has-success');  
                }
                if($('#email1').val() == ""){  
                $('#resultat').html("<hr><span class='glyphicon glyphicon-remove-circle'></span> Remplir tous les champs "); 
                $('#email1').parent('div').addClass('has-error'); 
                returne= false;  
                }else{
                $('#email1').parent('div').addClass('has-success');  
                }
                if($('#password1').val().length < 6){  
                $('#rmdp').html("<hr><span class='glyphicon glyphicon-remove-circle'></span> Le mot de passe doit contenir au minimum 6 caractères "); 
                $('#password1').parent('div').addClass('has-error'); 
                $('#cpassword').parent('div').addClass('has-error');
                returne= false;  
                }else{
                if( $('#password1').val() != $('#cpassword').val() ){
                $('#rmdp').html("<hr><span class='glyphicon glyphicon-remove-circle'></span> Les deux mots de passes doivent êtres identiques "); 
                $('#password1').parent('div').addClass('has-error'); 
                $('#cpassword').parent('div').addClass('has-error'); 
                returne= false;  
                }else{
                $('#password1').parent('div').addClass('has-success').removeClass('has-error');  
                $('#cpassword').parent('div').addClass('has-success').removeClass('has-error'); 
                }
            }
            if($( "input:checked" ).length == 0){
                $('#resultat').append("<hr><span class='glyphicon glyphicon-remove-circle'></span> Vous n'avez pas déclaré avoir lu les Conditions d'utilisations "); 
                returne= false;  
                }  
            return returne;
        });
        
        $( "input[type='radio'][name='type_cmpte']" ).change(function () {
        var str =  $(this ).val();
        if( str == "professionnel" ){
        $("#divEntreprise").removeClass("hide");
        $("#divPersonne").addClass("hide");
        }else if (str == "particulier"){
        $("#divPersonne").removeClass("hide");
        $("#divEntreprise").addClass("hide");
        }
        });
        
        $("#telephone").focus(function(){
            $(".help-block").removeClass('hide');
        });
        
    </script>

@endsection