<?php

// Connect DB

function ConnectDB($nameDb, $nameHost, $login, $password, $charset='utf8'){
  // lancer une connexion
  $db = new \PDO("mysql:host={$nameHost};dbname={$nameDb};charset={$charset}",$login,$password);

  //retourne la connexion à la DB
  return $db;

}//endFunction


// Retoune les 6 meileurs films selon la note de presse

function getSixBestMovies($linkDB){ //$linkDB = variable contenant le script de connexion à la DB dans index.php
  $req = $linkDB->query(
  'SELECT id, title
  FROM movies
  ORDER BY note_presse DESC
  LIMIT 6'
  ); //endQuery

  //récupération du résultat de ma requete sous forme de tableau associatif
  $resultReq = $req->fetchAll();

  //retourn le tableau de résultat
  return $resultReq;

}//endFunction



// function qui affich eles - derniers commentaires et erlur date de création
function getSixLastComments($linkDB){
  $req = $linkDB->query(
  'SELECT content, note, date_format(created_at, "Publié le %d-%m-%Y à %k:%i") AS created_at
    FROM comments
    ORDER BY created_at DESC
    LIMIT 6
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction



//   + Fonction qui retourne les 3 prochains films Français en VO ou VOST
//    avec Le nom, synospsy, la date de sortie, le budget et la durée

function getThreeNextVO($linkDB){
  $req = $linkDB->query(
  'SELECT movies.id AS id, movies.title, movies.image, movies.synopsis, date_format(movies.date_release, "%d-%m-%Y") AS date_release, movies.budget, movies.duree,movies.categories_id, categories.title AS category
    FROM movies
    INNER JOIN categories ON movies.categories_id = categories.id
    WHERE date_release > now() AND( bo = "vo" OR bo ="vost")
    ORDER BY date_release DESC
    LIMIT 3
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction



//   + Afficher les 5 derniers utilisateurs qui se sont connectés il y a moins d'une semaine
//     avec leur avatar, leur pseudo, leur email, leur téléphone, leur ville, leur date de connection

function getFiveLastUserCo($linkDB){
  $req = $linkDB->query(
  'SELECT avatar, username, email, tel, ville, date_format(lastActivity, "%d-%m-%Y à %k:%i") AS lastActivity
    FROM user
    WHERE lastActivity > date_sub(now(), INTERVAL 1 YEAR)
    ORDER BY lastActivity DESC
    LIMIT 5
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction


//   + Afficher les 3 derniers medias qui on une video validées iframe

function getThreLastIframe($linkDB){
  $req = $linkDB->query(
  'SELECT medias.id, medias.movies_id, medias.video, movies.title AS title
    FROM medias
    INNER JOIN movies ON medias.movies_id = movies.id
    WHERE video IS NOT NULL
    AND video REGEXP "<iframe(.+)?>"
    LIMIT 3
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction

//  + Afficher les 4 catégories qui ont le plus de films
//    avec leurs nom, leurs description et le nb de film

function getFourBestCat($linkDB){
  $req = $linkDB->query(
  'SELECT categories.id, categories.title, categories.description, count(movies.id) AS count
    FROM categories
    INNER JOIN movies ON movies.categories_id = categories.id
    GROUP BY categories.id
    ORDER BY count DESC
    LIMIT 4
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction



// function pourt récupérer tous le détail d'un fil via son id

function getMoviesDetailById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT movies.id as id, movies.type, movies.image as image,
  movies.title as title, synopsis, bo,
  date_release, duree, distributeur, note_presse,
  categories.id as catid, categories.title as cattitle
  FROM movies
  INNER JOIN categories on movies.categories_id = categories.id
  WHERE movies.id = {$id}");//endQuery
  $resultReq = $req->fetch();

  return $resultReq;

}//endFunction

// function qui va chercher les film de la categorie du film courrant
function getMoviesDetailByCategories($id,$mid,  $linkDB){
  $req = $linkDB->query(
  "SELECT movies.title as title
  FROM movies
  INNER JOIN categories on movies.categories_id = categories.id
  WHERE categories.id	= {$id}
  AND movies.id != {$mid}

  ");//endQuery
  $resultReq = $req->fetchAll();

  return $resultReq;

}//endFunction




// function pourt récupérer tous le détail d'un" categorie via son id

function getCategorieDetailById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT * FROM categories WHERE id = {$id}");//endQuery
  $resultReq = $req->fetch();

  return $resultReq;

}//endFunction

// function pourt récupérer tous le film d'une categorie

function getMoviesFromCatById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT movies.title, movies.id AS id FROM movies WHERE categories_id={$id}");//endQuery
  $resultReq = $req->fetchAll();

  return $resultReq;

}//endFunction


function getThreeBestAct($linkDB){
  $req = $linkDB->query(
  'SELECT actors.id AS id,concat(firstname, " ",lastname) AS nomcomplet, count(movies.id) AS nbrfilm
    FROM actors
    INNER JOIN actors_movies ON actors.id = actors_movies.actors_id
    INNER JOIN movies ON movies.id = actors_movies.movies_id
    GROUP BY actors.id
    ORDER BY count(movies.id) DESC
    LIMIT 3
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction

function getSixBestReal($linkDB){
  $req = $linkDB->query(
  'SELECT directors.id AS id,concat(firstname, " ",lastname) AS nomcompletReal, count(movies.id) AS nbrfilmReal
    FROM directors
    INNER JOIN directors_movies ON directors.id = directors_movies.directors_id
    INNER JOIN movies ON movies.id = directors_movies.movies_id
    GROUP BY directors.id
    ORDER BY count(movies.id) DESC
    LIMIT 6
  ');//endQuery
  $resultReq = $req->fetchAll();
  return $resultReq;
}//endFunction


// function pourt récupérer tous le détail d'un acteur via son id

function getActorDetailById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT * FROM actors WHERE id = {$id}");//endQuery
  $resultReq = $req->fetch();

  return $resultReq;

}//endFunction

// function pourt récupérer tous le détail d'un real via son id

function getRealDetailById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT * FROM directors WHERE id = {$id}");//endQuery
  $resultReq = $req->fetch();

  return $resultReq;

}//endFunction

function getMoviesFromActorsById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT movies.id, movies.title AS titre,actors.dob, actors.city, actors.nationality, actors.recompenses, actors.biography
    FROM movies
    INNER JOIN actors_movies ON movies.id = actors_movies.movies_id
    INNER JOIN actors ON actors.id = actors_movies.actors_id
    WHERE actors.id ={$id}");//endQuery
  $resultReq = $req->fetchAll();

  return $resultReq;

}//endFunction

function getMoviesFromRealById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT movies.id, movies.title AS titre, directors.dob, directors.biography
    FROM movies
    INNER JOIN directors_movies ON movies.id = directors_movies.movies_id
    INNER JOIN directors ON directors.id = directors_movies.directors_id
    WHERE directors.id ={$id}");//endQuery
  $resultReq = $req->fetchAll();

  return $resultReq;

}//endFunction

// function pourt récupérer tous le détail d'un fil via son id

function getCommentDetailById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT * FROM comments WHERE movies_id = {$id}");//endQuery
  $resultReq = $req->fetchAll();

  return $resultReq;

}//endFunction

function StarReplace($NbrEtoile){
	if (is_int($NbrEtoile)) {
		$ResutVar = str_repeat('<span class="glyphicon glyphicon-star"></span>',$NbrEtoile);
	}
	return $ResutVar;
}//endFunction



// function pourt récupérer tous le media d'un fil via son id

function getMediaDetailById($id, $linkDB){
  $req = $linkDB->query(
  "SELECT * FROM medias WHERE movies_id = {$id}");//endQuery
  $resultReq = $req->fetchAll();

  return $resultReq;

}//endFunction

//------------------------ fontion insertion commentaire en DB

function insertCommentInMovie($id,$linkDB){
  // prepare permet d'utiliser les requete d'injection (insertion, modif, supp)
  $req=$linkDB->prepare("
    INSERT INTO comments(content,note,movies_id)
    VALUES(:content, :note, :movies_id)
  ");
  // $_POST['contenu'] -> nom de mon champs (contenu) créer dans le formulaire
  $req->execute([
    'content' => $_POST['contenuComment'],
    'note' => $_POST['notefilm'],
    'movies_id' => $id,
  ]);
}//endFunction

//------------------------ fontion insertion media en DB

function insertMediaInMovie($id,$linkDB){
  // prepare permet d'utiliser les requete d'injection (insertion, modif, supp)
  $req=$linkDB->prepare("
    INSERT INTO medias(nature, video, picture, movies_id)
    VALUES(:nature, :video, :image, :movies_id)
  ");
  // $_POST['contenu'] -> nom de mon champs (contenu) créer dans le formulaire
  $req->execute([
    'nature' => $_POST['natureMedia'],
    'video' => $_POST['videoMedia'],
    'image' => $_POST['imageMedia'],
    'movies_id' => $id,
  ]);
}//endFunction


//------------------------ fontion insertion media en DB

function insertContact($linkDB){
  // prepare permet d'utiliser les requete d'injection (insertion, modif, supp)
  $req=$linkDB->prepare("
    INSERT INTO contact(sujet, email, urlsite, contenu, create_date)
    VALUES(:sujet, :email, :urlsite, :contenu, :date)
  ");
  // $_POST['contenu'] -> nom de mon champs (contenu) créer dans le formulaire
  $req->execute([
    'sujet' => $_POST['sujetComm'],
    'email' => $_POST['mailComm'],
    'urlsite' => $_POST['urlComm'],
    'contenu' => $_POST['contenuComm'],
    'date' => date('Y-m-d H:i:s'),
  ]);
}//endFunction

// ------------------- fonction recherche film

function searchMovieByKW($searchKeyWords,$linkDB){
  $req = $linkDB->query(
  "SELECT id, title, synopsis, duree, distributeur, annee, image
  FROM movies
  WHERE title REGEXP '{$searchKeyWords}'
  OR synopsis	REGEXP '{$searchKeyWords}'
  OR distributeur REGEXP '{$searchKeyWords}'
");//endQuery
  $resultReq = $req->fetchAll();

  return $resultReq;

}//endFunction





// ------------------- fonction recherche cinema

function searchCineByKW($searchKeyWordsCine,$linkDB){
  $req = $linkDB->query(
  "SELECT id, title, ville
  FROM cinema
  WHERE title REGEXP '{$searchKeyWordsCine}'
  OR ville	REGEXP '{$searchKeyWordsCine}'
");//endQuery
  $resultReq = $req->fetchAll();

  return $resultReq;

}//endFunction
































/*
  + Afficher l'ensemble des tags dans un nuage de tags: Le nb de films du tag fera la taille de la police du tags

requete :

  SELECT word, COUNT( tags_movies.movies_id ) AS nbFilm
  FROM tags
  LEFT JOIN tags_movies ON tags.id = tags_movies.tags_id
  GROUP BY tags.id
  ORDER BY nbFilm DESC

pour la taille de la police utiliser une variable sur une font-size inline



*/
?>
