<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cv Developpeur Web</title>
    <link rel="stylesheet" href="<?= site_url('assets/css/background.css?id=1'); ?>">
    <link href="<?= site_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= site_url("assets/css/style.css"); ?>">
    <style>
        body {

            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 0.9rem;
            font-weight: 400;
            height: 100%;
            color: #212529;
            text-align: left;
            background-color: #fff;
            line-height: 1.3;
        }
        * {
            margin: 0;
            padding: 0;
        }


        h3 {
            font-size: 1.60rem;
            text-align: left;
            line-height: 1.1;
            margin-bottom: 0.5rem;
            font-family: inherit;
            font-weight: 500;

        }


        ul {
            display: block;
            list-style-type: disc;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 40px;
        }

        li {
            display: list-item;
            text-align: -webkit-match-parent;
        }

        .row {
            position: relative;
            width: 100%;
            /*padding-top: 20px;*/
        }

        .col-lg-4 {
            display: block;
            width: 25%;
            margin-right: -25%;
            padding-left: 34px;
            float: left;
            page-break-inside: avoid;
            background-color: beige;
            padding-top: 20px;
            height: 1100px;
        }

        .col-lg-8 {
            display: block;
            /*font-size: 11px;*/
            margin-left: 27%;
            padding-left: 0px;
            padding-right: 0px;
            float: left;
            width: 63%;
            text-align: left;
            padding-top: 20px;
        }

        .rounded {
            /*border-radius: 10.25rem!important;*/
            border-radius: 70px 70px 70px 70px;
        }

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
</span>


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