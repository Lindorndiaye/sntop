<style > .list-group-item-danger{background-color:#900;}a.list-group-item-danger{color:#fff;}</style>
<div id="sidebar-wrapper" style="padding-bottom:40px;">
 <hr> 
 <li>
<h3 class="sidebar-brand" style='color:#fff;' ><strong>TABLEAU DE BORD</strong></h3>
 </li>   
 <hr>  
    <div id="MainMenu"  style="">
      <div class="list-group panel" style="border-color:#333;border-radius:0px;">

       <a href="#m4" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Utilisateurs / Annonceurs</a>
       <div class="collapse  echo $ancr" id="m4">
         <a href="{{ url('admin/annonceur/list')}}" class="list-group-item">Liste des Utilisateurs/Annonceurs</a>
         <a href="{{ url('admin/annonceur/ajout')}}" class="list-group-item">Ajout utilisateur / Annonceur</a>
         <a href="{{ url('admin/annonceur/professionnel')}}" class="list-group-item">Annonceur Professionnel</a>
         <a href="{{ url('admin/annonceur/TopConcessionnaire')}}" class="list-group-item">Top Concessionnaire</a>

      </div>
      
       <a href="#m1" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Annonces</a>
       <div class="collapse  echo $ann" id="m1">
         <a href="{{ url('admin/annonce/list')}}" class="list-group-item">Toutes les Annonces</a>
         <a href="{{ url('admin/annonce/gold')}}" class="list-group-item">Annonces Gold</a>
         <a href="{{ url('admin/annonce/prestige')}}" class="list-group-item">Annonces Prestige</a>
         <a href="{{ url('admin/annonce/gratuit')}}" class="list-group-item">Annonces Simples</a>
      </div>
      
  
       <a href="#m2" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Autothèque</a>
       <div class="collapse echo $au" id="m2">
         <a href="{{ url('admin/autotheque/genererCode')}}" class="list-group-item">Générer un Code</a>
         <a href="{{ url('admin/autotheque/list')}}" class="list-group-item">Liste des Codes</a>
         <a href="{{ url('admin/editer/autotheque')}}" class="list-group-item">C'est quoi l'autothèque</a>
         <a href="{{ url('admin/editer/autothequeAcheteur')}}" class="list-group-item">Autothèque Acheteur</a>
         <a href="{{ url('admin/editer/autothequeVendeur')}}" class="list-group-item">Autothèque Vendeur</a>
       </div>
       <a href="#m3" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Articles</a>
       <div class="collapse echo $art" id="m3">
         <a href="{{ url('admin/article/list')}}" class="list-group-item">Liste des articles</a>
         <a href="{{ url('admin/article/ajouter')}}" class="list-group-item">Ajouter un article</a>
         <a href="{{ url('admin/article/portrait')}}" class="list-group-item">Portrait </a>
         <a href="{{ url('admin/article/actualites')}}" class="list-group-item">Actualités </a>
         <a href="{{ url('admin/article/publiInfo')}}" class="list-group-item">Publi-Info</a>
         <a href="{{ url('admin/article/guideInfo')}}" class="list-group-item">Guide-Info</a>
         <a href="{{ url('admin/article/securiteRoutiere')}}" class="list-group-item">Sécurité Routière</a>
       </div>
       <a href="#m6" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Annuaires</a>
       <div class="collapse echo $anu" id="m6">
         <a href="{{ url('admin/annuaire/list')}}" class="list-group-item">Liste des Annuaires</a>
         <a href="{{ url('admin/annuaire/ajouter')}}" class="list-group-item">Ajouter une entreprise</a>
       </div>
         <a href="#m10" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Publicité</a>
       <div class="collapse echo $pub" id="m10">
         <a href="{{ url('admin/pub/list')}}" class="list-group-item">Liste des publicités</a>
         <a href="{{ url('admin/pub/ajout')}}" class="list-group-item">Ajouter une Pub</a>
       </div>
          <a href="#m9" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Marque et modèle</a>
       <div class="collapse echo $mrk" id="m9">
         <a href="{{ url('admin/marque/marque')}}" class="list-group-item">Ajouter marque / modèle</a>
       </div>
        <a href="#m7" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Menu Principal</a>
        <div class="collapse " id="m7">
         <a href="{{ url('admin/editer/vitrinePro')}}" class="list-group-item">Vitrine Pro</a>
         <a href="{{ url('admin/editer/FAQ')}}" class="list-group-item">Foire aux Questions (FAQ)</a>
       </div>
       <a href="#m8" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Menu footer</a>
       <div class="collapse " id="m8">
         <a href="{{ url('admin/editer/quiSommesNous')}}" class="list-group-item">Qui sommes-nous?</a>
         <a href="{{ url('admin/editer/mentionLegales')}}" class="list-group-item">Mentions Légales</a>
         <a href="{{ url('admin/editer/ConditionsGenerales')}}" class="list-group-item">Conditions Générales </a>
         <a href="{{ url('admin/editer/PlanSite')}}" class="list-group-item">Plan du site </a>
       </div>
        <a href="#m11" class="list-group-item list-group-item-danger" data-toggle="collapse" data-parent="#MainMenu">Liens Utiles</a>
       <div class="collapse " id="m11">
         <a href="{{ url('admin/editer/conseilsAchat')}}" class="list-group-item">Conseils d'Achat</a>
         <a href="{{ url('admin/editer/ExaminerUneVoiture')}}" class="list-group-item">Examiner une Voiture</a>
         <a href="{{ url('admin/editer/Entretien')}}" class="list-group-item">L'entretien</a>
       </div>
     
      
     </div>
 </div>

</div>

    