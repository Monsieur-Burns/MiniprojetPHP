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

use src\Connection;
use src\Acteur;
use src\Realisateur;
use src\ActeurSerie;
use src\ActeurFilm;
use src\Movies;
use src\Dvd;
use src\DvdRom;
use src\Blueray;

//$connection = new Connection('localhost', 'root', 'troiswa', 'cinemal9', 'utf8');
 $connection = new Connection('127.0.0.1', 'root', 'burns', 'cinemal9', 'utf8');
// $connection = new Connection('monsieurdecinema.mysql.db', 'monsieurdecinema', 'Sherpa1174', 'monsieurdecinema', 'utf8');

// DECLARATION DES OBJETS /////////////////////////////

$filmDVDun = new Dvd($connection);
$filmDVDun->setTitre('Le Monde de Dory');
$filmDVDun->setSynopsis("Dory, le poisson chirurgien bleu amnésique, retrouve ses amis Nemo et Marlin. Tous trois se lancent à la recherche du passé de Dory. Pourra-t-elle retrouver ses souvenirs ? Qui sont ses parents ? Et où a-t-elle bien pu apprendre à parler la langue des baleines ? ");
$filmDVDun->setAnnee(2016);
$filmDVDun->setDateRelease('2016-06-22');
$filmDVDun->setBudget(20000000);
$filmDVDun->setVisible(1);
$filmDVDun->setDistributeur('The Walt Disney Company France');
$filmDVDun->setPrixTTC(17.99);
$filmDVDun->setTVA(19.6);
$filmDVDun->setCapacite('4,2 Go');
$filmDVDun->setFabricant('Sony');
$filmDVDun->setDiametre('12cm');
$filmDVDun->setPoids('135gr');
$filmDVDun->setCoucheDouble(true);


$filmDVDdeux = new Dvd($connection);
$filmDVDdeux->setTitre("Lidéal");
$filmDVDdeux->setSynopsis("L'ancien concepteur-rédacteur Octave Parango de « 99 francs » s'est reconverti dans le model scouting à Moscou. Cet hédoniste cynique mène une vie très agréable dans les bras de jeunes mannequins russes et les jets privés de ses amis oligarques... jusqu'au jour où il est contacté par L'Idéal, la première entreprise de cosmétiques au monde, secouée par un gigantesque scandale médiatique.
Notre antihéros aura sept jours pour trouver une nouvelle égérie en sillonnant les confins de la Russie post-communiste, sous les ordres de Valentine Winfeld, une directrice visuelle sèche et autoritaire.
Entre les réunions de crise à Paris, les castings à Moscou, une élection de Miss en Sibérie, une fête chez un milliardaire poutinien et une quête des new faces aux quatre coins de l'ex-URSS, le fêtard paresseux et la workaholic frigide vont apprendre à se supporter et peut-être même à se sauver. ");
$filmDVDdeux->setAnnee(2016);
$filmDVDdeux->setDateRelease('2016-06-15');
$filmDVDdeux->setBudget(7500000);
$filmDVDdeux->setVisible(1);
$filmDVDdeux->setDistributeur('Légende Distribution');
$filmDVDdeux->setPrixTTC(15.39);
$filmDVDdeux->setTVA(19.6);
$filmDVDdeux->setCapacite('4,2 Go');
$filmDVDdeux->setFabricant('Philipps');
$filmDVDdeux->setDiametre('12cm');
$filmDVDdeux->setPoids('135gr');
$filmDVDdeux->setCoucheDouble(true);

$filmDVDtrois = new Dvd($connection);
$filmDVDtrois->setTitre('Ma Meilleure Amie');
$filmDVDtrois->setSynopsis("Milly et Jess sont deux meilleures amies inséparables depuis l’enfance. Alors que Milly se voit diagnostiquer une grave maladie, Jess tombe enceinte de son premier enfant... ");
$filmDVDtrois->setAnnee(2016);
$filmDVDtrois->setDateRelease('2016-06-15');
$filmDVDtrois->setBudget(15000000);
$filmDVDtrois->setVisible(1);
$filmDVDtrois->setDistributeur('Océan Film');
$filmDVDtrois->setPrixTTC(21.00);
$filmDVDtrois->setTVA(19.6);
$filmDVDtrois->setCapacite('8,5 Go');
$filmDVDtrois->setFabricant('Toshiba');
$filmDVDtrois->setDiametre('12cm');
$filmDVDtrois->setPoids('135gr');
$filmDVDtrois->setCoucheDouble(false);

$filmDVDquatre = new Dvd($connection);
$filmDVDquatre->setTitre('Un traître idéal');
$filmDVDquatre->setSynopsis("En vacances à Marrakech, un couple d’Anglais, Perry et Gail, se lie d’amitié avec un millionnaire russe nommé Dima. Ils ignorent que cet homme charismatique et extravagant blanchit l’argent de la mafia russe… Lorsque Dima demande leur aide pour livrer des informations explosives aux services secrets britanniques, la vie de Perry et Gail bascule. À travers toute l’Europe, ils se retrouvent plongés dans un monde de manipulation et de danger où chaque faux pas peut leur coûter la vie. Pour avoir une chance de s’en sortir, ils vont devoir faire équipe avec un agent anglais aux méthodes vraiment particulières… ");
$filmDVDquatre->setAnnee(2016);
$filmDVDquatre->setDateRelease('2016-06-15');
$filmDVDquatre->setBudget(8000000);
$filmDVDquatre->setVisible(1);
$filmDVDquatre->setDistributeur('StudioCanal');
$filmDVDquatre->setPrixTTC(17.49);
$filmDVDquatre->setTVA(19.6);
$filmDVDquatre->setCapacite('4,7 Go');
$filmDVDquatre->setFabricant('Sony');
$filmDVDquatre->setDiametre('12cm');
$filmDVDquatre->setPoids('135gr');
$filmDVDquatre->setCoucheDouble(false);

$filmDVDcinq = new Dvd($connection);
$filmDVDcinq->setTitre("Alice de l'autre côté du miroir");
$filmDVDcinq->setSynopsis("Les nouvelles aventures d'Alice et du Chapelier Fou. Alice replonge au pays des merveilles pour aider ses amis à combattre le Maître du Temps. ");
$filmDVDcinq->setAnnee(2016);
$filmDVDcinq->setDateRelease('2016-06-01');
$filmDVDcinq->setBudget(170000000);
$filmDVDcinq->setVisible(1);
$filmDVDcinq->setDistributeur('The Walt Disney Company France');
$filmDVDcinq->setPrixTTC(23.00);
$filmDVDcinq->setTVA(19.6);
$filmDVDcinq->setCapacite('4,7 Go');
$filmDVDcinq->setFabricant('Sony');
$filmDVDcinq->setDiametre('12cm');
$filmDVDcinq->setPoids('135gr');
$filmDVDcinq->setCoucheDouble(true);

//var_dump($filmDVDun, $filmDVDdeux, $filmDVDtrois, $filmDVDquatre, $filmDVDcinq);


$compare = $filmDVDun->compareMoviesBudget($filmDVDtrois);

//var_dump($compare);
?>

  <div class="row">
      <div class="alert alert-success">
        <?php
          echo 'Le budget moyen de ces 5 film est : '. $filmDVDun->getBudgetAverage($filmDVDun, $filmDVDdeux, $filmDVDtrois, $filmDVDquatre, $filmDVDcinq) . '€.';
        ?>
      </div>
  </div>


<?php
/**
 ************* INSERER UN FILM EN DB, trois fois
 */

$filmDVDun->insertMovieInDB();
$filmDVDdeux->insertMovieInDB();
$filmDVDtrois->insertMovieInDB();




/**
 *************** Créer 3 objets DvdRom
 */


$filmDvdRomUn = new DvdRom($connection);
$filmDvdRomUn->setTitre('Retour chez ma mère');
$filmDvdRomUn->setSynopsis("Aimeriez-vous retourner vivre chez vos parents ? À 40 ans, Stéphanie est contrainte de retourner vivre chez sa mère. Elle est accueillie les bras ouverts : à elle les joies de l'appartement surchauffé, de Francis Cabrel en boucle, des parties de Scrabble endiablées et des précieux conseils maternels sur la façon de se tenir à table et de mener sa vie… Chacune va devoir faire preuve d’une infinie patience pour supporter cette nouvelle vie à deux. Et lorsque le reste de la fratrie débarque pour un dîner, règlements de compte et secrets de famille vont se déchaîner de la façon la plus jubilatoire. Mais il est des explosions salutaires. Bienvenue dans un univers à haut risque : la famille ! ");
$filmDvdRomUn->setAnnee(2016);
$filmDvdRomUn->setDateRelease('2016-06-01');
$filmDvdRomUn->setBudget(6000000);
$filmDvdRomUn->setVisible(1);
$filmDvdRomUn->setDistributeur('Pathé Distribution');
$filmDvdRomUn->setPrixTTC(18.00);
$filmDvdRomUn->setTVA(19.6);
$filmDvdRomUn->setFabricant('Philipps');
$filmDvdRomUn->setDiametre('12cm');
$filmDvdRomUn->setPoids('135gr');
$filmDvdRomUn->setCoucheDouble(true);
$filmDvdRomUn->setCouleur('#ff0000');


$filmDvdRomDeux = new DvdRom($connection);
$filmDvdRomDeux->setTitre('Julieta');
$filmDvdRomDeux->setSynopsis("Julieta s’apprête à quitter Madrid définitivement lorsqu’une rencontre fortuite avec Bea, l’amie d’enfance de sa fille Antía la pousse à changer ses projets. Bea lui apprend qu’elle a croisé Antía une semaine plus tôt. Julieta se met alors à nourrir l’espoir de retrouvailles avec sa fille qu’elle n’a pas vu depuis des années. Elle décide de lui écrire tout ce qu’elle a gardé secret depuis toujours. Julieta parle du destin, de la culpabilité, de la lutte d’une mère pour survivre à l’incertitude, et de ce mystère insondable qui nous pousse à abandonner les êtres que nous aimons en les effaçant de notre vie comme s’ils n’avaient jamais existé. ");
$filmDvdRomDeux->setAnnee(2016);
$filmDvdRomDeux->setDateRelease('2016-05-18');
$filmDvdRomDeux->setBudget(4500000);
$filmDvdRomDeux->setVisible(1);
$filmDvdRomDeux->setDistributeur('Pathé Distribution');
$filmDvdRomDeux->setPrixTTC(20.00);
$filmDvdRomDeux->setTVA(19.6);
$filmDvdRomDeux->setFabricant('Philipps');
$filmDvdRomDeux->setDiametre('12cm');
$filmDvdRomDeux->setPoids('135gr');
$filmDvdRomDeux->setCoucheDouble(true);
$filmDvdRomDeux->setCouleur('#ffff00');


$filmDvdRomTrois = new DvdRom($connection);
$filmDvdRomTrois->setTitre('Warcraft : Le commencement');
$filmDvdRomTrois->setSynopsis("Le pacifique royaume d'Azeroth est au bord de la guerre alors que sa civilisation doit faire face à une redoutable race d’envahisseurs: des guerriers Orcs fuyant leur monde moribond pour en coloniser un autre. Alors qu’un portail s’ouvre pour connecter les deux mondes, une armée fait face à la destruction et l'autre à l'extinction. De côtés opposés, deux héros vont s’affronter et décider du sort de leur famille, de leur peuple et de leur patrie. ");
$filmDvdRomTrois->setAnnee(2016);
$filmDvdRomTrois->setDateRelease('2016-05-18');
$filmDvdRomTrois->setBudget(4500000);
$filmDvdRomTrois->setVisible(1);
$filmDvdRomTrois->setDistributeur('Universal Pictures');
$filmDvdRomTrois->setPrixTTC(19.00);
$filmDvdRomTrois->setTVA(19.6);
$filmDvdRomTrois->setFabricant('Sony');
$filmDvdRomTrois->setDiametre('12cm');
$filmDvdRomTrois->setPoids('135gr');
$filmDvdRomTrois->setCoucheDouble(true);
$filmDvdRomTrois->setCouleur('#0000ff');

?>

<div class="row">
  <div class="alert alert-warning">
    <?php var_dump($filmDvdRomUn, $filmDvdRomDeux, $filmDvdRomTrois); ?>
  </div>
</div>


  <div class="row">
    <div class="alert alert-danger">
      <h3>Nombres de mots du synopsis</h3>
      <?php echo $filmDvdRomUn->countWordsSynopsis(); ?><br>
      <?php echo $filmDvdRomDeux->countWordsSynopsis(); ?><br>
      <?php echo $filmDvdRomTrois->countWordsSynopsis(); ?>
    </div>
  </div>


<?php
/**
********   OBJET BLUERAY
*/

$filmBlueRayOne = new Blueray($connection);


 $filmBlueRayOne->setTitre('Elle');
 $filmBlueRayOne->setSynopsis("Michèle fait partie de ces femmes que rien ne semble atteindre. À la tête d'une grande entreprise de jeux vidéo, elle gère ses affaires comme sa vie sentimentale : d'une main de fer. Sa vie bascule lorsqu’elle est agressée chez elle par un mystérieux inconnu. Inébranlable, Michèle se met à le traquer en retour. Un jeu étrange s'installe alors entre eux. Un jeu qui, à tout instant, peut dégénérer. ");
 $filmBlueRayOne->setAnnee(2015);
 $filmBlueRayOne->setDateRelease('2016-01-25');
 $filmBlueRayOne->setBudget(9500000);
 $filmBlueRayOne->setVisible(1);
 $filmBlueRayOne->setDistributeur('SBS Distribution');
 $filmBlueRayOne->setPrixTTC(18.00);
 $filmBlueRayOne->setTVA(19.6);
 $filmBlueRayOne->setFabricant('Toshiba');
 $filmBlueRayOne->setDiametre('12cm');
 $filmBlueRayOne->setPoids('135gr');
 $filmBlueRayOne->setCoucheDouble(true);
 $filmBlueRayOne->setCouleur('#00ffff');


$filmBlueRayTwo = new Blueray($connection);


 $filmBlueRayTwo->setTitre('Angry Birds');
 $filmBlueRayTwo->setSynopsis("Ce film nous amène sur une île entièrement peuplée d’oiseaux heureux et qui ne volent pas – ou presque. Dans ce paradis, Red, un oiseau avec un problème de colère, le très pressé Chuck, et l’imprévisible Bomb ont toujours été mis à l’écart. Mais lorsqu’arrivent des cochons verts mystérieux sur l’île, ce sera la mission de ce groupe de parias de découvrir ce que trament les cochons. ");
 $filmBlueRayTwo->setAnnee(2015);
 $filmBlueRayTwo->setDateRelease('2016-05-11');
 $filmBlueRayTwo->setBudget(11000000);
 $filmBlueRayTwo->setVisible(1);
 $filmBlueRayTwo->setDistributeur('Sony Pictures');
 $filmBlueRayTwo->setPrixTTC(16.89);
 $filmBlueRayTwo->setTVA(19.6);
 $filmBlueRayTwo->setFabricant('Philipps');
 $filmBlueRayTwo->setDiametre('12cm');
 $filmBlueRayTwo->setPoids('135gr');
 $filmBlueRayTwo->setCoucheDouble(true);
 $filmBlueRayTwo->setCouleur('#00ff00');

?>

<div class="row">
  <div class="alert alert-warning">
    <?php dump($filmBlueRayOne, $filmBlueRayTwo); ?>
  </div>
</div>

<?php
$filmBlueRayOne->insertMovieInDB();
$filmBlueRayTwo->insertMovieInDB();
$filmBlueRayTwo->setPrixFromPromo (0,10);

//var_dump($filmBlueRayTwo);

$yearMovie = $filmBlueRayOne->testYearReleaseFromMovies($filmBlueRayOne);

if ($yearMovie = true) { ?>
  <div class="row">
    <div class="alert alert-info">
      Le <strong>BlueRay</strong> est sorti cette année !
    </div>
  </div>
<?php }


//var_dump($filmBlueRayTwo->countMonthBetweenMovies($filmBlueRayOne, $filmBlueRayTwo));

?>

<div class="row">
  <div class="alert alert-warning">
    il y a une différence de  <strong><?php echo $filmBlueRayTwo->countMonthBetweenMovies($filmBlueRayOne, $filmBlueRayTwo); ?></strong> entre la date de sortie de ces 2 objets
  </div>
</div>


<?php
 ?>






















<!-- ********************* fin div générale -->
    </div>
  </div>
</div>

<?php include 'footer.php' ?>
