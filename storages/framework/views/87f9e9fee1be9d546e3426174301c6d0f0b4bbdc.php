      <!-- Modal Partage annonce  -->
    <div class="modal fade" id="partager" role="dialog" tabindex="-" role="dialog" aria-labelledby="mySmallModalLabel" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="bande-noir"><h4 class="modal-title"> Partager ce Véhicule</h4></div>
                </div>
                <form class="form" method="POST" action="<?php echo e(url('/partager_annonce')); ?>">
                    <?php echo e(csrf_field()); ?>

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
                                <input class="form-control" name="email_envoyeur" value=" <?php echo strtoupper($mrk->title." ".$mdl->title ." (".$ance->annee).")";?>"></input><br>
                                <h4> Message:</h4>
                                <textarea class="form-control" rows="4" name="message" placeholder="Votre message"></textarea>
                            </div>
                        </div>
                    </div> 
                    <div class="modal-footer">
                        <input type="hidden" name="id_annonce" value="<?php echo $ance->id; ?>" />
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