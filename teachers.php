<?php 
include_once 'includes/header.php';
include_once 'controller/get-data.php';  
?>
<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">DISCAP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link " href="admin.php">Alumnos <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="teachers.php">Maestros <span class="sr-only">(current)</span></a>
            </li>
        </ul>

    </div>
</nav>
<br>
<div class="container">
    <!-- Button insert modal -->
    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
        Agregar Maestro
    </button>
    <br>
    <br>
    <table class="table bg-light" id="table_teachers">
        <thead>
            <th>NOMBRE</th>
            <th>AP</th>
            <th>AM</th>
            <th>CORREO</th>
            <th>DOMICILIO</th>
            <th>GRUPO</th>
            <th>OPCIONES</th>
        </thead>
        <tbody>
        </tbody>
    </table>



    <!-- Modal add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Mestro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nombre:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name">
                            <div class="error" id="error-name"></div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-3 col-form-label">Apellido P :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lastname">
                            <div class="error" id="error-lastname"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname2" class="col-sm-3 col-form-label">Apellido M :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lastname2">
                            <div class="error" id="error-lastname2"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email :</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email">
                            <div class="error" id="error-email"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Contraseña :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Verificar Contraseña :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="verifyPassword">
                            <div class="error" id="error-password"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addres" class="col-sm-3 col-form-label">Domicilio :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address">
                            <div class="error" id="error-address"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="addres" class="col-sm-3 col-form-label">Grupo :</label>
                        <div class="col-sm-8">
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
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" name="teacher" value="add"
                        id="btn-save">Agregar</button>
                </div>
            </div>
        </div>
    </div><!-- End Modal add -->

    <!-- Modal update -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar datos del maestro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nombre:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name-update">
                            <input type="hidden" class="form-control" id="id-update">
                            <div class="error" id="error-name-update"></div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="lastname-update" class="col-sm-3 col-form-label">Apellido P :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lastname-update">
                            <div class="error" id="error-lastname-update"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname2-update" class="col-sm-3 col-form-label">Apellido M :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lastname2-update">
                            <div class="error" id="error-lastname2-update"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email-update" class="col-sm-3 col-form-label">Email :</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email-update">
                            <div class="error" id="error-email-update"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-update" class="col-sm-3 col-form-label">Contraseña :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password-update">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="verifyPassword-update" class="col-sm-3 col-form-label">Verificar Contraseña
                            :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="verifyPassword-update">
                            <div class="error" id="error-password-update"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="addres-update" class="col-sm-3 col-form-label">Domicilio :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address-update">
                            <div class="error" id="error-address-update"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="level-update" class="col-sm-3 col-form-label">Grupo :</label>
                        <div class="col-sm-8">
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
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" name="teacher" value="add" id="btn-update">Agregar</button>
                </div>
            </div>
        </div>
    </div><!-- End modal update-->

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
</div>

<script type="text/javascript">
    $(document).ready(function () {
        show_teachers();
    });

    var show_teachers = function () {
        var table = $("#table_teachers").DataTable({
            "ajax": {
                "url": "teachers-data.php",
                "type": "POST",
            },
            success: function (dataresponse, statustext, response) {
                Swal.fire("hola");
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
                    "data": "correo"
                },
                {
                    "data": "domicilio"
                },
                {
                    "data": "nivel_educativo"
                },
                {
                    sorteable: false,
                    "render": function (data, type, full, meta) {
                        return '<div><button class="btn btn-primary"  onclick="editTeacher(\'' +
                            full.id_maestro + '\',\'' + full.nombre + '\',\'' + full
                            .apellido_paterno + '\',\'' + full.apellido_materno + '\',\'' + full
                            .correo + '\',\'' + full.contrasena + '\',\'' + full.domicilio +
                            '\',\'' + full
                            .nivel_educativo +
                            '\')" data-toggle="modal"   data-target="#modalEdit" > <i class="fas fa-edit"></i></button> <button class="btn btn-danger" onclick="deleteTeacher(\'' +
                            full.id_maestro + '\',\'' + full.nombre + '\',\'' + full
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

        $("#btn-save").click(function () {
            var action = "add";
            var name = $('#name').val();
            var lastname = $('#lastname').val();
            var lastname2 = $('#lastname2').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var verifyPassword = $('#verifyPassword').val();
            var address = $('#address').val();
            var level = $('#level').val();


            $.ajax({
                url: "controller/teachers-controller.php",
                method: "POST",
                data: {
                    action: action,
                    name: name,
                    lastname: lastname,
                    lastname2: lastname2,
                    email: email,
                    password: password,
                    verifyPassword: verifyPassword,
                    address: address,
                    level: level
                },

                error: function (request, errorcode, errortext) {
                    Swal.fire('Ocurrio un error ' + errortext)
                },

                success: function (dataresponse, statustext, response) {
                    var mensaje = "";
                    if (dataresponse == "ok") {
                        Swal.fire('Datos  actualizados');
                    } else {

                        if (dataresponse.indexOf("nombre") > -1) {
                            $("#error-name").html(
                                "<p><strong> Verifique su nombre </strong></p>");
                        } else {
                            $("#error-name").html("");
                        }
                        if (dataresponse.indexOf("paterno") > -1) {
                            $("#error-lastname").html(
                                "<p><strong> Verifique su apellido paterno</strong></p>");
                        } else {
                            $("#error-lastname").html("");
                        }
                        if (dataresponse.indexOf("materno") > -1) {
                            $("#error-lastname2").html(
                                "<p><strong> Verifique su apellido materno </strong></p>");
                        } else {
                            $("#error-lastname2").html("");
                        }
                        if (dataresponse.indexOf("correo") > -1) {
                            $("#error-email").html(
                                "<p><strong> Verifique su correo </strong></p>");
                        } else {
                            $("#error-email").html("");
                        }
                        if (dataresponse.indexOf("contraseña") > -1) {
                            $("#error-password").html(
                                "<p><strong> Las contraseñas no coinciden </strong></p>");
                        } else {
                            $("#error-password").html("");
                        }
                        if (dataresponse.indexOf("direccion") > -1) {
                            $("#error-address").html(
                                "<p><strong> Verifique su dirección </strong></p>");
                        } else {
                            $("#error-address").html("");
                        }

                        Swal.fire("Verifique sus datos"+dataresponse);
                    }

                }
            }).done(function (data) {
                setTimeout(function () {
                    table.ajax.reload();
                }, 1000);
            }); //Done
        }); //Close btnSave()


        $("#btn-update").click(function () {
            var action = "update";
            var id = $('#id-update').val();
            var name = $('#name-update').val();
            var lastname = $('#lastname-update').val();
            var lastname2 = $('#lastname2-update').val();
            var email = $('#email-update').val();
            var password = $('#password-update').val();
            var verifyPassword = $('#verifyPassword-update').val();
            var address = $('#address-update').val();
            var level = $('#level-update').val();


            $.ajax({
                url: "controller/teachers-controller.php",
                method: "POST",
                data: {
                    action: action,
                    id:id,
                    name: name,
                    lastname: lastname,
                    lastname2: lastname2,
                    email: email,
                    password: password,
                    verifyPassword: verifyPassword,
                    address: address,
                    level: level
                },

                error: function (request, errorcode, errortext) {
                    Swal.fire('Ocurrio un error ' + errortext)
                },

                success: function (dataresponse, statustext, response) {
                    var mensaje = "";
                    if (dataresponse == "ok") {
                        Swal.fire('Datos actualizados');
                    } else {

                        if (dataresponse.indexOf("nombre") > -1) {
                            $("#error-name-update").html(
                                "<p><strong> Verifique su nombre </strong></p>");
                        } else {
                            $("#error-name-update").html("");
                        }
                        if (dataresponse.indexOf("paterno") > -1) {
                            $("#error-lastname-update").html(
                                "<p><strong> Verifique su apellido </strong></p>");
                        } else {
                            $("#error-lastname-update").html("");
                        }
                        if (dataresponse.indexOf("materno") > -1) {
                            $("#error-lastname2-update").html(
                                "<p><strong> Verfique su apellido </strong></p>");
                        } else {
                            $("#error-lastname2-update").html("");
                        }
                        if (dataresponse.indexOf("correo") > -1) {
                            $("#error-email-update").html(
                                "<p><strong> Verifique su correo </strong></p>");
                        } else {
                            $("#error-email-update").html("");
                        }
                        if (dataresponse.indexOf("contraseña") > -1) {
                            $("#error-password-update").html(
                                "<p><strong> Las contraseñas no coinciden </strong></p>");
                        } else {
                            $("#error-password-update").html("");
                        }
                        if (dataresponse.indexOf("direccion") > -1) {
                            $("#error-address-update").html(
                                "<p><strong> Verifique su dirección </strong></p>");
                        } else {
                            $("#error-address-update").html("");
                        }

                        Swal.fire("Verifique sus datos");
                    }

                }
            }).done(function (data) {
                setTimeout(function () {
                    table.ajax.reload();
                }, 1000);
            }); //Done
        }); //Close btnUpdate()

        $("#btnDelete").click(function () {
            var action = "delete";
            var id = $('#id-delete').val();
            $.ajax({
                url: "controller/teachers-controller.php",
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
                        Swal.fire('Mestro eliminado');
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
    function editTeacher(id, name, lastname, lastname2, email, password, address, level) {
        $('#id-update').val(id);
        $('#name-update').val(name);
        $('#lastname-update').val(lastname);
        $('#lastname2-update').val(lastname2);
        $('#email-update').val(email);
        $('#password-update').val(password);
        $('#address-update').val(address);
        $('#level-update').val(level);
    }

    function deleteTeacher(id,name,lastname,lastname2){
        $('#id-delete').val(id);
        $('#delete').html("<h5> Esta seguro que quiere eliminar al siguiente maestro:  "+ name+" "+lastname+" "+lastname2+"</h5>");
    }
</script>
<?php include_once 'includes/footer.php'; ?>