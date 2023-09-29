<?php

namespace App\AppBundle\Command;

use App\Service\PersonService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PersonAgeCommand extends Command
{
    public function __construct(
        private readonly PersonService $personService
    ) {
        return parent::__construct();
    }

    protected function configure()
    {
        $this->setName('app:get-personal-age')->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($name = $input->getArgument('name')) {
            $output->writeLn("Введено имя: {$name}");

            $result = $this->personService->getAgeByNameForPerson($name);

            $output->writeLn("По выбранному имени ({$name}) возраст составляет: {$result} лет.");
        }

        return 1;
    }
}
