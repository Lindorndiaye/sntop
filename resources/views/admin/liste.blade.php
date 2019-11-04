@extends('admin.pages.layout')


@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
<style type="text/css">
  .btn-urgent{ background-color:#5B0D61;color:#FFDFB0; }
  .btn-urgent:hover{ background-color:#5B0D61;color:#fff; }
</style>

<style type="text/css">.gold{color: #fc6;}.prestige{color: blue;} ul.nav-pills li a {font-size:18px; }.btn-sm{padding: 2px;font-size:15px;}</style>
<link href="{{ url('css/simple-sidebar.css')}}" rel="stylesheet">
<div id="page-content-wrapper">
  <div class="container-fluid">
    <div class="row" style="background-color:#ccc;">
        <h3 class="text-danger text-center">Liste des annonces </h3> 
    </div>
    <div class="row">
      <div id="alert" ></div>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered table-condensed" >
        <thead><th>N° ID </th><th><th>Véhicule</th><th>Date</th><th>Prix</th><th>Carburant</th><th>Annonceur</th><th>Type</th><th>Action</th></thead>
        <tbody>
          @foreach ($annonces as $annonce => $ance)
            <?php 
              $ancr = App\Models\Annonceur::select('pseudo')->where('id', $ance->id_annonceur)->first(); 
              $mrk = App\Models\Marque::select('title')->where('id', $ance->id_marque)->first(); 
              $mdl = App\Models\Modele::select('title')->where('id', $ance->id_modele)->first();
            ?>
            <tr class="text-muted" id="{{$ance->id}}">
              <td>{{$ance->id}}</td>
              <td align="center"><span class="glyphicon glyphicon-star {{$ance->type_annonceur}}" ></span></td>
              <td>{{$mrk->title." ".$mdl->title." (".$ance->annee.")"}}</td>
              <td>{{$ance->date}}</td>
              <td align="right">{{(number_format($ance->prix, 0 , '', ','))}}</td>
              <td>{{$ance->carburant}}</td>
              <td>{{$ancr->pseudo}}</td>
              <td>{{$ance->type_annonce}}</td>
              <td align="center">
                <button class="btn btn-sm btn-danger supprimer" data-toggle="tooltip" title="Supprimer" ><span class="glyphicon glyphicon-trash" ></span></button>
                <?php if ($ance->type_annonceur !="gold"): ?>
                  <button class="btn btn-sm btn-warning set_gold" data-toggle="tooltip" title="Ajouter aux Gold" ><span class="glyphicon glyphicon-star"></span></button>
                <?php else: ?>
                  <button class="btn btn-sm btn-warning rem" data-toggle="tooltip" title="Enlever des Gold" ><span class="glyphicon glyphicon-star-empty"></span></button>
                <?php endif ?> 
                <?php if ($ance->type_annonceur !="prestige"): ?>
                  <button class="btn btn-sm btn-primary set_prestige" data-toggle="tooltip" title="Ajouter aux Prestige" ><span class="glyphicon glyphicon-star"></span></button>
                <?php else: ?>
                  <button class="btn btn-sm btn-primary rem" data-toggle="tooltip" title="Enlever des Prestige" ><span class="glyphicon glyphicon-star-empty"></span></button>
                <?php endif ?> 
                <?php if ($ance->urgence == 0): ?>
                  <button class="btn btn-sm btn-urgent set_urgent" data-toggle="tooltip" title="Epingler le tag Urgent" ><span class="glyphicon glyphicon-star"></span></button>
                <?php else: ?>
                  <button class="btn btn-sm btn-urgent rem_urgent" data-toggle="tooltip" title="Détacher le tag Urgent" ><span class="glyphicon glyphicon-star-empty"></span></button>
                <?php endif ?> 
                <button class="btn btn-sm btn-default detail" data-toggle="tooltip" title="Détails du Véhicule" ><span class="glyphicon glyphicon-eye-open"></span></button>
              </td> 
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

  <script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/dt.js')}}"></script> 
  <script type="text/javascript">
$(document).ready( function(){

  function alerter( id , data){
      $("#"+id).html("<td><td><td>Ligne modifiée <td><td><td><td><td><td>").fadeIn();
      $(".gear").fadeOut();
      $("#alert").append(data);
      $(".alert").fadeTo(4000, 500).slideUp(1000, function(){ $(this).remove();  }); 
  };
  $('table').on('click', '.supprimer', function(){
  	 var id = $(this).parents("tr").attr("id");
     var r = confirm("Voulez-vous vraiment supprimer cette annonce?");
     if (r == true) {
       var del= $.post( "../../vue/admin/traitement.php", { action: "supprimer" , id: id  });
        del.done(function( data ){ 
        alerter(id , data);
       });
        del.fail(function() { alert( "error" ); })  
      } else { return false; }
  });
  $('table').on('click', '.detail', function(){
    var id = $(this).parents("tr").attr("id");
    var del= $.post( "../../vue/admin/traitement.php", { action: "detail" , id: id  });
    del.done(function( data ){
      $("#page-content-wrapper").html(data); 
     });
    del.fail(function() {
       alert( "error" );
     })
  });
/*  $(".detail").click(function(){     }); */
   $('table').on('click', '.set_gold', function(){
    var id = $(this).parents("tr").attr("id");
    var r = confirm("L'annonce va être ajoutée aux Gold");
     if (r == true) {
    $("#alert").append("<img src='{{ asset('images/gears.gif')}}' class='gear' > "); 
    var del= $.post( "../../vue/admin/traitement.php", { action: "addToGold" , id: id  });
    del.done(function( data ){
     alerter(id , data);
     });
    del.fail(function() { alert( "error" ); })  
    } else { return false; }
  }); 
   $('table').on('click', '.set_prestige', function(){
    var id = $(this).parents("tr").attr("id");
    var r = confirm("L'annonce va être ajoutée aux Prestige");
     if (r == true) {
    $("#alert").append("<img src='{{ asset('images/gears.gif')}}' class='gear' > "); 
    var del= $.post( "../../vue/admin/traitement.php", { action: "addToPrestige" , id: id  });
    del.done(function( data ){
      alerter(id , data);
    });
    del.fail(function() { alert( "error" ); })  
    } else { return false; }
  });
   $('table').on('click', '.rem', function(){
    
    var id = $(this).parents("tr").attr("id");
    var r = confirm("L'annonce va devenir une annonce Simple");
     if (r == true) {
    $("#alert").append("<img src='{{ asset('images/gears.gif')}}' class='gear' > ");   
    var del= $.post( "../../vue/admin/traitement.php", { action: "addToGratuit" , id: id  });
    del.done(function( data ){ 
      alerter(id , data);
       });
    del.fail(function() { alert( "error" ); })  
    } else { return false; }
  });
  $('table').on('click', '.set_urgent', function(){
    var id = $(this).parents("tr").attr("id");
    var r = confirm("Voulez-vous épingler le tag URGENT sur l'annonce ?");
    if (r == true) {
    $("#alert").append("<img src='{{ asset('images/gears.gif')}}' class='gear' > ");   
    var del= $.post( "../../vue/admin/traitement.php", { action: "addUrgent" , id: id  });
    del.done(function( data ){
      alerter(id , data);
    });
    del.fail(function() { alert( "error" ); })  
    } else { return false; }
  });   
   $('table').on('click', '.rem_urgent', function(){
    var id = $(this).parents("tr").attr("id");
    var r = confirm("Le tag Urgent va être détaché de l'annonce");
     if (r == true) {
    $("#alert").append("<img src='{{ asset('images/gears.gif')}}' class='gear' > ");   
    var del= $.post( "../../vue/admin/traitement.php", { action: "supprimerUrgent" , id: id  });
    del.done(function( data ){ 
      alerter(id , data);
    });
    del.fail(function() {  alert( "error" ); })  
    } else { return false; }
  }); 
   $('[data-toggle="tooltip"]').tooltip();    
 });
</script>



@endsection