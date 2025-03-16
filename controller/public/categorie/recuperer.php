<?php

use categorie\ServiceCat;
use produit\ServiceProd;
require_once "../../../model/categorie/ServiceCat.php";

$serviceCat = new ServiceCat();
$surCategories = $serviceCat->getSurCats();
