<!--debut 1er page-->

<div class="headerwebsite" id="portfoliovu">
    <div class="container">
        <div class="row">
            <div class="col-12 haut">
                <div class="console" id="console">
                    <div class="title"><img src="<?=site_url('assets/img/PuTTY_icon_128px.png');?>" width="18"> PuTTY
                        <div class="button">
                            <span class="fa fa-window-minimize minimize" id="minimize"></span>
                            <span class="fa fa-window-maximize maximize" id="maximize"></span>
                            <span class="fa fa-times close-windows" id="closewindows"></span></div>
                    </div>
                    <div class="text"><p>Using username "root".
                            <br>
                            Linux proxy 4.19.0-14-amd64 #1 SMP Debian 4.19.171-2 (2021-01-30) x86_64
                            <br>
                        <p>The programs included with the Debian GNU/Linux system are free software;
                            <br>
                            the exact distribution terms for each program are described in the
                            individual files in /usr/share/doc/*/copyright.</p>

                        <p>Debian GNU/Linux comes with ABSOLUTELY NO WARRANTY, to the extent
                            permitted by applicable law.</p>

                        root@lefebvreharold:~#
                       <?php if(!empty($pro)){  $key =1;
                        foreach ($pro as $obj){?>
                            <p><span id="intro<?=$key;?>" class="intro"></span></p>
                        <?php
                            $key++;
                        }
                        }?>

                    </div>
                </div>
                <section class="portfolio" id="portfolio">
                    <div class="row">
                        <?php if(!empty($pro)){
                            $key =1;
                        foreach ($pro as $obj){?>
                        <div class="col-sm-4 pt-2" id="projet<?=$key;?>" >
                            <div class="card">
                                <div class="card-body">

                                    <h5 class="card-title"><a href="<?=$obj->lien_web;?>" target="_blank"><?=$obj->title;?> </a></h5>
                                    <p class="card-text">
                                        <?=$obj->contenu;?>
                                    </p>
                                    <p class="card-text text-center">
                                        <?php if(!empty($obj->lien_github)){?>
                                            <a href="<?=$obj->lien_github;?>" target="_blank"><img
                                                        class="img-fluid" src="<?=site_url('assets/img/github-img.png');?>" width="35"
                                                        alt="<?=$obj->title;?>"></a>
                                        <?php }?>
                                        <?php if(!empty($obj->lien_web)){?>
                                            <a href="<?=$obj->lien_web;?>" target="_blank"><img
                                                        class="img-fluid" src="<?=site_url('assets/img/world-wide-web.png');?>"
                                                        width="30" alt="<?=$obj->title;?>"></a> 
                                        <?php }?>


                                    </p>
                                </div>
                            </div>
                        </div>
                            <?php
                            $key++; }
                        }?>


                    </div>
            </div>
        </div>
    </div>
    </section>
</div>
</div>
<!--fin 1erpage-->
<div id="main" class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="container-fluid">
                <div class="row cv">
                    <div class="col-lg-4 bg-belge padancre">
                        <div class="about-img">
                            <?php if (!empty($pic)) {
                                foreach ($pic as $obj) {
                                    if ($obj->emplacement == "profil") { ?><?= $obj->content; ?><?php }
                                }
                            } ?>
                        </div>

                        <?php foreach ($row as $obj) {
                            if ($obj->emplacement == "left") {
                                ?>
                                <h3><?= $obj->title; ?></h3>
                                <hr class="hrcv">
                                <?= $obj->content; ?>
                                <?php
                            }
                        } ?>

                    </div>
                    <div class="col-lg-8 padancre">
                        <a href="<?=site_url('pdfController/download');?>" target="_blank" class="btn btn-primary downloadcv" ><i class="fas fa-file-pdf text-danger"></i> Télécharger le CV</a>
                <span class="sociaux">

                     <?php if (!empty($pic)) {
                         foreach ($pic as $obj) {
                             if ($obj->emplacement == "sociaux") { ?><?= $obj->content; ?><?php }
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
            </div>
        </div>
    </div>
</div>
<div id="contact" class="contact">
    <div class="container">
        <p class="text-justify">Habitant sûr Amiens. Je peux me déplacer facilement dans toute l'agglomération. Je suis
            également habitué au télétravail. Connecté à la fibre, j'ai mes propres serveurs à la maison et tout le
            matériel pour travailler dans les meilleures conditions. Si vous souhaitez recevoir mon CV, sélectionner
            "Demande de CV" dans le formulaire et renseignez votre mail. Merci!
        </p>
        Mon adresse email : s.lefebvre907@laposte.net
    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                <div id="res" name="res"></div>
                <form action="/sendmail" method="POST" id="contactme" name="contactme">
                    <div class="form-group">
                        <label for="email">Votre Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder=" Votre adresse email" required>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="sujet">Objet du message</label>
                        <select id="sujet" name="sujet" class="form-control" required>
                            <option value="">Séléctionnez le sujet</option>
                            <option value="cv">Demande de CV</option>
                            <option value="offre">Offre d'emploi</option>
                            <option value="autreoffre">Autres offres</option>
                            <option value="remarque">Remarque</option>
                        </select>
                    </div>
                    <div class="form-group" id="boxmessage">
                        <label for="message">Votre message</label>
                        <textarea type="textarea" id="message" name="message" class="form-control" rows="10"></textarea>
                    </div>
                    <?php
                    helper(['form', 'reCaptcha']);

                    try {
                        echo reCaptcha2('reCaptcha2', ['id' => 'recaptcha_v2'], ['theme' => 'light']);
                    } catch (Exception $e) {
                    }
                    ?>
                    <button type="submit" class="btn btn-info">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>