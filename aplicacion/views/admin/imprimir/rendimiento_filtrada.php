<?php include("../../../models/autenticado.php"); ?>
<?php 
    include('../../../bd/conexion.php');
?>
<?php 
  $fecha1=$_GET['fecha1'];
  $fecha2=$_GET['fecha2'];
?>
<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario</title>
</head>
<script type="text/javascript">
            function imprimir() {
                if (window.print) {
                    window.print();
                } else {
                    alert("La función de impresion no esta soportada por su navegador.");
                }
            }
</script>
<style>
        @page{
         size:  auto;   /* auto es el valor inicial */
         margin: 5mm;  /* afecta el margen en la configuración de impresión */
        }
</style>
<body onload="imprimir();"><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2">
            
        </div>
        <div class="col-xs-8">
            <h3 align="center"><b>Rendimiento en Ventas de los Empleado Consulta Filtrada por Fecha</b></h3><p>
        </div>
        <div class="col-xs-2"> </div>
    </div>
    
    <div class="row">
      <b>Desde:</b> <?php echo $fecha1; ?> <b>Hasta:</b>  <?php echo $fecha2; ?>
        <div class="col-xs-12"><br><br>
              <table class="table">
				  			<thead>
				  			<tr>
				  				<th>Empleado</th>
				  				<th>Unidades Vendidas</th>
				  				<th>Total en Venta</th>
				  				<th>Fecha de Salida</th>
				  			</tr>
				  		    </thead>
					  	    <?php 
					  	        $hoy=date("Y-m-d");
			          		    $con=("SELECT *FROM empleado WHERE status='0'");
			                    $res=mysqli_query(conexion::con(), $con);
			                    foreach ($res as $key) {
			                    $id_empleado=$key['id_empleado'];                     
			          		?>
			          		   <tr>
			          		   	   <td><?php echo $key['cedula_empleado']; ?> <?php echo $key['nombre_completo']; ?></td>
			          		   	   <td>
			          		   	   	   <?php 
						          		    $con1=("SELECT SUM(cantidad_salida) AS vendidas FROM salida_mercancia INNER JOIN codigo_salida ON salida_mercancia.cod_salida=codigo_salida.cod_salid WHERE salida_mercancia.fecha_salida>='$fecha1' AND salida_mercancia.fecha_salida<='$fecha2' AND codigo_salida.id_empleado='$id_empleado'");
						                    $res1=mysqli_query(conexion::con(), $con1);
						                    foreach ($res1 as $key1) {
						                    echo $vendidas=$key1['vendidas'];
						                    }                     
						          		?>
			          		   	   </td>
			          		   	   <td><font color="green">
			          		   	   	    <?php 
						          		    $con2=("SELECT * FROM salida_mercancia INNER JOIN codigo_salida ON salida_mercancia.cod_salida=codigo_salida.cod_salid INNER JOIN mercancia ON salida_mercancia.id_mercancia=mercancia.id_mercancia WHERE salida_mercancia.fecha_salida>='$fecha1' AND salida_mercancia.fecha_salida<='$fecha2' AND codigo_salida.id_empleado='$id_empleado'");
						                    $res2=mysqli_query(conexion::con(), $con2);
						                    $total_venta_empleado = [];
						                    foreach ($res2 as $key2) {
						                    $total_venta_empleado[]=$key2['total_pagar'];
						                    }                     
						          		?>
						          		<?php 
				          	    		   $total=0;
				          	    		   foreach ($total_venta_empleado as $value) {
				          	    		   	 $total+=$value;
				          	    		   }
				          	    		   echo number_format($total,2);
				          	    		   echo "$";
				          	    		?>
			          		   	   </font></td>
			          		   	   
			          		   	   <td><?php echo $key2['fecha_salida']; ?></td>
			          		   </tr> 
			          	    <?php } ?>
			          	    <tr>
			          	    	<th colspan="2"><p align="right">Total en Ventas</p></th>
			          	    	<td bgcolor="#40d3a7">
			          	    		<?php 
			          	    		   $con=("SELECT SUM(total_pagar) AS total_venta FROM salida_mercancia WHERE fecha_salida>='$fecha1' AND fecha_salida<='$fecha2'");
			          	    		   $res=mysqli_query(conexion::con(), $con);
					                   
					                    foreach ($res as $key) {
					                    	echo number_format($key['total_venta'],2);
					                    	echo "$";
					                    }
			          	    		?>
			          	    	</td>
			          	    	<td></td>
			          	    </tr>
				  		</table>
            
        </div>
    </div>
</div>



</body>
</html>