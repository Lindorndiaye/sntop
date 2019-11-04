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
            Liste des annonceurs 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Liste Annonces</li>
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
                          <th>Pseudo</th> 
                          <th>Téléphone</th> 
                          <th>Email</th> 
                          <th>Date Inscription</th> 
                          <th>Dernière Connexion</th>
                          <th>Action</th> 
                        </thead>
                        <tbody>
                            @foreach ($annonceurs as $annonceur => $ance)
                              <tr class="text-muted" id="{{$ance->id}}">
                                <td>{{$ance->id}}</td>
                                <td><strong>{{$ance->pseudo}}</strong></td>
                                <td>{{$ance->telephone}}</td>
                                <td>{{$ance->email}}</td>
                                <td>{{preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9:]+)$#"," $3-$2 $1 à $4", $ance->date_adhesion )}}</td>
                                <td>{{preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9:]+)$#"," $3-$2 $1 à $4", $ance->dernier_conn )}}</td>
                                <td align="center">
                                  @if( $ance->statut == 0 )
                                    <button class="btn btn-success btn-sm debloquer" data-toggle="tooltip" title='activer cet annonceur '><span class="glyphicon glyphicon-ok" ></span></button>
                                  @else
                                    <button class="btn btn-default btn-sm bloquer" data-toggle="tooltip" title='bloquer cet annonceur'><span class="glyphicon glyphicon-remove" ></span></button>
                                  @endif
                                  <button class="btn btn-danger btn-sm supprimer"  data-toggle="tooltip" title='editer ce professionnel'><span class="glyphicon glyphicon-trash" ></span></button> 
                                  @if($ance->type_cmpte === "professionnel"): ?>
                                    <a href="{{ url('admin/vitrinePro/'.$ance->id)}}">
                                      <button class="btn btn-info btn-sm " data-toggle="tooltip" title="Paramètres de la vitrine Pro"><span class="glyphicon glyphicon-pencil"></span></button>
                                    </a> 
                                  @endif
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