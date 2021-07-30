<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Renvoyer le lien de confirmation!</h1>
                                </div>
                                <?php if (!empty($error)) {
                                    echo  $error;
                                } ?>
                                <form class="user" action="" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                               id="email" name="email" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address..." value="<?php echo set_value('email'); ?>">

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Envoyer
                                    </button>

                                </form>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
