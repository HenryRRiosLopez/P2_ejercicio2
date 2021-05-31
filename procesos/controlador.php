<?php
session_start();
include "conexion.inc.php";
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$formulario=$_GET["formulario"];
$fechaini=$_GET["fechaini"];
$ci=$_SESSION["CI"];
$hoy1 = date('Y-m-d H:i:s');
//include $formulario.".form.inc.php";

if (isset($_GET["Si"])) {
	$consql="Delete from seguimiento where codProceso='$proceso'";
	mysqli_query($conn, $consql);

	$consqla="INSERT INTO seguimiento VALUES('Inscrip','$flujo','$proceso','$ci','$fechaini','$hoy1');";
	$resInto=mysqli_query($conn, $consqla);

	$sql="select * from consulta where consulta='$proceso'";
	$resultado=mysqli_query($conn, $sql);
	$fila=mysqli_fetch_array($resultado);
	$procesosiguiente=$fila["si"];
	header("Location: motor.php?flujo=$flujo&proceso=$procesosiguiente&fechaini=$hoy1");
	} else {
		if (isset($_GET["No"])) {
			$consql="Delete from seguimiento where codProceso='$proceso'";
			mysqli_query($conn, $consql);

			$consqla="INSERT INTO seguimiento VALUES('Inscrip','$flujo','$proceso','$ci','$fechaini','$hoy1');";
			$resInto=mysqli_query($conn, $consqla);

			$sql="select * from consulta where consulta='$proceso'";
			$resultado=mysqli_query($conn, $sql);
			$fila=mysqli_fetch_array($resultado);
			$procesosiguiente=$fila["no"];
			header("Location: motor.php?flujo=$flujo&proceso=$procesosiguiente&fechaini=$hoy1");
		}

}


if (isset($_GET["Siguiente"]))
{
	
	$consql="Delete from seguimiento where codProceso='$proceso'";
	mysqli_query($conn, $consql);

	$consqla="INSERT INTO seguimiento VALUES('Inscrip','$flujo','$proceso','$ci','$fechaini','$hoy1');";
	$resInto=mysqli_query($conn, $consqla);

	$sql="select * from flujo where Flujo='$flujo' and proceso='$proceso'";
	$resultado=mysqli_query($conn, $sql);
	$fila=mysqli_fetch_array($resultado);
	$procesosiguiente=$fila["procesosiguiente"];
	header("Location: motor.php?flujo=$flujo&proceso=$procesosiguiente&fechaini=$hoy1");
}
else
{
	if (isset($_GET["Anterior"])) {
		$sqlcons="SELECT COUNT(procesosiguiente) FROM `flujo` WHERE procesosiguiente = '$proceso'";
		$rescons=mysqli_query($conn, $sqlcons);
		$fila1=mysqli_fetch_array($rescons);
		if (($fila1[0])==0) {
			$sqlP="SELECT * FROM `consulta` WHERE si='$proceso' or no='$proceso'";
			$resconsp=mysqli_query($conn, $sqlP);
			$fila2=mysqli_fetch_array($resconsp);
			$proceso=$fila2["consulta"];
			//print_r ($proceso);
			$sql="select * from flujo where Flujo='$flujo' and procesosiguiente='$proceso'";
			$resultado=mysqli_query($conn, $sql);
			$fila=mysqli_fetch_array($resultado);
			//print_r ($fila);
			header("Location: motor.php?flujo=$flujo&proceso=$proceso&fechaini=$hoy1");
		} else {
			// code...
			$sql="select * from flujo where Flujo='$flujo' and procesosiguiente='$proceso'";
			$resultado=mysqli_query($conn, $sql);
			$fila=mysqli_fetch_array($resultado);
			print_r ($fila);
			$proceso=$fila["proceso"];
			print_r ($proceso);
			header("Location: motor.php?flujo=$flujo&proceso=$proceso&fechaini=$hoy1");
		} 

	}
}	

?>