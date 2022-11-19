<?php 

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vinho";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$logado =$_SESSION['user'];



$armario =  addslashes(filter_input(INPUT_POST,'armario', FILTER_SANITIZE_STRING));
$categoria =  addslashes(filter_input(INPUT_POST,'categoria', FILTER_SANITIZE_STRING));
$casta =  addslashes(filter_input(INPUT_POST,'casta', FILTER_SANITIZE_STRING));
$vinho =  addslashes(filter_input(INPUT_POST,'vinho', FILTER_SANITIZE_STRING));
$quinta =  addslashes(filter_input(INPUT_POST,'quinta', FILTER_SANITIZE_STRING));
$preco =  addslashes(filter_input(INPUT_POST,'preco', FILTER_SANITIZE_STRING));
$ano =  addslashes(filter_input(INPUT_POST,'ano', FILTER_SANITIZE_STRING));


//Inserir o vinho
$result_vinho="INSERT INTO vinho (categoria,nome_armario,ano,quinta,castas,preco,nome_vinho) VALUES('$categoria','$armario','$ano','$quinta','$casta','$preco','$vinho')";
$resuldado_vinho= mysqli_query($conn,$result_vinho);


//Adcionar no historico da base dados
$result_historico="INSERT INTO historico (funcionario,descricao) VALUES('$logado','Foi adicionado o vinho $vinho no armario $armario')";
$resultado_historico = mysqli_query($conn, $result_historico);



if(mysqli_insert_id($conn)){

        
        
   
        
    $_SESSION['msg'] = "<p style='color:green;'>Vinho adicionado!</p>";

}else{
  
    
    $_SESSION['msg'] = "<p style='color:red;'>Vinho não adicionado!</p>";
}


//Atualizar quantidade disponivel
$sql ="SELECT * FROM armario WHERE nome_armario='$armario' ";

if($res=mysqli_query($conn,$sql)){

    $disp = array();

    $iol = 0;

    while($reg=mysqli_fetch_assoc($res)){

        $disp[$iol] = $reg['quant_disp'];
        $total = $disp[$iol] + 1;

        $up="UPDATE armario SET quant_disp = '$total' WHERE nome_armario ='$armario' ";
        $res_up = mysqli_query($conn, $up);
                



}}



header("Location: vinho.php");

?>