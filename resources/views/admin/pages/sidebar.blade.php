<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('images/avatar.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('admin/dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Utilisateurs / Annonceurs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/annonceur/list')}}"><i class="fa fa-circle-o"></i> Liste des Utilisateurs/Annonceurs</a></li>
            <li><a href="{{ url('admin/annonceur/ajout')}}"><i class="fa fa-circle-o"></i> Ajout utilisateur / Annonceur</a></li>
            <li><a href="{{ url('admin/annonceur/professionnel')}}"><i class="fa fa-circle-o"></i> Annonceur Professionnel</a></li>
            <li><a href="{{ url('admin/annonceur/TopConcessionnaire')}}"><i class="fa fa-circle-o"></i> Top Concessionnaire</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Annonces</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/annonce/list')}}"><i class="fa fa-circle-o"></i> Toutes les Annonces</a></li>
            <li><a href="{{ url('admin/annonce/gold')}}"><i class="fa fa-circle-o"></i> Annonces Gold</a></li>
            <li><a href="{{ url('admin/annonce/prestige')}}"><i class="fa fa-circle-o"></i> Annonces Prestige</a></li>
            <li><a href="{{ url('admin/annonce/gratuit')}}"><i class="fa fa-circle-o"></i> Annonces Simples</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Autothèque</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/autotheque/genererCode')}}"><i class="fa fa-circle-o"></i> Générer un Code</a></li>
            <li><a href="{{ url('admin/autotheque/list')}}"><i class="fa fa-circle-o"></i> Liste des Codes</a></li>
            <li><a href="{{ url('admin/editer/autotheque')}}"><i class="fa fa-circle-o"></i> C'est quoi l'autothèque</a></li>
            <li><a href="{{ url('admin/editer/autothequeAcheteur')}}"><i class="fa fa-circle-o"></i> Autothèque Acheteur</a></li>
            <li><a href="{{ url('admin/editer/autothequeVendeur')}}"><i class="fa fa-circle-o"></i> Autothèque Vendeur</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Articles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/article/list')}}"><i class="fa fa-circle-o"></i> Liste des articles</a></li>
            <li><a href="{{ url('admin/article/ajouter')}}"><i class="fa fa-circle-o"></i> Ajouter un article</a></li>
            <li><a href="{{ url('admin/article/portrait')}}"><i class="fa fa-circle-o"></i> Portrait</a></li>
            <li><a href="{{ url('admin/article/actualites')}}"><i class="fa fa-circle-o"></i> Actualités</a></li>
            <li><a href="{{ url('admin/article/publiInfo')}}"><i class="fa fa-circle-o"></i> Publi-Info</a></li>
            <li><a href="{{ url('admin/article/guideInfo')}}"><i class="fa fa-circle-o"></i> Guide-Info</a></li>
            <li><a href="{{ url('admin/article/securiteRoutiere')}}"><i class="fa fa-circle-o"></i> Sécurité Routière</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Annuaires</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/annuaire/list')}}"><i class="fa fa-circle-o"></i> Liste des Annuaires</a></li>
            <li><a href="{{ url('admin/annuaire/ajouter')}}"><i class="fa fa-circle-o"></i> Ajouter une entreprise</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Publicité</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/pub/list')}}"><i class="fa fa-circle-o"></i> Liste des publicités</a></li>
            <li><a href="{{ url('admin/pub/ajout')}}"><i class="fa fa-circle-o"></i> Ajouter une Pub</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Marque et modèle</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/marque/marque')}}"><i class="fa fa-circle-o"></i> Ajouter marque / modèle</a></li>
            <li><a href="{{ url('admin/marque/liste')}}"><i class="fa fa-circle-o"></i> Liste marques</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Menu Principal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/editer/vitrinePro')}}"><i class="fa fa-circle-o"></i> Vitrine Pro</a></li>
            <li><a href="{{ url('admin/editer/FAQ')}}"><i class="fa fa-circle-o"></i> Foire aux Questions (FAQ)</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Menu footer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/editer/quiSommesNous')}}"><i class="fa fa-circle-o"></i> Qui sommes-nous?</a></li>
            <li><a href="{{ url('admin/editer/mentionLegales')}}"><i class="fa fa-circle-o"></i> Mentions Légales</a></li>
            <li><a href="{{ url('admin/editer/ConditionsGenerales')}}"><i class="fa fa-circle-o"></i> Conditions Générales</a></li>
            <li><a href="{{ url('admin/editer/PlanSite')}}"><i class="fa fa-circle-o"></i> Plan du site</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Liens Utiles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/editer/conseilsAchat')}}"><i class="fa fa-circle-o"></i> Conseils d'Achat</a></li>
            <li><a href="{{ url('admin/editer/ExaminerUneVoiture')}}"><i class="fa fa-circle-o"></i> Examiner une Voiture</a></li>
            <li><a href="{{ url('admin/editer/Entretien')}}"><i class="fa fa-circle-o"></i> L'entretien</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>