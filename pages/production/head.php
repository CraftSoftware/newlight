<?php
    $folder = "/"."new" . "/";
    echo '
        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          '; 
    
    require 'title.php';
    
    echo '
          <!-- Tell the browser to be responsive to screen width -->
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <!-- Bootstrap 3.3.6 -->
          <link rel="stylesheet" href="'.$folder.'bootstrap/css/bootstrap.min.css">
          <!-- Font Awesome -->
          <link rel="stylesheet" href="'.$folder.'dist/css/font-awesome.min.css">
          <!-- Ionicons -->
          <link rel="stylesheet" href="'.$folder.'dist/css/ionicons.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="'.$folder.'dist/css/AdminLTE.min.css">
          <!-- AdminLTE Skins. Choose a skin from the css/skins
               folder instead of downloading all of them to reduce the load. -->
          <link rel="stylesheet" href="'.$folder.'dist/css/skins/_all-skins.min.css">

        </head>
         ';
?>