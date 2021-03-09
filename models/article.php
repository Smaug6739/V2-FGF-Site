<?php

include '../classes/Articles.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$aff = '';

if(!empty($id)) {

    $Article = new Articles($id);
    $aff .= '<div class="full_article col-12 col-xl-8">';
    $aff .= '    <img src="../redaction/imgs/'.$Article->getImg().'" width="100%">';
    $aff .= '    <h1>'.mb_strtoupper($Article->getTitle()).'</h1>';
    $aff .= '    <p>'.$Article->getContent().'</p>';
    $aff .= '    <img src="../redaction/imgdeux/'.$Article->getImg2().'" width="100%">';
    $aff .= '    <p>'.$Article->getContent2().'</p>';
    if($Article->getVid()) {
        $aff .= '<iframe src="'.$Article->getEmbed().'" width="100%" frameborder="0" allowfullscreen></iframe>';
    }
    if($Article->getAuteur()){
        $aff .= '    <p style="font-style:italic">'."Posté par  ".$Article->getAuteur(). " le ". $Article->getDate() .'</p>';
        }
    $aff .= '</div>';
} else {

    $aff .= '<h1>Article introuvable...</h1>';

}







