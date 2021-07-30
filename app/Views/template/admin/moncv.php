
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chargement du cv</h1>
        <a href="<?= base_url('/admin/addcv'); ?>" class="btn btn-lg btn-success shadow-sm"><i class="fas fa-plus"></i> Ajouter un bloc</a>

            <a href="<?= base_url('/admin/addpicture/'); ?>"  class="btn btn-lg btn-success shadow-sm"><i class="fas fa-plus"></i>Ajouter un bloc image</a>

        <a href="<?=base_url('admin');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-home"></i> Retour à l'index</a>
    </div>


    <!-- Content Row -->
    <?php if (!empty($error)) {
        echo $error;
    } ?>
    <div class="row shadow p-4">

        <!-- Area Chart -->





                    <div class="col-xl-4 col-lg-4">
                        <div class="about-img">

                            <?php if (!empty($pic)) { foreach ($pic as $obj) { if($obj->emplacement == "profil"){
                                $obj->content = str_replace('assets',base_url('/assets'),$obj->content);?><?= $obj->content; ?>
                                <a href="<?= base_url('/admin/editpicture/'.$obj->id); ?>"><i class="fas fa-edit"></i></a>
                            <?php }?>

                            <?php
                            }}?>

                        </div>
                        <?php  if (!empty($row)) { foreach ($row as $obj) {
                            if ($obj->emplacement == "left") {
                                $obj->content = str_replace('assets',base_url('/assets'),$obj->content);
                                ?>
                                <h3><?= $obj->title; ?> <a href="<?= base_url('/admin/editcv/'.$obj->id); ?>"><i class="fas fa-edit"></i></a></h3>
                                <hr class="hrcv">
                                <?= $obj->content; ?>
                                <?php
                            }
                        } ?>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                       <span class="sociaux">
                            <?php if (!empty($pic)) { foreach ($pic as $obj) { if($obj->emplacement == "sociaux"){
                                $obj->content = str_replace('assets','../../assets',$obj->content);?><?= $obj->content; ?>
                                <a href="<?= base_url('/admin/editpicture/'.$obj->id); ?>"><i class="fas fa-edit"></i></a>
                            <?php }?>

                                <?php
                            }}?>
</span>

                        <?php foreach ($row as $obj) {
                            if ($obj->emplacement == "right") {
                                ?>
                                <h3><?= $obj->title; ?> <a href="<?= base_url('/admin/editcv/'.$obj->id); ?>"><i class="fas fa-edit"></i></a></h3>
                                <hr class="hrcv">
                                <?= $obj->content; ?>
                                <?php
                            }
                        }
                        }?>
                    </div>




    </div>
</div>

<!-- /.container-fluid -->
