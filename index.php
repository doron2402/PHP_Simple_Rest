<?php

/*	
	Author :: Doron Segal
	Date   :: Feb 2013


	Rest Server

	Basically return Json

	- Great Example how to call for a method inside a class using variable.
	- Another cool feature is the handle of calling a method and pass in an argument.



*/

/*
	The Class it self
*/
class MyRestClient
{
	public function __constructor(){
		header('Content-Type: application/json');
	}

	public function getAllUsers(){
		echo json_encode(array('users' => array('user' => array('id'=> 1,'name' => 'doron'))));
	}

	public function getSpecifcUser($arg){
		echo json_encode(array('users' => array('user' => array('id'=> 1,'name' => 'doron'))));
	}

	public function getSomeRandomArgument($arg){
		echo json_encode(array('argument' => $arg));
	}
}


/*
	Reuest Handler

	could be a class that handle all the request.
*/
if ($_GET['r'] != null)
{
	$Req = $_GET['r'];
	$obj = new MyRestClient();
	
	if (isset($_GET['a'])){
		$Arg = $_GET['a'];
		$obj->$Req($Arg);
	}
	else{
		$obj->$Req();
	}
}else{
	echo 'need an argument';
}


?>