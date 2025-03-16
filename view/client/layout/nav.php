<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../../controller/client/accueil/accueil.php">
            <img src="../../../img.png" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../../controller/client/accueil/accueil.php">
                        <i class="fas fa-home me-1"></i>Accueil
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fas fa-list me-1"></i>Nos catégories
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($surCategories as $surCategorie): ?>
                            <li>
                                <a class="dropdown-item" href="../produit/liste.php?cat=<?= htmlspecialchars($surCategorie['idCat']) ?>">
                                    <?= ucfirst(htmlspecialchars($surCategorie['libelleCat'])) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../panier/detail.php">
                            <i class="fas fa-shopping-cart me-1"></i>Panier
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../commande/liste.php">
                            <i class="fas fa-box-open me-1"></i>Commandes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../public/auth/logout.php">
                            <i class="fas fa-sign-out-alt me-1"></i>Se déconnecter
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
