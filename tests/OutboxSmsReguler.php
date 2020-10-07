<?php

namespace Medansms\Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use Medansms\SmsReguler;

$smsReguler = new SmsReguler('me.doelmi.id@gmail.com', 'Hm123123');
$response = $smsReguler->outbox(['page' => 1]);
print "<pre>";
print_r($response);
print "</pre>";