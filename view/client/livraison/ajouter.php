<?php
ob_start();

?>


<?php
$contenu = ob_get_clean();
$titre = "Livraison";
include "../../../view/client/layout/layout.php";
?>