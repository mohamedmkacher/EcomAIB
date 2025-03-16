<?php
ob_start();
if (!empty($commandes)) {
    $titre = "Vos commandes";
    foreach ($commandes as $commande) {
        ?>

        <!-- Card Bootstrap améliorée -->
        <div class="card mt-4 shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-box"></i> Commande : <?= $commande['codeCmd'] ?>
                </h5>
                <span class="badge bg-secondary">
                    <?= date('d/m/Y', strtotime($commande['dateCmd'])) ?>
                </span>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th scope="row"><i class="fas fa-barcode"></i> Code</th>
                        <td><?= $commande['codeCmd'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="fas fa-coins"></i> Total</th>
                        <td><?= number_format($commande['totalCmd'], 3) ?> Dt</td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="fas fa-calendar-alt"></i> Date</th>
                        <td><?= date('d/m/Y', strtotime($commande['dateCmd'])) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="fas fa-info-circle"></i> État</th>
                        <td>
                            <span class="badge
                                <?= $commande['etatCmd'] === 'En cours' ? 'bg-warning' : ($commande['etatCmd'] === 'Livré' ? 'bg-success' : 'bg-danger') ?>">
                                <?= $commande['etatCmd'] ?>
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-end">
                    <a href="detail.php?code=<?= $commande['codeCmd'] ?>" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Voir détails
                    </a>
                </div>
            </div>
        </div>

        <?php
    }
} else {
    $titre = "Aucune commande trouvée";
    ?>

    <!-- Message d'alerte si aucune commande n'est disponible -->
    <div class="alert alert-info mt-4 mb-4" role="alert">
        <i class="fas fa-exclamation-circle"></i> Vous n'avez aucune commande pour le moment.
    </div>

    <?php
}

$contenu = ob_get_clean();

include "../../../view/client/layout/layout.php";
?>