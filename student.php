<?php include_once 'includes/header.php'; ?>
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
                        return '<div><button class="btn btn-primary"  onclick="editCategoria()" data-toggle="modal"   data-target="#modalEdit" > <i class="fas fa-edit"></i></button> <button class="btn btn-danger" onclick="deleteCategoria()"><i class="fas fa-user-times"></i></button>  <button class="btn btn-success" onclick="evaluar()"><i class="fas fa-check-square"></i></button> </div>  </div>';
                        }
                    } 
                ]
            });
        }
    </script>
<?php include_once 'includes/footer.php'; ?>