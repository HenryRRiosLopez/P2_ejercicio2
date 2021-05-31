<?php
	
include "conexion.inc.php";
$cia=$_SESSION["CI"];
?>
<table border="1" bordercolor="020202" cellpadding="2" cellspacing="2" >
<tr>
    <td>NOMBRE </td>
    <td>CI</td>
    <td>NOTA 1 </td>
    <td>NOTA 2 </td>
    <td>NOTA 3 </td>
    <td>ESTADO</td>
</tr>
<?php
//print_r ($cia);
$sql="SELECT * FROM `prefacultativo` WHERE ci=$cia";
$resultado=mysqli_query($conn, $sql);
$fila1 = mysqli_fetch_array($resultado);
$cam =$fila1[6];
if ($cam == 'aprobado') {
	echo "USTED APROBO EL CURSO PRE-FACULTATIVO PUEDE REALIZAR LA INSCRIPCION";
}else{
	echo "DISCULPE USTED REPROBO EL CURSO PREFACULTATIVO";
}
$sql2="SELECT * FROM `prefacultativo` WHERE ci=$cia";
$resul=mysqli_query($conn, $sql2);
while ($fila2 = mysqli_fetch_array($resul))
{
    echo "<tr>";
    echo "<td>".$fila2[1]."    "."</td>";
    echo "<td>".$fila2[2]."    "."</td>";
    echo "<td>".$fila2[3]."    "."</td>";
    echo "<td>".$fila2[4]."    "."</td>";
    echo "<td>".$fila2[5]."</td>";
    echo "<td>".$fila2[6]."</td>";
    echo "</tr>";
}

?>
</table>