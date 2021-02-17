CREATE TABLE Usuario
(
  id INT NOT NULL,
  email INT NOT NULL,
  password INT NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (email)
);

CREATE TABLE Media
(
  id INT NOT NULL,
  nombre INT NOT NULL,
  contenido INT NOT NULL,
  tipo INT NOT NULL,
  usuario_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (usuario_id) REFERENCES Usuario(id),
  UNIQUE (nombre),
  UNIQUE (usuario_id)
);
