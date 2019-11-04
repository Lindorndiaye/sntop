@extends('admin.pages.layout')

@section('style')

@endsection

@section('content')

    <section class="content-header">
        <h1>
            Ajout Top Concessionnaire
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Top Concessionnaire</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
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
                    <form id="forma" method="POST" action="{{url('admin/annonceur/TopConcessionnaire')}}" enctype="multipart/form-data">
                        <div class="box-body">
                            {{ csrf_field() }}

                            <div class='form-group'>
                                <label>Concession </label>
                                <input type='text' name='nom' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label>Site Web </label>
                                <input type='text' name='site' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label>Logo </label>
                                <input type='file' name='logo' class='form-control'>
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