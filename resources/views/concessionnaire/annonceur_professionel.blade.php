@extends('site')

@section('title')
    Sn-TopAuto - Detail concessionnaire(Annonceur Professionnel)
@endsection

@section('css')
    <style type="text/css">
        .no-gutter{
            padding: 0;
            padding-bottom:10px; 
            margin-top:0;
        }
        .btn-detail{
            background-color: #900;
            border: solid 3px #900; 
            color:#fff; 
            border-radius:0px; 
            overflow: hidden;
        }
        .btn-detail:hover,.btn-detail:focus{
            background-color: #fff;
            border: solid 1px #900;
            color:#900;
        }
    </style>
@endsection

@section('content')


    @include('assets.search')
    @include('assets.controlPanel')
<ol class="breadcrumb">
    <li> <a href="{{ url('/') }}">Accueil</a> </li>
    <li><a href = "{{ url('acheteur/')}}">Acheteur</a></li>
    <li><a href = "{{ url('concessionnaire/')}}">Concessionnaires_Parkings</a></li>
    <li class="active">{{$concessionnaire->concession}} </li>
</ol>

<div class="panel panel-danger">

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
    <div class='panel-body'>
        <div class="panel-heading" style='background-color:#333;color:#fff;margin-bottom:10px;'>{{$annonceur->pseudo}}</div>
        <div class='row' >
            <div class="col-sm-4">
                <img src="{{ asset('images/conc/'.$concessionnaire->logo)}}" class='img-thumbnail img-responsive' width='100%'>
            </div>
            <div class="col-sm-8 ">
                <table class="table table-condensed table-bordered table-striped">
                    <tr>
                        <th class='text-center'>Nom </th>
                        <td>{{$concessionnaire->concession}}</td>
                    </tr>
                    <tr>
                        <th class='text-center'>Adresse</th>
                        <td ><p>{{$concessionnaire->adresse}}</td>
                    </tr>
                    <tr>
                        <th class='text-center'>Téléphone </th>
                        <td>{{$concessionnaire->telephone}}</td>
                    </tr>
                    <tr>
                        <th class='text-center'>Site Web</th>
                        <td><a href="{{$concessionnaire->site_web}}" target='_blank'>{{$concessionnaire->site_web}}</a></td>
                    </tr>
                    <tr>
                        <th class='text-center'>Marques représentées</th>  
                        <td style="text-transform:uppercase;">
                        <?php $ms=explode(",", $concessionnaire->marque_representee);
                        foreach ($ms as $value){ ?>
                        <span class="label label-success" style="display:inline-block;margin-bottom: 5px;"><?php echo $value; ?></span>
                        <?php } ?> 
                        </td>
                    </tr>
      	  	    </table>
                <div class='row' style='padding-left:15px;padding-right:15px;'>
                    <div class="col-xs-6 no-gutter">
                        <a href="http://pro.sn-topauto.com/{{$concessionnaire->address}}" target='_blank'>
                            <button class="form-control btn btn-sm btn-detail ">
                                <span class="glyphicon glyphicon-link"></span> Voir sa Vitrine 
                            </button>
                        </a>
                    </div>
                    <div class="col-xs-6 no-gutter">
                        <a href="{{$concessionnaire->site_web}}" target='_blank'>
                            <button class="form-control btn btn-sm btn-detail ">
                                <span class="glyphicon glyphicon-link"></span> Voir son Site 
                            </button>
                        </a>
                    </div>
                </div>
      	    </div>
        </div>
    </div>

   <?php $nbreA = count($ances); ?>

    <div class="panel-heading" style='background-color:#333;color:#fff;margin-bottom:10px;'> 
        Annonces du Professionnel  <strong>{{$concessionnaire->concession}} </strong> 
        <span class="label label-default pull-right"><?php echo $nbreA." annonce(s) trouvée(s)"; ?> </span>
    </div>
    <div class="panel-body" id="content">
        @foreach( $ances as $index => $ance )
            @include('annonce.mode.voiture.liste')
        @endforeach
    </div>
   
    <div class="pull-right" id="page-selection">
        <input type="hidden" value="<?php echo $nbreA; ?>" id="nbreA" ></input>
    </div>
</div>

<script type="text/javascript" src="{{ url('js/bootspage.js')}}"></script>
<script>
    $(document).ready(function(){
        function paginate( nbreE ){
        var nbreA = $("#nbreA").val(); 
        var nbreP = Math.ceil( nbreA / nbreE );
        $('#page-selection').bootpag({
        total: nbreP,maxVisible: 10,next: 'Suivant',prev:'Précédent'
        }).on("page", function(event, num){
        var start = (nbreE*num)-(nbreE); var limit= nbreE; 
        var target = "#myPage";var $target = $(target);
        $('html, body').stop().animate({'scrollTop': $target.offset().top }, 600, 'swing', function () {window.location.hash = target; });
        $("#content").append("<div class='container'><div class='row'><div class='animationload'><div class='osahanloading'></div></div></div></div>");
        $.post("../../vue/get_annonce.php",{start: start , limit: limit}
        ).done(function(annonces){ $("#content").html(annonces);
        }).fail(function(){ alert("impossible"); });
        });
    }
    $("#nbreE").change(function () {
        var start = 0; var limit=  $("#nbreE").val(); 
        $.post("../../vue/get_annonce.php",{start: start , limit: limit}
        ).done(function(annonces){ $("#content").html(annonces);
        }).fail(function(){ alert("impossible"); });
        paginate( $("#nbreE").val() ); });
        paginate(15);
    })
</script>    


@endsection