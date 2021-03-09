<?php
if(file_exists("../public/img/top-banner.jpg")) {
    $banner = "../public/img/top-banner.jpg";
} else {
    $banner = "public/img/top-banner.jpg";
}
?>

<header>
    <img src="<?= $banner ?>" style="width:100%;height:auto;">
</header>

<!-- width="100%" height="200px"-->