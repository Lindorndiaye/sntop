@extends('admin.pages.layout')

@section('style')
    
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/css/admin/dataTables.bootstrap.min.css')}}">
  <style type="text/css">
    .btn-urgent{ background-color:#5B0D61;color:#FFDFB0; }
    .btn-urgent:hover{ background-color:#5B0D61;color:#fff; }
  </style>
  <style type="text/css">.gold{color: #fc6;}.prestige{color: blue;} ul.nav-pills li a {font-size:18px; }.btn-sm{padding: 2px;font-size:15px;}</style>
  <link href="{{ url('css/simple-sidebar.css')}}" rel="stylesheet">
  
@endsection

@section('content')

    <section class="content-header">
        <h1>
            Liste des annuaires
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Liste Annuaires</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                    <table id="annoncesData" class="table table-bordered table-striped">
                        <thead>
                          <th>N° ID</th>
                          <th>Catégorie Annuaire</th> 
                          <th>Nom Entreprise</th> 
                          <th>Client</th> 
                          <th>Téléphone</th> 
                          <th>Email</th> 
                          <th>Action</th> 
                        </thead>
                        <tbody>
                            @foreach ($boutiques as $boutique)
                              <?php 
                              $annonceur = App\Models\Annonceur::where('id', $boutique->id_client)->first(); 
                              ?>
                              @if ($boutique->afficher == 1)
                                <tr id="{{$boutique->id}}" class="text-success">
                                  <td align="center">
                                    <span class="glyphicon glyphicon-ok-sign text-success"></span> 
                              @else
                                  <tr id="{{$boutique->id}}" class="text-warning">
                                  <td align="center">
                                    <span class="glyphicon glyphicon-remove-sign text-warning"></span>
                              @endif
                                </td>
                                <td>{{$boutique->categorie}}</td>
                                <td>{{$boutique->nom}}</td>
                                <td>{{$annonceur->prenom}}</td>
                                <td>{{$annonceur->telephone}}</td>
                                <td>{{$annonceur->email}}</td>
                                <td align="center">
                                  <div class="row">
                                    <div class="col-sm-2">
                                      <button type="button" class="btn btn-xs btn-danger supprimer" data-toggle="tooltip" title="Supprimer Contact ">
                                        <span class="glyphicon glyphicon-trash"></span> 
                                      </button>
                                    </div>
                                    <div class="col-sm-2">
                                      @if ($boutique->afficher == 0)
                                        <button  class="btn btn-xs btn-success afficher" data-toggle="tooltip" title="Activer affichage " >
                                          <span class="glyphicon glyphicon-ok"></span> 
                                        </button>
                                      @else
                                        <button class="btn btn-xs btn-warning retirer" data-toggle="tooltip" title="Désactiver affichage " >
                                          <span class="glyphicon glyphicon-remove"></span> 
                                        </button>
                                      @endif
                                    </div>
                                    <div class="col-sm-2">
                                      <form method="post" action="{{ url('admin/annuaire/ajouter')}}">
                                        <input type="hidden" name="nom" value="{{$boutique->nom}}" >
                                        <input type="hidden" name="id" value="{{$boutique->id}}" >
                                        <input type="hidden" name="tel" value="{{$boutique->tel}}" >
                                        <input type="hidden" name="email" value="{{$boutique->email}}" >
                                        <input type="hidden" name="adresse" value="{{$boutique->adresse}}" >
                                        <input type="hidden" name="categorie" value="{{$boutique->categorie}}" >
                                        <input type="hidden" name="couleur" value="{{$boutique->couleur}}" >
                                        <input type="hidden" name="site" value="{{$boutique->site}}" >
                                        <input type="hidden" name="pseudo" value="{{$boutique->pseudo}}" >
                                        <input type="hidden" name="passwd" value="{{$boutique->passwd}}" >
                                        <button type="submit" class="btn btn-xs btn-primary" name="modifier" data-toggle="tooltip" title="éditer contact ">
                                          <span class="glyphicon glyphicon-pencil"></span> 
                                        </button>
                                      </form>
                                    </div>
                                    <div class="col-sm-2">
                                      @if( $boutique->boutique == 0  )
                                        <button class="btn btn-xs btn-success activerBoutique" data-toggle="tooltip"  >
                                          <span class="glyphicon glyphicon-briefcase"></span>
                                        </button>
                                      @else
                                        <button class="btn btn-xs btn-default desactiverBoutique" data-toggle="tooltip" >
                                          <span class="glyphicon glyphicon-briefcase"></span>
                                        </button>
                                      @endif
                                    </div>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>                            
            </div>
        </div>
    </section>

@endsection

@section('script')

@endsection