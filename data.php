<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=mapas user=postgres password=postgres")
    or die('No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
/*$query = "SELECT
	municipios.id as munic_id,
	municipios.nombre as munic_nombre,
	parroquias.id as parro_id,
	parroquias.nombre as parro_nombre,
	coordenadas.nombre as id,
	coordenadas.nombre as nombre,
	(ng + (nm / 60) + (ns / 3600)) as latitud,
	-(wg + (wm / 60) + (ws / 3600)) as longitud
FROM
	coordenadas
	JOIN parroquias ON (parroquias.id = coordenadas.codparr)
	JOIN municipios ON (municipios.id = coordenadas.codmuni)
ORDER BY
	municipios.nombre ASC,
	coordenadas.nombre ASC";*/
  
$query = "SELECT id, nombre FROM municipios ORDER BY nombre ASC";
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

// Printing JSON
echo json_encode(pg_fetch_all($result));

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
?>
