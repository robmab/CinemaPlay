<?php

session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;
if (isset($_REQUEST['add'])) {
	//Check that the start date is not greater than the end date.
	if ($_REQUEST['dateI'] > $_REQUEST['dateF']) {

		$_SESSION['mensajeBD'] = 'La fecha inicial no puede ser mayor que la final.';
		header("Location:../Vistas/EventosVista.php#1");
		exit;
	}

	//Add Event
	$name = $_REQUEST['name'];
	$banner = $_REQUEST['banner'];
	$sql = "INSERT INTO eventos_descuentos(nombre,fecha_in,fecha_fin,porciento,banner)   VALUES('" . $name . "','" . $_REQUEST['dateI'] . "','" . $_REQUEST['dateF'] . "','" . $_REQUEST['percent'] . "','" . $banner . "')";
	$check = $connection->query($sql);

	if (!($connection->affected_rows > 0)) {
		$_SESSION['mensajeBD'] = 'No puedes crear un evento durante las mismas fechas que otro que tengas creado.';
		header("Location:../Vistas/EventosVista.php#1");
		exit;
	}
}

if (isset($_REQUEST['edite'])) {
	$sql = "UPDATE eventos_descuentos SET banner='" . $_REQUEST['banner'] . "' WHERE  fecha_in='" . $_REQUEST['fi'] . "'   AND fecha_fin='" . $_REQUEST['ff'] . "'  ";
	$check = $connection->query($sql);
}


if (isset($_REQUEST['delete'])) {
	$sql = "DELETE FROM eventos_descuentos WHERE fecha_in='" . $_REQUEST['fi'] . "'   AND fecha_fin='" . $_REQUEST['ff'] . "' ";
	$check = $connection->query($sql);
}

//Collect events in array
$sql = "SELECT count(*) FROM eventos_descuentos";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
	$info = $memory->fetch_array();
	$num = $info[0];
	$num = (int) $num;
}

$cont = 0;
$event_date = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
	$sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $cont2 . "'";
	$memory2 = $connection->query($sql);

	if ($memory2 && $memory2->num_rows > 0) {
		$info = $memory2->fetch_array();
		$dateI = date("d-m-Y", strtotime($info['fecha_in']));
		$event_date[$cont]['fechaI'] = $dateI;
		$event_date[$cont]['fechaII'] = $info['fecha_in'];

		$dateF = date("d-m-Y", strtotime($info['fecha_fin']));
		$event_date[$cont]['fechaF'] = $dateF;
		$event_date[$cont]['fechaFF'] = $info['fecha_fin'];
		$event_date[$cont]['nombre'] = $info['nombre'];
		$event_date[$cont]['porciento'] = $info['porciento'];
		$event_date[$cont]['banner'] = $info['banner'];

		$cont++;
	}
}

//Sorted by state

function array_sort($array, $on, $order = SORT_ASC)
{
	$new_array = array();
	$sortable_array = array();

	if (count($array) > 0) {
		foreach ($array as $k => $v) {
			if (is_array($v)) {
				foreach ($v as $k2 => $v2) {
					if ($k2 == $on)
						$sortable_array[$k] = $v2;
				}
			} else
				$sortable_array[$k] = $v;
		}
		switch ($order) {
			case SORT_ASC:
				asort($sortable_array);
				break;
			case SORT_DESC:
				arsort($sortable_array);
				break;
		}
		foreach ($sortable_array as $k => $v)
			$new_array[$k] = $array[$k];
	}
	return $new_array;
}

$event_date = array_sort($event_date, 'fechaI', SORT_DESC);
$_SESSION['datosEventos'] = $event_date;

header("Location:../Vistas/EventosVista.php");
exit;

?>