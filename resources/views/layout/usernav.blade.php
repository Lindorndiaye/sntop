@if(Session::has('annonceur'))
  <?php 
    $annonceur = Session::get('annonceur'); 
    $nbnvm = App\Models\Messagerie::where('id_destinataire', $annonceur['id'])->where('statut', 0)->count();
  ?>
  @if($annonceur->type_cmpte == "professionnel")
    <?php 
      $prof = App\Models\Professionnel::where('id_annonceur', $annonceur['id'])->first();
    ?>
    @if($prof)
    <div class='thumbnail' align='center'>
      <img src="{{ asset('images/conc/'.$prof->logo)}}" class='img-thumbnail' height='100%' >
      <div class='text-center'>{{strtoupper($prof->concession)}} </div>
    </div>
    @endif
  @else
    <h5 align="" style="margin: 2px;margin-bottom:20px;">      
      <span class="glyphicon glyphicon-user"></span>
      {{ strtoupper($annonceur->prenom) }} {{ strtoupper($annonceur->nom) }}
    </h5>
  @endif

  <ul class="nav nav-pills nav-stacked ">
    <li class="{{ $ge or ''  }}"> <a href="{{ url('gerer/annonces')}}"><span class="glyphicon glyphicon-th-list"></span> Mes Annonces</a> </li>
     <li class="{{ $pb or ''  }}"> <a href="{{ url('publier/annonce')}}"><span class="glyphicon glyphicon-plus"></span> Nouvelle Annonce</a></li>
     <li class="{{ $ge or ''  }}"> <a href="{{ url('/my/boutiques')}}"><span class="glyphicon glyphicon-th-list"></span> Mes Boutiques</a> </li>
     <li class="{{ $pb or ''  }}"> <a href="{{ url('creer/boutique')}}"><span class="glyphicon glyphicon-plus"></span> Nouvelle Boutique</a></li>
     <li class="{{ $me or ''  }}"> <a href="{{ url('messagerie/')}}"><span class="glyphicon glyphicon-envelope"></span> Mes Messages<span class="badge pull-right">{{$nbnvm}} </span></a></li>
     <li class="{{ $gc or ''  }}"> <a href="{{ url('gerer/compte')}}"><span class="glyphicon glyphicon-cog"></span> Mon Compte</a> </li>
     <li class="{{ $dec or ''  }}"> <a href="{{ url('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a> </li>
  </ul>
@else  
  <a href="{{ url('connexion/')}}">
  <button class="btn btn-sm form-control btn-danger"> Connectez-vous </button></a>
@endif
<div style="margin-top:20px;"> 

</div>