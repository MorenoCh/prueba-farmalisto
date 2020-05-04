<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["typeDocument"]) &&isset($_POST["document"]) &&isset($_POST["phone"]) &&isset($_POST["birthDate"])){
		if($_POST["name"]!=""&& $_POST["typeDocument"]!=""&&$_POST["document"]!=""){
			include "conexion.php";
			
			$sql = "update person set Name=\"$_POST[name]\",TypeDocument=\"$_POST[typeDocument]\",Document=\"$_POST[document]\",Phone=\"$_POST[phone]\",Birthdate=\"$_POST[birthDate]\" where PersonId=".$_POST["personId"];			
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>