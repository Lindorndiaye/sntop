@extends('site')

@section('title')
Sn-TopAuto | Site d'actualités et de petites annonces auto-moto au Sénégal
@endsection

@section('css')
<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/index.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css')}}">
<link  href="{{ asset('css/annonce-detail.css')}}" rel="stylesheet" type="text/css" >
@endsection

@section('content')
<script>
    window.fbAsyncInit = function() {
        FB.init({
        appId      : '273212813113411',
        xfbml      : true,
        version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.10';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


@include('assets.search')
@include('assets.controlPanel')

<ol class = "breadcrumb">
   <li><a href = "{{ asset('/')}}">Accueil</a></li>
   <li><a href = "{{ asset('acheteur/')}}">Acheteur</a></li>
   <li><a href = "{{ asset('annonce/voiture')}}">Annonce auto</a></li>
   <li class="active"><?php echo $marque->title." ".$modele->title; ?></li>
</ol>

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
<div class="" style="margin-bottom:0;">
    <div class="panel panel-danger" style="margin-bottom:0;">
        <div class="panel-heading" style="background-color:#900;color:white;padding-left:10px;overflow:hidden;">
            <strong> <?php echo strtoupper($marque->title." ".$modele->title ." (".$annonce->annee).")";   ?></strong>
            <?php if($annonce->type_annonceur != "gratuit"): ?>
                <img src="<?php echo "images/".$annonce->type_annonceur.".png";?>" width="102" class="pull-right">
            <?php endif ?> 
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <p> <span class="glyphicon glyphicon-map-marker"></span> <?php echo $annonce->zone; ?> </p> 
                    <div class="thumbnail"> 
                        <?php if($annonce->photos_principal == "logo.png"){
                            echo "<img src='{{ asset('images/TOP.png')}}' class='img-responsive'> " ;
                        }else{ ?>
                            <img class="tag" src="<?php echo 'images/'.$annonce->type_annonce.'.png'; ?> "> 
                            <img src="{{ asset('images/annonce/voiture/'.$annonce->photos_principal)}}" class="img-pp img-responsive" width="98%" height="98%"  style="margin:2px;cursor: pointer;">
                        <?php } ?>
                    </div> 
                    <div class="prix_a"> 
                        <h4> <?php echo (number_format($annonce->prix, 0 , '', ' ')); ?> F. CFA</h4> 
                    </div>
                </div>
                <div class="col-md-6 fixe">
                    <?php if($annonce['photos_v'] != "logo.png" or $annonce['photos_v'] == "" ): ?>
                    <?php  $annonce_v=explode(";" ,$annonce->photos_v); 
                        foreach($annonce_v as $tof){ ?>
                        <img src="<?php echo "annonce/".$annonce->id_v."/".$tof; ?> " class="img-thumbnail img-responsive" width="100">
                    <?php  } ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-danger" style="margin-top:10px;border-color:#900;margin-bottom:10px;">
                <div class="blockquote-box blockquote-danger clearfix">
                    <div class="square pull-left">
                        <img src="{{ asset('images/voitures/'.$annonce->categorie.'.png')}}" alt="" class="img-responsive"  style="opacity:0.9;" />
                    </div>
                    <div style="height:100px;overflow:scroll;">
                        <h5 class="text-muted"><strong><u>DESCRIPTION</u></strong></h5>
                        <p class="text-muted"> <?php echo $annonce->description?> </p>
                    </div>
                </div> 
            </div>
            <div>
                <div class="col-xs-4 no-gutter">
                    <button class="form-control btn btn-sm btn-detail afficheNum"> <strong>Afficher le Numéro</strong></button>
                </div>
                <div class="col-xs-4 no-gutter">
                    <button class="form-control btn btn-sm btn-detail message"> <strong>Envoyer un Message</strong></button>
                </div>
                <div class="col-xs-4 no-gutter">
                    <button class="form-control btn btn-sm btn-detail partager"> <strong>Recommander ce Véhicule</strong></button>
                </div>
            </div>
            <div >
                <table class="table table-bordered" style="margin-bottom:10px;">
                    <tr>
                        <td class="text-muted color visible-xs">Marque / Modèle</td>
                        <td class="text-muted color hidden-xs">Marque</td>
                        <td class="text-muted" ><?php echo $marque->title;?> </td>
                        <td class="text-muted color hidden-xs">Modèle</td>
                        <td class="text-muted"><?php echo $modele->title;?> </td>
                    </tr>
                    <tr>
                        <td class="text-muted color visible-xs">Année / Kilométrage</td>
                        <td class="text-muted color hidden-xs">Année</td>
                        <td class="text-muted" ><?php echo $annonce->annee;?> </td>
                        <td class="text-muted color hidden-xs">Kilométrage</td>
                        <td class="text-muted"><?php echo number_format($annonce->kilometrage , 0,'' ,' ')." KM";?> </td>
                    </tr>
                    <tr>
                        <td class="text-muted color visible-xs">Transmission / Energie</td>
                        <td class="text-muted color hidden-xs">Transmission</td>
                        <td class="text-muted"><?php echo $annonce->transmission;?> </td>
                        <td class="text-muted color hidden-xs">Energie</td>
                        <td class="text-muted"><?php echo $annonce->carburant;?> </td>
                    </tr>
                    <tr>
                        <td class="text-muted color visible-xs">Cylindrée / Couleur</td>
                        <td class="text-muted color hidden-xs">Nombre cylindre</td>
                        <td class="text-muted"><?php echo $annonce->cylindree;?> </td>
                        <td class="text-muted color hidden-xs">Couleur</td>
                        <td class="text-muted"><?php echo $annonce->couleur;?> </td>
                    </tr>
                </table>
            </div>
            <div class="panel panel-danger" style="margin-bottom:10px;">
                <div class="panel panel-heading" style="background-color:#900;color:#fff;font-size:16px;padding-left:10px;"> 
                    <strong>Equipements du Véhicule</strong>
                </div>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>  
                <div class="panel-body">
                    <?php if($annonce->carrosserie != "" ): ?>
                        <div class="row">
                            <div class="col-xs-3 col-md-2"> 
                                <strong>Carrosserie : </strong>
                            </div>
                            <div class="col-xs-9 col-md-10"> 
                                <?php 
                                $Options = explode(";", $annonce->carrosserie) ;
                                foreach ($Options as $opt) { ?>
                                    <span  class="option"> <?php echo $opt; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <hr bgcolor="#000">
                    <?php endif ?>
                    <?php if($annonce->transmissions != "" ): ?>
                        <div class="row">
                            <div class="col-xs-3 col-md-2"> 
                                <strong> Transmission : </strong>
                            </div>
                            <div class="col-xs-9 col-md-10"> 
                                <?php 
                                $Options = explode(";", $annonce->transmissions) ;
                                foreach ($Options as $opt) { ?>
                                    <span  class="option"><?php echo $opt; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <hr> 
                    <?php endif ?>
                    <?php if($annonce->interieur != "" ): ?>
                        <div class="row">
                            <div class="col-xs-3 col-md-2"> 
                                <strong> Intérieur : </strong>
                            </div>
                            <div class="col-xs-9 col-md-10"> 
                                <?php 
                                $Options = explode(";", $annonce->interieur) ;
                                foreach ($Options as $opt) { ?>
                                    <span  class="option"><?php echo $opt; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <hr style='background-color:#333;'>
                    <?php endif ?>
                    <?php if($annonce->exterieur != "" ): ?>
                        <div class="row">
                            <div class="col-xs-3 col-md-2 "> 
                                <strong> Extérieur : </strong>
                            </div>
                            <div class="col-xs-9 col-md-10"> 
                                <?php  
                                $Options = explode(";", $annonce->exterieur) ;
                                foreach ($Options as $opt) { ?>
                                    <span  class="option"><?php echo $opt; ?></span>
                                <?php } ?>
                            </div>
                        </div> 
                        <hr>
                    <?php endif ?>
                    <?php if($annonce->electronique != "" ): ?>
                        <div class="row">
                            <div class="col-xs-3 col-md-2"> 
                                <strong> Electroniques: </strong>
                            </div>
                            <div class="col-xs-9 col-md-10"> 
                                <?php 
                                $Options = explode(";", $annonce->electronique) ;
                                foreach ($Options as $opt) { ?>
                                    <span  class="option"><?php echo $opt; ?></span>
                                <?php } ?>
                            </div>
                        </div> 
                        <hr>
                    <?php endif ?>
                    <?php if($annonce->securite != "" ): ?>
                        <div class="row">
                            <div class="col-xs-3 col-md-2"> 
                                <strong> Options de Sécurité : </strong>
                            </div>
                            <div class="col-xs-9 col-md-10"> 
                                <?php 
                                $Options = explode(";", $annonce->securite) ;
                                foreach ($Options as $opt) { ?>
                                    <span  class="option"><?php echo $opt; ?></span>
                                <?php } ?>
                            </div>
                        </div> 
                    <?php endif ?>

                </div>   <!-- Fin Equipement Vehicule -->                   
      
            </div>
            <div class="row" style='padding: 10px;'>
                <div class="col-sm-8 col-sm-offset-2 "></div>
            </div>
        </div>
    </div>
    @include('assets.modals')
    <div style='background-color:#333;color:#fff;padding:5px;margin-bottom:10px;'>Commentaires Facebook</div>

    <div class='panel panel-danger'> <!-- commentaire facebook -->
        <div class="fb-comments" data-href="https://www.facebook.com/goupal656/" data-numposts="15" data-width="100%" ></div>
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.7";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </div>
    <div class="row">
        <div class="col-md-12" style="padding:30px;padding-top:0px;">
            <div class="panel panel-danger" style="background-color:#900;color:#fff;font-size:16px;padding:10px;">
                <strong>Annonces Similaires</strong>
            </div>
            @if ( count($annonce_similaire) <= 0 )
                <div class="panel panel-danger">
                    <div class="panel-body text-muted">
                        <img src="{{ asset('/images/error_icon.png')}}">
                        <span class="aac"> <strong> Aucune annonce correspondante !</strong></span> 
                    </div>
                </div>
            @else
                @foreach ($annonce_similaire as $value)
                    $id_v=$value['id_v'];
                    $ance=$obj->cherche_rqt("SELECT * FROM annonce_v WHERE id_voiture = '$id_v' ");
                    get_annonce($ance[0] , $address);
                @endforeach
            @endif
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/index.js')}}"></script>
<script type="text/javascript"> 
    $(".img-thumbnail , .img-pp ").click(function(){
        var pic = this.src;
        $("#pp").attr('src', pic);
        $("img").each( function(){ 
            $(this).removeClass("active");
            if ( this.src == pic ){ $(this).addClass("active"); }
        });
        $('#myModal').modal({ backdrop:"true"});
    });

    $(".img-thumbnail").click(function(){
        var pic = this.src;
        $("#pp").attr('src', pic);
        $("img").each( function(){ 
            $(this).removeClass("active");
            if ( this.src == pic ){ $(this).addClass("active"); }
        });
        $('#myModal').modal({ backdrop:"true"});
    });

    $("#next").click(function(){
        var pic = $("img.active").next(".img-thumbnail").attr('src');
        
        if (pic){
            $("img.active").next("img").addClass("activer");
            $("img.active").removeClass("active");$("img.activer").addClass("active").removeClass("activer");
            $("#pp").attr('src' , pic );
        }else{
            var pic= $(".img-slide").first().attr('src');
            $(".img-slide").first().addClass("activer");
            $("img.active").removeClass("active");$("img.activer").addClass("active").removeClass("activer");
            $("#pp").attr('src' , pic );
        }
    });

    $("#prev").click(function(){
        var pic = $("img.active").prev(".img-thumbnail").attr('src');
        if (pic) {
            $("img.active").prev("img").addClass("activer");
            $("img.active").removeClass("active");$("img.activer").addClass("active").removeClass("activer");
            $("#pp").attr('src' , pic );
            scroll_checker();
        }else{
            var pic= $(".img-slide").last().attr('src');
            $(".img-slide").last().addClass("activer");
            $("img.active").removeClass("active");$("img.activer").addClass("active").removeClass("activer");
            $("#pp").attr('src' , pic );
        }
    });

    $(".pp").mouseenter(function(){$(".next").removeClass("hide"),$(".prev").removeClass("hide"); });
    $(".pp").mouseleave(function(){$(".next").addClass("hide"),$(".prev").addClass("hide"); });
    $(".afficheNum").click(function(){ $('#numero').modal({ backdrop:"true"}); });
    $(".partager").click(function(){ $('#partager').modal({ backdrop:"true"}); });
    $(".message").click(function(){ $('#message').modal({ backdrop:"true"}); });
 
    document.getElementById('shareBtn').onclick = function() {
        FB.ui({
            appID: "273212813113411",
            method: 'share',
            display: 'popup',
            href: '"annonce/detail-".$id_ance."-".$id_vtre; ?>',
        }, function(response){});
    }

    function scroll_checker(){
        var p = $(".t_img > img.active").width();
        var containerWidth = $('.t_img').width();
        $(".t_img").animate({scrollLeft:containerWidth-5}, 500);
        console.log(containerWidth);
        console.log(p);
    }
 </script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
    {lang: 'fr'}
</script>
@endsection