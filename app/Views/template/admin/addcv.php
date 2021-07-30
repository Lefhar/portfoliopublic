<?php
//var_dump($dump);
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajout d'un bloc</h1>
        <a href="<?= base_url('admin/moncv'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-file"></i> Retour à mon cv</a>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ajouter un bloc</h6>
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
                    <form class="user" id="formcv" action="" method="POST">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" class="form-control form-control-user"
                                   id="title" name="title" placeholder="Titre de la section"
                                   value="<?= set_value('title'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="number" class="form-control form-control-user"
                                   id="position" name="position"
                                   value="<?= set_value('position'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="emplacement">Emplacement</label>
                            <select class="form-control "
                                    id="emplacement" name="emplacement">
                                <option value="<?php if (set_value('emplacement') =="right" or set_value('emplacement') =="") {
                                    echo "right";
                                } else {
                                    echo "left";
                                } ?>"><?php if (set_value('emplacement') =="right" or set_value('emplacement') =="") {
                                        echo "right";
                                    } else {
                                        echo "left";
                                    } ?></option>
                                <option value="<?php if (set_value('emplacement') == "left") {
                                    echo "right";
                                } else {
                                    echo "left";
                                } ?>"><?php if (set_value('emplacement') == "left") {
                                        echo "right";
                                    } else {
                                        echo "left";
                                    } ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="content">Contenu</label>
                            <textarea type="text" class="form-control"
                                      id="local-upload" name="content" aria-describedby="emailHelp"
                                      placeholder="contenu"
                                      rows="16"><?php $content = set_value('content', false);
                                $content  = str_replace('assets', base_url('/assets'), $content );
                                echo $content ; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="public">Affichage partout</label>
                            <select class="form-control "
                                    id="public" name="public" >
                                <option value="<?php if (set_value('public') == 1 or empty( set_value('public') )) {
                                    echo 0;
                                } else {
                                    echo 1;
                                } ?>"><?php if (set_value('public') == 0) {
                                        echo "Non visible";
                                    } else {
                                        echo "Visible";
                                    } ?></option>
                                <option value="<?php if (set_value('public') == 0) {
                                    echo 1;
                                } else {
                                    echo 0;
                                } ?>"><?php if (set_value('public') == 0) {
                                        echo "Visible";
                                    } else {
                                        echo "Non visible";
                                    } ?></option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Ajouter
                        </button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>