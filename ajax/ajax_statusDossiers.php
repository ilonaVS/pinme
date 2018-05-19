<?php

  
include_once("../classes/Pin.class.php");
include_once("../classes/User.class.php");

    session_start();

	$status=$_POST['status'];
	$pin= new Pin();
    $pin->setUserId($_SESSION['user']);
	
    if ($status== "1"){
		$collection=$pin->getAllByStatus($status);
	} elseif($status == "2"){
        $collection=$pin->getAllByStatus($status);
    } elseif($status == "3"){
        $collection=$pin->getAllByStatus($status);
    } else {
        $collection=$pin->getAllPins();
    }
    
    
 
    $response= [
		"status" => "success",
		"collection" => $collection
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    
    

	// header('Content-type: application/json');

?>