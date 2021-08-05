<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chargement de mes templates de candidature</h1>
        <a href="<?= base_url('/admin/addcandidature'); ?>" class="btn btn-lg btn-success shadow-sm"><i
                    class="fas fa-plus"></i> Ajouter une candidature</a>


        <a href="<?= base_url('admin'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-home"></i> Retour à l'index</a>
    </div>


    <!-- Content Row -->
    <?php if (!empty($error)) {
        echo $error;
    } ?>


    <!-- Area Chart -->
    <?php if (!empty($row)) {
        foreach ($row as $obj) { ?>
            <div class="row shadow p-6">
                <div class="col-md-12">
                    <h2>Sujet : <?= $obj->title; ?> <a
                                href="<?= base_url('/admin/editcandidature/' . $obj->id); ?>"><i
                                    class="fas fa-edit"></i></a> <a
                                href="<?= base_url('/admin/deletecandidature/' . $obj->id); ?>"><i
                                    class="fas fa-trash text-danger"></i></a></h2>
                    <?= $obj->content; ?>
                </div>
            </div>
            <hr>
        <?php }
    } ?>


</div>