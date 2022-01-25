<?php require_once("nabvar.php"); ?>
<?php require_once("aplicacion/bd/conexion.php"); ?><br><br><br>
<!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
        <?php
            $sql = ("SELECT * FROM vacante WHERE status='0'"); 
            $result=mysqli_query(conexion::con(), $sql);
             	foreach ($result as $usuario) {
        ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="contratar-candidatos.png" alt="">
              <h4><?php echo $usuario['vacante']; ?></h4>
              <span>Publicado: <?php echo $usuario['fecha_publicacion']; ?> <?php echo $usuario['hora']; ?></span>
              <p align="justify">
                <?php echo $usuario['descripcion']; ?>
              </p>

            </div>
          </div>
        <?php } ?>
        </div>

      </div>
    </section><!-- End Team Section -->

<br><br><br>
<?php require_once("footer.php"); ?>
