<?php
// recuperar los datos desde el formulario

$correo=$_POST["txtCorreo"];
$run_postulante=$_POST["txtRun"];
$nombre=$_POST["txtNombre"];
$fecha_nacimiento=$_POST["dtpFecha"];
$telefono=$_POST["txtTelefono"];
$ciudad=$_POST["cboCiudad"];
$region=$_POST["cboRegion"];
$tipo_vivienda=$_POST["cboVivienda"];

include_once '../Controlador/conexion.php';
include_once '../Controlador/DaoFormulario.php';
include_once '../modelo/Formulario.php';

$form=new Formulario();
$form->setRun_postulante($run_postulante);
$form->setNombre($nombre);
$form->setFecha_nacimiento($fecha_nacimiento);
$form->setTelefono($telefono);
$form->setCiudad($ciudad);
$form->setRegion($region);
$form->setTipo_vivienda($tipo_vivienda);
$form->setCorreo($correo);

$dao=new DaoFormulario();
$resp=$dao->Crear($form);

if ($resp>0) {
    echo "Usuario Ingresado Con Exito";
}else{
    echo 'No es posible realizar esta accion ';
}



?>
