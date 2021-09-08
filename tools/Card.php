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
}
