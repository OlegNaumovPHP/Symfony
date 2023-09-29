<?php

namespace App\Service;

use App\Controller\AgifyService;
use App\Repository\PersonRepository;
use Exception;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class PersonService
{
    public function __construct(
        private readonly PersonRepository $personRepository,
    ) {
    }

    public function getAgeByNameForPerson(string $name): int
    {
        $cache = new FilesystemAdapter('', 600);
        $personAgeByName = $cache->get('person_age_by_name', function () use ($name) {
            $personAgeByName = $this->personRepository->getAgeByNameForPerson($name);
            if (!$personAgeByName) {
                $personAgeByName = AgifyService::getAgeByNameForPerson($name);
            }

            if (!$personAgeByName) {
                throw new Exception("Не удалось найти данные по указанному имени: {$name}");
            }

            return $personAgeByName;
        });

        return $personAgeByName;
    }
}
