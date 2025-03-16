<?php
ob_start();

?>


    <div class="container mt-5">



        <!-- Display existing addresses as a form with radio buttons -->
        <form action="../livraison/ajouter.php" method="post" class="mb-5">
            <h2><i class="fa-solid fa-map-marker-alt"></i> Adresses existantes</h2>
            <?php if (!empty($adresses)){ ?>
                <div class="list-group my-4">
                    <?php foreach ($adresses as $index => $adresse){ ?>
                        <label for="adresse_<?= $index ?>" class="list-group-item list-group-item-action">
                            <input
                                type="radio"
                                id="adresse_<?= $index ?>"
                                name="idAdresse"
                                value="<?= $adresse['idAdresse']?>"
                                required
                                class="form-check-input me-2"
                            >
                            <?= htmlspecialchars($adresse['numBatiment'] . ', ' . $adresse['rue'] . ', ' . $adresse['ville'] . ', ' . $adresse['gouvernorat'] . ', ' . $adresse['codePostal']) ?>
                        </label>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary" name="comfirmerAdr">
                    <i class="fa-solid fa-check"></i> Confirmer cette adresse
                </button>
            <?php }else {
                 ?>
                <p class="text-danger mt-3">Aucune adresse trouvée. Veuillez en ajouter une ci-dessous.</p>
            <?php } ?>
        </form>

        <hr>

        <!-- Form to add a new address -->
        <h2><i class="fa-solid fa-plus"></i> Ajouter une nouvelle adresse</h2>
        <form action="ajouter.php" method="post" class="mt-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="numBatiment" class="form-label">Numéro de bâtiment:</label>
                    <input type="number" id="numBatiment" name="numBatiment" class="form-control" placeholder="Ex: 12" required>
                </div>
                <div class="col-md-6">
                    <label for="rue" class="form-label">Rue:</label>
                    <input type="text" id="rue" name="rue" class="form-control" placeholder="Ex: Rue de Tunis" required>
                </div>
                <div class="col-md-6">
                    <label for="ville" class="form-label">Ville:</label>
                    <input type="text" id="ville" name="ville" class="form-control" placeholder="Ex: Sfax" required>
                </div>
                <div class="col-md-6">
                    <label for="gouvernorat" class="form-label">Gouvernorat:</label>
                    <select id="gouvernorat" name="gouvernorat" class="form-select" required>
                        <option value="" disabled selected>Sélectionnez un gouvernorat</option>
                        <option value="Ariana">Ariana</option>
                        <option value="Béja">Béja</option>
                        <option value="Ben Arous">Ben Arous</option>
                        <option value="Bizerte">Bizerte</option>
                        <option value="Gabès">Gabès</option>
                        <option value="Gafsa">Gafsa</option>
                        <option value="Jendouba">Jendouba</option>
                        <option value="Kairouan">Kairouan</option>
                        <option value="Kasserine">Kasserine</option>
                        <option value="Kébili">Kébili</option>
                        <option value="Le Kef">Le Kef</option>
                        <option value="Mahdia">Mahdia</option>
                        <option value="Manouba">Manouba</option>
                        <option value="Médenine">Médenine</option>
                        <option value="Monastir">Monastir</option>
                        <option value="Nabeul">Nabeul</option>
                        <option value="Sfax">Sfax</option>
                        <option value="Sidi Bouzid">Sidi Bouzid</option>
                        <option value="Siliana">Siliana</option>
                        <option value="Sousse">Sousse</option>
                        <option value="Tataouine">Tataouine</option>
                        <option value="Tozeur">Tozeur</option>
                        <option value="Tunis">Tunis</option>
                        <option value="Zaghouan">Zaghouan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="codePostal" class="form-label">Code postal:</label>
                    <input type="text" id="codePostal" name="codePostal" class="form-control" placeholder="Ex: 1000" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-3" name="ajouterAdr">
                <i class="fa-solid fa-save"></i> Ajouter l'adresse
            </button>
        </form>
    </div>



<?php
$contenu = ob_get_clean();
$titre = "Livraison";
include "../../../view/client/layout/layout.php";
?>