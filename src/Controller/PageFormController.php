<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageFormController extends AbstractController
{
    #[Route('', name: 'page_form')]
    public function index(Request $request): Response
    {
        $age = $request->query->get('age') ?? 0;
        $name = $request->query->get('name') ?? null;

        return $this->render('pages/form.html.twig', [
            'page_title' => 'Форма получения возраста',
            'age' => $age,
            'name' => $name,
        ]);
    }
}
