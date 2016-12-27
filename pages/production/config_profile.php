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
        Configuracion de Usuario
        
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
        <br><br><br>
          <center>
              
              
            
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                
              
            <h3> Usuario <?php echo $user_name; ?></h3>
          <input type="file" id="foto" name="foto">
          
          <label>Correo</label><br>
          <label>Password</label>
          </center>
          
          
          
          
        <!-- /.box-body -->
      </div>
        
        
      <!-- /.box -->
    </section>
    <!-- /.content -->
          </div>
      
    <!-- Main content -->
    
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
