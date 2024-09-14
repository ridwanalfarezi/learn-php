<?php

require_once __DIR__ . '/App/init.php';

use App\Produk\User as AppProdukUser;
use App\Service\User as AppServiceUser;

new AppProdukUser();
echo "<br>";
new AppServiceUser();
