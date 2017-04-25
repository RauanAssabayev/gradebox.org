<?php
require "/../orm.php";
session_start();
if($_POST['event'] == "addstudent"){
	$subscriber = R::dispense('subscriber');
	$subscriber->courseid 	= $_POST['courseid'];
	$subscriber->email 		= $_POST['email'];
	R::store($subscriber);
	echo $_POST['email'];
}if($_POST['event'] == "addtask"){
	$tasks = R::dispense('tasks');
	$tasks->courseid 	= $_POST['courseid'];
	$tasks->context 	= $_POST['context'];
	$tasks->deadline 	= $_POST['deadline'];
	R::store($tasks);
	echo $_POST['deadline'];
}elseif($_POST['event'] == 'remques'){
		$sQuery = "DELETE FROM course WHERE id = ".$_POST['id'];
		R::exec($sQuery);
	//header('Location: main.php');
	echo $sQuery;
}elseif($_POST['event'] == 'getcategory'){
	$sQuery = "select * from category WHERE type=".$_POST["type"];
	$rows = R::getAll($sQuery);
	print json_encode($rows, JSON_UNESCAPED_UNICODE);
}else echo "ERROR";