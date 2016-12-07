<?php
session_start();
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



