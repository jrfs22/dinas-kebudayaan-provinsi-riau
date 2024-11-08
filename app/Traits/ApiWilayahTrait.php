<?php

namespace App\Traits;

use Http;
use Exception;

trait ApiWilayahTrait
{
    public $endpoint = "https://wilayah.id/api/";

    public function getProvinces()
    {
        $this->endpoint .= 'provinces.json';

        $response = Http::get($this->endpoint);

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new Exception("Gagal Mendapatkan Wilayah", 404);
        }
    }

    public function getRegencies($code = null)
    {
        $this->endpoint .= 'regencies/14.json';

        $response = Http::get($this->endpoint);

        if ($response->successful()) {
            $result = $response->json()["data"];

            if ($code) {
                $regency = collect($result);

                return $regency->firstWhere('code', $code);
            }

            return $result;
        } else {
            throw new Exception("Gagal Mendapatkan Kabupaten Kota", 404);
        }
    }
}
