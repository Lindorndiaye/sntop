@extends('admin.pages.layout')

@section('style')

@endsection

@section('content')

    <section class="content-header">
        <h1>
            Ajout d'un Annonceur
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Liste Annonces</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong><?php echo $message; ?></strong>
                </div>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="box box-info">
                    <form id="forma" class="form-horizontal" method="POST" action="{{url('admin/annonceur/ajout')}} " enctype="multipart/form-data">
                        <div class="box-body">
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
                                        <input type="radio" name="civilite" value="Madame"> Madame<br> 
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="radio" name="civilite" value="Mademoiselle"> Mademoiselle<br> 
                                    </div>
                                    <div class='col-xs-3'>
                                        <input type="radio" name="civilite" value="Monssieur"> Monssieur
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

                            <div class="panel-footer" style="text-align: center;">
                                <input type="submit" id="envoi" class="btn btn-danger" value="Valider" style="font-size: 16px;width: 150px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
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
    </script>
@endsection