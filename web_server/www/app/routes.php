<?php

return function(\FastRoute\RouteCollector $router) {
  
    // Page d'accueil
    $router->addRoute('GET', '/', 'App\Controller\HomeController::print');
 
    $router->addRoute('GET','/connexion', 'App\Controller\HomeController::auth');
    $router->addRoute('POST','/connexion', 'App\Controller\HomeController::authProcess');
 
    $router->addRoute('GET', '/profil', 'App\Controller\HomeController::profil');

    $router->addRoute('GET', '/forgot_password', 'App\Controller\HomeController::forgot_password');
    $router->addRoute('POST', '/forgot_password', 'App\Controller\HomeController::forgot_password');
 
    $router->addRoute('GET', '/deconnexion', 'App\Controller\HomeController::deconnect');
};
