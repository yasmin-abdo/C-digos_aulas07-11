<?php
include("conecta.php");

$nomeu      = $_POST["nomeu"];
$email 	  = $_POST["email"];


$sql ="INSERT INTO tbl_usuarios(usu_nome, usu_email)
        VALUES( '".$nomeu."',
                '".$email."' )";

if (mysqli_query($conn, $sql)) {
		echo "Registro inserido com Sucesso!";
     } else {
		echo "Error:" . $sql . "<br>" . mysqli_error($conn);
     }
  
	 mysqli_close($conn);

?>