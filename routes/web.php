<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//test imagesupload
Route::get('images-upload', 'HomeController@imagesUpload');
Route::post('images-upload', 'HomeController@imagesUploadPost')->name('images.upload');

//gestion home
Route::get('/', 'HomeController@index');

//gestion compte
Route::get('/connexion', 'CompteController@index');
Route::post('/connexion', 'CompteController@connexion');
Route::get('/inscription', 'CompteController@inscription');
Route::post('/inscription', 'CompteController@store');
Route::get('/activation/{login}/{code} ', 'CompteController@activation');
Route::get('/logout ', 'CompteController@logout');

//gestion boutique
Route::get('/boutiques', 'BoutiqueController@index');
Route::get('/creer/boutique', 'BoutiqueController@creerBoutique');
Route::get('/my/boutiques', 'BoutiqueController@myBoutique');
Route::post('/creer/boutique', 'BoutiqueController@connexion');
Route::post('/save/boutique', 'BoutiqueController@store');
Route::get('/boutique/{id}/{nom}', 'BoutiqueController@getBoutiqueById');
Route::get('/boutique/{nom}', 'BoutiqueController@getBoutiqueByNom');
Route::get('boutique/ajouter_article/{id}/{nom}', 'BoutiqueController@article');
Route::post('boutique/ajouter_article', 'BoutiqueController@createArticle');
Route::get('annuaire/consultation/{categorie}', 'BoutiqueController@getAnnuaireConsultation');
Route::get('detail/boutique_article/{id}', 'BoutiqueController@detail_article');

//gestion annonces
Route::get('annonce/{type}', 'AnnonceController@index');
Route::get('publier/annonce', 'AnnonceController@publierAnnonce');
Route::post('publier/annonce', 'AnnonceController@store');
Route::get('get_marque/{type} ', 'AnnonceController@get_marque');
Route::get('get_modele/{id} ', 'AnnonceController@get_modele');
Route::get('detail-annonce_{type}-{id} ', 'AnnonceController@get_annonce_detail');
Route::post('send_annonce_message ', 'AnnonceController@send_annonce_message');
Route::post('partager_annonce_voiture', 'AnnonceController@partager_annonce_voiture');
Route::post('partager_annonce_moto', 'AnnonceController@partager_annonce_moto');
Route::get('gerer/annonces', 'AnnonceController@gerer_annonces');

//gestion concessionnaire
Route::get('concessionnaire', 'ProfessionnelController@index');
Route::get('annonceur/professionel/{id}', 'ProfessionnelController@annonceur_professionel');

//gestion autotheque
Route::get('autotheque/depot', 'AutothequeController@index');
Route::post('autotheque/depot', 'AutothequeController@store');
Route::get('autotheque/consultation', 'AutothequeController@consultation');
Route::get('contact/autotheque/demandeDeCode', 'AutothequeController@demandeDeCode');
Route::post('contact/autotheque/demandeDeCode', 'AutothequeController@sendDemandeDeCode');
Route::get('autotheque/check_code_autotheque ', 'AutothequeController@check_code');
Route::get('autotheque/info/{rubrique} ', 'AutothequeController@info');

//gestion article
Route::get('actualites ', 'ArticlesController@actu');
Route::get('publiInfo ', 'ArticlesController@publiInfo');
Route::get('guideInfo ', 'ArticlesController@guideInfo');
Route::get('securiteRoutiere ', 'ArticlesController@securiteRoutiere');
Route::get('vitrinePro ', 'ArticlesController@vitrinePro');
Route::get('contact ', 'ArticlesController@getcontact');
Route::post('contact ', 'ArticlesController@storecontact');

//gestion recherche
Route::get('acheteur ', 'RechercheController@acheteur');
Route::get('vendeur ', 'RechercheController@vendeur');
Route::get('recherche/vehicules/{type}/{categorie} ', 'RechercheController@recherche_vehicules');
Route::get('recherche/annonces/{categorie} ', 'RechercheController@recherche_annonces');
Route::get('annonces_partype', 'RechercheController@annonces_partype');
Route::get('recherche/categorie/{categorie} ', 'RechercheController@recherche_categorie');


//gestion admin
//index admin
Route::get('admin', 'Admin\AdminController@index');
Route::post('admin', 'Admin\AdminController@connexion');
Route::get('admin/dashboard', 'Admin\AdminController@dashboard');
Route::get('admin/index2', function(){
    return view('admin.pages.layout');
});

//Annonces
Route::get('admin/annonce/list', 'Admin\AnnonceController@listeAnnonce');
Route::get('admin/annonce/gold', 'Admin\AnnonceController@listeGold');
Route::get('admin/annonce/prestige', 'Admin\AnnonceController@listePrestige');
Route::get('admin/annonce/gratuit', 'Admin\AnnonceController@listeGratuit');
Route::get('admin/annonce_detail_{id}', 'Admin\AnnonceController@detailAnnonce');
Route::get('admin/edit_annonce_{id}', 'Admin\AnnonceController@editAnnonce');

//Utilisateurs / Annonceurs 
Route::get('admin/annonceur/list', 'Admin\AnnonceurController@listeAnnonceur');
Route::get('admin/annonceur/ajout', 'Admin\AnnonceurController@createAnnonceur');
Route::post('admin/annonceur/ajout', 'Admin\AnnonceurController@storeAnnonceur');
Route::get('admin/annonceur/professionnel', 'Admin\AnnonceurController@listeAnnonceurProfessionnel');
Route::get('admin/annonceur/TopConcessionnaire', 'Admin\AnnonceurController@createConcessionnaire');
Route::post('admin/annonceur/TopConcessionnaire', 'Admin\AnnonceurController@storeConcessionnaire');

//Autothèque
Route::get('admin/autotheque/genererCode', 'Admin\AutothequeController@genererCode');
Route::post('admin/autotheque/genererCode', 'Admin\AutothequeController@storeGenererCode');
Route::get('admin/autotheque/getCode/{date_fin}/{id_ancr} ', 'Admin\AutothequeController@getCode');
Route::post('admin/autotheque/getCode', 'Admin\AutothequeController@storeCode');
Route::get('admin/autotheque/list', 'Admin\AutothequeController@listeCode');
Route::get('admin/editer/autotheque', 'Admin\AutothequeController@listeAnnonce');
Route::get('admin/editer/autothequeAcheteur', 'Admin\AutothequeController@listeAnnonce');
Route::get('admin/editer/autothequeVendeur', 'Admin\AutothequeController@listeAnnonce');

//Articles
Route::get('admin/article/list', 'Admin\AdminController@listeAnnonce');
Route::get('admin/article/ajouter', 'Admin\AdminController@listeAnnonce');
Route::get('admin/article/portrait', 'Admin\AdminController@listeAnnonce');
Route::get('admin/article/actualites', 'Admin\AdminController@listeAnnonce');
Route::get('admin/article/publiInfo', 'Admin\AdminController@listeAnnonce');
Route::get('admin/article/guideInfo', 'Admin\AdminController@listeAnnonce');
Route::get('admin/article/securiteRoutiere', 'Admin\AdminController@listeAnnonce');

//Annuaires
Route::get('admin/annuaire/list', 'Admin\AdminController@listeAnnonce');
Route::get('admin/annuaire/ajouter', 'Admin\AdminController@listeAnnonce');

//Publicité
Route::get('admin/pub/list', 'Admin\AdminController@listeAnnonce');
Route::get('admin/pub/ajout', 'Admin\AdminController@listeAnnonce');

//Marque et modèle
Route::get('admin/marque/marque', 'Admin\AdminController@marque');
Route::post('admin/marque/new_marque', 'Admin\AdminController@new_marque');
Route::post('admin/marque/new_modele', 'Admin\AdminController@new_modele');
Route::get('admin/marque/liste', 'Admin\AdminController@liste_marque');

//Menu Principal
Route::get('admin/editer/vitrinePro', 'Admin\AdminController@listeAnnonce');
Route::get('admin/editer/FAQ', 'Admin\AdminController@listeAnnonce');

//Menu footer
Route::get('admin/editer/quiSommesNous', 'Admin\AdminController@listeAnnonce');
Route::get('admin/editer/mentionLegales', 'Admin\AdminController@listeAnnonce');
Route::get('admin/editer/ConditionsGenerales', 'Admin\AdminController@listeAnnonce');
Route::get('admin/editer/PlanSite', 'Admin\AdminController@listeAnnonce');

//Liens Utiles
Route::get('admin/editer/conseilsAchat', 'Admin\AdminController@listeAnnonce');
Route::get('admin/editer/ExaminerUneVoiture', 'Admin\AdminController@listeAnnonce');
Route::get('admin/editer/Entretien', 'Admin\AdminController@listeAnnonce');
