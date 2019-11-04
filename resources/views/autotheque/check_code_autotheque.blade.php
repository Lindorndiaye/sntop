@extends('site')

@section('title')
Sn-TopAuto.com - Autothèque consultation
@endsection

@section('css')

@endsection

@section('content')
<script type="text/javascript" src="{{ url('js/index.js')}}"></script>
<ol class = "breadcrumb">
   <li><a href = "{{ url('/')}}">Accueil</a></li>
   <li><a href = "{{ url('/autotheque')}}">autothèque</a></li>
   <li class="active">Consultation</li>
</ol> 

@include('assets.controlPanel')

<div class="panel panel-heading" style="background-color:#900;color:#fff;">
	<strong> CONSULTATION AUTOTHEQUE </strong>
</div>
<?php
            foreach ($t_aut as $aut => $v_aut) { 
                $mrk =  App\Models\Marque::select("title")->Where('id', $v_aut->id_marque)->first(); 
                $mdl =  App\Models\Modele::select("title")->Where('id', $v_aut->id_modele)->first(); 
            ?>
                <div class="panel panel-danger" style="margin-bottom:10px;">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
                    <div class="panel-body">
                        <div class="col-sm-6 text-muted ">
                            <span class="glyphicon glyphicon-user"></span><strong> <?php echo strtoupper($v_aut->prenom)." ".strtoupper($v_aut->nom); ?></strong><br>
                            <span class="glyphicon glyphicon-phone"></span> Tél : <?php echo $v_aut->tel;?><br>
                            <span class="glyphicon glyphicon-envelope"></span> Email : <?php echo $v_aut->email; ?>
                        </div>
                        <div class="col-sm-6 text-muted" align="right">
                            Véhicule Recherché:<span class="text-danger"> <?php echo strtoupper($mrk)." ".strtoupper($mdl); ?>
                            </span><br><span class="text-success" ><?php if ( $v_aut->type == "location" ) echo 'LOCATION'; else echo "en ".strtoupper($v_aut->type); ?></span><br>
                            <small class="text-muted">Posté le : <?php echo preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#"," $3/$2 $1", $v_aut->date_pub); ?> </small>
                        </div>
                    </div>

                    <hr style="margin-top:2px;margin-bottom: 5px;">
                    <p style="margin-left:30px;margin-left:20px;"><?php echo $v_aut->description;?>  </p>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-4 text-danger">
                                Budget : <?php echo number_format($v_aut->budget, 0 , '', ' ') ?> F.CFA<br>
                                <span class="text-muted">Année : Entre <strong><?php echo $v_aut->annee_depart; ?></strong> et <strong><?php echo $v_aut['annee_fin']  ?> </strong></span>
                            </div>
                            <div class="col-sm-4">
                                Transmission :<strong class="text-success"> <?php echo $v_aut->transmission;?></strong><br>
                                Carburant : <strong class="text-success" > <?php echo $v_aut->carburant;?></strong>
                            </div>
                            <div class="col-sm-4" align="center">
                                Prévision d'achat :<br>
                                dans<strong class="text-success"> <?php echo $v_aut->prevision_achat;?></strong>
                            </div>	
                        </div>
                    </div>
                </div>
     <?php	} //Fin annonce authotheque
       ?>
@endsection