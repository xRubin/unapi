<?php

require __DIR__ . '/vendor/autoload.php';

use unapi\fms;

$service = new fms\passport\PassportService(
    new fms\common\Client(['debug' => true])
);

$result = $service->getQueryPromise(
    new fms\passport\PassportQuery(1234, 567890)
)->wait();

var_dump($result);


