<? require_once("bloques/_config.php");?>
<? const TITULO = "Inicio"; ?>
<? include_once("bloques/_header.php");?>

<p>Hola mundo</p>

<form method="get" action="buscar.php">
    <input type="text" name="query" placeholder="Buscar...">
    <button type="submit">Buscar</button>
</form>

<?
$sql='SELECT * FROM peliculas'; 
//Selecciona todas las peliculas
$resultado=consulta($sql,1);

if (mysqli_num_rows($resultado) > 0) {
    // output data of each row
    echo '<ul>';
    while($row = mysqli_fetch_assoc($resultado)) {
      echo "<li>{$row["titulo"]}</li>";
    }
    echo '</ul>';
  } 
  else {
    echo "0 resultados";
  }
  
?>

<? require_once("bloques/_footer.php"); ?>