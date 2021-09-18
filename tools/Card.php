<?php

class Card
{
    public function tarjeta($id_programa, $programa, $escuela, $sede, $fecha, $edad, $horario)
    {
        echo  "<div class='card mx-3 mb-3 card-image-width shadow-sm'>";
        echo "<img src='https://picsum.photos/200/80' class='card-img-top' alt='...'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title text-primary' style='font-size:19px;'>" . $programa . "</h5>";
        echo "<p>";
        echo "<b>Escuela:</b> " . $escuela . "<br>";
        echo "<b>Sede:</b> " . $sede . "<br>";
        echo "<b>Inicia:</b> " . $fecha . "<br>";
        echo "<b>Edad:</b> " . $edad . "<br>";
        echo "<b>horario:</b> " . $horario;
        echo "</p>";

        echo "</div>";
        echo "<div class='card-footer bg-white border-0'>";
        echo "<button type='button' class='btn btn-dark btn-block' value=" . $id_programa . " id='btn-inscribirse'>Inscribirse</button>  ";
        echo "</div>";
        echo "</div>";
    }

    public function tarjetaEstudiantes($grupo, $escuela, $programa, $profesor, $correo, $sede, $estado)
    {
        echo "<div class='card mx-3 mb-3 card-image-width shadow-sm'>";

        echo "<div class='input-group d-flex justify-content-around p-2' role='group' aria-label='Basic example'>";
        if ($escuela === "Música") {
            echo "<i class='fas fa-guitar fa-5x'></i>";
            echo "<i class='fab fa-itunes-note fa-5x'></i>";
        } else if ($escuela === "Artes plásticas") {
            echo "<i class='fas fa-palette fa-5x'></i>";
            echo "<i class='fas fa-camera-retro fa-5x'></i>";
        } else if ($escuela === "Artes escénicas") {
            echo "<i class='fas fa-theater-masks fa-5x'></i>";
        }
        echo "</div>";

        echo "<div class='card-body'>";
        echo "<h5 class='card-title text-primary' style='font-size:19px;'>" . $grupo . "</h5>";
        echo "<p>";
        echo "<b>Escuela:</b> " . $escuela . "<br>";
        echo "<b>Programa:</b> " . $programa . "<br>";
        echo "<b>Sede:</b> " . $sede . "<br>";
        echo "<b>Profesor:</b> " . $profesor . "<br>";
        echo "<b>Correo:</b> " . $correo . "<br>";
        echo "</p>";

        echo "</div>";
        echo "<div class='card-footer bg-light border-0 align-items-center d-flex justify-content-center'>";
        if ($estado != "0") {
            echo "<h5 class='text-primary'>Cursando...</h5> ";
        } else {
            echo "<h5>Finalizado</h5> ";
        }
        echo "</div>";
        echo "</div>";
    }
}
