<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["typeDocument"]) &&isset($_POST["document"]) &&isset($_POST["phone"]) &&isset($_POST["birthDate"])){
		if($_POST["name"]!=""&& $_POST["typeDocument"]!=""&&$_POST["document"]!=""){
			include "conexion.php";
			
			$sql = "insert into person(Name,TypeDocument,Document,Phone,Birthdate,CreationTime) value (\"$_POST[name]\",\"$_POST[typeDocument]\",\"$_POST[document]\",\"$_POST[phone]\",\"$_POST[birthDate]\",NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";
			}
		}
	}
}



?>