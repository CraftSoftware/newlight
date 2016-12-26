<?php
session_start();
error_reporting(0);
require 'connection.php';

if (isset($_POST['option']))
{
    $option = $_POST['option'];
    switch ($option)
    {
       
        case 'log_in':
            phplog_in();
            break;
        case 'know_messages':
            phpknow_messages();
            break;
        case 'log_out':
            phplog_out();
            break;
       case 'register':
            phpregister();
            break;
    }
}

function phplog_in(){
    
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    
	$query = "";
	$query .= "SELECT id_user,name,pass,position,email ";
	$query .= "FROM users ";
	$query .= "WHERE email = '$user' AND ";
    $query .= "pass = '$pass' ";


	$query = mysql_query($query);
    $r     = mysql_fetch_array($query);

	if(count($r['id_user']) > 0){
		$response['message'] = 'todook';
        $_SESSION['user_name'] = $r['name'];
        $_SESSION['user_position'] = $r['position'];
        $_SESSION['user_email'] = $r['email'];
        
	}else{
		$response['message'] = 'notodook';
	}
 
    //$response['variables'] = $user . " " . $pass;
    phpknow_messages();
	echo(json_encode($response));
    
}

function phpknow_messages(){
        
	$query = "";
	$query .= "SELECT count(status) as sum_messages ";
	$query .= "FROM `messeges` ";
	$query .= "WHERE status = 0 and ";
    $query .= "to_ = '".$_SESSION['user_email']."' ";


	$query = mysql_query($query);
    $r     = mysql_fetch_array($query);

	if($r['sum_messages'] > 0){
	
        $_SESSION['count_message'] = $r['sum_messages'];
        
        //CREAR CODIGO PARA SACAR EL ESTRACTO DE CADA MENSAJE NO LEIDO
        
	}else{
		
        $_SESSION['count_message'] = 0;
	}
 
}

function phplog_out(){
    
    session_destroy();
    $response['message'] = 'todook';
	echo(json_encode($response));
    
}


function phpregister(){
    
    //Recibo los valores del JS y los guardo en sus respectivas variables
    
    $email  = $_POST["email"];
    $admin  = $_POST["admin_name"];
    $pass1  = md5($_POST["pass1"]);
    $pass2  = md5($_POST["pass2"]);
    
    $response['message'] = 'todook';
    $response['error']   = "";
    
    if($pass1!=$pass2){
        $response['message']    = 'notodook';
        $response['error']      = 'Las contrasenias no coinciden!' ;
    }
    
    //Chequeo si el usuario ya existe.
    
    $query   =  "SELECT count(email) as sum_emails ";
    $query  .=  "FROM `users` WHERE email like '$email'";
    
    $query = mysql_query($query);
    $r     = mysql_fetch_array($query);
    
    if($r['sum_emails']>0){
        $response['message']    = 'notodook';
        $response['error']      = 'Ya existe una cuenta con ese email!' ;
    }
    
    if($email == ""){
        $response['message']    = 'notodook';
        $response['error']      = 'Ingresar un email valido!' ;
    }
    
    if($admin == ""){
        $response['message']    = 'notodook';
        $response['error']      = 'El nombre del administrador no puede quedar en blanco!' ;
    }
    
    if($pass1 == "" || $pass2 ==""){
        $response['message']    = 'notodook';
        $response['error']      = 'Las contrasenias no pueden estar en blanco' ;
    }
    
    if($response['message'] == "todook"){
        $ins_query  = "INSERT INTO `users` ";
        $ins_query .= "(`id_user`, `name`, `pass`, `img`, `position`, `email`) ";
        $ins_query .= "VALUES ('', '$admin', '$pass1', '', '', '$email');";
        
        $ins_query = mysql_query($ins_query);
    }
	echo(json_encode($response));
 
}



