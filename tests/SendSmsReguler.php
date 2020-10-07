<?php

namespace Medansms\Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use Medansms\SmsReguler;

$smsReguler = new SmsReguler('me.doelmi.id@gmail.com', 'Hm123123');
$response = $smsReguler->send('082257173520', 'sms dari api tes');

print "<pre>";
print_r($response);
print "</pre>";