<?php
   class Database{
    public static $pdo;
    private static $adresse_bd="localhost";
    private static $bd="topauto";
    private static $user_bd="root";
    private static $passwd_bd="root";
    public function connection(){
	  try{
	  self::$pdo = new pdo("mysql:host=".self::$adresse_bd.";dbname=".self::$bd , self::$user_bd , self::$passwd_bd);
	  //echo "Connexion Reussi <br> ";
	  }catch(PDOException $e){
      die($e->getMessage() );
	  }
    }
    public function __construct(){
   	    if (!extension_loaded('pdo'))
		die('The PDO extension is required.'); 
		else   
	    $this->connection();	    
    }
    
    /**
     * @param $table = la table sur laquel on fait l'opération
     * @param $valeurs = tableau des valeurs a ajouter 
     * @return L'id du Dernier élément ajouté
     */
     public function ajouter($table , $valeurs){            
     foreach ($valeurs as $key => $value)
     $champ_valeur[] = $key.'=:'.$key ; 
     $sql = "INSERT INTO " .$table. " SET " . implode(' , ', $champ_valeur);
     // echo $sql;
     $stmt = self::$pdo->prepare($sql);
     foreach ($valeurs as $key => $value)
     $stmt->bindValue(':'.$key , $value);
       if($stmt->execute())
        return self::$pdo->lastInsertId();  
     } 
    
     /**
     * @param $table = la table sur laquel on fait l'opération
     * @param $id = valeur du champ id  pour indexé la ligne
     * @return boolean  true si l'ajout passe 
     */
    public function suppr($table ,$champ_id , $id) {
     $sql = " DELETE FROM ". $table . " WHERE $champ_id = :id ";
     $stmt = self::$pdo->prepare($sql);
     $stmt->bindParam(':id', $id, PDO::PARAM_STR);
     $stmt->execute();
     return true;
            
    }
    
     /**
     * @param $table = la table sur laquel on fait l'opération
     * @param $champ = Le Champ à modifier 
     * @param $valeur = La nouvelle valeur à mettre 
     * @param $id = valeur du champ id pour indexé la ligne
     * @return boolean  true si l'ajout passe 
     */
    public function modifier($table , $champ, $valeur , $champ_id , $id){ //un seul champ
      $sql = "UPDATE ".$table." SET ".$champ. " =:valeur WHERE  $champ_id =:id ";
      $stmt=self::$pdo->prepare($sql);
      $stmt->bindValue(':valeur', $valeur);
      $stmt->bindParam('id', $id, PDO::PARAM_STR);
      if ($stmt->execute())
      return true;
     } 
     
     /**
     * @param $table = la table sur laquel on fait l'opération
     * @param $valeurs = tableau de des nouvelles valeurs indexé par ls noms des tables 
     * @param $id = valeur du champ id pour indexé la ligne 
     * @return boolean  true si l'ajout passe 
     */      
    public function modifier_plus($table , $valeurs ,$champ_id , $id){ 

    foreach ($valeurs as $key => $value)
	  $champ_valeur[] = $key .' = :' . $key;   
    $sql = "UPDATE ".$table." SET " .implode(' , ' , $champ_valeur)." WHERE $champ_id = :id ";
	  $stmt = self::$pdo->prepare($sql);
	  foreach ($valeurs as $key => $value)
	  $stmt->bindValue(':'.$key , $value);
	  $stmt->bindParam('id' ,$id , PDO::PARAM_STR);
	  if ( $stmt->execute() )
		return true;
    }
    
    /**
     * @param $table = la table sur laquel on fait l'opération
     * @param $valeurs = tableau de des nouvelles valeurs indexé par ls noms des tables 
     * @param $champ_id = Le champ pour idenfier la recherche 
     * @param $id = valeur du champ_id pour indexé la ligne 
     * @return Un Array de Array contenant le resultat du select 
     */    
    public function cherche($table , $champs , $champ_id , $id){
       $tab_champ = implode(' , ' , $champs) ;
       $sql="SELECT $tab_champ FROM $table WHERE $champ_id = :id ";
       echo $sql;
       $stmt= self::$pdo->prepare($sql);
       $stmt->bindParam('id' , $id ,PDO::PARAM_STR);
       $stmt->execute();
       $resultat = $stmt->fetchAll();   
       return $resultat;
    } 
    
     /**
     * @param $table = la table sur laquel on fait l'opération 
     * @param $champ_id = Le champ pour idenfier la recherche 
     * @param $id = valeur du champ_id pour indexé la ligne 
     * @return Un Array de Array contenant le resultat du select 
     */
    public function cherche_all($table , $champ_id , $id){
       $sql="SELECT * FROM $table WHERE $champ_id = :id ORDER BY $champ_id DESC ";
       //echo $sql;
       $stmt= self::$pdo->prepare($sql);
       $stmt->bindParam('id' , $id , PDO::PARAM_STR);
       $stmt->execute();
       $resultat = $stmt->fetchAll();   
       return $resultat;
    }   
      
     /**
     * @param $stmt = Une requete sur une table de la base de données   
     * @return Un Array de Array contenant le resultat de la recherche 
     */
    public function cherche_rqt( $stmt ){
      // echo $stmt;
	  return self::$pdo->query($stmt)->fetchAll(PDO::FETCH_ASSOC);
    }   
    
    public function d_ajout(){
    return self::$pdo->lastInsertId();
    }
    
    public function get_gold(){
    return self::cherche_rqt("SELECT id_a_v, type_annonceur, id_voiture, date_a_v, prix_v ,photos_a_v FROM annonce_v WHERE type_annonceur= 'gold' ");
   }

   public function get_mrk_mdl( $id_mrk , $id_mdl ){
     $mrk= self::cherche_all("modele" , "id" , $id_mdl );
     $mdl= self::cherche_all("marque" , "id" , $id_mrk );
     return array_merge( $mrk , $mdl );
   }
   //$mm  = $ance->get_mrk_mdl( $t_v['marque_v'], $t_v['modele_v']);  
   } 
    function check_user($id_user){
     $obj = new Database();
     $us=$obj->cherche_rqt("SELECT type_cmpte , logo , pseudo FROM annonceur WHERE id_annonceur='$id_user' ");
     return $us[0];
    }
   ?>


