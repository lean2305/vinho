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

$busca ="SELECT * FROM adega WHERE nome_adega = '$adega'";

if($res=mysqli_query($conn,$busca)){

    $id_adega=array();

}
$reg = mysqli_fetch_assoc($res);

$id = $reg['id_adega'];

$result_adega="INSERT INTO armario (nome_armario,nome_adega,quant_min,quant_max,id_adega) VALUES('$armario','$adega','$min','$max','$id')";
$resuldado_adega= mysqli_query($conn,$result_adega);

//Adicionar historico
$result_historico="INSERT INTO historico (funcionario,descricao) VALUES('$logado','Foi criada uma novo armario na adega $adega com o nome $armario')";
$resultado_historico = mysqli_query($conn, $result_historico);







if(mysqli_insert_id($conn)){

        
        
    header("Location: novoarmario.php");
        
    $_SESSION['msg'] = "<p style='color:green;'>Novo armario adicionado!</p>";

}else{
  
    header("Location: novoarmario.php");
    $_SESSION['msg'] = "<p style='color:red;'>Armario não adicionado!</p>";
}





?>