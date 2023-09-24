Pasos a seguir para poder obtener los datos que se almacenaron en la base de datos:

1. Crear una base de datos llamada TriviaG6, con el siguiente comando:

CREATE DATABASE TriviaG6;

2. Crear las dos tablas necesarias: Preguntas y Respuestas: 

CREATE TABLE Preguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pregunta TEXT NOT NULL,
    opcion1 TEXT NOT NULL,
    opcion2 TEXT NOT NULL,
    opcion3 TEXT NOT NULL,
    opcion4 TEXT NOT NULL
);

CREATE TABLE Respuestas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pregunta_id INT NOT NULL,
    respuesta_correcta INT NOT NULL,
    FOREIGN KEY (pregunta_id) REFERENCES Preguntas(id)
);

 3. Como ultimo paso, insertar datos a las tablas, las preguntas fueron elegidas de las proporcinadas en el archivo faq.md:

 INSERT INTO Preguntas (pregunta, opcion1, opcion2, opcion3, opcion4)
VALUES
('Definición de las siglas PHP?', 'Hypertext Pre-Processor', 'Page Hypertext Processor', 'Processor web page', 'Server Processor');

INSERT INTO Preguntas (pregunta, opcion1, opcion2, opcion3, opcion4)
VALUES
('2x2?', '4', '2', '5', '3');

INSERT INTO Respuestas (pregunta_id, respuesta_correcta)
VALUES
(1, 1);

INSERT INTO Respuestas (pregunta_id, respuesta_correcta)
VALUES
(2, 1);





