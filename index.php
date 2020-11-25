<?php require_once 'includes/header.php'; ?>

<!-- MAIN BOX -->
<div id="main-box">    
 
    <h2>Bienvenidos a la web de gestión docente de la UOC.</h2> 
    <h3>Una vez que te registres podrás apuntarte a las asignaturas que tú elijas, consultar su temario y 
    ver fechas de comienzo y fin de las mismas para que puedas gestionar tu evolución en el curso.</h3>
    
    <!--Cuadros de presentación de ventajas destacadas-->
    <div class="contenedorColumnas">
        <div class="columna">
            <h2>Ventaja 1</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="columna">
            <h2>Ventaja 2</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="columna">
            <h2>Ventaja 3</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

<!-- Calendario PHP -->
<?php
      include ('calendar.php');
      // por si hay get que no este nulo
      if ($_GET['month']) {
        $month = $_GET['month'];
      }
      else {
        $month = date("Y-m");
      }
      // obtiene un array de calendario
      $data = Calendar::calendar_month($month);

      $mes = $data['month'];
      // obtener mes en español
      $mespanish = Calendar::spanish_month($mes);

?>

<div class="container">
      <div style="height:50px"></div>
      <h1>< tutofox /> <small>Oh my code!</small></h1>
      <p class="lead">
      <h3>Calendario</h3>
      <p>Aqui esta un ejemplo de Calendario en PHP</p>

      <hr>

      <div class="row header-calendar"  >

        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
          <a  href="index.php?month=<?= $data['last']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
          </a>
          <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
          <a  href="index.php?month=<?= $data['next']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
          </a>
        </div>

      </div>
      <div class="row">
        <div class="col header-col">Lunes</div>
        <div class="col header-col">Martes</div>
        <div class="col header-col">Miercoles</div>
        <div class="col header-col">Jueves</div>
        <div class="col header-col">Viernes</div>
        <div class="col header-col">Sabado</div>
        <div class="col header-col">Domingo</div>
      </div>
      <!-- inicio de semana -->
      <?php foreach ($data['calendar'] as $weekdata) { ?>
        <div class="row">
          <!-- ciclo de dia por semana -->
          <?php foreach ($weekdata['datos'] as $dayweek) { ?>

          <?php if ($dayweek['mes']==$mes) { ?>
            <div class="col box-day">
              <?= $dayweek['dia']; ?>
            </div>
          <?php }else{ ?>
          <div class="col box-dayoff">
          </div>
          <?php } ?>


          <?php } ?>
        </div>
      <?php } ?>

    </div> <!-- /container -->