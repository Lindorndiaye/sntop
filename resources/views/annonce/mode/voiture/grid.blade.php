@if($ance != null )
<?php 
    $index++;
    if($index%2 == 0) {
        $border_color = '3px solid darkcyan';
    }else{
        $border_color = '3px solid #990000';
    }
    $mrk =  App\Models\Marque::select("title")->Where('id', $ance->id_marque)->first(); 
    $mdl =  App\Models\Modele::select("title")->Where('id', $ance->id_modele)->first(); 
?>
<div class="col-md-4">            
    <div class="thumbnail lien" style='height :250px;padding: 0px;border:<?= $border_color ?>;'>
        <div style='height:140px;vertical-align: middle;overflow:hidden;background-color:#000;'>
            <a href="{{ url('detail-annonce-'.$ance->id)}}">            
                @if($ance->photos_a_v != 'logo.png')
                    <img class="tag" src="{{ asset('images/'.$ance->type_annonce.'.png')}} "> 
                    @if($ance->urgence == 1)
                    <img class='tag_urgent_h' src="{{ asset('images/urgent_h.png')}}" >
                    @endif
                <img src="{{ asset('images/annonce/voiture/'.$ance->photos_principal)}}" width="98%" style="margin:2px;object-fit:contain;" > 
            </a>
        </div>
        @else
        <img src="{{ asset('images/TOP.png')}}" class="img-responsive " width="98%" style="margin:2px;"> </a>
        @endif
        @if($ance->type_annonceur != 'gratuit')
        <img src="{{ asset('images/'.$ance->type_annonceur.'.png')}}" class="pull-right img-respondive" width="78" style="position:relative;margin-top:-15px;  "> 
        @endif
        <div class="caption">
            <h6 align='center'>{{strtoupper($mrk->title." ".$mdl->title)." (".$ance->annee.")"}}</h6>
            <div class="row"> 
                <div class='col-xs-6' style="border-right: solid 2px #333;"> 
                    <p>{{$ance->boite_vitesse}}</p>
                </div> 
                <div class='col-xs-6'> <p>{{$ance->carburant}}</div> 
            </div>
            <div class='row'>
                <div class='col-xs-6' style="border-right: solid 2px #333;"> 
                    <p>{{number_format($ance->kilometrage ,0 , '' , ',')}} Km</p>
                </div>
                <div class='col-xs-6'>
                    <p>
                        <strong class='text-danger'>{{number_format($ance->prix, 0 , '', ' ')}} F.CFA </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
