
<html>
	<head>
		<title>.: CRUD :.</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>Crear, Actualizar, Eliminar y consultar personas</h2>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar">
      <div class="form-group">
        <input type="text" name="s" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
  <a data-toggle="modal" href="#newModal" class="btn btn-default">Agregar</a>
    </form>

<br>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" id="agregar">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
              <label for="typeDocument">Tipo documento</label>
              <select class="form-control" name="typeDocument">
                <option value="RC">Registro Civil</option>
                <option value="TI">Tarjeta de identidad</option>
                <option value="CC">Cédula de ciudadanía</option>
                <option value="CE">Cédula de extranjería</option>
                <option value="PA">Pasaporte</option>
                <option value="MS">Menor sin identificación</option>
                <option value="AS">Adulto sin identidad</option>
              </select>
            </div>
            <div class="form-group">
              <label for="document">Documento</label>
              <input type="text" class="form-control" name="document" required>
            </div>
            <div class="form-group">
              <label for="phone">Celular</label>
              <input type="number" class="form-control" name="phone" >
            </div>
            <div class="form-group">
              <label for="birthDate">Fecha nacimiento</label>
              <input type="date" class="form-control" name="birthDate" >
            </div>
            
            <button type="submit" class="btn btn-default">Agregar</button>
          </form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="tabla"></div>


</div>
</div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

function loadTabla(){
  $('#editModal').modal('hide');

  $.get("./php/tabla.php","",function(data){
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./php/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./php/agregar.php",
    $("#agregar").serialize(),
    function(data){
    });
    //alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
    loadTabla();
  });
</script>

	</body>
</html>