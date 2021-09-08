<?php

class Paginacion
{

    function insertPagination($base_url, $cur_page, $number_of_pages, $prev_next = false)
    {
        $ends_count = 1;  //how many items at the ends (before and after [...])
        $middle_count = 1;  //how many items before and after current page
        $dots = false;
        $anterior = $cur_page - 1;  //atras
        $siguiente = $cur_page + 1; //adelante    

        echo      "<nav aria-label='Page navigation example mt-5' id='pleasee'>";
        echo      "<ul class='pagination justify-content-center pagination-sm'>";


        if ($cur_page <= 1) {
            echo "<li class='page-item disabled mx-1'>";
        } else {
            echo "<li class='page-item mx-1'>";
        }


        if ($cur_page <= 1) {
            echo "<a class='btn btn-outline-primary btn-sm' href='#'><i class='fas fa-chevron-left'></i></a></li>";
        } else {
            echo "<a class='btn btn-outline-primary btn-sm' href='$base_url?page=$anterior'><i class='fas fa-chevron-left'></i></a></li>";
        }

        for ($i = 1; $i <= $number_of_pages; $i++) {
            if ($i == $cur_page) {
                echo "<li class='page-item active mx-1'><a class='page-link rounded' href='$base_url?page=$i'>$i</a></li>";
                $dots = true;
            } else {

                if ($i <= $ends_count) {
                    echo "<li class='page-item'> <a class='page-link rounded' href='$base_url?page=$i'>$i</a></li>";
                    $dots = true;
                } elseif ($cur_page && $i >= $cur_page - $middle_count && $i <= $cur_page + $middle_count) {
                    echo "<li class='page-item'> <a class='page-link rounded' href='$base_url?page=$i'>$i</a></li>";
                    $dots = true;
                } elseif ($i > $number_of_pages - $ends_count) {
                    echo "<li class='page-item'> <a class='page-link rounded' href='$base_url?page=$i'>$i</a></li>";
                    $dots = false;
                } elseif ($dots) {
                    echo "<li><a class='page-link rounded'>&hellip;</a></li>";
                    $dots = false;
                }
            }
        }

        if ($cur_page >= $number_of_pages) {
            echo "<li class='page-item disabled mx-1'>";
        } else {
            echo "<li class='page-item  mx-1'>";
        }

        if ($cur_page >= $number_of_pages) {
            echo "<a class='btn btn-outline-primary btn-sm' href='#'><i class='fas fa-chevron-right'></i></a>";
        } else {
            echo "<a class='btn btn-outline-primary btn-sm' href='$base_url?page=$siguiente'><i class='fas fa-chevron-right'></i></a>";
        }

        echo      "</ul>";
        echo      "</nav>";
    }
}
