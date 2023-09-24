<?php

function database()
{
    $user_password = getenv("MYSQL_ROOT_PASSWORD");
    $user_name = getenv("MYSQL_PASSWORD");
    $databasename = "TriviaG6";
    $database = new PDO('mysql:host=db;dbname=' . $databasename, $user_name, $user_password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}

function obtenerPregunta()
{
    $bd = database();
    $sentencia = $bd->query("SELECT id , pregunta , opcion1 , opcion2 , opcion3 , opcion4 FROM Preguntas");
    return $sentencia->fetchAll();
}

function obtenerRespuesta()
{
    $bd = database();
    $sentencia = $bd->query("SELECT id , pregunta_id ,respuesta_correcta FROM Respuestas");
    return $sentencia->fetchAll();
}
?>