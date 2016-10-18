<?php

namespace src;



use \DateTime;

class Session {

/**
 ****************** init Attribut
 */

    protected $sessionDate;
    protected $creationDate;
    protected $idMovie;









/**
 * ********************** CONSTANTE
 */

const BILLET = 100;
const TROISD = true;




 /**
  * ********************** CONSTRUCT
  */

  public function __construct($sessionDate, $creationDate, $idMovie=''){
    $this->sessionDate = new DateTime($sessionDate);
    $this->creationDate = new DateTime($creationDate);
    $this->idMovie = $idMovie;


  }//endConstruct




/**
 ************** GETTER/SETTER ********************
 */

    /**
     * Get the value of init Attribut
     *
     * @return mixed
     */
    public function getSessionDate()
    {
        return $this->sessionDate;
    }

    /**
     * Set the value of init Attribut
     *
     * @param mixed sessionDate
     *
     * @return self
     */
    public function setSessionDate($sessionDate)
    {
        $this->sessionDate = $sessionDate;

        return $this;
    }

    /**
     * Get the value of Creation Date
     *
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set the value of Creation Date
     *
     * @param mixed creationDate
     *
     * @return self
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get the value of Id Movie
     *
     * @return mixed
     */
    public function getIdMovie()
    {
        return $this->idMovie;
    }

    /**
     * Set the value of Id Movie
     *
     * @param mixed idMovie
     *
     * @return self
     */
    public function setIdMovie($idMovie)
    {
        $this->idMovie = $idMovie;

        return $this;
    }


/**
 * ********************** MERTHODE
 */

public function formatDateSession(){
  $formatDate = 'Le ' . $this->sessionDate->format('d') . ' ' . $this->sessionDate->format('M') . ' ' . $this->sessionDate->format('Y') . ' à ' . $this->sessionDate->format('H') . 'h' . $this->sessionDate->format('i');


return $formatDate;
}


public function returnYear(){

  $onlyYear = "l'année courante est {$this->sessionDate->format('Y')}";

return $onlyYear;

}




public function subIntervalToDate(\DateInterval $intervalDate){


  $result = $this->sessionDate->sub($intervalDate);

  var_dump($result);
return $result->format('d/m/Y');
}













/**
* ********************** METHODE STATIC
*/
public static function diffBetweenDate(Session $date1, Session $date2){

  $diffDay = date_diff($date1->sessionDate, $date2->sessionDate);

  return $diffDay->format('%a jours');
}




public static function getSessionFromDate(Connection $connection, DateTime $dateAfter){
  $req = $connection->connect()->query(
  "SELECT id FROM sessions
  WHERE date_session > '{$dateAfter->format('Y-m-d')}'
  ");
  $resultQuery = $req->fetchAll();


  return $resultQuery;
  //var_dump($resultQuery);
}









}//endClass
















 ?>
