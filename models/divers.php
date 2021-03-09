<?php
include '../classes/Articles.php';

$aff = '';


if($list = Articles::getCat(6)) {
    
    foreach ($list as $value) {
        $Article = new Articles($value->id);
        
        $aff .= '<div class="card article col-xl-3 pt-3 pb-3">';
        $aff .= '    <img src="imgs/'.$Article->getImg().'" class="card-img-top">';
        $aff .= '    <div class="card-body p-0 pl-2 d-flex flex-column">';
        $aff .= '       <h5 class="card-title mt-3">'.mb_strtoupper($Article->getTitle()).'</h5>';
        $aff .= '       <div class="card-text mt-3">'.$Article->getContent().'</div>';
        $aff .= '       <a href="../article/article.php?id='.$Article->getId().'" class="btn btn-danger align-self-end mt-auto">Lire la suite</a>';
        $aff .= '    </div>';
        $aff .= '</div>';
    }
}