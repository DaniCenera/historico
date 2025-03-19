-- CONSULTAS SQL QUE FUNCIONAN

-- Muestrame todos los datos de películas y el /los directoes

SELECT 
    p.*,
    GROUP_CONCAT(CONCAT(per.nombre, ' ', per.apellidos) SEPARATOR ', ') as directores
FROM 
    peliculas p
    INNER JOIN _pelicula_rol_persona prp ON p.id = prp.id_pelicula
    INNER JOIN personas per ON prp.id_persona = per.id
    INNER JOIN roles r ON prp.id_rol = r.id
WHERE 
    r.rol = 'Director'
GROUP BY 
    p.id, p.titulo, p.imagen, p.sinopsis, p.ano, p.duracion, p.trailer;



-- Muestra los datos de las películas: título, imagen, sinopsis, año, duración, trailer, directores, países, ediciones, secciones y galardones
SELECT 
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
    p.id, p.titulo, p.imagen, p.sinopsis, p.ano, p.duracion, p.trailer;





-- muestra todos los valores de película a partir de una id
    SELECT 
    p.*,
    GROUP_CONCAT(DISTINCT CONCAT(per.nombre, ' ', per.apellidos) SEPARATOR ', ') as director,
    GROUP_CONCAT(DISTINCT pa.pais SEPARATOR ', ') as pais,
    GROUP_CONCAT(DISTINCT e.edicion SEPARATOR ', ') as edicion,
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
    p.id = 1 
    AND r.rol = 'Director'
GROUP BY 
    p.id;