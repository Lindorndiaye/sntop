<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!-->
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
        <!--<![endif]-->
        <head>
            <!-- Basic Page Needs -->
            <meta charset="utf-8">
            <!--[if IE]>
            <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
            <![endif]-->
            <title>OCP</title>
            <!-- Bootstrap  -->
            <link rel="stylesheet" type="text/css" rel="stylesheets" href="{{asset('css/bootstrap.css')}}">
            <!-- Theme Style -->
            <link rel="stylesheet" type="text/css" rel="stylesheets" href="{{asset('css/formu.css')}}">
            <link href="stylesheets/magic-check.css" rel="stylesheet">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assetss/ico/apple-touch-icon-144-precomposed.png')}}">

        <!-- CSS Global -->
       
        </head>
        <body style="margin:0; font-family: Montserrat,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji";>
           
        <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav" style="padding-top:20px; background-color:white;">
    <div class="container" style="width:960px; margin:auto">
    <div style="font-size:25px; padding-top:5px; padding-bottom:25px;" class="logo-title  wow fadeInUp" data-wow-delay="0.8s" > <a href="/"><a href="/"> <img src="{{asset('/img/Logo_OIF.jpg')}}" alt="" style="width:120px;"> </a><span style="font-size:25px; color:green;" class="fa  fa-calendar"></span> </a> </div>                                
     
     
    </div>
  </nav>
        
        <div class="container" style="width:960px; margin:auto; ">
        <h6> @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif</h6>
            <h1 class="bg-info text-white text-center p-2 fixed-top"></h1>
            <main class="content" role="content" style="margin-top:-70px;">
                <section id="section1">
                    <div class="container-fluid col-md-6 col-md-offset-3">
                        <!-- MultiStep Form -->
                        <form id="regForm" method="post" action="{{route('entreprise.ajouter')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h1>Formulaire pour la candidature des professeurs</h1>
                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                <div class="titre">Prénom:</div>
                                <p><input placeholder="Prénom" oninput="this.className = ''" name="prenom" required></p>
                                <div class="titre">Nom:</div>
                                <p><input placeholder="Nom" oninput="this.className = ''" name="nom" required></p>
                                <div class="titre">Age:</div>
                                <p><input placeholder="Age" oninput="this.className = ''" name="age" required></p>
                                <div class="titre">Téléphone:</div>
                                <p><input placeholder="téléphone" oninput="this.className = ''" name="mobile" required></p>
                                <div class="titre">Email:</div>
                                <p><input type="email" placeholder="exemple@...." oninput="this.className = ''" name="email" required></p>
                                <p>
                                <div class="titre">Région:</div>
                                    <select name="region" required>
                                        <option selected>--Selectionner région--: </option>
                                        <option >Dakar</option> 
                                        <option >Thies</option>  
                                        <option >Louga</option> 
                                        <option >Saint-louis</option>  
                                        <option >Fatick</option>
                                        <option >Kaolack</option>
                                        <option >Ziguinchor</option>

                                    </select>
                                </p>

                                <p>
                                <div class="titre">Ville:</div>
                                    <select name="ville" required>
                                        <option selected>--Selectionner ville--: </option>
                                        <option id="dakar">Dakar</option>
                                        <option id="thies">Thies</option>  
                                        <option id="louga">Louga</option> 
                                        <option id="saint-l">Saint-louis</option>  
                                        <option id="fatick">Fatick</option>
                                        <option id="kaolack">Kaolack</option>
                                        <option id="zig">Ziguinchor</option>
                                    </select>   
                                        <p id="dak">Guediawaye, Pikine, Parcelle, Rufisque, Dakar</p>
                                        <p id="thie">keur cheikh, angle laobé, mbour</p>
                                        <p id="loug">louga, niambour, keur mor</p>
                                        <p id="saint">ndar, rue 18, keur ndiaye</p>
                                        <p id="fatik">sine, koumpentoum, bourou</p>
                                        <p id="kaol">saloum, ndiobene, galobe</p>
                                        <p id="zi">casamance, sediou, wilingara</p>

                                </p>

                                <p>
                                <div class="titre">Renseigner votre derniere Diplôme:</div>
                                    <select name="deniere_diplome" required>
                                        <option selected>--Selectionner votre derniere Diplôme--: </option>
                                        <option>CAEM</option> 
                                        <option>CAES</option>  
                                        <option>Doctorat</option>

                                    </select>
                                </p>

                                <div class="titre"> <label>Combien d année d expérience:</label></div>
                                <p><input placeholder="année d expérience" oninput="this.className = ''" name="année_exper" required></p>

                                

                                <div class="titre">Avez-vous une expérience en FOS, FLE, Français professionel: Oui ou Non</div>
                                <p>
                                <div class="radio">
                                   <input style="width: auto; margin-bottom: 15px;" type="radio" name="experience" class="check" value="Oui">Oui <br>
                                    <input style="width: auto; margin-bottom: 15px;" type="radio" name="experience" value="Non">Non<br>
                                   
                                </div>
                                </p>
                                <div class="titre"> <label>Numéro de la carte d identité national:</label></div>
                                <p><input type="number" placeholder="Numéro de la carte d identité national" oninput="this.className = ''" name="num_cni" required></p>
                                
                                <div class="titre"> <label>Votre CV en PDF:</label></div>
                                <p><input type="file" oninput="this.className = ''" name="cv_file" required></p>

                                <hr>


                            </div>
  
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="submit" >S'inscrir</button>
                                </div>
                            </div>
                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                                
                          </div>

                        </form>
                        <!-- /.MultiStep Form -->
                    </div>
                </section>
            </main>
            <!-- /content -->
            <!-- alerts are for fun of it -->
            <div class="alerts-container">
                <div class="row">
                    <div id="timed-alert" class="alert alert-info animated tada" role="alert">
                        <span id="time"></span>
                    </div>
                </div>
                <div class="row">
                    <div id="click-alert" class="alert alert-warning" role="alert">
                    </div>
                </div>
            </div>
            </div>
            <script src="{{asset('js/formu.js')}}"></script>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142287871-1"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-142287871-1');
            </script>

            <script>
    $('#dak').hide();
    $('#thie').hide();
    $('#loug').hide();
    $('#saint').hide();
    $('#fatik').hide();
    $('#kaol').hide();
    $('#zi').hide();

$('#dakar').click(function(){
        $('#dak').show();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').hide();
        });
$('#thies').click(function(){
        $('#dak').hide();
        $('#thie').show();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').hide();
});
$('#louga').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').show();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').hide();
});
$('#saint-l').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').show();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').hide();
});
$('#fatick').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').show();
        $('#kaol').hide();
        $('#zi').hide();
});
$('#kaolack').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').show();
        $('#zi').hide();
});
$('#zig').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').show();
});

</script>

            
        </body>
    </html>

	
	
	
