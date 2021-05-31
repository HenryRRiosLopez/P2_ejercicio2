<?php
session_start();
include "conexion.inc.php";
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$fechaini = $_GET['fechaini'];
$ci=$_SESSION['CI'];
echo $flujo;
echo $proceso;
echo $ci;
echo "<br>";
print_r ($fechaini);
$consql="INSERT INTO seguimiento VALUES('Inscrip','$flujo','$proceso','$ci','$fechaini','NULL');";
$resInto=mysqli_query($conn, $consql);

$sql="select * from flujo where Flujo='$flujo' and proceso='$proceso'";
$resultado=mysqli_query($conn, $sql);
$fila=mysqli_fetch_array($resultado);

$formulario=$fila["Formulario"];
include $formulario.".cabecera.form.inc.php";

?>
<form method="GET" action="controlador.php">
<?php
include $formulario.".form.inc.php";

?>

<br/>
<input type="hidden" value="<?php echo $flujo; ?>" name="flujo"/>
<input type="hidden" value="<?php echo $proceso; ?>" name="proceso"/>
<input type="hidden" value="<?php echo $formulario; ?>" name="formulario"/>
<input type="hidden" value="<?php echo $fechaini; ?>" name="fechaini"/>
<input type="hidden" value="<?php echo $ci; ?>" name="ci"/>
<input type="submit" value="Anterior" name="Anterior"/>
<input type="submit" value="Siguiente" name="Siguiente"/>
</form>