<!DOCTYPE >
    <html lang="fr">
        <head>
            <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Administration Sn-TopAuto</title>
            <style rel="stylesheet">
                body{background-color:#850606;padding-top: 40px;padding-bottom: 40px;color:#fff;}
                .form-signin {max-width: 330px;padding: 15px;margin: 0 auto;}
                .form-signin .form-control {
                        position: relative;height: auto;-webkit-box-sizing: border-box;
                        -moz-box-sizing: border-box;box-sizing: border-box;padding: 10px;font-size: 16px;}
                .form-signin .form-control:focus {z-index: 2;}
                .form-signin input[type="text"] {margin-bottom: -1px;border-bottom-right-radius: 0;border-bottom-left-radius: 0;}.form-signin input[type="password"] {margin-bottom: 10px;border-top-left-radius: 0;border-top-right-radius: 0;}.container .form-signin .row center h3 {
                    font-family: Constantia, Lucida Bright, DejaVu Serif, Georgia, serif;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <form class="form-signin" action="{{ url('/admin')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row" style="margin-bottom:20px">
                        <center>
                            <img src="{{ asset('images/auto.png')}}" class="img-thumbnail " width="350">
                            <h3 style="color:#fff;"><strong>ADMINISTRATION SN-TOP AUTO</strong></h3>
                        </center>
                    </div>
                    <label for="login" class="sr-only">Identifiant</label>
                    <input type="text" name="pseudo" id="login" value="" class="form-control" placeholder="Pseudo" required autofocus>
                    <label for="password" class="sr-only">Mot de passe </label>
                    <input type="password" name="motpasse" id="pswrd" class="form-control" placeholder="Mot de passe" required>
                    <button class="btn btn-lm btn-default btn-block" name="connection" type="submit"> 
                        <span class="glyphicon glyphicon-wrench"></span> Connection 
                    </button>
                </form>
            </div>

            <footer style="text-align:right;color: #fff;padding: 10px" class="navbar-fixed-bottom">
                <span class="glyphicon glyphicon-copyright-mark"></span> Designed by MastCorp
            </footer>

            <script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
            <script type="text/javascript" src="{{ asset('js/bootstrap.js')}}"></script>
        </body>
    </html>
