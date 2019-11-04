@extends('admin.pages.layout')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('css/admin/select2.min.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('css/admin/iCheck/all.css')}}">
@endsection

@section('content')

    <section class="content-header">
        <h1>
            Génération de code
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
                
                <div class="box box-info">
                    <div id="form" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="firstName">Identifiant du consultant :</label>
                                <div class="col-xs-8">
                                    <select class="form-control select2" name="id_ancr" id="id_ancr" required>
                                        @foreach ($annonceurs as $key => $value)
                                        <option value="{{$value->id}} {{$value->pseudo}}">{{$value->pseudo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="pseudo1">Durée de validité du code :</label>
                                <div class="col-xs-8">
                                    <select name="date_fin" id="date_fin" class="form-control">
                                        <option value="8">Une semaine</option>
                                        <option value="15">Deux semaines</option>
                                        <option value="30">Un mois</option>
                                        <option value="60">Deux mois</option>
                                        <option value="90">Trois mois</option>
                                        <option value="180">Six mois</option>
                                        <option value="365">Un an</option>
                                    </select>
                                </div>
                            </div>

                            <div class="panel-footer" style="text-align: center;">
                                <button id="ajout" onclick="getCode()" class="btn btn-danger" style="font-size: 16px;width: 150px;">
                                    Générer un Code
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box box-danger">
                    <div class="box-header with-border panel panel-danger">
                        <div class="panel-heading" ><h3 class="box-title">Résumé</h3></div>
                    </div>
                    <div class="box-body" id="resume">
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="row">
                        <div class="col-sm-2 text-muted ">
                            Code : <strong><span class="text-danger"><?php echo Session::get('code') ; ?> </span></strong>
                        </div>
                        <div class="col-sm-4 text-muted">
                            Expiration :  <em><span class="text-danger"><?php echo preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#"," Le $3/$2 $1", Session::get('date_fin'));  ?></span></em>
                        </div>
                        <div class="col-sm-3 text-muted">
                            Utilisateur : <span class="text-danger"> <?php echo Session::get('id_annonceur') ;?></span>
                        </div>
                        <div class="col-sm-3 text-success">
                            Enregistré
                        </div>
                    </div><hr>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('js/admin/select2.full.min.js')}}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('css/admin/iCheck/icheck.min.js')}}"></script>

    <script>

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
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

        function getCode(){
            var date_fin =  $("#date_fin").val();
            var id_ancr =  $("#id_ancr").val();

            $.ajax({
                type:'get',
                url:'{{ url('admin/autotheque/getCode') }}/'+date_fin+'/'+id_ancr,
                data:{
                date_fin:date_fin,
                id_ancr:id_ancr
                },
                success:function(response) {
                    $("#resume").html(response);
                }
            });
            return false; //for good measure
        }
    </script>
@endsection