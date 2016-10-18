<?php

namespace src;


class Acteur extends Personnel {


/**
 * ----------------init Attribut
 */

  // protected $nom;
  // protected $prenom;
  // protected $dob;
  // protected $image;
  // protected $biographie;
  // protected $nationnalite;
  // protected $role;
  // protected $recompense;
  // protected $filmJoue = [];

/**
 * ********************** CONSTANTE
 */
  const LANGUE = 'fr';
  const PAYS = 'France';


/**
 *--------------- Construct
 */
public function __construct(Connection $connection, $nationnalite='Française', $role='Acteur de films'){
  $this->connection = $connection->connect();
  $this->nationnalite = $nationnalite;
  $this->role = $role;
}//endConstruct




    /**
     * Get the value of init Attribut
     *
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of init Attribut
     *
     * @param mixed nom
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of Prenom
     *
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of Prenom
     *
     * @param mixed prenom
     *
     * @return self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of Dob
     *
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set the value of Dob
     *
     * @param mixed dob
     *
     * @return self
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get the value of Image
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of Image
     *
     * @param mixed image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of Biographie
     *
     * @return mixed
     */
    public function getBiographie()
    {
        return $this->biographie;
    }

    /**
     * Set the value of Biographie
     *
     * @param mixed biographie
     *
     * @return self
     */
    public function setBiographie($biographie)
    {
        $this->biographie = $biographie;

        return $this;
    }

    /**
     * Get the value of Nationnalite
     *
     * @return mixed
     */
    public function getNationnalite()
    {
        return $this->nationnalite;
    }

    /**
     * Set the value of Nationnalite
     *
     * @param mixed nationnalite
     *
     * @return self
     */
    public function setNationnalite($nationnalite)
    {
        $this->nationnalite = $nationnalite;

        return $this;
    }

    /**
     * Get the value of Role
     *
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of Role
     *
     * @param mixed role
     *
     * @return self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of Recompense
     *
     * @return mixed
     */
    public function getRecompense()
    {
        return $this->recompense;
    }

    /**
     * Set the value of Recompense
     *
     * @param mixed recompense
     *
     * @return self
     */
    public function setRecompense($recompense)
    {
        $this->recompense = $recompense;

        return $this;
    }

    /**
     * Get the value of Film Joue
     *
     * @return mixed
     */
    public function getFilmJoue()
    {
        return $this->filmJoue;
    }

    /**
     * Set the value of Film Joue
     *
     * @param mixed filmJoue
     *
     * @return self
     */
    public function setFilmJoue($filmJoue)
    {
        $this->filmJoue = $filmJoue;

        return $this;
    }

/**
 * ---------------------------- METHODES
 */



/**
 * [insertActeurInDB description] : Insérer les attributs de l'acteur courant
 *en basse de donnée
 *
 * @return void
 */
 public function insertActeurInDB(){
   if ($this->existActeurInDb() == false) {
     $req=$this->connection->prepare("
     INSERT INTO actors(firstname, lastname, dob, image, nationality, biography, roles, recompenses)
     VALUES(:prenom, :nom, :dob, :image, :nationnalite, :biographie, :role, :recompense)
     ");

     $req->execute([
       'prenom' => $this->prenom,
       'nom' => $this->nom,
       'dob' => $this->dob,
       'image' => $this->image,
       'nationnalite' => $this->nationnalite,
       'biographie' => $this->biographie,
       'role' => $this->role,
       'recompense' => $this->recompense,
     ]);
   }
 }



 /**
  * Verifi en base de donnée si le nom de l'acteur est déja dans la table actors
  * @return bool
  */
 public function existActeurInDb(){
   $req = $this->connection->query(
   "SELECT lastname FROM actors
   WHERE lastname = '{$this->nom}'
   ");
   $resultQuery = $req->fetch();
   //var_dump($resultQuery);

   if ($resultQuery == false) {
     return false;
   }else {
     return true;
   }
 }


public function setImageActeurs($lienImage){
  $req=$this->connection->prepare(
  "UPDATE actors
  SET image= :image
  WHERE lastname = '{$this->nom}'
  ");

  $req->execute([
    'image' => $lienImage,
  ]);
}


public function checkImageProvier(){
  $pattern='/^(http)s?(:\/\/)(.+.)?(facebook|google|twitter)(.+)$/i';
  $req = $this->connection->query(
  "SELECT image FROM actors
  WHERE lastname = '{$this->nom}'
  ");

  $resultQuery = $req->fetch();
  var_dump($resultQuery);

  if (preg_match($pattern, $resultQuery['image']) == true) {
    echo "toto";
  }else {
    echo 'tutu';
  }
}

/*
SOUS REQUETE JULIEN

SELECT COUNT( groupe.nb )
FROM (

SELECT COUNT( * ) AS nb
FROM actors_movies
GROUP BY actors_id
) AS groupe
*/




//
// ublic function updateMoviesFromID($id, Movies $movie){
//   $req=$this->connection->prepare(
//   "UPDATE movies
//     SET title= :titre,
//       synopsis= :synopsis,
//       annee= :annee,
//       date_release= :dateRelease,
//       budget= :budget,
//       visible= :visible,
//       distributeur= :distributeur
//       WHERE id = :id
//
//

/**
 * ******************* METHODE static
 * uniquerme,nt pour traiter avec des constantes
 * jamais de $this dans un methode static, on utilise 'self'
 */

public static function getLanguageFromActeur(){
  if (self::LANGUE =='fr' && self::PAYS == 'France') {
      return '<div>La langue et le pays sont : ' . self::LANGUE.' et '.self::PAYS.'</div>';
  }
return '<div>La langue et le pays ne sont pas connus</div>';
}




}// endClass



























 ?>
