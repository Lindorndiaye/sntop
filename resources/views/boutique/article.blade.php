@extends('site')
@section('content')


<link rel="stylesheet" href="https://www.sn-topauto.com/css/annuaire.css">
<ol class="breadcrumb">
    <li> <a href="https://www.sn-topauto.com/">Accueil</a> </li>
    <li> <a href="https://www.sn-topauto.com/annuaire/">Annuaire</a></li>
    <li> <a href="https://www.sn-topauto.com/boutique/">Boutique</a></li>
    <li class='active'>Ajouter Article</li>
</ol>


<div class="panel panel-danger " >
    <div class="panel-heading" style="background-color:#900;margin-top:0;color:#fff;">
        <strong>Ajouter un article dans votre Boutique </strong></div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
        <div class="panel-body">
            <form action="{{url('boutique/ajouter_article')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id_boutique" value="{{$id_boutique}}">
                <div class="row form-group">
                    <div class="col-sm-3 col-sm-offset-1"><label>Nom de l'Article :</label></div>
                    <div class="col-sm-7">
                        <input type="text" class="input-sm form-control" name="nom_article" placeholder="Nom de l'article " required >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3 col-sm-offset-1"><label>Description de l'Article :</label></div>
                    <div class="col-sm-7">
                        <textarea name="description_article" id="" class="form-control input-sm" rows="10" placeholder="Description ... "></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3 col-sm-offset-1"><label>Prix :</label></div>
                    <div class="col-sm-7">
                        <input type="text" class="input-sm form-control" name="prix_article" placeholder="Prix de l'article " required >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3 col-sm-offset-1"><label>Ajoutez une image :</label></div>
                    <div class="col-sm-7">
                        <input type="file" name="photo_article" class="form-control" >
                    </div>
                </div>
            <div class="row form-group">
                <div class="col-sm-4 col-sm-offset-4">
                    <button type="submit" name="enrg" class="btn btn-danger form-control"><strong>Enregistrer</strong></button>
                </div>
            </div>
          </form>
      </div>
    </div>

@endsection