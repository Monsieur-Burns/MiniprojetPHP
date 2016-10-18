<?php
namespace src;

use \DateTime;

class Movies {


/**
 * init Attribut
 */

  protected $titre;
  protected $synopsis;
  protected $annee;
  protected $dateRelease;
  protected $budget;
  protected $visible=true;
  protected $distributeur;
  protected $connection;
  protected $id;
  protected $prixTTC;
  protected $TVA;
  protected $diametre;
  protected $poids;
  protected $fabricant;
  protected $coucheDouble;
  protected $couleur;



  /**
   * LES CONSTANTES
   * c'est l'inverse d'un variable -(paramètre immuable)
   * une constante s'appelle comme tel => 'echo $monObjet::CONSTANTE'
   * la constante est toujours en CAP
   */

  const VERSION = '1.0';

  // utilsation de constan,te vie des methose static (voir sous les methode)


/**
 * [__construct description]
 * @param Connection $connection   [description]
 * @param string     $annee        [description]
 * @param [type]     $distributeur [description]
 */
public function __construct(Connection $connection, $annee = '', $distributeur='', $id=''){
  $this->annee = $annee;
  $this->distributeur = $distributeur;
  $this->id = $id;
  //j'initialise ma connection à la base de donnée par l'intermédiaire de mon objet connection
  $this->connection = $connection->connect();
  if ($annee == "") {
    $this->annee= date('Y');
  }else {
    $this->annee = $annee;
  }
}


/**
 * getter
 */

public function getTitre(){
  return $this->titre;
}

public function getSynopsis(){
  return $this->synopsis;
}

public function getAnnee(){
  return $this->annee;
}

public function getDateRelease(){
  return $this->dateRelease;
}

public function getBudget(){
  return $this->budget;
}

public function getVisible(){
  return $this->visible;
}

public function getDistributeur(){
  return $this->distributeur;
}

public function getConnection(){
  return $this->connection;
}
public function getID(){
  return $this->id;
}
public function getPrixTTC(){
  return $this->prixTTC;
}
public function getTVA(){
  return $this->TVA;
}



/**
 * Setter
 */

public function setTitre($titre){
   $this->titre = $titre;
}

public function setSynopsis($synopsis){
   $this->synopsis = $synopsis;
}

public function setAnnee($annee){
   $this->annee = $annee;
}

public function setDateRelease($dateRelease){
   $this->dateRelease = $dateRelease;
}

public function setBudget($budget){

  $this->budget = $budget;
  //$this->formatBudget();
}

public function setVisible($visible){
   $this->visible = $visible;
}

public function setDistributeur($distributeur){
   $this->distributeur = $distributeur;
}

public function setConnection($connection){
   $this->connection = $connection;
}

public function setID($id){
   $this->id = $id;
}

public function setPrixTTC($prixTTC){
   $this->prixTTC = $prixTTC;
}

public function setTVA($TVA){
   $this->TVA = $TVA;
}


/**
 * Get the value of Diametre
 *
 * @return mixed
 */
public function getDiametre()
{
    return $this->diametre;
}

/**
 * Set the value of Diametre
 *
 * @param mixed diametre
 *
 * @return self
 */
public function setDiametre($diametre)
{
    $this->diametre = $diametre;

    return $this;
}


  /**
   * Get the value of Poids
   *
   * @return mixed
   */
  public function getPoids()
  {
      return $this->poids;
  }

  /**
   * Set the value of Poids
   *
   * @param mixed poids
   *
   * @return self
   */
  public function setPoids($poids)
  {
      $this->poids = $poids;

      return $this;
  }

  /**
   * Get the value of Fabricant
   *
   * @return mixed
   */
  public function getFabricant()
  {
      return $this->fabricant;
  }

  /**
   * Set the value of Fabricant
   *
   * @param mixed fabricant
   *
   * @return self
   */
  public function setFabricant($fabricant)
  {
      $this->fabricant = $fabricant;

      return $this;
  }

  /**
   * Get the value of Couche Double
   *
   * @return mixed
   */
  public function getCoucheDouble()
  {
      return $this->coucheDouble;
  }

  /**
   * Set the value of Couche Double
   *
   * @param mixed coucheDouble
   *
   * @return self
   */
  public function setCoucheDouble($coucheDouble)
  {
      $this->coucheDouble = $coucheDouble;

      return $this;
  }


      /**
       * Get the value of Couleur
       *
       * @return mixed
       */
      public function getCouleur()
      {
          return $this->couleur;
      }

      /**
       * Set the value of Couleur
       *
       * @param mixed couleur
       *
       * @return self
       */
      public function setCouleur($couleur)
      {
          $this->couleur = $couleur;

          return $this;
      }




/**
 ****************** Methodes
 */

/**
 * [InfoMovies description] renvoie les information de l'objet Film définir
 * et retourne les réponses dans des classe bootstrap
 */
public function InfoMovies(){
  return "<div class='jumbotron'>
    <h2>{$this->titre}</h2><br>
    <h3>Synopsis : </h3>
    <p><em><small>{$this->synopsis}</small></em></p><br>
    <span class='label label-primary'>{$this->annee}</span>
    <span class='label label-primary'>{$this->dateRelease}</span>
    <span class='label label-primary'>{$this->budget}</span>
    <span class='label label-primary'>{$this->distributeur}</span>
  </div>";
}


/**
 * [formatBudget description] Formatte un nombre au format francais et avec le signe Euro
 * @return [type] nombre formaté
 */
public function formatBudget(){
  $this->budget = number_format($this->budget, 2, ',', ' ').'€';
}

/**
 * [Comparer le budget de deux films]
 * @param  Movies $objet [deuxième objet à comparer]
 * @return [String] [retourne: Titre du film le plus cher]
 */
public function compareMoviesBudget(Movies $objet){
  if ($this->budget >= $objet->budget) {
    return "{$this->titre} a le plus gros Budget ({$this->budget})";
  }else {
    return "{$objet->titre}  a le plus gros Budget ({$objet->budget})";
  }
}

/**
 * Compte le nombre de mots contenus dans l'attiribut synopsis
 * @return String :  retourne un label bootstrap contenant le nom du film et un badge bootstrap
 * contenant le nombre de mots comptés
 */
public function countWordsSynopsis(){

  $countWord = str_word_count($this->synopsis);

  return "<button class='btn btn-primary' type='button'>
          Nombre de mots dans le synopsis de <strong>{$this->titre}</strong> <span class='badge'><strong>{$countWord}</strong></span>
          </button>";
}

/**
 * Methode qui verifie si l'attribut Distributeur est 'Warner' et si l'attribut
 * 'visible' est sur visible (1)
 * @return Bool Vrai si distributeur = warner et visible = 1
 */
public function checkDistrVisible(){
  if ($this->distributeur == 'Warner Bros' && $this->visible = 1) {
    return true;
  }
}

/**
* + Créer une methode qui prends en paramentre un tableau de film
* et qui me retourne le nb de film qui ont un budget inférieur à 1 000 000€
*/
/**
 * Compte le nombre de film ayant un bduget sup a 1 000 000
 * @param  un tableau d'objet
 * @return Integer   (cmpteur nombre de film)
 */
public function getNbFilmGrosBudget($tabObjet=[]) {
  $nbFilm=0;
  foreach ($tabObjet as $key => $value) {
    //var_dump( (int) str_replace( " ", "", $value->budget));
    if ((int) str_replace( " ", "", $value->budget) >= 1000000) {
      $nbFilm ++;
    }
  }
  return $nbFilm;
}

/**
 * + Créer une méthode qui prends en parametre un tableau de film et
 * qui me retourne la moyenne des budgets inférieur à 1 000 000€
 */

/**
 * Calclul l amoyenne de budget des film ayant un petit budget (moins de 1 000 000)
 * @param  [array] tableau d'objet
 * @return [integer] moyenne des budget ()
 */
public function getMoyFilmPetitBudget($tabObjet=[]){
  $budgetTot =  $nbFilm =  $budgetMoyen =0;

  foreach ($tabObjet as $key => $value) {
    if ((int) str_replace( " ", "", $value->budget) <= 10000000) {
      $budgetTot = $budgetTot + ((int) str_replace( " ", "", $value->budget));
      $nbFilm ++;
    }
  }
  return $budgetMoyen = ($budgetTot/$nbFilm);
}

/**
 * [insertMovieInDB description] inserer les paramètre de l'objet movie en DB
 * @return [type] [description]
 */
public function insertMovieInDB(){
  if ($this->existMoviesInDb() == false) {
    $req=$this->connection->prepare("
    INSERT INTO movies(title, synopsis, annee, budget, date_release, distributeur, visible)
    VALUES(:title, :synopsis, :annee, :budget, :date_release, :distributeur, :visible)
    ");

    $req->execute([
      'title' => $this->titre,
      'synopsis' => $this->synopsis,
      'annee' => $this->annee,
      'budget' => $this->budget,
      'date_release' => $this->dateRelease,
      'distributeur' => $this->distributeur,
      'visible' => $this->visible,
    ]);
    return '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>Requete executée</div>';
  }
  return '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>Requete non executée</div>';
}



/*************************/

/**
 * Récupere les " derniers film sortis en français"
 * @return [array] tableau des réponses
 *
 */
public function getLastThreeFrMovies($bo, $distributeur){

  $req = $this->connection->query(
  "SELECT title, languages, date_release, synopsis, annee, bo, distributeur
  FROM movies
  WHERE languages = 'fr' AND visible = 1 AND distributeur = '{$distributeur}' AND bo = '{$bo}'
  ORDER BY date_release DESC
  LIMIT 3
  ");
  $resultQuery = $req->fetchAll();

  return $resultQuery;
}

/**
 * Inserie plusieurs film dans un la table movie de la DB
 * @param  collection d'objet (table d'objet)
 * @return void
 */
public function injectTab2film($tab2film=[]){
  foreach ($tab2film as $key => $value) {
    if ($value->existMoviesInDb() == false) {
      $value->insertMovieInDB();
    }
  }
}

/**
 * Verifi en base de donnée si le titre du film existe déja dans la table movies
 * @return bool
 */
public function existMoviesInDb(){
  $req = $this->connection->query(
  "SELECT title FROM movies
  WHERE title = '{$this->titre}'
  ");
  //var_dump($this->titre);
  $resultQuery = $req->fetch();

  if ($resultQuery == false) {
    return false;
  }else {
    return true;
  }
}

/**
 * Supprimer un film en base de donnée selon un id donné
 * @param  [type] $id id du film a suppriumer
 * @return String
 */
public function deleteMovieFromID($id){
  $req=$this->connection->prepare("
  DELETE FROM movies WHERE id = :id
  ");

  $req->execute([
    'id' => $id,
  ]);
  return "requete executée";
}


/**
 * [updateMoviesFromID description]
 * @param  [type] $id    ID du film à modifier
 * @param  Movies $movie Onjet Filmm
 * @return [type]        Bootsrap alert pour requete ok
 */
public function updateMoviesFromID($id, Movies $movie){
  $req=$this->connection->prepare(
  "UPDATE movies
    SET title= :titre,
      synopsis= :synopsis,
      annee= :annee,
      date_release= :dateRelease,
      budget= :budget,
      visible= :visible,
      distributeur= :distributeur
      WHERE id = :id

  ");

  $req->execute([
    'id' => $id,
    'titre' => $movie->titre,
    'synopsis' => $movie->synopsis,
    'annee' => $movie->annee,
    'dateRelease' => $movie->dateRelease,
    'budget' => $movie->budget,
    'visible' => $movie->visible,
    'distributeur' => $movie->distributeur,
  ]);
  return '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>Requete executée</div>';
}


/**
 * Verifier la presence d'un film en base de donnée par son titre
 * @param  String : titre à rechercher
 * @return Boolean : true si vrai
 */
public function findMovieFromTitle($titre){
  $req = $this->connection->query(
  "SELECT title FROM movies
  WHERE title = '{$titre}'
  ");
  $resultQuery = $req->fetch();
  //var_dump($resultQuery);

  if ($resultQuery == false) {
    return false;
  }else {
    return true;
  }
}

/**
 * Compter le nombre de film en DB ayant un buget compris en deux param donné
 * @param  [Integer] $budgetMin Budget minimum
 * @param  [Integer] $budgetMax Budget maximum
 * @return Alert bootstrap contenant le nbr de film trouvé en DB selon les critères donnés
 */
public function countMoviesBetweenValue($budgetMin, $budgetMax){
  $req = $this->connection->query(
  "SELECT count(title) AS nbrFilm
  FROM movies WHERE budget > '{$budgetMin}' AND budget < '{$budgetMax}'
  ");
  $resultQuery = $req->fetch();

  return "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span>&times;</span></button>Il y a {$resultQuery['nbrFilm']} film ayant un budget compris entre {$budgetMin} et {$budgetMax}</div>";
}


/**
 * Test la date_release avec formatage de l'objet (DateTime) trouvé en DB
 * @param  objet Movies
 * @return Boolean
 */
public function testDateReleaseFromMovie (Movies $movie){
  $req=$this->connection->query(
    "SELECT *
    FROM movies
    WHERE title= '{$movie->titre}'
  ");
  $resultQuery = $req->fetch();
    $myDate = DateTime::createFromFormat('Y-m-d', $resultQuery["date_release"]);
    $myDateTimeNow = new DateTime('now');

    if ($myDate > $myDateTimeNow == true) {
      return "après";
    }
    return "avant";
}


/**
 * Récuperer mes info d'un catégarie selon l'id du film defini en parametre
 * @param  $id    id du film
 * @param  string titre du film
 * @return Array Titre de la categorie et Description de la catégorie
 */
public function getCatInfoFromID($id, $titre=''){
  $req=$this->connection->query(
    "SELECT categories.id AS catid,
            categories.title AS cattitle,
            categories.description AS catdesc,
            movies.id AS moviesid,
            movies.title AS movietitle
    FROM categories
    INNER JOIN movies ON categories.id = movies.categories_id
    WHERE movies.id = '{$id}' OR movies.title = '{$titre}'
  ");
  $resultQuery = $req->fetch();

  return ['cattitle'=>$resultQuery['cattitle'],'catdesc'=>$resultQuery['catdesc']];
}



/**
 * calcul le budhet moyen de 5 objets donné en paramètre
 * @param  [type] $filmUn     [description]
 * @param  [type] $filmDeux   [description]
 * @param  [type] $filmTrois  [description]
 * @param  [type] $filmQuatre [description]
 * @param  [type] $fimCinq    [description]
 * @return Integer : mouenne calculée
 */
public function getBudgetAverage($filmUn, $filmDeux, $filmTrois, $filmQuatre, $filmCinq)
{
  $budgetSUM = $filmUn->budget + $filmDeux->budget + $filmTrois->budget + $filmQuatre->budget + $filmCinq->budget;
  $nbrFilm = func_num_args();
  $averageBudget = $budgetSUM / $nbrFilm;

  return $averageBudget;
}



/**
 * Mofifier le prix TTC d'après 2 paramètre, remise numériaire ou remise pourcentage
 * @param integer $remiseEuro     remise numéraire
 * @param integer $remisePourcent remise pourcentage
 * @return integet Nouveau prix TTC
 */
public function setPrixFromPromo($remiseEuro = 0, $remisePourcent = 0){
  if ($remiseEuro != 0) {
    $this->prixTTC = $this->prixTTC - $remiseEuro;
  }
  if ($remisePourcent != 0) {
    $this->prixTTC = $this->prixTTC - (($this->prixTTC * $remisePourcent)/100);
  }

return $this->prixTTC;

}


/**
 * Tester si la date de release d'un objet film est la meme que l'année en cours
 * @param  Movies $movieOne objet Film
 * @return Boolean     vrai le film est sorti cette année
 */
public function testYearReleaseFromMovies(Movies $movieOne){
  $req=$this->connection->query(
    "SELECT *
    FROM movies
    WHERE title = '{$movieOne->titre}'
  ");
  $resultQuery = $req->fetch();
    $movieDr = DateTime::createFromFormat('Y-m-d', $resultQuery["date_release"]);
    $dateTimeNow = new DateTime('now');
    $actualYear = $dateTimeNow->format('Y');
    $movieYear = $movieDr->format('Y');


    if ($actualYear == $movieYear) {
      return "true";
    }
    return "false";
}


public function countMonthBetweenMovies(Movies $movieOne, Movies $movieTwo ){

  $dateMovieOne = DateTime::createFromFormat('Y-m-d', $movieOne->dateRelease);
  $dateMovieTwo = DateTime::createFromFormat('Y-m-d', $movieTwo->dateRelease);

  $interval = date_diff($dateMovieOne, $dateMovieTwo);
  $diffMois = $interval->format('%M mois, soit %a jours');

  //var_dump($diffMois);
    // $movieDr = DateTime::createFromFormat('Y-m-d', $resultQuery["date_release"]);
    // $dateTimeNow = new DateTime('now');
    // $actualYear = $dateTimeNow->format('Y');
    // $movieYear = $movieDr->format('Y');

return $diffMois;
}




















/**
 * ******************* METHODE static
 * uniquerme,nt pour traiter avec des constantes
 * jamais de $this dans un methode static, on utilise 'self'
 */

public static function getInfoOfMovies(){
  return '<div>La version par défaut de tous les films est : ' . self::VERSION.'</div>';
}





















} //endClass
 ?>
