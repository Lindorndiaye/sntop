    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding-bottom:2px;">
                    <span style="background-color:#fff;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="{{ asset('images/fermer.png')}}" height="30">
                        </button>
                    </span>
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="{{ asset('images/TOP.png')}}" width="100%">
                        </div>
                        <div class="pub" style="margin-top:0px;margin-right:10px;height:80px;overflow:hidden;">
                            <?php 
                                $mapub= App\Models\Pub::where('type', 'popup_haut')->where('statut', 1)->orderBy('debut', 'DESC')->limit(1)->first();
                            ?>
                            <?php if (count($mapub) > 0): ?>  
                                <a href="{{$mapub->link}}" target="_blank">
                                <img src="{{ asset('pubs/'.$mapub->photo)}}" class="img-responsive" width="100%" ></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
                <div class="modal-body" >
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="pp" style="border:solid 1px #900;">
                                <button class="btn btn-inverse prev hide" id="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </button>
                                <button class="btn btn-inverse next hide" id="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </button> 
                                <center>
                                    <img id="pp" class="img-responsive " style="height:auto;" src="" >
                                </center>
                            </div>
                            <div class="t_img" >
                                <img src="{{ asset('annonce/'.$annonce->id_voiture.'/'.$annonce->photos_principal)}}" class="img-thumbnail img-slide" width="70">
                                <?php  $t_a_v=explode(";" ,$annonce->photos_v); 
                                foreach($t_a_v as $tof){ ?>
                                    <img src="{{ asset('annonce/'.$annonce->id.'/'.$tof)}}" class="img-thumbnail img-slide" width="70" >
                                <?php  } ?>
                            </div> 
                        </div> 
                        <div class="col-sm-4" >
                            <div style="border-bottom:solid 1px #eee;">
                                <h5 class="text-danger "> Annoncé par </h5>
                            </div>
                            <?php $t_acr = App\Models\Annonceur::where('id', $annonce->id_annonceur)->first(); ?>
                            <?php 
                            if($t_acr->type_cmpte ==  "professionnel"){
                                $pro = App\Models\Professionnel::where('id_annonceur', $annonce->id_annonceur)->first(); ?>
                                <div class="thumbnail">
                                    <div class='row'>
                                        <div class='col-xs-5'>
                                            <a href="{{ url('annonceur/professionel/'.$annonce->id_annonceur)}}" >
                                                <img src="{{ asset('images/conc/'.$pro->logo)}}" class="img-rounded " width="100%" >
                                            </a>
                                        </div>
                                        <div class='col-xs-7'>
                                            <h5 align='center'><?php echo strtoupper($pro->concession); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php  
                            }else{ ?>
                                <h4 class="text-muted">
                                    <span class="glyphicon glyphicon-user"></span> 
                                    <?php echo $t_acr['prenom']." ".$t_acr['nom']; ?>
                                </h4>
                            <?php } ?>

                            <p> <span class="glyphicon glyphicon-map-marker"></span> <?php echo $annonce->zone; ?>
                            <br>
                            <div style="margin-bottom:5px;">
                                <button class="btn btn-detail form-control afficheNum" > 
                                    <span class="glyphicon glyphicon-earphone"></span> Afficher le Numéro
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-detail form-control message">
                                    <span class="glyphicon glyphicon-envelope"></span> Contacter l'Annonceur
                                </button>
                            </div>
                            <div class='pub' style='margin-top:5px;'>
                                <?php
                                    $mapub= App\Models\Pub::where('type', 'popup_side_1')->where('statut', 1)->orderBy('debut', 'DESC')->limit(1)->first();
                                ?>
                                <?php if (count($mapub) > 0): ?>
                                    <div class="pub-nogutter">
                                        <a href="{{$mapub->link}}" target="_blank">
                                            <img src="{{ asset('pubs/'.$mapub->photo)}}" class="img-responsive" width="100%" >
                                        </a>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div style='margin-top:5px;'> 
                                <?php $mapub= App\Models\Pub::where('type', 'popup_side_2')->where('statut', 1)->orderBy('debut', 'DESC')->limit(1)->first();
                                ?>
                                <?php if (count($mapub) > 0): ?>
                                    <div class="pub-nogutter">
                                        <a href="{{$mapub->link}}" target="_blank">
                                            <img src="{{ asset('pubs/'.$mapub->photo)}}" class="img-responsive" width="100%" >
                                        </a>
                                    </div>
                                <?php endif ?>
                            </div>
            
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>





    <!-- MODAL pour le numero -->  
    <div class="modal fade bs-example-modal-sm modal-vertical-centered" id="numero" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header text-muted"> 
                    <span class="glyphicon glyphicon-earphone"></span> Téléphone de l'annonceur
                </div>  

                <div class="modal-body">
                    <div class="panel panel-success" style="border-width: 2px;">
                        <h4 class="text-muted text-center"> 
                            <?php echo preg_replace("#^(\+?[0-3]{3})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$#","$1 $2 $3 $4 $5", $t_acr['telephone']); ?>
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-danger text-center">* Merci de mentionner à l'annonceur que vous avez vu son annonce sur <strong>SN-TOPAUTO.COM</strong> !</div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>  
            </div>
        </div>
    </div>
    <!-- FIN MODAL pour le numero -->  

    <!-- Modal de message  -->
    <div class="modal fade" id="message" role="dialog" tabindex="-" role="dialog" aria-labelledby="mySmallModalLabel" >
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="bande-noir"><h4 class="modal-title"> Message à l'annonceur</h4></div> 
                </div>
                <form class="form" method="POST" action="{{ url('/send_annonce_message')}}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    Prénom et Nom :
                                    <input class="form-control" name="nom_expediteur" value="" placeholder="Votre prénom et nom" required autofocus></input>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                E-mail :
                                <input class="form-control" type="email" name="email_expediteur" value="" placeholder="Votre E-mail" required ></input>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                Objet :
                                <input class="form-control" type="text" name="objet" placeholder="Objet de votre message" ></input><br>
                                Message : 
                                <textarea class="form-control" rows="6" name="contenue" placeholder="Votre message" required></textarea>
                            </div>
                        </div>
                    </div> 
                    <div class="modal-footer">
                        <input type="hidden" name="id_destinataire" value="<?php echo $annonce->id_annonceur; ?>"  ></input>
                        <button type="submit" class="btn btn-success" >Envoyer</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Femer</button>
                    </div>  
                </form>   
            </div>
        </div>
    </div>
    <!-- fin modal de message  -->

    <!-- Modal Partage annonce  -->
    <div class="modal fade" id="partager" role="dialog" tabindex="-" role="dialog" aria-labelledby="mySmallModalLabel" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="bande-noir"><h4 class="modal-title"> Partager ce Véhicule</h4></div>
                </div>
                <form class="form" method="POST" action="{{ url('/partager_annonce_moto')}}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h4>E-mail :</h4>
                                    <input class="form-control" name="exp" placeholder="Votre E-mail" type="email" value="" required autofocus ></input>
                                </div>
                            </div>
                            <div class="col-sm-6" >
                                <h4>Destinataire :</h4>
                                <input class="form-control" name="dest[]" placeholder="E-mail destinataire" type="email" required ></input>
                            </div>
                        </div>
                        <div class="row rowdesti">
                            <div class="col-sm-6">
                                <button class="btn btn-primary desti form-control" data-toggle="tooltip" tittle="Ajouter un nouveau Destinataire"><span class="glyphicon glyphicon-plus"></span> Ajouter un destinataire</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Titre :</h4>
                                <input class="form-control" name="email_envoyeur" value=" <?php echo strtoupper($marque->title." ".$modele->title ." (".$annonce->annee).")";?>"></input><br>
                                <h4> Message:</h4>
                                <textarea class="form-control" rows="4" name="message" placeholder="Votre message"></textarea>
                            </div>
                        </div>
                    </div> 
                    <div class="modal-footer">
                        <input type="hidden" name="id_annonce" value="<?php echo $annonce->id; ?>" />
                        <button type="submit" class="btn btn-success" name="submit">Envoyer</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>     
                </form> 
            </div>
        </div>
    </div>
    <!-- fin modal de message  -->


    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();	
            $(".desti").click(function(){
                event.preventDefault();
                $(".rowdesti").prepend("<div class='col-sm-6'> <input class='form-control' name='dest[]' placeholder='E-mail destinataire' type='email'></input><br><div/>")
            });
        });
    </script>