<?php
ob_start();
include_once '../../../view/public/produit/recherche.php'
?>

    <div class="container my-5">
        <h2 class="text-center mb-5">
            <i class="fas fa-tags"></i> Découvrez Nos Catégories
        </h2>
        <div class="row g-4">
            <?php foreach ($surCategories as $surCategorie): ?>
                <div class="col-md-6 col-lg-6">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold"><?= ucfirst(htmlspecialchars($surCategorie['libelleCat'])) ?></h5>

                        </div>
                        <div class="card-footer bg-light text-center">
                            <a href="../produit/liste.php?cat=<?= $surCategorie['idCat'] ?>"
                               class="btn btn-outline-primary btn-sm w-100">
                                <i class="fas fa-arrow-right"></i> Voir plus
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
$contenu = ob_get_clean();
include "../../../view/public/layout/layout.php";


