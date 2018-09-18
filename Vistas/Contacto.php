<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mis Perris</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../jquery/jquery.js"></script>
    <script src="../jquery/jquery.validate.js"></script>


    <div class="barra">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <img src="../img/logo.png" alt="logo">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <a href="index.html" class="blanco">Inicio</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <a href="" class="blanco">Quienes somos</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <a href="" class="blanco">Servicios</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <a href="Contacto.php" class="blanco">Contactanos</a>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(event) {
            $("#cboRegion").change(function() {
                var id = $("#cboRegion").val();
                $.ajax({
                    url: "llenar_combo.php",
                    type: 'POST',
                    data: {
                        id_region: id
                    },
                    success: function(data) {
                        $("#cboCiudad").html(data);
                    }
                });
            });
        });
    </script>
    <?php
         $cone= mysqli_connect("localhost", "root", "","miperris");
         $reg= mysqli_query($cone,"select * from region")
        ?>

        <form action="../Vistas/Ingresar.php" method="post" id="formulario" autocomplete="off">
            <div class="form-group">
                <label for="Correo">Correo Electronico</label>
                <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Ej: correo@gmail.com">
            </div>
            <div class="form-group">
                <label for="Run">Rut</label>
                <input type="text" class="form-control" id="txtRun" name="txtRun" placeholder="Ej : 11.111.111-1">
            </div>
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese Nombre Completo">
            </div>
            <div class="form-group">
                <label for="Fecha">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="dtpFecha" name="dtpFecha" placeholder="">
            </div>
            <div class="form-group">
                <label for="Telefono">Telefono</label>
                <input type="text" class="form-control" id="txtTelefono" name="txtTelefono">
            </div>
            <div class="form-group">
                <label for="Region">Region</label>
                <select name="cboRegion" class="form-control" id="cboRegion" placeholder="Seleccione">
                <?php
                            while($row=mysqli_fetch_array($reg)){
                                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                            }
                            ?>
            </select>
            </div>
            <div class="form-group">
                <label for="Ciudad">Ciudad</label>
                <select name="cboCiudad" class="form-control" id="cboCiudad" placeholder="Seleccione"></select>
            </div>
            <div class="form-group">
                <label for="Vivienda">Tipo de Vivienda</label>
                <select name="cboVivienda" class="form-control" id="cboVivienda">

                <option value="1">Casa Con Patio Grande</option>
                <option value="2">Casa con patio pequeño</option>
                <option value="3">Casa sin patio</option>
                <option value="4">Departamento</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar </button>
            <p>¿Ya tienes una cuenta? <a href="../Vistas/login.html">Ingresa Aqui </a></p>

        </form>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script>
            // just for the demos, avoids form submit
            jQuery.validator.setDefaults({
                debug: true,
                success: "valid"
            });
            $("#formulario").validate({
                rules: {
                    cboCiudad: {
                        required: true
                    },
                    txtRun: {
                        required: true,
                        maxlength: 12
                    },
                    txtNombre:{
                        required: true
                    },
                    txtCorreo:{
                        required: true,
                        email: true
                    },txtTelefono:{
                        required: true
                    }
                },
                messages: {
                    txtRun: {
                        required: "me debes la vida"
                    }
                }
            });
        </script>

</body>

</html>