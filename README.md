# historicoficx documentation
## Summary

- [Introduction](#introduction)
- [Database Type](#database-type)
- [Table Structure](#table-structure)
	- [peliculas](#peliculas)
	- [edicion](#edicion)
	- [seccion](#seccion)
	- [personas](#personas)
	- [paises](#paises)
	- [roles](#roles)
	- [galardones](#galardones)
	- [_pelicula-edicion](#_pelicula-edicion)
	- [_pelicula-paises](#_pelicula-paises)
	- [_pelicula-rol-persona](#_pelicula-rol-persona)
	- [_pelicula-galardones](#_pelicula-galardones)
	- [_pelicula-seccion](#_pelicula-seccion)
	- [_edicion-seccion](#_edicion-seccion)
	- [_personas-paises](#_personas-paises)
- [Relationships](#relationships)
- [Database Diagram](#database-Diagram)

## Introduction

## Database type

- **Database system:** MySQL
## Table structure

### peliculas
Las películas se proyectan en una edición pero puntualmente pueden repetirse en otras.
| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement | fk_peliculas_id__pelicula-galardones,fk_peliculas_id__pelicula-seccion | |
| **titulo** | VARCHAR(255) | not null  |  | |
| **director** | INTEGER | not null  |  | |
| **imagen** | VARCHAR(255) | not null  |  | |
| **sinopsis** | TEXT(65535) | not null  |  | |
| **ano** | DATE | not null  |  | |
| **duracion** | INTEGER | not null  |  | |
| **trailer** | VARCHAR(255) | not null  |  | | 


### edicion

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement | fk_edicion_id__edicion-seccion | |
| **edicion** | VARCHAR(255) | not null  |  | |
| **descripcion** | TEXT(65535) | not null  |  | |
| **inicio** | DATE | not null  |  | |
| **fin** | DATE | not null  |  | |
| **logo** | VARCHAR(255) | not null  |  | | 


### seccion
Hay secciones hijas de otras
| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **titulo** | VARCHAR(255) | not null  |  | |
| **id-seccion padre** | INTEGER | not null  | fk_seccion_hijo_seccion | | 


### personas

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **nombre** | VARCHAR(255) | not null  |  | |
| **apellidos** | VARCHAR(255) | not null  |  | |
| **foto** | VARCHAR(255) | not null  |  | |
| **nacionalidad** | INTEGER | not null  |  | | 


### paises

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **pais** | VARCHAR(255) | not null  |  | | 


### roles

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **rol** | VARCHAR(255) | not null  |  | |
| **descripcion** | TEXT(65535) | not null  |  | | 


### galardones

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement | fk_galardones_id__pelicula-galardones | |
| **galardon** |  | not null  |  | | 


### _pelicula-edicion

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **id-pelicula** | INTEGER | not null  | fk__pelicula-edicion_id-pelicula_peliculas | |
| **id-edicion** | INTEGER | not null  | fk__pelicula-edicion_id-edicion_edicion | | 


### _pelicula-paises

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **id-pelicula** | INTEGER | not null  | fk__pelicula-paises_id-pelicula_peliculas | |
| **id-pais** | INTEGER | not null  | fk__pelicula-paises_id-pais_paises | | 


### _pelicula-rol-persona

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **id-pelicula** | INTEGER | not null  | fk__pelicula-rol-persona_id-pelicula_peliculas | |
| **id-persona** | INTEGER | not null  | fk__pelicula-rol-persona_id-persona_personas | |
| **id-rol** | INTEGER | not null  | fk__pelicula-rol-persona_id-rol_roles | | 


### _pelicula-galardones

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **id-pelicula** | INTEGER | not null  |  | |
| **id-galardon** | INTEGER | not null  |  | | 


### _pelicula-seccion

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **id-pelicula** | INTEGER | not null  |  | |
| **id-seccion** | INTEGER | not null  | fk__pelicula-seccion_id-seccion_seccion | | 


### _edicion-seccion

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **id-edicion** | INTEGER | not null  |  | |
| **id-seccion** | INTEGER | not null  | fk__edicion-seccion_id-seccion_seccion | | 


### _personas-paises

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | INTEGER | 🔑 PK, not null , unique, autoincrement |  | |
| **id-paises** | INTEGER | not null  | fk__personas-paises_id-paises_paises | |
| **id-personas** | INTEGER | not null  | fk__personas-paises_id-personas_personas | | 


## Relationships

- **_pelicula-edicion to peliculas**: one_to_one
- **_pelicula-edicion to edicion**: one_to_one
- **_pelicula-paises to peliculas**: one_to_one
- **_pelicula-paises to paises**: one_to_one
- **_pelicula-rol-persona to peliculas**: one_to_one
- **_pelicula-rol-persona to roles**: one_to_one
- **_pelicula-rol-persona to personas**: one_to_one
- **peliculas to _pelicula-galardones**: one_to_one
- **galardones to _pelicula-galardones**: one_to_one
- **peliculas to _pelicula-seccion**: one_to_one
- **_pelicula-seccion to seccion**: one_to_one
- **seccion to seccion**: one_to_one
- **edicion to _edicion-seccion**: one_to_one
- **_edicion-seccion to seccion**: one_to_one
- **_personas-paises to paises**: one_to_one
- **_personas-paises to personas**: one_to_one

## Database Diagram

```mermaid
erDiagram
	_pelicula-edicion ||--|| peliculas : references
	_pelicula-edicion ||--|| edicion : references
	_pelicula-paises ||--|| peliculas : references
	_pelicula-paises ||--|| paises : references
	_pelicula-rol-persona ||--|| peliculas : references
	_pelicula-rol-persona ||--|| roles : references
	_pelicula-rol-persona ||--|| personas : references
	peliculas ||--|| _pelicula-galardones : references
	galardones ||--|| _pelicula-galardones : references
	peliculas ||--|| _pelicula-seccion : references
	_pelicula-seccion ||--|| seccion : references
	seccion ||--|| seccion : references
	edicion ||--|| _edicion-seccion : references
	_edicion-seccion ||--|| seccion : references
	_personas-paises ||--|| paises : references
	_personas-paises ||--|| personas : references

	peliculas {
		INTEGER id
		VARCHAR(255) titulo
		INTEGER director
		VARCHAR(255) imagen
		TEXT(65535) sinopsis
		DATE ano
		INTEGER duracion
		VARCHAR(255) trailer
	}

	edicion {
		INTEGER id
		VARCHAR(255) edicion
		TEXT(65535) descripcion
		DATE inicio
		DATE fin
		VARCHAR(255) logo
	}

	seccion {
		INTEGER id
		VARCHAR(255) titulo
		INTEGER id-seccion padre
	}

	personas {
		INTEGER id
		VARCHAR(255) nombre
		VARCHAR(255) apellidos
		VARCHAR(255) foto
		INTEGER nacionalidad
	}

	paises {
		INTEGER id
		VARCHAR(255) pais
	}

	roles {
		INTEGER id
		VARCHAR(255) rol
		TEXT(65535) descripcion
	}

	galardones {
		INTEGER id
		 galardon
	}

	_pelicula-edicion {
		INTEGER id
		INTEGER id-pelicula
		INTEGER id-edicion
	}

	_pelicula-paises {
		INTEGER id
		INTEGER id-pelicula
		INTEGER id-pais
	}

	_pelicula-rol-persona {
		INTEGER id
		INTEGER id-pelicula
		INTEGER id-persona
		INTEGER id-rol
	}

	_pelicula-galardones {
		INTEGER id
		INTEGER id-pelicula
		INTEGER id-galardon
	}

	_pelicula-seccion {
		INTEGER id
		INTEGER id-pelicula
		INTEGER id-seccion
	}

	_edicion-seccion {
		INTEGER id
		INTEGER id-edicion
		INTEGER id-seccion
	}

	_personas-paises {
		INTEGER id
		INTEGER id-paises
		INTEGER id-personas
	}
```


--CONTENIDO para Tablas

-- Insertar datos en la tabla 'paises'
INSERT INTO paises (pais) VALUES
('España'),
('Francia'),
('Estados Unidos');

-- Insertar datos en la tabla 'personas'
INSERT INTO personas (nombre, apellidos, foto, nacionalidad) VALUES
('Pedro', 'García López', 'pedro_garcia.jpg', 1), -- España
('Marie', 'Dubois', 'marie_dubois.jpg', 2), -- Francia
('John', 'Smith', 'john_smith.jpg', 3); -- Estados Unidos

-- Insertar datos en la tabla 'roles'
INSERT INTO roles (rol, descripcion) VALUES
('Director', 'Persona que dirige la realización de una película'),
('Actor', 'Persona que interpreta un papel en una película'),
('Guionista', 'Persona que escribe el guion de una película');

-- Insertar datos en la tabla 'seccion'
INSERT INTO seccion (titulo, id_seccion_padre) VALUES
('Competencia Oficial', NULL), -- Sección principal
('Cortometrajes', 1), -- Subsección de Competencia Oficial
('Documentales', 1); -- Subsección de Competencia Oficial

-- Insertar datos en la tabla 'edicion'
INSERT INTO edicion (edicion, descripcion, inicio, fin, logo) VALUES
('Edición 2025', 'La edición número 25 del festival', '2025-03-01', '2025-03-10', 'logo_2025.png');

-- Insertar datos en la tabla 'peliculas'
INSERT INTO peliculas (titulo, director, imagen, sinopsis, ano, duracion, trailer) VALUES
('La Aventura Inesperada', 1, 'la_aventura_inesperada.jpg', 'Un grupo de amigos emprende un viaje que cambiará sus vidas.', '2025-03-05', 120, 'trailer_la_aventura.mp4'),
('Sombras del Pasado', 2, 'sombras_del_pasado.jpg', 'Una historia de misterio que desvela secretos familiares.', '2025-03-06', 95, 'trailer_sombras.mp4');

-- Insertar datos en la tabla 'galardones'
INSERT INTO galardones (galardon) VALUES
('Mejor Película'),
('Mejor Director'),
('Mejor Actor');

-- Insertar datos en la tabla '_pelicula-edicion'
INSERT INTO _pelicula_edicion (id_pelicula, id_edicion) VALUES
(1, 1),
(2, 1);

-- Insertar datos en la tabla '_pelicula-paises'
INSERT INTO _pelicula_paises (id_pelicula, id_pais) VALUES
(1, 1), -- La Aventura Inesperada se produce en España
(2, 2); -- Sombras del Pasado se produce en Francia

-- Insertar datos en la tabla '_pelicula-rol-persona'
INSERT INTO _pelicula_rol_persona (id_pelicula, id_persona, id_rol) VALUES
(1, 1, 1), -- Pedro García López es el director de La Aventura Inesperada
(2, 2, 1); -- Marie Dubois es la directora de Sombras del Pasado

-- Insertar datos en la tabla '_pelicula-galardones'
INSERT INTO _pelicula_galardones (id_pelicula, id_galardon) VALUES
(1, 1), -- La Aventura Inesperada gana el galardón a Mejor Película
(2, 2); -- Sombras del Pasado gana el galardón a Mejor Director

-- Insertar datos en la tabla '_pelicula-seccion'
INSERT INTO _pelicula_seccion (id_pelicula, id_seccion) VALUES
(1, 1), -- La Aventura Inesperada está en la sección Competencia Oficial
(2, 2); -- Sombras del Pasado está en la sección Cortometrajes

-- Insertar datos en la tabla '_edicion-seccion'
INSERT INTO _edicion_seccion (id_edicion, id_seccion) VALUES
(1, 1), -- La edición 2025 incluye la sección Competencia Oficial
(1, 2); -- La edición 2025 incluye la sección Cortometrajes

-- Insertar datos en la tabla '_personas-paises'
INSERT INTO _personas_paises (id_paises, id_personas) VALUES
(1, 1), -- Pedro García López es de España
(2, 2), -- Marie Dubois es de Francia
(3, 3); -- John Smith es de Estados Unidos
