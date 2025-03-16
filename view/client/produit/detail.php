<?php
ob_start();
?>

    <div class="container mt-4">
        <!-- Bouton de retour -->
        <a href="liste.php?<?php if (isset($surCat)&&!isset($_SESSION['motsCles'])) {
            echo 'cat=' . $surCat['idCat'];
        } ?>" class="btn btn-danger mb-4">
            <i class="fas fa-arrow-left me-2"></i> Retour
        </a>
        <div class="row mb-4">
            <!-- Image du produit -->
            <div class="col-md-6 text-center">
                <div class="card shadow-sm">
                    <img src="<?= $produit['imgProd'] ?>" alt="Image du produit" class="img-fluid rounded">
                </div>
            </div>

            <!-- Informations produit -->
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h3 class="text-primary mb-3">
                        <?= $produit['libelleProd'] ?>
                        <span class="text-secondary">: <?= $catProd ?></span>
                    </h3>

                    <h4>
                        <?= number_format($produit['prixUnitaireProd'], 3) ?> Dt
                        | <span class="<?= $produit['qteStockProd'] > 0 ? 'text-success' : 'text-danger' ?>">
                        <i class="fas fa-box"></i>
                        <?= $produit['qteStockProd'] > 0 ? 'Disponible' : 'Rupture de stock' ?>
                      </span>
                    </h4>

                    <p class="text-muted text-justify mb-4"><?= $produit['descriptionProd'] ?></p>

                    <div class="d-flex align-items-center">
                        <!-- Formulaire d'ajout au panier -->
                        <form action="../../client/panier/ajout.php?prod=<?= $produit['refProd'] ?>" method="post"
                              class="me-3 w-50">
                            <div class="input-group">
                                <input type="number" name="qte" value="<?= $produit['qteStockProd'] == 0 ? 0 : 1 ?>"
                                       min="<?= $produit['qteStockProd'] == 0 ? 0 : 1 ?>"
                                       class="form-control"
                                       max="<?= $produit['qteStockProd'] >= 10 ? '10' : $produit['qteStockProd'] ?>"/>
                                <button type="submit" class="btn btn-primary"
                                        name="panier" <?php if ($produit['qteStockProd'] == 0) { ?> disabled <?php } ?>>
                                    <i class="fas fa-cart-plus"></i> Ajouter
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$contenu = ob_get_clean();
$titre = "Détail produit";
include "../../../view/client/layout/layout.php";
?>