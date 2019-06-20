<?php 
include_once 'includes/header.php';
include_once 'controller/get-data.php';  ?>
<!--NavBar-->
<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">DISCAP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link active" href="admin.php">Alumnos <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="teachers.php">Maestros <span class="sr-only">(current)</span></a>
            </li>
        </ul>

    </div>
</nav>
<!--End NavBar-->
<br>
<div class="container ">
    <!-- Button add modal -->
    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addModal">
        Agregar alumno
    </button>
    <!--End Button add modal -->
    <br>
    <br>
    <!-- Modal Insert-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name">
                            <div class="error" id="error-name"> </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Apellido Paterno</label>
                            <input type="text" class="form-control" id="lastname">
                            <div class="error" id="error-lastname"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="lastname2">Apellido Materno</label>
                            <input type="text" class="form-control" id="lastname2">
                            <div class="error" id="error-lastname2"> </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="curp">CURP</label>
                            <input type="text" class="form-control" id="curp">
                            <div class="error" id="error-curp"> </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="date">
                            <div class="error" id="error-date"> </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Sexo</label>
                            <select class="form-control" id="gender">
                                <option value="H">Hombre</option>
                                <option value="M">Mujer</option>
                                <option>Otro</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="education">Nivel Educativo</label>
                        <select class="form-control" id="level">
                            <?php
                        $levels = getLevels($connection); 
                        foreach ($levels as $level ): 
                        ?>
                            <option value="<?= $level['id_nivel'] ?>"> <?= $level['grado'].' '.$level['nivel'] ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Domicilio</label>
                        <input type="text" class="form-control" id="address" aria-describedby="address">
                        <div class="error" id="error-address"> </div>
                    </div>
                    <div class="form-group">
                        <label for="diagnostic">Diagnostico</label>
                        <input type="text" class="form-control" id="diagnostic" aria-describedby="diagnostic">
                        <div class="error" id="error-diagnostic"> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" name="student" value="add" id="btnSave">Guardar
                        alumno</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Insert-->

    <!-- Modal edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name-update">
                            <input type="hidden" class="form-control" id="id-update">
                            <div class="error" id="error-name-update"> </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Apellido Paterno</label>
                            <input type="text" class="form-control" id="lastname-update">
                            <div class="error" id="error-lastname-update"> </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="lastname2">Apellido Materno</label>
                            <input type="text" class="form-control" id="lastname2-update">
                            <div class="error" id="error-lastname2-update"> </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="curp">CURP</label>
                            <input type="text" class="form-control" id="curp-update">
                            <div class="error" id="error-curp-update"> </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="date-update">
                            <div class="error" id="error-date-update"> </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Sexo</label>
                            <select class="form-control" id="gender-update">
                                <option value="H">Hombre</option>
                                <option value="M">Mujer</option>
                                <option>Otro</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="education">Nivel Educativo</label>
                        <select class="form-control" id="level-update">
                            <?php
                        $levels = getLevels($connection); 
                        foreach ($levels as $level ): 
                        ?>
                            <option value="<?= $level['id_nivel'] ?>"> <?= $level['grado'].' '.$level['nivel'] ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Domicilio</label>
                        <input type="text" class="form-control" id="address-update" aria-describedby="address">
                        <div class="error" id="error-address-update"> </div>
                    </div>
                    <div class="form-group">
                        <label for="diagnostic">Diagnostico</label>
                        <input type="text" class="form-control" id="diagnostic-update" aria-describedby="diagnostic">
                        <div class="error" id="error-diagnostic-update"> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" name="student" value="update" id="btnUpdate">Guardar
                        cambios</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal edit -->

     <!-- Modal delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <label id="delete"></label>
                     <input type="hidden" id="id-delete">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" name="student" value="delete" id="btnDelete">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal delete -->


    <table class="table bg-light" id="table_students">
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
            "ajax": {
                "url": "students-data.php",
                "type": "POST",
            },
            "columns": [{
                    "data": "nombre"
                },
                {
                    "data": "apellido_paterno"
                },
                {
                    "data": "apellido_materno"
                },
                {
                    "data": "curp"
                },
                {
                    "data": "nacimiento"
                },
                {
                    "data": "nivel_educativo"
                },
                {
                    sorteable: false,
                    "render": function (data, type, full, meta) {
                        return '<div><button class="btn btn-primary"  onclick="editStudent(\'' +
                            full.id_alumno + '\',\'' + full.nombre + '\',\'' + full
                            .apellido_paterno + '\',\'' + full.apellido_materno + '\',\'' + full
                            .curp + '\',\'' + full.nacimiento + '\',\'' + full.sexo + '\',\'' + full
                            .nivel_educativo + '\',\'' + full.domicilio + '\',\'' + full
                            .diagnostico +
                            '\')" data-toggle="modal"   data-target="#modalEdit" > <i class="fas fa-edit"></i></button> <button class="btn btn-danger" onclick="deleteStudent(\'' +
                            full.id_alumno + '\',\'' + full.nombre + '\',\'' + full
                            .apellido_paterno + '\',\'' + full.apellido_materno +
                            '\')" data-toggle="modal"   data-target="#modalDelete" ><i class="fas fa-user-times"></i></button>  </div> ';
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

        $("#btnSave").click(function () {
            var action = "add";
            var name = $('#name').val();
            var lastname = $('#lastname').val();
            var lastname2 = $('#lastname2').val();
            var date = $('#date').val();
            var curp = $('#curp').val();
            var gender = $('#gender').val();
            var level = $('#level').val();
            var address = $('#address').val();
            var diagnostic = $('#diagnostic').val();
            $.ajax({
                url: "controller/students-controller.php",
                method: "POST",
                data: {
                    action: action,
                    name: name,
                    lastname: lastname,
                    lastname2: lastname2,
                    date: date,
                    curp: curp,
                    gender: gender,
                    level: level,
                    address: address,
                    diagnostic: diagnostic
                },

                error: function (request, errorcode, errortext) {
                    $("#respuesta").html("<p>Ocurrió el siguiente error: <strong>" + errortext +
                        "</strong></p>");
                },

                success: function (dataresponse, statustext, response) {
                    var mensaje = "";
                    if (dataresponse == "ok") {
                        Swal.fire( 'Maestro agregado correctamente!');
                    } else {

                        if (dataresponse.indexOf("nombre") > -1) {
                            $("#error-name").html(
                                "<p><strong> Nombre incorrecto </strong></p>");
                        } else {
                            $("#error-name").html("");
                        }
                        if (dataresponse.indexOf("paterno") > -1) {
                            $("#error-lastname").html(
                                "<p><strong> El apellido es incorrecto </strong></p>");
                        } else {
                            $("#error-lastname").html("");
                        }
                        if (dataresponse.indexOf("materno") > -1) {
                            $("#error-lastname2").html(
                                "<p><strong> El apellido es incorrecto </strong></p>");
                        } else {
                            $("#error-lastname2").html("");
                        }
                        if (dataresponse.indexOf("curp") > -1) {
                            $("#error-curp").html(
                                "<p><strong> Verifique su CURP </strong></p>");
                        } else {
                            $("#error-curp").html("");
                        }
                        if (dataresponse.indexOf("direccion") > -1) {
                            $("#error-address").html(
                                "<p><strong> Verifique su dirección </strong></p>");
                        } else {
                            $("#error-address").html("");
                        }
                        if (dataresponse.indexOf("diagnostico") > -1) {
                            $("#error-diagnostic").html(
                                "<p><strong> El campo debe estar lleno </strong></p>");
                        } else {
                            $("#error-diagnostic").html("");
                        }
                        if (dataresponse.indexOf("fecha") > -1) {
                            $("#error-date").html(
                                "<p><strong> El campo debe estar lleno</strong></p>");
                        } else {
                            $("#error-date").html("");
                        }
                        Swal.fire("Verifique sus datos");
                    }

                }
            }).done(function (data) {
                setTimeout(function () {
                    table.ajax.reload();
                }, 1000);
            }); //DONE
            console.log(name, lastname, lastname2, date, curp, gender, level, address, diagnostic);
            // setTimeout(function(){tableGenres.ajax.reload();},1000); 
            //tableGenres.ajax.reload(null,false);
        }); //Close btnSave()

        $("#btnUpdate").click(function () {
            var action = "update";
            var id = $('#id-update').val();
            var name = $('#name-update').val();
            var lastname = $('#lastname-update').val();
            var lastname2 = $('#lastname2-update').val();
            var date = $('#date-update').val();
            var curp = $('#curp-update').val();
            var gender = $('#gender-update').val();
            var level = $('#level-update').val();
            var address = $('#address-update').val();
            var diagnostic = $('#diagnostic-update').val();
            $.ajax({
                url: "controller/students-controller.php",
                method: "POST",
                data: {
                    action: action,
                    id: id,
                    name: name,
                    lastname: lastname,
                    lastname2: lastname2,
                    date: date,
                    curp: curp,
                    gender: gender,
                    level: level,
                    address: address,
                    diagnostic: diagnostic
                },

                error: function (request, errorcode, errortext) {
                    $("#respuesta").html("<p>Ocurrió el siguiente error: <strong>" + errortext +
                        "</strong></p>");
                },

                success: function (dataresponse, statustext, response) {
                    var mensaje = "";
                    if (dataresponse == "ok") {
                        Swal.fire('Datos actualizados');
                    } else {

                        if (dataresponse.indexOf("nombre") > -1) {
                            $("#error-name-update").html(
                                "<p><strong> Nombre incorrecto </strong></p>");
                        } else {
                            $("#error-name-update").html("");
                        }
                        if (dataresponse.indexOf("paterno") > -1) {
                            $("#error-lastname-update").html(
                                "<p><strong> El apellido es incorrecto </strong></p>");
                        } else {
                            $("#error-lastname-update").html("");
                        }
                        if (dataresponse.indexOf("materno") > -1) {
                            $("#error-lastname2-update").html(
                                "<p><strong> El apellido es incorrecto </strong></p>");
                        } else {
                            $("#error-lastname2-update").html("");
                        }
                        if (dataresponse.indexOf("curp") > -1) {
                            $("#error-curp-update").html(
                                "<p><strong> Verifique su CURP </strong></p>");
                        } else {
                            $("#error-curp-update").html("");
                        }
                        if (dataresponse.indexOf("direccion") > -1) {
                            $("#error-address-update").html(
                                "<p><strong> Verifique su dirección </strong></p>");
                        } else {
                            $("#error-address-update").html("");
                        }
                        if (dataresponse.indexOf("diagnostico") > -1) {
                            $("#error-diagnostic-update").html(
                                "<p><strong> El campo debe estar lleno </strong></p>");
                        } else {
                            $("#error-diagnostic-update").html("");
                        }
                        if (dataresponse.indexOf("fecha") > -1) {
                            $("#error-date-update").html(
                                "<p><strong> El campo debe estar lleno</strong></p>");
                        } else {
                            $("#error-date-update").html("");
                        }
                        Swal.fire("Verifique sus datos");
                    }

                }
            }).done(function (data) {
                setTimeout(function () {
                    table.ajax.reload();
                }, 1000);
            }); //DONE
            console.log(name, lastname, lastname2, date, curp, gender, level, address, diagnostic);
            // setTimeout(function(){tableGenres.ajax.reload();},1000); 
            //tableGenres.ajax.reload(null,false);
        }); //Close btnUpdate()

        $("#btnDelete").click(function () {
            var action = "delete";
            var id = $('#id-delete').val();
            $.ajax({
                url: "controller/students-controller.php",
                method: "POST",
                data: {
                    action: action,
                    id: id
                },
                error: function (request, errorcode, errortext) {
                   
                },
                success: function (dataresponse, statustext, response) {
                    var mensaje = "";
                    if (dataresponse == "ok") {
                        Swal.fire('Alumno eliminado');
                    } else {
                        Swal.fire("Ocurrio un error" + dataresponse);
                    }
                }
            }).done(function (data) {
                setTimeout(function () {
                    table.ajax.reload();
                }, 1000);
            }); 

        }); //Close btnDelete()
    }
</script>

<script type="text/javascript">
    function editStudent(id, name, lastname, lastname2, curp, date, gender, level, address, diagnostic) {
        $('#id-update').val(id);
        $('#name-update').val(name);
        $('#lastname-update').val(lastname);
        $('#lastname2-update').val(lastname2);
        $('#date-update').val(date);
        $('#curp-update').val(curp);
        $('#gender-update').val(gender);
        $('#level-update').val(level);
        $('#address-update').val(address);
        $('#diagnostic-update').val(diagnostic);
    }

    function deleteStudent(id,name,lastname,lastname2){
        $('#id-delete').val(id);
        $('#delete').html("<h5> Esta seguro que quiere eliminar al siguiente alumno:  "+ name+" "+lastname+" "+lastname2+"</h5>");
    }
</script>
<?php include_once 'includes/footer.php'; ?>