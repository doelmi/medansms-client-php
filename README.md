# MedanSMS Client PHP (Unofficial)
Library (Unofficial) untuk Call API Medan SMS (medansms.co.id)

## Instalasi untuk Composer
```php
composer require doelmi/medansms-client-php "0.0.1"
```

## Cara menggunakan
Tolong mendaftar dahulu ke website [MedanSMS](https://medansms.co.id/) untuk mendapatkan Passkey. [Pendaftaran awal mendapatkan kredit SMS Gratis sehingga bisa dicoba dahulu]

### SMS Reguler
Memanggil class SmsReguler dengan hostname default ke https://reguler.medansms.co.id/sms_api.php

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Medansms\SmsReguler;

$email = 'email-yang-terdaftar'; //contoh : abdullahfahmi1997@gmail.com
$passkey = 'passkey-yang-didapatkan'; //contoh : Hm123123
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
$number = 'nomor-yang-dikirim-pesan'; //bisa menggunakan depan 0 atau 62 (jangan menggunakan +62). contoh : 082257171111
$message = 'pesan-yang-dikirim';
$response = $smsReguler->send($number, $message);
var_dump($response);
```

Nomor yang dikirimi pesan bisa lebih dari satu, jadinya variabel `$number` berbentuk array. misalnya :

```php
$number = ['082257171111', '082257171112', '082257171113'];
```

#### Laporan SMS Reguler
```php
$idSendSMS = 'id-unik-sms'; //bentuknya seperti ini : e302fc0475c2b15a5aeec475e08dad05
$response = $smsReguler->report($idSendSMS);
var_dump($response);
```

Laporan SMS Reguler bisa mendapatkan data lebih dari satu id, dengan mengganti variabel `$idSendSMS` menjadi array. misalnya :
```php
$idSendSMS = ['e302fc0475c2b15a5aeec475e08dad05', 'e302fc0475c2b15a5aeec475e08da12a', '12d2fc0475c2b15a5aeec475e08dad05'];
```

#### Cek Kredit SMS Reguler
```php
$response = $smsReguler->checkCredit();
var_dump($response);
```

#### Daftar Kotak Keluar SMS Reguler
```php
$response = $smsReguler->outbox();
var_dump($response);
```

atau bisa menambahkan parameter `$options` untuk kotak keluar. Pilihan tersebut bisa pilih salah satu saja, dua atau lebih.
```php
$options = [
  'page' => '2', //halaman yang ingin ditampilkan [default : 1]
  'rows' => '15', //jumlah baris yang ingin ditampilkan [default : 10]
  'search' => 'pesan yang dicari', //isi pesan yang ingin dicari 
  'startDate' => '08 Okt 2020', //format : d M Y
  'endDate' => '12 Okt 2020' //format : d M Y
];
$response = $smsReguler->outbox($options);
var_dump($response);
```

#### Detail Kotak Keluar SMS Reguler
```php
$idSendSMS = 'id-unik-sms'; //bentuknya seperti ini : e302fc0475c2b15a5aeec475e08dad05
$response = $smsReguler->outboxDetail($idSendSMS);
var_dump($response);
```

#### Hapus Kotak Keluar SMS Reguler
```php
$idSendSMS = 'id-unik-sms'; //bentuknya seperti ini : e302fc0475c2b15a5aeec475e08dad05
$response = $smsReguler->deleteOutbox($idSendSMS);
var_dump($response);
```

#### Hapus Seluruh Kotak Keluar SMS Reguler
```php
$response = $smsReguler->deleteAllOutbox();
var_dump($response);
```

## Pengembangan selanjutnya
- [ ] Menyediakan untuk call API SMS Masking
- [ ] Menyediakan untuk call API SMS Center.

## Untuk support project ini
Hubungi saya melalui email : abdullahfahmi1997@gmail.com
atau beri saya tip melalui [D'Tip](https://tip.doelmi.id) (Gojek, OVO, LinkAja, Transfer Bank)

## Konek dengan saya
Tambahkan sebagai teman discord saya : doelmi#9096
