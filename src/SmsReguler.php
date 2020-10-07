<?php

namespace Medansms;

use GuzzleHttp\Client;

class SmsReguler
{
    protected $hostname;
    protected $email;
    protected $passkey;
    protected $json;
    protected $debug;

    public function __construct($email, $passkey)
    {
        $this->hostname = 'https://reguler.medansms.co.id/sms_api.php';
        $this->email = trim($email);
        $this->passkey = trim($passkey);
        $this->json = true;
        $this->debug = false;
    }

    public function send($numbers, $message)
    {
        try {
            $client = new Client();
            $request = $client->request('GET', $this->hostname, [
                'query' => [
                    'action' => 'kirim_sms',
                    'email' => $this->email,
                    'passkey' => $this->passkey,
                    'no_tujuan' => trim(is_array($numbers) ? implode(",", $numbers) : $numbers),
                    'pesan' => trim($message),
                    'json' => $this->json
                ],
                'verify' => false
            ]);
            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            if ($this->debug) {
                return $th->getMessage();
            } else {
                return false;
            }
        }
    }

    public function report($idSendSms)
    {
        try {
            $client = new Client();
            $request = $client->request('GET', $this->hostname, [
                'query' => [
                    'action' => 'laporan_pengiriman',
                    'email' => $this->email,
                    'passkey' => $this->passkey,
                    'id_kirim' => trim(is_array($idSendSms) ? implode(",", $idSendSms) : $idSendSms)
                ],
                'verify' => false
            ]);
            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            if ($this->debug) {
                return $th->getMessage();
            } else {
                return false;
            }
        }
    }

    public function checkCredit()
    {
        try {
            $client = new Client();
            $request = $client->request('GET', $this->hostname, [
                'query' => [
                    'action' => 'kredit',
                    'email' => $this->email,
                    'passkey' => $this->passkey,
                    'json' => $this->json
                ],
                'verify' => false
            ]);
            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            if ($this->debug) {
                return $th->getMessage();
            } else {
                return false;
            }
        }
    }

    public function outbox($options = [])
    {
        try {
            $query = [
                'action' => 'outbox',
                'email' => $this->email,
                'passkey' => $this->passkey
            ];
            if (array_key_exists('page', $options)) {
                $query['page'] = $options['page'];
            }
            if (array_key_exists('rows', $options)) {
                $query['rows'] = $options['rows'];
            }
            if (array_key_exists('search', $options)) {
                $query['q'] = $options['search'];
            }
            if (array_key_exists('startDate', $options)) {
                $query['dari_tgl'] = $options['startDate'];
            }
            if (array_key_exists('endDate', $options)) {
                $query['sampai_tgl'] = $options['endDate'];
            }
            $client = new Client();
            $request = $client->request('GET', $this->hostname, [
                'query' => $query,
                'verify' => false
            ]);
            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            if ($this->debug) {
                return $th->getMessage();
            } else {
                return false;
            }
        }
    }

    public function outboxDetail($idSendSms)
    {
        try {
            $client = new Client();
            $request = $client->request('GET', $this->hostname, [
                'query' => [
                    'action' => 'detail_outbox',
                    'email' => $this->email,
                    'passkey' => $this->passkey,
                    'id' => $idSendSms
                ],
                'verify' => false
            ]);
            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            if ($this->debug) {
                return $th->getMessage();
            } else {
                return false;
            }
        }
    }
    
    public function deleteOutbox($idSendSms)
    {
        try {
            $client = new Client();
            $request = $client->request('GET', $this->hostname, [
                'query' => [
                    'action' => 'hapus_outbox',
                    'email' => $this->email,
                    'passkey' => $this->passkey,
                    'id' => $idSendSms
                ],
                'verify' => false
            ]);
            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            if ($this->debug) {
                return $th->getMessage();
            } else {
                return false;
            }
        }
    }

    public function deleteAllOutbox()
    {
        try {
            $client = new Client();
            $request = $client->request('GET', $this->hostname, [
                'query' => [
                    'action' => 'bersih_outbox',
                    'email' => $this->email,
                    'passkey' => $this->passkey
                ],
                'verify' => false
            ]);
            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            if ($this->debug) {
                return $th->getMessage();
            } else {
                return false;
            }
        }
    }

    public function setEmail($email)
    {
        $this->email = trim($email);
    }

    public function setPasskey($passkey)
    {
        $this->passkey = trim($passkey);
    }
    
    public function setJson($json)
    {
        $this->json = $json;
    }

    public function setHostname($hostname)
    {
        $this->hostname = trim($hostname);
    }

    public function setDebug($debug)
    {
        $this->hostname = $debug;
    }
}
