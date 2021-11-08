<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="<?=base_url('admin/ajout_entreprise');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Ajouter une entreprise</a>
    </div>



    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Liste prospection</h6>
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
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered dataTable table-striped">
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date envoi</th>
                            <th>Reponse</th>
                            <th>Status</th>
                        </tr>

                     <?php
                     foreach ($row as $obj ){
                         //var_dump($obj);
                         if($obj['statut2']==0){$status = "non envoyé";}elseif($obj['statut2']==2){$status = '<i class="fas fa-exclamation-triangle text-danger"></i> Erreur';
                        }else{
                            $status = '<i class="fas fa-check text-success"></i> envoyé';
                        }
                            if($obj['statut2']==1&&$obj['etat']=="attente"){
                                $resend = '<a href="#" onclick="actionup(\''.stripslashes($obj['id']).'\');"><li class="fas fa-refresh"></li></a>';
                            }else{$resend="";}
                            ?>
                            <tr>
                                <td><a href="editer_entreprise.php?id=<?=$obj['id'];?>"><?=$obj['nom'];?></a></td>
                                <td><?=$obj['email'];?></td>
                                <td><?=$obj['date'];?></td>
                                <?php if($obj['etat']=="attente"){
                                    echo ' <td class="text-info"> '.$obj['etat'].'</td>';
                                }else if($obj['etat']=="refus"){
                                    echo ' <td class="text-danger"> '.$obj['etat'].' </td>';
                                }else if($obj['etat']=="accepté"){
                                    echo ' <td class="text-success"> '.$obj['etat'].' </td>';
                                }

                                ?></td>
                                <td><?=$status;?> <?=$resend;?> </td>
                            </tr>
<?php }?>

                    </table>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
