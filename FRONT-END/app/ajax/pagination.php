<?php
function paginationButtons($currentPage, $totalPage, $maxButtons)
{
    $pagination = '';

    if ($currentPage > 1) {
        $pagination .= "<a href='#' class='btn btn-success mr-2' data-page='" . ($currentPage - 1) . "'>Página Anterior</a>";
    }

    $startIndex = max(1, $currentPage - floor($maxButtons / 2));
    $endIndex = min($startIndex + $maxButtons - 1, $totalPage);

    if ($startIndex > 1) {
        $pagination .= "<a href='#' class='btn btn-success mr-2' data-page='1'>1</a>";
        if ($startIndex > 2) {
            $pagination .= "<a href='#' class='btn btn-success mr-2'>....</a>";
        }
    }

    for ($i = $startIndex; $i <= $endIndex; $i++) {
        $activeClass = ($i == $currentPage) ? 'active' : '';
        $pagination .= "<a href='#' class='btn btn-success " . $activeClass . " mr-2' data-page='" . $i . "'>" . $i . "</a>";
    }

    if ($endIndex < $totalPage) {
        if ($endIndex < $totalPage - 1) {
            $pagination .= "<a href='#' class='btn btn-success mr-2'>....</a>";
        }
        $pagination .= "<a href='#' class='btn btn-success mr-2' data-page='" . $totalPage . "'>" . $totalPage . "</a>";
    }

    if ($currentPage < $totalPage) {
        if ($currentPage < $totalPage && $startIndex != 1) {
            // $pagination .= "<a href='#' class='btn btn-success mr-2' data-page='" . ($currentPage + 1) . "'>Próxima Página</a>";
        }
        $pagination .= "<a href='#' class='btn btn-success mr-2' data-page='" . ($currentPage + 1) . "'>Próxima Página</a>";
    }

    // if ($currentPage == 1) {
    //     $pagination = "<a href='#' class='btn btn-success mr-2' data-page='1'>1</a>" . $pagination;
    // }

    return $pagination;
}
