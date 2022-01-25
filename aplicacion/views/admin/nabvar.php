<?php error_reporting(0); ?>
<?php include("../../models/autenticado.php"); ?>
<?php include("../../models/id/id_usuario.php"); ?>
<?php include("../validaciones/validaciones.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8">
  <title>Panel Administrativo</title>

  <!-- Site favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="../img/logo-tresol-Corel-azul.png">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../../plantilla/vendors/styles/core.css">
  <link rel="stylesheet" type="text/css" href="../../plantilla/vendors/styles/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="../../plantilla/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../../plantilla/src/plugins/datatables/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../../plantilla/vendors/styles/style.css">
  

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
  </script>


<style type="text/css">
.username, .email {
  border-top:#F0F0F0 2px solid;
  background:#FAF8F8;
  padding:10px;
}
.demoInputBox {
  padding:7px;
  border:#F0F0F0 1px solid;
  border-radius:4px;
}
.estado-disponible-nombre {
  color:#2FC332;
}
.estado-no-disponible-nombre {
  color:#D60202;
}
.estado-disponible-email {
  color:#2FC332;
}
.estado-no-disponible-email {
  color:#D60202;
}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function comprobarCodigo() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "../../models/ComprobarDisponibilidad.php",
  data:'codigo_CUSPP='+$("#codigo_CUSPP").val(),
  type: "POST",
  success:function(data){
    $("#estadocodigoempledo").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
</script>

<script>
function comprobarCedula() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "../../models/ComprobarDisponibilidad.php",
  data:'cedula_beneficiario='+$("#cedula_beneficiario").val(),
  type: "POST",
  success:function(data){
    $("#estadocedula").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
</script>

<script>
function comprobardniEmpleado() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "../../models/ComprobarDisponibilidad.php",
  data:'ci='+$("#ci").val(),
  type: "POST",
  success:function(data){
    $("#estadodniempledo").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
</script>

<script>
function comprobardniFamilia() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "../../models/ComprobarDisponibilidad.php",
  data:'dni_f='+$("#dni_f").val(),
  type: "POST",
  success:function(data){
    $("#estadodnifamilia").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
</script>

<script>
function comprobarCedula1() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "../../models/ComprobarDisponibilidad.php",
  data:'cedula_medico='+$("#cedula_medico").val(),
  type: "POST",
  success:function(data){
    $("#estadocedula1").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
</script>

<script>
function comprobarCorreo() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "../../models/ComprobarDisponibilidad.php",
  data:'correo='+$("#correo").val(),
  type: "POST",
  success:function(data){
    $("#estadocorreo").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
</script>

<script>
function comprobarUsuario() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "../../models/ComprobarDisponibilidad.php",
  data:'usuario='+$("#usuario").val(),
  type: "POST",
  success:function(data){
    $("#estadocorreousuario").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
</script>

<style type="text/css">
  body {
         
    }
</style>
</head>
<body>
  <div class="header">
    <div class="header-left">
      <div class="menu-icon dw dw-menu"></div>
      
    </div>
    <div class="header-right">      
      <div class="user-info-dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="user-icon">
              <?php 
                  $foto_emplead = ("SELECT * FROM foto_usuario WHERE id_usuario = '$id'");
                  $result=mysqli_query(conexion::con(), $foto_emplead);
                  foreach ($result as $foto_perfil) {
              ?>
                  <img src="../../controllers/registro/foto/<?php echo $foto_perfil['foto'] ?>">
              <?php } ?>
            </span>
            <span class="user-name"><?php echo $user; ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
            <a class="dropdown-item" href="perfil.php"><i class="dw dw-user1"></i> Perfil</a>
            <a class="dropdown-item" href="../../controllers/cerrar/salir.php"><i class="dw dw-logout"></i> Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="left-side-bar">
    <div class="brand-logo">
      <a href="home.php">
        <h6 class="text-center text-white">Derivados Mineros, C.A</h6>
      </a>
      <div class="close-sidebar" data-toggle="left-sidebar-close">
        <i class="ion-close-round"></i>
      </div>
    </div>
    <div class="menu-block customscroll">
      <div class="sidebar-menu">
        <ul id="accordion-menu">
          <li>
            <a href="home.php" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-house-1"></span><span class="mtext">Inicio</span>
            </a>
          </li>
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon fa fa-group"></span><span class="mtext">Empleados</span>
            </a>
            <ul class="submenu child">
              <li><a href="empleados.php">Registro</a></li>
              <li><a href="consulta_empleado.php">Empleado Activos</a></li>
              <li><a href="empleados_inhabilitados.php">Empleado Inhabilitados</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon fa fa-drivers-license"></span><span class="mtext">Pagos</span>
            </a>
            <ul class="submenu child">
              <li><a href="registrar_pago.php">Registrar</a></li>
              <li><a href="#">Consulta</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon fa fa-drivers-license"></span><span class="mtext">Vacantes</span>
            </a>
            <ul class="submenu child">
              <li><a href="vacante.php">Publicar</a></li>
              <li><a href="consultar_vacantes.php">Consulta</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon fa fa-sticky-note"></span><span class="mtext">Reportes</span>
            </a>
            <ul class="submenu child">
              <li><a href="#" onclick="window.open('imprimir/empleado.php', 'Empleado', 'width=700, height=505, ');">Empleados Registrados</a></li>
              <li><a href="#" onclick="window.open('imprimir/empleado_activo.php', 'Empleado', 'width=700, height=505, ');">Empleados Activos</a></li>
              <li><a href="#" onclick="window.open('imprimir/empleado_inhabilitado.php', 'Empleado', 'width=700, height=505, ');">Empleados Inhabilitados</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon fa fa-user"></span><span class="mtext">Usuario</span>
            </a>
            <ul class="submenu child">
              <li><a href="consultar_usuario.php">Ver usuarios</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="mobile-menu-overlay"></div>

  <div class="modal fade" id="crear_boleta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Seleccione el empleado que desea crearle la Boleta de Pago</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <form action="boletas_pago.php" method="POST">
                    <label><b>Empleado</b></label>
                    <select name="id_empleado" class="form-control" required="">
                      <option value="">Seleccione</option>
                        <?php 
                          $sql=("SELECT *FROM empleado ORDER BY id_empleado DESC");
                          $res=mysqli_query(conexion::con(), $sql);
                            foreach ($res as $key) {
                        ?>
                        <option value="<?php echo $key['id_empleado']; ?>"><?php echo $key['dni']; ?> || <?php echo $key['nombre_completo']; ?></option>
                        <?php } ?>
                    </select>
                    <br>
              <p align="right">
                <button type="submit" class="btn btn-primary">Continuar</button>
              </p>
            </form>
        </div>
      </div>
    </div>
  </div>

 




 