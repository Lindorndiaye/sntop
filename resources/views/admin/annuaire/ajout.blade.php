@extends('admin.pages.layout')

@section('style')
    <style type="text/css"> 
        .span-couleur{ display:inline-block; width:30px ; height:30px ;border:solid 1px #ccc; }
    </style>
@endsection

@section('content')

    <section class="content-header">
        <h1>
            Ajout d'une Boutique
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Ajout Boutique</li>
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
                    <form id="forma" class="form-horizontal" method="POST" action="{{url('admin/annuaire/ajouter')}} " enctype="multipart/form-data">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-xs-3"> Client : </label>
                                <div class="col-sm-8">
                                    <select name="id_client" class='form-control' required>
                                        <option value="selectionnez" selected> -- Sélectionnez -- </option>
                                        @foreach ($annonceurs as $annonceur)
                                            <option value='{{$annonceur->id}}'> {{$annonceur->prenom}} {{$annonceur->nom}} ({{$annonceur->telephone}}) </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3"> Catégorie : </label>
                                <div class="col-sm-8">
                                    <select name="categorie" class='form-control' required>
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
                            <div class="form-group">
                                <label class="control-label col-xs-3"> Nom Boutique : </label>
                                <div class="col-sm-8">
                                    <input type="text" id="" class="form-control" name="nom" placeholder="Nom de la boutique" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3"> Adresse : </label>
                                <div class="col-sm-8">
                                    <input type="adresse" id="" class="form-control " name="adresse" placeholder="Adresse de la boutique">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3"> Site Web :</label>
                                <div class="col-sm-8">
                                    <input type="siteweb" id="" class="form-control " name="site_web" placeholder="Site Web" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3"> Logo : </label>
                                <div class="col-sm-8">
                                    <input type="file" id="inputlogo" class="form-control" name="photo" >
                                    <img src="http://placehold.it/100x100" id="showimages" style="width:100px;wax-height:100px;float:left;"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3"> Description : </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control " name="description" rows="5" placeholder="Exemple : Une description détaillée de vos activités"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-xs-3"> Horaires d'Ouverture : </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="horaire" rows="2" placeholder="Exemple: Du lundi au vendredi 09H00-17H00 et le samedi 9H00-14H00"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3"> Couleur : </label>
                                <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-default"><span class="span-couleur btn-default"></span></label></div>                   
                                <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-primary"><span class="span-couleur btn-primary"></span></label></div>
                                <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-info" ><span class="span-couleur btn-info"></span></label></div>
                                <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-warning"><span class="span-couleur btn-warning"></span></label></div>      
                                <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-danger"><span class="span-couleur btn-danger"></span></label></div>
                                <div class="col-sm-1"> <label class="radio-inline"><input type="radio" name="couleur" value="notice-success" ><span class="span-couleur btn-success"></span></label></div>

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