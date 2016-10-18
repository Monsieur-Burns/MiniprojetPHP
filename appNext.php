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



<?php
include 'src/Movies.php';
include 'src/Connection.php';
include 'lib/Connection.php';
include 'src/Personnel.php';
include 'src/Acteur.php';
include 'src/Session.php';
include 'src/Realisateur.php';


/// Attention deux classe portent le meme nombre
/// il faut rajouetr un namespace dans chaque Classe concernée
/// Puis faire un 'use / as'
///

use src\Connection as ConnectionSrc;
use lib\Connection as ConnectionLib;
use src\Movies;
use src\Acteur;
use src\Session;
use src\Realisateur;


$connection = new ConnectionSrc('localhost', 'root', 'troiswa', 'cinemal9', 'utf8');
 // $connection = new ConnectionSrc('127.0.0.1', 'root', 'burns', 'cinemal9', 'utf8');
// $connection = new ConnectionSrc('monsieurdecinema.mysql.db', 'monsieurdecinema', 'Sherpa1174', 'monsieurdecinema', 'utf8');
$connectionLib = new ConnectionLib('localhost', 'root', 'troiswa', 'cinemal9', 'utf8');


var_dump($connection,$connectionLib);




$objetActeurOne = new Acteur($connection);

$objetActeurOne->setPrenom('Jean');
$objetActeurOne->setNom('Reno');
$objetActeurOne->setDob('1948-07-30');
$objetActeurOne->setImage('http://fr.web.img1.acsta.net/cx_160_213/b_1_d6d6d6/pictures/15/12/08/15/41/448666.jpg');
$objetActeurOne->setRecompense('Cesar Meilleur Acteur 1995');
$objetActeurOne->setFilmJoue(['Leon','Da Vinci Code','Antigang','Blindés', 'Le Premier Cercle']);
$objetActeurOne->setBiographie("Juan Moreno y Herrera-Jiménez naît à Casablanca, au Maroc alors sous protectorat français, de parents espagnols, originaires d'Andalousie (son père était de Sanlúcar de Barrameda et sa mère était de Jerez de la Frontera) qui ont fui le régime de Franco. La famille s'installe ensuite en France métropolitaine en 1970. Naturalisé français, il continue par la suite de se sentir avant tout comme espagnol car « [ses] racines sont avant tout espagnoles, andalouses »2. Il décide de se lancer dans une carrière de comédien, et une fois revenu de son service militaire en Allemagne, monte une compagnie théâtrale avec Didier Flamand.

Jean Reno fait ses premières apparitions dans des films tels que Clair de femme de Costa-Gavras (1979) ou Le Dernier Combat de Luc Besson (1983) qu'il rencontre sur le tournage des Bidasses aux grandes manœuvres. Et c'est avec ce réalisateur qu'il se fait remarquer en 1985 dans son film Subway, dans lequel il joue aux côtés d'Isabelle Adjani, de Christophe Lambert, de Michel Galabru ou encore de Richard Bohringer.
Le succès à 40 ans
Jean Reno en 2010, à l'avant-première du film L'Immortel.

Mais c'est en 1988 avec le film Le Grand Bleu que l'acteur connaît véritablement le succès, à quarante ans. Devenu un acteur familier du public français, il retrouve Luc Besson pour Nikita où il fait une apparition dans le rôle d'un tueur, le « nettoyeur » Victor. Il confirme son accession au vedettariat avec L'Opération Corned-Beef, de Jean-Marie Poiré, dont il partage l'affiche avec Christian Clavier. Sa collaboration suivante avec le tandem Poiré-Clavier, Les Visiteurs, remporte en 1993 un immense succès au box-office français. L'année suivante, il est à nouveau dirigé par Luc Besson dans Léon, un film où il interprète le rôle d'un tueur naïf en partie inspiré de son personnage dans Nikita. Tourné en anglais aux États-Unis, Léon, qui révèle également la jeune Natalie Portman, confère à Jean Reno une notoriété internationale. Multipliant les registres, s'étant affirmé comme l'une des valeurs sûres du cinéma français, il est désormais sollicité par Hollywood et apparaît dans divers blockbusters américains comme Mission impossible, Godzilla, Ronin, La Panthère rose ou encore Da Vinci Code.

Reno a été nommé trois fois pour le César du meilleur acteur : deux fois pour un premier rôle grâce à Léon et Les Visiteurs, ainsi qu'une fois pour un second rôle dans Le Grand Bleu.

Il est également connu au Japon, depuis le succès qu'y a remporté le Grand Bleu, et a notamment tourné dans des publicités de Honda Orthia (1996)3,4 et dans Wasabi en 2001 avec Ryōko Hirosue.

Jean Reno a par ailleurs refusé le rôle de l'agent Smith dans le film Matrix (qui sera finalement joué par Hugo Weaving), choisissant plutôt de jouer dans Godzilla5. Il refuse ensuite un rôle dans Matrix Reloaded et Matrix Revolutions préférant rester en France avec sa famille6.");






// '::' permet l'appel d'une contante de la classe Connection
// il est impossible de modifier une constante genre $monObjet::VERSION = 2.0 ==> NON
$objetFilmUn = new Movies($connection);
echo '<div class="alert alert-success">' . $objetFilmUn::VERSION . '</div>';


/**
 * Créer une constante SGBD dans la classe Connection
 * Elle doit être égale à Mysql
 * + Afficher cette constante,
 * + Créer une constanrte dans la classe Acteur
 * 		langue qui soit égal à FR et pays égal à France
 * + Afficher ces deux constante
 */


echo '<div class="alert alert-success">' . $connection::SGBD . '</div>';
echo '<div class="alert alert-success">' . $objetActeurOne::LANGUE . '</div>';
echo '<div class="alert alert-success">' . $objetActeurOne::PAYS . '</div>';

//var_dump($objetActeurOne);


/**
 * Autre manière d'appelert un constantele nomClasse::CONSTANTE
 * la constante appartien à la classe et non à l'objet
 */

echo '<div class="alert alert-success">' . Acteur::LANGUE .' et '. Movies::VERSION .'</div>';

// appel de la mpethode static


echo '<div class="alert alert-success">' . Movies::getInfoOfMovies() .'</div>';



/**
 * Créer une méthode statique dans un Acteur qui
 * retounre la langue parlée et le pays en fonction
 * des constante LANGUE et PAYS
 */

echo '<div class="alert alert-success">' . Acteur::getLanguageFromActeur() .'</div>';


/**
 *************************************** MANIPULATION DATE
 */


$dateOne = new Session('2015-07-11 15:30:00', '2015-01-01 12:15:01');
$dateTwo = new Session('2015-12-06 07:00:36', '2013-06-06 18:45:02');
$dateThree = new Session('2012-01-06 10:25:00', '2011-09-23 05:20:02');

//var_dump($dateOne->formatDateSession());

echo '<div class="alert alert-success">' . $dateOne->formatDateSession() .'</div>';
echo '<div class="alert alert-success">' . $dateOne->returnYear() .'</div>';
echo '<div class="alert alert-success">' . Session::diffBetweenDate($dateOne, $dateTwo) .'</div>';





//echo '<div class="alert alert-success">' . Session::getSessionFromDate($connection, new DateTime('2013-04-01')) .'</div>';

$prochaineSession = Session::getSessionFromDate($connection, new DateTime('2013-04-01'));

//var_dump($prochaineSession);
?>

<div class="alert alert-success">
  <div class="row">  Les sessions sont :
    <?php foreach ($prochaineSession as $key => $value) {?>
        <?php echo  $value['id'] . ',' ;
       } ?>
  </div>
</div>



<?php
$intervale = new DateInterval("P2D");


$dateTwo->subIntervalToDate($intervale);
echo '<div class="alert alert-success">' . $dateOne->subIntervalToDate($intervale) .'</div>';

 ?>

<!-- ********************* fin div générale -->
    </div>
  </div>
</div>
