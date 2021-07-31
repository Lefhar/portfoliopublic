<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chargement de mes projets</h1>
        <a href="<?= base_url('/admin/addprojet'); ?>" class="btn btn-lg btn-success shadow-sm"><i
                    class="fas fa-plus"></i> Ajouter un projet</a>


        <a href="<?= base_url('admin'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-home"></i> Retour à l'index</a>
    </div>


    <!-- Content Row -->
    <?php if (!empty($error)) {
        echo $error;
    } ?>
    <div class="row shadow p-4">

        <!-- Area Chart -->


        <?php if (!empty($pro)) {
            foreach ($pro as $obj) {

                $obj->contenu = str_replace('assets', base_url('/assets'), $obj->contenu);
                ?>

                <div class="col-xl-4 col-lg-4 col-sm-4 pt-2" id="jarditou" style="opacity: 0.98;">
                <div class="card">
                <div class="card-body">
                <h5 class="card-title"><a href="https://jarditou.lefebvreharold.fr/"
                                          target="blank"><?= $obj->title; ?></a> <a
                            href="<?= base_url('/admin/editprojet/' . $obj->id); ?>"><i class="fas fa-edit"></i></a> <a
                            href="<?= base_url('/admin/deleteprojet/' . $obj->id); ?>"><i class="fas fa-trash text-danger"></i></a></h5>
                <p class="card-text">
                    <?= $obj->contenu; ?>
                </p>
                <p class="card-text text-center">
                <?php if (!empty($obj->lien_github)) { ?>
                    <a href="<?= $obj->lien_github; ?>" target="blank"><img class="img-fluid"
                                                                            src="../../assets/img/github-img.png"
                                                                            width="35" alt="<?= $obj->title; ?>"></a>
                <?php } ?>

                <?php if (!empty($obj->lien_web)) { ?>
                    <a href="<?= $obj->lien_web; ?>" target="blank"><img class="img-fluid"
                                                                         src="../../assets/img/world-wide-web.png"
                                                                         width="35" alt="<?= $obj->title; ?>"></a>


                    </p>
                    </div>
                    </div>
                    </div>                          <?php } ?>
                <?php
            }
        } ?>


    </div>
</div>