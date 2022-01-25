<?php  
$aler=("SELECT * FROM alertas");
$rr=mysqli_query(conexion::con(), $aler);
foreach ($rr as $k) {
	$alerta=$k['alerta'];
}
?>
<?php 
	$con=("SELECT *FROM mercancia");
	$res=mysqli_query(conexion::con(), $con);
		foreach ($res as $key) {
        $id_mercancia=$key['id_mercancia'];
        $con2=("SELECT SUM(cant_ent) AS suma_entrada FROM historial_entrada WHERE id_mercancia='$id_mercancia'");
        $res2=mysqli_query(conexion::con(), $con2);
        foreach ($res2 as $key2) {
        $con1=("SELECT SUM(cantidad_salida) AS suma_salida FROM salida_mercancia WHERE id_mercancia='$id_mercancia'");
        $res1=mysqli_query(conexion::con(), $con1);
        foreach ($res1 as $key1) {
?>
<?php 
  $stock= $key2['suma_entrada']-$key1['suma_salida']; 


  if ($stock<=$alerta) {
?>

<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
    <strong><i class="icon-copy fa fa-exclamation-triangle" aria-hidden="true"></i> Alerta</strong> Tienes Productos por Agotar
    <a href="por_agotar.php" class="btn btn-warning">Revisar</a>
</div>

<?php }}}} ?>


<?php
  $con1=("SELECT DATEDIFF(NOW(),fecha_venci) AS quedan FROM historial_entrada LIMIT 1");
  $res1=mysqli_query(conexion::con(), $con1);
  foreach ($res1 as $key) {
    if ($key['quedan']>='-20') {
?>

<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
    <strong><i class="icon-copy fa fa-exclamation-triangle" aria-hidden="true"></i> Alerta</strong> tienes medicamentos por vencer
    <a href="medicamentos_por_vencer.php" class="btn btn-warning">Revisar</a>
</div>

<?php }} ?>


