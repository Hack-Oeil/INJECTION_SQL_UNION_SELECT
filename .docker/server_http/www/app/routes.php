<?php

return function(\FastRoute\RouteCollector $router) {
  
    // Page d'accueil
    $router->addRoute('GET', '/', 'App\Controller\HomeController::print');

    // Page de connexion
    $router->addRoute('GET', '/login', 'App\Controller\AuthController::auth');
    $router->addRoute('POST', '/login', 'App\Controller\AuthController::authProcess');
    $router->addRoute('GET', '/disconnect', 'App\Controller\AuthController::disconnect');
};
