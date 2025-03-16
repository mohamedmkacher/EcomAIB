<?php
ob_start();
?>

        <div class="">
            <!-- Bouton Retour -->
            <?php if (isset($_GET['idCat'])): ?>
                <a href="liste.php" class="btn btn-outline-danger me-2">
                    <i class="fas fa-arrow-left me-2"></i>Retour à la liste principale
                </a>
            <?php endif; ?>

            <!-- Boutons des sous-catégories -->

                <?php foreach ($sousCats as $sousCat): ?>
                    <a href="liste.php?idCat=<?= $sousCat['idCat'] ?>" class="btn btn-outline-primary me-2">
                        <i class="fas fa-tag me-1"></i>
                        <?= ucfirst($sousCat['libelleCat']) ?>
                    </a>
                <?php endforeach; ?>

        </div>

        <!-- Tableau produits -->
        <div class="">
            <table class="table table-striped" <?php if (!empty($produits)){ ?>id="example"<?php } ?>>
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Prix Unitaire</th>
                    <th scope="col">Quantité en stock</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col" class="text-center">Voir</th>
                    <th scope="col" class="text-center">Modifier</th>
                    <th scope="col" class="text-center">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($produits)): ?>
                    <?php foreach ($produits as $produit): ?>
                        <tr>
                            <!-- Référence -->
                            <td><?= $produit['refProd'] ?></td>

                            <!-- Libellé produit -->
                            <td><?= htmlspecialchars($produit['libelleProd']) ?></td>

                            <!-- Prix Unitaire avec formatage -->
                            <td><?= number_format($produit['prixUnitaireProd'], 3) ?> Dt</td>

                            <!-- Stock -->
                            <td><?= htmlspecialchars($produit['qteStockProd']) ?></td>

                            <!-- Catégorie -->
                            <td><?= htmlspecialchars(ucfirst($produit['libelleCat'])) ?></td>

                            <!-- Bouton Afficher les détails -->
                            <td class="text-center">
                                <a href="detail.php?id=<?= $produit['refProd'] ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>

                            <!-- Bouton Modifier -->
                            <td class="text-center">
                                <a href="modifier.php?id=<?= $produit['refProd'] ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>

                            <!-- Bouton Supprimer -->
                            <td class="text-center">
                                <a href="supprimer.php?id=<?= $produit['refProd'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Êtes-vous sûr(e) de vouloir supprimer ce produit ?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">Aucun produit trouvé.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>


<?php
$contenu = ob_get_clean();
$titre = 'Liste de produits' . $cat;
include "../../../view/admin/layout/layout.php";
?>