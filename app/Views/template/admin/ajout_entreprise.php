<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter entreprise</h1>
        <a href="<?=base_url('admin');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-home"></i> Retour à la liste</a>
    </div>


    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ajout d'entreprise</h6>
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
                    <form class="user" action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                   id="nom" name="nom" placeholder="Nom de l'entreprise">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control form-control-user"
                                   id="email" name="email" aria-describedby="emailHelp"
                                   placeholder="email de l'entreprise">
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

<!-- /.container-fluid -->
