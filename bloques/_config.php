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

?>
