<?php
include 'classes/Articles.php';
include 'classes/Annonces.php';

$aff = '';
$aff2 = '';


if($list = Articles::getLastsAcc()) {
    
    foreach ($list as $value) {
        
        $Article = new Articles($value->id);
        
        $aff .= '<div class="card article col-xl-3 pt-3 pb-3">';
        $aff .= '    <img src="redaction/imgs/'.$Article->getImg().'" class="card-img-top">';
        $aff .= '    <div class="card-body p-0 pl-2 d-flex flex-column">';
        $aff .= '       <h5 class="card-title mt-3">'.mb_strtoupper($Article->getTitle()).'</h5>';
        $aff .= '       <div class="card-text mt-3">'.$Article->getContent().'</div>';
        $aff .= '       <a href="article/article.php?id='.$Article->getId().'" class="btn btn-danger align-self-end mt-auto">Lire la suite</a>';
        $aff .= '    </div>';
        $aff .= '</div>';
        
    }
}

if($list = Annonces::getLastsAcc()) {
    
    $cpt2 = 0;
    
    foreach ($list as $value) {
        
        switch ($cpt) {
            case 0:
            case 3:
                $col = 7;
                break;
            case 1:
            case 2:
                $col = 5;
                break;
        }
        
        $Annonce = new Annonces($value->id);
        
        $content = $rest = substr($Annonce->getAnnonce(), 0, 200);
        $contentArray = explode(" ", $content);
        array_pop($contentArray);
        $content = implode(" ", $contentArray);
        $content .= " ...";
        
        $aff2 .= '<div class="card annonces col-xl-3 pt-3 pb-3">';
        $aff2 .= '    <div class="card-body p-0 pl-2 d-flex flex-column">';
        $aff2 .= '       <h5 class="card-title mt-3">'.mb_strtoupper($Annonce->getTitle()).'</h5>';
        $aff2 .= '       <p class="card-text mt-3">'.$content.'</p>';
        $aff2 .= '       <a href="annonces/annonces.php" class="btn btn-danger align-self-end mt-auto">Lire la suite</a>';
        $aff2 .= '    </div>';
        $aff2 .= '</div>';
        
        $cpt2++;
    }
}



