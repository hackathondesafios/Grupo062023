<?php
include_once "database.php";

$respuestas_usuario = [];
$respuestas_correctas = [];

if ($_SERVER["REQUEST_METHOD"] == "POST")// Verificar si se ha enviado el formulario
{
    $respuestas_usuario = $_POST;
    $respuestas_correctas_db = obtenerRespuesta(); // Obtener las respuestas correctas
    foreach ($respuestas_correctas_db as $pregunta_respuesta)
    {
        $id_pregunta = $pregunta_respuesta->pregunta_id;
        $respuesta_correcta = $pregunta_respuesta->respuesta_correcta;
        if (isset($respuestas_usuario["opcion$id_pregunta"]) && $respuestas_usuario["opcion$id_pregunta"] == $respuesta_correcta) {
            $respuestas_correctas[$id_pregunta] = true;
        } else {
            $respuestas_correctas[$id_pregunta] = false;
        }
    }
}

$preguntas = obtenerPregunta();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trivia</title>
</head>
<body>
  <h1>Cuestionario</h1>
  <form action="index.php" method="post">
      <?php 
      foreach ($preguntas as $preg) { 
          $id_pregunta = $preg->id;
      ?>
      <h2>Pregunta <?php echo $id_pregunta ?></h2>
      <p><?php echo $preg->pregunta ?></p>
      <input type="radio" name="opcion<?php echo $id_pregunta ?>" value="1"><label><?php echo $preg->opcion1 ?></label><br>
      <input type="radio" name="opcion<?php echo $id_pregunta ?>" value="2"><label><?php echo $preg->opcion2 ?></label><br>
      <input type="radio" name="opcion<?php echo $id_pregunta ?>" value="3"><label><?php echo $preg->opcion3 ?></label><br>
      <input type="radio" name="opcion<?php echo $id_pregunta ?>" value="4"><label><?php echo $preg->opcion4 ?></label><br>      
      <?php 
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($respuestas_correctas[$id_pregunta]) && $respuestas_correctas[$id_pregunta]) {
                  echo "<span style='color: green;'>✔️ Correcta</span>";
              } else {
                  echo "<span style='color: red;'>❌ Incorrecta</span>";
              }
          }
      ?>
      <br>
      <?php } ?>
      <input type="submit" value="Enviar" name="enviar" class="envio">
  </form>
  <footer class="footer">    
    <h3> Grupo 6 | HACKATHON 2023 | Libertad - Merlo </h3>
  </footer>
</body>
</html>
