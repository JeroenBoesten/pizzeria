<?php

use Doctrine\Persistence\ManagerRegistry;
use Illuminate\Contracts\Console\Kernel;

$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

return $app->make(ManagerRegistry::class)->getManager();
