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
| **id-rol** | INTEGER | not null  | fk__pelicula-rol-persona_id-rol_roles | |
| **id-persona** | INTEGER | not null  | fk__pelicula-rol-persona_id-persona_personas | | 


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
		INTEGER id-rol
		INTEGER id-persona
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
```