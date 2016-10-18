<?php
ini_set('display_errors',1);
include 'header.php';
require 'vendor/autoload.php';

?>

<!-- ********************* debut div générale -->
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <br>
      <div class="well">







<?php

include "src/Connection.php";
include "src/Personnel.php";
include "src/Acteur.php";
include "src/Realisateur.php";
include "src/ActeurSerie.php";
include "src/ActeurFilm.php";
include "src/Movies.php";
include "src/Dvd.php";
include "src/DvdRom.php";
include "src/Blueray.php";
include "src/User.php";
include "src/Editeur.php";

use src\Connection;
use src\Acteur;
use src\Realisateur;
use src\ActeurSerie;
use src\ActeurFilm;
use src\Movies;
use src\Dvd;
use src\DvdRom;
use src\Blueray;
use src\User;
use src\Editeur;

//$connection = new Connection('localhost', 'root', 'troiswa', 'cinemal9', 'utf8');
 // $connection = new Connection('127.0.0.1', 'root', 'burns', 'cinemal9', 'utf8');
$connection = new Connection('monsieurdecinema.mysql.db', 'monsieurdecinema', 'Sherpa1174', 'monsieurdecinema', 'utf8');

// DECLARATION DES OBJETS /////////////////////////////
//
//


$userOne = new User($connection,'toto', 'titi', 'tutu@tata.ty');
$userOne->setImage('http://123freeavatars.com/new/3.gif');


$userOne->cryptPassword($userOne);

dump($userOne);
dump($userOne->checkMail($userOne));

if ($userOne->checkMail($userOne)) {
  echo('<div class="alert alert-success">Adresse indiquée (' . $userOne->getEmail() . '), est valide</div>');
}else {
  echo('<div class="alert alert-danger">Adresse indiquée (' . $userOne->getEmail() . '), est invalide</div>');
}

if ($userOne->checkUrlImage($userOne)) {
  echo('<div class="alert alert-success">Url indiquée (' . $userOne->getImage() . '), provient de Facebook ou Google</div>');
}else {
  echo('<div class="alert alert-danger">Url indiquée (' . $userOne->getImage() . '),ne provient pas de Facebook ou Google</div>');
}
?>













<!-- ********************* fin div générale -->
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>
