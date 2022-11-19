<?php 

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vinho";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);



$nome =  addslashes(filter_input(INPUT_POST,'user', FILTER_SANITIZE_STRING));
$senha = addslashes(filter_input(INPUT_POST,'Senha', FILTER_SANITIZE_STRING));
$pnome = addslashes(filter_input(INPUT_POST,'pnome', FILTER_SANITIZE_STRING));
$snome = addslashes(filter_input(INPUT_POST,'snome', FILTER_SANITIZE_STRING));
$email = addslashes(filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING));



//echo "Nome: $nome <br>";

$result_usuario="INSERT INTO funcionario (nome, sobrenome,password,usuario,email) VALUES('$pnome','$snome','$senha','$nome','$email')";

$resultado_usuario = mysqli_query($conn, $result_usuario);


if(mysqli_insert_id($conn)){

        
        
    header("Location: login.php");

}else{
  
    header("Location: login.php");
}


    



?>