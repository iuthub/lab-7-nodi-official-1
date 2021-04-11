-- Question-1
SELECT name FROM movies WHERE year=1995

-- Question-2
SELECT *
FROM actors act
         JOIN roles role ON act.id=role.actor_id
         JOIN movies m ON role.movie_id=m.id
WHERE m.name="Lost in Translation"

-- Question-3
SELECT first_name, last_name
FROM actors act
         JOIN roles role ON act.id=role.actor_id
         JOIN movies m ON role.movie_id=m.id
WHERE m.name="Lost in Translation"

-- Question-4
SELECT first_name, last_name
FROM directors d
         JOIN movies_directors md ON md.director_id=d.id
         JOIN movies m ON m.id=md.movie_id
WHERE m.name="Fight Club"

-- Question-5
SELECT *
FROM movies m
         JOIN movies_directors md ON md.movie_id=m.id
         JOIN directors d ON md.director_id=d.id
WHERE first_name="Clint" AND last_name="Eastwood"

-- Question-6
SELECT name
FROM movies m
         JOIN movies_directors md ON md.movie_id=m.id
         JOIN directors d ON md.director_id=d.id
WHERE first_name="Clint" AND last_name="Eastwood"

-- Question-7
SELECT first_name, last_name
FROM directors d
         JOIN movies_directors md ON md.director_id=d.id
         JOIN movies_genres mg ON mg.movie_id=md.movie_id
WHERE genre="Horror"

-- Question-8
SELECT a.first_name, a.last_name
FROM actors a
         JOIN roles r ON a.id = r.actor_id
         JOIN movies m ON m.id = r.movie_id
         JOIN movies_directors md ON md.movie_id = m.id
         JOIN directors d ON md.director_id = d.id
WHERE d.first_name = "Christopher" AND d.last_name = "Nolan"