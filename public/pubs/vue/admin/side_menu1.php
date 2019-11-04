    <?php 
            if($_GET['action']=="annonce.php"){ ;$ann="in";}
       else if($_GET['action']=="autotheque.php"){$au="in";} 
       else if($_GET['action']=="editer.php"){$edt="in";}
       else if($_GET['action']=="article.php"){$art="in";}
       else if($_GET['action']=="annonceur.php"){$ancr="in";}
       else if($_GET['action']=="annuaire.php"){$anu="in";}
       else if($_GET['action']=="marque.php"){$mrk="in";}
       else if($_GET['action']=="pub.php"){$pub="in";}
    ?>
    
<style > .list-group-item-danger{background-color:#900;}a.list-group-item-danger{color:#fff;}</style>
<div id="sidebar-wrapper" style="padding-bottom:40px;">
 <hr> 
 <li class="sidebar-brand">
    <h2 class="text-danger"><strong>TopAuto Administration</strong></h2>
 </li>   
 <hr>  
    <div id="MainMenu"  style="">
      <div class="list-group panel" style="border-color:#333;border-radius:0px;">

       <a href="#m1" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Annonces</a>
       <div class="collapse <?php echo $ann;?>" id="m1">
         <a href="<?php echo $address;?>admin/annonce/list" class="list-group-item">Toutes les Annonces</a>
         <a href="<?php echo $address;?>admin/annonce/gold" class="list-group-item">Annonces Gold</a>
         <a href="<?php echo $address;?>admin/annonce/prestige" class="list-group-item">Annonces Prestige</a>
         <a href="<?php echo $address;?>admin/annonce/gratuit" class="list-group-item">Annonces Gratuites</a>
      </div>
      
       <a href="#m4" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Utilisateurs</a>
       <div class="collapse <?php echo $ancr;?>" id="m4">
         <a href="<?php echo $address;?>admin/annonceur/ajout" class="list-group-item">Ajouter un utilisateur</a>
         <a href="<?php echo $address;?>admin/annonceur/list" class="list-group-item">Tous les annonceurs</a>
         <a href="<?php echo $address;?>admin/annonceur/professionnel" class="list-group-item">Professionnel</a>
         <a href="<?php echo $address;?>admin/annonceur/TopConcessionnaire" class="list-group-item">Top Concessionnaire</a>

      </div>
  
       <a href="#m2" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Autothèque</a>
       <div class="collapse <?php echo $au;?>" id="m2">
         <a href="<?php echo $address;?>admin/autotheque/genererCode" class="list-group-item">Générer un Code</a>
         <a href="<?php echo $address;?>admin/autotheque/list" class="list-group-item">Liste des Codes</a>
         <a href="<?php echo $address;?>admin/editer/autotheque" class="list-group-item">C'est quoi l'autothèque</a>
         <a href="<?php echo $address;?>admin/editer/autothequeAcheteur" class="list-group-item">Autothèque Acheteur</a>
         <a href="<?php echo $address;?>admin/editer/autothequeVendeur" class="list-group-item">Autothèque Vendeur</a>
       </div>
       <a href="#m3" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Articles</a>
       <div class="collapse <?php echo $art;?>" id="m3">
         <a href="<?php echo $address;?>admin/article/ajouter" class="list-group-item">Ajouter un article</a>
         <a href="<?php echo $address;?>admin/article/list" class="list-group-item">Tous les articles</a>
         <a href="<?php echo $address;?>admin/article/portrait" class="list-group-item">Portrait </a>
         <a href="<?php echo $address;?>admin/article/actualites" class="list-group-item">Actualités </a>
         <a href="<?php echo $address;?>admin/article/publiInfo" class="list-group-item">Publi-Info</a>
         <a href="<?php echo $address;?>admin/article/guideInfo" class="list-group-item">Guide-Info</a>
         <a href="<?php echo $address;?>admin/article/securiteRoutiere" class="list-group-item">Sécurité Routière</a>
       </div>
       <a href="#m6" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Annuaires</a>
       <div class="collapse <?php echo $anu;?>" id="m6">
         <a href="<?php echo $address;?>admin/annuaire/ajouter" class="list-group-item">Ajouter un nouveau</a>
         <a href="<?php echo $address;?>admin/annuaire/list" class="list-group-item">Liste des Annuaires</a>
       </div>
         <a href="#m10" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Publicité</a>
       <div class="collapse <?php echo $pub ?>" id="m10">
         <a href="<?php echo $address;?>admin/pub/ajout" class="list-group-item">Ajouter une Pub</a>
         <a href="<?php echo $address;?>admin/pub/list" class="list-group-item">Listes des publicités</a>
       </div>
          <a href="#m9" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Marque et modèle</a>
       <div class="collapse <?php echo $mrk ?>" id="m9">
         <a href="<?php echo $address;?>admin/marque/marque" class="list-group-item">Ajouter  marque / modèle</a>
       </div>
        <a href="#m7" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Menu Principal</a>
        <div class="collapse <?php ?>" id="m7">
         <a href="<?php echo $address;?>admin/editer/vitrinePro" class="list-group-item">Vitrine Pro</a>
         <a href="<?php echo $address;?>admin/editer/FAQ" class="list-group-item">Foire aux Questions (FAQ)</a>
       </div>
       <a href="#m8" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Menu footer</a>
       <div class="collapse " id="m8">
         <a href="<?php echo $address;?>admin/editer/quiSommesNous" class="list-group-item">Qui sommes-nous?</a>
         <a href="<?php echo $address;?>admin/editer/mentionLegales" class="list-group-item">Mentions Légales</a>
         <a href="<?php echo $address;?>admin/editer/ConditionsGenerales" class="list-group-item">Conditions Générales </a>
         <a href="<?php echo $address;?>admin/editer/PlanSite" class="list-group-item">Plan du site </a>
       </div>
        <a href="#m11" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Liens Utiles</a>
       <div class="collapse " id="m11">
         <a href="<?php echo $address;?>admin/editer/conseilsAchat" class="list-group-item">Conseils d'Achat</a>
         <a href="<?php echo $address;?>admin/editer/ExaminerUneVoiture" class="list-group-item">Examiner une Voiture</a>
         <a href="<?php echo $address;?>admin/editer/Entretien" class="list-group-item">L'entretien</a>
       </div>
     
      
     </div>
 </div>

</div>

    