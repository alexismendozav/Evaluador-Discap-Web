<?php 
include_once 'includes/redirect.php';
include_once 'includes/header.php';
include_once 'controller/get-data.php';
if(!isset($_SESSION)){
    session_start();
}

$id = $_GET['id'];
$name  = $_GET['name'];
$lastname = $_GET['lastname'];
$lastname2  = $_GET['lastname2'];
?>

<!--NavBar-->
<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><?php //echo $_SESSION['user']['nombre'] .' '. $_SESSION['user']['apellido_paterno'] .' '. $_SESSION['user']['apellido_materno'] ;?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a href="includes/close-session.php" class="btn btn-outline-light my-2 my-sm-0" role="button" >Cerrar sesión</a>
        </form>
    </div>
</nav>
<div class="container">
<br>
<h2 class="text-center">Evaluando a: <?php echo '<br>'.$name.' '.$lastname.' '.$lastname2;?></h2>
<hr>
<br>
<h4>ATENCIÓN VISUAL</h4>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Habilidad</th>
      <th scope="col">Lo logra</th>
      <th scope="col">En proceso</th>
      <th scope="col">No lo logra</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th>Seguimiento de objetos en movimiento</th>
        <th><button type="button" class="btn btn-success"></button></th>
        <th><button type="button" class="btn btn-warning"></button></th>
        <th><button type="button" class="btn btn-danger"></button></th>
    </tr>
    <tr>
        <th>Atiende objetos próximos y distantes</th>
        <th><button type="button" class="btn btn-success"></button></th>
        <th><button type="button" class="btn btn-warning"></button></th>
        <th><button type="button" class="btn btn-danger"></button></th>
    </tr>
    <tr>
        <th>Busca el objeto perdido</th>
        <th><button type="button" class="btn btn-success"></button></th>
        <th><button type="button" class="btn btn-warning"></button></th>
        <th><button type="button" class="btn btn-danger"></button></th>
    </tr>
  </tbody>
</table>
<br>
<h4>ATENCIÓN AUDITIVA</h4>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Habilidad</th>
      <th scope="col">Lo logra</th>
      <th scope="col">En proceso</th>
      <th scope="col">No lo logra</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th>  Responde  a  un  estímulo  sonoro...........</th>
        <th><button type="button" class="btn btn-success"></button></th>
        <th><button type="button" class="btn btn-warning"></button></th>
        <th><button type="button" class="btn btn-danger"></button></th>
    </tr>
    <tr>
        <th>Busca la fuente sonora</th>
        <th><button type="button" class="btn btn-success"></button></th>
        <th><button type="button" class="btn btn-warning"></button></th>
        <th><button type="button" class="btn btn-danger"></button></th>
    </tr>

  </tbody>
</table>

<br>
<h4>CAVIDAD NEUROFACIAL</h4>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Habilidad</th>
      <th scope="col">Lo logra</th>
      <th scope="col">En proceso</th>
      <th scope="col">No lo logra</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th>Presenta disociación de labio</th>
        <th><button type="button" class="btn btn-success"></button></th>
        <th><button type="button" class="btn btn-warning"></button></th>
        <th><button type="button" class="btn btn-danger"></button></th>
    </tr>
    <tr>
        <th>Presenta disociación de lengua</th>
        <th><button type="button" class="btn btn-success"></button></th>
        <th><button type="button" class="btn btn-warning"></button></th>
        <th><button type="button" class="btn btn-danger"></button></th>
    </tr>

    <tr>
        <th>Presenta disociación de mandibula</th>
        <th><button type="button" class="btn btn-success"></button></th>
        <th><button type="button" class="btn btn-warning"></button></th>
        <th><button type="button" class="btn btn-danger"></button></th>
    </tr>

  </tbody>
</table>
    <div class="mx-auto" style="width: 500px;">
            <div class="form-group">
                <select class="form-control " id="area">
                    <option selected>Elija el área a evaluar</option>
                        <?php
                            $areas = getAreas($connection); 
                            foreach ($areas as $area ): 
                            ?>
                                <option value="<?= $area['area'] ?>"> <?= $area['area'] ?>
                                </option>
                        <?php endforeach;?>
                </select>
            </div>
    </div>
    <div class="text-right">
    <button type="submit" class="btn btn-success mb-2 ml-auto   ">Guardar evaluación</button>
    </div>
</div>

<script>
     $(document).ready(function () {
        $("#area").change(function(){
            $.ajax({
                url: "controller/abilities-controller.php",
                method: "POST",
                data: {
                    area: area,
                },

                error: function (request, errorcode, errortext) {
                    $("#respuesta").html("<p>Ocurrió el siguiente error: <strong>" + errortext +
                        "</strong></p>");
                },
                success: function (dataresponse, statustext, response) {
                   
                }
            }).done(function (data) {
              
            }); //DONE
	    });
    });
</script>