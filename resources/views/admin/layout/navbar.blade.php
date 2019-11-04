<!DOCTYPE >
<html lang="fr">
    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
        <style type="text/css">
            body{padding-top:35px;}.navbar{padding:0px;}.navbar-default{padding: 0px;} a.link{display: inline-block;margin:5px;color:#fff;font-size:16px;} a.link:hover{text-decoration: none;color:#f00;}
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" >
    </head>

<div class="row navbar-fixed-top" style="padding-left:20px;padding-right:30px;background:#444;height:35px;color:#fff;">
<div class="navbar-left"> 
    <a class="link" href="#menu-toggle"id="menu-toggle">
        <span class="glyphicon glyphicon-th-list"></span>
    </a>
    <a class="link" href="" target="_blank">Sn-TopAuto.com 
        <span class="glyphicon glyphicon-resize-full"></span>
    </a>
</div>
<div class="dropdown navbar-left">
  <button class="btn btn-danger btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-top:3px;margin-left:20px;"><span class="glyphicon glyphicon-plus"></span> Ajouter <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="{{ url('admin/article/ajouter')}}"> Article </a></li>
    <li><a href="{{ url('admin/article/ajouterP')}}">Portrait </a></li>
    <li class="divider"></li>
    <li><a href="{{ url('admin/annonceur/ajout')}}">Utilisateur</a></li>
    <li class="divider"></li>
    <li><a href="{{ url('admin/autotheque/genererCode')}}">Code autothèque</a></li>
    <li class="divider"></li>
    <li><a href="{{ url('admin/annuaire/ajouter')}}">Contact annuaire</a></li>
  </ul>
  </div>

  <div class="dropdown navbar-left">
  <button class="btn btn-warning btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-top:3px;margin-left:20px;">
    <span class="glyphicon glyphicon-list"></span> Afficher <span class="caret"></span>
  </button> 
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="{{ url('admin/annonceur/concessionnaire')}}">Liste des concessionnaires</a></li>
    <li><a href="{{ url('admin/annonce/list')}}">Liste des annonces</a></li>
    <li class="divider"></li>
    <li><a href="{{ url('admin/annuaire/list')}}">Liste des annuaires</a></li>
    <li class="divider"></li>
    <li><a href="{{ url('admin/article/list')}}">Liste des articles</a></li>
  </ul>
  </div>
   <div class="dropdown navbar-left">
  <button class="btn btn-success btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-top:3px;margin-left:20px;">
    <span class="glyphicon glyphicon-edit"></span> Editer page <span class="caret"></span>
  </button> 
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="{{ url('admin/editer/quiSommesNous')}}">Qui sommes-nous ? </a></li>
    <li><a href="{{ url('admin/editer/conditionsGenerale')}}">Conditions générales </a></li>
    <li><a href="{{ url('admin/editer/mentionLegales')}}">Mentions légales</a></li>
    <li><a href="{{ url('admin/editer/planSite')}}">Plan du site </a></li>
    <li><a href="{{ url('admin/editer/vitrinePro')}}">Vitrine Pro</a></li>
    <li><a href="{{ url('admin/editer/FAQ')}}">FAQ</a></li>

    <li class="divider"></li>
    <li><a href="{{ url('admin/editer/autothequeVendeur')}}">Autothèque Vendeur</a></li>
    <li><a href="{{ url('admin/editer/autothequeAcheteur')}}">Autothèque Acheteur</a></li>
    <li><a href="{{ url('admin/editer/autotheque')}}">C'est quoi l'autothèque? </a></li>
  </ul>
  </div>
      <div class="navbar-right">
        <a class="link" href="{{ url('dec.php')}}">Deconnexion</a>
      </div>
</div>
<script type="text/javascript" src="{{ url('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.js')}}"></script>
<script>
$("#menu-toggle").click(function(e) { e.preventDefault(); $("#wrapper").toggleClass("toggled"); });
</script>