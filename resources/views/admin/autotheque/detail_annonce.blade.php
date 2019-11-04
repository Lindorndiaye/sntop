@extends('admin.pages.layout')

@section('style')
  
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{$annonce->titre}}
            <small> detail </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Détail Annonce</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            @if ($annonce->type == "auto")
                                <img class="img-circle" src="{{ asset('images/annonce/voiture/'.$annonce->photos_principal)}}" alt="{{$annonce->titre}}">
                            @elseif($annonce->type == "moto")
                                <img class="img-circle" src="{{ asset('images/annonce/moto/'.$annonce->photos_principal)}}" alt="{{$annonce->titre}}">
                            @endif
                            <span class="username"><a href="#">{{$annonceur->prenom}} {{$annonceur->nom}}</a></span>
                            <span class="description">Pseudo - {{$annonceur->pseudo}}</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if ($annonce->type == "auto")
                            <img class="img-responsive pad" src="{{ asset('images/annonce/voiture/'.$annonce->photos_principal)}}" alt="{{$annonce->titre}}">
                            @elseif($annonce->type == "moto")
                            <img class="img-responsive pad" src="{{ asset('images/annonce/moto/'.$annonce->photos_principal)}}" alt="{{$annonce->titre}}">
                        @endif
                        
                        <div class="row">
                          <div class="col-md-12">
                            <!-- Profile Image -->
                            <div class="box box-primary">
                              <div class="box-body box-profile">
                                <ul class="list-group list-group-unbordered">
                                  <li class="list-group-item">
                                    <b>Prix :</b> <a class="pull-right">1,322</a>
                                  </li>
                                  <li class="list-group-item">
                                    <b>Type Annonce :</b> <a class="pull-right">543</a>
                                  </li>
                                  <li class="list-group-item">
                                    <b>Type Annonceur :</b> <a class="pull-right">13,287</a>
                                  </li>
                                  <li class="list-group-item">
                                    <b>Localité :</b> <a class="pull-right">13,287</a>
                                  </li>
                                </ul>
                              </div>
                              <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                          </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <!-- Box Comment -->
                  <div class="box box-widget">
                    <div class="box-header with-border">
                      <div class="user-block">
                        <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                        <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                        <span class="description">Shared publicly - 7:30 PM Today</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                          <i class="fa fa-circle-o"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <!-- post text -->
                      <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at</p>

                      <p>the coast of the Semantics, a large language ocean.
                        A small river named Duden flows by their place and supplies
                        it with the necessary regelialia. It is a paradisematic
                        country, in which roasted parts of sentences fly into
                        your mouth.</p>

                      <!-- Attachment -->
                      <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../dist/img/photo1.png" alt="Attachment Image">

                        <div class="attachment-pushed">
                          <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                          <div class="attachment-text">
                            Description about the attachment can be placed here.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                          </div>
                          <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                      </div>
                      <!-- /.attachment-block -->

                      <!-- Social sharing buttons -->
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                      <span class="pull-right text-muted">45 likes - 2 comments</span>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer box-comments">
                      <div class="box-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                        <div class="comment-text">
                              <span class="username">
                                Maria Gonzales
                                <span class="text-muted pull-right">8:03 PM Today</span>
                              </span><!-- /.username -->
                          It is a long established fact that a reader will be distracted
                          by the readable content of a page when looking at its layout.
                        </div>
                        <!-- /.comment-text -->
                      </div>
                      <!-- /.box-comment -->
                      <div class="box-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="../dist/img/user5-128x128.jpg" alt="User Image">

                        <div class="comment-text">
                              <span class="username">
                                Nora Havisham
                                <span class="text-muted pull-right">8:03 PM Today</span>
                              </span><!-- /.username -->
                          The point of using Lorem Ipsum is that it has a more-or-less
                          normal distribution of letters, as opposed to using
                          'Content here, content here', making it look like readable English.
                        </div>
                        <!-- /.comment-text -->
                      </div>
                      <!-- /.box-comment -->
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                      <form action="#" method="post">
                        <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                        <!-- .img-push is used to add margin to elements next to floating images -->
                        <div class="img-push">
                          <input class="form-control input-sm" placeholder="Press enter to post comment" type="text">
                        </div>
                      </form>
                    </div>
                    <!-- /.box-footer -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->

        <div class="container-fluid">
          <div class="panel panel-danger">
            <div class="panel-heading" style="padding-top:0;padding-bottom:0;font-size: 20px; ">
              <a class="text-danger" href="{{ url('admin/annonce/'.$annonce->type_annonceur)}}">
                <span class="glyphicon glyphicon-circle-arrow-left" style="margin-top:5px;"></span>
              </a> Détail de l'annonce
            </div>     
            <div class="row">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">  
                    <div class="thumbnail"> 
                      @if ($annonce->type == "auto")
                        <img class="img-responsive pad" src="{{ asset('images/annonce/voiture/'.$annonce->photos_principal)}}" alt="{{$annonce->titre}}">
                      @elseif($annonce->type == "moto")
                        <img class="img-responsive pad" src="{{ asset('images/annonce/moto/'.$annonce->photos_principal)}}" alt="{{$annonce->titre}}">
                      @endif
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2 col-sm-offset-2 "> 
                    <h4> <?php echo (number_format($annonce->prix, 0 , '', ' ')); ?></h4> 
                  </div>
                  <div class="col-sm-2"> <h4><?php echo $annonce->type_annonce; ?></h4></div>
                  <div class="col-sm-2"> <h4><?php echo $annonce->type_annonceur; ?></h4></div>
                  <div class="col-sm-2"> <h4><?php echo $annonce->zone; ?></h4></div>
                </div>
              </div>
              <div class="col-md-10 col-md-offset-1 ">
                <div style="margin-bottom:20px;"> <p class="text-muted" > <?php echo $annonce->description?> </p></div>
                  <table class=" table table-bordered">
                    <tr>
                      <td class="text-muted color">Marque</td>
                      <td class="text-muted" ><?php echo $marque->title;?> </td>
                      <td class="text-muted color">Modèle</td>
                      <td class="text-muted"><?php echo $modele->title;?> </td>
                    </tr>
                    <tr>
                      <td class="text-muted color">Année</td>
                      <td class="text-muted" ><?php echo $annonce->annee;?> </td>
                      <td class="text-muted color">Kilomètrage</td>
                      <td class="text-muted"><?php echo number_format($annonce->kilometrage , 0,'' ,' ')." KM";?> </td>
                    </tr>
                    <tr>
                      <td class="text-muted color">Boite Vitesse</td>
                      <td class="text-muted"><?php echo $annonce->boite_vitesse;?> </td>
                      <td class="text-muted color">Energie</td>
                      <td class="text-muted"><?php echo $annonce->carburant;?> </td>
                    </tr>
                    <tr>
                      <td class="text-muted color">Cylindre</td>
                      <td class="text-muted"><?php echo $annonce->cylindree;?> </td>
                      <td class="text-muted color">Couleur</td>
                      <td class="text-muted"><?php echo $annonce->couleur;?> </td>
                    </tr>
                  </table>
                  <div class="panel panel-danger">
                    <div class="panel panel-heading" style="background-color:#900;color:#fff;">
                      <h4 align="center"> EQUIPEMENTS / OPTIONS DU VEHICULE</h4>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-3 col-md-2"> 
                          <strong>Carrosserie : </strong>
                        </div>
                        <div class="col-xs-9"> 
                          <?php $Options = explode(";", $annonce->carrosserie) ; ?>
                          @foreach ($Options as $opt)
                            <span  class="option"> <?php echo $opt; ?></span>
                          @endforeach
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-3 col-md-2"> 
                          <strong> Transmission : </strong>
                        </div>
                        <div class="col-xs-9"> 
                          <?php $Options = explode(";", $annonce->transmission) ; ?>
                          @foreach ($Options as $opt)
                            <span  class="option"> <?php echo $opt; ?></span>
                          @endforeach
                        </div>
                      </div> 
                      <hr>
                      <div class="row">
                        <div class="col-xs-3 col-md-2"> 
                          <strong> Intérieur : </strong>
                        </div>
                        <div class="col-xs-9"> 
                          <?php $Options = explode(";", $annonce->interieur) ; ?>
                          @foreach ($Options as $opt)
                            <span  class="option"> <?php echo $opt; ?></span>
                          @endforeach
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-3 col-md-2"> 
                          <strong> Extérieur : </strong>
                        </div>
                        <div class="col-xs-9"> 
                            <?php $Options = explode(";", $annonce->exterieur) ; ?>
                          @foreach ($Options as $opt)
                            <span  class="option"> <?php echo $opt; ?></span>
                          @endforeach
                        </div>
                      </div> 
                      <hr>
                      <div class="row">
                        <div class="col-xs-3 col-md-2"> 
                          <strong> Electroniques: </strong>
                        </div>
                        <div class="col-xs-9"> 
                          <?php $Options = explode(";", $annonce->electronique) ; ?>
                          @foreach ($Options as $opt)
                            <span  class="option"> <?php echo $opt; ?></span>
                          @endforeach
                        </div>
                      </div> 
                      <hr>
                      <div class="row">
                        <div class="col-xs-3 col-md-2"> 
                          <strong> Dispositifs de Sécurité : </strong>
                        </div>
                        <div class="col-xs-9"> 
                          <?php $Options = explode(";", $annonce->securite) ; ?>
                          @foreach ($Options as $opt)
                            <span  class="option"> <?php echo $opt; ?></span>
                          @endforeach
                        </div>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('script')

@endsection