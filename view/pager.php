<?php

$numPages = ceil($count / $perPage);

if ($numPages == 0) {
    $numPages = 1;
}

$backLnk = '<li class="page-item ';

if ($page == 1) {
    $backLnk .= 'disabled';
}

$backLnk .= '"><a class="page-link" href="./';

if ($page != 2) {
    $backLnk .= 'page';
    $backLnk .= ($page - 1);
}

$backLnk .= '" aria-label="Previous"><span aria-hidden="true">&laquo;</span>
                   <span class="sr-only">Previous</span></a></li>';

$paginatorList = $backLnk;

$forwardLnk = '<li class="page-item ';

if ($page >= $numPages) {
    $forwardLnk .= 'disabled';
}

$forwardLnk .= '"><a class="page-link" href="./';
$forwardLnk .= 'page';
$forwardLnk .= ($page + 1);
$forwardLnk .= '" aria-label="Next"><span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span></a></li>';

for ($i = 1; $i <= $numPages; $i++) {
    if ($page != $i) {
        $paginator = '<li class="page-item"><a class="page-link" href="./';

        if ($i != 1) {
            $paginator .= 'page';
            $paginator .= $i;
        }

        $paginator .= '">';
        $paginator .= $i;
        $paginator .= '</a></li>';
    } else {
        $paginator = '<li class="page-item active"><a class="page-link" href="">';
        $paginator .= $i;
        $paginator .= '</a><span class="sr-only">(current)</span></li>';
    }
    $paginatorList .= $paginator;
}
$paginatorList .= $forwardLnk;

if (!$count) $paginatorList = "";
echo $paginatorList;
