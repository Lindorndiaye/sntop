<?php
    function getDateFin($formule){
        $day = time() + ( $formule * 24 * 60 * 60);
        $date = date('Y-m-d', $day);
        return $date;
    }

    function chaine_aleatoire($date_fin, $chaine = 'AZERTYUIOPQSDFGHJKLMWXCVBN0123456789'){
        $chaine .= intval($date_fin);
        $nb_lettres = strlen($chaine) - 1;
        $generation = '';
        for($i=0; $i < 7; $i++){
            $pos = mt_rand(0, $nb_lettres);
            $car = $chaine[$pos];
            $generation .= $car;
        }
        return $generation;
    }
?>
<div class="row">
    <div class="col-sm-3 text-muted ">
        Code :<hr style="margin: 7px;"> 
        <strong>
            <span class="text-danger"><?php echo $code=chaine_aleatoire( getDateFin($date_fin ) ); ?> </span>
        </strong>
    </div>
    <div class="col-sm-3 text-muted">
        Expiration :<hr style="margin: 7px;">  
        <em>
            <span class="text-danger"><?php echo preg_replace("#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#"," Le $3/$2 $1", getDateFin($date_fin) );  ?></span>
        </em>
    </div>
    <div class="col-sm-3 text-muted">
        Utilisateur :<hr style="margin: 7px;"> 
        <span class="text-danger"> <?php echo strstr($id_ancr, " ");?></span>
    </div>
    <div class="col-sm-3 enrg">
        <form class="form" method="POST" action="{{url('admin/autotheque/getCode')}}">
            {{ csrf_field() }}
            <input name="code" type="hidden" value="<?php echo $code; ?>"></input>
            <input name="date_fin" type="hidden" value="<?php echo getDateFin($date_fin); ?>"></input>
            <input name="id_annonceur" type="hidden" value="<?php echo intval($id_ancr);?>"></input>
            <button type="submit" class="btn btn-xs btn-danger form-control" id="ech" >
                <span class="glyphicon glyphicon-ok"></span> Enregistrer le code
            </button><br>
            <button type="submit" class="btn btn-xs btn-default form-control"> Envoyer par mail </button>
        </form> 
    </div>
</div><hr>
