<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (isset($titre)) { ?>
            <?= $titre ?>
        <?php } else {
            echo "E-Com AIB";
        } ?></title>
    <link rel="icon" href="../../../img.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class=" d-flex flex-column min-vh-100">

<?php
include_once "nav.php";

?>

<div class="container mt-3">
    <?php if (isset($titre)) { ?>
        <h1><?= $titre ?></h1>
    <?php } ?>
    <?= $contenu ?>

</div>

<?php include_once "footer.php"; ?>
</body>
</html>