<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from person where PersonId = ".$_GET["id"];

$query = $con->query($sql1);
$person = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $person=$r;
  break;
}

  }
?>

<?php if($person!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $person->Name; ?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="typeDocument">Tipo documento</label>
    <select class="form-control" name="typeDocument" id="typeDocument" required>
      <option value="RC">Registro Civil</option>
      <option value="TI">Tarjeta de identidad</option>
      <option value="CC">Cédula de ciudadanía</option>
      <option value="CE">Cédula de extranjería</option>
      <option value="PA">Pasaporte</option>
      <option value="MS">Menor sin identificación</option>
      <option value="AS">Adulto sin identidad</option>
    </select>
    <input type="hidden" class="form-control" value="<?php echo $person->TypeDocument; ?>" id="idTypeDocument">
  </div>
  <div class="form-group">
    <label for="document">Documento</label>
    <input type="text" class="form-control" value="<?php echo $person->Document; ?>" name="document" required>
  </div>
  <div class="form-group">
    <label for="phone">Celular</label>
    <input type="number" class="form-control" value="<?php echo $person->Phone; ?>" name="phone" >
  </div>
  <div class="form-group">
    <label for="birthDate">Fecha nacimiento</label>
    <input type="date" class="form-control" name="birthDate" id="birthDate" required>
    <input type="hidden" id="txtBirthDate" value="<?php echo $person->Birthdate; ?>">
  </div>
  <input type="hidden" name="personId" value="<?php echo $person->PersonId; ?>">
    <button type="submit" class="btn btn-default">Actualizar</button>
  </form>

<script>

    var txtTypeDocument = $("#idTypeDocument");
    var slcTypeDocument = $("#typeDocument");
    var txtBirthDate = $("#txtBirthDate").val();
    var birthDate = $("#birthDate");

    var year = txtBirthDate.substring(0,4);
    var month = txtBirthDate.substring(5,7);
    var day = txtBirthDate.substring(8,10);

    var date = year + "-" + month + "-" + day;    
    birthDate.val(date);
    
    slcTypeDocument.val(txtTypeDocument.val());

    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php/actualizar.php",$("#actualizar").serialize(),function(data){
    });
    $('#editModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
    loadTabla();
  });
</script>

<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>