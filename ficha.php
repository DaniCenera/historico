<? require_once("bloques/_config.php");?>
<? const TITULO = "Ficha"; ?>
<? include_once("bloques/_header.php");?>


<?php
//recoger el id de la ficha de la pelicula a través de get
$id = $_GET['id'];


// SQL query to get all movie details
$sql = "SELECT 
    p.*,
    GROUP_CONCAT(DISTINCT CONCAT(per.nombre, ' ', per.apellidos) SEPARATOR ', ') as directores,
    GROUP_CONCAT(DISTINCT pa.pais SEPARATOR ', ') as paises,
    GROUP_CONCAT(DISTINCT e.edicion SEPARATOR ', ') as ediciones,
    GROUP_CONCAT(DISTINCT g.galardon SEPARATOR ', ') as galardones,
    GROUP_CONCAT(DISTINCT s.titulo SEPARATOR ', ') as secciones
FROM 
    peliculas p
    LEFT JOIN _pelicula_rol_persona prp ON p.id = prp.id_pelicula
    LEFT JOIN personas per ON prp.id_persona = per.id
    LEFT JOIN roles r ON prp.id_rol = r.id
    LEFT JOIN _pelicula_paises pp ON p.id = pp.id_pelicula
    LEFT JOIN paises pa ON pp.id_pais = pa.id
    LEFT JOIN _pelicula_edicion pe ON p.id = pe.id_pelicula
    LEFT JOIN edicion e ON pe.id_edicion = e.id
    LEFT JOIN _pelicula_galardones pg ON p.id = pg.id_pelicula
    LEFT JOIN galardones g ON pg.id_galardon = g.id
    LEFT JOIN _pelicula_seccion ps ON p.id = ps.id_pelicula
    LEFT JOIN seccion s ON ps.id_seccion = s.id
WHERE 
    p.id = $id 
    AND r.rol = 'Director'
GROUP BY 
    p.id;";




//Selecciona todas las peliculas
$resultado=consulta($sql,1);

if (mysqli_num_rows($resultado) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultado)) {
      echo "<h1>{$row["titulo"]}</h1>";
      echo "<img src='img/{$row["imagen"]}' alt='{$row["titulo"]}'>";
      echo "<p>{$row["sinopsis"]}</p>";
      echo "<p>{$row["ano"]}</p>";
      echo "<p>{$row["duracion"]}</p>";
      echo "<a href='{$row["trailer"]}' target='_blank'>Ver tailer</a>";
      echo "<p>{$row["directores"]}</p>";
      echo "<p>{$row["paises"]}</p>";
      echo "<p>{$row["ediciones"]}</p>";
      echo "<p>{$row["galardones"]}</p>";
      echo "<p>{$row["secciones"]}</p>";

    }
  } 
  else {
    echo "0 resultados";
  }


?>

<a href="index.php">Volver</a>


<? require_once("bloques/_footer.php"); ?>

