<?php

namespace App\Controller;

use GuzzleHttp\Client;

class AgifyService
{
    public static function getAgeByNameForPerson(string $name): int
    {
        $client = new Client();
        try {
            $response = $client->request('GET', "https://api.agify.io?name={$name}");
            $content = $response->getBody()->getContents();
            $person = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

            return $person['age'] ?? 0;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
