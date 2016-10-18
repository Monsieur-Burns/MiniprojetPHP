<?php

namespace src;

use \DateTime;

class Editeur extends  User
  {





/**
 * ********************** CONSTANTE
 */




/**
 * ********************** CONSTRUCT
 */
 // public function __construct(Connection $connection, $login, $password, $email){
 //   $this->login = $login;
 //   $this->password = $password;
 //   $this->email = $email;
 //   $this->dateAuth = new DateTime('now');
 //   $this->connection = $connection->connect();


// }//endConstruct


 /**
  * ********************** GETTER/SETTER
  */





/**
 * ********************** METHODE
 */


/**
 * ********************** STATIC METHODE
 */

public function editFilmParam( $id, Movies $film){
    $film=$film->updateMoviesFromID();

    return '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>Requete executée</div>';
  }









}//endClass


 ?>
