<?php
include "conexion.inc.php";
$ci = $_POST['CI'];

session_start();
$_SESSION['CI']=$ci;

//print_r ($ci);
$consExiPre = "SELECT COUNT(ci), NombreCom FROM `prefacultativo`  WHERE ci =$ci";
$resExiPre =mysqli_query($conn, $consExiPre);
$filares = mysqli_fetch_array($resExiPre);
if (($filares[0]) != 0) {
	$sql = "SELECT * FROM `seguimiento` WHERE fechafin = 'NUll' AND ciUsuario='$ci'";
	$res=mysqli_query($conn,$sql);
	$fila1 = mysqli_fetch_array($res);
	print_r($fila1);
	header("Location: bandeja.php");
	echo "aqui distinto de cero";
	print_r ($fila[0]);
	if (($fila[0]) == 0) {
		$_SESSION['CI'];
		header("Location: bandeja.php");
	} else {
		// code...
	}
	
} else {
	echo "<h1>usted no esta inscrito en Pre-Facultativo</h1>";
}



$consulta="SELECT COUNT(ciUsuario) FROM `seguimiento`  WHERE ciUsuario =$ci";

$resultado=mysqli_query($conn,$consulta);
$fila = mysqli_fetch_array($resultado);
print_r ($fila[0]);


?>
