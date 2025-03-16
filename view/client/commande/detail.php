<?php
ob_start();

?>

    <div class="card mt-3 shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="fas fa-info-circle me-2"></i>Informations Générales
            </h4>
        </div>
        <div class="card-body">

            <!-- Détails de la commande -->
            <div class="mb-4">
                <h5 class="text-secondary">
                    <i class="fas fa-clipboard-list me-2"></i>Détails de la Commande
                </h5>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <tbody>
                        <tr>
                            <th scope="row" class="bg-light text-dark">Code Commande</th>
                            <td><?= $commande['codeCmd'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-light text-dark">Total</th>
                            <td><?= number_format($commande['totalCmd'], 3) ?> Dt + <?= number_format($livraison['fraixLiv'], 3) ?> Dt : <strong><?= number_format($commande['totalCmd']+$livraison['fraixLiv'],3)?> Dt</strong></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-light text-dark">Date</th>
                            <td><?= date('d/m/Y', strtotime($commande['dateCmd'])) ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-light text-dark">État</th>
                            <td><?= $commande['etatCmd'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Détails de la livraison -->
            <div class="mb-4">
                <h5 class="text-secondary">
                    <i class="fas fa-shipping-fast me-2"></i>Détails de la Livraison
                </h5>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <tbody>

                        <tr>
                            <th scope="row" class="bg-light text-dark">Adresse</th>
                            <td><?= $adresse['numBatiment'] . ', ' . $adresse['rue'] . ', ' . $adresse['ville'] . ', ' . $adresse['gouvernorat'] . ', ' . $adresse['codePostal'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-light text-dark">Fraix</th>
                            <td><?= number_format($livraison['fraixLiv'], 3) ?> Dt</td>
                        </tr>

                        <tr>
                            <th scope="row" class="bg-light text-dark">État Livraison</th>
                            <td><?= $livraison['etatLiv'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Produits commandés -->
            <div class="mb-4">
                <h5 class="text-secondary">
                    <i class="fas fa-box-open me-2"></i>Produits commandés
                </h5>
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($produits as $produit) { ?>
                            <tr>
                                <td><?= $produit['libelleProd'] ?></td>
                                <td><?= $produit['qte'] ?></td>
                                <td><?= number_format($produit['prixUnitaireProd'], 3) ?> Dt</td>
                                <td><?= number_format($produit['qte'] * $produit['prixUnitaireProd'], 3) ?> Dt</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer text-center">
            <a href="liste.php" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left me-1"></i>Retour
            </a>
        </div>
    </div>

<?php
$contenu = ob_get_clean();
$titre = "Détails de la Commande";
include "../../../view/client/layout/layout.php";
?>