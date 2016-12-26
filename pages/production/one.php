<!DOCTYPE html>
<html>
<?php
  require 'head.php';  
?>
<body class="hold-transition skin-blue sidebar-mini">
    <?php
        if($security!="false"){
    ?>
<!-- Site wrapper -->
<div class="wrapper">

<?php
    require 'header.php';
    require 'side_bar.php';
?>

  <!-- PASO #1 -->
  <div class="content-wrapper">
      <div class="step1">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Paso #1
        <small>Todo comienza aca!</small>
      </h1>
        <!--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
        -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ingresa el nombre de tu empresa</h3>
        </div>
        <div class="box-body">
          <div class="input-group input-group-sm">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-flat" id="step1">Continuar</button>
                </span>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
          </div>
      <div class="step2" style="display: none;">
            <section class="content-header">
      <h1>
        Paso #2
        <small>Esta seccion se vera a la izquierda de tu pantalla!</small>
      </h1>
        <!--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
        -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ingresa el nombre de los menus principales</h3>
        </div>
        <div class="box-body">
          <div class="input-group input-group-sm">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-flat" id="step2_agregar">Agregar</button>
                </span>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-flat" id="step1">Continuar</button>
                </span>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
      </div>
  </div>
  <!-- TERMINA PASO #1 -->
  <?php
    require 'footer.php';
  ?>
</div>
<!-- ./wrapper -->
<?php
        }else{
            echo '<script>
                    alert("Usuario no registrado!");
                    window.location.replace("../../index.html");
                  </script>';
        }
?>
<!-- importo todos los JS que sean necesarios --!>
<?php
    require 'import_js.php';
?>
</body>
</html>
