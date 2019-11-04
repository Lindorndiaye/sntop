<?php
if ($_POST) {
extract($_POST);
extract($_SESSION);
require_once("classes/annonce_v.php");
//Construction ( $ma , $mo , $an , $kil , $tr ,$ca )
$voiture = new Voiture($marque_v , $modele_v , $annee_v , $kilometrage ,$transmission , $carburant);
$id_voiture=$voiture->ajouter();
//Annonce Voiture Construction ($id_voiture);
$n_annonce= new annonce_v($id_voiture);
//Gestion des Photos
( $_FILES['photo_v']['name'] );
//Annonce Signature ($titre , $descr  , $id_ancr ,$type_ac, $type_ancr ,$photos)
$n_annonce->ajouter($titre_a , $description_a , $id_annonceur ,$type_a , $type_cmpte ,"auto.png");
}