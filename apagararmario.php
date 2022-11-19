<?php 
//boas
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vinho";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$logado =$_SESSION['user'];

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sqli = "SELECT * from armario WHERE id_armario = '$id' ";
if($res=mysqli_query($conn,$sqli)){

    $nome_adega = array();
    

    $iol = 0;
   

    while($reg=mysqli_fetch_assoc($res)){

        $nome_armario[$iol] = $reg['nome_armario'];

        $sql = "DELETE FROM armario WHERE id_armario = '$id'";
        $delete = mysqli_query($conn,$sql);


        //Adcionar no historico da base dados
        $result_historico="INSERT INTO historico (funcionario,descricao) VALUES('$logado','O armario $nome_armario[$iol] foi removido')";
        $resultado_historico = mysqli_query($conn, $result_historico);
          
 

$sqli = "SELECT * from vinho WHERE nome_armario = '$nome_armario[$iol]' ";
}}
if($res=mysqli_query($conn,$sqli)){

    $vinho = array();
    

    $iol = 0;
   

    while($reg=mysqli_fetch_assoc($res)){

        $vinho[$iol] = $reg['nome_vinho'];
  

            
           
            


            //apagar armario
            $remove="DELETE  from vinho WHERE nome_vinho ='$vinho[$iol]'";
            $removearmario = mysqli_query($conn, $remove);

                //Adcionar no historico da base dados
                $result_historico2="INSERT INTO historico (funcionario,descricao) VALUES('$logado','O vinho $vinho[$iol] foi removido')";
                $resultado_historico2 = mysqli_query($conn, $result_historico2);
          
            

         

    }}
               
                



  

 

    header('Location: defenicoes.php'); 


    
?>