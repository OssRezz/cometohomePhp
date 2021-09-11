<?php

require '../../tools/Modal.php';

$modal = new Modal();


//Building modal content
$contenidoModal = "<p>¿ Deseas cerrar la sesión? <p>";
$contenidoModal .= "<div class='row d-flex justify-content-end p-3'> ";
$contenidoModal .= "    <div class='mr-3'>";
$contenidoModal .= "        <button type='button' id='btn-cancelar' class='btn btn-outline-secondary btn-block rounded-0' >Cancelar</button>";
$contenidoModal .= "    </div> ";
$contenidoModal .= "    <div class=''>";
$contenidoModal .= "        <button type='button' id='btn-sesionOut' class='btn btn-outline-primary  btn-block rounded-0' >Aceptar</button>";
$contenidoModal .= "    </div> ";
$contenidoModal .= "</div>";
$contenidoModal .= "<script>$('#btn-cancelar').click(function(){location.reload()});</script>";
$contenidoModal .= "<script>$('#btn-sesionOut').click(function(){location.href='../../index.html'})</script>";


$modal->modalForm("Cerrar sesión ", $contenidoModal);
