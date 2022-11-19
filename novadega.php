<?php

session_start();


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vinho";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['Senha']) == true)){

    unset($_SESSION['user']);
    unset($_SESSION['Senha']);
    header('Location: login.php');
}



 ?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>O meu vinho</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/novadega.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app-container">
  <div class="app-left">
    <button class="close-menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="app-logo">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
        <line x1="18" y1="20" x2="18" y2="10"/>
        <line x1="12" y1="20" x2="12" y2="4"/>
        <line x1="6" y1="20" x2="6" y2="14"/>       </svg>
      <span>VinhoOrnelas</span>
    </div>
    <ul class="nav-list">
      <li class="nav-list-item">
        <a class="nav-list-link" href="adega.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"/></svg>
          Dashboard
        </a>
      </li>
      <li class="nav-list-item active">
        <a class="nav-list-link" href="novadega.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
          Nova adega
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="novoarmario.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg>
          Novo armario
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="vinho.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          Vinho
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="visualizar.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
          Visualizar
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="categoria.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
          Categorias
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="defenicoes.php">
      <svg viewBox="0 0 512 512" width="26" height="26" fill="currentColor" onclick="parent.location='defenicoes.php'">
   <path d="M272 512h-32c-26 0-47.2-21.1-47.2-47.1V454c-11-3.5-21.8-8-32.1-13.3l-7.7 7.7a47.1 47.1 0 01-66.7 0l-22.7-22.7a47.1 47.1 0 010-66.7l7.7-7.7c-5.3-10.3-9.8-21-13.3-32.1H47.1c-26 0-47.1-21.1-47.1-47.1v-32.2c0-26 21.1-47.1 47.1-47.1H58c3.5-11 8-21.8 13.3-32.1l-7.7-7.7a47.1 47.1 0 010-66.7l22.7-22.7a47.1 47.1 0 0166.7 0l7.7 7.7c10.3-5.3 21-9.8 32.1-13.3V47.1c0-26 21.1-47.1 47.1-47.1h32.2c26 0 47.1 21.1 47.1 47.1V58c11 3.5 21.8 8 32.1 13.3l7.7-7.7a47.1 47.1 0 0166.7 0l22.7 22.7a47.1 47.1 0 010 66.7l-7.7 7.7c5.3 10.3 9.8 21 13.3 32.1h10.9c26 0 47.1 21.1 47.1 47.1v32.2c0 26-21.1 47.1-47.1 47.1H454c-3.5 11-8 21.8-13.3 32.1l7.7 7.7a47.1 47.1 0 010 66.7l-22.7 22.7a47.1 47.1 0 01-66.7 0l-7.7-7.7c-10.3 5.3-21 9.8-32.1 13.3v10.9c0 26-21.1 47.1-47.1 47.1zM165.8 409.2a176.8 176.8 0 0045.8 19 15 15 0 0111.3 14.5V465c0 9.4 7.7 17.1 17.1 17.1h32.2c9.4 0 17.1-7.7 17.1-17.1v-22.2a15 15 0 0111.3-14.5c16-4.2 31.5-10.6 45.8-19a15 15 0 0118.2 2.3l15.7 15.7a17.1 17.1 0 0024.2 0l22.8-22.8a17.1 17.1 0 000-24.2l-15.7-15.7a15 15 0 01-2.3-18.2 176.8 176.8 0 0019-45.8 15 15 0 0114.5-11.3H465c9.4 0 17.1-7.7 17.1-17.1v-32.2c0-9.4-7.7-17.1-17.1-17.1h-22.2a15 15 0 01-14.5-11.2c-4.2-16.1-10.6-31.6-19-45.9a15 15 0 012.3-18.2l15.7-15.7a17.1 17.1 0 000-24.2l-22.8-22.8a17.1 17.1 0 00-24.2 0l-15.7 15.7a15 15 0 01-18.2 2.3 176.8 176.8 0 00-45.8-19 15 15 0 01-11.3-14.5V47c0-9.4-7.7-17.1-17.1-17.1h-32.2c-9.4 0-17.1 7.7-17.1 17.1v22.2a15 15 0 01-11.3 14.5c-16 4.2-31.5 10.6-45.8 19a15 15 0 01-18.2-2.3l-15.7-15.7a17.1 17.1 0 00-24.2 0l-22.8 22.8a17.1 17.1 0 000 24.2l15.7 15.7a15 15 0 012.3 18.2 176.8 176.8 0 00-19 45.8 15 15 0 01-14.5 11.3H47c-9.4 0-17.1 7.7-17.1 17.1v32.2c0 9.4 7.7 17.1 17.1 17.1h22.2a15 15 0 0114.5 11.3c4.2 16 10.6 31.5 19 45.8a15 15 0 01-2.3 18.2l-15.7 15.7a17.1 17.1 0 000 24.2l22.8 22.8a17.1 17.1 0 0024.2 0l15.7-15.7a15 15 0 0118.2-2.3z"></path>
   <path d="M256 367.4c-61.4 0-111.4-50-111.4-111.4s50-111.4 111.4-111.4 111.4 50 111.4 111.4-50 111.4-111.4 111.4zm0-192.8a81.5 81.5 0 000 162.8 81.5 81.5 0 000-162.8z"></path></svg>
      Defenições
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="sair.php">
        <svg class="sair" viewBox="0 0 512 512" fill="currentColor" onclick="parent.location='sair.php'">
   <path d="M255.2 468.6H63.8a21.3 21.3 0 01-21.3-21.2V64.6c0-11.7 9.6-21.2 21.3-21.2h191.4a21.2 21.2 0 100-42.5H63.8A63.9 63.9 0 000 64.6v382.8A63.9 63.9 0 0063.8 511H255a21.2 21.2 0 100-42.5z"></path>
   <path d="M505.7 240.9L376.4 113.3a21.3 21.3 0 10-29.9 30.3l92.4 91.1H191.4a21.2 21.2 0 100 42.6h247.5l-92.4 91.1a21.3 21.3 0 1029.9 30.3l129.3-127.6a21.3 21.3 0 000-30.2z"></path></svg>
        Sair</a>
      </li>
    </ul>
  </div>
  <div class="app-main">
    <div class="main-header-line">
      <h1>O MEU VINHO!</h1>
      <div class="action-buttons">
        <button class="open-right-area">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      </button>
      <button class="menu-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
      </div>
    </div>
    <div class="chart-row three">
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total de vinhos</h2>
            <span><?php 
      
      $query= "SELECT id_vinho from vinho";
      $query_run = mysqli_query($conn,$query);

      $row = mysqli_num_rows($query_run);

      echo $row ;
      
      
      ?></span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart pink">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="30, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">30%</text>
    </svg>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total funcionarios</h2>
            <span><?php 
      
      $query= "SELECT id_fun from funcionario";
      $query_run = mysqli_query($conn,$query);

      $row = mysqli_num_rows($query_run);

      echo $row ;
      
      
      ?></span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart blue">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="60, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">60%</text>
    </svg>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Total alterações</h2>
            <span><?php 
      
      $query= "SELECT id_historico from historico";
      $query_run = mysqli_query($conn,$query);

      $row = mysqli_num_rows($query_run);

      echo $row ;
      
      
      ?></span>
          </div>
           <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart orange">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="90, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">90%</text>
    </svg>
          </div>
        </div>
      </div>
    </div>

    
    <div class="chart-row two">
      <div class="chart-container-wrapper big">
        <div class="chart-container">
          <div class="chart-container-header">
            <h2>Criar adega</h2>
            <span><?php if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } ?></span>
          </div>
   
          <div class="line-chart">
          <div class="login-box">
 
 <form  method="post" action="criaradega.php">
   <div class="user-box">
     <input type="text" id="text" name="adega" placeholder="Nome">
     <label style="color:white">Nome da nova adega</label>
   </div>

   <div class="user-box">
     <input type="text" id="text" name="armario" placeholder="Nome">
     <label style="color:white">Nome do primeiro armario</label>
   </div>

   <div class="user-box">
     <input type="number" id="text" name="min" placeholder="Quantidade">
     <label style="color:white">Quantidade minima(avisar)</label>
   </div>
   
   <div class="user-box">
     <input type="number" id="text" name="max" placeholder="Quantidade">
     <label style="color:white">Quantidade maxima(avisar)</label>
   </div>

    <center>
   <button  type="submit" class="bubbly-button">Criar</button>
    </center>
  </form>

  
   </div>
            <canvas id="chart"></canvas>
          </div>
          <div class="chart-data-details">
            
          
            <div class="chart-details-header"></div>
          </div>
        </div>
      </div>


      <div class="chart-container-wrapper small">
        <div class="chart-container">
          <div class="chart-container-header">
            <h2>Total</h2>
            <span href="#">This month</span>
          </div>
          <div class="acquisitions-bar">
           <span class="bar-progress rejected" style="width:8%;"></span>
            <span class="bar-progress on-hold" style="width:10%;"></span>
            <span class="bar-progress shortlisted" style="width:18%;"></span>
            <span class="bar-progress applications" style="width:64%;"></span>
          </div>
          <div class="progress-bar-info">
            <span class="progress-color applications"></span>
            <span class="progress-type">Adegas</span>
            <span class="progress-amount"><?php 
      
      $query= "SELECT id_adega from adega";
      $query_run = mysqli_query($conn,$query);

      $row = mysqli_num_rows($query_run);

      echo $row ;
      
      
      ?></span>
          </div>
          <div class="progress-bar-info">
            <span class="progress-color shortlisted"></span>
            <span class="progress-type">Armarios</span>
            <span class="progress-amount"><?php 
      
      $query= "SELECT id_armario from armario";
      $query_run = mysqli_query($conn,$query);

      $row = mysqli_num_rows($query_run);

      echo $row ;
      
      
      ?></span>
          </div>
          <div class="progress-bar-info">
            <span class="progress-color on-hold"></span>
            <span class="progress-type">Castas</span>
            <span class="progress-amount"><?php 
      
      $query= "SELECT id_castas from castas";
      $query_run = mysqli_query($conn,$query);

      $row = mysqli_num_rows($query_run);

      echo $row ;
      
      
      ?></span>
          </div>
          <div class="progress-bar-info">
            <span class="progress-color rejected"></span>
            <span class="progress-type">Categorias</span>
            <span class="progress-amount"><?php 
      
      $query= "SELECT id_categoria from categoria";
      $query_run = mysqli_query($conn,$query);

      $row = mysqli_num_rows($query_run);

      echo $row ;
      
      
      ?></span>
          </div>
        </div>
        <div class="chart-container applicants">
          <div class="chart-container-header">
            <h2>Utilizadores</h2>
            <span>Today</span>
          </div>
          <div class="applicant-line">
            <div class="applicant-info">
            <?php 

$sql ='SELECT * FROM funcionario';

if($res=mysqli_query($conn,$sql)){

    $user = array();
    $nome = array();
    $sobrenome = array();

    $iol = 0;

    while($reg=mysqli_fetch_assoc($res)){

    $user[$iol] = $reg['usuario'];
    $nome[$iol] = $reg['nome'];
    $sobrenome[$iol] = $reg['sobrenome'];


?>
              <span><?php echo $user[$iol]; ?></span>
              <p><?php echo $nome[$iol]; ?> <strong><?php echo $sobrenome[$iol]; ?></strong></p>
              <?php
        
      }}
          
          ?>
            </div>
      </div>
    </div>
  </div>

</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'></script><script  src="./script.js"></script>

</body>
</html>
