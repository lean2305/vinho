<?php 

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vinho";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$logado =$_SESSION['user'];



$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$procurar= "SELECT * FROM vinho WHERE id_vinho = '$id' ";

    if($res=mysqli_query($conn,$procurar)){

        $nome_vinho = array();
        $armario = array();
        

        $iol = 0;
        $count = 1;

        while($reg=mysqli_fetch_assoc($res)){

            $nome_vinho[$iol] = $reg['nome_vinho'];
            $armario[$iol] = $reg['nome_armario'];


        



            echo $nome_vinho[$iol];

                
            //Remover vinho
            $sql = "DELETE FROM vinho WHERE id_vinho = '$id'";
            $delete = mysqli_query($conn,$sql);

            //Adcionar no historico da base dados
            $result_historico="INSERT INTO historico (funcionario,descricao) VALUES('$logado','O vinho $nome_vinho[$iol] foi removido')";
            $resultado_historico = mysqli_query($conn, $result_historico);

        }      
    }

    
//Atualizar quantidade disponivel
$sqlo ="SELECT * FROM armario WHERE nome_armario='$armario[$iol]' ";

if($rest=mysqli_query($conn,$sqlo)){

    $disp = array();

    $iol = 0;

    while($regg=mysqli_fetch_assoc($rest)){

        $disp[$iol] = $regg['quant_disp'];
        $total = $disp[$iol] - 1;
        echo $total;
        echo $armario[$iol];

        $up="UPDATE armario SET quant_disp = '$total' WHERE nome_armario ='$armario[$iol]' ";
        $res_up = mysqli_query($conn, $up);
                



}}



   // header('Location: visualizar.php'); 


    
?>