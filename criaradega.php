<?php 

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vinho";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$logado =$_SESSION['user'];


$adega =  addslashes(filter_input(INPUT_POST,'adega', FILTER_SANITIZE_STRING));
$armario =  addslashes(filter_input(INPUT_POST,'armario', FILTER_SANITIZE_STRING));
$min =  addslashes(filter_input(INPUT_POST,'min', FILTER_SANITIZE_STRING));
$max =  addslashes(filter_input(INPUT_POST,'max', FILTER_SANITIZE_STRING));




//echo "Nome: $nome <br>";

$result_adega="INSERT INTO adega (nome_adega) VALUES('$adega')";



if(mysqli_query($conn,$result_adega)){

    $last_id = mysqli_insert_id($conn);
    echo $last_id;
}


$result_armario="INSERT INTO armario (nome_armario,id_adega,quant_min,quant_max,nome_adega) VALUES('$armario','$last_id','$min','$max','$adega')";

$resultado_armario = mysqli_query($conn, $result_armario);

 //Adcionar no historico da base dados
 $result_historico="INSERT INTO historico (funcionario,descricao) VALUES('$logado','Foi criada uma nova adega $armario')";
 $resultado_historico = mysqli_query($conn, $result_historico);




if(mysqli_insert_id($conn)){

        
        
    header("Location: novadega.php");
    $_SESSION['msg'] = "<p style='color:green;'>Adega criada com sucesso</p>";


}else{
  
    header("Location: novadega.php");   
    $_SESSION['msg'] = "<p style='color:red;'>Adega criada sem sucesso</p>";
}


    



?>