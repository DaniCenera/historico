<?php

// Idioma del sitio
const SITE_LANGUAGE = 'es'; // Español

// Título del sitio
const SITE_TITLE = 'Mi Sitio Histórico';


// Descripción del sitio
const SITE_DESCRIPTION = 'Este es un sitio histórico que proporciona información detallada sobre eventos pasados.';

// URL del sitio
const SITE_URL = 'http://localhost/historico/';

//Array multidimensional con los elementos del menu
const MENUPRINCIPAL = [
    ['slug' => 'index.php', 'title' => 'Inicio'],
    ['slug' => 'historia.php', 'title' => 'Historia'],
    ['slug' => 'contacto.php', 'title' => 'Contacto']
];

//Array multidimensional con elementos del menu de redes sociales
const MENUSOCIAL = [
    ['slug' => 'https://www.facebook.com', 'title' => 'Facebook'],
    ['slug' => 'https://www.twitter.com', 'title' => 'Twitter'],
    ['slug' => 'https://www.instagram.com', 'title' => 'Instagram'],
    ['slug' => 'https://www.linkedin.com', 'title' => 'LinkedIn'],
    ['slug' => 'https://www.youtube.com', 'title' => 'YouTube']
];

//Array menu avisos legales
const MENULEGAL = [
    ['slug' => 'terminos.php', 'title' => 'Términos y condiciones'],
    ['slug' => 'privacidad.php', 'title' => 'Política de privacidad'],
    ['slug' => 'cookies.php', 'title' => 'Política de cookies']
];

//Función constructora de menús
// navMenu(MENUPRINCIPAL);
// navMenu(MENUSOCIAL);
// navMenu(MENULEGAL);
function navMenu($array)
{
    $menu = '<nav>';
    $menu .= '<ul>';
    foreach ($array as $item) {
        $menu .= '<li><a href="' . $item['slug'] . '">' . $item['title'] . '</a></li>';
    }
    $menu .= '</ul>';
    $menu .= '</nav>';
    echo $menu;
}



// DATA BASE - BASE DE DATOS --------------------------------

const HOST = 'localhost';
const USER = 'root';
const PASS = 'root';
const DBNA = 'festival_cine';

// Example (MySQLi Procedural) -> https://www.w3schools.com/php/php_mysql_select.asp


//  $sql = "SELECT id, firstname, lastname FROM MyGuests";  almacenamos la consulta SQL en una variable
//  consulta($sql) llamamos a la función pasándole la consulta anterior
// Por defecto la consulta no nos devuelve ningún valor
// $consulta = consulta($sql, 1) // si queremos que nos devuelva un valor almacenamos el valor en una variable y le pasamos el segundo parametro true o 1

function consulta($sql, $devolver=false){
    // Crear conexión
    $conn = mysqli_connect(HOST, USER, PASS, DBNA);
    // Verificar conexión
    if (!$conn){
    die("Conexión fallida: " . mysqli_connect_error());
    }

    if($devolver){
        return mysqli_query($conn, $sql);
    }
    else{
        mysqli_query($conn, $sql);
    }

    //cerrar conexión
    mysqli_close($conn);
}

?>