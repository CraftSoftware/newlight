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
    require '../../dist/connection.php'; //NOTA: Esto no debe de ir aca, puesto que toda cosa que querras consultar es atravez de JS que manda a llamar al services.php para hacer cualquier consulta vale, verificate bien eso porfa, asi el unico archivo de todo el sistema que tiene acceso a la base de datos sera el services.php
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
        <br>
          <center>
              
              
            
          <!--  <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                
              
            
          
              
              <!--verificamos la subida de imagen con php-->
                            <?php
                                
                                $pass   =   $_POST['password'];
                                $mail    =   $_POST['email'];
                                $actualizar = $_REQUEST['actualizar'];
                                $error = false;
                                //array de archivos disponibles
                                $archivos_disp_ar = array('jpg', 'jpeg', 'gif', 'png');
                                //carpteta donde vamos a guardar la imagen
                                $carpeta = '../../dist/img/';
                                //recibimos el campo de imagen
                                $imagen = $_FILES['imagen']['tmp_name'];
                                //guardamos el nombre original de la imagen en una variable
                                $nombrebre_orig = $_FILES['imagen']['name'];
                                //el proximo codigo es para ver que extension es la imagen
                                $array_nombre = explode('.',$nombrebre_orig);
                                $cuenta_arr_nombre = count($array_nombre);
                                $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
                                //creamos nuevo nombre para que tenga nombre unico
                                $nombre_nuevo = time().'_'.rand(0,100).'.'.$extension;
                                //nombre nuevo con la carpeta
                                $nombre_nuevo_con_carpeta = $carpeta.$nombre_nuevo;
 
                             if (isset($actualizar)) //NOTA: Buenisimo que utilices isset :D me parece benito
                             {//ingreso datos
                                      if(!in_array($extension, $archivos_disp_ar))
                                      {
                                       {
                                         @$errores["imagen"]="Esto no es una imagen";
                                         $error = true;
                                       }
                                      if(trim($imagen)== "")
                                        {
                                         @$errores["imagen"]="Ingrese una imagen";
                                         $error = true;
                                        }
                                      }
                                      else
                                        @$errores["imagen"]="";
                             }
                        // Si los datos son correctos, procesar formulario
                        if (isset($actualizar) && $error==false)
                        {
                             
                            if($mail!="" && $pass!="" ){
                            $actualiza= mysql_query("UPDATE `users` SET `img`='$nombre_nuevo', `pass`= md5('$pass'), `email`='$mail' WHERE `name`='$user_name'");
                            $resultado = mysql_fetch_array($actualiza);
                            $mover_archivos = move_uploaded_file($imagen , $nombre_nuevo_con_carpeta);
                             }else{
                                
                                $actualiza= mysql_query("UPDATE `users` SET `img`='$nombre_nuevo' WHERE `name`='$user_name'");
                            $resultado = mysql_fetch_array($actualiza);
                            $mover_archivos = move_uploaded_file($imagen , $nombre_nuevo_con_carpeta);
                            }
                            
                             
                            $select_foto = mysql_query("SELECT `img`, `name` FROM `users` WHERE name='$user_name'");
                            $res_foto = mysql_fetch_array($select_foto);
                            
                            $f_perfil = $res_foto['img'];
                             
                            //echo "<img src='" . $carpeta . $nombre_nuevo . "' alt='' width='100' height='100' />";
                            //echo "<br/>";
                            echo'<img style="width:40%; margin-top:10px;" src="../../dist/img/'.$f_perfil.'" alt="'.$user_name.'"/><br><br>';
                            echo "Se le asignó nuevo Nombre de imagen  :  " . $nombre_nuevo;
                            
                             
                        }
                          else
                            {
                            ?>
                          
                          <br/>
                          <!--formulario de envío -->
                          <form action="" name="actualizar" enctype="multipart/form-data" method="post">
                          <div class="escogerFoto">
                              <h3> Usuario <?php echo $user_name; ?></h3>
                              
                            <?php
                              
                              $query_photo  =   mysql_query("SELECT `img`, `name` FROM `users` WHERE name='$user_name'");
                              $rphoto       =   mysql_fetch_array($query_photo);
                              
                              $photo    =   $rphoto['img'];
                              
                              echo'<img style=" width:20%; margin-top:10px; border-radius: 50%;" src="../../dist/img/'.$photo.'" alt="'.$user_name.'"/><br><br>';
                              ?>
                              <div id="cropContainerModal"></div>
                           <!-- <img id="thumbnil" style="width:20%; margin-top:10px;"/><br>
                           <span> Escoja su Imagen </span>
                              
                          <input class="escoger" type="file" accept="image/*"  onchange="showMyImage(this)"  name="imagen"
                             <?PHP
                                 if (isset($actualizar))
                                    //obtenemos el nombre de la imagen
                                    print ("VALUE='$imagen'/>\n");
                                else
                                    print ("/>\n");
                                 if (@$errores["imagen"] != "")
                                    //mostramos errores si los hay
                                    print ("<BR><SPAN CLASS='error'>" . @$errores["imagen"] . "</SPAN>");
                              ?>-->
                           </div>
                              <br>
                          
                              <input type="text" id="email" name="email" placeholder="Cambiar Correo" > <br><br>
                              <input type="password" id="password" name="password" placeholder="Cambiar Contraseña" > <br><br>
                          
                              
                          <input class="enviar-foto" type="submit" value="actualizar" name="actualizar"/>
                          </form>
                          <?PHP
                            }?>
           
          
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
<!-- importo todos los JS que sean necesarios -->
<?php
    require 'import_js.php';
?>
     <script>
              
		var croppicHeaderOptions = {
				//uploadUrl:'img_save_to_file.php',
				cropData:{
					"dummyData":1,
					"dummyData2":"asdas"
				},
				cropUrl:'img_crop_to_file.php',
				customUploadButtonId:'cropContainerHeaderButton',
				modal:false,
				processInline:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}	
		var croppic = new Croppic('croppic', croppicHeaderOptions);
		
		
		var croppicContainerModalOptions = {
				uploadUrl:'img_save_to_file.php',
				cropUrl:'img_crop_to_file.php',
				modal:true,
				imgEyecandyOpacity:0.4,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);
		
              </script>
</body>
</html>
