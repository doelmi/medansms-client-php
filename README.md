# MedanSMS Client PHP (Unofficial)
Library untuk API Medan SMS (medansms.co.id)

## Instalasi untuk Composer
```php
composer require doelmi/medansms-client-php
```

## Cara menggunakan
Tolong mendaftar dahulu ke website [MedanSMS](https://medansms.co.id/) untuk mendapatkan Passkey.

### SMS Reguler
Memanggil class SmsReguler dengan hostname default ke https://reguler.medansms.co.id/sms_api.php

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Medansms\SmsReguler;

$email = 'your-email';
$passkey = 'your-passkey';
$smsReguler = new SmsReguler($email, $passkey);
```

(Optional) Setting variabel debug [default: false] - apabila diaktifkan maka akan return kesalahan yang terjadi, alih-alih return false.
```php
$smsReguler->setDebug(true);
```

Jika ingin mengganti email atau passkey atau hostname atau json [default: true].
```php
$smsReguler->setEmail($newEmail);
$smsReguler->setPasskey($newPasskey);
$smsReguler->setHostname($newHostname);
$smsReguler->setJson(false);
```

#### Kirim SMS Reguler
```php
$number = 'nomor-yang-dikirim-pesan'; //bisa menggunakan depan 0 atau 62 (jangan menggunakan +62)
$message = 'pesan-yang-dikirim';
$response = $smsReguler->send($number, $message);
var_dump($response);
```

#### Laporan SMS Reguler
```php
$idSendSMS = 'id-unik-sms'; //bentuknya seperti ini : e302fc0475c2b15a5aeec475e08dad05
$response = $smsReguler->report($idSendSMS);
var_dump($response);
```

#### Cek Kredit SMS Reguler
```php
$response = $smsReguler->checkCredit();
var_dump($response);
```

## Pengembangan selanjutnya
- [ ] Menyediakan untuk call API SMS Masking
- [ ] Menyediakan untuk call API SMS Center.

## Untuk support project ini
Hubungi saya melalui email : abdullahfahmi1997@gmail.com
atau beri saya tip melalui [D'Tip](https://tip.doelmi.id) (Gojek, OVO, LinkAja, Transfer Bank)
