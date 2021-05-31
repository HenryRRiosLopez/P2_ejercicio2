<?php
$cone = mysqli_connect("localhost", "usuario", "123456", "caja");
// Check connection
if (!$cone) {
      die("Connection failed: " . mysqli_connect_error());
}
?>
<form action="" method="post">
  <p>NOMBRE: <input type="text" name="nombre"></p>
  <p>CI: <input type="text" name="ci: "></p>
  <p>ORIGEN: <input type="text" name="IdOrigen"></p>
  <p>DESTINO: <input type="text" name="IdDestino"></p>
  <p>MONTO: <input type="text" name="monto"></p>
 

<?php

//$sql = "INSERT INTO caja.resepcion VALUES ('$nombre', '$ci', '$IdOrigen', '$IdDestino', '$monto', 1)";
if (mysqli_query($cone, $sql)) {
   	  echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);




?>