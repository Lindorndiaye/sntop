@extends('admin.pages.layout')


@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('css/admin/select2.min.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('css/admin/iCheck/all.css')}}">
  
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ajoutez une marque ou un modèle
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Marque et Modèle</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form class="form-horizontal" method="post" action="{{ url('/admin/marque/new_marque')}}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('categorie') ? 'has-error' : '' }}">
                            <label class="col-sm-4 control-label">Catégorie</label>
                            <div class="col-sm-8">
                                <label class="col-sm-5">
                                    <input type="radio" id="categauto" name="categorie" value="auto" class="flat-red" onClick="getMarques('auto')">
                                    Auto
                                </label>
                                <label class="col-sm-5">
                                    <input type="radio" id="categmoto" name="categorie" value="moto" class="flat-red" onClick="getMarques('moto')">
                                    Moto
                                </label>
                                <span class="text-danger">{{ $errors->first('categorie') }}</span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('new_marque') ? 'has-error' : '' }}">
                            <label for="inputNvlMarque" class="col-sm-4 control-label">Nouvelle Marque</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="new_marque" id="new_marque" value="{{ old('new_marque') }}" placeholder="Nouvelle marque">
                                <span class="text-danger">{{ $errors->first('new_marque') }}</span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Enregistrer</button>
                        </div>
                    </form>
                    <hr>
                    <form class="form-horizontal" method="post" action="{{ url('/admin/marque/new_modele')}}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('marque') ? 'has-error' : '' }}">
                            <label class="col-sm-4 control-label">Marque</label>

                            <div class="col-sm-8">
                                <select class="form-control select2" name="marque" style="width: 100%;" id="marque" required>
                                    <option selected="selected"> -- Sélectionnez -- </option>
                                </select>
                                <span class="text-danger">{{ $errors->first('marque') }}</span>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group{{ $errors->has('modele') ? 'has-error' : '' }}">
                            <label class="col-sm-4 control-label">Modèle</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="modele" style="width: 100%;" name="modele" id="modele">
                                    <option selected="selected"> -- Sélectionnez -- </option>
                                </select>
                                <span class="text-danger">{{ $errors->first('modele') }}</span>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('new_modele') ? 'has-error' : '' }}">
                            <label for="inputNvlMarque" class="col-sm-4 control-label">Nouveau Modèle</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="new_modele" id="new_modele" placeholder="Nouvelle Modele">
                                <span class="text-danger">{{ $errors->first('new_modele') }}</span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-left">Enregistrer</button>
                        </div>
                        <!-- /.form-group -->
                        <!-- /.col -->
                    </form>
                </div>
            </div>
            <!-- /.box -->
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
    })

    //Flat red color scheme for iCheck
    
    //getmarque by categorie
    function getMarques(type){
        $("#marque").html('<option value="">--Selectionner--</option>');
        $("#modele").html('<option value="">--Selectionner--</option>');
        <?php $url = url('/get_marque') ?>
        $.ajax({
            url: "<?= $url?>/"+type,
            data: {
                type: type
            },
            dataType: 'html',
            type: 'get',
            success: function (data) {
                $("#marque").html(data);
            }
        })
    };

    //get moodele by marque
    $("#marque").on('change', function() {
        var id = $("#marque").val();
        <?php $url = url('/get_modele') ?>
        $.ajax({
            url: "<?= $url?>/"+id,
            data: {
                id: id
            },
            dataType: 'html',
            type: 'get',
            success: function (data) {
                $("#modele").html(data);
            }
        })
    });
</script>

@endsection