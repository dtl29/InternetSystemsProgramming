DROP TABLE IF EXISTS Corvettes;

CREATE TABLE Corvettes (
  Vette_id INT(11) NOT NULL AUTO_INCREMENT,
  Body_Style CHAR(12),
  Miles FLOAT,
  Year INT(4),
  State INT(4) NOT NULL,
  PRIMARY KEY (Vette_id)
);

insert into Corvettes values
(1, 'coupe', 18.0, 1997, 4),
(2, 'hatchback', 58.0, 1996, 7),
(3, 'convertible', 13.5, 2001, 1),
(4, 'hatchback', 19.0, 1995, 2),
(5, 'hatchback', 25.0, 1991, 5),
(6, 'hardtop', 15.0, 2000, 2),
(7, 'coupe', 55.0, 1979, 10),
(8, 'convertible', 17.0, 1999, 5),
(9, 'hardtop', 17.0, 2000, 5),
(10, 'hatchback', 50.0, 1995, 7);

