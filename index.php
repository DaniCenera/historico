<? require_once("bloques/_config.php");?>
<? const TITULO = "Inicio"; ?>
<? include_once("bloques/_header.php");?>


<form method="get" action="buscar.php">
    <input type="text" name="query" placeholder="Buscar...">
    <button type="submit">Buscar</button>
</form>

<?
//$sql='SELECT * FROM peliculas'; 
$sql="SELECT 
    p.*,
    GROUP_CONCAT(DISTINCT CONCAT(per.nombre, ' ', per.apellidos) SEPARATOR ', ') as directores,
    GROUP_CONCAT(DISTINCT pa.pais SEPARATOR ', ') as paises,
    GROUP_CONCAT(DISTINCT e.edicion SEPARATOR ', ') as ediciones,
    GROUP_CONCAT(DISTINCT s.titulo SEPARATOR ', ') as secciones,
    GROUP_CONCAT(DISTINCT g.galardon SEPARATOR ', ') as galardones
FROM 
    peliculas p
    -- Join para directores
    INNER JOIN _pelicula_rol_persona prp ON p.id = prp.id_pelicula
    INNER JOIN personas per ON prp.id_persona = per.id
    INNER JOIN roles r ON prp.id_rol = r.id
    -- Join para países
    LEFT JOIN _pelicula_paises pp ON p.id = pp.id_pelicula
    LEFT JOIN paises pa ON pp.id_pais = pa.id
    -- Join para ediciones
    LEFT JOIN _pelicula_edicion pe ON p.id = pe.id_pelicula
    LEFT JOIN edicion e ON pe.id_edicion = e.id
    -- Join para secciones
    LEFT JOIN _pelicula_seccion ps ON p.id = ps.id_pelicula
    LEFT JOIN seccion s ON ps.id_seccion = s.id
    -- Join para galardones
    LEFT JOIN _pelicula_galardones pg ON p.id = pg.id_pelicula
    LEFT JOIN galardones g ON pg.id_galardon = g.id
WHERE 
    r.rol = 'Director'
GROUP BY 
    p.id, p.titulo, p.imagen, p.sinopsis, p.ano, p.duracion, p.trailer;";


//Selecciona todas las peliculas
$resultado=consulta($sql,1);

if (mysqli_num_rows($resultado) > 0) {
    // output data of each row
    echo '<ul class="galeria">';
    while($row = mysqli_fetch_assoc($resultado)) {
      echo "<li>";
      echo "<a href='ficha.php?id={$row["id"]}'>";
      echo "<img src='img/{$row["imagen"]}' alt='{$row["titulo"]}'>";
      echo "<h2>{$row["titulo"]}</h2>";
      echo "<p><strong>Dirección:</strong> {$row["directores"]}</p>";
      echo "<p><strong>Duración:</strong>  {$row["duracion"]} min</p>";
      
      $anoPeli= date('Y',strtotime($row["ano"])); //Convierte la fecha en un año y lo guarda en la variable que se usa abajo
      echo "<p><strong>Año:</strong>  {$anoPeli}</p>";
      
      echo "</a>";

      echo "</li>";
    }
    echo '</ul>';
  } 
  else {
    echo "0 resultados";
  }
  
?>

<? require_once("bloques/_footer.php"); ?>