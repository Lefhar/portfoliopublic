<?php
//var_dump($dump);
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edition d'un projet</h1>
        <a href="<?= base_url('admin/mesprojets'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-file"></i> Retour à mes projets</a>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Editer un projet</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($error)) {
                        echo $error;
                    } ?>
                    <form class="user" id="formprojet" action="" method="POST">
                        <div class="form-group">
                            <label for="github">Lien github</label>
                            <input type="url" class="form-control"
                                   id="lien_github" name="lien_github" placeholder="Lien github"
                                   value="<?= set_value('lien_github', $row['lien_github']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="title">Lien web</label>
                            <input type="url" class="form-control"
                                   id="lien_web" name="lien_web" placeholder="Lien web"
                                   value="<?= set_value('lien_web', $row['lien_web']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input required type="text" class="form-control"
                                   id="title" name="title" placeholder="Titre"
                                   value="<?= set_value('title', $row['title']); ?>">
                        </div>


                        <div class="form-group">
                            <label for="contenu">Contenu</label>
                            <textarea  type="text" class="form-control"
                                       id="local-upload" name="contenu" aria-describedby="emailHelp"
                                       placeholder="contenu"
                                       rows="16"><?php $contenu = set_value('contenu', $row['contenu'], false);
                                $contenu  = str_replace('assets', '../../assets', $contenu );
                                echo $contenu ; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Modifier
                        </button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>