<?php 
include_once 'includes/redirect.php';
include_once 'includes/header.php';
if(!isset($_SESSION)){
    session_start();
} 
?>

<!--NavBar-->
<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><?php echo $_SESSION['user']['nombre'] .' '. $_SESSION['user']['apellido_paterno'] .' '. $_SESSION['user']['apellido_materno'] ;?></a>
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
<br>
    <div class="container bg-light">
        <table class="table" id="table_students">
            <thead>
                <th>NOMBRE</th>
                <th>AP</th>
                <th>AM</th>
                <th>CURP</th>
                <th>NACIMIENTO</th>             
                <th>GRADO</th>
                <th>OPCIONES</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            show_students();
        });

        var show_students = function () {
            var table = $("#table_students").DataTable({
                "ajax":{                    
                    "url": "students-data.php",
                    "type":"POST",
                    data : {
                        level : <?php echo $_SESSION['user']['nivel_educativo'];?>
                    }, 
                },
                "columns":[
                    {"data": "nombre" },
                    {"data": "apellido_paterno" },
                    {"data": "apellido_materno" },
                    {"data": "curp" },
                    {"data": "nacimiento" },
                    {"data": "nivel_educativo" },
                    {
                        sorteable: false,
                        "render": function (data, type, full, meta) {
                        return '<div><button class="btn btn-primary"  onclick="evaluation(\''+full.id_alumno+'\',\''+full.nombre+'\',\''+full.apellido_paterno+'\',\''+full.apellido_materno+'\')" > <i class="fas fa-edit"></i> </button>   <button class="btn btn-success" onclick="show()"><i class="fas fa-check-square"></i></button> </div>  </div>';
                        }
                    } 
                ],
                language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            });
        }
    </script>
    <script >
    function evaluation(id,name,lastname,lastname2)
        {
            document.location.href = "evaluation.php?id=" +id + "&name=" + name + "&lastname="+ lastname+"&lastname2="+ lastname2+"&";
        }
    </script>
<?php include_once 'includes/footer.php'; ?>