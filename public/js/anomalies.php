<style>
    .nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; font-size: large; }
    .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #ff8c00 !important; background: #000000; }
    .nav-tabs > li > a::after { content: ""; background: #ff8c00; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
    .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
     tr td{font-size:13px;cursor:pointer; }
     tr td span.label{ font-size:15px;padding:2px;padding-left:10px;padding-right:10px;letter-spacing:3px; }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo ADDRESS ?>css/dataTables.bootstrap.css">
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Détails de la Maintenance</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--  Fin  Modal -->

<div class="row">
    <div class="col-sm-12 " style="margin-top:10px;">
        <?php $obj=new Database();
              $anomalies=$obj->cherche_rqt("SELECT * FROM anomalies WHERE niveau_urgence != 'ras' ");
         ?>
        <div>
            <?php $centres= get_centres(); ?>
            <ul class="nav nav-tabs">
             <?php $r = ( isset($_GET['param1']) ) ? " " : "active"; ?>
             <li class="<?php echo $r; ?>" >
                    <a href="<?php echo ADDRESS."admin/anomalies/" ?>" >
                        Tous les Centres
                    </a>
                </li>
            <?php foreach ($centres as $centre ): ?>
                <?php $r = ( isset($_GET['param1']) and $centre['nom'] == $_GET['param1'] ) ? "active" : " "; ?>
                <li class="<?php echo $r; ?>" >
                    <a href=" <?php echo ADDRESS."admin/anomalies/".$centre['nom']."/"; ?> " >
                        <?php echo $centre['nom']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
       </div>
    </div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-md-12 ">
    <table class="table table-stripped table-list-search panel" id="tableau">
        <thead><tr>
            <th>Date </th><th>Centre-Site</th><th>Intervenant</th><th>Equipement</th><th>Anomalies</th><th>Urgence</th><th>Etat</th>
        </tr></thead>
        <tbody>
         <?php foreach($anomalies as $an ):
             if(isset($_GET['param1']))
                $stmt="SELECT * FROM maint_interne WHERE id_anomalies='".$an['id']."' AND site LIKE '".$_GET['param1']."%' ORDER BY id DESC  ";
             else
                 $stmt="SELECT * FROM maint_interne WHERE id_anomalies='".$an['id']."' ORDER BY id DESC";

             $maint_an=$obj->cherche_rqt($stmt);   
             if($maint_an != null){   $maint_an=$maint_an[0]; ?>
             <tr class="an" id="<?php echo $maint_an['id']; ?>">
                 <td><?php echo afficher_date($maint_an['date']) ; ?></td>
                 <td><?php echo $maint_an['site'] ; ?></td>
                 <td><?php echo $maint_an['intervenant'] ; ?></td>
                 <td><?php echo $maint_an['type_equipement'].": </small><strong>". $maint_an['equipement']."</strong>" ; ?></td>
                 <td><?php echo $an['anomalies']; ?></td>
                 <td><span class='label label-danger'><?php echo $an['niveau_urgence']; ?></span></td>
                 <td class='text-warning'><?php echo $maint_an['etat'] ; ?></td>
             </tr>
         <?php } ?>
         <?php endforeach; ?>
        </tbody>
    </table>
    <h4>Exporter le tableau sous format excel ou png 
    <a href="#" onClick ="$('#tableau').tableExport({type:'excel',escape:'false',headings: true, footers: true,bootstrap: true,htmlContent:false });"><img src="<?php echo ADDRESS?>image/excel.jpg"/></a>
    </h4>
</div>
</div>
<script type="text/javascript" src='<?php echo ADDRESS; ?>js/dataTables.min.js'></script>
<script type="text/javascript" src='<?php echo ADDRESS; ?>js/dataTables.bootstrap4.min.js'></script>
<script type="text/javascript" src='<?php echo ADDRESS; ?>js/dt.js'></script>
<script type="text/javascript" src="<?php echo ADDRESS; ?>js/tableExport.js"></script>
<script type="text/javascript" src="<?php echo ADDRESS; ?>js/jquery.base64.js"></script>>
<script>
$(".an").click(function(){
    var id_an=$(this).attr('id');

    $.get("<?php echo ADDRESS ?>modele/maint_content.php" ,{ "id": id_an })
        .done(function (result) {
            $(".modal-body").html(result);
        }).fail(function () {
        $(".modal-body").html("impossible");
    })
    $("#myModal").modal();
});
</script>
