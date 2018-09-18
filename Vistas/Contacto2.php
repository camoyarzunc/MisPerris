<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Document</title>
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
                <a href="Contacto2.php" class="blanco">Contactanos</a>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script>

            $(document).ready(function (event) {
                $("#cboRegion").change(function () {
                    var id = $("#cboRegion").val();
                    $.ajax({
                        url: "llenar_combo.php",
                        type: 'POST',
                        data: { id_region: id },
                        success: function (data) {
                            $("#cboCiudad").html(data);
                        }
                    });
                });
            });
    </script>
    <?php
         $cone= mysqli_connect("localhost", "root", "","misperris");
         $reg= mysqli_query($cone,"select * from region")
        ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#form").validate({
                    rules: {
                        txtCorreo: {
                            required: true,
                            email: true
                        },
                        txtRun: {
                            required: true,
                            maxlength: 12
                        },
                        txtNombre: {
                            required: true,
                            minlength: 5
                        },
                        txtTelefono: {
                            required: true,
                            minlength: 5
                        }

                    },
                    messages: {
                        txtCorreo: {
                            required: "Please enter a username",
                            email: "sadasdasdasdasdasd"
                        },
                        txtRun: {
                            required: "Please enter a username",
                            maxlength: "Your username must consist of at least 2 characters"
                        },
                        txtNombre: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        txtTelefono: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        }
                    },
                    errorElement: "em",
                    errorPlacement: function (error, element) {
                        // Add the `help-block` class to the error element
                        error.addClass("help-block");

                        if (element.prop("type") === "checkbox") {
                            error.insertAfter(element.parent("label"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                    }
                }); 
        </script>
        <form class="form-horizontal" id="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="txtCorreo" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Nombre:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="txtNombre" placeholder="Ingrese nombre completo ">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Rut:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="txtRun" placeholder="Ingrese rut ">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Telefono:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="txtTelefono" placeholder="Ingrese telefono ">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>

    
</body>
</html>