<?php
ob_start();
?>




    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 d-flex align-items-center justify-content-center">
            <div class="col-md-6 col-lg-4">
                <!-- Card pour améliorer l'apparence -->
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Se connecter</h3>

                        <form method="post" action="login.php">
                            <!-- Adresse email -->
                            <div class="form-floating mb-4">
                                <input type="email" id="email" class="form-control" placeholder="Entrez votre adresse email" name="email" required>
                                <label for="email"><i class="fas fa-envelope me-2"></i>Adresse email</label>
                            </div>

                            <!-- Mot de passe -->
                            <div class="form-floating mb-4">
                                <input type="password" id="mdp" class="form-control" placeholder="Entrez votre mot de passe" name="mdp" required>
                                <label for="mdp"><i class="fas fa-lock me-2"></i>Mot de passe</label>
                            </div>

                            <!-- Bouton de connexion -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <button type="submit" class="btn btn-primary w-100" name="login">
                                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                                </button>
                            </div>

                            <!-- Lien d'inscription -->
                            <div class="text-center mt-3">
                                <p class="small fw-bold">Vous n'avez pas de compte?
                                    <a href="signUp.php" class="link-danger">S'inscrire</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Liens JS pour Bootstrap -->


<?php
$contenu = ob_get_clean();


include "../../../view/public/layout/layout.php";
?>