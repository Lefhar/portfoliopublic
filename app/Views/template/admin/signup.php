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
                                    <h1 class="h4 text-gray-900 mb-4">Veuillez remplir tout les champs!</h1>
                                </div>
                                <?php if (!empty($error)) {
                                    echo $error;
                                } ?>
                                <?php if (!empty($errorValidation)) {
                                    echo $errorValidation;
                                } ?>
                                <form class="user" action="" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                               id="email" name="email" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="password" name="password" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="confirpassword" name="confirpassword"
                                               placeholder="Confirmer votre mot de passe">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Inscription
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
