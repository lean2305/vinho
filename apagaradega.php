<?php 

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vinho";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$logado =$_SESSION['user'];

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sqli = "SELECT * from adega WHERE id_adega = '$id' ";
if($res=mysqli_query($conn,$sqli)){

    $nome_adega = array();
    

    $iol = 0;
   

    while($reg=mysqli_fetch_assoc($res)){

        $nome_adega[$iol] = $reg['nome_adega'];

        $sql = "DELETE FROM adega WHERE id_adega = '$id'";
        $delete = mysqli_query($conn,$sql);


        //Adcionar no historico da base dados
        $result_historico="INSERT INTO historico (funcionario,descricao) VALUES('$logado','A adega $nome_adega[$iol] foi removido')";
        $resultado_historico = mysqli_query($conn, $result_historico);
          
    }}






$sqli = "SELECT * from armario WHERE id_adega = '$id' ";
if($res=mysqli_query($conn,$sqli)){

    $nome_armario = array();
    

    $iol = 0;
   

    while($reg=mysqli_fetch_assoc($res)){

        $nome_armario[$iol] = $reg['nome_armario'];
  

            
           
            


            //apagar armario
            $remove="DELETE  from armario WHERE nome_armario ='$nome_armario[$iol]'";
            $removearmario = mysqli_query($conn, $remove);

                //Adcionar no historico da base dados
                $result_historico2="INSERT INTO historico (funcionario,descricao) VALUES('$logado','O armario $nome_armario[$iol] foi removido')";
                $resultado_historico2 = mysqli_query($conn, $result_historico2);
          
            

            //apagar armario
            $remover="DELETE  from vinho WHERE nome_armario ='$nome_armario[$iol]'";
            $removevinho = mysqli_query($conn, $remover);
                //Adcionar no historico da base dados
                $result_historico3="INSERT INTO historico (funcionario,descricao) VALUES('$logado','Foi apagado os vinho do armario $nome_armario[$iol]')";
                $resultado_historico3 = mysqli_query($conn, $result_historico3);
          



    }}
               
                



  

 

    header('Location: defenicoes.php'); 


    
?>