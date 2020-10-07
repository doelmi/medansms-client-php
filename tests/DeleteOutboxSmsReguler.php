<?php

namespace Medansms\Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use Medansms\SmsReguler;

$smsReguler = new SmsReguler('me.doelmi.id@gmail.com', 'Hm123123');
$response = $smsReguler->deleteOutbox('f982c93f23ccc1466e6206b323b8df58');
print "<pre>";
print_r($response);
print "</pre>";