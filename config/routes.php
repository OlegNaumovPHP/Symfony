<?php

use App\Controller\PersonController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes): void {
    $routes->add('page_form', '')
        ->controller([PageFormController::class, 'index'])
        ->methods(['GET']);
    $routes->add('estimated_age_person_by_name', '/age')
        ->controller([PersonController::class, 'handle'])
        ->methods(['GET']);
};
