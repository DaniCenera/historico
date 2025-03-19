<?php require_once("bloques/_config.php"); ?>

<?php const TITULO = 'BUSCAR' ?>

<?php require_once("bloques/_header.php"); ?>

<?php
// Conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "root", "festival_cine");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

// Obtener el término de búsqueda
$query = isset($_GET['query']) ? $mysqli->real_escape_string($_GET['query']) : '';

// Si hay un término de búsqueda
if ($query) {
    // Consulta SQL que busca en múltiples tablas y campos
    $sql = "
       SELECT peliculas.titulo, peliculas.director, peliculas.sinopsis, peliculas.ano FROM peliculas WHERE peliculas.titulo LIKE '%$query%' OR peliculas.sinopsis LIKE '%$query%'
    ";

    $result = $mysqli->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Mostrar resultados
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . htmlspecialchars($row['titulo']) . "</h3>";
            echo "<p><strong>Sinopsis:</strong> " . nl2br(htmlspecialchars($row['sinopsis'])) . "</p>";
            echo "</div><hr>";
        }
    } else {
        echo "No se encontraron resultados.";
    }
}
?>

<?php require_once("bloques/_footer.php"); ?>