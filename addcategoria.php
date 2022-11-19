<?php 

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vinho";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$logado =$_SESSION['user'];


$categoria =  addslashes(filter_input(INPUT_POST,'categoria', FILTER_SANITIZE_STRING));





//echo "Nome: $nome <br>";

$result_adega="INSERT INTO categoria (categoria) VALUES('$categoria')";



if(mysqli_query($conn,$result_adega)){

    $last_id = mysqli_insert_id($conn);
    echo $last_id;
}


 //Adcionar no historico da base dados
 $result_historico="INSERT INTO historico (funcionario,descricao) VALUES('$logado','Foi criada uma nova categoria $categoria')";
 $resultado_historico = mysqli_query($conn, $result_historico);




if(mysqli_insert_id($conn)){

        
        
    header("Location: categoria.php");
    $_SESSION['msg'] = "<p style='color:green;'>Categoria criada com sucesso</p>";


}else{
  
    header("Location: categoria.php");
    $_SESSION['msg'] = "<p style='color:red;'>Adega criada sem sucesso</p>";
}


    



?>