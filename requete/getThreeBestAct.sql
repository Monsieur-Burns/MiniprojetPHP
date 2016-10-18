SELECT concat(firstname, ' ',lastname) AS nomcomplet, count(movies.id) AS nbrfilm
FROM actors
INNER JOIN actors_movies ON actors.id = actors_movies.actors_id
INNER JOIN movies ON movies.id = actors_movies.movies_id
GROUP BY actors.id
ORDER BY count(movies.id) DESC
LIMIT 3
