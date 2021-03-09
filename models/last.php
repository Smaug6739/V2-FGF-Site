<?php
include '../classes/Articles.php';

$last = '';


if($list = Articles::getLasts()) {
    
    foreach ($list as $value) {
        $Article = new Articles($value->id);
        
        $last .= '<div class="card article col-xl-3 pt-3 pb-3">';
        $last .= '    <img src="imgs/'.$Article->getImg().'" class="card-img-top">';
        $last .= '    <div class="card-body p-0 pl-2 d-flex flex-column">';
        $last .= '       <h5 class="card-title mt-3">'.mb_strtoupper($Article->getTitle()).'</h5>';
        $last .= '       <div class="card-text mt-3">'.$Article->getContent().'</div>';
        $last .= '       <a href="../article/article.php?id='.$Article->getId().'" class="btn btn-danger align-self-end mt-auto">Lire la suite</a>';
        $last .= '    </div>';
        $last .= '</div>';
    }
}

