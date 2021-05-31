<?php
session_start();
include "conexion.inc.php";
$sql="SELECT COUNT(ciUsuario) FROM `seguimiento`  WHERE ciUsuario =".$_SESSION["CI"];
$resultado=mysqli_query($conn, $sql);
$fila=mysqli_fetch_array($resultado);

if (($fila[0]) == 0) {
	$hoy = date('Y-m-d H:i:s');
	print_r($hoy);
	$_SESSION['CI'];
	//$_SESSION['fech'] = $hoy;
	header("Location: ./procesos/motor.php?flujo=F1&proceso=P1&fechaini=$hoy");

} else {
	if (($fila[0] != 0)) {
		$hoy = date('Y-m-d H:i:s');
		$sql = "SELECT * FROM `seguimiento` WHERE fechafin = 'NUll' AND ciUsuario=".$_SESSION["CI"];
		$res=mysqli_query($conn,$sql);
		$fila1 = mysqli_fetch_array($res);
		print_r($fila1[2]);
		header("Location: ./procesos/motor.php?flujo=$fila1[1]&proceso=$fila1[2]&fechaini=$hoy");

		

	}
}

?>
