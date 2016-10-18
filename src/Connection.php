<?php

// Creation du namespace
// le name space est toujours egal au nom du dossier qui le contient
// a mettre toujours au dessus de la déclration de la classe

namespace src;





// Classe représentative de ma connection à la DB

class Connection {


  /**
  * Attribut host
  */
    protected $host ='localhost';

  /**
  * Attribut login
  */
    protected $login;

  /**
  * Attribut paswword
  */
    protected $password;

  /**
  * Attribut charset
  * Définir une valeur par défaut -> renseigner directement l'attribut (= 'xxx')
  */
    protected $charset = 'utf8';

  /**
  * Attribut dbName
  */
    protected $dbName;

  /**
  * Attribut temps de connection
  */
    protected $timeout = 3;

  /**
   * attribut = port de connection
   * @var Integer
   */
    protected $port;



/**
 * ***************** CONSTANTES
 */

const SGBD = 'MySql';


















  /**
   * Methodes dites magique qui permet d'initialiser mon objet
   * constructeur de ma classe
   * la methode peut retourner un objet
   */
  public function __construct($host, $login, $password, $dbName, $charset){
    $this->host = $host;
    $this->login = $login;
    $this->password = $password;
    $this->dbName = $dbName;
    $this->charset = $charset;
  }

  /*
  ***************************** Getter => Accéder à un attribut protegé
  */

  public function getHost(){
    return $this->host;
  }

  public function getLogin(){
    return $this->login;
  }

  public function getPassword(){
    return $this->password;
  }

  public function getCharset(){
    return $this->charset;
  }

  public function getTimeout(){
    return $this->timeout;
  }

  public function getDBname(){
    return $this->dbName;
  }

  /*
  ***************************** Setter => Modifier un attribut protegé
  */

  public function setHost($host){
     $this->host = $host;
  }

  public function setLogin($login){
     $this->login = $login;
  }

  public function setPassword($password){
     $this->password = $password;
  }

  public function setCharset($charset){
     $this->charset = $charset;
  }

  public function setTimeout($timeout){
     $this->timeout = $timeout;
  }

  public function setDBname($dbName){
     $this->dbName = $dbName;
  }

// *************** $this représente l'objet courrant dans ma classe

// un fonction dans une classe est appelée une mcrypt_enc_is_block_algorithm_mode
public function info(){
  return '<span class="label label-success">Le login de connection est : ' . $this->login . ', et le mot de passe est : ' . $this->password. ' sur la base de donnée ' .$this->dbName.'.</span><br>';
}

/*
* Créer une méthde dans la classe connection quipermet d'afficcher dans une alerte bootstrap
* le charset et le nom de la DB de mes connections


* Bonus : Ajouter un param qui permet de régler la couleur de l'alerte
*/


public function infoDB($couleur,$icon='exclamation'){
  if (preg_match("/^(info|warning|danger|success)$/i",$couleur)) {
    return '<span class="alert alert-'.$couleur.'"><i class="fa fa-'.$icon.'"></i>
    Le charset de la connection est : ' . $this->charset . ',sur la database : ' . $this->dbName.'</span><br>';
  }else {
    return "<div class='alert alert-danger'>Attention cette classe bootstrap n'existe pas.</div>";
  }
}

/*
* Créer une méthode qui m'affiche toutes mes informations de la connection
* sous une div Jumbotron
*/

public function InfoAll(){
  return '<div class="jumbotron"><h1>'.$this->dbName.'</h1><p>les info pour cette database sont :</p><p>hebergeur :'.$this->host.', avec pour login : '.$this->login.', et pour mot de passe :'.$this->password.', Le Charset est défini sir '.$this->charset.'</p></div>
';
}



/*
* Exercice 3
* Créer une méthode qui prend en paramètre un tableau de 3 objets Connection
* et qui affiche le login et le mot de passe" pour chaque objet sous une alert bootstrap
*/

public function infoObjet($tabObjet){

  $html = "";
  foreach ($tabObjet as $key => $value) {
    $html = $html .  '<div class="alert alert-success">Pour la base de donnée : '.$value->dbName.', les informations sont les suivantes : '.$value->login.', pour le login, '.$value->password.', pour le mot de passe</div><br>';
    }

  return $html;
}


/*
* Créer une méthode qui permet d'afficher dans une colone (col-X) de Bootstrap
* le jumbotron qui récapitule les informations d'une connection.
* En paramètrre de la methode, le numer de la colonne (par défaut 3)
*/
public function setColBS($colValue = 3){
  return '<div class="col-md-'.$colValue.'"><div class="jumbotron"><h1>'.$this->dbName.'</h1><p>les info pour cette database sont :</p><p>hebergeur :'.$this->host.', avec pour login : '.$this->login.', et pour mot de passe :'.$this->password.', Le Charset est défini sir '.$this->charset.'</p></div></div>';

}

/*
* Version 2 avec appel de methode dans methode
*/
public function setColBSAdvanced($colValue = 3){
  return '<div class="col-md-'.$colValue.'">'.$this->InfoAll().'</div>';

}

/**
 * Method permettant de parcourir un tableau d'objet
 * et d'appeler pour chaqueobjet du tableau la Method
 * permettant d'afficher les info dans un jumbotron bootstrap
 * @param [type] $tabObject [tableau d'objet]
 * @return html généré
 */
public function setColBSAdvancedTab($tabObject=[], $colValue){
  $html = "";
  foreach ($tabObject as $key => $value) {
    $html .= $value->setColBSAdvanced($colValue);
  }
  return $html;
}



/**
 * Créer une methode qui compare 2 objet Connection et retourne tru si ils ont le meme logogin
 * et false si contreire
 * @param  Connection $objet
 * @return [type]  true/false
 * Type Hinting : type l'objet en parametre => compare2object(''Connection'' $objet)
 */
public function compare2object(Connection $objet){
  if ($this->login == $objet->login && $this->password == $objet->password) {
    return true;
  }else {
    return false;
  }
}

/**
 * Créer une méthode connect() dans la classe Connexion qui retourne
 * un objet PDO permettant la connexion à la BDD Cinema L9
 */

/**
 * Initialisation des parametre de connection PDO
 * @param  [type] $dbName   nom de la base de donnée
 * @param  [type] $login    login de la base de donnée
 * @param  [type] $password password de la base de donnée
 * @param  [type] $host     paramètre de l'hebergement DB
 * @param  [type] $charset  definition du charset
 * @return [type]           un objet PDO
 */

public function connect(){
  $db = new  \PDO("mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}",$this->login,$this->password);

  return $db;
}










}//endClass












 ?>
