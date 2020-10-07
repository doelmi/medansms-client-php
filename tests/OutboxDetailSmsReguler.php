<?php

namespace Medansms\Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use Medansms\SmsReguler;

$smsReguler = new SmsReguler('me.doelmi.id@gmail.com', 'Hm123123');
$response = $smsReguler->outboxDetail('e302fc0475c2b15a5aeec475e08dad05');
print "<pre>";
print_r($response);
print "</pre>";