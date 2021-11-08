<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Cv Developpeur Web</title>
    <style>
        body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";font-size:.9rem;font-weight:400;height:100%;color:#212529;text-align:left;background-color:#fff;line-height:1.3}p{margin-top:0;margin-bottom:1rem}hr{margin-top:1rem;margin-bottom:1rem;border:0;border-top:1px solid rgba(0,0,0,.1)}.img-fluid{max-width:100%;height:auto}img{vertical-align:middle;border-style:none}.text-justify{text-align:justify!important}*,::after,::before{box-sizing:border-box}.row{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.font-italic{font-style:italic!important}.h3,h3{font-size:1.75rem;margin-bottom:.5rem;margin-top:0;font-weight:500;line-height:1.2}.col-lg-4{position:relative;min-height:1px;padding-right:15px}.col-lg-8{position:relative;min-height:1px}a{color:#007bff;text-decoration:none;background-color:transparent}a{color:#007bff;text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects}*{margin:0;padding:0}h3{font-size:1.6rem;text-align:left;line-height:1.1;margin-bottom:.5rem;font-family:inherit;font-weight:500}ul{display:block;list-style-type:disc;margin-block-start:1em;margin-block-end:1em;margin-inline-start:0;margin-inline-end:0;padding-inline-start:40px}li{display:list-item;text-align:-webkit-match-parent}.row{position:relative;width:100%}.col-lg-4{display:block;width:25%;margin-right:-25%;padding-left:34px;float:left;page-break-inside:avoid;background-color:beige;padding-top:20px;height:1100px}.col-lg-8{display:block;margin-left:27%;padding-left:0;padding-right:0;float:left;width:63%;text-align:left;padding-top:20px}.rounded{border-radius:75px 75px 75px 75px}.sociaux{float:right}.about-img{text-align:center;padding:7px}.hrcv{background-color:#007bff;height:3px}
    </style>
</head>
<body>
<div class="row">
    <div class="col-lg-4">
        <div class="about-img">
            <?php if (!empty($pic)) {
                foreach ($pic as $obj) {
                    if ($obj->emplacement == "profil") {
                     $obj->content = str_replace('assets', site_url('assets'), $obj->content); ?><?= $obj->content; ?>

                    <?php

                    }
                }
            } ?>
        </div>
        <?php foreach ($row as $obj) {
            if ($obj->emplacement == "left") {
                $obj->content = str_replace('assets',site_url('assets'), $obj->content);
                ?>
                <h3><?= $obj->title; ?></h3>
                <hr class="hrcv">
                <?= $obj->content; ?>
                <?php
            }
        } ?>
    </div>
    <div class="col-lg-8">
<span class="sociaux">
            <?php if (!empty($pic)) {
                foreach ($pic as $obj) {
                    if ($obj->emplacement == "sociaux") {
                        $obj->content = str_replace('assets', site_url('assets'), $obj->content); ?><?= $obj->content; ?>

                    <?php }
                }
            } ?>
</span> <div style="top: 91px;right: 0px;position: absolute;">
        <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?=site_url();?>&choe=UTF-8" width="150" height="150">
    </div>
        <?php foreach ($row as $obj) {
            if ($obj->emplacement == "right") {
                ?>
                <h3><?= $obj->title; ?></h3>
                <hr class="hrcv">
                <?= $obj->content; ?>
                <?php
            }
        } ?>
           
    </div>

</div>
</body>
</html>