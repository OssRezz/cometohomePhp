<?php


class Modal
{

    public function modalInformativa($tituloModal, $contenidoModal)
    {
        echo "<!-- Modal -->";
        echo "<div class='modal fade' id='modalInfo' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo "  <div class='modal-dialog'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header border-0 '>";
        echo "        <h5 class='modal-title' id='exampleModalLabel'>" . $tituloModal . "</h5>";
        echo "        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "          <span aria-hidden='true'>&times;</span>";
        echo "        </button>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo $contenidoModal;
        echo "      </div>";
        echo "      <div class='modal-footer'>";
        echo "        <button type='button'  data-dismiss='modal' class='btn  btn-primary rounded-0' id='aceptar'>Aceptar</button>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalInfo').modal('show')</script>";
    }

    public function modalInscripcion($tituloModal, $programa)
    {
        echo "<!-- Modal -->";
        echo "<div class='modal fade' id='modalInscripcion' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo "  <div class='modal-dialog'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header border-0'>";
        echo "        <h5 class='modal-title' id='exampleModalLabel'>" . $tituloModal . "</h5>";
        echo "        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "          <span aria-hidden='true'>&times;</span>";
        echo "        </button>";
        echo "      </div>";
        echo "      <div class='modal-body pt-0 border-0'>";
        echo "       <li>Si no tienes una cuenta presiona <span class='font-weight-bolder font-italic text-muted'>crear una cuenta</span></li>";
        echo "       <li>Si ya estas registrado presiona el bot??n <span class='font-weight-bolder font-italic text-muted'>inscribirse al programa</span> .</li>";
        echo "      </div>";
        echo "      <div class='modal-footer d-flex justify-content-between'>";
        echo "        <a type='button' class='btn rounded-0  text-primary' id='btn-registrarme'>Crear una cuenta</a>";
        echo "        <button type='button' class='btn  btn-success rounded-0'  value='$programa' id='btn-inscripcion'>Inscribirse al programa</button>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalInscripcion').modal('show')</script>";
        echo "<script>$('#btn-registrarme').click(function(){location.href='estudiantes/vista/alumnosRegistro.php'})</script>";
    }

    public function modalAlerta($tituloModal, $alert, $contenido)
    {
        echo "<!-- Modal -->";
        echo "<div class='modal fade' id='modalAlerta' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo "  <div class='modal-dialog'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header  border-0'>";
        echo "        <h5 class='modal-title' id='exampleModalLabel'>" . $tituloModal . "</h5>";
        echo "        <button type='button' class='close' data-dismiss='modal' id='close' aria-label='Close'>";
        echo "          <span aria-hidden='true'>&times;</span>";
        echo "        </button>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo "       <div class='alert alert-$alert' role='alert'>";
        echo "       $contenido";
        echo "       </div>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalAlerta').modal('show')</script>";
        echo "<script>$('#close').click(function(){location.reload()});</script>";
    }

    public function modalForm($tituloModal, $contenidoModal)
    {
        echo "<!-- Modal -->";
        echo "<div class='modal fade' id='modalForm' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo "  <div class='modal-dialog'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header border-0'>";
        echo "        <h5 class='modal-title' id='exampleModalLabel'>" . $tituloModal . "</h5>";
        echo "        <button type='button' class='close' data-dismiss='modal' id='close' aria-label='Close'>";
        echo "          <span aria-hidden='true'>&times;</span>";
        echo "        </button>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo $contenidoModal;
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalForm').modal('show')</script>";
        echo "<script>$('#close').click(function(){location.reload()});</script>";
    }

    public function alertaLogin()
    {
        echo "<!-- Modal -->";
        echo "<div class='modal fade' id='modalIn' tabindex='-1' aria-labelledby='modalIn' aria-hidden='true' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo "  <div class='modal-dialog'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header border-0'>";
        echo "        <h5 class='modal-title' id='modalIn'></h5>";
        echo "      </div>";
        echo "      <div class='modal-body'>";

        echo             "<div class='row'>";
        echo                    "<div class='col-12 d-flex justify-content-center'>";
        echo                        "<h4 class='mb-0'>Bienvenido a la</h4>";
        echo                    "</div>";
        echo                    "<div class='col-12'>";
        echo                        "<p class='text-center text-weight-light' style='font-size: 25px;'>Casa de la Cultura de Guarne<p>";
        echo                    "</div>";
        echo             "</div>";
        echo             "<div class='form-group d-flex justify-content-center'>";
        echo               "<a href='../../reportes/vista/indexAdmin.php' class='btn  rounded-0  btn-success btn-lg px-5' id='continuar'>Continuar</a>";
        echo             "</div>";

        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalIn').modal('show')</script>";
    }
}
