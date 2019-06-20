<?php 
  include_once 'includes/header.php'; 
  if(!isset($_SESSION)){
  session_start();
  }
?>
<link rel="stylesheet" href="./css/login.css">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="assets/img/user.jpg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="controller/login.php" method="POST">
      <input type="email" id="login" class="fadeIn second" name="login" placeholder="Correo">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
      <input type="submit" class="fadeIn fourth" value="Iniciar Sesión">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
        <?php if(isset($_SESSION['error_login'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['error_login'];?>
            </div>
        <?php endif;?>
    </div>

  </div>
</div>