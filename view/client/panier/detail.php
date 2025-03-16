<?php
ob_start();
?>
    <div class="container my-4">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle border">
                <thead class="table-dark text-center">
                <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col">Total</th>
                    <th scope="col"><i class="fa-solid fa-plus"></i></th>
                    <th scope="col"><i class="fa-solid fa-minus"></i></th>
                    <th scope="col"><i class="fa-solid fa-trash"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($liste as $item) { ?>
                    <tr>

                        <td class="text-center"><?= htmlspecialchars($item['libelleProd']) ?></td>
                        <td class="text-center"><?= (int)$item['qte'] ?></td>
                        <td class="text-center"><?= number_format($item['prixUnitaireProd'], 3) ?> Dt</td>
                        <td class="text-center"><?= number_format($item['prixUnitaireProd'] * $item['qte'], 3) ?> Dt</td>
                        <td class="text-center">
                            <form action="ajout.php?prod=<?= $item['refProd'] ?>" method="post">
                                <button type="submit" class="btn btn-success btn-sm" name="ajout" aria-label="Ajouter">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="suppression.php?prod=<?= $item['refProd'] ?>" method="post">
                                <button type="submit" class="btn btn-warning btn-sm" name="sup" aria-label="Supprimer">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="suppression.php?prod=<?= $item['refProd'] ?>" method="post">
                                <button type="submit" class="btn btn-danger btn-sm" name="suptout"
                                        aria-label="Supprimer tout">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr class="table-secondary"> <td colspan="2" ></td>
                    <td  class="text-center">Total Panier :</td>
                    <td class="fw-bold text-center"><?= number_format($tot, 3) ?> Dt</td>
                    <td colspan="3"></td>
                </tr>
                </tfoot>
            </table>
        </div>

        <?php if (!empty($liste)) { ?>
            <div class="d-flex justify-content-end mt-3">
                <form method="post" action="../commande/ajouter.php">
                    <button type="submit" name="valide" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-check"></i> Valider votre panier
                    </button>
                </form>
            </div>
        <?php } ?>
    </div>

<?php
$contenu = ob_get_clean();
$titre = "Votre panier";
include "../../../view/client/layout/layout.php";
?>