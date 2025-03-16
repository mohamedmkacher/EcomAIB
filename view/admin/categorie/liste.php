<?php
ob_start();
?>

<div class="container my-5">

</div>


<?php
$contenu = ob_get_clean();
$titre = 'Liste de catégories';
include "../../../view/admin/layout/layout.php";
?>


