<?php

/**
 * DateTime est une classe native en PHP_Time
 * permettant de manipuler toute forme de date
 * http://php.net/manual/fr/class.datetime.php
 */


$now = new DateTime('now');
var_dump($now);

// 'now' est un mot clef permettant d'avoir la date a l'instant T
// format() permet de sortir une date au format défini dans les param

var_dump($now->format('d/m/Y'));


// createFromFormat() permet de générer un nouvel
//  objet DateTime selon un format d'entree

$dateFR = DateTime::createFromFormat('d/m/Y', "16/03/1988");

var_dump($dateFR);
var_dump($dateFR->format('Y-m-d'));


// Formats relatifs
//


$yesterday = new DateTime('-1 day');
var_dump($yesterday);

$nextYear = new DateTime ('+ 1 year');
var_dump($nextYear);


$lastDayOfThisMonth = new DateTime('last day of this month');
var_dump($lastDayOfThisMonth);




// Fonction Modify () permettant de modifier une date dans un ojet DateTime

$dateModify = $now->modify('+2 day');
var_dump($dateModify);


//chaine la modification de DateTimeImmutable

$dateModifyTwo = $now->modify('-1 week +2 hours -30 minute');
var_dump($dateModifyTwo);






 ?>
