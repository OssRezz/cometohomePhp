<?php
require '../../tools/pagination.php';
require '../Modelo/ModeloProgramas.php';
$programas = new Programas();
$Paginacion = new Paginacion();

//recibimos las variables al cargar la pagina
$limit = $_POST['limit'];
$pagina = $_POST['pagina'];

//La funcion contadorUsuarios nos da la cantidad total de usuarios 
$Programas = $programas->contadorProgramas();
$totalContador = $Programas[0]['id'];


//Vamos a tener como resultado siempre el valor entero. "1.3 = 2"
$totalpaginas = ceil($totalContador / $limit);


$anterior = $pagina - 1;  //atras
$siguiente = $pagina + 1; //adelante



if ($pagina != null) {
    $cur_page = $pagina;
    $number_of_pages = $totalpaginas;
    $Paginacion->insertPagination('programas.php', $cur_page, $number_of_pages, true);
}
