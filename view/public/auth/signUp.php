<?php
ob_start();
?>


    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 d-flex align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card p-4 shadow-lg">
                    <h3 class="text-center mb-4">Créer un compte</h3>
                    <form method="post" action="signUp.php">
                        <!-- Champ Nom -->
                        <div class="form-floating mb-4">


                            <input type="text" id="nom" name="nom" class="form-control"
                                   placeholder="Entrez votre nom" required>
                            <label class="form-label" for="nom"><i class="fas fa-user me-2"></i>Nom</label>
                        </div>

                        <!-- Champ Prénom -->
                        <div class="form-floating mb-4">


                            <input type="text" id="prenom" name="prenom" class="form-control"
                                   placeholder="Entrez votre prénom" required>
                            <label class="form-label" for="prenom"> <i class="fas fa-user me-2"></i>Prénom</label>
                        </div>

                        <!-- Champ Email -->
                        <div class="form-floating mb-4">
                            <input type="email" id="email" class="form-control" placeholder="Entrez votre adresse email"
                                   name="email" required>
                            <label for="email"><i class="fas fa-envelope me-2"></i>Adresse email</label>
                        </div>

                        <!-- Champ Mot de Passe -->
                        <div class="form-floating mb-4">
                            <input type="password" id="mdp" name="mdp" class="form-control"
                                   placeholder="Entrez votre mot de passe" required>
                            <label class="form-label" for="mdp"><i class="fas fa-lock me-2"></i>Mot de passe</label>
                        </div>

                        <!-- Champ Confirmation Mot de Passe -->
                        <div class="form-floating mb-4">


                            <input type="password" id="mdp2" name="mdp2" class="form-control"
                                   placeholder="Confirmez votre mot de passe" required>
                            <label class="form-label" for="mdp2"><i class="fas fa-lock me-2"></i>Confirmez le mot de passe</label>

                        </div>

                        <!-- Bouton d'inscription -->
                        <div class="d-grid">
                            <button type="submit" name="signup" class="btn btn-primary btn-lg">
                                <i class="fa-solid fa-user-plus me-2"></i>S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php
$contenu = ob_get_clean();

include "../../../view/public/layout/layout.php";
?>