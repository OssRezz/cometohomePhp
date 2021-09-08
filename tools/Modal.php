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
        echo "        <button type='button' class='btn btn-primary' id='aceptar'>Aceptar</button>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalInfo').modal('show')</script>";
        echo "<script>$('#aceptar').click(function(){location.reload()});</script>";
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
        echo "       <li>Si ya estas registrado presiona el botón <span class='font-weight-bolder font-italic text-muted'>inscribirse al programa</span> .</li>";
        echo "      </div>";
        echo "      <div class='modal-footer d-flex justify-content-between'>";
        echo "        <a type='button' class='btn text-primary' id='btn-registrarme'>Crear una cuenta</a>";
        echo "        <button type='button' class='btn btn-success'  value='$programa' id='btn-inscripcion'>Inscribirse al programa</button>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalInscripcion').modal('show')</script>";
        echo "<script>$('#btn-registrarme').click(function(){location.href='estudiantes/vista/alumnosRegistro.html'})</script>";
    }

    public function modalAlerta($tituloModal, $alert, $contenido)
    {
        echo "<!-- Modal -->";
        echo "<div class='modal fade' id='modalInscripcion' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='display: block;' data-keyboard='false' data-backdrop='static'>";
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
        echo "<script>$('#modalInscripcion').modal('show')</script>";
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
}
