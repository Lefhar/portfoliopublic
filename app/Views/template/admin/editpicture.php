<?php
//var_dump($dump);
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modication image</h1>
        <a href="<?= base_url('admin/moncv'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-file"></i> Retour à mon cv</a>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Modifier un bloc image</h6>
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
                    }
                    ?>
                    <form class="user" action=""  id="formcv" method="POST">


                        <div class="form-group">
                            <label for="emplacement">Emplacement</label>
                            <select class="form-control "
                                    id="emplacement" name="emplacement">
                                <option value="<?php if (set_value('emplacement',$row['emplacement']) =="profil" or set_value('emplacement',$row['emplacement']) =="") {
                                    echo "profil";
                                } else {
                                    echo "sociaux";
                                } ?>"><?php if (set_value('emplacement',$row['emplacement']) =="profil" or set_value('emplacement',$row['emplacement']) =="") {
                                        echo "profil";
                                    } else {
                                        echo "sociaux";
                                    } ?></option>
                                <option value="<?php if (set_value('emplacement',$row['emplacement']) == "sociaux") {
                                    echo "profil";
                                } else {
                                    echo "sociaux";
                                } ?>"><?php if (set_value('emplacement',$row['emplacement']) == "sociaux") {
                                        echo "profil";
                                    } else {
                                        echo "sociaux";
                                    } ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="content">Contenu</label>
                            <textarea type="text" class="form-control"
                                      id="local-upload" name="content" aria-describedby="emailHelp"
                                      placeholder="contenu"
                                      rows="16"><?php $content = set_value('content',$row['content'], false);
                                $content = str_replace('assets', '../../assets', $content);
                                echo $content ; ?></textarea>
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