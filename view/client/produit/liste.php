<?php
ob_start();
if (isset($sousCategories)) {
    ?>
    <div class="mb-3">
        <div class="d-flex flex-wrap gap-2">
            <?php if (isset($_GET['filter'])) { ?>
                <a href="liste.php?cat=<?= $_GET['cat'] ?>&page=1" class="btn btn-danger d-flex align-items-center">
                    <i class="fas fa-arrow-left me-2"></i> Retour
                </a>
            <?php } ?>
            <?php foreach ($sousCategories as $sousCategorie) { ?>
                <a href="liste.php?filter=1&cat=<?= $_GET['cat'] ?>&sousCat=<?= $sousCategorie['idCat'] ?>&page=1"
                   class="btn btn-primary">
                    <i class="fas fa-tag me-1"></i> <?= ucfirst($sousCategorie['libelleCat']) ?>
                </a>
            <?php } ?>

        </div>
    </div>
    <?php
}
?>

    <div class="row mt-4">
        <?php
        if (isset($_SESSION['motsCles'])) {
            ?>
            <a
                    href="../accueil/accueil.php"
                    class="btn btn-secondary text-white mb-2"
            >
                <i class="fas fa-times"></i> Annuler la recherche
            </a>

        <?php }
        if (!empty($produitsAfficher)) {
            foreach ($produitsAfficher as $produit) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <a href="detail.php?ref=<?= htmlspecialchars($produit['refProd']) ?>">
                            <img src="<?= htmlspecialchars($produit['imgProd']) ?>" class="card-img-top img-fluid"
                                 alt="Image du produit" title="Voir Détails">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-dark mb-2">
                                <i class="fas fa-box me-2"></i><?= htmlspecialchars($produit['libelleProd']) ?>
                            </h5>
                            <h6 class="text-primary fw-bold mb-2">
                                <?= htmlspecialchars($produit['prixUnitaireProd']) ?> Dt
                            </h6>
                            <h6 class="card-subtitle mb-2">
                        <span class="<?= $produit['qteStockProd'] > 0 ? 'text-success' : 'text-danger' ?>">
                            <i class="<?= $produit['qteStockProd'] > 0 ? 'fas fa-check-circle' : 'fas fa-times-circle' ?> me-1"></i>
                            <?= $produit['qteStockProd'] > 0 ? 'Disponible' : 'Rupture de stock' ?>
                        </span>
                            </h6>
                            <p class="card-text text-muted flex-grow-1"><?= htmlspecialchars($produit['descriptionProd']) ?></p>
                            <div class="d-flex justify-content-between">
                                <form action="../../client/panier/ajout.php?prod=<?= $produit['refProd'] ?>"
                                      method="post">
                                    <button type="submit" name="panier"
                                            class="btn btn-success d-flex align-items-center" <?php if ($produit['qteStockProd'] == 0) { ?> disabled <?php } ?>>
                                        <i class="fas fa-shopping-cart me-2"></i> Ajouter au panier
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="col-12">
                <h2 class="text-center text-muted">
                    <i class="fas fa-info-circle me-2"></i> Aucun produit trouvé
                </h2>
            </div>
        <?php } ?>
    </div>


    <div class="mt-4">
        <nav aria-label="Pagination">
            <ul class="pagination justify-content-center">

                <li class="page-item <?= $pageActuelle <= 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="liste.php?<?php if (isset ($_GET['filter'])) {
                        echo 'filter=' . $_GET['filter'] . '&';
                    }
                    if (isset ($_GET['cat'])) {
                        echo 'cat=' . $_GET['cat'] . '&';
                    }
                    if (isset ($_GET['sousCat'])) {
                        echo 'sousCat=' . $_GET['sousCat'] . '&';
                    }
                    ?>&page=<?= $pageActuelle - 1 ?>"
                       aria-label="Précédent">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>


                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item <?= $i == $pageActuelle ? 'active' : '' ?>">
                        <a class="page-link" href="liste.php?<?php if (isset ($_GET['filter'])) {
                            echo 'filter=' . $_GET['filter'] . '&';
                        }
                        if (isset ($_GET['cat'])) {
                            echo 'cat=' . $_GET['cat'] . '&';
                        }
                        if (isset ($_GET['sousCat'])) {
                            echo 'sousCat=' . $_GET['sousCat'] . '&';
                        }
                        ?>&page=<?= $i ?>">
                            <?= $i ?>
                        </a>
                    </li>
                <?php } ?>


                <li class="page-item <?= $pageActuelle >= $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link"
                       href="liste.php?<?php if (isset ($_GET['filter'])) {
                           echo 'filter=' . $_GET['filter'] . '&';
                       }
                       if (isset ($_GET['cat'])) {
                           echo 'cat=' . $_GET['cat'] . '&';
                       }
                       if (isset ($_GET['sousCat'])) {
                           echo 'sousCat=' . $_GET['sousCat'] . '&';
                       }
                       ?>&page=<?= $pageActuelle + 1 ?>"
                       aria-label="Suivant">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

<?php
$contenu = ob_get_clean();
$titre = "Produits " . htmlspecialchars($categorie);

include "../../../view/client/layout/layout.php";
?>