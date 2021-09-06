<?php
require '../../tools/Modal.php';

$modal =  new Modal();

$programa = $_POST['programa'];

if ($programa != null) {
    $modal->modalInscripcion("¿Ya tienes cuenta de estudiante?", $programa);
}
