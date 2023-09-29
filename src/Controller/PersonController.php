<?php

namespace App\Controller;

use App\Service\PersonService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends AbstractController
{
    public function __construct(
        private readonly PersonService $personService,
    ) {
    }

    #[Route('/age', name: 'estimated_age_person_by_name')]
    public function handle(Request $request): Response
    {
        $name = trim($request->request->get('name'));

        if (!$name) {
            throw $this->createNotFoundException("Имя не заполнено");
        }

        $personAgeByName = $this->personService->getAgeByNameForPerson($name);

        return $this->redirectToRoute('page_form', [
            'age' => $personAgeByName,
            'name' => $name,
        ]);
    }
}
